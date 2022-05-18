<?php
include("../../../module/connection.php");
$link = KonektatuDatuBasera();

echo $name = $_POST["name"];
echo $email = $_POST["email"];
echo $phone = $_POST["phone"];
echo $comment = $_POST["comment"];


mysqli_query($link, "INSERT INTO message VALUES('$name', '$email', '$phone', '$comment')");
header("Location:./contact.php");

?>