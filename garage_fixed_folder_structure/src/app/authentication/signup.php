<?php
include("../module/connection.php");

$name = $_POST["name"];
$surname = $_POST["surname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$password = $_POST["password"];

$link = KonektatuDatuBasera();
$emaitza = mysqli_query($link, "select email_address from client where email_address = '$email'");

if (mysqli_num_rows($emaitza) == 0) {
    mysqli_query($link, "INSERT into client values (NULL , '$name', '$surname', '$email', '$phone', '$password')");
    header("Location: ../views/pages/signin/signin.php");
} else {
    header("Location: ../views/pages/signup/signup.php?erregistratu=ez");
}
?>
<br>