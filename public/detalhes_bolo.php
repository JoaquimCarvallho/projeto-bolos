<?php
require '../config/database.php';
require '../app/views/layouts/header.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$id) {
    header("Location: index.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM bolos WHERE id = :id");
$stmt->execute(['id' => $id]);
$bolo = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$bolo) {
    header("Location: index.php");
    exit;
}
?>
<section>
    <h2><?= $bolo['nome'] ?></h2>
    <div class="detalhes">
        <img src="<?= $bolo['url_imagem'] ?>" alt="<?= $bolo['nome'] ?>">
        <div>
            <p><strong>Descrição:</strong> <?= $bolo['descricao'] ?></p>
            <p><strong>Ingredientes:</strong> <?= $bolo['ingredientes'] ?></p>
        </div>
    </div>
</section>
<?php require '../app/views/layouts/footer.php'; ?>
