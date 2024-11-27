<?php
require '../app/views/layouts/header.php'; // Inclui o cabeçalho
?>

<main>
    <div class="contact-page">
        <h1>CONTATO</h1>
        <h2>ENTRAR EM CONTATO</h2>
        <div class="contact-container">
            <form action="enviar_contato.php" method="POST">
                <label for="name">Seu Nome</label>
                <input type="text" id="name" name="name" placeholder="Digite seu nome" required>

                <label for="email">Seu E-mail</label>
                <input type="email" id="email" name="email" placeholder="Digite seu e-mail" required>

                <label for="message">Sua Mensagem</label>
                <textarea id="message" name="message" rows="5" placeholder="Digite sua mensagem" required></textarea>

                <button type="submit">Enviar</button>
            </form>
            <div class="contact-info">
                <p>Email: contato@coisasdepainho.com</p>
                <p>Telefone: (11) 99999-9999</p>
            </div>
        </div>
    </div>
</main>

<?php
require '../app/views/layouts/footer.php'; // Inclui o rodapé
?>
