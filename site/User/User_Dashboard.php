<?php
session_start();
if(isset($_SESSION['user']))
{

?>
<?php require_once '../header.php'; ?>
<div class="container-fluid">
<?php
require_once 'header_nav.php';
?>
</div>
<div class="container" style="margin-top:100px;">

</div>
<div class="row container m-auto">
	<div class="col-lg-4 col-md-4 col-sm-10 container">
		<div class="card card-header rounded">
			<h5 class="text-dark">Topics</h5>
		</div>
			<?php require_once '../dbconnect.php';?>

			
			<?php

			$Query="select * from tech_topics where Tech_ID=".$_GET['tech_id'];

			$stat=$conn->prepare($Query);
			$stat->execute();
			$topic =$stat->fetchAll();


			?>
		<div class="card-body">
			<?php

				foreach ($topic as $value) {
						
						echo '<h6><a href="User_Dashboard.php?tech_id='.$_GET['tech_id'].'&T_ID='.$value['Topic_ID'].'">'.$value['Topic_Name'].'</a>	</h6><hr>';			
				}

			?>
		</div>
	</div>
	<div class="col-lg-8 col-md-8 col-sm-10 rounded ">
		<?php
			
				$tid=$_GET['T_ID'];
			

			$Query="select Topic_Name,Post_Text,Post_Title from tech_topics,tech_post where tech_topics.Topic_ID=tech_post.Topic_ID and tech_post.Topic_ID=".$tid;

			$stat=$conn->prepare($Query);
			$stat->execute();
			$post =$stat->fetchAll();
			$count=$stat->rowCount();
			

			?>
		<div class="card card-header">
			<?php
			foreach ($post as $value) {
							
						echo '<h5 class="text-dark">'.$value["Topic_Name"].'</h5>';
						echo'</div>';
						echo'<div class="container mt-5">';
						echo'<h5>'.$value['Post_Title'].'</h5><br>';
						echo '<h6>'.$value["Post_Text"].'</h6>';
					}
		?>
		</div>
	</div>
	
</div>
<?php require_once'footer_end.php'; ?>
<?php
}
else {
	header('Location:../loginpage.php');
}
?>