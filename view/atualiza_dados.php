<?php
// form_atualizacao.php
include "header.php";
include "../functions/list_functions.php";
include "../functions/update_functions.php";

// Verificando se há um CPF enviado via GET
if (isset($_GET['cpf'])) {
  // Obtendo o CPF enviado via GET
  $cpfSelecionado = $_GET['cpf'];

  // ...

  // Verificar se o formulário foi enviado (quando o botão "Salvar" é clicado)
  if (isset($_POST['atualizar'])) {
    // Obter os valores atualizados do formulário
    $nomeAtualizado = $_POST['nome'];
    $emailAtualizado = $_POST['email'];
    $enderecoAtualizado = $_POST['endereco'];
    $telefoneAtualizado = $_POST['telefone'];
    $cargoAtualizado = $_POST['cargo'];
    $departamentoAtualizado = $_POST['departamento'];

    // Obter a conexão com o banco de dados
    require "../model/conn.php";

    // Chamar a função atualizarUsuario para atualizar os dados no banco de dados
    $resultadoAtualizacao = atualizarUsuario($cpfSelecionado, $nomeAtualizado, $emailAtualizado, $enderecoAtualizado, $telefoneAtualizado, $cargoAtualizado, $departamentoAtualizado, $pdo);

    if ($resultadoAtualizacao === "Usuário atualizado com sucesso.") {
      // Exibir mensagem de sucesso
      echo '<div class="container mt-4">';
      echo '<div class="alert alert-success" role="alert">Dados atualizados com sucesso!</div>';
      echo '</div>';
    } else {
      // Exibir mensagem de erro
      echo '<div class="container mt-4">';
      echo '<div class="alert alert-danger" role="alert">Erro ao atualizar o usuário: ' . $resultadoAtualizacao . '</div>';
      echo '</div>';
    }
  }

  // Obter a conexão com o banco de dados
  require "../model/conn.php";

  // Selecionar o usuário com base no CPF
  $dadosFuncionario = busca_CPF($cpfSelecionado, $pdo);

  // Verificar se o usuário foi encontrado no banco de dados
  if ($dadosFuncionario !== null) {
    // Exibir o formulário de edição dos dados do funcionário
    echo '<div class="container mt-4">';
    echo '<h1>Editar Informações do Funcionário</h1>';
    echo '<form action="#" method="POST">';
    echo '<div class="row mb-3">';
    echo '<div class="col-md-6">';
    echo '<label for="nome" class="form-label">Nome</label>';
    echo '<input type="text" class="form-control" id="nome" name="nome" value="' . $dadosFuncionario['nome'] . '">';
    echo '</div>';
    echo '<div class="col-md-6">';
    echo '<label for="email" class="form-label">E-mail</label>';
    echo '<input type="email" class="form-control" id="email" name="email" value="' . $dadosFuncionario['email'] . '">';
    echo '</div>';
    echo '</div>';
    echo '<div class="row mb-3">';
    echo '<div class="col-md-6">';
    echo '<label for="cpf" class="form-label">CPF</label>';
    echo '<input type="text" class="form-control" id="cpf" name="cpf" value="' . $dadosFuncionario['cpf'] . '" readonly>';
    echo '</div>';
    echo '<div class="col-md-6">';
    echo '<label for="endereco" class="form-label">Endereço</label>';
    echo '<input type="text" class="form-control" id="endereco" name="endereco" value="' . $dadosFuncionario['endereco'] . '">';
    echo '</div>';
    echo '</div>';
    echo '<div class="row mb-3">';
    echo '<div class="col-md-6">';
    echo '<label for="telefone" class="form-label">Telefone</label>';
    echo '<input type="text" class="form-control" id="telefone" name="telefone" value="' . $dadosFuncionario['telefone'] . '">';
    echo '</div>';
    echo '<div class="col-md-6">';
    echo '<label for="cargo" class="form-label">Cargo</label>';
    echo '<input type="text" class="form-control" id="cargo" name="cargo" value="' . $dadosFuncionario['cargo'] . '">';
    echo '</div>';
    echo '</div>';
    echo '<div class="row mb-3">';
    echo '<div class="col-md-12">';
    echo '<label for="departamento" class="form-label">Departamento</label>';
    echo '<input type="text" class="form-control" id="departamento" name="departamento" value="' . $dadosFuncionario['departamento'] . '">';
    echo '</div>';
    echo '</div>';
    echo '<div class="mb-8">';
    echo '  <button type="submit" class="btn btn-success" name="atualizar">Salvar</button>';
   ?> <button type="button" class="btn btn-danger" onclick="window.location.href = './update.php'">Voltar</button><?php
    echo '</div>';
    echo '</form>';
    echo '</div>';
  } else {
    // O usuário não foi encontrado no banco de dados
    echo '<div class="container mt-4">';
    echo '<div class="alert alert-danger" role="alert">Usuário não encontrado.</div>';
    echo '</div>';
  }
} else {
  // O usuário não foi encontrado no banco de dados
  echo '<div class="container mt-4">';
  echo '<div class="alert alert-danger" role="alert">Usuário não encontrado.</div>';
  echo '</div>';
}
?>

<br>
<br>
<div class="wrapper fixed-bottom">
  <footer class="footer py-3">
    <div class="container text-center">
      © 2023 CRUD Básico. Todos os direitos reservados.
    </div>
  </footer>
</div>
