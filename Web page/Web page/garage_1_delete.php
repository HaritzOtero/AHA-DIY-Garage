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
			include("Connect.php");
            $hours = $_GET["selected_hour"];

			
			$link=KonektatuDatuBasera();
			$emaitza=mysqli_query($link,"delete from proba where Hours = $hours and session = $session");
			header("Location:garage_1.php");
		?>
		

	</body>
</html>
