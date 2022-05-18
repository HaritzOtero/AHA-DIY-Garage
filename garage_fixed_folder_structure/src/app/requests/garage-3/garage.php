<html>

<head>
	<link rel="STYLESHEET" TYPE="TEXT/CSS" HREF="../style/style_php.CSS">
	<title>Garage 1</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="./garage.css">
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
	include("../../includes/navigation/garage-navigation-bar.php");
	$userID = $_SESSION['userID'];
	$session = $_SESSION['session'];
	include("../../module/connection.php");
	$link=KonektatuDatuBasera();
	//IMPORTANT VARIABLES
	$T_day_str =  date("Y-m-d"); //"2022-05-11";
	$T_day_hms_str = date("Y-m-d H:i:s");
	$T_day_hms_int = strtotime($T_day_hms_str);
	$T_day_int = strtotime($T_day_str);
	$T_week = strftime('%V', $T_day_int);
	
	$S_day_string = $_SESSION['date'];
	$S_day_int = strtotime($S_day_string);
	$S_week = strftime('%V', $S_day_int);

	$_SESSION['week'] = $S_week;

	$egune = 86400;





	// Selected week monday and saturday values
	$x_day = $S_day_int;
	$x_week = strftime('%V', $x_day);
	$UNDER_S_week = $S_week - 1;

	while ($x_week > $UNDER_S_week){
		$x_day = $x_day - $egune;
		$x_week = strftime('%V', $x_day);
	}

	$S_monday = $x_day + $egune;
	$S_saturday = $S_monday + ($egune * 5);
	////////////////////////////////////////////
?>

<div id='tableCalendarTotal' >


	<div id='tableCalendar'>
	<H1>AVAILABLE HOURS</H1>
<?php

