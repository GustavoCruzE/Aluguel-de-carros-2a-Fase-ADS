<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['DataDeRetirada'],$_POST['DataDeDevolucao'])) {
        include("Conexao_Banco.php");

        $CPF = isset($_SESSION['CPF']) ? $_SESSION['CPF'] : '';
        $Preco = $_POST['Preco'];
        $Placa = $_POST['Placa'];
        $DataDeRetirada = $_POST['DataDeRetirada'];
        $DataDeDevolucao = $_POST['DataDeDevolucao'];

        $Preco = (float)$Preco;
        $DataAtual = new DateTime();
        $DataDeRetirada = new DateTime($DataDeRetirada);
        $DataDeDevolucao = new DateTime($DataDeDevolucao);

        if ($DataAtual < $DataDeRetirada && $DataDeRetirada < $DataDeDevolucao) {
            $diferenca = $DataDeRetirada->diff($DataDeDevolucao);
            $Dias = $diferenca->days;
            $PrecoFinal = $Preco * $Dias;

            $DataDeRetiradaFormatada = $DataDeRetirada->format('Y-m-d');
            $DataDeDevolucaoFormatada = $DataDeDevolucao->format('Y-m-d');

            echo "
        <form id='submitForm' action='Confirmar_Compra2.php' method='post'>
            <input type='hidden' name='CPF' value='$CPF'>
            <input type='hidden' name='PrecoFinal' value='$PrecoFinal'>
            <input type='date' name='DataDeRetirada' value='$DataDeRetiradaFormatada'>
            <input type='date' name='DataDeDevolucao' value='$DataDeDevolucaoFormatada'>
            <input type='hidden' name='Dias' value='$Dias'>
            <input type='hidden' name='Placa' value='$Placa'>
        </form>";
        echo "<script>document.getElementById('submitForm').submit();</script>";
        } else {
            echo "Data inválida";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra</title>
    <link rel="stylesheet" href="styleCompra.css">
</head>
<body>
    <header>
<div class="container-header">
            <h1>Aluguel de Carros</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Início</a></li>
                    <li><a href="Pagina_Carros.php">Carros Disponíveis</a></li>
                    <li><a href="Sobrenos.php">Sobre Nós</a></li>
                    <li><a href="#footer-informações">Contato</a></li>
                    <?php
                    session_start();
                    if (isset($_SESSION['Nome'])) {
                        echo "<li><a href='LogOff.php'>".'Sair'."</a></li>";
                    } else {
                        echo "<li><a href='Campos_Login.php'>Login</a></li>";
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </header>
    <div class="main-content">
        <div class="form-container">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $Placa = $_POST['Placa'];
                $Preco = $_POST['Preco'];
            ?>
                <form method="POST">
                    <input type="hidden" name="Preco" value="<?php echo $Preco ?>">
                    <input type="hidden" name="Placa" value="<?php echo $Placa ?>">
                    <div class="form-row">
                        <label for="dataRetirada">Data de retirada:</label>
                        <input type="date" name="DataDeRetirada" id="dataRetirada" required>
                    </div>
                    <div class="form-row">
                        <label for="dataDevolucao">Data de devolução:</label>
                        <input type="date" name="DataDeDevolucao" id="dataDevolucao" required>
                    </div>
                    <br>
                    <input type="submit" value="Continuar compra">
                </form>
        <?php
        } else {
            echo "<p>Erro</p>";
        }
    ?>
</body>
</html>