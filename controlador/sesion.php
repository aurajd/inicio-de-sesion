<?php
require_once __DIR__.'/../modelo/sesion.php';

class sesionController {

    
    public $titulo;
    public $modelo;
    public $view;

    public function __construct() {
        $this->modelo = new sesionModel();
        $this->view = "inicio_sesion";
        $this->titulo = "Inicio de sesion";
    }

    function inicio_sesion(){
        $nombre = $_POST["nombre"];
        $pw = $_POST["pw"];
        if($this->validar($nombre,$pw)){
            if($this->modelo->comprobar_usuario($nombre,$pw)){
                $this->redirigir_perfil($_SESSION["perfil"]);
            } else {
                $_GET["error"] = $this->modelo->error;
            }
        }
    }

    function validar($nombre, $pw){
        if(empty($nombre)||empty($pw)){
            $_GET["error"] = "Debes rellenar el nombre y la contraseña";
            return false;
        }
        return true;
    }

    function redirigir_perfil($perfil){
        switch ($perfil) {
            case 's':
                header('Location: index.php?controller=admin');
                break;
            case 'am':
                header('Location: index.php?controller=admin_minijuego');
                break;
        }
    }

    function cerrar_sesion(){
        $_SESSION = array();
    }

}
?>