var request = null;
$(document).ready(function() {

	load_employees(); //load employee table

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

	$('#employee-table').on('click', '.view-info', function(event) { //on click, load load_view_form.php

		event.preventDefault();

		var employeeid = $(this).attr('data-employee-id');

		$('#overlay').load('ajax/load_view_form.php?employeeid=' + employeeid).fadeIn();

	});

	$('#overlay').on('click', '.close', function(event) { //on click, close overlay

		$(this).parents('#overlay').fadeOut();

	});

	$('#employee-table').on('mouseenter', '.view-info', function() { //on mouseover, show tooltip

		var employeeid = $(this).attr('data-employee-id');
		var original_this = this; //assign original context of this to a variable;

		if (request) { //if there is still an active request

			clearTimeout(request);

		}

		request = setTimeout(function() {

			$.ajax({

				method: 'POST',
				url: 'ajax/load_tooltip.php',
				data: {employeeid : employeeid},
				beforeSend: function() { //before ajax request is sent, do this

					$(original_this).parent('td').append("<p class='tooltip load' style='background-image: url(img/loading.gif);'></p>");
				
				},
				complete: function() { //if ajax request is completed (either success or fail)

					$(original_this).siblings('.tooltip.load').remove();

				},
				success: function(data) { //if ajax request is successful and data are received

					$(original_this).parent('td').append(data);
					request = null; //set request to [orignal state] null -> there are no active request

				}

			});

		}, 1000); //delay ajax request for 1 second


	});

	$('#employee-table').on('mouseleave', '.view-info', function(event) {

		clearTimeout(request); //cancel existing ajax request
		$('body').find('.tooltip').remove();

	});

});

//CUSTOM FUNCTIONS

function load_employees() {

	$('#employee-table').load('ajax/load_employee.php'); //shorthand function for loading a file using AJA $.load 

}