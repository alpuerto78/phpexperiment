<?php include('config.php'); ?>
<?php  
	
	$pname = $_POST['pname'];
	$price = $_POST['price'];
	$stock = $_POST['stock'];

	$sql = "INSERT INTO tblproduct (pname, price, stock) VALUES ('$pname','$price','$stock')";
	mysql_query($sql, $conn);

?>