<?php
session_start();
if(isset($_SESSION['manager']) or isset($_SESSION['admin']))
{

?>
<?php require_once '../header.php'; ?>


	<div class="container alert alert-success" role="alert" style="margin-top: 100px;">
 			Enter Topic Details
	</div>
	<div class="container">
		<form action="" method="post">
			<?php require_once'../dbconnect.php';?>
					<?php

					if(isset($_SESSION['manager']))
					{
						$user=$_SESSION['manager'];
					}
					else if(isset($_SESSION['admin']))
					{
						$user=$_SESSION['admin'];
					} 
					$addr=0;		
					$q="SELECT User_ID from user WHERE User_Name='".$user."'";
					$stat=$conn->prepare($q);
					$stat->execute();
					$fd=$stat->fetchAll();
					foreach ($fd as $value) {
						$addr=$value['User_ID'];
					}
					?>
					<input type="hidden" name="User_ID" value="<?php echo $addr; ?>">
					<?php
					$q="SELECT `Tech_ID`, `Tech_Name` FROM `tech_list`";
					$stat=$conn->prepare($q);
					$stat->execute();
					$fd=$stat->fetchAll();


					echo '<div class="form-group">Select Technology<select name="Tech_ID" class="form-control">';


					foreach ($fd as $value) {
						echo"<option value=".$value['Tech_ID'].">".$value['Tech_Name']."</option>";
					 } ?>
					
					</select>
					</div>

					<div class="form-group">
								Enter topic name
								<input type="text" class="form-control" name="Topic_Name" required />
					</div>

					<div class="form-group">
						<input type="submit" name="sub" value="submit" class="btn btn-primary lg-btn" />
					</div>
		</form>
	</div>



	<?php



	if(isset($_POST['sub']))
	{
		$q='INSERT INTO `tech_topics`(`Tech_ID`, `Topic_Name`, `Adder_ID`) VALUES ('.$_POST['Tech_ID'].',"'.$_POST['Topic_Name'].'",'.$_POST['User_ID'].')';
		$flag=$conn->exec($q);

		if($flag==True)
		{
			header('location:Manage_Topics.php?Tech_ID='.$_POST['Tech_ID'].'');
		}
		else
		{
			echo'<div class="container alert alert-success" role="alert" style="margin-top: 100px;">
 			Please Enter valid Details
	</div>';
		}

	}



	?>

<?php require_once'footer_end.php'; ?>
<?php
}
else {
	header('Location:../loginpage.php');
}
?>









