<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aluguel de Carros</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container-header">
            <h1>Aluguel de Carros</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Início</a></li>
                    <li><a href="Pagina_Carros.php">Carros Disponíveis</a></li>
                    <li><a href="sobrenos.php">Sobre Nós</a></li>
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


    <div class="carousel">
        <input type="radio" id="slide1" name="slide" checked>
        <input type="radio" id="slide2" name="slide">
        <input type="radio" id="slide3" name="slide">
       
        <div class="slides">
            <div class="slide slide1"></div>
            <div class="slide slide2"></div>
            <div class="slide slide3"></div>
        </div>

        <div class="navigation">
            <label for="slide1"></label>
            <label for="slide2"></label>
            <label for="slide3"></label>
        </div>
    </div>

    <section class="banner">
        <div class="container">
            <a href="Pagina_Carros.php" class="btn">Ver Carros Disponíveis</a>
        </div>
    </section>


    <footer id="footer-informações">
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
                    <li><a href="pergunta.php">Perguntas Frequentes</a></li>
                    <li>Central de reservas - 0800 979 2020</li>
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
                <a href="https://br.linkedin.com/?src=go-pa&trk=sem-ga_campid.12619604099_asid.149519181115_crid.657343811713_kw.linkedin_d.c_tid.kwd-148086543_n.g_mt.e_geo.9102242&mcid=6821526239111716925&cid=&gad_source=1&gclid=CjwKCAjwl4yyBhAgEiwADSEjeECSMCrQKQqm83S-ZULEy21i5ZyGUW8l24FR5AZV2nOBOYuEXvramBoCgF4QAvD_BwE&gclsrc=aw.ds"><img src="icones\linkedin.png" alt="Linkedin"></a>
            </div>
        </div>
    </footer>


    <footer>
        <div class="container-footer-final">
            <p>&copy; 2024 Aluguel de Carros. Todos os direitos reservados.</p>
        </div>
    </footer>
</body>
</html>
