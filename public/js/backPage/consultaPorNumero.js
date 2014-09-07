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
	$('#hora').children().eq($('#hora2').val()).attr('selected', 'selected');
	$('#hora').change(function(event) {
		$('#hora2').val($('#hora').val());
	});
	$('#hora,#fecha2').change(function(event) {
		embarcacionval=$("#tipoDeEmbarcacion").val();
		horaval=$('#hora2').val();
		fechaval=$('#fecha').val();
		$.ajax({
			url: 'php/funciones/obtenerMaximosReservas.php',
			type: 'GET',
			dataType: 'text',
			data: {embarcacion: embarcacionval, hora: horaval, fecha: fechaval},
			beforeSend: function(){
				$('#disponibilidad').html('Consultando');
			},
			success: function(data){
				$('#disponibilidad').html(data);
			}
		});
		console.log('cambio');
	});
});


