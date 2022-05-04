<html>
	<head>
		<link rel="STYLESHEET" TYPE="TEXT/CSS" HREF="../style/style_php.CSS">      
		<title>Insert</title>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/style.css">
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
	include("../include/Connect.php");
	include("../include/nav-bar.php");
	$link=KonektatuDatuBasera();

	$Tweek = strftime('%V');
	
	$week = $_SESSION['week'];
	$date = $_SESSION['date'];
?>



		<TABLE BORDER=1 >
			<Tr>
				<Th>&nbsp;Hours</Th><Th>&nbsp;Monday&nbsp;</Th><Th>&nbsp;Tuesday&nbsp;</Th><Th>&nbsp;Wednesday&nbsp;</Th><Th>&nbsp;Thursday&nbsp;</Th><Th>&nbsp;Friday&nbsp;</Th><Th>&nbsp;Saturday&nbsp;</Th>
			</Tr>
			<?php
			$x = 8;
			$y = 10;
			$while = 1;
			$taula = 1;
			$value = $x.'_'.$while;	
			
				while($taula <= 7)
				{
					
					echo "<tr>";
					echo "<td>$x:00-$y:00</td>";
					while( $while <= 6){
						echo "<td>";						


						if ($week < $Tweek){
							echo "<img src='../images/red.png' id='argazkia'></img>";
						}else{						
						$buy = mysqli_query($link,"select buy from garage_1 where Hours = '$value' and week = '$week'");

						if(mysqli_num_rows($buy)!=0){
							$buy = mysqli_fetch_array($buy);
							$buy = $buy[0];


							if($buy == 1){
								echo "<img src='../images/red.png' id='argazkia'></img>";
							} else {
								$emaitza=mysqli_query($link,"select * from garage_1 where Hours = '$value' and session = '$session' and week = '$week'");
								if(mysqli_num_rows($emaitza)!=0){
									echo "<a href='garage_1_delete.php?selected_hour=$value'>";
									echo "<img src='../images/grey.png' id='argazkia'></img>";
									echo "</a>";
								} else {
									echo "<img src='../images/red.png' id='argazkia'></img>";
								}
							}
						}
						 else {
							echo "<a href='garage_1_insert.php?selected_hour=$value'>";
							echo "<img src='../images/green.png' id='argazkia'></img>";
							echo "</a>";
						}
					}

					echo "</td>";
					$while = $while + 1;
					$value = $x.'_'.$while;	
					}


					echo "</tr>";
					$x = $x + 2;
					$y = $y + 2;
					$while = 1;
					$taula = $taula + 1;
				}
				
				?>
		</table>

 		<form action="garage_1_calendar.php" method="post">
		<label for="start">Start date:</label>
		<input type="date" id="start" name="selected-day"
       value=""
       min="2022/01/01" max="2022-12-31">
	   <button type="submit" class="btn btn-primary bidali">Consult</button>
		</form>


	  
		<a href="garage_1_buy.php">
		<button type="button" class="btn btn-primary btn-lg">Buy the selected hours</button>
	</a>

	<?php 
	echo $week;
	?>
	

<!-- ----------------------------------------------------------------------------------------------------------------------------- -->


	<div id="nagusia">
			<H1>AVILABLE PRODUCTS</H1>
			<?php
			
				
				$emaitza=mysqli_query($link,"select * from products");
				
			?>
			<TABLE id ="tabla" >
				<Tr>
				<Th></Th><Th>Name</Th><Th>Description</Th><Th>Price</Th><Th>Click to add</Th>
				</Tr>
				<?php
					while($erregistroa = mysqli_fetch_array($emaitza))
					{
						printf("<tr><td>");
						echo '<img src="data:image/jpeg;base64,'.base64_encode($erregistroa['img']).'" id="argazkiaProducts"';
						printf("</td><td>%s</td><td>%s</td><td>%s</td><td><a href='addProduct.php?prod_identifikatzailea=%s'><img src='../images/carrito.png' id='argazkiaProducts'></td></tr>",$erregistroa["name"],$erregistroa["description"],$erregistroa["price"],$erregistroa["product_id"]);
					}

				?>
			</table>
		</div>
	</body>
	</html>