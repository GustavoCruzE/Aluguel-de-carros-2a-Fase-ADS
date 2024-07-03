<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Especificações do veículo</title>
    <style>
        /* Resetando margens e paddings para garantir consistência */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 0;
            margin: 0;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label, input, select {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: calc(100% - 20px);
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="file"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
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

    <h2>Especificações do veículo</h2>

    <form action="Banco_De_Dados_Veiculos.php" method="post" enctype="multipart/form-data">
        <label for="TipoVeiculo">Selecione o tipo do veículo:</label>
        <select id="TipoVeiculo" name="TipoVeiculo" required>
            <option value="Carro">Carro</option>
            <option value="Moto">Moto</option>
        </select>

        <label for="Modelo">Modelo:</label>
        <input type="text" id="Modelo" name="Modelo" placeholder="Modelo" required>

        <label for="Placa">Placa:</label>
        <input type="text" id="Placa" name="Placa" placeholder="Placa" required>

        <label for="Marca">Marca:</label>
        <input type="text" id="Marca" name="Marca" placeholder="Marca" required>

        <label for="Refrigeracao">Refrigeração:</label>
        <input type="text" id="Refrigeracao" name="Refrigeracao" placeholder="Refrigeração" required>

        <label for="NumeroDePortas">Número de portas:</label>
        <input type="text" id="NumeroDePortas" name="NumeroDePortas" placeholder="Número de portas" required>

        <label for="TipoDeTrava">Tipo de trava:</label>
        <input type="text" id="TipoDeTrava" name="TipoDeTrava" placeholder="Tipo de trava" required>

        <label for="TipoDeVidro">Tipo de vidro:</label>
        <input type="text" id="TipoDeVidro" name="TipoDeVidro" placeholder="Tipo de vidro" required>

        <label for="Airbag">O veículo tem airbag?</label>
        <select id="Airbag" name="Airbag" required>
            <option value="Sim">Sim</option>
            <option value="Nao">Não</option>
        </select>

        <label for="TipoDeDirecao">Tipo de direção:</label>
        <input type="text" id="TipoDeDirecao" name="TipoDeDirecao" placeholder="Tipo de direção" required>

        <label for="NumeroDeAssentos">Número de assentos:</label>
        <input type="text" id="NumeroDeAssentos" name="NumeroDeAssentos" placeholder="Número de assentos" required>

        <label for="Preco">Preço da diária:</label>
<input type="text" id="Preco" name="Preco" placeholder="Preço" pattern="[0-9]+([,\.][0-9]+)?">

        <label for="ImagemVeiculo">Selecione uma imagem do veículo:</label>
        <input type="file" id="ImagemVeiculo" name="ImagemVeiculo" required>

        <input type="submit" value="Anunciar">
    </form>

</body>
</html>
