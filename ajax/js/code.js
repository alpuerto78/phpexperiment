$(document).ready(function() {

	var overlay = $('#overlay');
	
	//fetch updated data every 1 second
	$('#container-data').load('display_data.php');
	setInterval('display_data()', 1000);

	//show form-add
	$('#add-record').on('click', function() {

		overlay.load('forms.php #form-add').fadeIn();

	});

	//show form-update
	$('#container-data').on('click','.upd', function() {

		var pid = $(this).attr('data-id');

		overlay.load('forms.php #form-update').fadeIn();

		$.ajax({

			url: 'get_update_data.php', //link
			method: 'post', //send as
			data: {pid: pid}, //data to be send
			dataType: 'json', //type of data to be returned
			success: function(data) {

				$('#pid').val(data.id);
				$('#pname').val(data.pname);
				$('#price').val(data.price);
				$('#stock').val(data.stock);

			}

		});


	});

	//close overlay {
	$('#overlay').on('click','.close-overlay', function() {

		$(this).closest('#overlay').fadeOut();

	});

	// save record
	$('#overlay').on('submit','#form-add', function() {

		$.ajax({

			url: 'add.php',
			method: 'POST',
			data: $(this).serialize(),
			success: function() {

				clear_fields();
				
			}

		});

		return false;

	});

	// update record
	$('#overlay').on('submit','#form-update', function() {

		$.ajax({

			url: 'update.php',
			method: 'POST',
			data: $('#form-update').serialize(),
			success: function() {

				clear_fields();
				$('#overlay').fadeOut();
				
			}

		});

		return false;

	});

	// delete record
	$('#container-data').on('click','.del', function() {

		var pid = $(this).attr('data-id');

		var conf = confirm('Are you sure?');

		if (conf) {

			$.ajax({

				url: 'delete.php',
				method: 'POST',
				data: {pid: pid}
				
			});

		}

		
	});

});

function display_data() {

	var container_data = $('#container-data');

	$.ajax({

		url: 'display_data.php',
		success: function(data) {

			container_data.empty();
			container_data.append(data);

		}

	});

}

function clear_fields() {

	$('input:text').val('');

}