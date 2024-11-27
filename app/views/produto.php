<?php require 'layouts/header.php'; ?>

<section class="produto-detalhe">
    <h1><?= $produto['nome']; ?></h1>
    <img src="<?= $produto['imagem']; ?>" alt="<?= $produto['nome']; ?>">
    <p><?= $produto['descricao']; ?></p>
    <p>Preço: R$ <?= number_format($produto['preco'], 2, ',', '.'); ?></p>
</section>

<?php require 'layouts/footer.php'; ?>
