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
            $hours = $_GET["selected_hour"];

			
			$link=KonektatuDatuBasera();
			mysqli_query($link,"delete from garage_2 where Hours = '$hours' and session = $session");
			header("Location:./garage.php");
		?>
		

	</body>
</html>
