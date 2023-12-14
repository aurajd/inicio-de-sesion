<?php

require_once __DIR__.'/../modelo/instalacion.php';

class instalacionController {

    public $titulo;
    public $view;
    public $modelo;

    public function __construct() {
        $this->view = "instalacion";
        $this->titulo = "Instalación";
        $this->modelo = new instalacionModel();
        $this->comprobar_existe_admin();
    }

    function comprobar_existe_admin(){
        if($this->modelo->comprobar_admin()){
            $this->view = "inicio_sesion";
            $this->titulo = "Inicio de sesion";
            return true;
        }
        return false;
    }

    function registrar_admin(){
        if(!$this->comprobar_existe_admin()){
            $nombre = $_POST["nombre"];
            $correo = $_POST["correo"];
            $pw = $_POST["pw"];
            if($this->validar_campos($nombre,$correo,$pw)){
                $resultado = $this->modelo->registrar_admin($nombre,$correo,$pw);
                if($resultado){
                    $this->view = "inicio_sesion";
                    $this->titulo = "Inicio de sesion";
                } else {
                    $_GET["error"] = $this->modelo->error;
                }
            }
        }
    }

    function validar_campos($nombre,$correo,$pw){
        if(empty($nombre)||empty($correo)||empty($pw)){
            $_GET["error"] = "Debes rellenar el correo, el nombre y la contraseña";
            return false;
        }
        return true;
    }

}
?>