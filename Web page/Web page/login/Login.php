<?php
			include("../Connect.php");

            $emailOrID=$_POST["email"];
            $password=$_POST["password"];

            $link=KonektatuDatuBasera();
			$emaitza=mysqli_query($link,"select email_address, password
                                        from client
                                        where email_address = '$emailOrID'
                                            and password = '$password'
                                            ");

            if(mysqli_num_rows($emaitza)==0){
                $emaitza=mysqli_query($link,"select employee_id, password from employee where employee_id = '$emailOrID' and password = '$password'");
                if(mysqli_num_rows($emaitza)!=0){
                    $name = mysqli_query($link,"select name from employee where employee_id = '$emailOrID'");
                    $name = mysqli_fetch_array($name);
                    $name = $name[0];

                    $position = mysqli_query($link,"select position from employee where employee_id = '$emailOrID'");
                    $position = mysqli_fetch_array($position);
                    $position = $position[0];

                    mysqli_query($link,"INSERT into session values (NULL , '$emailOrID', '$name', NOW())");
                    $session = mysqli_query($link,"select MAX(session) from session");
                    $session = mysqli_fetch_array($session);
                    $session = $session[0];

                    session_start();

                    $_SESSION['name'] = $name;
                    $_SESSION['userID'] = $emailOrID;
                    $_SESSION['position'] = $position;
                    $_SESSION['session'] = $session;
                    header("Location:../FrontPage/index.php");

                    
                $week = strftime('%V');
                $_SESSION['week'] = $week;
                $_SESSION['date'] = date();

                } else {
                header("Location:../FrontPage/Login_SignUp_form.php?okerra=bai");
                }
            } else {
                $name = mysqli_query($link,"select name from client where email_address = '$emailOrID'");
                $name = mysqli_fetch_array($name);
                $name = $name[0];

                $userID = mysqli_query($link,"select client_id from client where email_address = '$emailOrID'");
                $userID = mysqli_fetch_array($userID);
                $userID = $userID[0];

                mysqli_query($link,"INSERT into session values (NULL , '$userID', '$name', NOW())");
                $session = mysqli_query($link,"select MAX(session) from session");
                $session = mysqli_fetch_array($session);
                $session = $session[0];
                
                session_start();

                $_SESSION['name'] = $name;
                $_SESSION['userID'] = $userID;
                $_SESSION['session'] = $session;

                $week = strftime('%V');
                $_SESSION['week'] = $week;
                $_SESSION['date'] = date();

                
                header("Location:../FrontPage/index.php");
            }
            ?>