<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root"; // Nome de usuário padrão do XAMPP
$password = ""; // Senha padrão do XAMPP (vazio por padrão)
$database = "clientes"; // Nome do seu banco de dados no MySQL

$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Recebe os dados do formulário
$data = $_POST['data'];
$cliente = $_POST['cliente'];
$veiculo = $_POST['veiculo'];
$valor = $_POST['valor'];
$formaPagamento = $_POST['formaPagamento'];

// Prepara e executa a query SQL para inserir os dados
$sql = "INSERT INTO historico (data, cliente, veiculo, valor, formaPagamento) 
        VALUES ('$data', '$cliente', '$veiculo', '$valor', '$formaPagamento')";

$mensagem = "";

if ($conn->query($sql) === TRUE) {
    $mensagem = "Dados salvos com sucesso!";
} else {
    $mensagem = "Erro ao salvar os dados: " . $conn->error;
}

// Fecha a conexão com o banco de dados
$conn->close();
?>

<!-- Botão de voltar -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="assets/style.css">
    <title>Resultado</title>
    <style>
        /* Estilizando o contêiner e o botão de voltar */
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Altura da viewport */
            text-align: center;
        }

        button {
            background-color: #4CAF50; /* Verde */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 12px;
            transition: background-color 0.3s ease;
        }
        
        button:hover {
            background-color: #45a049; /* Verde mais escuro */
        }

        .message {
            font-size: 20px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="message"><?php echo $mensagem; ?></div>
        <button onclick="window.history.back();">Voltar</button>
    </div>
</body>
</html>
