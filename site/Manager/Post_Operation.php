<?php
session_start();
if(isset($_SESSION['manager']) or isset($_SESSION['admin']))
{

?>>
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
 				Manager Post
			</div>

			<div class="container" style="margin-top:50px;">
				<h5>Enter Detail TO UPdate</h5>

				<?php require_once'../dbconnect.php';?>
							<?php
							$q="SELECT * FROM `tech_post` where Post_ID=".$_GET['Post_ID'];
							$stat=$conn->prepare($q);
							$stat->execute();
							$fd=$stat->fetchAll();
								?>
								
								<?php
									
								foreach ($fd as $value){
								?>


				<form action="Post_Update.php" method="post" >
						<label class="form-group">Enter Detail</label><br>
						Title
						<input class="form-control" type="text" name="Post_Title" value="<?php echo $value['Post_Title'];?>">
									<input type="hidden" name="op" value="<?php echo $_GET['op']?>">
									<input type="hidden" name="Post_ID" value="<?php echo $_GET['Post_ID']?>"><br>
						Detail
						<textarea name="Post_Text" class="form-control"><?php echo $value['Post_Text']; ?></textarea><br>



							<input type="submit" class="btn btn-success" value="Submit"/>
				
				</form>
			</div>

						<?php }?>
		<?php }?>

		<?php
		 require_once '../dbconnect.php';
			if($_GET['op']=="Delete"){ 


							$q="DELETE FROM `tech_post` WHERE Post_ID=".$_GET['Post_ID'];
							$stat=$conn->prepare($q);
							$stat->execute();
							header('location:Manage_Post.php?Tech_ID=1&Topic_ID=');
			 }?>


<?php require_once'footer_end.php'; ?>
<?php
}
else {
	header('Location:../loginpage.php');
}
?>