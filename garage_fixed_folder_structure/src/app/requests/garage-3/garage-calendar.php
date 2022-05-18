<?php

session_start();
$day = $_POST["selected-day"];
$_SESSION['date'] = $day;
header("Location:./garage.php");
