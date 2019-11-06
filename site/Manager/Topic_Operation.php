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


			<?php
			if($_GET['op']=="Update")
			{
			?>
			<div class="container alert alert-success" role="alert" style="margin-top: 100px;">
 				Manager Topics
			</div>

			<div class="container" style="margin-top:50px;">
				<h5>Enter Detail TO UPdate</h5>

				<?php require_once'../dbconnect.php';?>
							<?php
							$q="SELECT * FROM `tech_topics` where Topic_ID=".$_GET['T_ID'];
							$stat=$conn->prepare($q);
							$stat->execute();
							$fd=$stat->fetchAll();
								?>
								
								<?php
									
								foreach ($fd as $value){
								?>


				<form action="Topic_Update.php" method="get" accept-charset="utf-8">
						<label class="form-group">Enter Detail</label>
						<input class="form-control" type="text" name="T_Name" value="<?php echo $value['Topic_Name'];?>">
						<input type="hidden" name="op" value="<?php echo $_GET['op']?>">
						<input type="hidden" name="T_ID" value="<?php echo $_GET['T_ID']?>"><br>
						<input type="submit" class="btn btn-success" value="Submit"/>
				
				</form>
			</div>

						<?php }?>
		<?php }?>

		<?php
		 require_once '../dbconnect.php';
			if($_GET['op']=="Delete"){ 


							$q="DELETE FROM `tech_topics` WHERE Topic_ID=".$_GET['T_ID'];
							$stat=$conn->prepare($q);
							$stat->execute();
							header('location:Manage_Topics.php?Tech_ID=1&Topic_ID=');
			 }?>


<?php require_once'footer_end.php'; ?>
<?php
}
else {
	header('Location:../loginpage.php');
}
?>
