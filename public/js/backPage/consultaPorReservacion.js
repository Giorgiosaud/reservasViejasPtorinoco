// $('#botonConsultar').click(function(){
// 	$.ajax({
// 		type:"POST",
// 		url: "php/funciones/consultaPorNumero.php",
// 		data: $("#consulta_reserva").serialize(),
// 		success: function(data){
// 			$('#respuesta').slideUp('slow',function(){
// 				$('#respuesta').html(data);
// 				$('#respuesta').slideDown('slow');
// 			});
// 			$.getScript( "js/consultaPorNumero.js", function( data, textStatus, jqxhr ) {
// 			console.log( "Load was performed." );
// 		});
// 		},
// 		dataType:"html"
// 		});
// });