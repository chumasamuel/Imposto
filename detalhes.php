<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Detalhes do Contribuinte</title>
    <style>
        /* Estilos CSS para formatar a página */
        body {
            text-align: center;
            background-color: #d3d3d3; /* Cor de fundo da página */
            margin: 0;
            padding: 0;
        }

        .card {
            border: 1px solid #ccc;
            margin: 0 auto; /* Removendo margens para centralizar */
            width: 100%; /* Largura da card ocupando toda a tela */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Sombra da card */
        }

        .card-header {
            background-color: #3333; /* Cor de fundo da parte superior da card (azul escuro) */
            padding: 20px;
            color: white; /* Cor do texto na parte superior da card (branco) */
        }

        .card-content {
            background-color: #fff; /* Cor de fundo da tabela (branco) */
            width: 100%; /* Largura da tabela ocupando toda a card */
        }

        table {
            border-collapse: collapse;
            width: 100%; /* A tabela ocupa 100% da largura disponível na card */
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f7f9fa;
        }

        th:first-child,
        td:first-child {
            background-color: #d3d3d3; /* Cor de fundo cinza claro para a primeira coluna */
        }

        .button-container {
            margin: 20px auto;
            text-align: center;
        }

        button {
            margin: 10px;
        }
    </style>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nuit = $_POST["nuit"];
        
        // Configurações do banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "impostos";
        
        // Conexão com o banco de dados
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }
        
        // Consulta SQL
        $sql = "SELECT * FROM contribuinte WHERE nuit = '$nuit'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Exibir detalhes do contribuinte encontrado
            $contribuinte = $result->fetch_assoc();
            echo "<div class='card'>";
            echo "<div class='card-header'>";
            echo "<h2>Detalhes do Contribuinte</h2>";
            echo "</div>";
            echo "<div class='card-content'>";
            echo "<table>";
            echo "<tr><th>Nome</th><td>" . $contribuinte["nome"] . "</td></tr>";
            echo "<tr><th>Bairro</th><td>" . $contribuinte["bairro"] . "</td></tr>";
            echo "<tr><th>Gênero</th><td>" . $contribuinte["genero"] . "</td></tr>";
            echo "<tr><th>NUIT</th><td>" . $contribuinte["nuit"] . "</td></tr>";
            echo "<tr><th>Situação</th><td>";
            if ($contribuinte["status"] == 0) {
                echo "<button type='button' class='btn btn-danger' style='background-color:red;color:#fff'>Não regularizada</button>";
            } else {
                echo "<button type='button' class='btn btn-success' style='background-color:green; color:#fff';>Regularizada</button>";
            }
            echo "</td></tr>";
            echo "<tr><th>Ano</th><td>" . $contribuinte["ano"] . "</td></tr>";
            echo "</table>";
            
            // Botão para novo pagamento
            echo '<form action="Pagamento.php" method="post">';
            echo '<input type="hidden" name="nuit" value="' . $contribuinte["nuit"] . '">';
            echo '<button type="submit" style="font-weight: bold;">Efetuar Novo Pagamento</button>';
            echo '</form>';
            echo "</div>";
            echo "</div>";
        } else {
            echo "<p>Nenhum contribuinte encontrado para o NUIT informado.</p>";
        }
        
        $conn->close();
    } else {
        // Redirecionar para a página principal
        header("Location: consulta_de_contri.php");
    }
    ?>

    <a href="detalhes.php"><button class="btn btn-danger"
            style="background-color: #333333; width: 150px; height: 50px; font-weight: bold; font-size: 16px;">Voltar</button></a>
</body>

</html>
