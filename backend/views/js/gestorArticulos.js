 $("#btnagregarArticulo").click(function(){
     
     $("#agregarArtículo").toggle(400);
     
 })

//var imagen = "";

$("#subirFoto").change(function(){
    imagen = this.files[0];
   // console.log('imagen',imagen);
    imagenSize = imagen.size;
    if(Number(imagenSize) > 300000000){
        
        $("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 200kb</div>')
    }
    else{
        $(".alerta").remove();
    }
    
    imagenType = imagen.type;
    //console.log('imagenType',imagenType);
    if(imagenType == "image/jpeg" || imagenType == "image/png"){
       $(".alerta").remove();
       }
    else{
         $("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>')
    }
    //-----------------mostrar con ajax imagen---------------------
    if(Number(imagenSize) < 300000000 && imagenType == "image/jpeg" || imagenType == "image/png" ){
       var datos = new FormData();
        datos.append("imagen",imagen);
        $.ajax({
            
            url:"views/ajax/gestorArticulos.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                  $("#arrastreImagenArticulo").before('<img src="views/images/status.gif" id="status">');
            },
            success: function(respuesta){
                $("#status").remove();
               // console.log('respuesta',respuesta);
					if(respuesta == 0){

						$("#arrastreImagenArticulo").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>')

					}else{

						$("#arrastreImagenArticulo").html('<div id="imagenArticulo"><img src="'+respuesta.slice(6)+'" class="img-thumbnail"></div>');

					}
                    
            }
        })
    }
})

//------------------ORDENAR NOTICIAS------------------------------------
var almacenarOrdenId = new Array();
var ordenItem = new Array();

$("#ordenarArticulos").click(function (){

    $("#ordenarArticulos").hide();
    $("#guardarOrdenArticulos").show();
    $("#editarArticulo").css({"cursor":"move"})
    $("#editarArticulo span i").hide()
    $("#editarArticulo button").hide()
    $("#editarArticulo img").hide()
    $("#editarArticulo p").hide()
    $("#editarArticulo hr").hide()
    $("#editarArticulo div").remove()
    $(".bloqueArticulo").css({"padding":"2px"})
    $("#editarArticulo h1").css({ "font-size": "14px","position": "absolute", "padding": "10px", "top": "-15px"})
    $("#editarArticulo span").html('<i class="glyphicon glyphicon-move style="padding:8px></i>')

    $("body, html").animate({
       scrollTop:$("body").offset().top 

    },500)

    $("#editarArticulo").sortable({
       revert: true, 
        connectWith: ".bloqueArticulo",
        handle: ".handleArticle",
        stop: function(event){

            for (var i = 0; i < $("#editarArticulo li").length; i++) {

                almacenarOrdenId[i] = event.target.children[i].id;
                ordenItem[i] = i + 1;
                

                
            }

        }

    })

    $("#guardarOrdenArticulos").click(function(){
        $("#ordenarArticulos").show();
        $("#guardarOrdenArticulos").hide();

        for (var i = 0; i < $("#editarArticulo li").length; i++) {

            var actualizarOrden = new FormData();
            actualizarOrden.append("actualizarOrdenArticulos", almacenarOrdenId[i]);
            actualizarOrden.append("actualizarOrdenItem", ordenItem[i]);

            $.ajax({

                url: "views/ajax/gestorArticulos.php",
                method: "POST",
                data: actualizarOrden,
                cache: false,
                contentType: false,
                processData: false,
                success: function (respuesta) {

                    $("#editarArticulo").html(respuesta);

                    swal({
                        title: "¡OK!",
                        text: "¡El orden se ha actualizado correctamente!",
                        type: "success",
                        confirmButtonText: "Cerrar",
                        closeOnConfirm: false
                    },
                        function (isConfirm) {
                            if (isConfirm) {
                                window.location = "articulos";
                            }
                        });


                }

            })



        }
    


    })


    
})

