
$( document ).ajaxComplete(function() {
  $('#fecha2').datepicker({
    dateFormat:"DD, d 'de' MM 'de', yy",
    altField:"#fecha", 
    altFormat:"yy-mm-dd",
  });
  if($('#fecha').val()!=""){
    date= new Date($('#fecha').val());
    date.setDate(date.getDate()+1);
    console.log($('#fecha').val());
    $("#fecha2").datepicker('setDate', date);
  }
});
$(document).ready(function() {
  // $('.dropdown-menu a').click(function(e){
  //   e.preventDefault();
  //   $this=$(this);
  //   href=$this.attr('href');
  //   script=$this.data("script");
  //   actualPage=$(location).attr('href');
  //   $('#PaneldeRespuesta').slideUp('slow',function(){
  //     $('.jumbotron').load(href +' #respuesta',function(){
  //       $('#PaneldeRespuesta').slideDown('slow',function(){
  //         $.getScript(script,function(){
  //           console.log(script);
  //         });
  //       });
  //     });
  //   });
  // });
  $('body').on('mouseover', '#fecha2', function(event) {
    event.preventDefault();
    $('#fecha2').datepicker({
    dateFormat:"DD, d 'de' MM 'de', yy",
    altField:"#fecha", 
    altFormat:"yy-mm-dd",
  });
    
  });
  $('body').on('click', '.numeroDeReserva', function(event) {
    event.preventDefault();
    console.log($(this).html());
    $this=$(this);
    numeroDeReserva=parseInt($this.html());
    $.ajax({
      type:"GET",
      url: "reservas/"+numeroDeReserva,
      success: function(data){
        $('.modal-body').html(data);
        $('#myModal').modal();
        $('#myModalLabel').html('Reservacion numero '+numeroDeReserva);
            // $.getScript(script,function(){
            //     console.log(script);
            // });
  },
  dataType:"html"
});
  });
  
})
// });
// $( document ).ajaxStop(function() {
//     $('.selectpicker').selectpicker();
//     $('.diaDeSemana').bootstrapSwitch();
// });
// $(document).on('click', '.botonAbordaje', function(event) {
//     $('#PaneldeRespuesta').slideUp('slow',function(){
//         $.ajax({
//             url: 'php/funciones/listaDeAbordaje.php',
//             type: 'POST',
//             dataType: 'html',
//             data: $('#consulta_abordaje').serialize(),
//         })
//             .done(function(respuesta) {
//                 $('#respuesta').html(respuesta);
//                 $('#PaneldeRespuesta').slideDown('slow');
//             })
//             .fail(function() {
//                 console.log("error");
//             })
//             .always(function() {
//                 console.log("complete");
//             });
//     });
// });


// $(document).on('click', '.botonConsultarReserva', function(event) {
//     // console.log($('#consultarReserva').serialize());
//     numeroDeReserva=$('#reservacion').val();
//     if ($('#reservacion').val()=='' && $('#fecha2').val()=='' && $('#hora').val()=='0' && $('#tipoDeEmbarcacion').val()=='Ambas'){
//         alert('Por Favor Utilice los criterios de busqueda');
//         return false;
//     }
//     else{
//         if ($('#reservacion').val()!='') {
//             $.ajax({
//                 type:"POST",
//                 url: "php/funciones/consultaPorNumero.php",
//                 data: {
//                     reservacion:$('#reservacion').val()
//                 },
//                 success: function(data){
//                     $('.modal-body').html(data);
//                     $('#myModal').modal();
//                     $('#myModalLabel').html('Reservacion numero '+numeroDeReserva);
//                     $.getScript(script,function(){
//                         console.log(script);
//                     });
//                 },
//                 dataType:"html"
//             });
//         } else{
//             $('#PaneldeRespuesta').slideUp('slow',function(){
//                 $.ajax({
//                     url: 'php/funciones/listaDeReservaciones.php',
//                     type: 'POST',
//                     dataType: 'html',
//                     data: $('#consultarReserva').serialize(),
//                 })
//                     .done(function(respuesta) {
//                         $('#respuesta').html(respuesta);
//                         $('#PaneldeRespuesta').slideDown('slow');
//                         // alert(respuesta);
//                     })
//                     .fail(function() {
//                         console.log("error");
//                     })
//                     .always(function() {
//                         console.log("complete");
//                     });


