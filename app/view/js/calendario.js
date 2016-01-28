$(document).ready(function(){
	//$("#calendario").fullCalendar({})
	/*
	$(".fechaTurno").pickadate({
		format: 'dd/mm/yyyy'
	});
	$(".horaTurno").pickatime({
		interval: 20,
		format: 'H:i'
	});
	*/
	$(".datetimepicker").datetimepicker({});
	$(".datepicker").datetimepicker({
		timepicker:false,
		format:'Y/m/d'
	});
	$(".timepicker").datetimepicker({
		datepicker:false,
  		format:'H:i'
	});
	$(".datetimeparaturnos").datetimepicker({
		allowTimes:[
	  		'12:00', '13:00', '15:00', '17:00', '17:05', '17:20', '19:00', '20:00'
	 	]
	});		
	$(".datetimeparaturnosinline").datetimepicker({
		inline:true
	});
});