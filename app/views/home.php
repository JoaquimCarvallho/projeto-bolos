<?php require 'layouts/header.php'; ?>

<section class="title-banner">
    <h1>Bolos</h1>
    <p>Deliciosamente recheados e criados para todas as ocasiões.</p>
</section>

<section class="categorias">
    <h2>Selecione a categoria:</h2>
    <div>
        <a href="/?categoria=1">Chocolate</a>
        <a href="/?categoria=2">Zero Açúcar</a>
        <a href="/?categoria=3">Bolos Caseiros</a>
    </div>
</section>

<section class="produtos">
    <h2>Nossos Bolos</h2>
    <div class="grid">
        <?php foreach ($produtos as $produto): ?>
            <div class="card">
                <img src="<?= $produto['imagem']; ?>" alt="<?= $produto['nome']; ?>">
                <h3><?= $produto['nome']; ?></h3>
                <p><?= $produto['descricao']; ?></p>
                <a href="/produto.php?id=<?= $produto['id']; ?>">Ver mais</a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<?php require 'layouts/footer.php'; ?>
