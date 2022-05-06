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
			include("../include/Connect.php");
			$link=KonektatuDatuBasera();
			mysqli_query($link,"update garage_1
            set buy = 1
            where session = $session
            and Client_ID = $userID");
			header("Location:garage_1.php?bai");
		?>
		

	</body>
</html>
