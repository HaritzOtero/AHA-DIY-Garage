<?php
			include("Connect.php");

            $name=$_POST["name"];
            $surname=$_POST["surname"];
            $email=$_POST["email"];
            $phone=$_POST["phone"];
            $password=$_POST["password"];

            $link=KonektatuDatuBasera();
			$emaitza=mysqli_query($link,"select email_address from client where email_address = '$email'");

            if(mysqli_num_rows($emaitza)==0){
                mysqli_query($link,"INSERT into client values (NULL , '$name', '$surname', '$email', '$phone', '$password')");
                header("Location:Login_SignUp_form.php?erregistratu=bai");
            }
            else{
                header("Location:Login_SignUp_form.php?erregistratu=ez");
            }
            ?>
        <br>