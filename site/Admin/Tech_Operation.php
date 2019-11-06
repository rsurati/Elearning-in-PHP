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
 				Manager Tech
			</div>

			<div class="container" style="margin-top:50px;">
				<h5>Enter Detail TO UPdate</h5>

				<?php require_once'../dbconnect.php';?>
							<?php
							$q="SELECT * FROM `tech_list` where Tech_ID=".$_GET['Tech_ID'];
							$stat=$conn->prepare($q);
							$stat->execute();
							$fd=$stat->fetchAll();
							?>
								
								<?php
									
								foreach ($fd as $value){
								?>


				<form action="Tech_Update.php" method="POST" accept-charset="utf-8">
						<br>
						Tech Name
						<input class="form-control" type="text" name="Tech_Name" value="<?php echo $value['Tech_Name'];?>"><br>
						Tech Description
						<textarea class="form-control" name="Tech_Desc" ><?php echo $value['Tech_Desc'];?></textarea>
						<input type="hidden" name="op" value="<?php echo $_GET['op']?>">
						<input type="hidden" name="Tech_ID" value="<?php echo $_GET['Tech_ID']?>"><br>
						<input type="submit" class="btn btn-success" value="Submit"/>
				
				</form>
			</div>

						<?php }?>
		<?php }?>

		<?php
		 require_once '../dbconnect.php';
			if($_GET['op']=="Delete"){ 


							$q="DELETE FROM `tech_list` WHERE Tech_ID=".$_GET['Tech_ID'];
							$stat=$conn->prepare($q);
							$stat->execute();
							header('location:Manage_Tech.php');
		 }?>


<?php require_once'footer_end.php'; ?>
<?php
}
else {
	header('Location:../loginpage.php');
}
?>
