
    <?php
	include("../../../module/connection.php");
	$link=KonektatuDatuBasera();


	$id = $_GET["product_id"];

			
	$link=KonektatuDatuBasera();
	mysqli_query($link,"delete from products where product_id = $id");
	header("Location:./worker-product.php?deleted");

?>

