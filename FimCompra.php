<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Confirmação de Compra</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0;
        padding: 20px;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #333;
        text-align: center;
    }

    .message {
        margin-top: 20px;
        padding: 10px;
        background-color: #e9f7ef;
        border: 1px solid #7fd39e;
        border-radius: 5px;
        text-align: center;
    }

    .error-message {
        background-color: #f8d7da;
        border: 1px solid #f5c6cb;
        color: #721c24;
    }

    button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s;
        margin-top: 20px;
    }

    button:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Confirmação de Compra</h2>

    <?php
    session_start();
    include("Conexao_Banco.php");

    $CPF = isset($_SESSION['CPF']) ? $_SESSION['CPF'] : '';
    $PrecoFinal = $_POST['PrecoFinal'];
    $DataDeRetirada = $_POST['DataDeRetirada'];
    $DataDeDevolucao = $_POST['DataDeDevolucao'];
    $Placa = $_POST['Placa'];

    // Converter as datas para objetos DateTime
    $DataDeRetiradaObj = new DateTime($DataDeRetirada);
    $DataDeDevolucaoObj = new DateTime($DataDeDevolucao);

    // Formatar as datas para o formato adequado para o banco de dados
    $DataDeRetiradaFormatada = $DataDeRetiradaObj->format('Y-m-d');
    $DataDeDevolucaoFormatada = $DataDeDevolucaoObj->format('Y-m-d');

    // Preparar e executar as queries SQL
    $sqlCompra = "INSERT INTO Compra (Comprador, Veiculo, DataInicial, DataDeDevolucao, PrecoFinal) 
                  VALUES ('$CPF', '$Placa', '$DataDeRetiradaFormatada', '$DataDeDevolucaoFormatada', '$PrecoFinal')";
    $sqlUpdate = "UPDATE informacoesveiculos SET Disponibilidade = 'Indisponível' WHERE Placa = '$Placa'";

    // Executar a inserção
    if (mysqli_query($conexao, $sqlCompra)) {
        // Se a compra foi inserida com sucesso, atualizar a disponibilidade do veículo
        mysqli_query($conexao, $sqlUpdate);
        mysqli_close($conexao);

        // Mostrar mensagem de sucesso e botão para voltar
        echo "<div class='message'>Compra realizada com sucesso!</div>";
        ?>
        <button onclick="window.location.href='Pagina_Carros.php';">Voltar</button>
        <?php
        exit();
    } else {
        // Se houver erro na inserção
        echo "<div class='message error-message'>Erro ao realizar a compra: " . mysqli_error($conexao) . "</div>";
        mysqli_close($conexao);
    }
    ?>
</div>
</body>
</html>
