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


			<div class="container row" style="margin-top: 50px;margin-left: 100px;margin-bottom: 200px; ">
				<div class="card col-lg-4 col-md-4 col-sm-10">
					<div class="card-header"><h6>Manager opration</h6></div>
					<div class="card-body">
						<div class="nav-item">
							<h6><a href="Manage_Topics.php?Tech_ID=1"> All Topics</a></h6><hr>
							
							<h6><a href="Manage_Images.php"> All Images</a></h6></h6><hr>

							<h6><a href="Manage_Post.php?Tech_ID=1&Topic_ID="> All Post</a></h6></h6><hr>


						</div>
						
					</div>


				</div>


				<div class="card col-lg-8 col-md-8 col-sm-10">
					<div class="card-header"><h6>Profile </h6></div>
					<div class="card-body">
						<div class="nav-item">
						
							<?php require_once'../dbconnect.php';?>
							<?php
							$q="SELECT * FROM `user` WHERE User_Name='".$_SESSION['manager']."'";
							$stat=$conn->prepare($q);
							$stat->execute();
							$fs=$stat->fetchAll();

								foreach ($fs as $value) {
							?>
<table class="table table-striped">
  <tbody>
    <tr>
     
      <td>ID</td>
      <td><?php echo $value['User_ID'];?></td>
     
    </tr>
    <tr>
   
      <td>Name</td>
      <td><?php echo $value['User_Name'];?></td>
    
    </tr>
    <tr>
     
      <td>Email</td>
      <td><?php echo $value['User_Email'];?></td>
    
    </tr>
     <tr>
     
      <td>Password</td>
      <td><?php echo $value['User_Password'];?></td>
    
    </tr>
     <tr>
     
      <td>Designation</td>
      <td><?php echo $value['User_Role'];?></td>
    
    </tr>
  </tbody>
</table>
							<?php
									
								}
							?>

						</div>
						
					</div>


				</div>

			</div>



<?php require_once'footer_end.php'; ?>
<?php
}
else {
	header('Location:../loginpage.php');
}
?>