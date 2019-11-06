


				<?php require_once'../dbconnect.php';?>
							<?php
							try{$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION); 
				$b=array('<script>','</script>');
					$q="update tech_list set Tech_Name='".$_POST['Tech_Name']."', Tech_Desc='".str_ireplace($b,'',$_POST['Tech_Desc'])."' where Tech_ID=".$_POST['Tech_ID'];
							$stat=$conn->prepare($q);
							$stat->execute();
							header('location:Manage_Tech.php');
				}catch(PDOException $e)
				{
					echo $e->getMessage();
				}
								?>
								
								