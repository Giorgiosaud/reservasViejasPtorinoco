// Poner datepicker español
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
// function obtenerVariables(){
//   $.get("php/fechasExcepcion.php", function(datos) {
//     valores = datos.dates;
//     diasDeSemana = datos.weekDays;
//     minimoDiasAReservar = datos.minReservar;
//     $('#fecha2').datepicker({
//       dateFormat:"DD, d 'de' MM 'de', yy",
//       beforeShowDay: fechasExcepcion,
//       minDate: minimoDiasAReservar,
//       altField:"#fecha", 
//       altFormat:"yy-mm-dd", 
//     });
//     temporadaBaja = datos.temporadaBaja;
//     finalVar = [];
//     fecha = new Date;
//     for (i = 0;i < valores.length;i++) {
//       for (j = 0;j < valores[i].length;j++) {
//         switch(j) {
//           case 0:
//           fecha = new Date(valores[i][j]);
//           finalVar[i] = [];
//           finalVar[i][j] = new Date(fecha.setDate(fecha.getDate() + 1));
//           break;
//           default:
//           finalVar[i][j] = valores[i][j];
//           break;
//         }
//       }
//     }
//     window.Valores = finalVar;
//     window.weekDays = diasDeSemana;
//     window.temporadaBaja = parseInt(temporadaBaja);
//     // alert(datos);
//   }, "json");
// }
// function fechasExcepcion(date) {
//   var fechas = window.Valores;
//   var diasActivos = window.weekDays;
//   var diaDeSemana = date.getDay();
//   var Mes = date.getMonth();
//   var Dia = date.getDate();
//   var Ano = date.getFullYear();
//   for (i = 0;i < fechas.length;i++) {
//     fi = fechas[i][0];
//     if (Dia === fi.getDate() && (Mes === fi.getMonth() && Ano === fi.getFullYear())) {
//       return[fechas[i][1], fechas[i][2], fechas[i][3]];
//     }
//   }
//   switch(diaDeSemana) {
//     case 0:
//     if (diasActivos[0][1]) {
//       return[true];
//     } else {
//       return[diasActivos[0][1], diasActivos[0][2], diasActivos[0][3]];
//     }
//     break;
//     case 1:
//     if (diasActivos[1][1]) {
//       return[true];
//     } else {
//       return[diasActivos[1][1], diasActivos[1][2], diasActivos[1][3]];
//     }
//     break;
//     case 2:
//     if (diasActivos[2][1]) {
//       return[true];
//     } else {
//       return[diasActivos[2][1], diasActivos[2][2], diasActivos[2][3]];
//     }
//     break;
//     case 3:
//     if (diasActivos[3][1]) {
//       return[true];
//     } else {
//       return[diasActivos[3][1], diasActivos[3][2], diasActivos[3][3]];
//     }
//     break;
//     case 4:
//     if (diasActivos[4][1]) {
//       return[true];
//     } else {
//       return[diasActivos[4][1], diasActivos[4][2], diasActivos[4][3]];
//     }
//     break;
//     case 5:
//     if (diasActivos[5][1]) {
//       return[true];
//     } else {
//       return[diasActivos[5][1], diasActivos[5][2], diasActivos[5][3]];
//     }
//     break;
//     case 6:
//     if (diasActivos[6][1]) {
//       return[true];
//     } else {
//       return[diasActivos[6][1], diasActivos[6][2], diasActivos[6][3]];
//     }
//     break;
//     default:
//     return[true];
//     break;
//   }
// }
function actualizarPuestosDisponibles(){
  embarcacion = $("input[name='embarcacionSeleccionada']:checked").val();
  fecha = $("#fecha").val();
  cedula = $("#rifInicio").val() + "-" + $("#cedula").val();
  ejecutarActualizaciondePuestosDisponibles(fecha,cedula,embarcacion);
  $("#fecha2").popover('hide');
}
function ejecutarActualizaciondePuestosDisponibles(fecha,cedula,embarcacion){
  $.ajax({
    url:"php/getTodosLosCupos.php",
    data:{
      "fecha":fecha,
      "cedula":cedula,
      "embarcacion":embarcacion
    },
    beforeSend:function(){
      $('input:radio[name="hora"]').parent().removeClass('disabled btn-primary btn-danger btn-warning');
      $('input:radio[name="hora"]').siblings().filter(':odd').text('cargando...');
    },
    success:function(respuesta){
      horas=$('input:radio[name="hora"]');
      console.log(respuesta);
      console.log(respuesta.disponibles.length);
      disponibilidad=[];
      for(var i=0;i<respuesta.disponibles.length;i++){
        disponibilidad[i]=(respuesta.disponibles[i]['disponibles']);
        $($('input:radio[name="hora"]').siblings().filter(':odd')[i]).text('cupos: '+disponibilidad[i]);
        if (disponibilidad[i]>6){
          $($('input:radio[name="hora"]').parent()[i]).addClass('btn-default');
        }
        else if (disponibilidad[i]<=6 && disponibilidad[i]!=0){
          $($('input:radio[name="hora"]').parent()[i]).addClass('btn-warning', 3000, "easeInOutSine" );
        }
        else if (disponibilidad[i]==0){
          $($('input:radio[name="hora"]').parent()[i]).addClass('disabled btn-danger');
        }

      }
    },
    dataType:"json"
  })
}
function getPrecios(){
  var fecha=$("#fecha").val(),
  hora=$('input:radio[name="hora"]:checked').val();
  disponibilidad=parseInt(($('input:radio[name="hora"]:checked').parent().text().replace(/\s/g,'')).slice(-2).replace( /^\D+/g, ''));
  $('#datoDisponibilidad').val(disponibilidad);
  ejecutarGetPrecios(fecha,hora);
  $(':input[type="number"]').attr({"max" : disponibilidad});
}
function ejecutarGetPrecios(fecha,hora){
  $.ajax({
    url:"php/getPrecios.php",
    data:{
      "fecha":fecha,
      "hora":hora,
    },
    beforeSend:function(){
      $('.precios').text('cargando...');
    },
    success:function(respuesta){
      console.log(respuesta);
      $('#datoPrecioAdulto').val(respuesta.precioAdultos);
      $('#datoPrecioAdultoMayor').val(respuesta.precioAdultosMayores);
      $('#datoPrecioNino').val(respuesta.precioNinos);

      $('#precioAdultos').text(respuesta.precioAdultos+' Bs.');
      $('#precioMayores').text(respuesta.precioAdultosMayores+' Bs.');
      $('#precioNinos').text(respuesta.precioNinos+' Bs.');
    },
    dataType:"json"
  })

}
function validateVacio(inputField) {
  if (inputField.val()=="") {
    return true;
  }
  return false;
}
function validarExpresionRegular(expresion, inputstr) {
  if (expresion.test(inputstr)) {
    return true;
  } else {
    return false;
  }
}
function definirYMostrarError(titulo, mensaje, modo,objeto){
  mensajeError=$('#mensajeError');
  TituloError=$('#tituloMensajeError');
  error=$('#error');
  TituloError.text(titulo).parent().removeClass('btn-success btn-primary btn-warning btn-info btn-danger').addClass('btn-'+modo);
  mensajeError.text(mensaje);
  error.modal('show');
  error.on('hidden.bs.modal', function (e) {
    $(objeto).focus();
  })
}
function validateCedula(cedula) {
  if (validarExpresionRegular(/^\d{7,10}$/, $(cedula).val()) || validarExpresionRegular(/^\d{8}-\d{1}$/, $(cedula).val())) {
    $(cedula).parent().parent().removeClass("has-warning has-error").addClass("has-success");
    actualizarDatosCliente();
    $(cedula).popover('hide');
    console.log("paso");
    return true;
  } else {
    $(cedula).parent().parent().removeClass("has-success has-warning").addClass("has-warning");
    $(cedula).focus();
    console.log("error");
    $(cedula).popover('show');
    return false;
  }
  // }
}
String.prototype.capitalize = function() {
  return this.replace(/[\w\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da]+/g, function(a) {
    return a.charAt(0).toUpperCase() + a.slice(1).toLowerCase();
  });
};
function convertir(esto) {
  esto.val($(esto).val().capitalize());
  ValidateNombreyApellido(esto);
}
function ValidateNombreyApellido(campo) {
  if (validateVacio(campo)) {
    $(campo).parent().parent().removeClass("has-success has-error").addClass("has-error");
    // definirYMostrarError('Error en el '+$(campo).attr("name"), 'Verifique su '+$(campo).attr("name"), 'danger');
    $(campo).popover('show');
    $(campo).focus();
  }
  else {
    $(campo).parent().parent().removeClass("has-warning has-error").addClass("has-success");
    $(campo).popover('hide');
    $(campo).prop("title", "");
    $(campo).prop("title", $(campo).attr("name") + " Validado");
  }
}
function validateEmail(email) {
  if (validateVacio(email)) {
    $(email).parent().parent().removeClass("has-success has-error").addClass("has-error");
    $(email).popover('show');
    // definirYMostrarError('Error en el Correo Electronico', 'Ingrese su email ', 'danger');
    $(email).focus();
  } else {
    if (validarExpresionRegular(/^[\w\.-_\+]+@[\w-]+(\.\w{2,4})+$/, $(email).val())) {
      $(email).parent().parent().removeClass("has-warning has-error").addClass("has-success");
      $(email).popover('hide');
      $(email).prop("title", "Email Validado");
    } else {
      $(email).parent().parent().removeClass("has-success has-warning").addClass("has-error");
      // definirYMostrarError('Error en el Correo Electronico', 'Verifique su Email', 'warning');
      $(email).popover('show');
      $(email).focus();
    }
  }
}
function validateTelefono(telefono) {
  if (validateVacio(telefono)) {
    $(telefono).parent().parent().removeClass("has-success has-warning").addClass("has-error");
    $(telefono).popover('show');
    // definirYMostrarError('Error en el Telefono', 'Introduzca su Telefono (Solo Numeros ej: 02869233147)', 'danger');
    $(telefono).focus();
  } else {
    if (validarExpresionRegular(/^\d{10,11}$/, parseInt(telefono.val()))) {
      $(telefono).parent().parent().removeClass("has-warning has-error").addClass("has-success");
      $(telefono).prop("title", "Telefono Validado");
      inicio = String(parseInt(telefono.val())).slice(0, 3);
      medio = String(parseInt(telefono.val())).slice(3, 6);
      fin = String(parseInt(telefono.val())).slice(6);
      telefono.val( "0" + inicio + medio + fin);
      $(telefono).popover('hide');
    } else {
      if (validarExpresionRegular(/^\d{4}-\d{3}-\d{4}$/, telefono.val())) {
        $(telefono).parent().parent().removeClass("has-warning has-error").addClass("has-success");
        $(telefono).prop("title", "Telefono Validado");
        $(telefono).popover('hide');
      } else {
        $(telefono).parent().parent().removeClass("has-success has-warning").addClass("has-error");
        // definirYMostrarError('Error en el Telefono', 'Verifique su Telefono (Solo Numeros ej: 02869233147)', 'warning');
        $(telefono).popover('show');
        $(telefono).focus();
      }
    }
  }
}
function actualizarDatosCliente(){
  var VEJ = $("#rifInicio").val(),
  numero = $("#cedula").val(),
  cedula = VEJ + "-" + numero,
  inputsUsuario=$("#Nombre, #Apellido, #email, #telefono");
  jConfirm("esta seguro que su cedula es " + cedula, "Verifique Su Cedula", function(r) {
    if (r == true) {
      $.ajax({url:"php/getclientdata.php", data:{"cedula":cedula}, beforeSend:function() {
        inputsUsuario.val("Buscando...");
        inputsUsuario.attr("disabled", "disabled");
      },
      success:function(b) {
        if (b.nombre == "no hay datos") {
         jAlert("Porfavor Llene Sus Datos", "Pasajero Nuevo");
         inputsUsuario.removeAttr("disabled", "disabled");
         inputsUsuario.val("");
         $("#montoGc").val(0);
         actualizarTotal();
       } else {
         jAlert("Hola nuevamente " + b.nombre, "Bienvenido Otravez Verifica Tus Datos ");
         inputsUsuario.removeAttr("disabled", "disabled");
         $("#Nombre").val(b.nombre);
         $("#Apellido").val(b.apellido);
         $("#email").val(b.email);
         $("#telefono").val(b.telefono);
         ValidateNombreyApellido($('#Nombre'));
         ValidateNombreyApellido($('#Apellido'));
         validateEmail($('#email'));
         validateTelefono($('#telefono'));
         console.log(b.saldoEnGiftcad);
         if(b.saldoEnGiftcad==null){
           $("#Giftcards2").val(0);
           $("#Giftcards").html($("#Giftcards2").val()+" Bs.");
          // $("#Giftcards2").val(0);
          // $("#Giftcards").html("0 Bs.");
          actualizarTotal();
        }
        else{
          $("#Giftcards2").val(parseInt(b.saldoEnGiftcad));
          $("#Giftcards").html($("#Giftcards2").val()+" Bs.");
          actualizarTotal();
        }
      }
    }, dataType:"json"});
} 
});
}
function fechaHorayEmbarcacionExisten(){
  hora = $("input[name='hora']:checked").val();
  embarcacion = $("input[name='embarcacionSeleccionada']:checked").val();
  fecha = $("#fecha").val();
  if( hora && fecha!="" && embarcacion ){
    return true;
  }
  else{
    return false;
  }
}


