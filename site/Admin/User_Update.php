


				<?php require_once'../dbconnect.php';?>
							<?php
							
							
					$q="update user set User_Name='".$_GET['User_Name']."',User_Email='".$_GET['User_Email']."',User_Password='".$_GET['User_Password']."',User_Role='".$_GET['User_Role']."' where User_ID=".$_GET['User_ID'];
							$stat=$conn->prepare($q);
							$stat->execute();
							header('location:Manage_USer.php');
				
								?>
								
								