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
 				Manager Tech
			</div>


				<?php require_once'../dbconnect.php';?>
	
<div class="container" style="margin-top:50px; ">

				<h5>ALL Tech</h5>
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Name</th>
				      <th scope="col">Description</th>
				      <th scope="col">Udate</th>
				      <th scope="col">Delete</th>
				    </tr>
				  </thead>
				  <tbody>	
					<?php
											$q="SELECT * FROM `tech_list`";
											$stat=$conn->prepare($q);
											$stat->execute();
											$fd=$stat->fetchAll();
							foreach ($fd as $value) {
												
											
					?>


				    <tr>
				      <th scope="row"><?php echo $value['Tech_ID'];?></th>
				      <td><?php echo $value['Tech_Name'];?></td>
				      <td><?php echo $value['Tech_Desc'];?></td>
				      <td><a class="btn btn-success" href="Tech_Operation.php?op=Update&Tech_ID=<?php echo $value['Tech_ID'];?>">Update</a></td>
				   	  <td><a class="btn btn-danger" href="Tech_Operation.php?op=Delete&Tech_ID=<?php echo $value['Tech_ID'];?>">Delete</a></td>
				    </tr>
							<?php
								}
							?>
	  </tbody>
	</table>
</div>

<div class="container" style="text-align:right;margin-bottom: 20px;"><a class="btn btn-primary" href="NewTech.php">New tech</a></div>





<?php require_once'footer_end.php'; ?>
<?php
}
else {
	header('Location:../loginpage.php');
}
?>