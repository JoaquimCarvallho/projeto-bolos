<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coisas de Painho</title>
    <link rel="stylesheet" href="/projeto-bolos/public/style.css">
</head>
<body>
<header id="dynamic-header">
    <h1>Coisas de Painho</h1>
    <nav>
        <a href="/projeto-bolos/public/index.php">Home</a>
        <a href="/projeto-bolos/public/produto.php">Produtos</a>
        <a href="/projeto-bolos/public/equipe.php">Nossa Equipe</a>
        <a href="/projeto-bolos/public/contato.php">Contato</a>
        <?php if (isset($_SESSION['nome_usuario'])): ?>
            <a href="/projeto-bolos/public/admin.php">Administração</a>
            <span class="welcome-text">Bem-vindo, <?= htmlspecialchars($_SESSION['nome_usuario']) ?></span>
            <a href="/projeto-bolos/public/logout.php" class="nav-right">Sair</a>
        <?php else: ?>
            <a href="/projeto-bolos/public/login.php" class="nav-right">Entrar</a>
        <?php endif; ?>
    </nav>
</header>

<main>
<script>
    let lastScrollTop = 0;
    const header = document.getElementById('dynamic-header');
    
    window.addEventListener('scroll', () => {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        // Mostrar ou esconder com base na rolagem
        if (scrollTop > lastScrollTop) {
            header.style.transform = 'translateY(-100%)'; // Esconde o cabeçalho
        } else {
            header.style.transform = 'translateY(0)'; // Mostra o cabeçalho
        }
        
        lastScrollTop = scrollTop;
    });

    // Mostrar o cabeçalho ao passar o mouse
    header.addEventListener('mouseenter', () => {
        header.style.transform = 'translateY(0)';
    });

    // Esconder o cabeçalho novamente ao sair, caso não esteja no topo
    header.addEventListener('mouseleave', () => {
        if (window.pageYOffset > 50) {
            header.style.transform = 'translateY(-100%)';
        }
    });
</script>

<style>
    /* Estilo para o cabeçalho dinâmico */
    #dynamic-header {
        position: sticky;
        top: 0;
        z-index: 1000;
        background-color: #fff6f1;
        padding: 10px 0;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }

    #dynamic-header nav {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    #dynamic-header nav a {
        text-decoration: none;
        color: #7f462c;
        font-size: 16px;
        font-weight: bold;
    }
</style>
