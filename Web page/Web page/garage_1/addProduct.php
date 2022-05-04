<?php
    session_start();
    $userID = $_SESSION['userID'];
	include("../Connect.php");
    
$link=KonektatuDatuBasera();

$productID = $_GET["prod_identifikatzailea"];

$price = mysqli_query($link,"SELECT price FROM products WHERE product_id = $productID");
$price = mysqli_fetch_array($price);
$price = $price[0];

mysqli_query($link, "INSERT INTO selling  VALUES (NULL,$userID,$productID,now(),$price)");



 header("Location:garage_1.php");

        ?>

