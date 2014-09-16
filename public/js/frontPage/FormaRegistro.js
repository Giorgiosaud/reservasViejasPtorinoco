// window.DiasMinimosParaReservar=1;
$(document).ready(function() {
  obtenerVariables();
  $('#fecha2').change(function(event) {
    $.get('boat/bydate/'+$('#fecha').val(), function(data) {
      $('.boat').removeClass('active');
      $('span.cupos').html('');
      window.datos=data;
      obj=$('#opcionesDeEmbarcacion').children().children();
      embarcacion=[];
      for (var i = 0; i < obj.length; i++) {
        
        embarcacion[i]= obj[i].value;
      };

      for (var i = 0; i < embarcacion.length; i++) {
        if(window.datos.cupos[embarcacion[i]].disponiblesNormalDia>0){
        $( "input[value='"+embarcacion[i]+"']" ).parent().removeClass('disabled');
      }
      };

    },"json");
    
  });
  $('.boat').on('click', function(event) {
    embarcacion=$(this).children().val();
    cuposNormales=window.datos.cupos[embarcacion].disponiblesNormal;
    $('input[name="hora"').each(function(){
      cuposhora=cuposNormales[(this).value];
      $($(this).parent()[0]).removeClass('disabled').children('.cupos').html("cupos: "+cuposhora);
    });
    
    
    // $('input[name="hora"').filter('input[value="4"]').parent().append()
    

    /* Act on the event */
  });
	$('.btn').button();
	$('.selectpicker').selectpicker();
	$("input:checked").each(function(){
		$(this).parent().addClass('active')
	});
	$('.tienepopover').popover({
		trigger:'manual'
	});
	// //Verificar cada Campo
	// $('#fecha2').on("change",function(){
	// 	actualizarPuestosDisponibles();
	// });
	// $('input:radio[name="hora"]').parent().on("click",function(){
	// 	$('input:radio[name="hora"]').parent().removeClass('btn-success');
	// 	$(this).addClass('btn-success');
	// });
	// $('input:radio[name="hora"]').change(function(){
	// 	getPrecios();
	// });
	// $('input:radio[name="embarcacionSeleccionada"]').change(function(){
	// 	actualizarPuestosDisponibles();
	// });
	// $('#cedula').on("blur",function(e){
	// 	e.preventDefault();
	// 	validateCedula($(this));
	// });
	// $('#Nombre, #Apellido').on("blur",function(e){
	// 	e.preventDefault();
	// 	convertir($(this));
	// });
	// $('#email').on("blur",function(e){
	// 	e.preventDefault();
	// 	validateEmail($(this));
	// });
	// $('#telefono').on("blur",function(e){
	// 	e.preventDefault();
	// 	validateTelefono($(this));
	// });
	// $(':input[type="number"]').on('change',function(e){
	// 	actualizarTotal();
	// });
	// $( "form" ).on( "submit", function( event ) {
	// 	event.preventDefault();
	// 	verificaryEnviar();
	// });
	// $("#aceptarTerminos").on('click',function(){
	// 	console.log('Acepto');
	// });

});
