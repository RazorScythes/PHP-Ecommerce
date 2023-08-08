<?php
			$query = "SELECT * FROM productlist WHERE Category LIKE '$searchq'";
			$results = mysqli_query($con,$query);
			if (mysqli_num_rows($results) == 0) {
					echo '<div class="notFoundDisplay">';
					echo '<h3> Opps there is no item available in this category.</h3>';
					echo '</div>';
			}
			else{
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
					if($Inventory != 0){
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
?>