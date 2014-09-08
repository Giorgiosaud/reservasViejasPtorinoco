// function actualizarOcupacion(valor) {
//   $("#ocupa2").val(valor);
// }
// function actualizarPrecios() {
//   if (fechayHoraExisten()) {
//     dia = new Date($("#fecha2").val());
//     hora = $("input[name='hora']:checked").val();
//     diadelasemana = dia.getDay();
//     $.ajax({url:"php/obtenerVariables.php", data:{"dia":diadelasemana}, beforeSend:function() {
//       $("#precioAdultos,#precio3raEdad,#precioninos").html("<img src='images/ajax-loader.gif' alt='loading'>");
//     }, success:function(b) {
//       if (hora == 1 || hora == 2) {
//         $("#precioAdultos").html(b.Adultos2H + " Bs.");
//         $("#precio3raEdad").html(b.Tercedad2H + " Bs.");
//         $("#precioninos").html(b.Ninos2H + " Bs.");
//       } else {
//         $("#precioAdultos").html(b.Adultos1H + " Bs.");
//         $("#precio3raEdad").html(b.Tercedad1H + " Bs.");
//         $("#precioninos").html(b.Ninos1H + " Bs.");
//       }
//     }, dataType:"json"});
//   }
// }
// function actualizarDatosCliente() {
//   $(document).ready(function() {
//     var VEJ = $("#rifInicio").val();
//     var numero = $("#cedula").val();
//     cedula = VEJ + "-" + numero;
//     validateCedula(document.formularioDeReserva.cedula);
//     jConfirm("esta seguro que su cedula es " + cedula, "Verifique Su Cedula", function(r) {
//       if (r == true) {
//         $.ajax({url:"php/getclientdata.php", data:{"cedula":cedula}, beforeSend:function() {
//           $("#Nombre").val("Buscando...");
//           $("#Nombre").attr("disabled", "disabled");
//           $("#Apellido").val("Buscando...");
//           $("#Apellido").attr("disabled", "disabled");
//           $("#email").val("Buscando...");
//           $("#email").attr("disabled", "disabled");
//           $("#telefono").val("Buscando...");
//           $("#telefono").attr("disabled", "disabled");
//         }, success:function(b) {
//           if (b.nombre == "no hay datos") {
//             jAlert("Porfavor Llene Sus Datos", "Pasajero Nuevo");
//             $("#Nombre").removeAttr("disabled", "disabled");
//             $("#Nombre").val("");
//             $("#Apellido").removeAttr("disabled", "disabled");
//             $("#Apellido").val("");
//             $("#email").removeAttr("disabled", "disabled");
//             $("#email").val("");
//             $("#telefono").removeAttr("disabled", "disabled");
//             $("#telefono").val("");
//             validateCedula(document.formularioDeReserva.cedula);
//             ValidateNombreyApellido(document.formularioDeReserva.Nombre);
//             ValidateNombreyApellido(document.formularioDeReserva.Apellido);
//             validateEmail(document.formularioDeReserva.email);
//             validateTelefono(document.formularioDeReserva.telefono);
//             $("#montoGc").val(0);
//             actualizarTotal();
//           } else {
//             jAlert("Hola nuevamente " + b.nombre, "Bienvenido Otravez Verifica Tus Datos ");
//             $("#Nombre").removeAttr("disabled", "disabled");
//             $("#Nombre").val(b.nombre);
//             $("#Apellido").removeAttr("disabled", "disabled");
//             $("#Apellido").val(b.apellido);
//             $("#email").removeAttr("disabled", "disabled");
//             $("#email").val(b.email);
//             $("#telefono").removeAttr("disabled", "disabled");
//             $("#telefono").val(b.telefono);
//             validateCedula(document.formularioDeReserva.cedula);
//             ValidateNombreyApellido(document.formularioDeReserva.Nombre);
//             ValidateNombreyApellido(document.formularioDeReserva.Apellido);
//             validateEmail(document.formularioDeReserva.email);
//             validateTelefono(document.formularioDeReserva.telefono);
//             console.log(b.saldoEnGiftcad);
//             if(b.saldoEnGiftcad==null){
//              $("#montoGc").val(0);
//              actualizarTotal();
//            }
//            else{
//             $("#montoGc").val(parseInt(b.saldoEnGiftcad) + parseInt($("#montoGc").val()));
//             actualizarTotal();
//           }
//         }
//       }, dataType:"json"});
// } else {
//   jAlert("Por favor Corrija su Cedula", "Cedula Errada");
//   $("#Nombre").val("");
//   $("#Apellido").val("");
//   $("#email").val("");
//   $("#telefono").val("");
// }
// });
// });
// }
// function seleccionarCatamaran(){
// 	$("#embarcacion1").button({disabled:false});
// 	$("#embarcacion2").button({disabled:true});
// 	$("#embarcacion2").removeAttr("checked");
	
