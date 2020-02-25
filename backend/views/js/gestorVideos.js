/*=============================================
Área de arrastre de videos
=============================================*/

if($("#galeriaVideo").html() == 0){

	$("#galeriaVideo").css({"height":"100px"});

}

else{

	$("#galeriaVideo").css({"height":"auto"});

}


/*=============================================
Subir Videos
=============================================*/

/*=============================================
Eliminar Video
=============================================*/
$(".eliminarVideo").click(function(){

	if($(".eliminarVideo").length == 1){

		$("#galeriaVideo").css({"height":"100px"});

	}

	idVideo = $(this).parent().attr("id");
	rutaVideo ="http://localhost/sutep/backend/"+$(this).attr("ruta");

	console.log(idVideo+rutaVideo)

	$(this).parent().remove();

	var borrarVideo = new FormData();

	borrarVideo.append("idVideo", idVideo);
	borrarVideo.append("rutaVideo", rutaVideo);

	$.ajax({
		url:"views/ajax/gestorVideos.php",
		method: "POST",
		data: borrarVideo,
		cache: false,
		contentType: false,
		processData: false,
		success: function(respuesta){

		}

	})

})

/*=============================================
Ordenar Videos
=============================================*/
