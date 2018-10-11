<?php  

	require('../include/bootstrap.php');

	// 1. $_GET variable/s

	// 2. Sql string

	// 3. Fetch Single Result

?>
<div class="info">
	
	<div class="profile-info">
	
		<span class="close"> X </span>
	
		<div class="profile-info-picture">
			
			<figure></figure> <!-- display picture as background-image, if photo is existing -->

		</div>

		<div class="profile-info-details">
			
			<!-- Display Information -->

			<h2> <!-- Full Name --> </h2>
			<h5><em><!-- Department --> </h5>
			<h5><em><!-- Program --> </em></h5>
			<h5><em><!-- Sex --></em></h5>

		</div>

		<div>

			<form id="upload-form" method="post" action="upload.php"> <!-- set enctype property for uploading file -->

				<div>
					<h4> Upload Photo </h4>
					<input type="file" name="photo" id="photo">
				</div>
				<div>
					<input type="submit" name="upload-btn" id="upload-btn" value="Upload">
				</div>

			</form>

		</div>

	</div>
	
</div>