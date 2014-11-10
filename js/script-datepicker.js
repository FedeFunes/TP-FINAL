$(function() {
	$( "#fechaIda" ).datepicker({
		dateFormat: 'yy-mm-dd', 
		minDate: 0, 
		maxDate: "+1M +20D" 
	});
});

$(function() {
$( "#fechaVuelta" ).datepicker({
		dateFormat: 'yy-mm-dd', 
		minDate: 1, 
		maxDate: "+1M +21D" 
	});
});

$(function() {
	$( "#fechaNac" ).datepicker({
		dateFormat: 'yy-mm-dd', 
		changeMonth: true, 
		changeYear: true, 
		yearRange: '-100:+0'
	});
});
