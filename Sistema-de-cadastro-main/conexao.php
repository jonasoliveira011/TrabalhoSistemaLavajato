<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "clientes";

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $data = $_POST["data"];
    $cliente = $_POST["cliente"];
    $veiculo = $_POST["veiculo"];
    $valor = $_POST["valor"];
    $formaPagamento = $_POST["formaPagamento"];

    // Prepara a consulta SQL para inserir os dados
    $sql = "INSERT INTO lava_jato_data (data, cliente, veiculo, valor, forma_pagamento)
            VALUES ('$data', '$cliente', '$veiculo', '$valor', '$formaPagamento')";

    // Executa a consulta SQL
    if ($conn->query($sql) === TRUE) {
        echo "Dados inseridos com sucesso.";
    } else {
        echo "Erro ao inserir dados: " . $conn->error;
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
