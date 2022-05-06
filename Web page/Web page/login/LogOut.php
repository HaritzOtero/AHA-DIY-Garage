<?php
    session_start();
	$session = $_SESSION['session'];
    include("../include/Connect.php");
    $link=KonektatuDatuBasera();
    mysqli_query($link,"delete from garage_1 where buy = 0 and session = $session");
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
    header("Location:../FrontPage/Login_SignUp_form.php?logOut=bai");
?>