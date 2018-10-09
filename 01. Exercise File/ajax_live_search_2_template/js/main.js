var request = null; //this variable is for preventing "machine gun" request

$(document).ready(function() {

	load_employees(); //call function load_employees

	$('#departmentid').on('change', function() { //load program assigned to a specific department

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

		// 2. If search string is being provided, send AJAX request to "load_search.php" and prevent "machine gun" request.
		// 3 . The AJAX request will be based on the selected "Search By:" (dropdown) options base on the database fields
		
	});

});

//CUSTOM FUNCTIONS

function load_employees() {

	//1. Using the shorthand AJAX $.load function, send ajax request to load "load_employee.php" into <div id='employee-table'>

}