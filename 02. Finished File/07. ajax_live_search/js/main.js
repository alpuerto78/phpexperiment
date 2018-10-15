var request = null;
$(document).ready(function() {

	load_employees();

	$('#departmentid').on('change', function() {

		var program_id = $('#programid');
		var department_id = $('#departmentid');

		var departmentid = $(this).val();

		$.ajax({

			method: 'POST',
			url: 'load_program.php',
			data: {departmentid : departmentid},
			success: function(data) {

				program_id.html(data);

			}

		});

	});

	$('#search').on('keyup', function() {

		var search = $(this).val();

		if (request) {

			clearTimeout(request);

		}

		request = setTimeout(function() {

			$.ajax({

				method: 'POST',
				url: 'load_search.php',
				data: {search : search},
				beforeSend: function(){

					$('#employee-table').html('<h3> Loading ...');

				},
				success: function(data) {

					$('#employee-table').html(data);
					request = null;	
				}

			});

		}, 1000);

		
	});

});

//CUSTOM FUNCTIONS

function load_employees() {

	$('#employee-table').load('load_employee.php');

}