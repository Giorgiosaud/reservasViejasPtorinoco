
$( document ).ajaxComplete(function() {
    $('#fecha2').datepicker({
      dateFormat:"DD, d 'de' MM 'de', yy",
      altField:"#fecha", 
      altFormat:"yy-mm-dd",
    });
    if($('#fecha').val()!=""){
      // date= new Date($('#fecha').val());
      // date.setHours(0,0,0,0);
      // date.setUTCDate(15);
      // console.log(date+date.getTimezoneOffset());
      // date.setDate(date.getDate());
      // $("#fecha2").datepicker('setDate', date);

      var queryDate = $('#fecha').val(),
          dateParts = queryDate.match(/(\d+)/g),
          realDate = new Date(dateParts[0], dateParts[1] - 1, dateParts[2]);  
                                    

      // $('#fecha2').datepicker({ dateFormat: 'yy-mm-dd' }); // format to show
      $('#fecha2').datepicker('setDate', realDate);


    }
    $('#fechaPago2').datepicker({
      dateFormat:"DD, d 'de' MM 'de', yy",
      altField:"#fechaPago", 
      altFormat:"yy-mm-dd",
    });
  });
  $(document).ready(function() {
    $('body').on('mouseover', '#fecha2', function(event) {
      event.preventDefault();
      $('#fecha2').datepicker({
        dateFormat:"DD, d 'de' MM 'de', yy",
        altField:"#fecha", 
        altFormat:"yy-mm-dd",
      });
    });
    $('#fechaPago2').datepicker({
      dateFormat:"DD, d 'de' MM 'de', yy",
      altField:"#fechaPago", 
      altFormat:"yy-mm-dd",
    });
    $('body').on('click', '.numeroDeReserva', function(event) {
      event.preventDefault();
      $this=$(this);
      numeroDeReserva=parseInt($this.html());
      $.ajax({
        type:"GET",
        url: "reservas/"+numeroDeReserva,
        success: function(data){
          $('.modal-body').html($('#respuesta',data));
          $('#myModal').modal();
          $('#myModalLabel').html('Reservacion numero '+numeroDeReserva);
          $('#myModal').on('hidden.bs.modal', function (e) {
            $('#reload').submit();
          });
        },
        dataType:"html"
      });
    });
    
    $('body').on('click', '.guardarCambiosEnReserva', function(event) {
      event.preventDefault();
      $this=$(this);
      numeroDeReserva=$("input[name='numeroDeReserva']").val();
      $.ajax({
        type:"PUT",
        data:$('#formularioIndividual').serialize(),
        url: "reservas/"+numeroDeReserva,
        success: function(data){
          $('.modal-body').html(data);
          $('#myModal').modal();
          $('#myModalLabel').html('Reservacion numero '+numeroDeReserva);
        },
        dataType:"html"
      });
    });

    $('body').on('click', '.guardarPagos', function(event) {
      event.preventDefault();
      $this=$(this);
      numeroDeReserva=$("input[name='numeroDeReserva']").val();
      $.ajax({
        type:"POST",
        data:{'fecha':$('#fechaPago').val(),'reserva':$("input[name='numeroDeReserva']").val(),'paymenttype':$("select[name='paymenttype']").val(),'ammount':$("input[name='ammount']").val(),'description':$("input[name='descriptionPago']").val()},
        url: "reservas/pagos",
        success: function(data){
          console.log(data);
          console.log($this.parent().parent());
          $tr=$this.closest('tr');
          $tr.before(data);
          var sum =0;
          $('.paymentAmmount').each(function() {     
            sum += parseInt($(this).text());                     
          });
          $('#montoAbonado').text(sum+' Bs.');
          $('#montoDeuda').text((parseInt($('#montoTotal').text())-sum)+' Bs.');
          $('#fechaPago').val('');
          $('#fechaPago2').val('')
          $("input[name='numeroDeReserva']").val('');
          $("select[name='paymenttype']").val('');
          $("input[name='ammount']").val('');
          $("input[name='descriptionPago']").val('');
          url="reservas/"+numeroDeReserva;
          $('.datosDePagos').load(url+' .datosDePagos');
        },
        dataType:"html"
      });
  });
  $('body').on('click', '.guardarPasajero', function(event) {
    event.preventDefault();
    $this=$(this);
    numeroDeReserva=$("input[name='numeroDeReserva']").val();
    $.ajax({
      type:"POST",
      data:{'name':$("input[name='pasajeroName']").val(),'lastname':$("input[name='pasajeroLastName']").val(),'identification':$("input[name='pasajeroIdentification']").val(),'email':$("input[name='pasajeroEmail']").val(),'phone':$("input[name='pasajeroPhone']").val(),'reserva':$("input[name='numeroDeReserva']").val()},
      url: "reservas/pasajeros",
      success: function(data){
        $tr=$this.closest('tr');
        $tr.before(data);
        $("input[name='pasajeroName']").val('');
        $("input[name='pasajeroLastName']").val('');
        $("input[name='pasajeroIdentification']").val('');
        $("input[name='pasajeroEmail']").val('');
        $("input[name='pasajeroPhone']").val('');
      },
      dataType:"text"
    });
  });
  $('body').on('change', 'input[name="fecha2"],input[name="boat_id"]', function(event) {
    event.preventDefault();
    console.log('algo Cambio');
    if($('.boat.active').length>0){
      $.get('http://reservas.puertorinoco.com/boatpriv/bydate/'+$('#fecha').val(), function(data) {
        window.disponibilidad=data['cupos'][$('.boat.active').text().substr(13,19).replace(/\s+/g, '')]['disponiblesMaximo'];
        console.log(window.disponibilidad);
        for (i = 0; i<Object.keys(window.disponibilidad).length;i++){
          j=i+1;
          $('.botonhora.tour-'+j).find('.cupos').text('cupos: '+window.disponibilidad[j]);
        }
      },"json");
    }
    else{
      return true;
    }
  });
});