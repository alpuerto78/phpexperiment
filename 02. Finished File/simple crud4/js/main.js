$(document).ready(function() {

	$('#departmentid').on('change', function() {

		$('#programid').prop('disabled', false);

		departmentid = $(this).val();

		load_program(departmentid);

	});


});

function load_program(departmentid) {

	var program_id = $('#programid');
	var department_id = $('#departmentid');

	$.ajax({

		method: 'POST',
		url: 'load_program.php',
		data: {departmentid : departmentid},
		success: function(data) {

			program_id.html(data);

		}

	});

}