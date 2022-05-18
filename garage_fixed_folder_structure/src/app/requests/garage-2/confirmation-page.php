<html>
	<head>
		<link rel="STYLESHEET" TYPE="TEXT/CSS" HREF="../style/style_php.CSS">      
		<title>Insert</title>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./confirmation.css">
	<link rel="stylesheet" href="../style/garage.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <style>
			label {
    display: block;
    font: 1rem 'Fira Sans', sans-serif;
}

input,
label {
    margin: .4rem 0;
}

        </style>
	</head>
	<body>
		<?php
    session_start();
	$userID = $_SESSION['userID'];
	$session = $_SESSION['session'];
	include("../../module/connection.php");
	include("../../includes/navigation/garage-navigation-bar.php");
	$link=KonektatuDatuBasera();

	$Tweek = strftime('%V');
	
	$week = $_SESSION['week'];
	$date = $_SESSION['date'];
?>


	<div id='total'>
	<div id='selectedHours'> 
				<h2>Selected hours:</h2>
			 	<div id='selectedHoursList'>
					<?php
						$egune = 86400;
						$Y_2022_str =  date("2022-01-03");
						$Y_2022_int = strtotime($Y_2022_str);
						$astebete = $egune * 7;
						$showHours = mysqli_query($link,"select Hours, week from garage_2 where session = '$session' and buy = '0' ORDER by week ASC");
					
							if(mysqli_num_rows($showHours)!=0){
								echo "<table>";
								echo "<tr> <th>Day</th> <th>Week day</th> <th>Hours</th> </tr>";
								while($erregistroa = mysqli_fetch_array($showHours)){
								$Hours_and_day = $erregistroa["Hours"];
								$Hours_and_day = explode("_", $Hours_and_day);
								$Selected_Hours_int = intval($Hours_and_day[0]);
								$Selected_day_int = intval($Hours_and_day[1]);
								$Selected_day_int = $Y_2022_int + (($Selected_day_int - 1) * $egune) + ($astebete * ($erregistroa["week"] -1)); // Selected day * day + week * selected week. Example. Selected day = 3, selected week = 19  ==>   3 * 86400 + (86400 * 7 * 19)
								
								$Selected_week_day = strftime('%A',$Selected_day_int); ///////////////
								$Selected_day_str = date("Y-m-d", $Selected_day_int); //////////////

								$Selected_Hours_int_start = $Selected_Hours_int;
								$Selected_Hours_int_end = $Selected_Hours_int + 2;
								$Selected_Hours_str = $Selected_Hours_int_start.":00-".$Selected_Hours_int_end.":00"; ///////////////

								printf("
									<tr>
										<td> $Selected_day_str </td>
										<td> $Selected_week_day </td>
										<td> $Selected_Hours_str </td>
									</tr>
								");
							}
							echo "</table>";

						}
					?>
				</div>
			</div>
		<div id='selectedProducts'>
			<h2>Selected products:</h2>
			<div id="selectedProductsList">
			<?php
			
			$buying_products = mysqli_query($link,"select product_id, amount, price, total_price from buying_products where session = '$session' and buy = '0'");
			
		
		if (mysqli_num_rows($buying_products) != 0) {
			?>
		<table id ="tabla" >
		<Tr>
		<Th>Name</Th><Th>Description</Th><Th>Price</Th><Th>Amount</Th><Th>Total price</Th>
		</Tr>
			<?php
			
				while($buying_products_array = mysqli_fetch_array($buying_products))
				{
					$Bproduct_id = $buying_products_array[0];
					$emaitza = mysqli_query($link,"select name, description from products where product_id = $Bproduct_id");
					$emaitza = mysqli_fetch_array($emaitza);

					printf("</td><td>%s</td><td>%s</td>",$emaitza["name"],$emaitza["description"]);
					printf("<td>%.2f€</td><td>%d</td><td>%.2f€</td><td></td></tr>", $buying_products_array["price"], $buying_products_array["amount"], $buying_products_array["total_price"], $buying_products_array["product_id"] );
				} 
			}
		 ?>
		</table>

			</div>
		</div>

	</div>
	<div id="totalPrice">
		<div id="totalPriceTitle"><h1> TOTAL PRICE:</h1></div>
		
		<?php 
		$total_price = 0;
		$Hours_price = mysqli_query($link,"select * from garage_2 where session = '$session' and buy = '0'");
		while($erregistroa = mysqli_fetch_array($Hours_price)){
			$total_price += 20;
		}

		$Product_price = mysqli_query($link,"select total_price from buying_products where session = '$session' and buy = '0'");
		while($erregistroa = mysqli_fetch_array($Product_price)){

			$total_price += $erregistroa["total_price"];
		}
		echo "<div id='PriceTotal'>";
		echo "<h1>$total_price €</h1>";
		echo "</div>";
		
		?>

	</div>

<div id="buttons">
<a href="./garage.php" ><button type="button" class="btn btn-primary btn-lg">Back</button></a>
<a href="garage-buy.php">
		<button style="float:right;" type="button" class="btn btn-success btn-lg">Confirm</button>
	</a>
</div>
	</body>
	</html>