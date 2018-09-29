<?php 

	require('include/bootstrap.php');

?>
<!DOCTYPE html>
<html>
	<head>
		<title> Simple CRUD Application </title>
		<link rel="stylesheet" href="css/styles.css">
	</head>
<body>

	<div id="wrapper">

		<button id="create_button"> Create Record </button>

		<hr>

		<div id="employee-table">
			
			<!-- DATA WILL BE LOADED WITH AJAX -->

		</div>

		<div id="overlay">

			<!-- FORM WILL BE LOADED WITH AJAX -->

		</div>

		
	</div>

</body>
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/main.js"></script>
</html>