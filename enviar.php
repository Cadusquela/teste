<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dados do formulário
    $nome     = htmlspecialchars($_POST['nome']);
    $email    = htmlspecialchars($_POST['email']);
    $telefone = htmlspecialchars($_POST['telefone']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    // Seu email de destino
    $para = "carlossanbre2005@gmail.com";

    // Assunto do email
    $assunto = "Novo contato de $nome";

    // Corpo do email
    $corpo = "Você recebeu uma nova mensagem do formulário:\n\n";
    $corpo .= "Nome: $nome\n";
    $corpo .= "Email: $email\n";
    $corpo .= "Telefone: $telefone\n";
    $corpo .= "Mensagem:\n$mensagem\n";

    // Cabeçalhos
    $headers  = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();

    // Envio
    if (mail($para, $assunto, $corpo, $headers)) {
        echo "Mensagem enviada com sucesso!";
    } else {
        echo "Erro ao enviar mensagem. Tente novamente.";
    }
} else {
    echo "Acesso inválido.";
}
?>