//             });
//         };
//         // alert('si');
//         return true;
//     }
//     /* Act on the event */
// });
// $(document).on('click', '.chequear', function(event) {
//   event.preventDefault();
//   $this=$(this);
//   numeroDeReserva=parseInt($this.html());
//   console.log(numeroDeReserva);
//   $.ajax({
//     url: 'php/funciones/abordarReservaDatos.php',
//     type: 'POST',
//     dataType: 'json',
//     data: {reserva: numeroDeReserva},
//   })
//   .done(function(respuesta) {
//     $('#Abordados tr:last').after('<tr><td>'+respuesta.numeroDeReserva+'</td><td>'+respuesta.nombre+'</td><td>'+respuesta.apellido+'</td><td>'+respuesta.visitas+'</td><td>'+respuesta.email+'</td><td>'+respuesta.telefono+'</td><td>'+respuesta.cuposAdultos+'</td><td>'+respuesta.cuposMayores+'</td><td>'+respuesta.cuposNinos+'</td><td>'+respuesta.cuposTotales+'</td><td>'+respuesta.montoAPagar+'</td><td>'+respuesta.Referencia+'</td></tr>');
//     console.log("success");
//   })
//   .fail(function() {
//     console.log("error");
//   })
//   .always(function() {
//     console.log("complete");
//   });

// });
// $(document).on('click', '.numReserva', function(event) {
//     $this=$(this);
//     numeroDeReserva=parseInt($this.html());
//     script = $this.data("script");
//     $.ajax({
//         type:"POST",
//         url: "php/funciones/consultaPorNumero.php",
//         data: {
//             reservacion:numeroDeReserva
//         },
//         success: function(data){
//             $('.modal-body').html(data);
//             $('#myModal').modal();
//             $('#myModalLabel').html('Reservacion numero '+numeroDeReserva);
//             $.getScript(script,function(){
//                 console.log(script);
//             });
//         },
//         dataType:"html"
//     });
// });
// $(document).on('click', '.addSpecialDate', function(event) {
//     event.preventDefault();
//     $('#formularioDiaEspecial').modal('show');
//     $('#fecha2').l({
//         dateFormat:"DD, d 'de' MM 'de', yy",
//         altField:"#fecha",
//         altFormat:"yy-mm-dd"
//     });
//     $('.activo').bootstrapSwitch();
// });
// $(document).on('click', '.cancelarFechaEspecial', function(event) {
//     event.preventDefault();
//     $('#datosDiaEspecial').trigger("reset");
//     $('#formularioDiaEspecial').modal('hide');
// });
// $(document).on('click', '.guardarFechaEspecial', function(event) {
//     event.preventDefault();
//     $.ajax({
//         url: 'php/funciones/diasEspeciales.php',
//         type: 'POST',
//         dataType: 'html',
//         data: $('#datosDiaEspecial').serialize(),
//     })
//         .done(function(data) {
//             $('#formularioDiaEspecial').modal('hide');
//             $('#respuesta').slideUp('slow',function(){
//                 $('#respuesta').html(data);
//                 $('#respuesta').slideDown('slow');
//             });
//         })
// });
// $(document).on('click', '.borrarFechaEspecial', function(event) {
//     event.preventDefault();
//     $('borrar').val('borrar');
//     $.ajax({
//         url: 'php/funciones/diasEspeciales.php',
//         type: 'POST',
//         dataType: 'html',
//         data: $('#datosDiaEspecial').serialize(),
//     })
//         .done(function(data) {
//             $('#formularioDiaEspecial').modal('hide');
//             $('#respuesta').slideUp('slow',function(){
//                 $('#respuesta').html(data);
//                 $('#respuesta').slideDown('slow');
//             });
//         })
// });
// $(document).on('click', '.fechaEspecial', function(event) {
//     event.preventDefault();
//     $this=$(this);
//     activo=$this.data('activo');
//     var fecha=$.trim($this.find('td:eq(0)').text());
//     var descripcion=$.trim($this.find('td:eq(1)').text());
//     var clase=$.trim($this.find('td:eq(2)').text());
//     var dt1   = parseInt(fecha.substring(0,2));
//     var mon1  = parseInt(fecha.substring(3,5));
//     var yr1   = parseInt(fecha.substring(6,10));
//     var date1 = new Date(yr1, mon1-1, dt1);
//     // alert(date1);
//     $('#formularioDiaEspecial').modal('show');
//     $('#fecha2').datepicker({
//         dateFormat:"DD, d 'de' MM 'de', yy",
//         altField:"#fecha",
//         altFormat:"yy-mm-dd"
//     });
//     $( "#fecha2" ).datepicker( "setDate", date1 );
//     $('.activo').bootstrapSwitch();
//     if(activo=="si"){
//         $('input[name="activo"]').bootstrapSwitch('state',true)
//     }
//     else{
//         $('input[name="activo"]').bootstrapSwitch('state',false)
//     }

