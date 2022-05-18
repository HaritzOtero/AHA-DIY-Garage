<?php
include("../module/connection.php");

$email = $_POST["email"];
$password = $_POST["password"];

$link = KonektatuDatuBasera();
$emaitza = mysqli_query($link, "select email_address, password from client where email_address = '$email' and password = '$password'");

if (mysqli_num_rows($emaitza) == 0) {
    $emaitza = mysqli_query($link, "select employee_id, password from employee where employee_id = '$email' and password = '$password'");
    if (mysqli_num_rows($emaitza) != 0) {
        $name = mysqli_query($link, "select name from employee where employee_id = '$email'");
        $name = mysqli_fetch_array($name);
        $name = $name[0];

        $position = mysqli_query($link, "select position from employee where employee_id = '$email'");
        $position = mysqli_fetch_array($position);
        $position = $position[0];

        mysqli_query($link, "INSERT into session values (NULL , '$email', '$name', NOW())");
        $session = mysqli_query($link, "select MAX(session) from session");
        $session = mysqli_fetch_array($session);
        $session = $session[0];

        session_start();

        echo $_SESSION['name'] = $name;
        echo "<br>";
        echo $_SESSION['userID'] = $email;
        echo "<br>";
        echo $_SESSION['position'] = $position;
        echo "<br>";
        echo $_SESSION['session'] = $session;
        echo "<br>";

        echo $_SESSION['date'] = date("Y-m-d");

        header("Location: ../../../index.php");
    } else {
        header("Location: ../views/pages/signin/signin.php?okerra=bai");
    }
} else {
    $name = mysqli_query($link, "select name from client where email_address = '$email'");
    $name = mysqli_fetch_array($name);
    $name = $name[0];

    $userID = mysqli_query($link, "select client_id from client where email_address = '$email'");
    $userID = mysqli_fetch_array($userID);
    $userID = $userID[0];

    mysqli_query($link, "INSERT into session values (NULL , '$userID', '$name', NOW())");

    $session = mysqli_query($link, "select MAX(session) from session");
    $session = mysqli_fetch_array($session);
    $session = $session[0];

    session_start();

    $_SESSION['name'] = $name;
    $_SESSION['userID'] = $userID;
    $_SESSION['session'] = $session;

    $_SESSION['date'] = date("Y-m-d");


    header("Location: ../../../index.php");
}
