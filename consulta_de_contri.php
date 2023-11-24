<?php 
session_start();
include_once("ligar.php");
include_once("_header.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Consulta de Contribuinte</title>
    <style>
        /* Estilos CSS vão aqui */

        .content {
            margin-bottom: 300px; /* Adiciona margem na parte inferior para afastar o rodapé */
        }

        body {
            background-image: url('assets/img/impo.PNG'); /* Substitua pelo caminho da sua imagem */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            color: #000; /* Cor do texto (preto) para melhor visibilidade */
            font-family: Arial, sans-serif; /* Fonte para o texto */
            text-align: center; /* Centralizar todo o texto */
            margin: 0; /* Remover margens padrão do corpo */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        h2, label, button {
            color: #000; /* Cor do texto (preto) para melhor visibilidade */
            text-align: left; /* Alinhar o texto à esquerda */
            margin: 10px; /* Adicionar margem */
        }

        form {
            text-align: center; /* Centralizar o conteúdo do formulário */
        }

        input[type="text"] {
            padding: 10px;
        }

        button {
            padding: 10px 20px;
            background-color: #007BFF;
            border: none;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="content">
        <h2>Consulte o Contribuinte por NUIT</h2>
        <form method="post" action="detalhes.php">
            <label for="nuit">Digite o NUIT:</label>
            <input type="text" id="nuit" name="nuit" required>
            <button type="submit">Buscar</button>
        </form>
        
        <!-- Botão na mesma linha centralizada -->
        <form method="get" action="principal.php">
            <button type="submit">Ir para Página Principal</button>
        </form>
    </div>

    <?php include_once("_footer.php");  ?>
</body>
</html>
