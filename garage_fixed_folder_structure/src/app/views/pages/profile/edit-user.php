
    <?php
			include("../../../module/connection.php");

            $client_id = $_POST["client_id"];
            $name=$_POST["name"];
            $surname=$_POST["surname"];
            $email_address=$_POST["email_address"];
            $phone_number=$_POST["phone_number"];
            $password=$_POST["password"];


            $link=KonektatuDatuBasera();

            mysqli_query($link,"update client set name = '$name',
                                                      surname = '$surname',
                                                      email_address = '$email_address',
                                                      phone_number = '$phone_number',
                                                      password = '$password'
                                                      where client_id = '$client_id'");
        	header("Location:./profile.php?user_edited");
?>