
    <?php
			include("../../../module/connection.php");

            $employee_id = $_POST["employee_id"];
            $name=$_POST["name"];
            $surname=$_POST["surname"];
            $adress=$_POST["adress"];
            $phone_number=$_POST["phone_number"];
            $age=$_POST["age"];
            $salary=$_POST["salary"];
            $position=$_POST["position"];
            $password=$_POST["password"];

            $link=KonektatuDatuBasera();

            mysqli_query($link,"update employee set name = '$name',
                                                      surname = '$surname',
                                                      adress = '$adress',
                                                      phone_number = $phone_number,
                                                      age = $age,
                                                      salary = $salary,
                                                      position = '$position',
                                                      password = '$password'
                                                      where employee_id = $employee_id");
        	header("Location:./worker-list.php?worker_edited");
?>