// window.DiasMinimosParaReservar=1;
$(document).ready(function() {
  $('#fecha2').datepicker({
    dateFormat:"DD, d 'de' MM 'de', yy",
      // beforeShowDay: fechasExcepcion,
      // minDate: minimoDiasAReservar,
      altField:"#fecha", 
      altFormat:"yy-mm-dd", 
    });

	// $('.btn').button();
	// $('.selectpicker').selectpicker();
	// $("input:checked").each(function(){
	// 	$(this).parent().addClass('active')
	// });
	// $('.tienepopover').popover({
	// 	trigger:'manual'
	// });
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
