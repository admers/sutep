<?
session_start();
if(!$_SESSION["validar"]){
    header("location:ingreso");
    exit();
}
include "views/modules/botonera.php";
include "views/modules/cabezote.php";
?>
        <!--=====================================
			VIDEOS ADMINISTRABLE          
			======================================-->

<div id="videos" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">

    <form method="post" enctype="multipart/form-data">
        <input name="tituloVideo" type="text" placeholder="Título de Video" class="form-control" required>

        <input type="file"  name="video" class="btn btn-default" required>
        <br>
        <input type="submit" id="subirVideo" name="svideo" class="btn btn-primary"  value="Subir Video" required>

    </form>
    <?php
    $subir= new GestorArticulos();
    $subir -> mostrarVideoController();
    ?>

    <p>Subir sólo videos en formato MP4 y que no exceda el peso de 50 MB</p>

    <ul id="galeriaVideo">
        <?php
        $video = new GestorArticulos();
        $video -> mostrarVideoVistaController();
        ?>

    </ul>





</div>
			
			
			<!--====  Fin de VIDEOS ADMINISTRABLE  ====-->