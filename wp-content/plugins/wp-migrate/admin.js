/**
 * JavaScript bindings for the admin settings page
 */
jQuery(function($) {

	/**
	 * Initialization
	 */
	$('#advanced-options').hide();
	
	/**
	 * Display advanced settings panel
	 */
	$('#show-advanced').click(function() {
		$('#advanced-options').show();
		$(this).hide();
		return false;
	});
	
	/**
	 * Select all tables
	 */
	$('#select-all-tables').click(function() {
		$('#option_tables option').each(function() {
			$(this).attr("selected", "selected");
		});
		return false;
	});
	
	/**
	 * DE-select all tables
	 */
	$('#select-no-tables').click(function() {
		$('#option_tables').val('');
		return false;
	});
	
	/**
	 * Test database settings
	 */
	$('#test-db').click(function() {
		$('#test-results').attr("class", "");
		$('#test-results').html('Testing, this may take a moment...');
		
		var options = {
			dbhost : $('#targethost').val(),
			dbuser : $('#targetuser').val(),
			dbpass : $('#targetpassword').val(),
			dbname : $('#targetdbname').val(),
			prefix : $('#targetprefix').val()
		}
		$.post('options-general.php?page=wp-migrate/wp-migrate.php&testdb=1',
			options, function (response) {
				$('#test-results').children().remove();
				$('#test-results').html(response.message);
				$('#test-results').attr("class", response.status);
				
				// update table names
				for(var i in response.tables) {
					var tableRow = document.createElement('option');
					tableRow.value = response.tables[i];
					tableRow.appendChild(document.createTextNode(response.tables[i]));
					$('#option_tables').append(tableRow);
				}
				
				if (response.status == 'success') {
					$('#more-options').slideDown();
					$('#migrate').show();
				} else {
					$('#more-options').slideUp();
					$('#migrate').hide();
				}
			}, 'json');
		return false;
	});
	
	$('#show-logs').click(function() {
		$('#logs').slideDown();
		return false;
	});

});