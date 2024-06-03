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

// Query SQL para calcular a quantidade de carros lavados e o valor bruto
$sql = "SELECT COUNT(*) AS quantidadeCarros, SUM(valor) AS valorBruto FROM historico";
$result = $conn->query($sql);

// Inicializa variáveis
$quantidadeCarros = 0;
$valorBruto = 0;

// Verifica se há resultados e atribui os valores
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $quantidadeCarros = $row["quantidadeCarros"];
    $valorBruto = $row["valorBruto"];
}

// Calcula a comissão dos funcionários (exemplo)
$comissaoFuncionarios = array(
    "Funcionario 1" => $valorBruto * 0.1,
    "Funcionario 2" => $valorBruto * 0.1,
    
);

// Calcula o valor líquido (exemplo)
$valorLiquido = $valorBruto - array_sum($comissaoFuncionarios);

// Fecha a conexão com o banco de dados
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechamento do Mês - Lava Jato</title>
    <link rel="stylesheet" href="assets/style_fechamento.css">
</head>
<body>
    <header>
        <h1>Fechamento do Mês - Lava Jato</h1>
    </header>
    <main>
        <div class="summary">
            <h2>Resumo do Mês</h2>
            <p><strong>Quantidade de carros lavados:</strong> <span id="quantidadeCarros"><?php echo $quantidadeCarros; ?></span></p>
            <p><strong>Valor bruto:</strong> R$ <span id="valorBruto"><?php echo number_format($valorBruto, 2, ',', '.'); ?></span></p>
            <h2>Comissão dos Funcionários</h2>
            <table id="comissaoFuncionarios">
                <thead>
                    <tr>
                        <th>Funcionário</th>
                        <th>Comissão</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop para exibir os dados dos funcionários
                    foreach ($comissaoFuncionarios as $funcionario => $comissao) {
                        echo "<tr>";
                        echo "<td>$funcionario</td>";
                        echo "<td>R$ " . number_format($comissao, 2, ',', '.') . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <p><strong>Valor líquido:</strong> R$ <span id="valorLiquido"><?php echo number_format($valorLiquido, 2, ',', '.'); ?></span></p>
        </div>
    </main>
    <footer>
        <a href="index.html">&larr; Voltar</a>
        <p>&copy; 2024 Lava Jato</p>
    </footer>
    <script src="script.js"></script>
</body>
</html>
