$(document).ready(function() {

	$('#manufacturerid').on('change', function() {

		var manufacturerid = $(this).val();

		$.ajax({

			method: 'POST',
			url: 'load_program.php',
			data: {manufacturerid : manufacturerid},
			success: function(data) {

				$('#modelid').html(data);

			}

		});


	});

});

//CUSTOM FUNCTIONS