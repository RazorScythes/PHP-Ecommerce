<?php 
  session_start(); 
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
  if(isset($_SESSION['username'])){
	  $username = $_SESSION['username'];
  }
?>
<html>
<head>
	<title> Products </title>
	<link rel="stylesheet" type="text/css" href="Css/Main.css">	
	<link rel="stylesheet" type="text/css" href="Css/MyCart.css">
</head>
<body>
<section>
		<!--
			Including the Header
		-->
		<?php include('Header.php');?>
		
		<div id="container">
			<?php include('POST/ViewCart.php');?>
			<button id="purchase"><i class="fa fa-money" aria-hidden="true"></i>&nbspPurchase</button>
			<p class="note">No payment form included, This is just a demonstration</p>
		</div>
		<!-- Clearing float -->
		<div class="clear"></div>	

		<!--
			Including the Footer
		-->
		<?php include('Footer.php');?>
</section>
</body>
</html>
<script src="Js/jquery.min.js"></script>
<script>
	//onload display users registered cart list
	document.addEventListener("DOMContentLoaded", function(event) { 
		if($(".productname").length >= 1){
			var tdContainer = 0;
			var convert = 0;
			var quantityconvert = 0;
			for (var k = 0; k < $(".cost").length; k++){
				convert = $(".cost")[k].innerText;
				quantityconvert = $(".quantity")[k].innerText;
				tdContainer += Number(convert) * Number(quantityconvert);
			}
			document.getElementById("totalprice").innerHTML = "₱ " + tdContainer;
		}
	});
	//adds the product in user mycart
	$(document).ready(function(){
		$('table tbody').on('click','.btn',function(e){
			e.preventDefault();
			var tbrow = $(this).closest('tr');
			var product = $(tbrow).find(".productname").text();
			var seller = $(tbrow).find(".seller").text();
			var cost = $(tbrow).find(".cost").text();
			var costconv = parseInt(cost);
			var buyer = "<?php echo $username ?>";
			$.post("MyCartProcess.php", {
				buyer,
				product,
				seller,
				costconv
			}, function(data, status){
				$("#success").html(data);
			});
			
			var tdContainer = 0;
			var convert = 0;
			var quantityconvert = 0;
			for (var k = 0; k < $(".cost").length; k++){
				convert = $(".cost")[k].innerText;
				quantityconvert = $(".quantity")[k].innerText;
				tdContainer += Number(convert) * Number(quantityconvert);
			}
			var item = $(tbrow).find(".cost").text();
			var quantity = $(tbrow).find(".quantity").text();
			var total = tdContainer - (Number(item) * Number(quantity));
			document.getElementById("totalprice").innerHTML = "₱ " + total;
			tbrow.remove();
		});
		//display the details in modal
		$('table tbody').on('click','.btnall',function(e){
			e.preventDefault();
			var tbrow = $(this).closest('tbody');
			var product = $(tbrow).find(".productname").text();
			var seller = $(tbrow).find(".seller2").text();
			var cost = $(tbrow).find(".cost").text();
			var costconv = parseInt(cost);
			var buyer = "<?php echo $username ?>";
			for (var k = 0; k < $(".productname").length; k++){
				var product = $(".productname")[k].innerText;
				var seller = $(".seller2")[k].innerText;
				var cost = $(".cost")[k].innerText;
				var costconv = parseInt(cost);
				var buyer = "<?php echo $username ?>";
				$.post("MyCartProcess.php", {
					buyer,
					product,
					seller,
					costconv
				}, function(data, status){
					$("#success").html(data);
				});
			}
			tbrow.remove();
		});
		//purchase proccess
		$('#container').on('click','#purchase',function(e){
			if($(".productname").length == 0){
				alert("There are no items in your cart!");
			}
			else{
				alert("Purchase successful!");
				e.preventDefault();
				var tbrow = document.getElementById("tbody");
				var buyer = "<?php echo $username ?>";
				for (var k = 0; k < $(".productname").length; k++){
					var product = $(".productname")[k].innerText;
					var seller = $(".seller2")[k].innerText;
					var quantity = $(".quantity")[k].innerText;
					var quantityconv = Number(quantity);
					var buyer = "<?php echo $username ?>";
					$.post("MyCartProcess.php", {
						buyer,
						product,
						seller,
						quantityconv
					}, function(data, status){
						$("#success").html(data);
					});
				}
				tbrow.remove();
			}
		});
	});
</script>