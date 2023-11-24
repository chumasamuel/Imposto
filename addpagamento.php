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

    // Verifique se o campo "id" está preenchido para determinar se é uma edição ou inserção
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        // Edição: Atualize o registro existente
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $nuit = $_POST['nuit'];
        $status = $_POST['status'];

        $sql = "UPDATE contribuinte SET nome = '$nome', nuit = '$nuit', status = '$status' WHERE id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "Pagamento efetuado com sucesso.";
            // Adicione o botão de retorno à tela de pagamento
            echo '<a href="detalhes.php"><button>Voltar para detalhes</button></a>';
        } else {
            echo "Erro ao efetuar o pagamento: " . $conn->error;
        }
    } else {
        // Inserção: Insira um novo registro
        $nome = $_POST['nome'];
        $nuit = $_POST['nuit'];
        $status = $_POST['status'];

        $sql = "INSERT INTO contribuinte (nome, nuit, status) VALUES ('$nome', '$nuit', '$status')";

        if ($conn->query($sql) === TRUE) {
            echo "Novo registro inserido com sucesso.";
            // Adicione o botão de retorno à tela de pagamento
            echo '<a href="pagina-de-pagamento.php"><button>Voltar para a tela de pagamento</button></a>';
        } else {
            echo "Erro ao inserir novo registro: " . $conn->error;
        }
    }

    // Feche a conexão com o banco de dados
    $conn->close();
}
?>
