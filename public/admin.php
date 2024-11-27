<?php
session_start();
if (!isset($_SESSION['nome_usuario'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração - Coisas de Painho</title>
    <link rel="stylesheet" href="/projeto-bolos/public/style.css">
    <script>
        function showTab(tabId) {
            const tabs = document.querySelectorAll('.tab-content');
            tabs.forEach(tab => tab.style.display = 'none');
            document.getElementById(tabId).style.display = 'block';
        }
    </script>
</head>
<body>
<header>
    <h1>Painel de Administração</h1>
    <nav>
        <a href="/projeto-bolos/public/index.php">Home</a>
        <a href="/projeto-bolos/public/logout.php" class="nav-right">Sair</a>
    </nav>
</header>
<main>
<div class="tabs">
    <button class="tab-button" onclick="showTab('cadastro-bolos')">Cadastro de Bolos</button>
    <button class="tab-button" onclick="window.location.href='/projeto-bolos/public/gerenciar_bolos.php'">Gerenciar Bolos</button>
    <button class="tab-button" onclick="showTab('cadastro-funcionarios')">Cadastro de Funcionários</button>
    <button class="tab-button" onclick="showTab('gerenciar-equipe')">Gerenciar Equipe</button>
</div>


    <!-- Cadastro de Bolos -->
    <div class="tab-content" id="cadastro-bolos" style="display: none;">
        <h2>Cadastro de Bolos</h2>
        <form action="/projeto-bolos/public/cadastro_bolos.php" method="POST">
            <label for="nome_bolo">Nome do Bolo:</label>
            <input type="text" id="nome_bolo" name="nome_bolo" required>

            <label for="url_imagem">URL da Imagem:</label>
            <input type="text" id="url_imagem" name="url_imagem" required>

            <label for="descricao">Descrição:</label>
            <textarea id="descricao" name="descricao" rows="4" required></textarea>

            <label for="ingredientes">Ingredientes:</label>
            <textarea id="ingredientes" name="ingredientes" rows="3" required></textarea>

            <button type="submit">Cadastrar Bolo</button>
        </form>
    </div>

    <!-- Cadastro de Funcionários -->
    <div class="tab-content" id="cadastro-funcionarios" style="display: none;">
        <h2>Cadastro de Funcionários</h2>
        <form action="/projeto-bolos/public/cadastro_funcionario.php" method="POST">
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
    </div>

    <!-- Gerenciar Equipe (com Modal) -->
    <div class="tab-content" id="gerenciar-equipe" style="display: none;">
        <h2>Gerenciar Equipe</h2>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Função</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require '../config/database.php';
                $stmt = $pdo->query("SELECT * FROM funcionarios");
                while ($funcionario = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= htmlspecialchars($funcionario['nome_usuario']) ?></td>
                        <td><?= htmlspecialchars($funcionario['funcao']) ?></td>
                        <td>
                            <!-- Botão de edição -->
                            <button class="editar-funcionario" 
                                    data-id="<?= $funcionario['id'] ?>" 
                                    data-nome="<?= htmlspecialchars($funcionario['nome_usuario']) ?>" 
                                    data-funcao="<?= htmlspecialchars($funcionario['funcao']) ?>" 
                                    data-foto="<?= htmlspecialchars($funcionario['foto_perfil']) ?>">
                                Editar
                            </button>
                            <!-- Botão de exclusão -->
                            <a href="excluir_funcionario.php?id=<?= $funcionario['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</main>

<!-- Modal para Edição de Funcionários -->
<div id="modal-editar" class="modal" style="display: none;">
    <div class="modal-content">
        <h2>Editar Funcionário</h2>
        <form id="form-editar" method="POST" action="editar_funcionario.php">
            <input type="hidden" name="id" id="edit-id">

            <label for="edit-nome">Nome:</label>
            <input type="text" name="nome_usuario" id="edit-nome" required>

            <label for="edit-funcao">Função:</label>
            <input type="text" name="funcao" id="edit-funcao" required>

            <label for="edit-foto">Foto de Perfil (URL):</label>
            <input type="text" name="foto_perfil" id="edit-foto" required>

            <button type="submit">Salvar Alterações</button>
            <button type="button" id="fechar-modal">Cancelar</button>
        </form>
    </div>
</div>

<script>
    document.querySelectorAll('.editar-funcionario').forEach(button => {
        button.addEventListener('click', () => {
            const id = button.dataset.id;
            const nome = button.dataset.nome;
            const funcao = button.dataset.funcao;
            const foto = button.dataset.foto;

            document.getElementById('edit-id').value = id;
            document.getElementById('edit-nome').value = nome;
            document.getElementById('edit-funcao').value = funcao;
            document.getElementById('edit-foto').value = foto;

            document.getElementById('modal-editar').style.display = 'flex';
        });
    });

    document.getElementById('fechar-modal').addEventListener('click', () => {
        document.getElementById('modal-editar').style.display = 'none';
    });

    document.addEventListener('DOMContentLoaded', () => {
        showTab('cadastro-bolos');
    });
</script>

<footer>
    <p>&copy; <?= date('Y'); ?> Coisas de Painho. Todos os direitos reservados.</p>
</footer>

</body>
</html>
