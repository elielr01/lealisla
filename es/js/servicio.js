$.ajax({
  type:'GET',
  dataType: 'json',
  url:'lib/obtenerServicios.php',
  success: function(data) {
    if(data.length >0 ) {
      for (var i = 0; i < data.length; i++) {
        $("tbody").append("<tr>"+
        "<td><img width=70 src=uploads/"+data[i].foto+"></td>"+
        "<td id=servicio"+data[i].id+">"+data[i].servicio+"</td>"+
        "<td id=servicio_en"+data[i].id+">"+data[i].servicio_en+"</td>"+
        "<td><a class='btn btn-info btn-xs' data-toggle=modal href=agregarDetalle.php?id="+data[i].id+"><span class='glyphicon glyphicon-edit'></span> Agregar servicio</a> "+
        " <a class='btn btn-info btn-xs' href=editarCategoria.php?id="+data[i].id+"><span class='glyphicon glyphicon-edit'></span> Editar categoría</a>"+
        " <a href=# class='btn btn-danger btn-xs' onclick=borrarServicio("+data[i].id+")><span class='glyphicon glyphicon-remove'></span> Borrar</a></td>"
      );
    }
  };
  $('#table_servicios').dataTable();
}
});


function editarServicio(id)
{
  var servicio = $("#servicio"+id).html();
  var servicio_en = $("#servicio_en"+id).html();
  $("#editarServicio").modal('show');
  $("#editar_servicio").val(servicio);
  $("#editar_servicio_en").val(servicio_en);
  $("#hdn_servicio").val(id);
}

function borrarServicio(id)
{
  var txt;
  var r = confirm("¿Seguro que deseas eliminar el servicio?");
  if (r == true) {
    $.ajax({
      type:'POST',
      dataType: 'json',
      url:'lib/borrarServicio.php',
      data: { "id": id},
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


$("#editar_servicios_form").submit(function (e){
  e.preventDefault();
  $.ajax({
    type:'POST',
    dataType: 'json',
    url:'lib/editarServicios.php',
    data:$("#editar_servicios_form").serialize(),
    success: function(data) {
      $("#editarServicio").modal('hide');
      var id = $("#hdn_servicio").val();
      var servicio = $("#editar_servicio").val();
      var servicio_en = $("#editar_servicio_en").val();
      $("#servicio"+id).text(servicio);
      $("#servicio_en"+id).text(servicio_en);
    }
  });
  return false;
})


$("#guardar_servicios_form").submit(function (e){
  e.preventDefault();
  $.ajax({
    type:'POST',
    dataType: 'json',
    url:'lib/guardarServicio.php',
    data:$("#guardar_servicios_form").serialize(),
    success: function(data) {
      console.log(data);
      if(data[0].error == 0)
      {
        location.reload();
      }
      else
      {
        alert("Ha ocurrido un error y no se puede dar de alta.");
      }
    }
  });
  return false;
})
