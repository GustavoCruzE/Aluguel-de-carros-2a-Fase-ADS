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
<link rel="stylesheet" href="styleCarros.css">
<title>Aluguel de Carros</title>
<style>
/* Estilos CSS que você pode continuar utilizando aqui */
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

<h1 style="text-align: center; color: #000000;">Nossos Carros</h1>
<div class="car-container">
    <?php
    while ($row = mysqli_fetch_assoc($VeiculosDisponiveis)){
    ?>
    <div class="car-slot">
        <img src="<?php echo $row['ImagemVeiculo'];?>">
        <br>
        <div class="car-info">
            <form action="Confirmar_Compra1.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="Placa" value="<?php echo $row['Placa'] ?>">Placa: <?php echo $row['Placa'] ?>
                <br>
                <input type="hidden" name="Marca"> Marca: <?php echo $row['Marca']; ?>
                <br>
                <input type="hidden" name="Refrigeracao"> Refrigeração: <?php echo $row['Refrigeracao']; ?>
                <br>
                <input type="hidden" name="NumeroDePortas"> Número de portas: <?php echo $row['NumeroDePortas']; ?> 
                <br>
                <input type="hidden" name="TipoDeTrava"> Tipo de trava: <?php echo $row['TipoDeTrava']; ?>
                <br>
                <input type="hidden" name="TipoDeVidro"> Tipo de vidro: <?php echo $row['TipoDeVidro']; ?>
                <br>
                <input type="hidden" name="Airbag"> Airbag: <?php echo $row['Airbag']; ?>
                <br>
                <input type="hidden" name="TipoDeDirecao"> Tipo de direção: <?php echo $row['TipoDeDirecao']; ?>
                <br>
                <input type="hidden" name="NumeroDeAssentos"> Número de assentos: <?php echo $row['NumeroDeAssentos']; ?>
                <br>
                <input type="hidden" name="Preco" value="<?php echo $row['Preco'] ?>">Diária: R$ <?php echo number_format($row['Preco'], 2, ',', '.'); ?>
                <br>
                <br>
                <?php
    if (isset($_SESSION['Nome'])) {
        // Usuário autenticado, mostrar botão de aluguel
        echo '<input type="submit" value="Alugar">';
    } else {
        // Usuário não autenticado, mostrar mensagem ou redirecionar para a página de login
        echo '<p>Para alugar, faça login primeiro.</p>';
        // Você pode adicionar aqui um link para a página de login
    }
    ?>
            </form>
            <br>
            <br>
        </div>
    </div>
    <?php
    }
    ?>
    <?php
    while ($row = mysqli_fetch_assoc($VeiculosIndisponiveis)){
    ?>
    <div class="car-slot">
        <img src="<?php echo $row['ImagemVeiculo'];?>">
        <br>
        <div class="car-info">
            <input type="hidden" name="Placa" value="<?php echo $row['Placa'] ?>">Placa: <?php echo $row['Placa'] ?>
            <br>
            <input type="hidden" name="Marca"> Marca: <?php echo $row['Marca']; ?>
            <br>
            <input type="hidden" name="Refrigeracao"> Refrigeração: <?php echo $row['Refrigeracao']; ?>
            <br>
            <input type="hidden" name="NumeroDePortas"> Número de portas: <?php echo $row['NumeroDePortas']; ?> 
            <br>
            <input type="hidden" name="TipoDeTrava"> Tipo de trava: <?php echo $row['TipoDeTrava']; ?>
            <br>
            <input type="hidden" name="TipoDeVidro"> Tipo de vidro: <?php echo $row['TipoDeVidro']; ?>
            <br>
            <input type="hidden" name="Airbag"> Airbag: <?php echo $row['Airbag']; ?>
            <br>
            <input type="hidden" name="TipoDeDirecao"> Tipo de direção: <?php echo $row['TipoDeDirecao']; ?>
            <br>
            <input type="hidden" name="NumeroDeAssentos"> Número de assentos: <?php echo $row['NumeroDeAssentos']; ?>
            <br>
            <input type="hidden" name="Preco" value="<?php echo $row['Preco'] ?>">Diária: R$ <?php echo number_format($row['Preco'], 2, ',', '.'); ?>
            <br>
            <button disabled>Indisponível</button>
            <br>
            <br>
        </div>
    </div>
    <?php
    }
    ?>
</div>

<footer>
    <div class="conteiner-footer-informações">
        <div class="column">
            <h3>NEGÓCIOS</h3>
            <ul>
                <li>Para empresas</li>
                <li>Seguradoras</li>
                <li>Seja um franqueado</li>
            </ul>
        </div>
        <div class="column">
            <h3>PARA VOCÊ</h3>
            <ul>
                <li>Minhas reservas</li>
                <li>Fidelidade</li>
                <li>Cadastre-se</li>
            </ul>
        </div>
        <div class="column">
            <h3>CONTATOS</h3>
            <ul>
                <li>Envie sua mensagem</li>
                <li><a href="pergunta.php">Perguntas Frequentes</a></li>                <li>Central de reservas - 0800 979 2020</li>
                <li>Assistência (Whatsapp) - 0800 979 2020</li>
            </ul>
        </div>
    </div>
</footer>

<footer>
    <div class="container-redes-sociais">
        <div class="social-icons">
        <a href="https://www.facebook.com/?locale=pt_BR"><img src="icones\facebook.png" alt="Facebook"></a>
                <a href="https://twitter.com/i/flow/login?input_flow_data=%7B%22requested_variant%22%3A%22eyJsYW5nIjoicHQifQ%3D%3D%22%7D"><img src="icones\twitter.png" alt="Twitter"></a>
                <a href="https://www.instagram.com/"><img src="icones\instagram.png" alt="Instagram"></a>
                <a href="https://br.linkedin.com/?src=go-pa&trk=sem-ga_campid.12619604099_asid.149519181115_crid.657343811713_kw.linkedin_d.c_tid.kwd-148086543_n.g_mt.e_geo.9102242&mcid=6821526239111716925&cid=&gad_source=1&gclid=CjwKCAjwl4yyBhAgEiwADSEjeECSMCrQKQqm83S-ZULEy21i5ZyGUW8l24FR5AZV2nOBOYuEXvramBoCgF4QAvD_BwE&gclsrc=aw.ds"><img src="icones\linkedin.png" alt="Linkedin"></a></div>
        </div>
</footer>

<footer>
    <div class="container-footer-final">
        <p>&copy; 2024 Aluguel de Carros. Todos os direitos reservados.</p>
    </div>
</footer>

</body>
</html>
