$(document).ready(function() {

	display_data(); 

	$('#container-data').on('click','.up, .down', function() {

		var field_value = $(this).attr('data-field');
		var sort_value = $(this).attr('data-sort');

		$.ajax({

			url: "sorted_data.php",
			method: "POST",
			data: {field_value: field_value, sort_value: sort_value},
			success: function(data) {

				fetch_data(data);

			}

		});	

	});


	$('#container-data').on('click','.up, .down', function() {

		var _this = $(this);

		var color_value = _this.attr('src');
		var has_class = _this.hasClass('up');

		if (has_class) { //for up

			if (color_value == 'img/arrow-up-grey.gif') {

				_this.siblings('img').attr('src','img/arrow-down-grey.gif');
				_this.attr('src','img/arrow-up-black.gif');

			} else {

				_this.siblings('img').attr('src','img/arrow-up-grey.gif');
				_this.attr('src','img/arrow-down-black.gif');

			}


		} else {

			if (color_value == 'img/arrow-down-grey.gif') {

				_this.siblings('img').attr('src','img/arrow-up-grey.gif');
				_this.attr('src','img/arrow-down-black.gif');

			} else {

				_this.siblings('img').attr('src','img/arrow-up-black.gif');
				_this.attr('src','img/arrow-down-grey.gif');

			}


		}

		all_arrow_grey(_this);

	});


});

//CUSTOM FUNCTIONS

function display_data() {

	$.ajax({

		url: "display_data.php",
		method: "POST",
		success: function(data) {

			fetch_data(data);

		}

	});

}

function all_arrow_grey(_this) {

	_this.parent('td').siblings('td').find('img.up').attr('src','img/arrow-up-grey.gif');
	_this.parent('td').siblings('td').find('img.down').attr('src','img/arrow-down-grey.gif');

}

function fetch_data(data) {

	$('.tr-contents').remove();
	$(data).insertAfter('.table-header');

}

