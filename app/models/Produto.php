<?php
class Produto {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function getAll() {
        $stmt = $this->db->query("SELECT * FROM produtos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM produtos WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function search($query) {
        $stmt = $this->db->prepare("SELECT * FROM produtos WHERE nome LIKE :query OR descricao LIKE :query");
        $stmt->execute(['query' => "%$query%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getByCategory($categoryId) {
        $stmt = $this->db->prepare("
            SELECT p.* FROM produtos p
            JOIN produto_categoria pc ON p.id = pc.produto_id
            WHERE pc.categoria_id = :categoryId
        ");
        $stmt->execute(['categoryId' => $categoryId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
