<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário
    $nome = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $mensagem = htmlspecialchars($_POST['message']);

    // Configurações do e-mail
    $to = 'joaquimribeiro028@hotmail.com'; // O e-mail real que receberá a mensagem
    $subject = "Nova mensagem de $nome - Coisas de Painho";
    $body = "Você recebeu uma nova mensagem através do formulário de contato do site.\n\n" .
            "Nome: $nome\n" .
            "E-mail: $email\n\n" .
            "Mensagem:\n$mensagem";
    $headers = "From: contato@coisasdepainho.com\r\n" .
               "Reply-To: $email\r\n" .
               "Content-Type: text/plain; charset=UTF-8";

    // Tenta enviar o e-mail, mas só tenta mesmo pq essa parte não foi feita! 
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Mensagem enviada com sucesso!'); window.location.href='/projeto-bolos/public/contato.php';</script>";
    } else {
        echo "<script>alert('Erro ao enviar a mensagem. Tente novamente.'); window.location.href='/projeto-bolos/public/contato.php';</script>";
    }
} else {
    // Redireciona se o acesso ao arquivo for direto (não via POST)
    header('Location: /projeto-bolos/public/contato.php');
    exit;
}
?>
