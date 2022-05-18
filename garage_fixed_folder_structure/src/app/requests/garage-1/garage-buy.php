<html>
	<head>
		<link rel="STYLESHEET" TYPE="TEXT/CSS" HREF="style_php.CSS">      
		<title>insert</title>
	</head>
	<body>
	<?php
    session_start();
	$userID = $_SESSION['userID'];
	$session = $_SESSION['session'];
?>

    <?php
			include("../../module/connection.php");
			$link=KonektatuDatuBasera();

			$MAXrent = mysqli_query($link,"select MAX(renting_id) from renting");
			$MAXrent = mysqli_fetch_array($MAXrent);
			$MAXrent = $MAXrent[0];

			$MAXsell = mysqli_query($link,"select MAX(selling_id) from selling");
			$MAXsell = mysqli_fetch_array($MAXsell);
			$MAXsell = $MAXsell[0];

			if ($MAXrent >= $MAXsell){
				$MAXrent = $MAXrent + 1;
				$MAXsell = $MAXrent;
			} else {
				$MAXsell = $MAXsell + 1;
				$MAXrent = $MAXsell;
			}

				// GARAGE 1 RENTED HOURS
				$emaitza=mysqli_query($link,"select week, Hours from garage_1 where session = $session and buy = '0'");
					while($erregistroa = mysqli_fetch_array($emaitza))
					{
						$userID = intval($userID);

						$week = $erregistroa[0];
						$week = intval($week);
						$Hours = $erregistroa[1];
						
						echo "Sartu beharko datuak:";
						echo "<br>";
						echo $MAXrent;
						echo " ";
						echo gettype($MAXrent);
						echo "<br>";
						echo $userID;
						echo " ";
						echo gettype($userID);
						echo "<br>";
						echo "1";
						echo "<br>";
						echo date("Y-m-d");
						echo "<br>";
						echo $week;
						echo " ";
						echo gettype($week);
						echo "<br>";
						echo $Hours;
						$Hours = (string)$Hours;
						echo " ";
						echo gettype($Hours);
						echo "<br>";
						echo "-----------";
						echo "<br>";
						echo "<br>";
						


							mysqli_query($link, "INSERT INTO renting  VALUES ($MAXrent,$userID,1,NOW(),$week, '$Hours', NULL)");



							// mysqli_query($link, "INSERT INTO renting  VALUES ($MAXrent,$userID,'1',NOW(),$week, $Hours, NULL)");


					}

					

				mysqli_query($link,"update garage_1 set buy = 1 where session = $session");

				// SELECTED PRODUCTS


				$emaitza=mysqli_query($link,"select product_id, amount, total_price from buying_products where session = $session and buy = '0'");
					while($erregistroa = mysqli_fetch_array($emaitza))
					{
						$product_id = $erregistroa[0];
						echo $product_id = intval($product_id);
						echo gettype($product_id);
						echo "<br>";

						$amount = $erregistroa[1];
						echo $amount = intval($amount);
						echo gettype($amount);
						echo "<br>";

						$total_price = $erregistroa[2];
						echo $total_price = floatval($total_price);
						echo gettype($total_price);
						echo "<br>";

					mysqli_query($link, "INSERT INTO selling  VALUES ($MAXsell,$userID, $product_id, $amount, NOW(), $total_price)");
					}

				mysqli_query($link,"update buying_products set buy = 1 where session = $session");


			header("Location:../../../../");
		?>
		

	</body>
</html>