// }
// function actualizarPuestosDisponibles() {
//   hora = $("input[name='hora']:checked").val();
//   embarcacion = $("input[name='embarcacionSeleccionada']:checked").val();
//   fecha = $("#fecha").val();
//   cedula = $("#rifInicio").val() + "-" + $("#cedula").val();
//   $('#hora2').val(hora);
//   if (fechayHoraExisten()) {
//     $.ajax({url:"php/getcupos.php", 
//            data:{
//             "hora":hora, 
//             "fecha":fecha, 
//             "cedula":cedula,
//             "embarcacion":embarcacion
//           },
//           beforeSend:function() {
//             $("#txtCount").html("<img src='images/ajax-loader.gif' alt='loading'>");
//           }, 
//           success:function(b) {
//             console.log(b);
//             $("#txtCount").html(b.respuesta);
//             $("#disponibles2").val(b.disponibilidad);
//             $("#hora").val(hora);
//             $("#tipoDeEmbarcacion2").val(embarcacion);
//             actualizarOcupacion(b.ocupado);
//             visibilidad8pas(0);
//             if (b.disponibilidad == 0) {
//               $("#pasajesadultos,#pasajes3eraEdad,#pasajesninos").val("0");
//               $("#pasajesadultos,#pasajes3eraEdad,#pasajesninos").attr("disabled", "disabled");
//               $("#embarcacion2").button({disabled:false});
//               $("#embarcacion2").button("refresh");
//               $("#embarcacion1").button({disabled:true});

