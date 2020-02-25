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
ARTÍCULOS ADMINISTRABLE          
======================================-->
<script type="text/javascript">
    $(document).ready(function(){
        $('#allArea').Editor();

        $('#allArea').Editor('setText', ['<p ></p>']);

        $('#guardarArticulo').click(function(e){
            e.preventDefault();
            $('#allArea').text($('#allArea').Editor('getText'));
            $('#frm-test').submit();
        });
    });
</script>

<div id="seccionArticulos" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">

    <button id="btnagregarArticulo" class="btn btn-info btn-lg">Agregar Noticia</button>

    <!--==== AGREGAR ARTÍCULO  ====-->

    <div id="agregarArtículo" style="display:none;">
     <form method="post" enctype="multipart/form-data"  id="frm-test">
            <input name="tituloArticulo" type="text" placeholder="Título de la Noticia" class="form-control" required>

            <textarea name="introArticulo" name="" id="editTextArea" cols="30" rows="5" placeholder="Introducción del Noticia" class="form-control" maxlength="169" required></textarea>

            <input  type="file" name="imagen" class="btn btn-default" id="subirFoto" required>

            <p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>

            <div id="arrastreImagenArticulo">	
<!--                <div id="imagenArticulo"><img src="views/images/articulos/landscape01.jpg" class="img-thumbnail"></div>-->
            </div>

            <textarea name="contenidoArticulo" id="allArea" cols="30" rows="10" placeholder="Contenido del Noticia" class="form-control" required></textarea>


         <div>
             <label for="" id="nombreDoc">Subir documento</label>

           <input  type="file" name="documt" class="btn btn-default" id="subirDocumento" required>
         </div>

         <input type="submit" id="guardarArticulo" class="btn btn-primary" value="Guardar Noticia" >
     </form>
    </div>
<?
    $crearArticulo = new GestorArticulos();
    $crearArticulo -> guardarArticuloController();
    ?>
    <hr>

    <!--==== EDITAR ARTÍCULO  ====-->

    <ul id="editarArticulo">


            <?
            $mostrarArticulo = new GestorArticulos();
            $mostrarArticulo -> mostrarArticuloController();
            $mostrarArticulo -> borrarArticuloController();
            ?>
       

    </ul>

  <button id="ordenarArticulos" class="btn btn-warning pull-right" style="margin:10px 30px">Ordenar Noticias</button>
  <button id="guardarOrdenArticulos" class="btn btn-primary pull-right" style="display:none; margin:10px 30px">Guardar Orden Noticias</button>

</div>

