<?php
class Usuario {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function crear($nombre, $email) {
        $sql = "INSERT INTO usuarios (nombre, email) VALUES (:nombre, :email)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['nombre' => $nombre, 'email' => $email]);
    }

    public function listar() {
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizar($id, $nombre, $email) {
        $sql = "UPDATE usuarios SET nombre = :nombre, email = :email WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['nombre' => $nombre, 'email' => $email, 'id' => $id]);
    }

    public function eliminar($id) {
        $sql = "DELETE FROM usuarios WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}
?>