//             } else {
//               $("#pasajesadultos,#pasajes3eraEdad,#pasajesninos").removeAttr("disabled", "disabled");
//               $("#pasajesadultos,#pasajes3eraEdad,#pasajesninos,#totalbs").val("0");
//               $("#PrecioTotal").html("0 Bs.");
//             }
//             actualizarPrecios();
//             actualizarTotal();
//           }, 
//           dataType:"json"});
// }
// }
// function actualizarTotal() {
//   if (fechayHoraExisten()) {
//     $("#pasajesadultos,#pasajes3eraEdad,#pasajesninos").removeAttr("disabled", "disabled");
//     PrecioAdultos = parseInt($("#precioAdultos").html()) == NaN ? 0 : parseInt($("#precioAdultos").html());
//     PrecioNinos = parseInt($("#precioninos").html()) == NaN ? 0 : parseInt($("#precioninos").html());
//     PrecioAdultoMay = parseInt($("#precio3raEdad").html()) == NaN ? 0 : parseInt($("#precio3raEdad").html());
//     numero_adultos = parseInt($("#pasajesadultos").val()) == NaN ? 0 : parseInt($("#pasajesadultos").val());
//     numero_adultos_3edad = parseInt($("#pasajes3eraEdad").val()) == NaN ? 0 : parseInt($("#pasajes3eraEdad").val());
//     panumero_ninos = parseInt($("#pasajesninos").val()) == NaN ? 0 : parseInt($("#pasajesninos").val());
//     montoGift = parseInt($("#montoGc").val()) == NaN ? 0 : parseInt($("#montoGc").val());
//     totalAPagar = PrecioAdultos * numero_adultos + PrecioAdultoMay * numero_adultos_3edad + PrecioNinos * panumero_ninos;
//     totalConDescuento = totalAPagar - montoGift;
//     $("#totalReserva").html(totalAPagar + " Bs.");
//     $("#totalReserva2").val(totalAPagar);
//     totalConDescuentoFinal = totalConDescuento;
//     if (totalConDescuento <= 0) {
//       totalConDescuentoFinal = 0;
//     }
//     $("#PrecioTotal").html(totalConDescuentoFinal + " Bs.");
//     $("#Giftcards").html($("#montoGc").val() + " Bs.");
//     $("#totalbs").val(totalConDescuentoFinal);
//     pasajes = panumero_ninos + numero_adultos + numero_adultos_3edad;
//     visibilidad8pas(pasajes);
//     maximospasajeros();
//   } else {
//     $("#pasajesadultos,#pasajes3eraEdad,#pasajesninos").attr("disabled", "disabled");
//     $("#pasajesadultos,#pasajes3eraEdad,#pasajesninos,#totalbs").val("0");
//     jAlert("Seleccione fecha y Hota", "Para continuar");
//     if ($("#fecha").val().length == 0) {
//       $("html, body").animate({scrollTop:$("#fecha2").offset().top}, 1E3);
//       $("#fecha2").focus();
//       return false;
//     } else {
//       if (horaseleccionada() == false) {
//         $("html, body").animate({scrollTop:$("#fecha2").offset()}, 1E3);
//         jAlert("Seleccione la Hora", "Error de Envio");
//         return false;
//       }
//     }
//   }
// }
// String.prototype.capitalize = function() {
//   return this.replace(/[\w\u00e1\u00c1\u00e9\u00c9\u00ed\u00cd\u00f3\u00d3\u00fa\u00da]+/g, function(a) {
//     return a.charAt(0).toUpperCase() + a.slice(1).toLowerCase();
//   });
// };
// function convertir(esto) {
//   esto.value = esto.value.capitalize();
//   ValidateNombreyApellido(esto);
// }

// $(document).ready(function(){
//   $(".ifancybox").fancybox({
//    'width' : '75%',
//    'height' : '75%',
//    'autoScale' : true,
//    'transitionIn' : 'elastic',
//    'transitionOut' : 'elastic',
//    'type' : 'iframe'
//  });
// });
// $(document).ready(function() {
//   $.get( "php/temporada.php" ,function(data){
//     $("#accordion").accordion({event:"click hoverintent", active:parseInt(data)});
//     });
//   $.get("php/fechasExcepcion.php", function(datos) {
//     valores = datos.dates;
//     diasDeSemana = datos.weekDays;
//     finalVar = [];
//     subFinalVar = [];
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
//   }, "json");
//   $("#formularioDeReserva").tooltip({track:true});
//   // $("#accordion").accordion({event:"click hoverintent", active:(window.temporadaBaja)});
//   $("#radio").buttonset();
//   $("#embarcacion").buttonset();
//   $("#embarcacion2").button({disabled:true});

