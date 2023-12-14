<?php
require_once __DIR__.'/conexion.php';
class adminModel extends Conexion{

    private $tabla;
    private $id;
    private $correo;
    private $pw;
    private $nombre;
    private $perfil;
    public $error;

    public function __construct() {
        parent::__construct();
        $this->tabla = "admin";
        $this->id = "id";
        $this->correo = "correo";
        $this->pw = "pw";
        $this->nombre = "nombre";
        $this->perfil = "perfil";
    }

    function registrar_admin($nombre,$correo,$pw){
        try{
            $sql = "insert into ".$this->tabla." values
            (default,?,?,?,'am');";
            $stmt = $this->conexion->prepare($sql);
            $pwhash = password_hash($pw, PASSWORD_DEFAULT);
            $stmt->bind_param('sss',$correo,$pwhash,$nombre);
            $stmt->execute();
            return true;
        }catch (mysqli_sql_exception $e) {
            if($e->getCode()==1406)
                $this->error = "Uno de los campos supera el límite de carácteres.";
            if($e->getCode()==1062)
                $this->error = "Ya existe un usuario con ese nombre o correo.";
            return false;
        }finally {
            $stmt->close();
        }
}
}