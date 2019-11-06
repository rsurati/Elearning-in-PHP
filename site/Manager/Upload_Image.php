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
 				Manager Dashboard
			</div>
			<?php
			require_once '../dbconnect.php';
			?>
		<div class="container">
			<form action="" method="post"  enctype="multipart/form-data">

				Select Image
				<input type="file" class="form-control" name="file_img"/><br>
				<input type="submit" name="submit" class="btn btn-primary" value="Submit">
				
			</form>
		</div>


		<?php


		if(isset($_POST['submit']))
		{


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
				





				$filetmp=$_FILES['file_img']['tmp_name'];
				$filename=$_FILES['file_img']['name'];
				$filetype=$_FILES['file_img']['type'];
				$filepath="../images/".$addr.$user.$filename;

				move_uploaded_file($filetmp, $filepath);

				$sql="INSERT INTO `tech_images`(`Image_Name`,`Adder_ID`) VALUES ('".$filepath."','".$addr."')";
				 $flag=$conn->exec($sql);

				 if($flag==True)
				 {
				 	header('Location:Manage_Images.php');
				 }
				 else
				 {
				 	echo '<div class="container alert alert-danger" role="alert" style="margin-top: 100px;">
 				upload Image properly
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

