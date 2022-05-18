
    <?php
	include("../../../module/connection.php");
	$link=KonektatuDatuBasera();


	$id = $_GET["employee_id"];

	echo $id;
			
	$link=KonektatuDatuBasera();
	mysqli_query($link,"delete from working where employee_id = $id");
	mysqli_query($link,"delete from employee where employee_id = $id");
	header("Location:./worker-list.php?deleted");

?>

