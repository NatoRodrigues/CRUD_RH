<?php include "header.php"; 
      include "../functions/list_functions.php";
?>
<div class="container mt-4">
  <h1>Informações do Funcionário</h1>
  <?php
  // Verificando se há um CPF enviado via GET
  if (isset($_GET['cpf'])) {
    // Obtendo o CPF enviado via GET
    $cpfSelecionado = $_GET['cpf'];

    $usuarios = lista_user();


    // Encontrando o usuário correspondente ao CPF selecionado
    $usuarioSelecionado = null;
    foreach ($usuarios as $usuario) {
      if ($usuario['cpf'] === $cpfSelecionado) {
        $usuarioSelecionado = $usuario;
        break;
      }
    }

    if ($usuarioSelecionado) {
        echo '<div class="table-responsive">';
        echo '<table class="table table-striped">';
        echo '<tbody>';
        echo '<tr>';
        echo '<th>Nome</th>';
        echo '<td>' . $usuarioSelecionado['nome'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th>E-mail</th>';
        echo '<td>' . $usuarioSelecionado['email'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th>CPF</th>';
        echo '<td>' . $usuarioSelecionado['cpf'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th>Endereço</th>';
        echo '<td>' . $usuarioSelecionado['endereco'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th>Telefone</th>';
        echo '<td>' . $usuarioSelecionado['telefone'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th>Cargo</th>';
        echo '<td>' . $usuarioSelecionado['cargo'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th>Departamento</th>';
        echo '<td>' . $usuarioSelecionado['departamento'] . '</td>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';        
        
    } else {
        echo '<tr><td colspan="4">Não existem funcionários registrados.</td></tr>';
      }  
    }
  ?>

  <br>
  <br>
  <a href="javascript:history.back()" class="btn btn-danger mb-4">Voltar</a>
</div>
<br>
<br>
  <div class="wrapper fixed-bottom">
    <footer class="footer py-3">
      <div class="container text-center">
        © 2023 CRUD Básico. Todos os direitos reservados.
      </div>
    </div>
    </footer>

  
