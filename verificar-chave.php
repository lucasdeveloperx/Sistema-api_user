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

// Processa a verificação da chave quando enviada via formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $chave_api = $_POST["chave_api"];

    // Consulta o banco de dados para verificar se a chave está presente
    $sql = "SELECT * FROM usuarios WHERE chave_api = '$chave_api'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Chave encontrada na base de dados
        $row = $result->fetch_assoc();
        $nome = $row["nome"];
        $telefone = $row["telefone"];
        $cpf = $row["cpf"];
        $usuario = $row["usuario"];

        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    const popup = document.querySelector('.popup');
                    popup.style.display = 'block';
                });
            </script>";

    } else {
        echo "<script>
                alert('API_USER não encontrada em nossa base de dados.');
            </script>";
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação de Chave</title>
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

        .popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            z-index: 9999;
        }

        .popup h2 {
            margin-top: 0;
        }

        .popup p {
            margin-bottom: 10px;
        }

        .popup button {
            background-color: #f44336;
        }

        .popup button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Verificação de Chave</h1>
        <form method="post">
            <label for="chave_api">Digite sua chave API_USER:</label><br>
            <input type="text" id="chave_api" name="chave_api" required><br>
            <button type="submit">Verificar</button>
        </form>
    </div>

    <div class="popup">
        <h2>Informações da API_USER</h2>
        <p>Nome: <?php echo $nome; ?></p>
        <p>Telefone: <?php echo $telefone; ?></p>
        <p>CPF: <?php echo $cpf; ?></p>
        <p>Usuário: <?php echo $usuario; ?></p>
        <button onclick="fecharPopup()">Fechar</button>
    </div>

    <script>
        function fecharPopup() {
            const popup = document.querySelector('.popup');
            popup.style.display = 'none';
        }
    </script>
</body>
</html>
