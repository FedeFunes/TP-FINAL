$(function() {
	$( "#fecha_ida" ).datepicker({dateFormat: 'dd/mm/yy', minDate: 0, maxDate: "+1M +20D" });
});

$(function() {
$( "#fecha_vuelta" ).datepicker({dateFormat: 'dd/mm/yy', minDate: 1, maxDate: "+1M +21D" });
});

$(function() {
	$( "#fecha_nac" ).datepicker({dateFormat: 'dd/mm/yy', changeMonth: true, changeYear: true, yearRange: '-100:+0'});
});
