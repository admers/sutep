<? 
require_once "conexion.php";

class IngresoModels{
    
    public function ingresoModel($datosModel,$tabla){
        
        //$datosModel["usuarrio"]
       $stmt = Conexion::conectar()->prepare("SELECT usuario, password, intentos FROM $tabla WHERE usuario = :usuario");
        $stmt -> bindParam(":usuario",$datosModel["usuarioIn"],PDO::PARAM_STR);
        //$stmt -> bindParam(":password",$datosModel["passwordIn"],PDO::PARAM_STR);
        $stmt -> execute();
        return $stmt -> fetch();
        $stmt -> close();
        
    }
    
    public function intentosModel($datosModel,$tabla){
    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET intentos = :intentos WHERE usuario = :usuario");
    $stmt -> bindParam(":intentos",$datosModel["actualizarIntentos"],PDO::PARAM_INT);
    $stmt -> bindParam(":usuario",$datosModel["usuarioActual"],PDO::PARAM_STR);
    if($stmt -> execute()){
        return "ok";
    }else{
        return "Error";
    }    
    }
}