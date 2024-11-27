<?php
require '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_bolo = $_POST['nome_bolo'];
    $url_imagem = $_POST['url_imagem'];
    $descricao = $_POST['descricao'];
    $ingredientes = $_POST['ingredientes'];

    try {
        $stmt = $pdo->prepare("INSERT INTO bolos (nome, url_imagem, descricao, ingredientes) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nome_bolo, $url_imagem, $descricao, $ingredientes]);
        header("Location: admin.php");
        exit;
    } catch (PDOException $e) {
        echo "Erro ao cadastrar bolo: " . $e->getMessage();
    }
}
?>
