document.addEventListener("DOMContentLoaded", function(event) { 
		var tdContainer = 0;
		var convert = 0;
		var quantityconvert = 0;
		for (var k = 0; k < $(".cost").length; k++){
			convert = $(".cost")[k].innerText;
			quantityconvert = $(".quantity")[k].innerText;
			tdContainer += Number(convert) * Number(quantityconvert);
		}
		document.getElementById("totalprice").innerHTML = "₱ " + tdContainer;
	});
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