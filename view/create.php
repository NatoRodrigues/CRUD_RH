

<?php
session_start();

include "header.php";
include "../functions/create_functions.php";


// Verifica se existe uma mensagem de sucesso na sessão
if (isset($_SESSION['create_success_message'])) {
    echo '<div class="alert alert-success id="messages"">' . $_SESSION['success_message'] . '</div>';

    // Remove a mensagem da sessão para que não seja exibida novamente após o refresh da página
    unset($_SESSION['create_success_message']);
}

// Verifica se existe uma mensagem de erro na sessão
if (isset($_SESSION['create_error_message'])) {
    echo '<div class="alert alert-danger" id="messages">';
    foreach ($_SESSION['create_error_message'] as $error) {
        echo $error . '<br>';
    }
    echo '</div>';

    // Remove as mensagens de erro da sessão para que não sejam exibidas novamente após o refresh da página
    unset($_SESSION['create_error_message']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
  <title>Registrar Funcionário</title>
  <style>
    html, body {
      height: 100%;
    }

    .wrapper {
      min-height: 100%;
      display: flex;
      flex-direction: column;
    }

    .content {
      flex: 1;
    }

    .footer {
      background-color: #343a40;
      color: white;
      padding: 10px 0;
    }
  </style>
</head>
<body>
<div class="wrapper">
 <div class="content">
    <div class="container mt-4">
    <h1 class="mt-4">Registrar Funcionário</h1>
    <div class="mensagens-erro">
    </div>
    <form method="POST" action="../controller/cadastra_user.php">
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome" required>
        </div>
        <div class="col-md-6">
          <label for="email" class="form-label">E-mail</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail" required>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="cpf" class="form-label">CPF</label>
          <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite o CPF" required>
    </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="telefone" class="form-label">Telefone</label>
          <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite o telefone" required>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="cep" class="form-label">CEP</label>
          <input type="text" class="form-control" id="cep" name="cep" placeholder="Digite o CEP" required>
        </div>
        <div class="col-md-6">
          <label for="endereco" class="form-label">Endereço</label>
          <input type="text" class="form-control" id="endereco" name="endereco" placeholder="Digite o endereço" required>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="bairro" class="form-label">Bairro</label>
          <input type="text" class="form-control" id="bairro" name="bairro" placeholder="Digite o bairro" required>
        </div>
        <div class="col-md-6">
          <label for="cidade" class="form-label">Cidade</label>
          <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Digite a cidade" required>
        </div>
      </div>
      <div class="row mb-3">
        <div class="col-md-6">
          <label for="estado" class="form-label">Estado</label>
          <input type="text" class="form-control" id="estado" name="UF" placeholder="Digite o estado" required>
        </div>
        <div class="col-md-6">
        <label for="cargo" class="form-label">Cargo</label>
        <select class="form-select" id="cargo" name="cargo" required>
            <option selected>Selecione o cargo</option>
            <optgroup label="Recursos Humanos">
            <option value="analista_rh">Analista de RH</option>
            <option value="gerente_rh">Gerente de RH</option>
            <option value="assistente_rh">Assistente de RH</option>
            </optgroup>
            <optgroup label="Financeiro">
            <option value="analista_financeiro">Analista Financeiro</option>
            <option value="gerente_financeiro">Gerente Financeiro</option>
            <option value="assistente_financeiro">Assistente Financeiro</option>
            </optgroup>
            <optgroup label="Tecnologia da Informação">
            <option value="analista_ti">Analista de TI</option>
            <option value="gerente_ti">Gerente de TI</option>
            <option value="desenvolvedor">Desenvolvedor</option>
            </optgroup>
            <optgroup label="Vendas">
            <option value="representante_vendas">Representante de Vendas</option>
            <option value="gerente_vendas">Gerente de Vendas</option>
            <option value="coordenador_vendas">Coordenador de Vendas</option>
            </optgroup>
        </select>
        </div>
        <div class="col-md-6 mb-2 mt-2">
          <label for="departamento" class="form-label" required>Departamento</label>
          <select class="form-select" id="departamento" name="departamento">
            <option selected>Selecione o departamento</option>
            <option value="rh">Recursos Humanos</option>
            <option value="financeiro">Financeiro</option>
            <option value="ti">Tecnologia da Informação</option>
            <option value="vendas">Vendas</option>
          </select>
        </div>
      </div>
      <button type="submit" class="btn btn-primary mb-2">Registrar</button>
    </form>
      </div>
    </div>

    <footer class="footer py-3">
      <div class="container text-center">
        © 2023 CRUD Básico. Todos os direitos reservados.
      </div>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function buscarEnderecoPorCep() {
      const cep = document.getElementById('cep').value;
      const url = `https://viacep.com.br/ws/${cep}/json/`;

      fetch(url)
        .then(response => response.json())
        .then(data => {
          if (data.erro) {
            alert('CEP não encontrado. Por favor, verifique o CEP digitado.');
          } else {
            document.getElementById('endereco').value = data.logradouro;
            document.getElementById('bairro').value = data.bairro;
            document.getElementById('cidade').value = data.localidade;
            document.getElementById('estado').value = data.uf;
          }
        })
        .catch(error => {
          console.error('Ocorreu um erro ao buscar o endereço:', error);
        });
    }

    document.getElementById('cep').addEventListener('blur', buscarEnderecoPorCep);
  </script>
<script src="/view/remover_msgs.js"></script>
</body>
</html>
