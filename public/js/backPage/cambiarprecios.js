$('input[name=new_p_ad2h_ES]').change(function(){
	$('input[name=new_p_ad2h_FS]').val($('input[name=new_p_ad2h_ES]').val());
	$('input[name=new_p_adMay2h_ES]').val($('input[name=new_p_ad2h_ES]').val()/2);
	$('input[name=new_p_N2h_ES]').val($('input[name=new_p_ad2h_ES]').val()/2);
	$('input[name=new_p_adMay2h_FS]').val($('input[name=new_p_ad2h_ES]').val()/2);
	$('input[name=new_p_N2h_FS]').val($('input[name=new_p_ad2h_ES]').val()/2);
});
$('input[name=new_p_ad1h_ES]').change(function(){
	$('input[name=new_p_ad1h_FS]').val($('input[name=new_p_ad1h_ES]').val());
	$('input[name=new_p_adMay1h_ES]').val($('input[name=new_p_ad1h_ES]').val()/2);
	$('input[name=new_p_adMay1h_FS]').val($('input[name=new_p_ad1h_ES]').val()/2);
	$('input[name=new_p_N1h_ES]').val($('input[name=new_p_ad1h_ES]').val()/2);
	$('input[name=new_p_N1h_FS]').val($('input[name=new_p_ad1h_ES]').val()/2);
});
$('#botonReservar').click(function(){
	$.post( "php/funciones/actualizar_precios.php", $( "#actualizarPrecios" ).serialize(),function (){
		$('#respuesta').slideUp('slow',function(){
			$(this).html('Los Precios Fueron Actualizados Satisfactoriamente');
			$(this).slideDown('slow');
		});
	});
});