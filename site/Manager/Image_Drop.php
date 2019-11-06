<?php
session_start();
if(isset($_SESSION['manager']) or isset($_SESSION['admin']))
{

?>

<?php require_once '../dbconnect.php';?>


<?php
$q="DELETE FROM `tech_images` WHERE Image_ID=".$_GET['Image_ID'];
					$stat=$conn->prepare($q);
					$stat->execute();

					if(file_exists($_GET['Image_Path']))
					{
						unlink($_GET['Image_Path']);
						header("Location:Manage_Images.php");
					}
					else
					{
						echo '<h1>image not exits';

					}


?>


<?php
}
else {
	header('Location:../loginpage.php');
}