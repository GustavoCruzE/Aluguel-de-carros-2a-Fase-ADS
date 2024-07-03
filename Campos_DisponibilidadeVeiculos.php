<?php
require_once 'Conexao_Login.php';

$sqlDisponivel = "SELECT * from InformacoesVeiculos WHERE Disponibilidade = 'Disponível' ";
$VeiculosDisponiveis = $mysqli->query($sqlDisponivel);
$sqlIndisponivel = "SELECT * from InformacoesVeiculos WHERE Disponibilidade = 'Indisponível' ";
$VeiculosIndisponiveis = $mysqli->query($sqlIndisponivel);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Disponibilidade de veículos</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        margin: 0; /* Removendo margens padrão do body */
        padding: 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table, th, td {
        border: 1px solid #ccc;
    }

    th, td {
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }

    form {
        display: inline; /* Para alinhar o formulário na mesma linha */
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 8px 12px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    .container-header {
        width: 80%;
        margin: 0 auto;
        background: #333;
        color: #fff;
        padding: 20px;
        border-radius: 0px 0px 25px 25px;
        display: flex;
        justify-content: space-between;
        margin-top: 0; /* Removendo margem superior do container-header */
    }

    header h1 {
        font-family: 'Courier New', Courier, monospace;
        margin: 0;
    }

    nav {
        font-family: 'Courier New', Courier, monospace;
        margin-top: 0;
    }

    nav ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    nav ul li {
        display: inline;
        margin-left: 20px;
    }

    nav ul li a {
        text-decoration: none;
        color: #fff;
    }
</style>
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
                if (isset($_SESSION['Cargo']) && $_SESSION['Cargo'] == "Funcionário"){
                    echo "<li><a href='Gerenciamento.php'>".'Gerenciamento'."</a></li>";
                }
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

<table>
    <tr>
        <th>Modelo</th>
        <th>Marca</th>
        <th>Placa</th>
        <th>Preço</th>
        <th>Disponibilidade</th>
        <th>Ação</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_assoc($VeiculosDisponiveis)) {
        $Modelo = $row['Modelo'];
        $Marca = $row['Marca'];
        $Placa = $row['Placa'];
        $Preco = $row['Preco'];
        $Disponibilidade = $row['Disponibilidade'];
        ?>
        <form method="post">
            <tr>
                <td><?php echo $Modelo; ?></td>
                <td><?php echo $Marca; ?></td>
                <td><?php echo $Placa; ?></td>
                <td><?php echo $Preco; ?></td>
                <td><?php echo $Disponibilidade; ?></td>
                <input type="hidden" name="Modelo" value="<?php echo $Modelo; ?>">
                <input type="hidden" name="Marca" value="<?php echo $Marca; ?>">
                <input type="hidden" name="Placa" value="<?php echo $Placa; ?>">
                <input type="hidden" name="Preco" value="<?php echo $Preco; ?>">
                <input type="hidden" name="Disponibilidade" value="<?php echo $Disponibilidade; ?>">
                <td><input type="submit" name="submit" value="Suspender"></td>
            </tr>
        </form>
    <?php } ?>

    <?php
    while ($row = mysqli_fetch_assoc($VeiculosIndisponiveis)) {
        $Modelo = $row['Modelo'];
        $Marca = $row['Marca'];
        $Placa = $row['Placa'];
        $Preco = $row['Preco'];
        $Disponibilidade = $row['Disponibilidade'];
        ?>
        <form method="post">
            <tr>
                <td><?php echo $Modelo; ?></td>
                <td><?php echo $Marca; ?></td>
                <td><?php echo $Placa; ?></td>
                <td><?php echo $Preco; ?></td>
                <td><?php echo $Disponibilidade; ?></td>
                <input type="hidden" name="Modelo" value="<?php echo $Modelo; ?>">
                <input type="hidden" name="Marca" value="<?php echo $Marca; ?>">
                <input type="hidden" name="Placa" value="<?php echo $Placa; ?>">
                <input type="hidden" name="Preco" value="<?php echo $Preco; ?>">
                <input type="hidden" name="Disponibilidade" value="<?php echo $Disponibilidade; ?>">
                <td><input type="submit" name="submit" value="Disponibilizar"></td>
            </tr>
        </form>
    <?php } ?>
</table>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Modelo = $_POST['Modelo'];
    $Marca = $_POST['Marca'];
    $Placa = $_POST['Placa'];
    $Preco = $_POST['Preco'];
    $Disponibilidade = $_POST['Disponibilidade'];

    if ($Disponibilidade == "Disponível") {
        $sqlUpdate = "UPDATE informacoesveiculos SET Disponibilidade = 'Indisponível' WHERE Placa = '$Placa'";
        $resultado = mysqli_query($mysqli, $sqlUpdate);
        mysqli_close($mysqli);
        exit();
    }
    if ($Disponibilidade == "Indisponível") {
        $sqlUpdate = "UPDATE informacoesveiculos SET Disponibilidade = 'Disponível' WHERE Placa = '$Placa'";
        $resultado = mysqli_query($mysqli, $sqlUpdate);
        mysqli_close($mysqli);
        exit();
    }
}
?>
</body>
</html>
