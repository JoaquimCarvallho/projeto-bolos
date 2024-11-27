<?php
require '../config/database.php';
require '../app/views/layouts/header.php';

// Puxar bolos do banco de dados
$stmt = $pdo->query("SELECT * FROM bolos");
$bolos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!-- Título e banner -->
<section>
    <div class="title-banner">
        <h1>Coisas de Painho</h1>
        <p>Deliciosamente recheados e criados para todas as ocasiões.</p>
    </div>
    
    <!--<div class="categorias">
        <a href="#">Chocolate</a>
        <a href="#">Zero Açúcar</a>
        <a href="#">Bolos Caseiros</a>
    </div>-->
</section>

<!-- Carrossel -->
<section class="produtos">
    <h2>Nossos Bolos</h2>
    <div class="carrossel">
        <?php foreach ($bolos as $bolo): ?>
            <div class="card">
                <img src="<?= $bolo['url_imagem'] ?>" alt="<?= $bolo['nome'] ?>">
                <h3><?= $bolo['nome'] ?></h3>
                <p><?= substr($bolo['descricao'], 0, 50) ?>...</p>
                <a href="detalhes_bolo.php?id=<?= $bolo['id'] ?>" class="button">Ver Mais</a>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<!-- Adicionar Slick Carousel -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick-theme.css">
<link rel="stylesheet" href="/projeto-bolos/public/css/carrossel.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel/slick/slick.min.js"></script>
<script>
    $(document).ready(function(){
        $('.carrossel').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            dots: true,
            arrows: true,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>
<?php require '../app/views/layouts/footer.php'; ?>