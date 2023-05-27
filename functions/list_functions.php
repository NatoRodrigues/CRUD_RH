<?php

function lista_user(){

require "../model/conn.php";  

// Execute a consulta SQL para obter os dados
$sql = "SELECT * FROM funcionarios";
$stmt = $pdo->query($sql);

// Recupere os dados e armazene-os em um array
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

return $usuarios;
}

$usuarios = lista_user();

function verifica_registro() {
    require "../model/conn.php"; 

    // Execute a consulta SQL para verificar se existem registros
    $sql = "SELECT COUNT(*) as total FROM funcionarios";
    $stmt = $pdo->query($sql);

    // Recupere o total de registros
    $totalRegistros = $stmt->fetchColumn();

    // Verifica se existem registros
    if ($totalRegistros > 0) {
        lista_user();
    }else {
        echo '<tr><td colspan="4">Não existem funcionários registrados.</td></tr>';
    }
}

function busca_CPF($cpf, $pdo) {

  require "../model/conn.php";  

  $sql = "SELECT * FROM funcionarios WHERE cpf = :cpf";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':cpf', $cpf);
  $stmt->execute();

  $dadosFuncionario = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($dadosFuncionario) {
    // CPF encontrado, retornar os dados do funcionário
    return $dadosFuncionario;
  } else {
    // CPF não encontrado
    return null;
  }
}


// ...

// Verificando se há um CPF enviado via GET
// ...

// Verificando se há um CPF enviado via GET
if (isset($_GET['cpf'])) {
  // Obtendo o CPF enviado via GET
  $cpfSelecionado = $_GET['cpf'];

  // Obter a conexão com o banco de dados
  require "../model/conn.php";

  // Obter os dados do funcionário com base no CPF
  $dadosFuncionario = busca_CPF($cpfSelecionado, $pdo);

  // Verificar se o funcionário foi encontrado
  if ($dadosFuncionario !== null) {
    // Exibir formulário de edição com os dados do funcionário
    // ...
  } else {
    // O funcionário não foi encontrado no banco de dados
    echo '<div class="container mt-4">';
    echo '<div class="alert alert-danger" role="alert">Usuário não encontrado.</div>';
    echo '</div>';
  }
}
// ...

  


?>
