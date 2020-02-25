<?
class EnlacesModels{
    
    public function enlacesPaginaModels($enlaces){
        
        if($enlaces == "inicio" ||
           $enlaces == "ingreso" ||
           $enlaces == "slide" ||
           $enlaces == "articulos" ||
           $enlaces == "videos" ||
           $enlaces == "suscriptores" ||
           $enlaces == "casistencia" ||
           $enlaces == "mensajes" ||
           $enlaces == "perfil" ||
           $enlaces == "salir" 
          
          ){
            $module = "views/modules/".$enlaces.".php";
        }
        else if($enlaces == "index"){
            
            $module = "views/modules/ingreso.php";
            
        }else{
            
            $module = "views/modules/ingreso.php";
            
        }
        
        return $module;
        
    }
}