<?php
require '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $ingredientes = $_POST['ingredientes'];
    $url_imagem = $_POST['url_imagem'];

    try {
        // Atualizar os dados do bolo
        $stmt = $pdo->prepare("UPDATE bolos SET nome = ?, descricao = ?, ingredientes = ?, url_imagem = ? WHERE id = ?");
        $stmt->execute([$nome, $descricao, $ingredientes, $url_imagem, $id]);
        header("Location: gerenciar_bolos.php");
        exit;
    } catch (PDOException $e) {
        die("Erro ao editar bolo: " . $e->getMessage());
    }
} else {
    $id = $_GET['id'];
    try {
        // Buscar dados do bolo para edição
        $stmt = $pdo->prepare("SELECT * FROM bolos WHERE id = ?");
        $stmt->execute([$id]);
        $bolo = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$bolo) {
            die("Bolo não encontrado.");
        }
    } catch (PDOException $e) {
        die("Erro ao buscar bolo: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Bolo</title>
    <link rel="stylesheet" href="/projeto-bolos/public/style.css">
</head>
<body>
<header>
    <h1>Editar Bolo</h1>
    <nav>
        <a href="gerenciar_bolos.php">Voltar</a>
    </nav>
</header>
<main>
    <form action="editar_bolo.php" method="POST">
        <input type="hidden" name="id" value="<?= $bolo['id'] ?>">

        <label for="nome">Nome do Bolo:</label>
        <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($bolo['nome']) ?>" required>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" rows="4" required><?= htmlspecialchars($bolo['descricao']) ?></textarea>

        <label for="ingredientes">Ingredientes:</label>
        <textarea id="ingredientes" name="ingredientes" rows="3" required><?= htmlspecialchars($bolo['ingredientes']) ?></textarea>

        <label for="url_imagem">URL da Imagem:</label>
        <input type="text" id="url_imagem" name="url_imagem" value="<?= htmlspecialchars($bolo['url_imagem']) ?>" required>

        <button type="submit">Salvar Alterações</button>
    </form>
</main>
<footer>
    <p>&copy; <?= date('Y'); ?> Coisas de Painho. Todos os direitos reservados.</p>
</footer>
</body>
</html>
