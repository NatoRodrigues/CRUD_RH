<?php
include "header.php";
include "../functions/list_functions.php";

if (isset($_SESSION['error_messages'])) {
  echo '<div class="alert alert-danger" id="messages">';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
  <title>Listar Usuários</title>
  <style>
    html,
    body {
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
      padding: 20px 0;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <div class="content">
      <div class="container mt-4">
        <h1 class="mt-4">Listar Usuários</h1>

        <form class="mb-3" action="#" method="GET" id="">
          <div class="row">
            <div class = "col-md-6 offset-md-3">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Pesquisar por CPF" name="cpf">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
              </div>
            </div>
          </div>
        </form>

        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>CPF</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php
              
              $usuarios = lista_user();
              verifica_registro();
              if (isset($_GET['cpf'])) {
                // Obtendo o CPF pesquisado
                $cpfPesquisado = $_GET['cpf'];

                // Encontrando o usuário correspondente
                $usuarioEncontrado = null;
                foreach ($usuarios as $usuario) {
                  if ($usuario['cpf'] === $cpfPesquisado) {
                    $usuarioEncontrado = $usuario;
                    break;
                  }
                }  
                // Verifica se o usuário foi encontrado
                if ($usuarioEncontrado) {
                  echo '<tr>';
                  echo '<td>' . $usuarioEncontrado['cpf'] . '</td>';
                  echo '<td>' . $usuarioEncontrado['nome'] . '</td>';
                  echo '<td>' . $usuarioEncontrado['email'] . '</td>';
                  echo '<td>';
                  echo '<form method="GET" action="exibe_dados.php">';
                  echo '<input type="hidden" name="cpf" value="' . $usuarioEncontrado['cpf'] . '">';
                  echo '<button type="submit" class="btn btn-primary btn-sm" name="consultar">Consultar Dados</button>';
                  echo '</form>';
                  echo '</td>';
                  echo '</tr>';
              } else {
                  echo '<tr>';
                  echo '<td colspan="4">Nenhum usuário encontrado.</td>';
                  echo '</tr>';
              }
              echo ' <a href="javascript:history.back()" class="btn btn-danger mb-4">Voltar</a>'; 
               } 
            else {
                // Exibe todos os usuários
                foreach ($usuarios as $usuario) {
                  echo '<tr>';
                  echo '<td>' . $usuario['cpf'] . '</td>';
                  echo '<td>' . $usuario['nome'] . '</td>';
                  echo '<td>' . $usuario['email'] . '</td>';
                  echo '<td>';
                  echo '<form method="GET" action="exibe_dados.php">';
                  echo '<input type="hidden" name="cpf" value="' . $usuario['cpf'] . '">';
                  echo '<button type="submit" class="btn btn-primary btn-sm" name="consultar">Consultar Dados</button>';
                  echo '</form>';
                  echo '</td>';
                  echo '</tr>';
                }
              }
              ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>

    <footer class="footer py-3">
      <div class="container text-center">
        © 2023 CRUD Básico. Todos os direitos reservados.
      </div>
    </footer>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../functions/busca_cpf.js"></script>

</body>

</html>
