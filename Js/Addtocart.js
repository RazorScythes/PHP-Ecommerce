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