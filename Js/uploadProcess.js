	/*
		to prevent a resubmit on refresh and back button.
	*/
	if ( window.history.replaceState ) {
		window.history.replaceState( null, null, window.location.href );
	}

	$('table tbody').on('click','.btn',function(e){
		e.preventDefault();
		var tbrow = $(this).closest('tr');
		var product = $(tbrow).find("#productname").text();
		var inventory = $(tbrow).find("#inv").text();
		$.post("UploadProcess.php", {
			product,
			inventory
		}, function(data, status){
			$("#success").html(data);
		});
		tbrow.remove();
	});
	function Upload(){
		document.getElementById("upload").style.display = "block";
		document.getElementById("manage").style.display = "none";
	}
	function Manage(){
		document.getElementById("upload").style.display = "none";
		document.getElementById("manage").style.display = "block";
	}
	/* OPTIONAL BUTTON
	function View(){
		document.getElementById("upload").style.display = "none";
		document.getElementById("view").style.display = "block";
		document.getElementById("manage").style.display = "none";
	}
	*/
	window.addEventListener('load',function(e){
		document.getElementById("submitupload").disabled = true;
		document.getElementById("submitupload").style.cursor = "no-drop";
		document.getElementById("manage").style.display = "none";
	});
	function viewImage(event) 
		{
			 var reader = new FileReader();
			 reader.onload = function()
			 {
			  var output = document.getElementById('prodImage');
			  output.src = reader.result;
			 }
			 reader.readAsDataURL(event.target.files[0]);
			 validitation();
		}
	function validitation(){
		var file = document.getElementById("file");
		var product = document.getElementById("pname");
		var categ = document.getElementById("categ");
		var desc = document.getElementById("description");
		var price = document.getElementById("price");
		if(file.value != '' && product.value !== '' && !(price.value%1 != 0) && price.value != 0 &&price.value != '' && product.value.length > 7 && categ.value !== "Category" && desc.value != '' && desc.value.length > 30){
			document.getElementById("submitupload").disabled = false;
			document.getElementById("submitupload").style.cursor = "pointer";
		}
		else{
			document.getElementById("submitupload").disabled = true;
			document.getElementById("submitupload").style.cursor = "no-drop";
		}
	}