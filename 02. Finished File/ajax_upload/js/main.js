var request = null;
$(document).ready(function() {

	load_employees();

	$('#departmentid').on('change', function() { //on change, load program assigned to department

		var program_id = $('#programid');
		var department_id = $('#departmentid');

		var departmentid = $(this).val();

		$.ajax({

			method: 'POST',
			url: 'ajax/load_program.php',
			data: {departmentid : departmentid},
			success: function(data) {

				program_id.html(data);

			}

		});

	});

	$('#search').on('keyup', function() { //on keyup pass a search string

		var search = $(this).val();

		if (request) { //if the user is still typing on the search box, don't send request yet

			clearTimeout(request);

		}

		request = setTimeout(function() {

			$.ajax({

				method: 'POST',
				url: 'ajax/load_search.php',
				data: {search : search},
				success: function(data) {

					$('#employee-table').html(data);
					request = null;	
				}

			});

		}, 1000);

		
	});

	$('#employee-table').on('click', '.view-info', function(event) {

		event.preventDefault();

		var employeeid = $(this).attr('data-employee-id');

		$('#overlay').load('ajax/load_view_form.php?employeeid=' + employeeid).fadeIn();

	});

	$('#overlay').on('click', '.close', function(event) {

		$(this).parents('#overlay').fadeOut();

	});

});

//CUSTOM FUNCTIONS

function load_employees() {

	$('#employee-table').load('ajax/load_employee.php');

}