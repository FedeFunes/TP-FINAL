$(function() {
	$( "#fecha_ida" ).datepicker({
		dateFormat: 'dd/mm/yy', 
		minDate: 0, 
		maxDate: "+1M +20D",
		dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
		dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ] 
	});
});

$(function() {
	$( "#fecha_vuelta" ).datepicker({
		dateFormat: 'dd/mm/yy', 
		minDate: 1, 
		maxDate: "+1M +21D",
		dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
		dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ] 
	});
});

$(function() {
	$( "#fecha_nac" ).datepicker({
		dateFormat: 'dd/mm/yy', 
		changeMonth: true, 
		changeYear: true, 
		yearRange: '-100:+0',
		dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
		dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ]
	});
});

$(function alertDate() {
	var date = $( "#fecha_nac" ).datepicker('getDate');
	alert(date);
});