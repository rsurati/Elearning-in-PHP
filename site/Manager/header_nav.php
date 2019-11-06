

<nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
	<a class="navbar-brand text-white" href="#">E-learning</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav">
			<li class="nav-item active">
				<a class="nav-link text-white" href="<?php if(isset($_SESSION['manager']))
															{echo 'Manager_Dashboard.php';}
															else if(isset($_SESSION['admin']))
															{
															echo '../Admin/Admin_Dashboard.php';
															}



				?>">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-white" href="../logoutpage.php">Logout</a>
			</li>
			
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown">
					Menu
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="../Manager/Manage_Topics.php?Tech_ID=1">Technology Topic</a>
					<a class="dropdown-item" href="../Manager/Manage_Post.php?Tech_ID=1&Topic_ID=">Technology Post</a>
					<a class="dropdown-item" href="Manage_Images.php">Images</a>
					<?php
					error_reporting(0);
					if($_SESSION['admin'])
					{
						echo '<a class="dropdown-item" href="../Admin/Manage_User.php">User</a>';
						echo '<a class="dropdown-item" href="../Admin/Manage_Tech.php">Technology</a>';
					}

					?>
				</div>
			</li>
		</ul>
	</div>
</nav>