//   $("#fecha2").datepicker({
//     inline:true, 
//     dateFormat:"DD, d MM, yy", 
//     minDate:new Date, 
//     altField:"#fecha", 
//     altFormat:"yy-mm-dd", 
//     beforeShowDay:function addDates(date) {
//       event.preventDefault();
//       var fechas = window.Valores;
//       var diasActivos = window.weekDays;
//       var diaDeSemana = date.getDay();
//       var Mes = date.getMonth();
//       var Dia = date.getDate();
//       var Ano = date.getFullYear();
//       for (i = 0;i < fechas.length;i++) {
//         fi = fechas[i][0];
//         if (Dia === fi.getDate() && (Mes === fi.getMonth() && Ano === fi.getFullYear())) {
//           return[fechas[i][1], fechas[i][2], fechas[i][3]];
//         }
//       }
//       switch(diaDeSemana) {
//         case 0:
//         if (diasActivos[0][1]) {
//           return[true];
//         } else {
//           return[diasActivos[0][1], diasActivos[0][2], diasActivos[0][3]];
//         }
//         break;
//         case 1:
//         if (diasActivos[1][1]) {
//           return[true];
//         } else {
//           return[diasActivos[1][1], diasActivos[1][2], diasActivos[1][3]];
//         }
//         break;
//         case 2:
//         if (diasActivos[2][1]) {
//           return[true];
//         } else {
//           return[diasActivos[2][1], diasActivos[2][2], diasActivos[2][3]];
//         }
//         break;
//         case 3:
//         if (diasActivos[3][1]) {
//           return[true];
//         } else {
//           return[diasActivos[3][1], diasActivos[3][2], diasActivos[3][3]];
//         }
//         break;
//         case 4:
//         if (diasActivos[4][1]) {
//           return[true];
//         } else {
//           return[diasActivos[4][1], diasActivos[4][2], diasActivos[4][3]];
//         }
//         break;
//         case 5:
//         if (diasActivos[5][1]) {
//           return[true];
//         } else {
//           return[diasActivos[5][1], diasActivos[5][2], diasActivos[5][3]];
//         }
//         break;
//         case 6:
//         if (diasActivos[6][1]) {
//           return[true];
//         } else {
//           return[diasActivos[6][1], diasActivos[6][2], diasActivos[6][3]];
//         }
//         break;
//         default:
//         return[true];
//         break;
//       }
//     }});
// });
// function maximospasajeros() {
//   numero_adultos = parseInt($("#pasajesadultos").val()) == NaN ? 0 : parseInt($("#pasajesadultos").val());
//   numero_adultos_3edad = parseInt($("#pasajes3eraEdad").val()) == NaN ? 0 : parseInt($("#pasajes3eraEdad").val());
//   panumero_ninos = parseInt($("#pasajesninos").val()) == NaN ? 0 : parseInt($("#pasajesninos").val());
//   cuposDisponibles = parseInt($("#disponibles2").val()) == NaN ? 0 : parseInt($("#disponibles2").val());
//   maximovalor = cuposDisponibles - numero_adultos - numero_adultos_3edad - panumero_ninos;
//   maximoAdultos = maximovalor + numero_adultos;
//   maximoninos = maximovalor + panumero_ninos;
//   max3era = numero_adultos_3edad + maximovalor;
//   $("#pasajesadultos").prop("max", maximoAdultos);
//   $("#pasajes3eraEdad").prop("max", max3era);
//   total_adultos = numero_adultos + numero_adultos_3edad;
//   if (total_adultos != 0) {
//     $("#pasajesninos").prop("max", maximoninos);
//   } else {
//     $("#pasajesninos").prop("max", maximoninos);
//     $("#pasajesninos").val(0);
//   }
// }
// function fechayHoraExisten() {
//   if ($("#fecha2").val() == "" || $("input[name='hora']:checked").val() == null) {
//     return false;
//   } else {
//     visibilidad8pas(0);
//     return true;
//   }
// }
// function horaseleccionada() {
//   if ($("input[name='hora']:checked").val() == null) {
//     return false;
//   } else {
//     return $("input[name='hora']:checked").val();
//   }
// }

