//Limiting text in the products description
function limitText(maxLength) {
			var nodes = document.getElementsByClassName('Description');
				for(x of nodes){
					if(x.innerHTML.length > maxLength)
						x.innerHTML = x.innerHTML.substr(0,maxLength) + '...';	
				}
			}
		//function activated when pages loaded.
document.addEventListener("DOMContentLoaded", function(event) { 
	limitText(120);
});