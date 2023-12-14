<?php

require_once __DIR__.'/../modelo/admin.php';

class adminController {

    
    public $titulo;
    public $view;
    public $modelo;

    public function __construct() {
        $this->view = "admin";
        $this->titulo = "SUPER ADMIN";
        $this->modelo = new adminModel();
    }

    function mostrar_registro(){
        $this->view = "registro_admin";
        $this->titulo = "Registro administradores";
    }

    function registrar_admin(){
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $pw = $_POST["pw"];
        if($this->validar_campos($nombre,$correo,$pw)){
            $resultado = $this->modelo->registrar_admin($nombre,$correo,$pw);
            if($resultado){
                $this->view = "admin";
                $this->titulo = "SUPER ADMIN";
                $_GET["exito"] = "Administrador añadido con éxito";
            } else {
                $_GET["error"] = $this->modelo->error;
                $this->view = "registro_admin";
                $this->titulo = "Registro administradores";
            }
        } else{
            $this->view = "registro_admin";
            $this->titulo = "Registro administradores";
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