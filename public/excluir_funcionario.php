<?php
require '../config/database.php';

// Verifica se o ID do funcionário foi passado
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); 

    try {
        // Deleta o querido funcionario
        $stmt = $pdo->prepare("DELETE FROM funcionarios WHERE id = ?");
        $stmt->execute([$id]);

        // Redireciona para a página de administração após excluir
        header("Location: admin.php");
        exit;
    } catch (PDOException $e) {
        // Exibe uma mensagem de erro caso a exclusão falhe
        echo "Erro ao excluir funcionário: " . $e->getMessage();
    }
} else {
    // Redireciona para a página de administração se nenhum ID foi fornecido
    header("Location: admin.php");
    exit;
}
?>
