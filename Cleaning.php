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
	<title>Cleaning </title>
	<link rel="stylesheet" type="text/css" href="Css/Main.css">	
	<link rel="stylesheet" type="text/css" href="Css/Products.css">
	<script src="Js/limitText.js"></script>
</head>
<body>
<section>
		<!--
			Including the Header
		-->
		<?php include('Header.php');?>
		
		<div id="container2">
			<section id="categ">
				<ul>
					<li><a href="Cleaning.php">Cleaning</a>
					<li><a href="Personal.php">Personal</a>
					<li><a href="Novelty.php">Novelty</a>
					<li><a href="Perfumed.php">Perfumed</a>
					<li><a href="Liquid.php">Liquid</a>
					<li><a href="Beauty.php">Beauty</a>
					<li><a href="Guest.php">Guest</a>
				</ul>
			</section>
			<section class="proddisplay">
			<?php	
						$con = mysqli_connect('localhost','root','','Products') or die("We couldn't connect to the server Please try again.");
						$searchq = "Cleaning";
						include('POST/Category.php');
			?>
			<!-- Clearing float -->
			<div class="clear"></div>	
			<!-- Popup Box when View Details Button is Clicked -->
			<div id="modalWindow">
				<div>
					<a href="#close" id="modalclose"><i class="fa fa-times" aria-hidden="true"></i></a><br>
					<img src="" id="modalimg">
					<div id="modaldetails">
						<p class="ID" style="display:none;"></p>
						<p id="modalProduct"></p>
						<p id="modalSeller"></p>
						<p id="modalPrice"></p>
						<p id="modalBought"></p>
					</div>
					<p id="modalDescription"></p>
				</div>
			</div>
			</section>
		</div>
		<!--
			including the Footer
		-->
		<?php include('Footer.php');?>
</section>
</body>
</html>
<script src="Js/jquery.min.js"></script>
<script>
	$('.Cart').on('click',function(e){
		var div = $(this).closest('.grid-images2');
		var seller = $(div).find(".Seller").text();
		var sliced = seller.slice(8);
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
	$('.fullDetails').on('click',function(e){
		$('#modalimg').attr('src');
		$('#modalProduct').empty(); 
		$('#modalSeller').empty(); 
		$('#modalPrice').empty(); 
		$('#modalBought').empty(); 
		$('#modalDescription').empty(); 
		var div = $(this).closest('.grid-images2');
		var img = $(div).find('.prodImages').attr('src');
		var pr = $(div).find(".Product").text();
		var s = $(div).find(".Seller").text();
		var p = $(div).find(".Price").text();
		var b = $(div).find(".Bought").text();
		var d = $(div).find(".Description").text();
		$('#modalimg').attr('src', img);
		$('#modalProduct').append(pr); 
		$('#modalSeller').append(s); 
		$('#modalPrice').append(p); 
		$('#modalBought').append(b); 
		$('#modalDescription').append(d); 
	});
</script>
