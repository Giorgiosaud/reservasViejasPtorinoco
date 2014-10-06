// 	$.datepicker.regional['es'] = {
// 		closeText: 'Cerrar',
// 		prevText: '<Ant',
// 		nextText: 'Sig>',
// 		currentText: 'Hoy',
// 		monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
// 		monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
// 		dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
// 		dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
// 		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
// 		weekHeader: 'Sm',
// 		dateFormat: 'dd/mm/yy',
// 		firstDay: 1,
// 		isRTL: false,
// 		showMonthAfterYear: false,
// 		yearSuffix: ''
// 	};
// 	$.datepicker.setDefaults($.datepicker.regional['es']);
// 	fecha = new Date($('#fecha').val());
// 	fecha.setHours(0);
// 	dia=fecha.getDate();
// 	dia=dia+1;
// 	fecha.setMinutes(0);
// 	fecha.setDate(dia);
// 	$('#fecha2').datepicker({
// 		dateFormat:"DD, d 'de' MM 'de', yy",
// 		altField:"#fecha", 
// 		altFormat:"yy-mm-dd", 
// 		defaultDate:fecha
// 	});
// 	$('#botonConsultarPorZarpe').click(function(){
// 		$this=$(this);
// 		console.log($("#consulta_fecha_hora").serialize());
// 		$.ajax({
// 			url: 'php/funciones/listaDeReservacionesporZarpe.php',
// 			type: 'POST',
// 			dataType: 'html',
// 			data: $("#consulta_fecha_hora").serialize(),
// 		})
// 		.done(function(data) {
// 			console.log("Consultada");
// 			$('#respuesta').slideUp('slow',function(){
// 				$('#respuesta').html(data);
// 				$('#respuesta').slideDown('slow');
// 			});
// 		})
// 		.fail(function() {
// 			console.log("error");
// 		})
// 		.always(function() {
// 			console.log("complete");
// 		});
// });