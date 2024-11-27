<?php
require '../config/database.php';

try {
    // Consultar bolos no banco de dados
    $stmt = $pdo->query("SELECT id, nome, descricao, ingredientes, url_imagem FROM bolos");
    $bolos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro ao buscar bolos: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Bolos</title>
    <link rel="stylesheet" href="/projeto-bolos/public/style.css">
</head>
<body>
<header>
    <h1>Gerenciar Bolos</h1>
    <nav>
        <a href="/projeto-bolos/public/admin.php">Voltar ao Painel</a>
    </nav>
</header>
<main>
    <h2>Gerenciar Bolos</h2>
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ingredientes</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bolos as $bolo): ?>
                <tr>
                    <td><?= htmlspecialchars($bolo['nome']) ?></td>
                    <td><?= htmlspecialchars(substr($bolo['descricao'], 0, 50)) ?>...</td>
                    <td><?= htmlspecialchars(substr($bolo['ingredientes'], 0, 50)) ?>...</td>
                    <td>
                        <a href="editar_bolo.php?id=<?= $bolo['id'] ?>">Editar</a>
                        <a href="excluir_bolo.php?id=<?= $bolo['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este bolo?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</main>
<footer>
    <p>&copy; <?= date('Y'); ?> Coisas de Painho. Todos os direitos reservados.</p>
</footer>
</body>
</html>
