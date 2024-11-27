<?php
require '../config/database.php';
require '../app/views/layouts/header.php';

// Consulta ao banco de dados para buscar os bolos
$stmt = $pdo->query("SELECT * FROM bolos");
$bolos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<section class="produtos">
    <h2>Catálogo de Bolos</h2>
    <div class="catalogo-grid">
        <?php foreach ($bolos as $bolo): ?>
            <div class="bolo-box">
                <a href="detalhes_bolo.php?id=<?= $bolo['id'] ?>">
                    <img src="<?= $bolo['url_imagem'] ?>" alt="<?= $bolo['nome'] ?>">
                </a>
                <h3>#<?= $bolo['id'] ?> <?= $bolo['nome'] ?></h3>
                <a href="detalhes_bolo.php?id=<?= $bolo['id'] ?>" class="button">Ver Mais</a>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<link rel="stylesheet" href="/projeto-bolos/public/css/catalogo.css">

<?php require '../app/views/layouts/footer.php'; ?>
