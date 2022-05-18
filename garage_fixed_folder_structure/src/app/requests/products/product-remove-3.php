<?php
    session_start();
    $session = $_SESSION['session'];

	include("../../module/connection.php");
    
$link=KonektatuDatuBasera();


$product_id = $_GET["product_id"];


$amount = mysqli_query($link,"select amount from buying_products where product_id = $product_id and session = '$session' and buy='0'");
$amount = mysqli_fetch_array($amount);
$amount = $amount[0];


mysqli_query($link,"delete from buying_products where product_id = $product_id and session = '$session' and buy='0'");


mysqli_query($link,"update products set stock = stock + $amount where product_id = $product_id");

header("Location:../garage-3/garage.php");

        ?>

