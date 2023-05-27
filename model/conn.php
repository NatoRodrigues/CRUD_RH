<?php
// Configurações de conexão com o banco de dados
$host = 'localhost';
$dbname = 'funcionarios';
$username = 'root';
$password = '';

// Conecta ao banco de dados usando a extensão PDO
try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  // Configura o modo de erro para exceções PDO
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  // Trata erros de conexão
  echo "Erro de conexão: " . $e->getMessage();
}


?>