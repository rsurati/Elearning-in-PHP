


				<?php require_once'../dbconnect.php';?>
							<?php
							
							$b=array('<script>','</script>');
					$q="UPDATE `tech_topics` SET `Topic_Name`='".str_ireplace($b,'',$_GET['T_Name'])."' WHERE Topic_ID=".$_GET['T_ID'];
							$stat=$conn->prepare($q);
							$stat->execute();
							header('location:Manage_Topics.php?Tech_ID=1');
				
								?>
								
								