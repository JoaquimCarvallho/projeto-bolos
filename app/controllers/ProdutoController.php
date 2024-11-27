<?php
require_once 'app/models/Produto.php';

class ProdutoController {
    private $produtoModel;

    public function __construct($pdo) {
        $this->produtoModel = new Produto($pdo);
    }

    public function show($id) {
        $produto = $this->produtoModel->getById($id);
        if (!$produto) {
            die("Produto não encontrado!");
        }
        require 'app/views/produto.php';
    }
}
?>
