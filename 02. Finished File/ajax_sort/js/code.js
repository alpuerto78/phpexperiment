$(document).ready(function() {

	display_data(); 

	$('#container-data').on('click','.up, .down', function() {

		var _this = $(this);

		var field_value = _this.attr('data-field');
		var sort_value = _this.attr('data-sort');

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
		var has_classUp = _this.hasClass('up');

		set_arrow_colors(_this, has_classUp);

	});

	//---- CUSTOM FUNCTIONS

	function display_data() {

		$.ajax({

			url: "display_data.php",
			method: "POST",
			success: function(data) {

				fetch_data(data);

			}

		});

	}

	function set_arrow_colors(_this, has_classUp) {

		if (has_classUp) {

			_this.attr('src','img/arrow-up-black.gif');
			_this.siblings('img').attr('src','img/arrow-down-grey.gif');

		} else {

			_this.attr('src','img/arrow-down-black.gif');
			_this.siblings('img').attr('src','img/arrow-up-grey.gif');

		}

		_this.parent('td').siblings('td').find('img.up').attr('src','img/arrow-up-grey.gif');
		_this.parent('td').siblings('td').find('img.down').attr('src','img/arrow-down-grey.gif');

	}

	function fetch_data(data) {

		$('.tr-contents').remove();
		$(data).insertAfter('.table-header');

	}

	//---- END CUSTOM FUNCTIONS

});


