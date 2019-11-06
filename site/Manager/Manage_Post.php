<?php
session_start();
if(isset($_SESSION['manager']) or isset($_SESSION['admin']))
{

?>
				<?php require_once '../header.php'; ?>
			<div class="container-fluid">
					<?php
					require_once 'header_nav.php';
					?>
			</div>

			<div class="container alert alert-success" role="alert" style="margin-top: 100px;">
 				Manager Topics
			</div>

			<div class="container m-auto">
				<?php require_once'../dbconnect.php';?>
							<?php
							$q="SELECT * FROM `tech_list`";
							$stat=$conn->prepare($q);
							$stat->execute();
							$fs=$stat->fetchAll();
								?>
								<form action="" method="get">
									<input type="hidden" name="Topic_ID" value="">
									<select onchange="this.form.submit()" class="bg-light  btn-lg m-auto" name="Tech_ID">;
									<option value="0">Select Technology</option>
								
								<?php
									
								foreach ($fs as $value) {

										echo "<option value=".$value['Tech_ID'].">".$value['Tech_Name']."</option>";
								}echo'</select>';

								?></form>


								<?php


								if(isset($_GET['Tech_ID']))
								{		
										$q="SELECT * FROM tech_topics where Tech_ID=".$_GET['Tech_ID'];
										$stat=$conn->prepare($q);
										$stat->execute();
										$fs=$stat->fetchAll();						
								?>

								<form action="" method="get">
									<input type="hidden" name="Tech_ID" value="<?php echo($_GET['Tech_ID']); ?>">
									
									<select onchange="this.form.submit()" class="bg-light  btn-lg m-auto" name="Topic_ID">
									<option value="0">Select Topic</option>

								<?php
									
								foreach ($fs as $value) {

										echo "<option value=".$value['Topic_ID'].">".$value['Topic_Name']."</option>";
								}echo'</select>';

								?>
								</form>
							

								<?php
								}

								?>
			</div>
<div class="container" style="margin-top:50px; ">

				<h5>ALL Posts</h5>
				<table class="table">
				  <thead>
				    <tr>	
				      <th scope="col">#</th>
				      <th scope="col">Name</th>
				      <th scope="col">Desc</th>
				      <th scope="col">Udate</th>
				      <th scope="col">Delete</th>
				    </tr>
				  </thead>
				  <tbody>	
							<?php
											$q="SELECT * FROM `tech_post` where Topic_ID=".$_GET['Topic_ID'];
											$stat=$conn->prepare($q);
											$stat->execute();
											$fd=$stat->fetchAll();
											foreach ($fd as $value) {
												
											
							?>


								    <tr>
								      <th scope="row"><?php echo $value['Post_ID'];?></th>
								      <td><?php echo $value['Post_Title'];?></td>
								      <td><?php echo $value['Post_Text'];?></td>
								      <td><a class="btn btn-success" href="Post_Operation.php?op=Update&Post_ID=<?php echo $value['Post_ID'];?>">Update</a></td>
								   	  <td><a class="btn btn-danger" href="Post_Operation.php?op=Delete&Post_ID=<?php echo $value['Post_ID'];?>">Delete</a></td>
								    </tr>
				   
				      
				   
			
							<?php
								}
							?>
	  </tbody>
	</table>
</div>

<div class="container" style="text-align:right;margin-bottom: 20px;"><a class="btn btn-primary" href="NewPost.php">New Post</a></div>





<?php require_once'footer_end.php'; ?>
<?php
}
else {
	header('Location:../loginpage.php');
}
?>