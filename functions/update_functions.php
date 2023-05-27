<?php


// update_functions.php

// Função para atualizar os dados do usuário no banco de dados
function atualizarUsuario($cpf, $nome, $email, $endereco, $telefone, $cargo, $departamento, $pdo) {
    try {
        // Query para atualizar os dados do usuário
        $query = "UPDATE funcionarios SET nome = :nome, email = :email, endereco = :endereco, telefone = :telefone, cargo = :cargo, departamento = :departamento WHERE cpf = :cpf";
      
        // Preparar a declaração PDO
        $stmt = $pdo->prepare($query);
      
        // Bind dos parâmetros
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':cargo', $cargo);
        $stmt->bindParam(':departamento', $departamento);
        $stmt->bindParam(':cpf', $cpf);
      
        // Executar a query
        if ($stmt->execute()) {
            // Dados atualizados com sucesso
            return "Usuário atualizado com sucesso.";
        } else {
            // Erro ao atualizar os dados
            return "Erro ao atualizar o usuário: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        // Erro ao conectar-se ao banco de dados
        return "Erro ao conectar-se ao banco de dados: " . $e->getMessage();
    }
}

  

?>
