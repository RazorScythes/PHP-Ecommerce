window.addEventListener('load',function(e){
		document.getElementById("con1").style.display = "block";
		document.getElementById("con2").style.display = "none";
		document.getElementById("con3").style.display = "none";
		document.getElementById("con4").style.display = "none";
	});
		$(document).ready(function(){
			$("#file").change(function(){
				var image = document.getElementById("file").value;
				var img = getName(image);
				$.post("ProfileData.php", {
					image: img
				}, function(data, status){
					$("#success").html(data);
				});
			});
			$(document).on('change', '#file', function(){
				  var name = document.getElementById("file").files[0].name;
				  var form_data = new FormData();
				  var ext = name.split('.').pop().toLowerCase();
				  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
				  {
					alert("Invalid Image File");
				  }
				  var oFReader = new FileReader();
				  oFReader.readAsDataURL(document.getElementById("file").files[0]);
				  var f = document.getElementById("file").files[0];
				  var fsize = f.size||f.fileSize;
				  if(fsize > 2500000)
				  {
					alert("Image File Size is very big");
				  }
				  else
				  {
					form_data.append("file", document.getElementById('file').files[0]);
					$.ajax({
						url:"UploadImage.php",
						method:"POST",
						data: form_data,
						contentType: false,
						cache: false,
						processData: false,
					});
				  }
			 });
		});
		function getName(ID) {
			var fullPath = ID;
			if (fullPath) {
				var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
				var filename = fullPath.substring(startIndex);
				if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
					filename = filename.substring(1);
				}
				return filename;
			}
		 }
		function viewImage(event) 
		{
			 var reader = new FileReader();
			 reader.onload = function()
			 {
			  var output = document.getElementById('uploadImage');
			  output.src = reader.result;
			 }
			 reader.readAsDataURL(event.target.files[0]);
		}
		function profile(){
			document.getElementById("con2").style.display = "none";
			document.getElementById("con3").style.display = "none";
			document.getElementById("con4").style.display = "none";
			document.getElementById("con1").style.display = "block";
		}
		function updateProfile(){
			document.getElementById("con1").style.display = "none";
			document.getElementById("con3").style.display = "none";
			document.getElementById("con4").style.display = "none";
			document.getElementById("con2").style.display = "block";
		}
		function changePassword(){
			document.getElementById("con1").style.display = "none";
			document.getElementById("con2").style.display = "none";
			document.getElementById("con4").style.display = "none";
			document.getElementById("con3").style.display = "block";
		}
		function deleteAccount(){
			document.getElementById("con1").style.display = "none";
			document.getElementById("con2").style.display = "none";
			document.getElementById("con3").style.display = "none";
			document.getElementById("con4").style.display = "block";
		}