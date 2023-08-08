<?php //include('Database Creation/ProductList.php');?>
<?php //include('Database Creation/Users.php');?>
<?php //include('Database Creation/CartInfo.php');?>
<?php 
  session_start(); 
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  if(!isset($_SESSION['username'])){
	  $msg = "You must login first before you can proceed";
	  $login = "false";
	  $username = "";
  }
  else{
	  $msg = "Product added to your cart";
	  $login = "true";
	  $username = $_SESSION['username'];
  }
?>
<!DOCTYPE HTML>
<html>
<head>
	<title> Home </title>
	<link rel="stylesheet" type="text/css" href="Css/Main.css">	
</head>
<body>
<section>
		<!--
			Including the Header
		-->
		<?php include('Header.php');?>
		
		<div id="container2">
			<!--
				CSS Image Slider
			-->
			<section id="Slider">
				<div class="container">
					<input type="radio" id="i1" name="images" checked />
					<input type="radio" id="i2" name="images" />
					<input type="radio" id="i3" name="images" />		
					<div class="slide_img" id="one">						
							<img src="Sample/Slider/Ads3.jpg">				
								<label class="prev" for="i5"><img src="Images/Sliderleft.png"></label>
								<label class="next" for="i2"><img src="Images/Sliderright.png"></label>
					</div>		
					<div class="slide_img" id="two">		
							<img src="Sample/Slider/Ads2.jpg">			
								<label class="prev" for="i1"><img src="Images/Sliderleft.png"></label>
								<label class="next" for="i3"><img src="Images/Sliderright.png"></label>
						
					</div>			
					<div class="slide_img" id="three">
							<img src="Sample/Slider/Ads1.png">
								<label class="prev" for="i2"><img src="Images/Sliderleft.png"></label>
								<label class="next" for="i4"><img src="Images/Sliderright.png"></label>
					</div>
					<div id="nav_slide">
					<label for="i1" class="dots" id="dot1"></label>
					<label for="i2" class="dots" id="dot2"></label>
					<label for="i3" class="dots" id="dot3"></label>
					</div>
				</div>
			</section>
			<section id="Hotdeals">
				<img src="Sample/Random/Test.jpg"/>
				<div id="HotBanner">
					<h2>Hot Deals</h2>
				</div>
			</section>
			
			<!-- 
				List Product Stored in Database name Data.php
			-->
			<section id="LatestProduct">
				<h2>Latest Product</h2>
				<section class="display">
					<?php
						$con = mysqli_connect('localhost','root','','Products') or die("We couldn't connect to the server Please try again.");
						$query = "SELECT * FROM productlist order by `ProductID` DESC";
						$results = mysqli_query($con,$query);	
						$rowCount = mysqli_num_rows($results);
							for($num1 = 1; $num1 <= 4; $num1++){
								$row = mysqli_fetch_array($results);
								$Product = $row['ProductName'];
								$Seller = $row['Seller'];
								$Price = $row['Price'];
								$Image = $row['Image'];
								echo '<div class="box">';
								echo '<div class="grid-images">';
								echo "<a href='Products.php'><img src='Images/Product/".$Image."'/>";
								echo '<p class="Product">'.$Product.'</p></a>';
								echo '<p class="Seller">'.$Seller.'</p>';
								echo '<p class="Price">₱'.$Price.'.00</p>';
							if(isset($_SESSION['username'])){
								$username = $_SESSION['username'];
								if($username == $Seller){
									echo '<button type="button" class="disabledbtn"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to Cart</button>';
								}
								else{
									echo '<button type="button" class="AddtoCart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to Cart</button>';
								}
							}
							else{
									echo '<button type="button" class="AddtoCart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to Cart</button>';
							}
								echo '</div>';
								echo '</div>';
							}
					?>
				</section>
			</section>
		</div>
			<!--
				Including the Footer
			-->
			<?php include('Footer.php');?>
			
		<!--
		<div id="AdContainer">
			<button id="close"><i class="fa fa-times" aria-hidden="true"></i></button>
			<a href="#"><img src="Banner.png"></a>
		</div>-->
	</section>
</body>
<!--
<script>
	var Ads = document.getElementById("AdContainer");
	var button = document.getElementById("close");

	// When the user clicks on button (x), close the Ads
	button.onclick = function() { 
	  Ads.style.display = "none";
	}
	</script>
-->
</html>
<script src="Js/jquery.min.js"></script>
<script>
	$('.AddtoCart').on('click',function(e){
		var div = $(this).closest('.grid-images');
		var sliced = $(div).find(".Seller").text();
		var login = "<?php echo $login; ?>";
		if(login == "false")
			alert("<?php echo $msg ?>");
		else if("<?php echo $username ?>" == sliced){
			alert("You cannot buy your own item");
		}
		else{
			alert("<?php echo $msg ?>");
			var id = $(div).find(".ID").text();
			var products = $(div).find(".Product").text();
			var price = $(div).find(".Price").text();
			var pricesliced = price.slice(1);
			var intconvert = parseInt(pricesliced);
			var buyer = "<?php echo $username ?>";
			$.post("MyCartProcess.php", {
				id,
				products,
				sliced,
				buyer,
				intconvert
			}, function(data, status){
				$("#success").html(data);
			});
		}
		
	});
</script>
