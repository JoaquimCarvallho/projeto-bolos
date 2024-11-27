<?php
require '../config/database.php';

$id = $_GET['id'];

try {
    $stmt = $pdo->prepare("DELETE FROM bolos WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: gerenciar_bolos.php");
    exit;
} catch (PDOException $e) {
    die("Erro ao excluir bolo: " . $e->getMessage());
}
?>
