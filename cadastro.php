<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera os valores enviados pelo formulário
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['confirmar_senha'];
    $email = $_POST['email'];
	$IpCliente = $_SERVER['REMOTE_ADDR'];
    // Verifica se os campos foram preenchidos
    if (empty($nome) || empty($senha) || empty($confirmarSenha) || empty($email)) {
        echo "<script language='javascript' type='text/javascript'>alert('Por favor, preencha todos os campos.');window.location.href='http://25.42.80.70/cadastro.php';</script>";
    } else {
        // Verifica se as senhas coincidem
        if ($senha !== $confirmarSenha) {
            echo "<script language='javascript' type='text/javascript'>alert('As senhas não coincidem.');window.location.href='http://25.42.80.70/cadastro.php';</script>";
        } else {
            // Estabelece a conexão com o SQL Server usando ODBC
            $server = '25.42.80.70'; // Nome do servidor SQL Server
            $database = 'PS_UserData'; // Nome do banco de dados
            $username = 'sa'; // Nome de usuário do SQL Server
            $password = 'shaiya123'; // Senha do SQL Server

            // Cria a string de conexão
            $connectionString = "Driver={SQL Server};Server=$server;Database=$database;";
            $connection = odbc_connect($connectionString, $username, $password);

            if (!$connection) {
                die("Falha na conexão com o SQL Server: " . odbc_errormsg());
            }

            // Verifica se o usuário já existe no banco de dados
            $query = "SELECT * FROM Users_Master WHERE UserID = '$nome' OR Enpassword = '$email'";
            $result = odbc_exec($connection, $query);

            if (!$result) {
                echo "Erro ao executar a consulta: " . odbc_errormsg($connection);
            } else {
                $rows = odbc_num_rows($result);
                if ($rows > 0) {
                    echo "<script language='javascript' type='text/javascript'>alert('Usuário ou e-mail já existem no banco de dados.');window.location.href='http://25.42.80.70/cadastro.php';</script>";
                } else {

					// Obtém o próximo valor para UserUID
					$query = "SELECT MAX(UserUID) AS MaxUserUID FROM Users_Master";
					$result = odbc_exec($connection, $query);
					$row = odbc_fetch_array($result);
					$maxUserUID = $row['MaxUserUID'];
					$nextUserUID = $maxUserUID + 1;

					// Define as variáveis de data e hora
                    $dataHora = date('Y-m-d H:i:s');
                    $anoAtual = date('Y');
                    $fim = (int)$anoAtual + 30;

                    // Prepara a consulta SQL
                    $query = "INSERT INTO Users_Master (UserUID,UserID, Pw, JoinDate, Admin, AdminLevel, UseQueue, Status, Leave, LeaveDate, UserType, UserIp, Point, Enpassword, Birth) VALUES ";
                    $query .= "('$nextUserUID', '$nome', '$senha', '$dataHora', 'False', '0', 'False', '0', '0', '$fim', 'C', '$IpCliente', '0', '$email', '$anoAtual')";

                    // Executa a consulta SQL
                    $result = odbc_exec($connection, $query);

                    if (!$result) {
                        echo "<script language='javascript' type='text/javascript'>alert('Erro ao inserir os dados:');window.location.href='http://25.42.80.70/cadastro.php';</script> " . odbc_errormsg($connection);
                    } else {
                        echo "<script language='javascript' type='text/javascript'>alert('Registro concluído com sucesso!');window.location.href='http://25.42.80.70/cadastro.php';</script>";
                    }
                }
            }

            // Fecha a conexão com o SQL Server
            odbc_close($connection);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulário de Registro</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
        }

        h2 {
            text-align: center;
        }

        form {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Formulário de Registro</h2>
        <form method="POST" action="">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="senha">Senha:</label>
            <input type="password" id="senha" name="senha" required>

            <label for="confirmar_senha">Confirmar Senha:</label>
            <input type="password" id="confirmar_senha" name="confirmar_senha" required>

            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email" required>

            <input type="submit" value="Registrar">
        </form>
    </div>
</body>
</html>
