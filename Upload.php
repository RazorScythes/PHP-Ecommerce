<?php 
  session_start(); 
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE HTML>
<html>
<head>
<title> Upload Product </title>
<link rel="stylesheet" type="text/css" href="Css/Main.css">	
<link rel="stylesheet" type="text/css" href="Css/Upload.css">
<link rel="stylesheet" type="text/css" href="Css/Profile.css">
</head>
<body>
	<section>
		<!--
			Including the Header
		-->
		<?php include('Header.php');?>
	
		<div id="container2">
			<div class="clear"></div>
			<div id="profileBox">
				<?php include('ProfileData.php');?>
				<p id="success"></p>
				<?php
					$con = mysqli_connect('localhost','root','','userprofile') or die("We couldn't connect to the server Please try again.");
					if(isset($_SESSION['username'])){
							$username = $_SESSION['username'];
							$query = "SELECT * from user WHERE Username = '$username'";
							$results = mysqli_query($con,$query);
							$row = mysqli_fetch_assoc($results);
								$user = $row['Username'];
								$image = $row['Picture'];
								$fn = $row['First_Name'];
								$ln = $row['Last_Name'];
							echo "<img id='uploadImage' src='UserData/".$username."/Upload/".$image."'/>";
							echo "<p id='fullName'>".$fn." ".$ln."</p>";
					}
					else{
							echo "<img id='uploadImage'/>
								  <p id='fullName'></p>";
					}
				?>	
				<button onclick="Upload()">Upload Product</button>
				<!-- OPTIONAL <button onclick="View()">View Product</button> -->
				<button onclick="Manage()">Manage Product</button>
			</div>
			<div id="Uploadform">
				<div id="upload">
					<h2>Upload Products</h2>
					<img id="prodImage"/>
					<form method="POST" enctype="multipart/form-data">
						<input type='file' name='file' id='file' accept='image/x-png,image/gif,image/jpeg' onchange="viewImage(event)"/>
						<div class="productname"><label>Product Name</label><br><input type="text" onchange="validitation()" name="pname" id="pname" maxlength="50" autocomplete="off"/></div>
						<div class="price"><label>Price</label><br><input type="text" onchange="validitation()" name="price" onchange="validitation()" id="price" maxlength="50" autocomplete="off"/></div>
						<div class="inventory"><label>Inventory</label><br><select name="inventory" onchange="validitation()">
							<option value = "1"> 1 </option>
							<option value = "2"> 2 </option>
							<option value = "3"> 3 </option>
							<option value = "4"> 4 </option>
							<option value = "5"> 5 </option>
							<option value = "6"> 6 </option>
							<option value = "7"> 7 </option>
							<option value = "8"> 8 </option>
							<option value = "9"> 9 </option>
							<option value = "10"> 10 </option>
							<option value = "11"> 11 </option>
							<option value = "12"> 12 </option>
							<option value = "13"> 13 </option>
							<option value = "14"> 14 </option>
							<option value = "15"> 15 </option>
							<option value = "16"> 16 </option>
							<option value = "17"> 17 </option>
							<option value = "18"> 18 </option>
							<option value = "19"> 19 </option>
							<option value = "20"> 20 </option>
							<option value = "21"> 21 </option>
							<option value = "22"> 22 </option>
							<option value = "23"> 23 </option>
							<option value = "24"> 24 </option>
							<option value = "25"> 25 </option>
							<option value = "26"> 26 </option>
							<option value = "27"> 27 </option>
							<option value = "28"> 28 </option>
							<option value = "29"> 29 </option>
							<option value = "30"> 30 </option>
							</select></div>
						<div class="category"><label>Category</label><br><select id="categ" name = "category" onchange="validitation()">
							<option value = "Category"> Category </option>
							<option value = "Cleaning"> Cleaning </option>
							<option value = "Personal"> Personal </option>
							<option value = "Novelty"> Novelty </option>
							<option value = "Perfumed"> Perfumed </option>
							<option value = "Liquid"> Liquid </option>
							<option value = "Beauty"> Beauty </option>
							<option value = "Guest"> Guest </option>
							</select></div>
						<div class="description"><label>Description</label><br><textarea id="description" onchange="validitation()" name="description" row = "10" col="25"></textarea></div>
						<input type="submit" name="UploadProduct" id="submitupload" class="upload"/>
					</form>
				</div>
				
				<?php include('POST/UploadProduct.php');?>
			</div>
		</div>
		
		<!--
			Including the Footer
		-->
		<?php include('Footer.php');?>
	</section>
</body>
</html>
<script src="Js/jquery.min.js"></script>
<script src="Js/uploadProcess.js"></script>