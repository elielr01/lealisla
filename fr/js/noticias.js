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
          "<td id=titulo_en"+data[i].id+">"+data[i].titulo_en+"</td>"+
          "<td id=resumen_en"+data[i].id+">"+data[i].resumen_en+"</td>"+
          "<td>"+data[i].fecha+"</td>"+
          "<td class=text-center><a target=_blank href=uploads/"+data[i].archivo+">"+data[i].archivo+"</a></td>"+
          "<td><a class='btn btn-info btn-xs' data-toggle=modal onclick=editarNoticia("+data[i].id+")><span class='glyphicon glyphicon-edit'></span> Editar</a> "+
          "<br><br><a href=# class='btn btn-danger btn-xs' onclick=borrarNoticia("+data[i].id+",'"+encodeURI(data[i].titulo)+"','"+encodeURI(data[i].archivo)+"')><span class='glyphicon glyphicon-remove'></span> Borrar</a></td>"
        );
      }
    };
    $('#table_noticias').dataTable( {
      "order": [[ 4, "asc" ]]
    } );
  }
});

function editarNoticia(id)
{
  $('#edit_tags option').remove();
  $.ajax({
    type:'GET',
    dataType: 'json',
    url:'lib/obtenerTagsNoticia.php',
    data: {id:id},
    success: function(data) {
      console.log(data);
      for (var i = 0; i < data.length; i++) {
        if(data[i].active == true)
        {
          $('#edit_tags').append("<option selected value="+data[i].id+">"+data[i].tag+"</option>");
        }
        else
        {
          $('#edit_tags').append("<option value="+data[i].id+">"+data[i].tag+"</option>");
        }
      };
      $('#edit_tags').multiselect('rebuild');
    }
  });
  var titulo = $("#titulo"+id).html();
  var titulo_en = $("#titulo_en"+id).html();
  var resumen = $("#resumen"+id).html();
  var resumen_en = $("#resumen_en"+id).html();
  $("#editarNoticia").modal('show');
  $("#editar_titulo").val(titulo);
  $("#editar_titulo_en").val(titulo_en);
  $("#editar_resumen").val(resumen);
  $("#editar_resumen_en").val(resumen_en);
  $("#hdn_noticia").val(id);
}

function borrarNoticia(id, titulo, archivo)
{
  var txt;
  var r = confirm("¿Seguro que deseas eliminar la noticia "+decodeURI(titulo)+"?");
  if (r == true) {
    $.ajax({
      type:'POST',
      dataType: 'json',
      url:'lib/borrarNoticia.php',
      data: { "id": id, "archivo":archivo},
      success: function(data) {
        if(data[0].data == true)
        {
          location.reload();
        }
        else
        {
          alert("Ha ocurrido un error, intentar más tarde");
        }
      }
    });
  }
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
      var titulo_en = $("#editar_titulo_en").val();
      var resumen = $("#editar_resumen").val();
      var resumen_en = $("#editar_resumen_en").val();
      $("#titulo"+id).text(titulo);
      $("#titulo_en"+id).text(titulo_en);
      $("#resumen"+id).text(resumen);
      $("#resumen_en"+id).text(resumen_en);
    }
  });
  return false;
})
