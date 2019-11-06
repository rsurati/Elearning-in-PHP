<?php
session_start();
if(isset($_SESSION['manager']) or isset($_SESSION['admin']))
{

?>
<?php require_once '../header.php'; ?>



	<div class="container alert alert-success" role="alert" style="margin-top: 100px;">
 			Enter Post Details
	</div>
	<div class="container">
		<form action="" method="post">
			<?php require_once'../dbconnect.php';?>
					<?php
					if(isset($_SESSION['manager']))
					{
					$user=$_SESSION['manager'];
					}
					elseif(isset($_SESSION['admin']))
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
					?>
					<input type="hidden" name="User_ID" value="<?php echo $addr; ?>">
					<?php
					$q="SELECT `Tech_ID`, `Tech_Name` FROM `tech_list`";
					$stat=$conn->prepare($q);
					$stat->execute();
					$fd=$stat->fetchAll();


					echo '<div class="form-group"><select name="Tech_ID" class="form-control" onchange="this.form.submit()"><option value="0">Select Technology</option>';


					foreach ($fd as $value) {
						echo"<option value=".$value['Tech_ID'].">".$value['Tech_Name']."</option>";
					 } ?>
					
					</select>
	</div>
				<?php
	if(isset($_POST['Tech_ID']))
								{		
										$q="SELECT * FROM tech_topics where Tech_ID=".$_POST['Tech_ID'];
										$stat=$conn->prepare($q);
										$stat->execute();
										$fs=$stat->fetchAll();						
								?>

								<form action="" method="post">
									<input type="hidden" name="Tech_ID" value="<?php echo($_POST['Tech_ID']); ?>">
									<input type="hidden" name="User_ID" value="<?php echo$_POST['User_ID'];?>">
									<select class=" form-control m-auto" name="Topic_ID">
									<option value="0">Select Topic</option>

								<?php
									
								foreach ($fs as $value) {

										echo "<option value=".$value['Topic_ID'].">".$value['Topic_Name']."</option>";
								}echo'</select>';

								?>
								<br><br>
								Post Title
								<input type="text" name="Post_Title" class="form-control" />
								<br><br>
								Post Content
								<textarea name="Post_Text" class="form-control" placeholder="Enter Post Content And edit your post you used html tags" rows="15"></textarea>
								<br><br>

								<input type="submit" name="sub" value="Submit" class="btn btn-primary" />
								</form>
							

								<?php
								}

								?>








	<?php



	if(isset($_POST['sub']))
	{ try{
		$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
		$q='INSERT INTO `tech_post`(`Post_Title`, `Post_Text`, `Topic_ID`, `Adder_ID`) VALUES ("'.$_POST['Post_Title'].'","'.$_POST['Post_Text'].'",'.$_POST['Topic_ID'].','.$_POST['User_ID'].')';
		$flag=$conn->exec($q);
		
		if($flag==True)
		{
			header('location:Manage_Post.php?Tech_ID='.$_POST['Tech_ID'].'&Topic_ID=0');
			echo 'success';
		}
		else
		{
			echo'<div class="container alert alert-success" role="alert" style="margin-top: 100px;">
 			Please Enter valid Details
	</div>';
		}

		}
catch(PDOException $e){
	echo $e->getMessage();
	die();
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








