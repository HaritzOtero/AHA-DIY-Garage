<?php
session_start();
$session = $_SESSION['session'];
include("../module/connection.php");
$link = KonektatuDatuBasera();

// GARAGE HOURS CLEAR
mysqli_query($link, "delete from garage_1 where buy = 0 and session = $session");
mysqli_query($link, "delete from garage_2 where buy = 0 and session = $session");
mysqli_query($link, "delete from garage_3 where buy = 0 and session = $session");


// BUYING PRODUCTS CLEAR
$result = mysqli_query($link, "select product_id, amount from buying_products where buy = 0 and session = $session");
while($row = mysqli_fetch_array($result)){
    $product_id = $row[0];
    $amount = $row[1];

    mysqli_query($link, "update products set stock = stock + $amount where product_id = $product_id");
}
mysqli_query($link, "delete from buying_products where buy = 0 and session = $session");


session_unset();
session_destroy();
session_write_close();
setcookie(session_name(), '', 0, '/');
session_regenerate_id(true);
header("Location:../../../");
