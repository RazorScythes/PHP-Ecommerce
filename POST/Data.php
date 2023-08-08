<?php
if(!isset($_SESSION)){
   session_start();  
}
	$con = mysqli_connect('localhost','root','','Products') or die("We couldn't connect to the server Please try again.");
	if(isset($_POST['Search'])){
			$searchq = $_POST['Items'];
			$query = "SELECT * FROM productlist WHERE ProductName LIKE '%$searchq%'";
			$results = mysqli_query($con,$query);
			if (mysqli_num_rows($results) == 0) {
					echo '<div class="notFoundDisplay">';
					echo '<h3> Opps there is no item related to your search.</h3>';
					echo '</div>';
			}
			else{
				echo '<h2>Search product name like = "'.$searchq.'", Found('.mysqli_num_rows($results).' Items)</h2>';
				$noOFRows = mysqli_num_rows($results);
				for($num1 = 1; $num1 <= $noOFRows; $num1++){
					$row = mysqli_fetch_array($results);
					$ID = $row['ProductID'];
					$Product = $row['ProductName'];
					$Seller = $row['Seller'];
					$Desc = $row['Description'];
					$Price = $row['Price'];
					$Image = $row['Image'];
					$Inventory = $row['Inventory'];
					$Purchased = $row['Purchased'];
					if($Inventory >= 1){
						echo '<div class="prod">';
						echo '<div class="grid-images2">';
						echo "<img class='prodImages' src='Images/Product/".$Image."'/>";
						echo '<div class="details">';
						echo '<p class="ID" style="display:none;">'.$ID.'</p>';
						echo '<p class="Product">'.$Product.'</p>';
						echo '<p class="Seller">Seller: <a href="#">'.$Seller.'</a></p>';
						echo '<p class="Price">₱'.$Price.'.00</p>';
						echo '<p class="Bought">'.$Purchased.' Bought</p>';
						echo '<p class="Description">'.$Desc.'</p>';
						echo '</div>';
				if(isset($_SESSION['username'])){
					$username = $_SESSION['username'];
					if($username == $Seller){
						echo '<button class="fullDetails"><a href="#modalWindow">View Details >></a></button>';
						echo '<button type="button" class="disabledContent" disabled><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to Cart</button>';
					}
					else{
						echo '<button class="fullDetails"><a href="#modalWindow">View Details >></a></button>';
						echo '<button type="button" class="Cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to Cart</button>';
					}
				}
				else{
						echo '<button class="fullDetails"><a href="#modalWindow">View Details >></a></button>';
						echo '<button type="button" class="Cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to Cart</button>';
				}
						echo '</div>';
						echo '</div>';
					}
				}
			}
	}
	else{
		$query = "SELECT * FROM productlist";
		$results = mysqli_query($con,$query);
		if (mysqli_num_rows($results) == 0) {
					echo '<div class="notFoundDisplay">';
					echo '<h3> There are no items registered at this moment.</h3>';
					echo '</div>';
		}
		else{
			$results = mysqli_query($con,$query);	
			$noOFRows = mysqli_num_rows(mysqli_query($con,"SELECT ProductID FROM productlist"));
				for($num1 = 1; $num1 <= $noOFRows; $num1++){
					$row = mysqli_fetch_array($results);
					$ID = $row['ProductID'];
					$Product = $row['ProductName'];
					$Seller = $row['Seller'];
					$Desc = $row['Description'];
					$Price = $row['Price'];
					$Image = $row['Image'];
					$Inventory = $row['Inventory'];
					$Purchased = $row['Purchased'];
					if($Inventory >= 1){
						echo '<div class="prod">';
						echo '<div class="grid-images2">';
						echo "<img class='prodImages' src='Images/Product/".$Image."' />";
						echo '<div class="details">';
						echo '<p class="ID" style="display:none;">'.$ID.'</p>';
						echo '<p class="Product">'.$Product.'</p>';
						echo '<p class="Seller">Seller: <a href="#">'.$Seller.'</a></p>';
						echo '<p class="Price">₱'.$Price.'.00</p>';
						echo '<p class="Bought">'.$Purchased.' Bought</p>';
						echo '<p class="Description">'.$Desc.'</p>';
						echo '</div>';
				if(isset($_SESSION['username'])){
					$username = $_SESSION['username'];
					if($username == $Seller){
						echo '<button class="fullDetails"><a href="#modalWindow">View Details >></a></button>';
						echo '<button type="button" class="disabledContent" disabled><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to Cart</button>';
					}
					else{
						echo '<button class="fullDetails"><a href="#modalWindow">View Details >></a></button>';
						echo '<button type="button" class="Cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to Cart</button>';
					}
				}
				else{
						echo '<button class="fullDetails"><a href="#modalWindow">View Details >></a></button>';
						echo '<button type="button" class="Cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to Cart</button>';
				}
						echo '</div>';
						echo '</div>';
					}
				}
		}
	}
?>