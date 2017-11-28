<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head> 
	<title> PHP Experiment </title> 
	<link rel="stylesheet" href="css/styles.css">
	<script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
	<script src="js/code.js" type="text/javascript"></script>
</head>
<body>
<div id="wrapper">	

	<table id="container-data">
		
		<tr class='table-header'>
			<td> Last Name <img src='img/arrow-up-grey.gif' class='up' data-field='lastname' data-sort='ASC'><img src='img/arrow-down-grey.gif' class='down' data-field='lastname' data-sort='DESC'></td>
			<td> First Name <img src='img/arrow-up-grey.gif' class='up' data-field='firstname' data-sort='ASC'><img src='img/arrow-down-grey.gif' class='down' data-field='firstname' data-sort='DESC'></td>
			<td> Department <img src='img/arrow-up-grey.gif' class='up' data-field='department' data-sort='ASC'><img src='img/arrow-down-grey.gif' class='down' data-field='department' data-sort='DESC'></td>
			<td> Salary <img src='img/arrow-up-grey.gif' class='up' data-field='salary' data-sort='ASC'><img src='img/arrow-down-grey.gif' class='down' data-field='salary' data-sort='DESC'></td>
		</tr>
	
		
	</table>

</div>

</body>
</html>