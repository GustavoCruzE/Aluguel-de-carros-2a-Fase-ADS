<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }
        .button-container {
            text-align: center;
            margin-top: 20px; /* Espaço acima dos botões */
        }
        .button-container button {
            margin: 10px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .button-container button:hover {
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
    <div class="button-container">
        <button onclick="window.location.href='Campos_AnuncioVeiculos.php';">Anunciar carros</button>
        <button onclick="window.location.href='Campos_RemocaoVeiculos.php';">Remover carros</button>
        <button onclick="window.location.href='Campos_DisponibilidadeVeiculos.php';">Disponibilidade dos carros</button>
    </div>
</body>
</html>
