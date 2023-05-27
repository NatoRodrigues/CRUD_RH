<?php
session_start();

include "../view/header.php";
include "../functions/delete_functions.php";
include "../functions/list_functions.php";
include "../model/conn.php";

// Verifique se o formulário de exclusão foi enviado
if (isset($_GET['cpf'])) {
    $cpf = $_GET['cpf'];

    // Exiba a mensagem de sucesso ou erro após a exclusão
    if (deleta_user($cpf)) {
        $_SESSION['delete_success_message'] = "Usuário deletado com sucesso.";
    } else {
        $_SESSION['delete_error_message'] = "Erro ao deletar o usuário.";
    }

    // Redirecione para a página de exclusão
    header("Location: ../view/delete.php");
    exit();
}


?>
