<?php
session_start();

include "header.php";
include "../functions/delete_functions.php";
include "../functions/list_functions.php";
include "../model/conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
  <title>Deletar usuários</title>
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
        <h1 class="mt-4">Deletar Usuários</h1>
        <form class="mb-3" action="#" method="GET">
          <div class="row">
            <div class="col-md-6 offset-md-3">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Pesquisar por CPF" name="cpf">
                <button type="submit" class="btn btn-primary">Pesquisar</button>
              </div>
            </div>
          </div>
        </form>
        <div class="table-responsive">
          <?php
          if (isset($_GET['cpf'])) {
            // Obtendo o CPF pesquisado
            $cpfPesquisado = $_GET['cpf'];

            // Verifica se o CPF pesquisado corresponde a algum usuário
            $usuarioEncontrado = false;

            echo '<table class="table table-striped" id="user-table">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>CPF</th>';
            echo '<th>Nome</th>';
            echo '<th>E-mail</th>';
            echo '<th>Ações</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody id="funcionarios">';

            foreach ($usuarios as $usuario) {
              if ($usuario['cpf'] === $cpfPesquisado) {
                echo '<tr>';
                echo '<td>' . $usuario['cpf'] . '</td>';
                echo '<td>' . $usuario['nome'] . '</td>';
                echo '<td>' . $usuario['email'] . '</td>';
                echo '<td>';
                echo '<form method="GET" action="../controller/deleta_user.php">';
                echo '<input type="hidden" name="cpf" value="' . $usuario['cpf'] . '">';
                echo '<button type="submit" class="btn btn-danger btn-sm" name="Deletar">Deletar funcionário</button>';
                echo '</form>';
                echo '</td>';
                echo '</tr>';

                $usuarioEncontrado = true;
              }
            }

            echo '</tbody>';
            echo '</table>';

            if (!$usuarioEncontrado) {
              echo '<tr>';
              echo '<td colspan="4">Nenhum usuário encontrado.</td>';
              echo '</tr>';
              echo '<br>';
              echo '<br>';
              
            }
            
            echo '<a href="javascript:history.back()" class="btn btn-danger mb-4">Voltar</a>'; // Botão Voltar
          } else {
            echo '<table class="table table-striped">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>CPF</th>';
            echo '<th>Nome</th>';
            echo '<th>E-mail</th>';
            echo '<th>Ações</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            foreach ($usuarios as $usuario) {
              echo '<tr>';
              echo '<td>' . $usuario['cpf'] . '</td>';
              echo '<td>' . $usuario['nome'] . '</td>';
              echo '<td>' . $usuario['email'] . '</td>';
              echo '<td>';
              echo '<form method="GET" action="../controller/deleta_user.php">';
              echo '<input type="hidden" name="cpf" value="' . $usuario['cpf'] . '">';
              echo '<button type="submit" class="btn btn-danger btn-sm" name="Deletar">Deletar funcionário</button>';
              echo '</form>';
              echo '</td>';
              echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
          }
          ?>
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
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      var okButton = document.getElementById("ok-button");
      okButton.addEventListener("click", function() {
        var table = document.getElementById("user-table");
        var errorMessage = document.getElementById("error-message");
        table.style.display = "table"; // Show the table
        errorMessage.style.display = "none"; // Hide the error message
        window.history.back(); // Return to the previous page
      });
    });
  </script>

</body>
</html>
