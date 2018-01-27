$.ajax({
  type:'GET',
  dataType: 'json',
  url:'lib/obtenerAviso.php',
  success: function(data) {
    if(data.length >0 ) {
      var texto = data[0].aviso;
      texto = texto.replace("<pre>", "");
      texto = texto.replace("</pre>", "");
      $("#aviso").html(texto);
    }
  }
});

$.ajax({
  type:'GET',
  dataType: 'json',
  url:'lib/obtenerAvisoEn.php',
  success: function(data) {
    if(data.length >0 ) {
      var texto = data[0].aviso;
      texto = texto.replace("<pre>", "");
      texto = texto.replace("</pre>", "");
      $("#aviso_en").html(texto);
    }
  }
});


$("#aviso_es_add").submit(function(e){
  e.preventDefault();
  var aviso = $("#aviso").val();
  var aviso = "<pre>"+aviso+"</pre>";
  $.ajax({
    type:'POST',
    dataType: 'json',
    url:'lib/agregarAviso.php',
    data:{ "aviso":aviso },
    success: function(data) {
      if(data.length >0 ) {
        if(data[0].error == 0)
        {
          alert("El aviso de privacidad se modificó correctamente")
          location.reload();
        }
        else
        {
          alert("Ocurrió un problema, favor de intentar más tarde.")
        }
      }
    }
  });
  return false;
})


$("#aviso_en_add").submit(function(e){
  e.preventDefault();
  var aviso = $("#aviso_en").val();
  var aviso = "<pre>"+aviso+"</pre>";
  $.ajax({
    type:'POST',
    dataType: 'json',
    url:'lib/agregarAvisoEn.php',
    data:{ "aviso":aviso },
    success: function(data) {
      if(data.length >0 ) {
        if(data[0].error == 0)
        {
          alert("El aviso de privacidad se modificó correctamente")
          location.reload();
        }
        else
        {
          alert("Ocurrió un problema, favor de intentar más tarde.")
        }
      }
    }
  });
  return false;
})
