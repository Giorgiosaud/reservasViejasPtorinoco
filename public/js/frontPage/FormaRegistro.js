// window.DiasMinimosParaReservar=1;
$(document).ready(function() {
  $('.btn').button();
  $('.selectpicker').selectpicker();
  $("input:checked").each(function(){
    $(this).parent().addClass('active')
  });
  $('.tienepopover').popover({
    trigger:'manual'
  });
  obtenerVariables();
  $('#fecha2').change(function(event) {
    $( ".boat, .botonhora" ).addClass('disabled');
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
    window.embarcacion=$(this).children().val();
    cuposNormales=window.datos.cupos[window.embarcacion].disponiblesNormal;
    $('.numeroDeCupos').val(0);
    $('input[name="hora"]').each(function(){
      cuposhora=cuposNormales[(this).value];
      if(cuposhora>0){
        $($(this).parent()[0]).removeClass('disabled').children('.cupos').html("cupos: "+cuposhora);
      }
      else{
       $($(this).parent()[0]).addClass('disabled').children('.cupos').html("cupos: "+cuposhora); 
     }
   });
  });
  $('.botonhora').click(function(event) {
    window.hora=$(this).children().val();
    window.disponibilidad=window.datos.cupos[window.embarcacion].disponiblesNormal[window.hora];
    window.precios=window.datos.cupos[window.embarcacion].precio[window.hora];
    $('.numeroDeCupos').val(0);
  });
  $('#identification').change(function(event) {
    cedula=($('select[name="rifInicio"]').val()+'-'+$('#identification').val());
    $.get('client/'+cedula, function(data) {
      if(data.datos=="noExisten"){
        $('.inputDatosPersonales').val("");
        jAlert('Sus datos no estan en el sistema por favor ingreselos a continuacion', 'Bienvenido');
        $('.inputDatosPersonales').removeAttr('disabled');
      }
      else{
        jAlert('Verifique sus datos a continuacion', 'Bienvenido Nuevamente');
        $('#name').val(data.datos.name);
        $('#lastName').val(data.datos.lastName);
        $('#email').val(data.datos.email);
        $('#phone').val(data.datos.phone);
        $('.inputDatosPersonales').removeAttr('disabled');
      }
    },'json');
  });
  $('.numeroDeCupos').change(function(event) {
    pasajesadultos=parseInt($('#pasajesadultos').val())||0;
    mayores=parseInt($('#3eraEdad').val())||0;
    ninos=parseInt($('#ninos').val())||0;
    actual=parseInt($(this).val())||0;
    totalPasajes=pasajesadultos+mayores+ninos;
    maximoActual=window.disponibilidad-totalPasajes+actual;
    $('.numeroDeCupos').attr('max',maximoActual);
    if(totalPasajes>=(window.disponibilidad+1)){
      $(this).val(0);
    }
    totalMontoAdultos=parseInt(pasajesadultos*window.precios.adulto);
    totalMontoMayores=parseInt(mayores*window.precios.mayor);
    totalMontoNinos=parseInt(ninos*window.precios.nino);
    totalAPagar=totalMontoNinos+totalMontoMayores+totalMontoAdultos;
    $('#precioAdultos').html(totalMontoAdultos+' Bs.');
    $('#precioMayores').html(totalMontoMayores+' Bs.');
    $('#precioNinos').html(totalMontoNinos+' Bs.');

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

