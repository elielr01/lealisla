$.ajax({
  type:'GET',
  dataType: 'json',
  url:'lib/obtenerNoticias.php',
  success: function(data) {
    if(data.length >0 ) {
      for (var i = 0; i < data.length; i++) {
        $("tbody").append("<tr>"+
          "<td id=titulo"+data[i].id+">"+data[i].titulo+"</td>"+
          "<td id=resumen"+data[i].id+">"+data[i].resumen+"</td>"+
          "<td>"+data[i].fecha+"</td>"+
          "<td class=text-center><a target=_blank href=uploads/"+data[i].archivo+">"+data[i].archivo+"</a></td>"+
          "<td><a class='btn btn-info btn-xs' data-toggle=modal onclick=editarNoticia("+data[i].id+")><span class='glyphicon glyphicon-edit'></span> Editar</a> "+
          "<br><br><a href=# class='btn btn-danger btn-xs' onclick=borrarNoticia("+data[i].id+")><span class='glyphicon glyphicon-remove'></span> Borrar</a></td>"
        );
      }
    };
  }
});

function editarNoticia(id)
{
  var titulo = $("#titulo"+id).html();
  var resumen = $("#resumen"+id).html();
  $("#editarNoticia").modal('show');
  $("#editar_titulo").val(titulo);
  $("#editar_resumen").val(resumen);
  $("#hdn_noticia").val(id);
}

$("#editar_noticia_form").submit(function (e){
  e.preventDefault();
  $.ajax({
    type:'POST',
    dataType: 'json',
    url:'lib/editarNoticia.php',
    data:$("#editar_noticia_form").serialize(),
    success: function(data) {
      $("#editarNoticia").modal('hide');
      var id = $("#hdn_noticia").val();
      var titulo = $("#editar_titulo").val();
      var resumen = $("#editar_resumen").val();
      $("#titulo"+id).text(titulo);
      $("#resumen"+id).text(resumen);
    }
  });
  return false;
})
