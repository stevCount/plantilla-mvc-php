<?php /* copyright© Jhon S. Vique */


class IndexModel{


    protected $_conexion;

    function __construct(){
        try{
            $this->_conexion = new DataBase();

        }catch(Exception $e){
            die();
        }
    }
	
	public function listarInformacion(){
        try {
            $this->_conexion->consult("SELECT * FROM informacion");
            $this->_conexion->execute();
            
            return $this->_conexion->showAll();
        } catch (Exception $e) {
            die($e);
        }
    }

    public function listarInformacionParametro($estado){
        try {
            $this->_conexion->consult("SELECT * FROM informacion WHERE estado = :estado");
            $this->_conexion->bind(":estado",$estado,PDO::PARAM_STR);
            $this->_conexion->execute();
            return $this->_conexion->showAll();
        } catch (Exception $e) {
            die($e);
        }
    }

    public function agregarDatos($datos){
        if(!empty($datos)){
            foreach ($datos as $valDatos) {
                try {
                    $this->_conexion->consult("INSERT INTO informacion (texto,fecha,estado,correo) VALUES (:texto,:fecha,:estado,:correo)");
                    $this->_conexion->bindParam(":texto",$valDatos['texto']);
                    $this->_conexion->bindParam(":fecha",$valDatos['fecha']);
                    $this->_conexion->bindParam(":estado",$valDatos['estado']);
                    $this->_conexion->bindParam(":correo",$valDatos['correo']);
                    return $this->_conexion->execute();
                } catch (Exception $e) {
                    die($e);
                }
            }
        }
        return false;
    }

    public function actualizarDatos($datos){
        if(!empty($datos)){
            foreach ($datos as $valDatos) {
                try {
                    $this->_conexion->consult("UPDATE informacion SET texto = :texto , fecha = :fecha, estado = :estado, correo = :correo where id = :id");
                    $this->_conexion->bindParam(":id",$valDatos['id']);
                    $this->_conexion->bindParam(":texto",$valDatos['texto']);
                    $this->_conexion->bindParam(":fecha",$valDatos['fecha']);
                    $this->_conexion->bindParam(":estado",$valDatos['estado']);
                    $this->_conexion->bindParam(":correo",$valDatos['correo']);
                    return $this->_conexion->execute();
                } catch (Exception $e) {
                    die($e);
                }
            }
        }
        return false;
    }

    public function borrarDatos($datos){
        if(!empty($datos)){
            foreach ($datos as $valDatos) {
                try {
                    $this->_conexion->consult("DELETE FROM informacion where id = :id");
                    $this->_conexion->bind(":id",$valDatos['id'],PDO::PARAM_INT);
                    return $this->_conexion->execute();
                } catch (Exception $e) {
                    die($e);
                }
            }
        }
        return false;
    }
}
?> 