<?php
session_start();
if(isset($_SESSION['user']))
{

?>
<?php require_once '../header.php'; ?>
<div class="container-fluid">
<?php
require_once 'header_nav.php';
?>

<div class="container" style="margin-top:100px;">
<center><h3>Select <span class="badge badge">Technologies</span></h3></center>
</div>
<div class="container row">
<?php require_once '../dbconnect.php';?>
	<?php
			$Query="select * from tech_list";

			$stat=$conn->prepare($Query);
			$stat->execute();
			$tech =$stat->fetchAll();
			foreach ($tech as $value) {
				
			
			?>

			 <div class="col-lg-4 col-md-4 col-sm-12 col-10 d-block m-auto">
													<div class="card">
													 
														<img src="http://localhost/test/e-learning/1.png" class="card-img img img-fluid">
														<div class="card-body">
															<h2><?php echo $value['Tech_Name'];?></h2>
															<p><?php echo $value['Tech_Desc'];?></p>
															<a class="btn btn-primary" href="User_Dashboard.php?tech_id=<?php echo $value['Tech_ID'];?>&T_ID=1">Start learning</a>
														</div>
													</div>
												</div>
	<?php } ?>
</div>
<?php require_once'footer_end.php'; ?>
<?php
}
else {
	header('Location:../loginpage.php');
}
?>