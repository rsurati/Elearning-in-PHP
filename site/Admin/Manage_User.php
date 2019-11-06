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

			<div class="container alert alert-success" role="alert" style="margin-top: 100px;">
 				Manager Topics
			</div>

			<div class="container m-auto">
				<?php require_once'../dbconnect.php';?>
			</div>
<div class="container" style="margin-top:50px; ">

				<h5>ALL Topics</h5>
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Name</th>
				      <th scope="col">Email</th>
				      <th scope="col">Password</th>
				      <th scope="col">Udate</th>
				      <th scope="col">Delete</th>
				    </tr>
				  </thead>
				  <tbody>	
							<?php
											$q="SELECT * FROM `User`";
											$stat=$conn->prepare($q);
											$stat->execute();
											$fd=$stat->fetchAll();
											foreach ($fd as $value) {
												
											
							?>


				    <tr>
				      <th scope="row"><?php echo $value['User_ID'];?></th>
				      <td><?php echo $value['User_Name'];?></td>
				      <td><?php echo $value['User_Email'];?></td>
				      <td><?php echo $value['User_Password'];?></td>
				      <td><?php echo $value['User_Role'];?></td>
				      <td><a class="btn btn-success" href="User_Operation.php?op=Update&User_ID=<?php echo $value['User_ID'];?>">Update</a></td>
				   	  <td><a class="btn btn-danger" href="User_Operation.php?op=Delete&User_ID=<?php echo $value['User_ID'];?>">Delete</a></td>
				    </tr>
				   
				      
				   
			
							<?php
								}
							?>
	  </tbody>
	</table>
</div>

<div class="container" style="text-align:right;margin-bottom: 20px;"><a class="btn btn-primary" href="NewUser.php">New User</a></div>





<?php require_once'footer_end.php'; ?>
<?php
}
else {
	header('Location:../loginpage.php');
}
?>