//     $( "#descripcionField" ).val(descripcion);
//     $( "#claseField" ).val(clase);
// });
// $(document).on('click', '.botonConsultarReservaPorNumero', function(event) {
//     $this=$(this);
//     numeroDeReserva=$('#reservacion').val();
//     console.log(numeroDeReserva);
//     script = $this.data("script");
//     $.ajax({
//         type:"POST",
//         url: "php/funciones/consultaPorNumero.php",
//         data: {
//             reservacion:numeroDeReserva
//         },
//         success: function(data){
//             $('.modal-body').html(data);
//             $('#myModal').modal();
//             $('#myModalLabel').html('Reservacion numero '+numeroDeReserva);
//             $.getScript(script,function(){
//                 console.log(script);
//             });
//         },
//         dataType:"html"
//     });
// });
// $(document).on('click', '.recargar', function(event) {
//     event.preventDefault();
//     $this=$(this);
//     console.log($this);
//     $.ajax({
//         type:"POST",
//         url: "php/funciones/listaDeReservaciones.php",
//         data: $("#reload").serialize(),
//         success: function(data){
//             $('#respuesta').slideUp('slow',function(){
//                 $('#respuesta').html(data);
//                 $('#respuesta').slideDown('slow');
//             });

//         },
//         dataType:"html"
//     });

// });
// $(document).on('click', '.recargarAbordaje', function(event) {
//     event.preventDefault();
//     $this=$(this);
//     console.log($this);
//     $.ajax({
//         type:"POST",
//         url: "php/funciones/listaDeAbordaje.php",
//         data: $("#reloadAbordaje").serialize(),
//         success: function(data){
//             $('#respuesta').slideUp('slow',function(){
//                 $('#respuesta').html(data);
//                 $('#respuesta').slideDown('slow');
//             });

//         },
//         dataType:"html"
//     });

// });
// $(document).on('click', '.guardarPago', function(event) {
//     event.preventDefault();
//     tipoDePago=$('#tipoDePago').val();
//     montoDePago=$('#montoPagado').val();
//     referenciaDePago=$('#Referencia').val();
//     numeroDeReserva=$('#numeroDeReserva').val();
//     if(tipoDePago=='0'||montoDePago==''){
//         return false;
//     }
//     $.ajax({
//         url: 'php/funciones/sumarpago.php',
//         type: 'POST',
//         dataType: 'html',
//         data: {tipo: tipoDePago,monto:montoDePago,referencia:referenciaDePago,reserva:numeroDeReserva},
//     })
//         .done(function(respuesta) {
//             console.log("success");
//             $('#tablaPagos').html(respuesta);
//         })
//         .complete(function(respuesta){
//             $.ajax({
//                 url: 'php/funciones/totalPagos.php',
//                 type: 'GET',
//                 dataType: 'json',
//                 data: {numeroDeRes: numeroDeReserva},
//             })
//                 .done(function(respuesta) {
//                     console.log(respuesta);
//                     $('#montoTotal').text(respuesta.Total);
//                     $('#montoAbonado').text(respuesta.Abonado);
//                     $('#montoDeuda').text(respuesta.Deuda);
//                     $('#pagoEscrito').text(respuesta.PagoEscrito);
//                 })
//         })
// });
// $(document).on('click', '.rechazarPago', function(event) {
//     event.preventDefault();
//     montoDePago=$('#montoPagado').val('');
//     referenciaDePago=$('#Referencia').val('');
// });
// $(document).on('click', '.borrarPago', function(event) {
//     event.preventDefault();
//     idPagox=$(this).parent().parent().children().eq(0).html();
//     numeroDeReserva=$('#numeroDeReserva').val();
//     $.ajax({
//         url: 'php/funciones/borrarpago.php',
//         type: 'POST',
//         dataType: 'html',
//         data: {idPago: idPagox,numeroDeRes:numeroDeReserva},
//     })
//         .done(function(respuesta) {
//             console.log("Pago "+idPagox+" Borrado");
//             $('#tablaPagos').html(respuesta);
//         })
//         .complete(function(respuesta){
//             $.ajax({
//                 url: 'php/funciones/totalPagos.php',
//                 type: 'GET',
//                 dataType: 'json',
//                 data: {numeroDeRes: numeroDeReserva},
//             })
//                 .done(function(respuesta) {
//                     console.log(respuesta);
//                     $('#montoTotal').text(respuesta.Total);
//                     $('#montoAbonado').text(respuesta.Abonado);
//                     $('#montoDeuda').text(respuesta.Deuda);
//                     $('#pagoEscrito').text(respuesta.PagoEscrito);
//                 })
//         })
// });
// $(document).on('click', '.abordarReserva', function(event) {
//     event.preventDefault();
// });
// $(document).on('click', '.cancelarCambiosEnReserva', function(event) {
//     event.preventDefault();
// });
// $(document).on('click', '.guardarDiasDeLaSemana', function(event) {
//     event.preventDefault();
//     $.ajax({
//         url: 'php/funciones/modificarDiasDeLaSemana.php',
//         type: 'POST',
//         dataType: 'html',
//         data: $('#DiasDeLaSemana').serialize(),
//     })
//         .done(function(respuesta) {
//             $('#resultadoDias').modal('show');
//         })
// });


