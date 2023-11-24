<?php
session_start();
include_once("ligar.php");
?>

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
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* CSS personalizado para adicionar um fundo azul à seção de cabeçalho */
        .header-section {
            background: url('assets/img/page1 (2).PNG') no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Adicione a classe CSS personalizada à seção de cabeçalho -->
        <div class="header-section">
            <h1 class="text-center">Pagamento</h1>
        </div>
        <form method="POST" action="addpagamento.php">
            <div class="card">
                <div class="card-body">
                    <input type="hidden" name="id" value="<?php echo $contribuinte['id']; ?>">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nome"><strong>Nome</strong></label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $contribuinte["nome"]; ?>" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nuit"><strong>Nuit</strong></label>
                            <input type="text" class="form-control" id="nuit" name="nuit" value="<?php echo $contribuinte['nuit']; ?>" readonly>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="status"><strong>Valor</strong></label>
                            <input type="text" class="form-control" id="status" name="status" value="<?php echo $contribuinte['status']; ?>">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary" style="border-radius: 50px; background-color: lightblue; color: #000; width: 150px; font-weight: bold;">Efectuar</button>
                    <p><a href="principal.php" class="btn btn-secondary" style="border-radius: 50px; float: left;">Voltar</a></p>

                </div>
            </div>
        </form>
    </div>
</body>
</html>
