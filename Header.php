<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="Css/Header.css">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div id="wrap">
		<!-- Display Welcome User on the upper right of the webpage when a user is login -->
		<div id="nav">		
			<ul>
				<?php  if (isset($_SESSION['username'])) : ?>
					<li><p>Welcome <?php echo $_SESSION['username']; ?></p></li>
				<?php endif ?>
			</ul>		
		</div>
		<header>
			<!-- Header -->
			<section>
				<a href="#"><img src="Images/Logo.png" width="300" height="80"></a>
				<div class="search-box">
					<form method="POST" action="ItemSearch.php">
					<input type="text" name="Items" class="search-txt" placeholder="Search Product" autocomplete="off"/>
					<input type="submit" name="Search" style="position: absolute; left: -9999px; width: 1px; height: 1px;" tabindex="-1" />
					<a class="search-btn" href="#">
					<i class="fa fa-search" aria-hidden="true"></i>
					</a>
					</form>
				</div>
				<ul>					
					<?php  if (isset($_SESSION['username'])) : ?>
						<li><a href="MyCart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><br>My Cart</a>&nbsp&nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp&nbsp</li> 
						<li><a href="profile.php"><i class="fa fa-user" aria-hidden="true"></i><br>Account</a>&nbsp&nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp&nbsp</li>
						<li><a href="Upload.php"><i class="fa fa-upload" aria-hidden="true"></i><br>Upload</a></li>
					<?php endif ?>
					<?php  if (!isset($_SESSION['username'])) : ?>
						<li><a href="login.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i><br>My Cart</a>&nbsp&nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp</li> 
						<li><a href="login.php"><i class="fa fa-lock" aria-hidden="true"></i><br>&nbsp&nbspLogin</a>&nbsp&nbsp&nbsp&nbsp&nbsp|&nbsp&nbsp&nbsp</li>
						<li><a href="Registration.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i><br>Register</a></li>
					<?php endif ?>
				</ul>
			</section>
			<!-- Navigation Bar -->
			<nav>						
				<ul>
					<li class="home"><a href="Index.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
					<li><a href="Products.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Products</a></li>
					<li><a href="Features.php"><i class="fa fa-star-o" aria-hidden="true"></i> Features</a></li>
					<li><a href="About.php"><i class="fa fa-file-text-o" aria-hidden="true"></i> About</a></li>
					<li><a href="Contact.php"><i class="fa fa-phone" aria-hidden="true"></i> Contact</a></li>
				</ul>
			</nav>
		</header>
</body>
</html>