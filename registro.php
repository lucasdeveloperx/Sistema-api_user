<?php

// Conexão com o banco de dados
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "cadastro_usuarios";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se ocorreu algum erro na conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Processa o formulário quando enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $telefone = $_POST["telefone"];
    $cpf = $_POST["cpf"];
    $usuario = $_POST["usuario"];

    // Gera uma chave API_USER aleatória
    $chave_api = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);

    // Insere os dados na tabela
    $sql = "INSERT INTO usuarios (nome, telefone, cpf, usuario, chave_api)
            VALUES ('$nome', '$telefone', '$cpf', '$usuario', '$chave_api')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro realizado com sucesso!<br>";
        echo "Sua chave API_USER é: " . $chave_api;
    } else {
        echo "Erro ao registrar: " . $conn->error;
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        form {
            margin-top: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Registro de Usuário</h1>
        <form method="post">
            <label for="nome">Nome:</label><br>
            <input type="text" id="nome" name="nome" required><br>
            <label for="telefone">Telefone:</label><br>
            <input type="text" id="telefone" name="telefone" required><br>
            <label for="cpf">CPF:</label><br>
            <input type="text" id="cpf" name="cpf" required><br>
            <label for="usuario">Usuário:</label><br>
            <input type="text" id="usuario" name="usuario" required><br>
            <button type="submit">Registrar</button>
        </form>
    </div>
</body>
</html>
