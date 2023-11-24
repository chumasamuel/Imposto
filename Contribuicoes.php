
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Lista de contribuintes</title>
  <style>
    /* Estilo para o corpo da página (background cinza claro) */
    body {
      background-color: #f0f0f0; /* Cinza claro */
      margin: 0; /* Remove margens padrão do corpo */
      display: flex; /* Usar flexbox para alinhar conteúdo verticalmente */
      flex-direction: column; /* Alinhar conteúdo na direção vertical */
      min-height: 100vh; /* Garantir que a página ocupe pelo menos a altura da viewport */
    }

    /* Estilo para a div que engloba o título "Lista de contribuintes" com a barra azul marinho */
    .title-bar {
      background-color: #808080; /* Azul marinho */
      color: white; /* Define a cor do texto como branco para melhor legibilidade */
      padding: 10px; /* Espaçamento interno para espaçamento entre o texto e a barra */
      text-align: center; /* Alinhamento do texto ao centro */
    }

    /* Estilo para o título "Lista de contribuintes" */
    .title-bar h1 {
      margin: 0; /* Remove margens padrão do título */
    }

    /* Estilo para a div que engloba o conteúdo da página (background azul claro) */
    .content {
      background-color: #e6f7ff; /* Azul claro */
      flex-grow: 1; /* Permite que o conteúdo cresça para ocupar todo o espaço disponível na direção vertical */
      padding: 20px; /* Adiciona um espaço de preenchimento ao redor do conteúdo */
    }

    /* Estilo para a tabela */
    table {
      width: 100%; /* A tabela ocupa 100% da largura disponível */
      border-collapse: collapse; /* Remove espaçamento entre as células */
    }

    /* Estilo para as células da coluna 'Id' no cabeçalho */
    th.id {
      background-color: #808080; /* Azul escuro */
      color: white; /* Define a cor do texto como branco para melhor legibilidade */
      font-size: 1.5em; /* Tamanho de fonte equivalente a h3 */
    }

    /* Estilo para as células da coluna 'Id' no corpo da tabela */
    td.id {
      background-color: #e6f7ff; /* Azul escuro */
      color: black; /* Define a cor do texto como preto para melhor legibilidade */
      font-size: 1.5em; /* Tamanho de fonte equivalente a h3 */
    }

    /* Estilo para as linhas com status "Não Regularizada" */
    .nao-regularizada {
      background-color: #D3D3D3;
      color: red; /* Define a cor do texto como branco para melhor legibilidade */
    }

    /* Estilo para linhas com o status "Regularizada" */
    .regularizada {
      background-color: #00bfff; /* Azul céu profundo */
      color: white; /* Define a cor do texto como branco para melhor legibilidade */
    }

    /* Estilo para o botão "Filtrar" */
    .button-filtrar {
      background-color: #007bff; /* Azul */
      color: white;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      font-size: 1em;
    }

    /* Estilo para o botão "Voltar" */
    .button-voltar {
      background-color: #333; /* Cinza escuro */
      color: white;
      padding: 10px 20px;
      border: none;
      cursor: pointer;
      font-size: 1em;
    }

    /* Estilo para a label "Situação" */
    label {
      font-size: 1.5em; /* Aumenta o tamanho da fonte da label */
    }
  </style>
</head>
<body>
  <div class="title-bar">
    <h1>Lista de contribuintes</h1>
  </div>

  <div class="content">
    <table border="1">
      <thead>
        <tr>
          <th class="id">Id</th>
          <th class="id">Nome</th>
          <th class="id">Bairro</th>
          <th class="id">Gênero</th>
          <th class="id">Nuit</th>
          <th class="id">Situação</th>
          <th class="id">Ano</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $conn = new PDO("mysql:host=localhost;dbname=impostos", "root", "");

          $query = "SELECT * FROM contribuinte";
          $result = $conn->query($query);

          while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            // Verifica se o status é 0
            $status = $row['status'] == 0 ? 'Não Regularizada' : 'Regularizada';

            // Adiciona a classe 'nao-regularizada' se o status for 'Não Regularizada'
            $class = $row['status'] == 0 ? 'nao-regularizada' : '';

            // Adiciona a classe 'regularizada' se o status for 'Regularizada'
            if ($row['status'] == 1) {
              $class = 'regularizada';
            }

            echo "<tr class='$class'>";
            echo "<td class='id'>{$row['id']}</td>";
            echo "<td>{$row['nome']}</td>";
            echo "<td>{$row['bairro']}</td>";
            echo "<td>{$row['genero']}</td>";
            echo "<td>{$row['nuit']}</td>";
            echo "<td>$status</td>";
            echo "<td>{$row['ano']}</td>";
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>

    <div>
      <label for="situacao">Situação:</label>
      <select name="situacao" id="situacao">
        <option value="Regularizada">Regularizada</option>
        <option value="Não Regularizada">Não Regularizada</option>
      </select>
      <button type="button" class="button-filtrar" id="filtrar">Mostrar</button>
      <span id="contagem"></span> <!-- Aqui é onde a contagem será exibida -->
    </div>
    
    <div>
      <button class="button-voltar" onclick="voltarParaPaginaPrincipal()">Voltar para a Página Principal</button>
    </div>
  </div>

  <script>
    // Atribui um evento de clique ao botão "filtrar"
    document.getElementById("filtrar").addEventListener("click", function() {
      // Obtém o valor selecionado no select
      var situacao = document.getElementById("situacao").value;

      // Filtra a tabela de acordo com a situação selecionada
      var rows = document.querySelectorAll("table tbody tr");
      var count = 0; // Inicializa a contagem

      for (var i = 0; i < rows.length; i++) {
        var row = rows[i];

        // Verifica se a situação do contribuinte é igual à situação selecionada
        var statusCell = row.querySelector("td:nth-child(6)"); // A coluna do status é a sexta coluna (índice 5)
        if (statusCell.textContent.trim() === situacao) {
          row.style.display = "table-row";
          count++; // Incrementa a contagem
        } else {
          row.style.display = "none";
        }
      }

      // Exibe a contagem
      var contagemElement = document.getElementById("contagem");
      contagemElement.textContent = "Total: " + count;
    });

    // Função para voltar para a página principal
    function voltarParaPaginaPrincipal() {
      window.location.href = "principal.php"; // Substitua pelo nome do arquivo da página principal
    }
  </script>
</body>
</html>
<!-- Formulário para o botão de impressão -->
<a href="RegularizadaRela.php">
    <button type="button" style="border-radius: 50px; width: 100px; background-color: #00BFFF; color: #FFF; font-weight: bold; float: right; margin-right: 15px;">
      <i class="fa fa-print"></i>Imprimir Regularizada
    </button>
  </a>

  <!-- Formulário para o botão de impressão -->
  <a href="NaoRegularRela.php">
  <button type="button" style="border-radius: 50px; width: 180px; background-color:  #3333; color: red; font-weight: bold; margin-left: 15px;" class="button-left">
    <i class="fa fa-print"></i> Imprimir Não Regularizada
  </button>
</a><br></br><br></br>
<?php include_once("_footer.php");  ?>
