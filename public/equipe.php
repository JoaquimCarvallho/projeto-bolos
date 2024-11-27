<?php 
require '../config/database.php';
require '../app/views/layouts/header.php';

// Buscar os funcionários no banco de dados, incluindo a função
$stmt = $pdo->query("SELECT nome_usuario, funcao, foto_perfil FROM funcionarios");
$funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nossa Equipe</title>
    <link rel="stylesheet" href="/projeto-bolos/public/css/equipe.css">
</head>
<body>
<main>
    <section class="nossa-equipe">
        <h1>Conheça Nossa Equipe</h1>
        <div class="equipe-grid">
            <?php foreach ($funcionarios as $funcionario): ?>
                <div class="equipe-card">
                    <img src="<?= $funcionario['foto_perfil'] ?: '/projeto-bolos/public/img/default-avatar.png' ?>" alt="<?= htmlspecialchars($funcionario['nome_usuario']) ?>">
                    <h3><?= htmlspecialchars($funcionario['nome_usuario']) ?></h3>
                    <p><?= htmlspecialchars($funcionario['funcao'] ?: 'Função não informada') ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>
<?php require '../app/views/layouts/footer.php'; ?>
</body>
</html>
