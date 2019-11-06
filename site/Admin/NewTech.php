<?php
session_start();
if(isset($_SESSION['admin']))
{

?>
<?php require_once '../header.php'; ?>


	<div class="container alert alert-success" role="alert" style="margin-top: 100px;">
 			Enter Topic Details
	</div>
	<div class="container">
		<form action="" method="post">
			<?php require_once'../dbconnect.php';?>
					
					<br>
								Enter Tech name
								<input type="text" class="form-control" name="Tech_Name" required />
					<br>
								Enter Tech Description
								<input type="text" class="form-control" name="Tech_Desc" required />
					<br>
					<div class="form-group">
						<input type="submit" name="sub" value="submit" class="btn btn-primary lg-btn" />
					</div>
		</form>
	</div>



	<?php



	if(isset($_POST['sub']))
	{
		$q='INSERT INTO `tech_list`(`Tech_Name`,`Tech_Desc`) VALUES ("'.$_POST['Tech_Name'].'","'.$_POST['Tech_Desc'].'")';
		$flag=$conn->exec($q);

		if($flag==True)
		{
			header('location:Manage_Tech.php?');
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









