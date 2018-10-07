<?php  

	require('../include/bootstrap.php');

	$employeeid = $_GET['employeeid'];

	$sql = "SELECT * FROM tblemployees INNER JOIN tbldepartment ON tblemployees.departmentid = tbldepartment.departmentid ";
	$sql .= "INNER JOIN tblprogram ON tblemployees.programid = tblprogram.programid WHERE employeeid = :id";

	$result = fetch_single_data($sql, $employeeid);

?>
<div class="info">
	
	<div class="profile-info clearfix">
	
		<span class="close"> X </span>
	
		<div class="profile-info-picture">
			
			<figure style="background-image: url(

					<?php 

						if ($result['photo'] != '') { 

							echo 'upload/' . $result['photo']; 

						} else { 

							echo 'img/nophoto.jpg'; 

						} 

					?>
					
					)">
							
			</figure>

		</div>

		<div class="profile-info-details">
			
			<h2><?php echo $result['firstname'] . ' ' . $result['lastname']; ?></h2>
			<h5><em> <?php echo $result['department']; ?> </em></h5>
			<h5><em> <?php echo $result['program_desc']; ?></em></h5>
			<h5><em> <?php echo "(" . $result['sex'] . ")" ?> </em></h5>

		</div>

		<div>

			<form id="upload-form" method="post" enctype="multipart/form-data" action="upload.php?employeeid=<?php echo $employeeid;?>">

				<div>
					<h4> Upload Photo </h4>
					<input type="file" name="photo" id="photo" accept="image/jpeg, image/png">
				</div>
				<div>
					<input type="submit" name="upload-btn" id="upload-btn" value="Upload">
				</div>

			</form>

		</div>

	</div>
	
</div>