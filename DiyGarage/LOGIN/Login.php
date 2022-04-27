<?php
			include("Connect.php");

            $user=$_POST["email"];
            $password=$_POST["password"];

            $link=KonektatuDatuBasera();
			$emaitza=mysqli_query($link,"select email_address, password
                                        from client
                                        where email_address = '$user'
                                            and password = '$password'
                                            ");

            if(mysqli_num_rows($emaitza)==0){
                header("Location:Login_SignUp_form.php?okerra=bai");
            }
            else{
                $emaitza=mysqli_query($link,"select name from client where email_address = '$user'");
                $emaitza = mysqli_fetch_array($emaitza);
                $emaitza = $emaitza[0];
                session_start();
                $_SESSION['izena'] = $emaitza;
                header("Location:Login_SignUp_form.php?okerra=ez");
            }
            ?>