// $(document).on('click', '.guardarPasajero', function(event) {
//     event.preventDefault();
//     nombrePasajero=$('#nombrePasajero').val();
//     apellidoPasajero=$('#apellidoPasajero').val();
//     cedulaPasajero=$('#cedulaPasajero').val();
//     emailPasajero=$('#emailPasajero').val();
//     numeroDeReserva=$('#numeroDeReserva').val();
//     if(nombrePasajero=='0'||apellidoPasajero==''){
//         return false;
//     }
//     $.ajax({
//         url: 'php/funciones/anadirPasajero.php',
//         type: 'POST',
//         dataType: 'html',
//         data: {nombre: nombrePasajero,apellido:apellidoPasajero,cedula:cedulaPasajero,email:emailPasajero,reserva:numeroDeReserva},
//     })
//         .done(function(respuesta) {
//             console.log("success");
//             $('#tablaPasajeros').html(respuesta);
//         })
// });
// $(document).on('click', '.rechazarPasajero', function(event) {
//     event.preventDefault();
//     nombrePasajero=$('#nombrePasajero').val('');
//     apellidoPasajero=$('#apellidoPasajero').val('');
//     cedulaPasajero=$('#cedulaPasajero').val('');
//     emailPasajero=$('#emailPasajero').val('');
// });
// $(document).on('click', '.quitarPasajero', function(event) {
//     event.preventDefault();
//     nombre=$(this).parent().parent().children().eq(0).html();
//     apellido=$(this).parent().parent().children().eq(1).html();
//     cedula=$(this).parent().parent().children().eq(2).html();
//     email=$(this).parent().parent().children().eq(3).html();
//     numeroDeReserva=$('#numeroDeReserva').val();
//     console.log(nombre+apellido+cedula+email);
//     $.ajax({
//         url: 'php/funciones/quitarPasajero.php',
//         type: 'POST',
//         dataType: 'html',
//         data: {Nombre: nombre,Apellido: apellido,Cedula:cedula,email:email,numeroDeRes:numeroDeReserva},
//     })
//         .done(function(respuesta){
//             $('#tablaPasajeros').html(respuesta);
//         })
// });
// $(document).on('click', '.abordarReserva', function(event) {
//     event.preventDefault();
//     $this=$(this);
//     numeroDeReserva=$('#numeroDeReserva').val();
//     $.ajax({
//         url: 'php/funciones/abordarReserva.php',
//         type: 'POST',
//         dataType: 'html',
//         data: {numeroDeRes:numeroDeReserva},
//     })
//         .done(function(respuesta){
//             $('.cancelarAbordarReserva').removeClass('active btn-success');
//             $this.addClass('active btn-success');
//             alert('Abordado');
//         })
// });
// $(document).on('click', '.cancelarAbordarReserva', function(event) {
//     event.preventDefault();
//     $this=$(this);
//     numeroDeReserva=$('#numeroDeReserva').val();
//     $.ajax({
//         url: 'php/funciones/abortarAbordajeDeReserva.php',
//         type: 'POST',
//         dataType: 'html',
//         data: {numeroDeRes:numeroDeReserva},
//     })
//         .done(function(respuesta){
//             $('.abordarReserva').removeClass('active btn-success');
//             $this.addClass('active btn-success');
//             alert('Abordaje Cancelado');
//         })
// });

// $(document).on('click', '.guardarCambiosEnReserva', function(event) {
//     event.preventDefault();
//     $.ajax({
//         url: 'php/funciones/modificarReserva.php',
//         type: 'POST',
//         dataType: 'text',
//         data: $('#formularioIndividual').serialize()
//     })
//         .done(function(respuesta){
//             // if(respuesta="Cambiada"){
//             alert(respuesta);
//             $('#myModal').modal('hide');
//             $( ".recargar" ).trigger( "click" );
//             // }
//             // else{
//             // alert("no hay puestos disponibles");
//             // }
//         })
// });
