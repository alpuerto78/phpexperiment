var request = null;
$(document).ready(function() {

	load_employees(); //load employee table
	load_pagination(); //load pagination

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
		var field = $('#live-search #field').val();

		load_search(field, search);

	});

	$('#employee-table').on('click', '.view-info', function(event) { //on click, load load_view_form.php

		event.preventDefault();

		var employeeid = $(this).attr('data-employee-id');

		$('#overlay').load('ajax/load_view_form.php?employeeid=' + employeeid).fadeIn();

		remove_tooltip();

	});

	$('#overlay').on('click', '.close', function(event) { //on click, close overlay

		$(this).parents('#overlay').fadeOut();

	});

	// show tooltip

	$('#employee-table').on('mouseenter', '.view-info', function() { //on mouseover, show tooltip

		var employeeid = $(this).attr('data-employee-id');
		var original_this = this; //assign original context of this to a variable;

		if (request) {

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
				complete: function() { //if ajax request is completed (either success of fail)

					$('.tooltip.load').remove();

				},
				success: function(data) { //if ajax request is successful and data are received

					$(original_this).parent('td').append(data);

					request = null;

				}

			});

		}, 2000);



	});

	// remove tooltip

	$('#employee-table').on('mouseleave', '.view-info', function(event) {

		clearTimeout(request);
		remove_tooltip();

	});

	// page number is clicked

	$('#pagination-container').on('click', 'li > a', function(event) {

		event.preventDefault();

		var page = $(this).attr('data-page');

		$('#employee-table').load('ajax/load_employee.php?page=' + page);

	});

});

//CUSTOM FUNCTIONS

function load_pagination() {

	$('#pagination-container').load('ajax/load_pagination.php');

}

function load_employees() {

	$('#employee-table').load('ajax/load_employee.php'); //shorthand function for loading a file using AJA $.load 

}

function load_search(field, search) {

	if (request) { //if the user is still typing on the search box, don't send request yet

		clearTimeout(request);

	}

	request = setTimeout(function() {

		$.ajax({

			method: 'POST',
			url: 'ajax/load_search.php',
			data: {field : field, search : search},
			success: function(data) {

				$('#employee-table').html(data);
				request = null;	
			}

		});

	}, 1000);

}

function remove_tooltip() {

	$('body').find('.tooltip').remove();

}

