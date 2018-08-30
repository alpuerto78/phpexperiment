<?php include('config.php'); ?>
<?php  
	
	$pid = $_POST['pid'];

	$sql = "DELETE FROM tblproduct WHERE id = $pid";
	mysql_query($sql, $conn);

?>