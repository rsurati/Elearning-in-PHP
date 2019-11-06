<?php
session_start();
if(isset($_SESSION['admin']))
{

?>
<?php require_once '../header.php'; ?>

<?php require_once '../dbconnect.php'?>
	<div class="container alert alert-success" role="alert" style="margin-top: 100px;">
 			Enter User Details
	</div>
	<div class="container">
		<form action="" method="POST" >
						<label class="form-group">Enter Detail</label>
						<br>
						Name
						<input class="form-control" type="text" name="User_Name"/>
						<br>
						Email
						<input class="form-control" type="text" name="User_Email" />
						<br>
						Password
						<input class="form-control" type="text" name="User_Password"/>
						<br>
						Role
						<select name="User_Role" class="form-control">
							<option value="user">User</option>
							<option value="manager">Manager</option>
							<option value="admin">Admin</option>
						</select>
						<br>
						<input type="submit" class="btn btn-success" name="sub" value="Submit"/>
				
				</form>
	



	<?php



	if(isset($_POST['sub']))
	{try{



				$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
				
				$q="INSERT INTO `user`(`User_Name`, `User_Email`, `User_Password`, `User_Role`) VALUES ('".$_POST['User_Name']."','".$_POST['User_Email']."','".$_POST['User_Password']."','".$_POST['User_Role']."')";
				$flag=$conn->exec($q);

				if($flag==True)
				{
					header('location:Manage_User.php');
				}
				else
				{
					echo'<div class="container alert alert-success" role="alert" style="margin-top: 100px;">
		 			Please Enter valid Details
			</div>';
				}

	}catch(PDOException $e)
	{
		echo $e->getMessage();
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


</div>






