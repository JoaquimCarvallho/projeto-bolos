<?php
require '../config/database.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_usuario = $_POST['nome_usuario'];
    $senha = $_POST['senha'];

    // Buscar funcionário no banco
    $stmt = $pdo->prepare("SELECT * FROM funcionarios WHERE nome_usuario = ?");
    $stmt->execute([$nome_usuario]);
    $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($funcionario && password_verify($senha, $funcionario['senha'])) {
        $_SESSION['nome_usuario'] = $funcionario['nome_usuario'];
        $_SESSION['foto_perfil'] = $funcionario['foto_perfil'];
        header('Location: /projeto-bolos/public/index.php');
        exit;
    } else {
        $erro = "Nome de usuário ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Coisas de Painho</title>
    <link rel="stylesheet" href="/projeto-bolos/public/style.css">
</head>
<body>
    <header>
        <h1>Coisas de Painho</h1>
    </header>
    <main>
        <div class="login-container">
            <h2>Login</h2>
            <?php if (!empty($erro)): ?>
                <p class="error-message"><?= htmlspecialchars($erro) ?></p>
            <?php endif; ?>
            <form method="post" class="login-form">
                <label for="nome_usuario">Nome de Usuário:</label>
                <input type="text" id="nome_usuario" name="nome_usuario" required>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>

                <button type="submit" class="btn-login">Entrar</button>
            </form>
        </div>
    </main>
    <footer>
        <p>&copy; <?= date('Y'); ?> Coisas de Painho. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
