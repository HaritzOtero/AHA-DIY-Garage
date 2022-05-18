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
	$week = $_SESSION['week'];
?>

    <?php
			include("../../module/connection.php");
            $hours = $_GET["selected_hour"];

			
			$link=KonektatuDatuBasera();
			mysqli_query($link,"insert into `garage_1` values ('$userID', '$hours', '$session', '0', '$week')");
			header("Location:./garage.php?insert_done");
		?>
		

	</body>
</html>
