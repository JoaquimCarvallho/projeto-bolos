<?php
require '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome_usuario'];
    $funcao = $_POST['funcao'];
    $foto = $_POST['foto_perfil'];

    try {
        $stmt = $pdo->prepare("UPDATE funcionarios SET nome_usuario = ?, funcao = ?, foto_perfil = ? WHERE id = ?");
        $stmt->execute([$nome, $funcao, $foto, $id]);
        header("Location: admin.php");
        exit;
    } catch (PDOException $e) {
        echo "Erro ao atualizar funcionário: " . $e->getMessage();
    }
}
?>
