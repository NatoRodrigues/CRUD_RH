<?php

require "../model/conn.php";

function validarCPF($cpf) {
    // Remove caracteres especiais do CPF
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    // Verifica se o CPF possui 11 dígitos
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se todos os dígitos são iguais
    if (preg_match('/^(\d)\1*$/', $cpf)) {
        return false;
    }

    // Calcula os dígitos verificadores
    for ($i = 9; $i < 11; $i++) {
        $soma = 0;
        for ($j = 0; $j < $i; $j++) {
            $soma += intval($cpf[$j]) * (($i + 1) - $j);
        }
        $resto = $soma % 11;
        if ($resto < 2 && intval($cpf[$i]) != 0) {
            return false;
        } elseif ($resto >= 2 && intval($cpf[$i]) != 11 - $resto) {
            return false;
        }
    }

    // CPF válido
    return true;
}



function validarTelefone($telefone) {
    // Remove caracteres especiais do número de telefone
    $telefone = preg_replace('/[^0-9]/', '', $telefone);

    // Verifica se o número de telefone possui entre 10 e 11 dígitos
    if (strlen($telefone) < 10 || strlen($telefone) > 11) {
        return false;
    }

    // Verifica se o número de telefone possui um formato válido
    if (!preg_match('/^\d{10,11}$/', $telefone)) {
        return false;
    }

    // Número de telefone válido
    return true;
}


// Função para validar um CEP
function validarCEP($cep) {
    // Remove caracteres especiais do CEP
    $cep = preg_replace('/[^0-9]/', '', $cep);

    // Verifica se o CEP possui 8 dígitos
    if (strlen($cep) != 8) {
        return false;
    }

    // CEP válido
    return true;
}




function cadastra_user() {
    $erros = array();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtém os dados do formulário via POST
        $dados = [
            'nome' => $_POST['nome'],
            'email' => $_POST['email'],
            'cpf' => $_POST['cpf'],
            'endereco' => $_POST['endereco'],
            'cidade' => $_POST['cidade'],
            'UF' => $_POST['UF'],
            'telefone' => $_POST['telefone'],
            'cargo' => $_POST['cargo'],
            'departamento' => $_POST['departamento'],
            'cep' => $_POST['cep']
        ];

        // Valida o telefone
        if (!validarTelefone($dados['telefone'])) {
            $erros[] = "Telefone inválido.";
        }

        // Valida o CEP
        if (!validarCEP($dados['cep'])) {
            $erros[] = "CEP inválido.";
        }

        // Valida o CPF
        if (!validarCPF($dados['cpf'])) {
            $erros[] = "CPF inválido.";
        }

        // Se houver erros, armazena as mensagens de erro na sessão
        if (!empty($erros)) {
            $_SESSION['error_messages'] = $erros;
        } else {
            require "../model/conn.php";

            $sql = "INSERT INTO funcionarios (nome, email, cpf, endereco, cidade, UF, telefone, cargo, departamento)
                    VALUES (:nome, :email, :cpf, :endereco, :cidade, :UF, :telefone, :cargo, :departamento)";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':nome', $dados['nome']);
            $stmt->bindParam(':email', $dados['email']);
            $stmt->bindParam(':cpf', $dados['cpf']);
            $stmt->bindParam(':endereco', $dados['endereco']);
            $stmt->bindParam(':cidade', $dados['cidade']);
            $stmt->bindParam(':UF', $dados['UF']);
            $stmt->bindParam(':telefone', $dados['telefone']);
            $stmt->bindParam(':cargo', $dados['cargo']);
            $stmt->bindParam(':departamento', $dados['departamento']);
            $stmt->execute();
        }
        var_dump($dados);
    }

    return $erros;
}



// Verifica se a solicitação foi enviada por POST

?>