function ejecutarActualizaciondePuestosDisponibles2(hora,fecha,cedula,embarcacion){
  $.ajax({url:"php/getcupos.php", 
         data:{
          "hora":hora, 
          "fecha":fecha, 
          "cedula":cedula,
          "embarcacion":embarcacion
        },
        beforeSend:function() {
          $("#txtCount").html("<img src='images/ajax-loader.gif' alt='loading'>");
        },
        success:function(b) {
          console.log(b);
          $("#txtCount").html(b.respuesta);
          $("#disponibles2").val(b.disponibilidad);
          $("#hora").val(hora);
          $("#tipoDeEmbarcacion2").val(embarcacion);
          actualizarOcupacion(b.ocupado);
          visibilidad8pas(0);
          if (b.disponibilidad == 0) {
            $("#pasajesadultos,#pasajes3eraEdad,#pasajesninos").val("0");
            $("#pasajesadultos,#pasajes3eraEdad,#pasajesninos").attr("disabled", "disabled");
            $("#embarcacion2").button({disabled:false});
            $("#embarcacion2").button("refresh");
            $("#embarcacion1").button({disabled:true});

          } else {
            $("#pasajesadultos,#pasajes3eraEdad,#pasajesninos").removeAttr("disabled", "disabled");
            $("#pasajesadultos,#pasajes3eraEdad,#pasajesninos,#totalbs").val("0");
            $("#PrecioTotal").html("0 Bs.");
          }
          actualizarTotal();
        }, 
        dataType:"json"});
}
function actualizarTotal() {
  cambiarMaximos();
  actualizarPrecios();
  if ($('#datoCuposEnReserva').val()>=8) {$('#minimoPasajerosZarpe').fadeOut('slow');} else{$('#minimoPasajerosZarpe').fadeIn('slow');};
  // console.log('actualizarTotal'); 
}
function cambiarMaximos(){
  suma=0;
  $(':input[type="number"]').each(function(){
    suma += parseInt($(this).val());
    $('#datoCuposEnReserva').val(suma);
  });
  maximoEnPaseo=parseInt($('#datoDisponibilidad').val())-parseInt(suma);
  maximoAdultos=parseInt($('#pasajesadultos').val())+parseInt(maximoEnPaseo);
  maximoAdultosMayores=parseInt($('#pasajes3eraEdad').val())+parseInt(maximoEnPaseo);
  maximoNinos=parseInt($('#pasajesninos').val())+parseInt(maximoEnPaseo);
  $('#pasajesadultos').attr({"max" : maximoAdultos});
  $('#pasajes3eraEdad').attr({"max" : maximoAdultosMayores});
  numeroDeAdultos=parseInt($('#pasajes3eraEdad').val())+parseInt($('#pasajesadultos').val());
  if(numeroDeAdultos<=0){
    $('#pasajesninos').attr({"max" : 0});
    $('#pasajesninos').val(0);
  }
  else{
    $('#pasajesninos').attr({"max" : maximoNinos});
  }
}
function actualizarPrecios(){
  precioAdultos=parseInt($('#precioAdultos').text());
  precioAdultosMayores=parseInt($('#precioMayores').text());
  precioNinos=parseInt($('#precioNinos').text());
  pasajesAdultos=parseInt($('#pasajesadultos').val());
  pasajesAdultosMayores=parseInt($('#pasajes3eraEdad').val());
  pasajesNinos=parseInt($('#pasajesninos').val());
  montoTotal=(precioAdultos*pasajesAdultos)+(precioAdultosMayores*pasajesAdultosMayores)+(precioNinos*pasajesNinos);
  $('#totalReserva').text(montoTotal+' Bs.');
  $('#totalReserva2').val(montoTotal);
  giftcardval=$("#Giftcards2").val();
  montoaPagar=((montoTotal-giftcardval)>=0?(montoTotal-giftcardval):0);
  $('#totalbs').val(montoaPagar);
  $('#PrecioTotal').text(montoaPagar+' Bs.');
}
function verificaryEnviar(){
  if ($("#fecha").val().length == 0) {
    $(window).scrollTop($('#fecha2').offset().top);
    $("#fecha2").focus();
    $("#fecha2").popover('show');
    return false;
  }else{
    if(embarcacionSeleccionada()==false){
      $(window).scrollTop($('#tipoEmbarcacion').offset().top);
      $('#tipoEmbarcacion').popover('show');
      return false;
    }else{
      if(horaseleccionada()==false){
        $(window).scrollTop($('#opcionesHora').offset().top);
        $('#opcionesHora').popover('show');
        return false;
      }else{
        if($('#cedula').val().length==0){
          $(window).scrollTop($('#cedula').offset().top);
          $('#cedula').popover('show');
          return false;
        }else{
          if($('#Nombre').val().length==0){
            $(window).scrollTop($('#Nombre').offset().top);
            $('#Nombre').popover('show');
            return false;
          }else{
            if($('#Apellido').val().length==0){
              $(window).scrollTop($('#Apellido').offset().top);
              $('#Apellido').popover('show');
              return false;
            }else{
              if($('#email').val().length==0){
                $(window).scrollTop($('#email').offset().top);
                $('#email').popover('show');
                return false;
              }else{
                if($('#telefono').val().length==0){
                  $(window).scrollTop($('#telefono').offset().top);
                  $('#telefono').popover('show');
                // jAlert("Por Favor Ingrese Telefono", "Ingrese Telefono");
                return false;
              }else{
                if($('#datoCuposEnReserva').val()<=0){
                  $(window).scrollTop($('#pasajesadultos').offset().top);
                  $('#pasajesadultos').popover('show');
                  // jAlert("Por Favor Ingrese las Cantidades de Pasajeros", "Ingrese las Cantidades de Pasajeros");
                  return false;
                }else{
                  if(($('#pasajesadultos').val()+$('#pasajes3eraEdad').val())<=0){
                    $(window).scrollTop($('#pasajesadultos').offset().top);
                    $('#pasajesadultos').popover('show');
                    // jAlert("Por Favor Ingrese Almenos un Adulto", "Ingrese Almenos un Adulto");
                    return false;
                  }else{
                    if(!$("#condiciones").is(":checked")){
                      $(window).scrollTop($('#condiciones').offset().top);
                      $('#condiciones').popover('show');
                      // jAlert("Por Favor Acepte Las Condiciones", "Acepte Las Condiciones");
                      return false;
                    }else{
                      procesarReserva();
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}
}
function procesarReserva(){
  $('#contenedor').slideUp('slow');
  $.post( "Reserva.php", $( "#formularioDeReserva" ).serialize() ,function(reserva){
    console.log(reserva);
    $('#contenedor').html(reserva);
    $('#contenedor').slideDown('slow');

  },"html" );
  return true;
}
function embarcacionSeleccionada(){
  if ($("input[name='embarcacionSeleccionada']:checked").val() == null) {
    return false;
  } else {
    return $("input[name='embarcacionSeleccionada']:checked").val();
  }
}
function horaseleccionada() {
  if ($("input[name='hora']:checked").val() == null) {
    return false;
  } else {
    return $("input[name='hora']:checked").val();
  }
}