var program_id = $('#programid');
var employee_table = $('#employee-table')

$(document).ready(function() {

	display_data(employee_table, 'ajax/load_employees.php'); //display stored data

	$('#departmentid').on('change', function() { //departmentid dropdown

		program_id.prop('disabled', false); //if department has selection, activate program dropdown
		var departmentid = $(this).val(); //get value
		load_program(departmentid); //get program assigned for each department

	});

	$('#create').on('click', function() { //if create button is clicked

		insert_data($('#add_form'), 'ajax/insert_employees.php', display_data, 'ajax/load_employees.php');

	});


});

//CUSTOM FUNCTIONS

function load_program(departmentid) {

	var department_id = $('#departmentid');

	$.ajax({

		method: 'POST',
		url: 'ajax/load_program.php',
		data: {departmentid : departmentid},
		success: function(data) {

			program_id.html(data);

		}

	});

}

function display_data(the_target, the_url) {

	$.ajax({

		method: 'POST',
		url: the_url,
		success: function(data) {

			the_target.html(data);

		}

	});

}

function insert_data(the_form, the_url_insert, the_function, the_url_display) {

	var form_data = the_form.serialize();

	$.ajax({

		method: 'POST',
		url: the_url_insert,
		data: form_data,
		success: function() {

			the_function(employee_table, the_url_display);

		}

	});

}