//TH
$x_day = $S_monday;
printf(" <table BORDER=1> <tr>");
echo "<th>Hours</th>";
while ($x_day <= $S_saturday){
    echo "<th>";
    echo strftime('%a', $x_day);
    echo "<br />";
    echo strftime('%d', $x_day);
    echo "</th>";
    $x_day += $egune;
}
printf("
</tr> ");
/////////////////////////////////


//TD

$row = 1;
$hours_start = 8;
$hours_finish = 10;
while($row <= 7){ //ROW
    echo "</tr>";
    echo "<td> $hours_start:00-$hours_finish:00 </td>";
    $auk_egune = 1;
    
    $x_day = $S_monday;
    while ($x_day <= $S_saturday){ //COLUMN
        $value = $hours_start.'_'.$auk_egune;
        $x_day_hms = $x_day + ($hours_start * 3600);
        if ($S_week < $T_week){ // DONT TOUCH
            echo "<td> <img src='../../../assets/icons/red.png' id='taulaArgazkia'></img> </td>";
        } else if ($x_day_hms < $T_day_hms_int) { // DONT TOUCH
            echo "<td> <img src='../../../assets/icons/red.png' id='taulaArgazkia'></img> </td>";
        } else {  //TOUCH
            echo "<td>";
            $buy = mysqli_query($link,"select buy from garage_3 where Hours = '$value' and week = '$S_week'");

            if(mysqli_num_rows($buy)!=0){
                $buy = mysqli_fetch_array($buy);
                $buy = $buy[0];													
                if($buy == 1){
                    echo "<img src='../../../assets/icons/red.png' id='taulaArgazkia'></img>";
                } else {
                    $emaitza=mysqli_query($link,"select * from garage_3 where Hours = '$value' and session = '$session' and week = '$S_week' and buy = '0'");
                    if(mysqli_num_rows($emaitza)!=0){
                        echo "<a href='./garage-delete.php?selected_hour=$value'>";
                        echo "<img src='../../../assets/icons/grey.png' id='taulaArgazkia'></img>";
                        echo "</a>";
                    } else {
                        echo "<img src='../../../assets/icons/red.png' id='taulaArgazkia'></img>";
                    }
                }
            }
             else {
                echo "<a href='./garage-insert.php?selected_hour=$value'>";
                echo "<img src='../../../assets/icons/green.png' id='taulaArgazkia'></img>";
                echo "</a>";
            }
            echo "</td>";
            
        } // END COLUMN
        $x_day = $x_day += $egune;
        $auk_egune += 1;
        
    
    } // END ROW
    echo "</tr>";
    $hours_start += 2;
    $hours_finish += 2;
    $row += 1; 
}
/////////////////////////////////////////////////////////////////
echo "</table>";
?>
		

		<!-- CALENDAR -->
 		<form action="./garage-calendar.php" method="post">
		<label for="start">Start date:</label>
		<input type="date" id="start" name="selected-day"
       value="<?php echo $S_day_string; ?>"
       min="2022-01-01" max="2022-12-31">
	   <button type="submit" class="btn btn-primary bidali">Check</button>
		</form>
		




	</div>



	
		<div id="ProductList">
			<H1>AVAILABLE PRODUCTS</H1>
			<?php
			
				
				$emaitza=mysqli_query($link,"select * from products");
				
			?>
			<TABLE id ="tabla" >
				<Tr>
				<Th></Th><Th>Name</Th><Th>Description</Th><Th>Price</Th><Th>Amount</Th><Th>Click to add</Th>
				</Tr>
				<?php
					while($erregistroa = mysqli_fetch_array($emaitza))
					{
						printf("<tr><td>");
						printf("<img src='%s' id='argazkiaProducts'>",$erregistroa["img"]);
						printf("</td><td>%s</td><td>%s</td><td>%.2f€</td><td>",$erregistroa["name"],$erregistroa["description"],$erregistroa["price"]);
						
						$select = $erregistroa[3];
						?>
						<div>
							<form action="../products/add-product-3.php" method="post">
								<select class="form-control" id="sel1" name="product_amount">
									<?php
										for ($i=1; $i<=$select; $i++)
										{
											?>
												<option value="<?php echo $i;?>"><?php echo $i;?></option>
											<?php
										}
									?>
								</select>
								<input style="display:none" type="number" id="fname" name="product_id" value="<?php printf("%d",$erregistroa["product_id"])?>"><br><br>
							
						</div>
					  <?php
						printf("</td><td><input type='image' src='../../.../../../assets/icons/carrito.png' alt='Submit'id='argazkiaProducts' ></td></tr>");
						?></form><?php
					}

				?>
			</table>
		</div>




</div>


	

<!-- ----------------------------------------------------------------------------------------------------------------------------- -->


<div id="SelectedHoursProduct">



			<!-- SELECTED HOURS -->
			<div id='selectedHours'> 
				<h2>Selected hours:</h2>
			 	<div>
					<?php 
						$Y_2022_str =  date("2022-01-03");
						$Y_2022_int = strtotime($Y_2022_str);
						$astebete = $egune * 7;
						$showHours = mysqli_query($link,"select Hours, week from garage_3 where session = '$session' and buy = '0' ORDER by week ASC");
					
							if(mysqli_num_rows($showHours)!=0){
								echo "<table>";
								// echo "<tr> <th>Day</th> <th>Week day</th> <th>Hours</th> </tr>"
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
		<!-- END SELECTED HOURS -->


		<div id='selectedProducts'>
			<h2>Selected products:</h2>
			<div>
			<?php
					
					$buying_products = mysqli_query($link,"select product_id, amount, price, total_price from buying_products where session = '$session' and buy = '0'");
					
				
				if (mysqli_num_rows($buying_products) != 0) {
					?>
				<table id ="tabla" >
				<Tr>
				<Th>Name</Th><Th>Description</Th><Th>Price</Th><Th>Amount</Th><Th>Total price</Th><Th></Th>
				</Tr>
					<?php
					
						while($buying_products_array = mysqli_fetch_array($buying_products))
						{
							$Bproduct_id = $buying_products_array[0];
							$emaitza = mysqli_query($link,"select name, description from products where product_id = $Bproduct_id");
							$emaitza = mysqli_fetch_array($emaitza);

							printf("</td><td>%s</td><td>%s</td>",$emaitza["name"],$emaitza["description"]);
							printf("<td>%.2f€</td><td>%d</td><td>%.2f€</td><td><a href='../products/product-remove-3.php?product_id=%s'><button type='button' class='btn btn-default btn-sm'> <span class='glyphicon glyphicon-remove'></span> Remove </button></a></td></tr>", $buying_products_array["price"], $buying_products_array["amount"], $buying_products_array["total_price"], $buying_products_array["product_id"] );
						} 
					}
				?>
				</table>
			</div>
		</div>
</div>
	
		<a href="./confirmation-page.php">
		<button type="button" class="btn btn-primary btn-lg" style="float:right">Confirmation page</button>
		</a>
	</body>
	</html>