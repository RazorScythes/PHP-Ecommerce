<?php
if(!isset($_SESSION)){
   session_start();  
}
	$con = mysqli_connect('localhost','root','','userprofile') or die("We couldn't connect to the server Please try again.");
	echo "<h1>MyCart List</h1>
			<div id='manage'>
			<table id='table'>
				<thead>
					<tr>
						<th id='prodname'>Product Name</th>
						<th id='seller'>Seller</th>
						<th id='category'>Category</th>
						<th id='quantity'>Quantity</th>
						<th id='price'>Price</th>						
						<th id='action'>Action</th>
					</tr>
				</thead>
				<tbody id='tbody'>";
			if(isset($_SESSION['username'])){
				$username = $_SESSION['username'];
				$query = "SELECT * FROM cartinfos WHERE Username = '$username'";
				$results = mysqli_query($con,$query);	
				$noOFRows = mysqli_num_rows(mysqli_query($con,$query));
				for($num1 = 1; $num1 <= $noOFRows; $num1++){
					$row = mysqli_fetch_array($results);
					$Product = $row['ProductName'];
					$Seller = $row['Seller'];
					$Category = $row['Category'];
					$Quantity = $row['Quantity'];
					$Price = $row['Price'];
					echo "<tr>";
					echo	 '<td class="productname">'.$Product.'</td>';
					echo	 '<td class="seller2">'.$Seller.'</td>';
					echo	 '<td class="category">'.$Category.'</td>';
					echo	 '<td class="quantity">'.$Quantity.'</td>';
					echo	 '<td class="cost">'.$Price.'</td>';
					echo 	"<td><button type='button' class='btn'>Remove</button></td>";
					echo "</tr>";
				}
				if($noOFRows > 0){
						echo	'<tr>
									<td class="hide"></td>
									<td class="hide"></td>
									<td class="hide"></td>
									<td id="total">Total =</td>
									<td id="totalprice">₱</td>
									<td><button type="button" class="btnall">Remove All</button></td>
								</tr>';						
								
				}
			}		
				echo 		"<tbody>
						</table>
					</div>";
?>