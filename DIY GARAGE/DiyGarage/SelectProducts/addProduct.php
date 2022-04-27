<?php
include("test_connect_db.php");

$link=KonektatuDatuBasera();

$id = $_GET["prod_identifikatzailea"];

$price = mysqli_query($link,"SELECT price FROM products WHERE product_id = $id");

$emaitza = mysqli_query($link, "INSERT INTO selling  VALUES (NULL,1,$id,now(),$price)");



 header("Location:selectProducts.php");

        ?>

