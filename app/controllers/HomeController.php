<?php
require_once __DIR__ . '/../models/Produto.php'; // Caminho correto para incluir o arquivo Produto.php

class HomeController {
    private $produtoModel;

    public function __construct($pdo) {
        $this->produtoModel = new Produto($pdo);
    }

    public function index() {
        $produtos = $this->produtoModel->getAll();
        require __DIR__ . '/../views/home.php'; // Ajustado para o caminho correto da view
    }

    public function search() {
        $query = filter_input(INPUT_GET, 'q', FILTER_SANITIZE_STRING);
        $produtos = $this->produtoModel->search($query);
        require __DIR__ . '/../views/home.php'; // Ajustado para o caminho correto da view
    }
}
?>
