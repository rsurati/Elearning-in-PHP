<?php
session_start();
if(isset($_SESSION['admin']))
{

?>
				<?php require_once '../header.php'; ?>
			<div class="container-fluid">
					<?php
					require_once 'header_nav.php';
					?>
			</div>


			<?php
			if($_GET['op']=="Update")
			{
			?>
			<div class="container alert alert-success" role="alert" style="margin-top: 100px;">
 				Manager User
			</div>

			<div class="container" style="margin-top:50px;">
				<h5>Enter Detail TO UPdate</h5>

				<?php require_once'../dbconnect.php';?>
							<?php
							$q="SELECT * FROM `user` where User_ID=".$_GET['User_ID'];
							$stat=$conn->prepare($q);
							$stat->execute();
							$fd=$stat->fetchAll();
								?>
								
								<?php
									
								foreach ($fd as $value){
								?>


				<form action="User_Update.php" method="get" >
						<label class="form-group">Enter Detail</label>
						<br>
						Name
						<input class="form-control" type="text" name="User_Name" value="<?php echo $value['User_Name'];?>">
						<br>
						Email
						<input class="form-control" type="text" name="User_Email" value="<?php echo $value['User_Email'];?>">
						<br>
						Password
						<input class="form-control" type="text" name="User_Password" value="<?php echo $value['User_Password'];?>">
						<br>
						Role
						<select name="User_Role" class="form-control">
							<option value="user">User</option>
							<option value="manager">Manager</option>
							<option value="admin">Admin</option>
						</select>

						<input type="hidden" name="op" value="<?php echo $_GET['op']?>">
						<input type="hidden" name="User_ID" value="<?php echo $_GET['User_ID']?>"><br>
						<input type="submit" class="btn btn-success" value="Submit"/>
				
				</form>
			</div>

						<?php }?>
		<?php }?>

		<?php
		 require_once '../dbconnect.php';
			if($_GET['op']=="Delete"){ 


							$q="DELETE FROM `user` WHERE User_ID=".$_GET['User_ID'];
							$stat=$conn->prepare($q);
							$stat->execute();
							header('location:Manage_User.php');
			 }?>


<?php require_once'footer_end.php'; ?>
<?php
}
else {
	header('Location:../loginpage.php');
}
?>
