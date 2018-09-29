var program_id = '#programid';
var employee_table = $('#employee-table')

$(document).ready(function() {

	display_data(employee_table, 'ajax/load_employees.php'); //display stored data

	$('#create_button').on('click', function() { //create record is clicked

		$('#overlay').load('ajax/forms.php #add_form').fadeIn(); //ajax load forms.php find #add_form

	});

	$('#overlay').on('change', '#departmentid', function() { //departmentid dropdown

		var _this = $(this);

		$(program_id).prop('disabled', false); //if department has selection, activate program dropdown

		var department_id = _this.val(); //get value

		load_program(department_id, program_id); //get program assigned for each department
		
	});

	$('#overlay').on('click', '#create', function() { //if create button is clicked

		execute_query($('#add_form'), 'ajax/insert_employees.php', display_data, 'ajax/load_employees.php'); //target form, insert, display function, reload display

		$(this).parents('#overlay').fadeOut();

	});

	$('#overlay').on('click', '#update', function() { //if update button is clicked

		var id = $('#update_form').attr('data-id');

		execute_query($('#update_form'), 'ajax/update.php?id=' + id, display_data, 'ajax/load_employees.php'); //target form, insert, display function, reload display

		$(this).parents('#overlay').fadeOut();

	});

	$('#overlay').on('click', '.cancel', function() {

		$(this).parents('#overlay').fadeOut();

	});

	$('#employee-table').on('click', '.del', function(event) {

		event.preventDefault();

		var id = $(this).attr('data-id');

		var conf = confirm('Are You Sure?');

		if (conf) {

			delete_data(id, 'ajax/delete.php');

		}

	});

	$('#employee-table').on('click', '.upd', function(event) {

		event.preventDefault();

		var id = $(this).attr('data-id');

		$.ajax({

			method: 'GET', //send as
			url: 'ajax/forms.php', //link
			data: {id: id}, //data to be send
			dataType: 'html',
			success: function(data) {

				$('#overlay').html(data).fadeIn();

			}

		});

	});

});

//CUSTOM FUNCTIONS

function load_program(department_id, target_el) {

	var departmentid = department_id;

	$.ajax({

		method: 'POST',
		url: 'ajax/load_program.php',
		data: {departmentid : departmentid},
		success: function(data) {

			$(document).find(target_el).html(data);

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

function execute_query(the_form, the_url, the_function, the_url_display) { /* this is for applicable for creating and updating data */

	var form_data = the_form.serialize();

	$.ajax({

		method: 'POST',
		url: the_url,
		data: form_data,
		success: function() {

			the_function(employee_table, the_url_display);

		}

	});

}

function delete_data(id, the_url) {

	$.ajax({

		method: 'GET',
		url: the_url,
		data: {id : id},
		success: function() {

			display_data(employee_table, 'ajax/load_employees.php');

		}

	});

}
