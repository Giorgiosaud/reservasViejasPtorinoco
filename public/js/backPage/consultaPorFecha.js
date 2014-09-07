$('#botonConsultar').click(function(e){
	$( "#fecha" ).datepicker();
	e.preventDefault();
	$this=$(this);
	$.ajax({
		type:"POST",
		url: "php/funciones/listaDeReservacionesPorFecha.php",
		data: $("#consulta_fecha").serialize(),
		success: function(data){
			$('#respuesta').slideUp('slow',function(){
				$('#respuesta').html(data);
				$('#respuesta').slideDown('slow');
			});
		},
		dataType:"html"
	});
});



$(document).ready(function (){
	$.datepicker.regional['es'] = {
		closeText: 'Cerrar',
		prevText: '<Ant',
		nextText: 'Sig>',
		currentText: 'Hoy',
		monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
		dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
	};
	$.datepicker.setDefaults($.datepicker.regional['es']);
	fecha = new Date($('#fecha').val());
	fecha.setHours(0);
	dia=fecha.getDate();
	dia=dia+1;
	fecha.setMinutes(0);
	fecha.setDate(dia);
	$('#fecha2').datepicker({
		dateFormat:"DD, d 'de' MM 'de', yy",
		altField:"#fecha", 
		altFormat:"yy-mm-dd", 
		defaultDate:fecha
	});
});