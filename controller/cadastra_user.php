
<?php
session_start();
require "../functions/create_functions.php";
require "../model/conn.php";

$erros = cadastra_user(); // Chama a função cadastra_user() e obtém os erros retornados

if (!empty($erros)) {
    // Inicia a sessão
    session_start();

    // Armazena as mensagens de erro na sessão
    $_SESSION['create_error_message'] = $erros;

    // Redireciona de volta para a página create.php
    header("Location: ../view/create.php");
    exit;
} else {
    // Realiza o cadastro do usuário
    cadastra_user(); // Chamada da função novamente para cadastrar o usuário

    // Inicia a sessão
    session_start();

    // Armazena a mensagem de sucesso na sessão
    $_SESSION['create_success_message'] = 'Formulário enviado com sucesso.';

    // Redireciona para a página de sucesso
    header("Location: ../view/create.php?success=true");
    exit;
}
?>
