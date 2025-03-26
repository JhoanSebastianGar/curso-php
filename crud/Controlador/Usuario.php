<?php
require_once '../config/Conexion.php';
require_once '../Modelo/Usuario.php';

class UsuarioController {
    private $usuario;

    public function __construct($pdo) {
        $this->usuario = new Usuario($pdo);
    }

    public function crear() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $this->usuario->crear($nombre, $email);
            header("Location: listar.php");
        }
    }

    public function listar() {
        return $this->usuario->listar();
    }

    public function actualizar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $this->usuario->actualizar($id, $nombre, $email);
            header("Location: listar.php");
        }
    }

    public function eliminar($id) {
        $this->usuario->eliminar($id);
        header("Location: listar.php");
    }
}
?>