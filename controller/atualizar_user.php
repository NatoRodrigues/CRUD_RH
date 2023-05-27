<?php
include "../functions/list_functions.php";
include "../functions/update_functions.php";

function atualizarUsuarioLocalmente($cpf, $nome, $email, $endereco, $telefone, $cargo, $departamento)
{
    // Obtendo a lista de usuários
    $usuarios = lista_user();

    // Encontrando o usuário correspondente pelo CPF
    $usuarioEncontrado = null;
    foreach ($usuarios as &$usuario) {
        if ($usuario['cpf'] === $cpf) {
            $usuarioEncontrado = &$usuario;
            break;
        }
    }

    // Verifica se o usuário foi encontrado
    if ($usuarioEncontrado) {
        // Atualiza os dados do usuário
        $usuarioEncontrado['nome'] = $nome;
        $usuarioEncontrado['email'] = $email;
        $usuarioEncontrado['endereco'] = $endereco;
        $usuarioEncontrado['telefone'] = $telefone;
        $usuarioEncontrado['cargo'] = $cargo;
        $usuarioEncontrado['departamento'] = $departamento;

        // TODO: Salvar a lista atualizada de usuários (pode ser em um arquivo, em uma sessão, em um banco de dados, etc.)

        return true; // Indica que a atualização foi bem-sucedida
    }

    return false; // Indica que o usuário não foi encontrado
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica se os dados do formulário foram enviados via POST
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $cargo = $_POST['cargo'];
    $departamento = $_POST['departamento'];

    $atualiza = true;
    if ($atualiza) {
        echo 'Usuário atualizado com sucesso.';
    } else {
        echo 'Usuário não encontrado.';
    }
}

?>
