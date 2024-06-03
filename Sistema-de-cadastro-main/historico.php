<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Histórico - Lava Jato</title>
    <link rel="stylesheet" href="assets/style_historico.css">
</head>
<body>
    <header>
        <h1>Histórico - Lava Jato</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Cliente</th>
                    <th>Veículo</th>
                    <th>Valor</th>
                    <th>Forma de Pagamento</th>
                </tr>
            </thead>
            <tbody>
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

                // Query SQL para selecionar os dados
                $sql = "SELECT data, cliente, veiculo, valor, formaPagamento FROM historico";
                $result = $conn->query($sql);

                // Verifica se há resultados e exibe os dados em linhas da tabela
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["data"] . "</td>";
                        echo "<td>" . $row["cliente"] . "</td>";
                        echo "<td>" . $row["veiculo"] . "</td>";
                        echo "<td>R$ " . $row["valor"] . "</td>";
                        echo "<td>" . $row["formaPagamento"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Nenhum registro encontrado.</td></tr>";
                }

                // Fecha a conexão com o banco de dados
                $conn->close();
                ?>
            </tbody>
        </table>
    </main>
    <footer>
        <a href="index.html">&larr; Voltar</a>
        <p>&copy; 2024 Lava Jato</p>
    </footer>
</body>
</html>
