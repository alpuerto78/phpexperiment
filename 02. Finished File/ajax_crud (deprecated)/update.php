<?php include('config.php'); ?>
<?php  
	
	$pid = $_POST['pid'];
	$pname = $_POST['pname'];
	$price = $_POST['price'];
	$stock = $_POST['stock'];

	$sql = "UPDATE tblproduct SET id = '$pid', pname = '$pname', price = '$price', stock = '$stock' WHERE id = $pid";
	mysql_query($sql, $conn);

?>