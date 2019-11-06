


				<?php require_once'../dbconnect.php';?>
							<?php
							$b=array('<script>','</script>');

					$q="UPDATE `tech_post` SET `Post_Title`='".$_POST['Post_Title']."',`Post_Text`='".str_ireplace($b,'',$_POST['Post_Text'])."'  WHERE Post_ID=".$_POST['Post_ID'];
							$stat=$conn->prepare($q);
							$stat->execute();
						
							header('location:Manage_Post.php?Topic_ID=0');
				
								?>
								
								