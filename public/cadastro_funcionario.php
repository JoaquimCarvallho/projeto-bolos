<?php
require '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome_usuario = $_POST['nome_usuario'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $foto_perfil = $_POST['foto_perfil'];
    $funcao = $_POST['funcao'];

    try {
        // Verificar se o nome de usuário já existe
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM funcionarios WHERE nome_usuario = ?");
        $stmt->execute([$nome_usuario]);
        $existe = $stmt->fetchColumn();

        if ($existe) {
            // Nome de usuário já existe
            $erro = "O nome de usuário '{$nome_usuario}' já está em uso. Por favor, escolha outro.";
        } else {
            // Inserir o novo funcionário no banco de dados
            $stmt = $pdo->prepare("INSERT INTO funcionarios (nome_usuario, senha, foto_perfil, funcao) VALUES (?, ?, ?, ?)");
            $stmt->execute([$nome_usuario, $senha, $foto_perfil, $funcao]);

            // Redirecionar para a página de administração
            header("Location: admin.php");
            exit;
        }
    } catch (PDOException $e) {
        // Exibir mensagem de erro em caso de exceção
        $erro = "Erro ao cadastrar funcionário: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Funcionário</title>
    <link rel="stylesheet" href="/projeto-bolos/public/style.css">
</head>
<body>
<header>
    <h1>Coisas de Painho</h1>
    <nav>
        <a href="/projeto-bolos/public/index.php">Home</a>
        <a href="/projeto-bolos/public/admin.php">Administração</a>
    </nav>
</header>
<main>
    <h2>Cadastrar Funcionário</h2>
    <form action="" method="POST">
        <?php if (isset($erro)): ?>
            <p style="color: red;"><?= htmlspecialchars($erro) ?></p>
        <?php endif; ?>

        <label for="nome_usuario">Nome de Usuário:</label>
        <input type="text" id="nome_usuario" name="nome_usuario" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <label for="foto_perfil">URL da Foto de Perfil:</label>
        <input type="text" id="foto_perfil" name="foto_perfil" required>

        <label for="funcao">Função:</label>
        <input type="text" id="funcao" name="funcao" required>

        <button type="submit">Cadastrar Funcionário</button>
    </form>
</main>
<footer>
    <p>&copy; 2024 Coisas de Painho. Todos os direitos reservados.</p>
</footer>
</body>
</html>
