<?php
function deleta_user($cpf)
{
    require "../model/conn.php";

    try {
        $sql = "DELETE FROM funcionarios WHERE cpf = :cpf";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        // Handle the exception or log the error
        echo "Erro ao deletar o usuário: " . $e->getMessage();
        return false;
    }
}


?>
