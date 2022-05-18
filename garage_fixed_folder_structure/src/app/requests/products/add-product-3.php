<?php
    session_start();
    $session = $_SESSION['session'];

	include("../../module/connection.php");
    
$link=KonektatuDatuBasera();

$product_amount=$_POST["product_amount"];
$product_id=$_POST["product_id"];

$price = mysqli_query($link,"SELECT price FROM products WHERE product_id = $product_id");
$price = mysqli_fetch_array($price);
$price = $price[0];

$total_price = $price * $product_amount;


$konprobatu = mysqli_query($link,"select * from buying_products where product_id = $product_id and session = '$session' and buy='0'");

if (mysqli_num_rows($konprobatu) == 0) {
mysqli_query($link, "INSERT INTO buying_products  VALUES ($session,$product_id,$product_amount,$price,$total_price, '0')");

mysqli_query($link,"update products set stock = stock - $product_amount where product_id = $product_id");


} else {
    mysqli_query($link,"update buying_products set amount = amount + $product_amount where product_id = $product_id and session = '$session' and buy='0'");

    $amount = mysqli_query($link,"select amount from buying_products where product_id = $product_id and session = '$session' and buy='0'");
    $amount = mysqli_fetch_array($amount);
    $amount = $amount[0];

    $total_price = $price * $amount;

    mysqli_query($link,"update buying_products set total_price = $total_price where product_id = $product_id and session = '$session' and buy='0'");


    mysqli_query($link,"update products set stock = stock - $product_amount where product_id = $product_id");
}
 header("Location:../garage-3/garage.php");
        ?>