// function validateVacio(inputField) {
//   if (inputField.value.length == 0) {
//     return true;
//   }
//   return false;
// }
// function validarExpresionRegular(expresion, inputstr) {
//   if (expresion.test(inputstr)) {
//     return true;
//   } else {
//     return false;
//   }
// }
// function validateCedula(cedula) {
//   if (validateVacio(cedula)) {
//     $(cedula).parent().parent().removeClass("has-success has-error").addClass("has-warning");
//     $(cedula).prop("title", "Introduzca su Cedula o Rif");
//     $(cedula).focus();
//     return false;
//   } else {
//     if (validarExpresionRegular(/^\d{7,10}$/, cedula.value) || validarExpresionRegular(/^\d{8}-\d{1}$/, cedula.value)) {
//       $(cedula).parent().parent().removeClass("has-warning has-error").addClass("has-success");
//       $(cedula).prop("title", "Cedula o Rif Validada(o)");
//       return true;
//     } else {
//       $(cedula).parent().parent().removeClass("has-success has-warning").addClass("has-error");
//       $(cedula).prop("title", "Verifique su Cedula o Rif");
//       $(cedula).focus();
//     }
//   }
// }
// function ValidateNombreyApellido(campo) {
//   validateCedula(document.formularioDeReserva.cedula);
//   if (validateVacio(campo)) {
//     $(campo).parent().parent().removeClass("has-success has-error").addClass("has-error");
//     $(campo).prop("title", "Introduzca su " + $(campo).attr("name"));
//     $(campo).focus();
//   } else {
//     $(campo).parent().parent().removeClass("has-warning has-error").addClass("has-success");
//     $(campo).prop("title", "");
//     $(campo).prop("title", $(campo).attr("name") + " Validado");
//   }
// }
// function validateEmail(email) {
//   validateCedula(document.formularioDeReserva.cedula);
//   if (validateVacio(email)) {
//     $(email).parent().parent().removeClass("has-success has-error").addClass("has-error");
//     $(email).prop("title", "Introduzca su email");
//     $(email).focus();
//   } else {
//     if (validarExpresionRegular(/^[\w\.-_\+]+@[\w-]+(\.\w{2,4})+$/, email.value)) {
//       $(email).parent().parent().removeClass("has-warning has-error").addClass("has-success");
//       $(email).prop("title", "Email Validado");
//     } else {
//       $(email).parent().parent().removeClass("has-success has-warning").addClass("has-error");
//       $(email).prop("title", "Verifique su Email");
//       $(email).focus();
//     }
//   }
// }
// function validateTelefono(telefono) {
//   validateCedula(document.formularioDeReserva.cedula);
//   if (validateVacio(telefono)) {
//     $(telefono).parent().parent().removeClass("has-success has-warning").addClass("has-error");
//     $(telefono).prop("title", "Introduzca su Telefono (Solo Numeros ej: 02869233147)");
//     $(telefono).focus();
//   } else {
//     if (validarExpresionRegular(/^\d{10,11}$/, parseInt(telefono.value))) {
//       $(telefono).parent().parent().removeClass("has-warning has-error").addClass("has-success");
//       $(telefono).prop("title", "Telefono Validado");
//       inicio = String(parseInt(telefono.value)).slice(0, 3);
//       medio = String(parseInt(telefono.value)).slice(3, 6);
//       fin = String(parseInt(telefono.value)).slice(6);
//       telefono.value = "0" + inicio + "-" + medio + "-" + fin;
//     } else {
//       if (validarExpresionRegular(/^\d{4}-\d{3}-\d{4}$/, telefono.value)) {
//         $(telefono).parent().parent().removeClass("has-warning has-error").addClass("has-success");
//         $(telefono).prop("title", "Telefono Validado");
//       } else {
//         $(telefono).parent().parent().removeClass("has-success has-warning").addClass("has-error");
//         $(telefono).prop("title", "Verifique su Telefono (Solo Numeros ej: 02869233147)");
//         $(telefono).focus();
//       }
//     }
//   }
// }
// function isValidForm() {
//   cantidadDePasajes = $("#pasajesadultos").val() + $("#pasajes3eraEdad").val() + $("#pasajesninos").val();
//   if (horaseleccionada() == false) {
//     $("html, body").animate({scrollTop:$("#cedula").offset()}, 1E3);
//     jAlert("Se Olvido Seleccionar la Hora", "Error de Envio");
//     return false;
//   } else {
//     if ($("#fecha").val().length == 0) {
//       $("html, body").animate({scrollTop:$("#fecha2").offset().top}, 1E3);
//       $("#fecha2").focus();
//       return false;
//     } else {
//       if ($("#cedula").val().length == 0) {
//         $("html, body").animate({scrollTop:$("#cedula").offset().top}, 1E3);
//         $("#cedula").focus();
//         return false;
//       } else {
//         if ($("#Nombre").val().length == 0) {
//           $("html, body").animate({scrollTop:$("#Nombre").offset().top}, 1E3);
//           $("#Nombre").focus();
//           return false;
//         } else {
//           if ($("#Apellido").val().length == 0) {
//             $("html, body").animate({scrollTop:$("#Apellido").offset().top}, 1E3);
//             $("#Apellido").focus();
//             return false;
//           } else {
//             if ($("#email").val().length == 0) {
//               $("html, body").animate({scrollTop:$("#email").offset().top}, 1E3);
//               $("#email").focus();
//               return false;
//             } else {
//               if ($("#telefono").val().length == 0) {
//                 $("html, body").animate({scrollTop:$("#telefono").offset().top}, 1E3);
//                 $("#telefono").focus();
//                 return false;
//               } else {
//                 if (cantidadDePasajes == 0) {
//                   $("html, body").animate({scrollTop:$("#pasajesadultos").offset().top}, 1E3);
//                   $("#pasajesadultos").focus();
//                   return false;
//                 } else {
//                   $("#formularioDeReserva").submit();
//                 }
//               }
//             }
//           }
//         }
//       }
//     }
//   }
// }
// function visibilidad8pas(ademas) {
//   ademas = $("#ocupa2").val() + ademas;
//   if (ademas >= 8) {
//     $("#minimo").alert("close");
//   } else {
//     $("#menosDe81").html("<div class='alert alert-warning alert-dismissable'><button type='button' class='close' data-dismiss='alert' id='minimo' aria-hidden='true'>&times;</button><span class='glyphicon glyphicon-bullhorn'></span>Para zarpar se requiere un <strong> m\u00ednimo de ocho (8) pasajeros.</strong></div>");
//   }
// }
// function verificarFormulario() {
//   cantidadDePasajes = $("#pasajesadultos").val() + $("#pasajes3eraEdad").val() + $("#pasajesninos").val();
//   if (horaseleccionada() == false) {
//     $("html, body").animate({scrollTop:$("#fecha2").offset()}, 1E3);
//     jAlert("Seleccione la Hora", "Error de Envio");
//     return false;
//   } else {
//     if ($("#fecha").val().length == 0) {
//       $("html, body").animate({scrollTop:$("#fecha2").offset().top}, 1E3);
//       $("#fecha2").focus();
//       return false;
//     } else {
//       if ($("#cedula").val().length == 0) {
//         $("html, body").animate({scrollTop:$("#cedula").offset().top}, 1E3);
//         $("#cedula").focus();
//         return false;
//       } else {
//         if ($("#Nombre").val().length == 0) {
//           $("html, body").animate({scrollTop:$("#Nombre").offset().top}, 1E3);
//           $("#Nombre").focus();
//           return false;
//         } else {
//           if ($("#Apellido").val().length == 0) {
//             $("html, body").animate({scrollTop:$("#Apellido").offset().top}, 1E3);
//             $("#Apellido").focus();
//             return false;
//           } else {
//             if ($("#email").val().length == 0) {
//               $("html, body").animate({scrollTop:$("#email").offset().top}, 1E3);
//               $("#email").focus();
//               return false;
//             } else {
//               if ($("#telefono").val().length == 0) {
//                 $("html, body").animate({scrollTop:$("#telefono").offset().top}, 1E3);
//                 $("#telefono").focus();
//                 return false;
//               } else {
//                 if (cantidadDePasajes == 0) {
//                   $("html, body").animate({scrollTop:$("#pasajesadultos").offset().top}, 1E3);
//                   $("#pasajesadultos").focus();
//                   return false;
//                 } else {
//                   if (!$("#condiciones").is(":checked")) {
//                     $("#botonReservar").prop("title", "Debe Aceptar Los Terminos y Condiciones Para Reservar");
//                     $("#condiciones").focus();
//                     return false;
//                   } else {
//                     return true;
//                   }
//                 }
//               }
//             }
//           }
//         }
//       }
//     }
//   }
// }
// function verificarGiftcard() {
//   if (verificarFormulario()) {
//     $(document).ready(function() {
//       Giftcard = $("#giftCard").val();
//       cedula = $("#rifInicio").val() + "-" + $("#cedula").val();
//       if ($("#giftCard").val() == "") {
//         return false;
//       } else {
//         $.ajax({url:"php/getgiftcarDataRegistro.php", data:{"Giftcard":Giftcard, "cedula":cedula}, beforeSend:function() {
//           $("#giftCard").val("Verificando...");
//           $("#giftCard").attr("disabled", "disabled");
//           $("#ayudaGC").html("<img src='images/ajax-loader.gif' alt='loading'>").slideDown(500);
//         }, success:function(b) {
//           if (b.bolivares == "no existe") {
//             $("#giftCard").removeAttr("disabled", "disabled");
//             $("#giftCard").val("");
//             $("#giftCard").attr("placeholder", "El Codigo de Regalo Ingresado No Existe Verifique Su Numero");
//             return true;
//           } else {
//             if (b.bolivares == "usada") {
//               $("#giftCard").removeAttr("disabled", "disabled");
//               $("#giftCard").val("");
//               $("#giftCard").attr("placeholder", "La Giftcard Ya fue Utilizada Verifique su numero");
//               return true;
//             } 
//             else {
//               $("#giftCard").removeAttr("disabled", "disabled");
//               $("#giftCard").val("");
//               $("#ayudaGC").html("Su Giftcard numero " + Giftcard + " Equivale a " + b.bolivares + " Gracias por Ingresarla Disfrute de Su Paseo").delay(3E3).slideUp(500);
//               $("#ayudaGC").html("").delay(4E3).slideDown(500);
//               $("#giftCard").attr("placeholder", "Si necesita Puede Agregar Otra");
//               $("#montoGc").val(parseInt(b.bolivares) + parseInt($("#montoGc").val()));
//               actualizarTotal();
//               return true;
//             }
//           }
//         }, dataType:"json"});
// }
// });
// }
// }
// $(document).ready(function() {
	
	
//   $("#botonReservar").click(function() {
//     if (verificarFormulario()) {
//       numero_adultos = parseInt($("#pasajesadultos").val()) == NaN ? 0 : parseInt($("#pasajesadultos").val());
//       numero_adultos_3edad = parseInt($("#pasajes3eraEdad").val()) == NaN ? 0 : parseInt($("#pasajes3eraEdad").val());
//       panumero_ninos = parseInt($("#pasajesninos").val()) == NaN ? 0 : parseInt($("#pasajesninos").val());
//       cuposOcupados = parseInt($("#ocupa2").val()) == NaN ? 0 : parseInt($("#ocupa2").val());
//       Ocupados = cuposOcupados + numero_adultos + numero_adultos_3edad + panumero_ninos;
//       totalAPagar = parseInt($("#totalbs").val()) == NaN ? 0 : parseInt($("#totalbs").val());
//       if (Ocupados <= 8) {
//         phpgoto = "reservaSinZarpe.php";
//       }
//       $.ajax({
//         type:"POST", 
//         url:"Reserva.php", 
//         data:$("#formularioDeReserva").serialize(), 
//         beforeSend:function() {
//           $("#contenedor").fadeOut("slow");
//           $("#contenedor").html("<div class='col-xs-12 text-center'><img src='images/ajax-loader.gif' alt='loading'></class>");
//           $("#contenedor").fadeIn("slow");
//           $("html, body").animate({scrollTop:$("#contenedor").offset().top}, 1E3);
//         }, 
//         success:function(res) {
//           $("#contenedor").fadeOut("fast");
//           eval($("#contenedor").html(res.valorhtml));
//           $("#contenedor").fadeIn("slow");
//           var archivo = document.createElement("script");
//           archivo.setAttribute("type", "text/javascript");
//           archivo.setAttribute("src", "https://www.mercadopago.com/org-img/jsapi/mptools/buttons/render.js");
//           eval(archivo);
//         }, 
//         dataType:"json"});
//     }
//   });
// $("#volverAtras").click(function() {
//  location.reload();
// });
// });