<html>
	<head>
		<link rel="STYLESHEET" TYPE="TEXT/CSS" HREF="style_php.CSS">      
		<title>Insert</title>
        <style>
        </style>
	</head>
	<body>
		<H1>Orduen tabla</H1>
		<?php
			include("Connect.php");
			
			$link=KonektatuDatuBasera();
			
			$emaitza=mysqli_query($link,"select * from proba");
			
		?>
		<TABLE BORDER=1 >
			<Tr>
				<Th>&nbsp;Orduak</Th><Th>&nbsp;Astelehena&nbsp;</Th><Th>&nbsp;Asteartea&nbsp;</Th><Th>&nbsp;Asteazkena&nbsp;</Th><Th>&nbsp;Osteguna&nbsp;</Th><Th>&nbsp;Ostirala&nbsp;</Th><Th>&nbsp;Larunbata&nbsp;</Th>
			</Tr>
			<?php
			$x = 8;
			$y = 10;
			$while = 1;
			$taula = 1;
			
				while($taula <= 7)
				{
					$value = $x.'_'.$while;	
					echo "<tr>";
					echo "<td>$x:00-$y:00</td>";
					while( $while <= 6){
					echo "<td>";
					$link=KonektatuDatuBasera();
					$emaitza=mysqli_query($link,"select Hours
												from proba
												where Hours = '$value' 
												and session = '$session'
													");
					if(mysqli_num_rows($emaitza)!=0){
						echo "<a href='garage_1_delete.php?selected_hour=$value'>";
						echo "<img src='./images/grey.png' id='argazkia'></img>";
						echo "</a>";
					} else {					
						$emaitza=mysqli_query($link,"select Hours
													from proba
													where Hours = '$value'
													");
			
						if(mysqli_num_rows($emaitza)==0){
							echo "<a href='garage_1_insert.php?selected_hour=$value'>";
							echo "<img src='./images/green.png' id='argazkia'></img>";
							echo "</a>";
						} else {
						echo "<img src='./images/red.png' id='argazkia'></img>";
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
				mysqli_close($link);
				?>
		</table>
	</body>
	</html>