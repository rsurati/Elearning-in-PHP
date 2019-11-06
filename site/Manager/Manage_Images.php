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
 				Manage Image
			</div>
			<div class="container alert alert-warning" role="alert" style="margin-top: 100px;">
 				When you display that uploaded images copy path and write that path in img tag..
			</div>
			<?php
			require_once '../dbconnect.php';
			?>





<!--table-->

			<div class="container">
			<h5>ALL Images</h5>
				<table class="table">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">path</th>
				     
				      <th scope="col">view</th>
				      <th scope="col">Delete</th>
				    </tr>
				  </thead>
				  <tbody>	
							<?php
											$q="SELECT * FROM `tech_images`";
											$stat=$conn->prepare($q);
											$stat->execute();
											$fd=$stat->fetchAll();
											foreach ($fd as $value) {
												
											
							?>


				    <tr>
				      <th scope="row"><?php echo $value['Image_ID'];?></th>
				      <td><<a>img src=<?php echo $value['Image_Name'];?> width=300 height=300</a>></td>
				      <td><img src="<?php echo$value['Image_Name'];?>" width="100px" height="100px"/></td>
				   	  <td><a class="btn btn-danger" href="Image_Drop.php?Image_ID=<?php echo $value['Image_ID'];?>&Image_Path=<?php echo $value['Image_Name'];?>">Delete</a></td>
				    </tr>
				   
				      
				   
			
							<?php
								}
							?>
	  </tbody>
	</table>


			</div>






			<div class="container m-auto">
			<a href="Upload_Image.php" class="btn btn-outline-primary">Upload New</a>
			</div>
<br>
<?php require_once'footer_end.php'; ?>
<?php
}
else {
	header('Location:../loginpage.php');
}
?>


