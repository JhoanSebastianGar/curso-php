<?php
require_once '../config/Conexion.php';
require_once '../Modelo/Usuario.php';

class UsuarioController {
    private $usuario;
        public function __construct($pdo) {
        $this->usuario = new Usuario($pdo);
    }

    public function crear($data) {
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = $data['nombre'];
            $email = $data['email'];
            return $this->usuario->crear($nombre, $email);
        }
    }
    
        public function listar() {
             return print(json_encode($this->usuario->listar()));
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

    public function eliminar($data) {
        $id = $data['id'];
        $this->usuario->eliminar($id);
        //header("Location: listar.php");
    }
}
$data=json_decode(file_get_contents('php://input'), true);
$action=$_GET["Action"];
$usuario= new UsuarioController($pdo);
$usuario->$action($data);

?>