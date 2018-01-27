/*
    * Especialidad
    */
    function anadir_especialidad() {
        $('#cv_info2').slideToggle(function() {
            $('#especialidad').toggleClass('disabled');
        });
    }

    $("#cancelar_especialidad").click(function(e){
        e.preventDefault();
        $('#cv_info2').slideToggle(function() {
            $('#especialidad').toggleClass('disabled');
            $("#txt_especialidad").val('');
        });
    })

    //Collapse del menú de experiencia, cambia la felcha y se abre el contenido
    $('#id_especialidad').click(function() {
        $('#collapse_especialidad').slideToggle();
        $('#icon_especialidad').toggleClass('glyphicon-chevron-down');
    });

    $("#aceptar_especialidad").click(function(e){
        var text = $("#txt_especialidad").val();
        var id = $("#hdn_id_empleado").val();
        if(text.length>0){
            $.ajax({
                type:"POST",
                url:'lib/guardarCV.php',
                dataType: 'json',
                data:{idempleado:id, descripcion:text, tipo:4},
                success: function(data){
                    if(data[0].error == 0)
                    {

                        flag = "box_experiencia2";
                        $('#display_info_especialidad').append("<div class="+flag+"><button data-id="+data[0].id+" type=button class=close data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div id=exp"+data[0].id+"><a data-toggle=modal class=edit_desc>"+text+"</div></a></div>");
                        $('#cv_info2').slideToggle(function() {
                            $('#especialidad').toggleClass('disabled');
                            $("#txt_especialidad").val('');
                        });
                    }
                    else
                    {
                        alert("Ha ocurrido un error, favor de intentar más tarde.");
                    }
                }
            });
        }
    })

    /*
    * Especialidad Termina
    */



    /*
    * Experiencia
    */
    //Al presionar el menú de agregar experiencia, salen los campos y los botones donde se va a dar de alta
    function anadir_experiencia() {
        $('#cv_info1').slideToggle(function() {
            $('#experiencia').toggleClass('disabled');
        });
    }

    //Collapse del menú de experiencia, cambia la felcha y se abre el contenido
    $('#id_experiencia').click(function() {
        $('#collapse_experiencia').slideToggle();
        $('#icon_experciencia').toggleClass('glyphicon-chevron-down');
    });

    //Cuando presiona el botón de cancelar vuelve a la normalidad
    $("#cancelar_experiencia").click(function(e){
        e.preventDefault();
        $('#cv_info1').slideToggle(function() {
            $('#experiencia').toggleClass('disabled');
            $("#txt_experiencia").val('');
        });
    })

    //Cuando presiona el botón de guardar
    $("#aceptar_experiencia").click(function(e){
        var text = $("#txt_experiencia").val();
        var id = $("#hdn_id_empleado").val();
        var tipo = $("#tipo_experiencia").val();;
        if(text.length>0){
            $.ajax({
                type:"POST",
                url:'lib/guardarCV.php',
                dataType: 'json',
                data:{idempleado:id, descripcion:text, tipo:tipo},
                success: function(data){
                    if(data[0].error == 0)
                    {
                        var flag;
                        if(tipo == 2) {
                            flag = "box_experiencia1";
                        }
                        else
                        {
                            flag = "box_experiencia2";
                        }
                        $('#display_info_experiencia').append("<div class="+flag+"><button data-id="+data[0].id+" type=button class=close data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div id=exp"+data[0].id+"><a data-toggle=modal class=edit_desc>"+text+"</div></a></div>");
                        $('#cv_info1').slideToggle(function() {
                            $('#experiencia').toggleClass('disabled');
                            $("#txt_experiencia").val('');
                        });
                    }
                    else
                    {
                        alert("Ha ocurrido un error, favor de intentar más tarde.");
                    }
                }
            });
        }
    })

    /*
    * Termina Experiencia
    */


    /**
    Lenguaje
    **/
     function anadir_lenguaje() {
        $('#cv_info3').slideToggle(function() {
            $('#lenguaje').toggleClass('disabled');
        });
    }
    $("#cancelar_lenguaje").click(function(e){
        e.preventDefault();
        $('#cv_info3').slideToggle(function() {
            $('#lenguaje').toggleClass('disabled');
            $("#txt_lenguaje").val('');
        });
    })

    $('#id_lenguaje').click(function() {
        $('#collapse_lenguaje').slideToggle();
        $('#icon_lenguaje').toggleClass('glyphicon-chevron-down');
    });

    $("#aceptar_lenguaje").click(function(e){
        var text = $("#txt_lenguaje").val();
        var id = $("#hdn_id_empleado").val();
        if(text.length>0){
            $.ajax({
                type:"POST",
                url:'lib/guardarCV.php',
                dataType: 'json',
                data:{idempleado:id, descripcion:text, tipo:5},
                success: function(data){
                    if(data[0].error == 0)
                    {

                        flag = "box_experiencia2";
                        $('#display_info_lenguaje').append("<div class="+flag+"><button data-id="+data[0].id+" type=button class=close data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div id=exp"+data[0].id+"><a data-toggle=modal class=edit_desc>"+text+"</div></a></div>");
                        $('#cv_info3').slideToggle(function() {
                            $('#lenguaje').toggleClass('disabled');
                            $("#txt_lenguaje").val('');
                        });
                    }
                    else
                    {
                        alert("Ha ocurrido un error, favor de intentar más tarde.");
                    }
                }
            });
        }
    })
    /**
    Termina Lenguaje
    **/


    /**
    Formación
    **/
     function anadir_formacion() {
        $('#cv_info4').slideToggle(function() {
            $('#formacion').toggleClass('disabled');
        });
    }

    $("#cancelar_formacion").click(function(e){
        e.preventDefault();
        $('#cv_info4').slideToggle(function() {
            $('#formacion').toggleClass('disabled');
            $("#txt_formacion").val('');
        });
    })

    $('#id_formacion').click(function() {
        $('#collapse_formacion').slideToggle();
        $('#icon_formacion').toggleClass('glyphicon-chevron-down');
    });

    $("#aceptar_formacion").click(function(e){
        var text = $("#txt_formacion").val();
        var id = $("#hdn_id_empleado").val();
        if(text.length>0){
            $.ajax({
                type:"POST",
                url:'lib/guardarCV.php',
                dataType: 'json',
                data:{idempleado:id, descripcion:text, tipo:1},
                success: function(data){
                    if(data[0].error == 0)
                    {

                        flag = "box_experiencia2";
                        $('#display_info_formacion').append("<div class="+flag+"><button data-id="+data[0].id+" type=button class='close close2' data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div id=exp"+data[0].id+"><a data-toggle=modal class=edit_desc>"+text+"</div></a></div>");
                        $('#cv_info4').slideToggle(function() {
                            $('#formacion').toggleClass('disabled');
                            $("#txt_formacion").val('');
                        });
                    }
                    else
                    {
                        alert("Ha ocurrido un error, favor de intentar más tarde.");
                    }
                }
            });
        }
    })
    /**
    Termina Formación
    **/


    /**
    Membresia
    **/
     function anadir_membresia() {
        $('#cv_info5').slideToggle(function() {
            $('#membresia').toggleClass('disabled');
        });
    }

    $("#cancelar_membresia").click(function(e){
        e.preventDefault();
        $('#cv_info5').slideToggle(function() {
            $('#membresia').toggleClass('disabled');
            $("#txt_membresia").val('');
        });
    })

    $('#id_membresia').click(function() {
        $('#collapse_membresia').slideToggle();
        $('#icon_membresia').toggleClass('glyphicon-chevron-down');
    });

    $("#aceptar_membresia").click(function(e){
        var text = $("#txt_membresia").val();
        var id = $("#hdn_id_empleado").val();
        if(text.length>0){
            $.ajax({
                type:"POST",
                url:'lib/guardarCV.php',
                dataType: 'json',
                data:{idempleado:id, descripcion:text, tipo:6},
                success: function(data){
                    if(data[0].error == 0)
                    {

                        flag = "box_experiencia2";
                        $('#display_info_membresia').append("<div class="+flag+"><button data-id="+data[0].id+" type=button class=close data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div id=exp"+data[0].id+"><a data-toggle=modal class=edit_desc>"+text+"</div></a></div>");
                        $('#cv_info5').slideToggle(function() {
                            $('#membresia').toggleClass('disabled');
                            $("#txt_membresia").val('');
                        });
                    }
                    else
                    {
                        alert("Ha ocurrido un error, favor de intentar más tarde.");
                    }
                }
            });
        }
    })
    /**
    Termina Membresia
    **/


    /**
    Seminarios
    **/
     function anadir_seminarios() {
        $('#cv_info6').slideToggle(function() {
            $('#seminarios').toggleClass('disabled');
        });
    }

    $("#cancelar_seminarios").click(function(e){
        e.preventDefault();
        $('#cv_info6').slideToggle(function() {
            $('#seminarios').toggleClass('disabled');
            $("#txt_seminarios").val('');
        });
    })

    $('#id_seminarios').click(function() {
        $('#collapse_seminarios').slideToggle();
        $('#icon_seminarios').toggleClass('glyphicon-chevron-down');
    });

    $("#aceptar_seminarios").click(function(e){
        var text = $("#txt_seminarios").val();
        var id = $("#hdn_id_empleado").val();
        if(text.length>0){
            $.ajax({
                type:"POST",
                url:'lib/guardarCV.php',
                dataType: 'json',
                data:{idempleado:id, descripcion:text, tipo:7},
                success: function(data){
                    if(data[0].error == 0)
                    {
                        flag = "box_experiencia2";
                        $('#display_info_seminarios').append("<div class="+flag+"><button data-id="+data[0].id+" type=button class=close data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div id=exp"+data[0].id+"><a data-toggle=modal class=edit_desc>"+text+"</div></a></div>");
                        $('#cv_info6').slideToggle(function() {
                            $('#seminarios').toggleClass('disabled');
                            $("#txt_seminarios").val('');
                        });
                    }
                    else
                    {
                        alert("Ha ocurrido un error, favor de intentar más tarde.");
                    }
                }
            });
        }
    })
    /**
    Termina Seminarios
    **/


    /**
    Reconocimientos
    **/
     function anadir_reconocimientos() {
        $('#cv_info7').slideToggle(function() {
            $('#reconocimientos').toggleClass('disabled');
        });
    }

    $("#cancelar_reconocimientos").click(function(e){
        e.preventDefault();
        $('#cv_info7').slideToggle(function() {
            $('#reconocimientos').toggleClass('disabled');
            $("#txt_reconocimientos").val('');
        });
    })

    $('#id_reconocimientos').click(function() {
        $('#collapse_reconocimientos').slideToggle();
        $('#icon_reconocimientos').toggleClass('glyphicon-chevron-down');
    });

    $("#aceptar_reconocimientos").click(function(e){
        var text = $("#txt_reconocimientos").val();
        var id = $("#hdn_id_empleado").val();
        if(text.length>0){
            $.ajax({
                type:"POST",
                url:'lib/guardarCV.php',
                dataType: 'json',
                data:{idempleado:id, descripcion:text, tipo:8},
                success: function(data){
                    if(data[0].error == 0)
                    {
                        flag = "box_experiencia2";
                        $('#display_info_reconocimientos').append("<div class="+flag+"><button data-id="+data[0].id+" type=button class=close data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div id=exp"+data[0].id+"><a data-toggle=modal class=edit_desc>"+text+"</div></a></div>");
                        $('#cv_info7').slideToggle(function() {
                            $('#reconocimientos').toggleClass('disabled');
                            $("#txt_reconocimientos").val('');
                        });
                    }
                    else
                    {
                        alert("Ha ocurrido un error, favor de intentar más tarde.");
                    }
                }
            });
        }
    })
    /**
    Termina Reconocimientos
    **/


    /**
    Pro bono
    **/
     function anadir_probono() {
        $('#cv_info9').slideToggle(function() {
            $('#probono').toggleClass('disabled');
        });
    }

    $("#cancelar_probono").click(function(e){
        e.preventDefault();
        $('#cv_info9').slideToggle(function() {
            $('#probono').toggleClass('disabled');
            $("#txt_probono").val('');
        });
    })

    $('#id_probono').click(function() {
        $('#collapse_probono').slideToggle();
        $('#icon_probono').toggleClass('glyphicon-chevron-down');
    });

    $("#aceptar_probono").click(function(e){
        var text = $("#txt_probono").val();
        var id = $("#hdn_id_empleado").val();
        if(text.length>0){
            $.ajax({
                type:"POST",
                url:'lib/guardarCV.php',
                dataType: 'json',
                data:{idempleado:id, descripcion:text, tipo:13},
                success: function(data){
                    if(data[0].error == 0)
                    {
                        flag = "box_experiencia2";
                        $('#display_info_probono').append("<div class="+flag+"><button data-id="+data[0].id+" type=button class=close data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div id=exp"+data[0].id+"><a data-toggle=modal class=edit_desc>"+text+"</div></a></div>");
                        $('#cv_info9').slideToggle(function() {
                            $('#probono').toggleClass('disabled');
                            $("#txt_probono").val('');
                        });
                    }
                    else
                    {
                        alert("Ha ocurrido un error, favor de intentar más tarde.");
                    }
                }
            });
        }
    })
    /**
    Termina Pro bono
    **/



    /**
    Extra
    **/
     function anadir_extra() {
        $('#cv_info10').slideToggle(function() {
            $('#extra').toggleClass('disabled');
        });
    }

    $("#cancelar_extra").click(function(e){
        e.preventDefault();
        $('#cv_info10').slideToggle(function() {
            $('#extra').toggleClass('disabled');
            $("#txt_extra").val('');
        });
    })

    $('#id_extra').click(function() {
        $('#collapse_extra').slideToggle();
        $('#icon_extra').toggleClass('glyphicon-chevron-down');
    });

    $("#aceptar_extra").click(function(e){
        var text = $("#txt_extra").val();
        var id = $("#hdn_id_empleado").val();
        if(text.length>0){
            $.ajax({
                type:"POST",
                url:'lib/guardarCV.php',
                dataType: 'json',
                data:{idempleado:id, descripcion:text, tipo:14},
                success: function(data){
                    if(data[0].error == 0)
                    {
                        flag = "box_experiencia2";
                        $('#display_info_extra').append("<div class="+flag+"><button data-id="+data[0].id+" type=button class=close data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div id=exp"+data[0].id+"><a data-toggle=modal class=edit_desc>"+text+"</div></a></div>");
                        $('#cv_info10').slideToggle(function() {
                            $('#extra').toggleClass('disabled');
                            $("#txt_extra").val('');
                        });
                    }
                    else
                    {
                        alert("Ha ocurrido un error, favor de intentar más tarde.");
                    }
                }
            });
        }
    })
    /**
    Termina Extra
    **/






    /*
    * publicaciones
    */
    //Al presionar el menú de agregar publicaciones, salen los campos y los botones donde se va a dar de alta
    function anadir_publicaciones() {
        $('#cv_info8').slideToggle(function() {
            $('#publicaciones').toggleClass('disabled');
        });
    }

    //Collapse del menú de publicaciones, cambia la felcha y se abre el contenido
    $('#id_publicaciones').click(function() {
        $('#collapse_publicaciones').slideToggle();
        $('#icon_publicaciones').toggleClass('glyphicon-chevron-down');
    });

    //Cuando presiona el botón de cancelar vuelve a la normalidad
    $("#cancelar_publicaciones").click(function(e){
        e.preventDefault();
        $('#cv_info8').slideToggle(function() {
            $('#publicaciones').toggleClass('disabled');
            $("#txt_publicaciones").val('');
        });
    })

    //Cuando presiona el botón de guardar
    $("#aceptar_publicaciones").click(function(e){
        var text = $("#txt_publicaciones").val();
        var id = $("#hdn_id_empleado").val();
        var tipo = $("#tipo_publicaciones").val();;
        if(text.length>0){
            $.ajax({
                type:"POST",
                url:'lib/guardarCV.php',
                dataType: 'json',
                data:{idempleado:id, descripcion:text, tipo:tipo},
                success: function(data){
                    if(data[0].error == 0)
                    {
                        var flag;
                        if(tipo == 9) {
                            flag = "box_experiencia1";
                        }
                        else if(tipo == 10)
                        {
                            flag = "box_experiencia2";
                        }
                        else if(tipo == 11)
                        {
                            flag = "box_experiencia3";
                        }
                        else
                        {   
                            flag = "box_experiencia4";
                        }
                        $('#display_info_publicaciones').append("<div class="+flag+"><button data-id="+data[0].id+" type=button class=close data-dismiss=modal aria-label=Close><span aria-hidden=true>&times;</span></button><div id=exp"+data[0].id+"><a data-toggle=modal class=edit_desc>"+text+"</div></a></div>");
                        $('#cv_info8').slideToggle(function() {
                            $('#publicaciones').toggleClass('disabled');
                            $("#txt_publicaciones").val('');
                        });
                    }
                    else
                    {
                        alert("Ha ocurrido un error, favor de intentar más tarde.");
                    }
                }
            });
        }
    })

    /*
    * Termina publicaciones
    */

    $( document ).on( 'click', '.close', function () {
       var r = window.confirm("¿Deseas eliminar este elemento de la lista?");
        if (r == true) {
            var id = $(this).data('id');
            var hola = $(this);
             $.ajax({
                type:"POST",
                url:'lib/borrarCV.php',
                dataType: 'json',
                data:{id:id},
                success: function(data){
                    if(data[0].data == true)
                    {
                        hola.parent().remove();
                    }
                    else
                    {
                        alert("Ha ocurrido un error");
                    }
                }
            })
        }
    })

     $( document ).on( 'click', '.edit_desc', function () {
        $("#myModal").modal('show');
        $("#edit_description_modal").val($(this).html());
        var id = $(this).parent().attr('id');
        id = id.substring(3);
        $("#hdn_description_modal").val(id);
     });

     $("#edit_desc_button").click(function(e){
        var id = $("#hdn_description_modal").val();
        var desc = $("#edit_description_modal").val();
        $.ajax({
            type:"POST",
            url:'lib/editarCV.php',
            dataType: 'json',
            data:{desc:desc, id:id},
            success: function(data){
                var editar_txt = "<a data-toggle=modal class=edit_desc>"+$("#edit_description_modal").val()+"</a>";
                $("#myModal").modal('hide');
                $("#exp"+id).html(editar_txt);
            }
        })
     })
