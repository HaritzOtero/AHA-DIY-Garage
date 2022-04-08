<?php
			include("Connect.php");

            $email=$_POST["email"];
            $password=$_POST["password"];

            $link=KonektatuDatuBasera();
			$emaitza=mysqli_query($link,"select email_address, password
                                        from client
                                        where email_address = '$email'
                                            and password = '$password'
                                            ");

            if(mysqli_num_rows($emaitza)==0){
                header("Location:Login_SignUp_form.php?okerra=bai");
            }
            else{
                $name = mysqli_query($link,"select name from client where email_address = '$email'");
                $name = mysqli_fetch_array($name);
                $name = $name[0];

                $userID = mysqli_query($link,"select client_id from client where email_address = '$email'");
                $userID = mysqli_fetch_array($userID);
                $userID = $userID[0];

                session_start();
                $_SESSION['name'] = $name;
                $_SESSION['userID'] = $userID;                
                header("Location:index.php");
            }
            ?>
