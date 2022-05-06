<?php

session_start();
$day=$_POST["selected-day"];

$_SESSION['date'] = $day;

$day = strtotime($day);


  
$week = strftime('%V', $day);

$_SESSION['week'] = $week;

header("Location:garage_1.php");

            ?>