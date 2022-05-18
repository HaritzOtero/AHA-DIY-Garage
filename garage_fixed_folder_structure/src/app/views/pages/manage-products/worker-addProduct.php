
    <?php
			include("../../../module/connection.php");

            $name=$_POST["name"];
            $description=$_POST["desc"];
            $stock=$_POST["stock"];
            $price=$_POST["price"];

            $serbitzarikoHelbidea = '../../../assets/images/products';

            $helbideTemporala = 	$_FILES['img']['tmp_name'];
            $argazkiIzena = 		$_FILES['img']['name'];
            $bukaeraHelbidea = 		$serbitzarikoHelbidea.'/'.$argazkiIzena;
            move_uploaded_file($helbideTemporala,'../'.$bukaeraHelbidea);


            $link=KonektatuDatuBasera();

            mysqli_query($link,"insert into products values('NULL', '$name','$description','$stock', '$price','$bukaeraHelbidea')");
        	header("Location:./worker-product.php?added");
?>