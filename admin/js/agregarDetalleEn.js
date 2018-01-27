$("#detalle_servicio").submit(function(e){
	e.preventDefault();
	var detalle = $("#servicio").val();
	var id = $("#hdn_id").val();
	$.ajax({
      type:'POST',
      dataType: 'json',
      url:'lib/agregarDetalleEn.php',
      data: { "id": id, "detalle":detalle},
      success: function(data) {
      	if(data[0].error == 0)
      	{
      		console.log(data);
      		$("#servicios_list").append("<div class=list-group-item id=servicio"+data[0].id+">"+detalle+"<a data-id="+data[0].id+" class='pull-right delete_list'>X</a></div>");
      		$("#servicio").val('');
      	}
      	else
      	{
      		alert("Ha ocurrido un error, favor de intentar más tarde");
      	}
      }
    });
    return false;
})


$( document ).on( 'click', '.delete_list', function () {
	var r = window.confirm("¿Deseas eliminar este elemento de la lista?");
    if (r == true) {
    	var id = $(this).data('id');
		$.ajax({
	      type:'POST',
	      dataType: 'json',
	      url:'lib/borrarDetalleEn.php',
	      data: { "id": id},
	      success: function(data) {
	      	if(data[0].data)
	      	{
	      		$("#servicio"+id).remove();
	      	}
	      	else
	      	{
	      		alert("Ha ocurrido un error, favor de intentar más tarde");
	      	}
	      }
		})
	}
});