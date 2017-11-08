<?php include('config.php'); ?>
<?php  
	
	$pid = $_POST['pid'];

	$sql = "SELECT * FROM tblproduct WHERE id = $pid LIMIT 1";
	
	$result = mysql_query($sql, $conn);

	$row = mysql_fetch_assoc($result); //associate array

	echo json_encode($row);	

?>