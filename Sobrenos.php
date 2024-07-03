<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós</title>
    <link rel="stylesheet" href="stylessobrenos.css">
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
    <div class="container">
        <h1>Sobre Nós</h1>
        <div class="member">
            <img src="gustavo.jpg" alt="Gustavo da Cruz Espindola">
            <h2>Gustavo da Cruz Espindola</h2>
            <p><strong>Cargo:</strong> Desenvolvedor</p>
            <p><strong>Descrição:</strong> Gustavo é o desenvolvedor principal da nossa equipe. Com uma vasta experiência em programação e desenvolvimento de software, ele se dedica a criar soluções inovadoras e eficientes. Gustavo está sempre atualizado com as últimas tecnologias e tendências do mercado.</p>
            <p><strong>Interesses:</strong> Tecnologia, programação, leitura, viagens.</p>
        </div>
        <div class="member">
            <img src="vitor.jpg" alt="Vitor Goetmann">
            <h2>Vitor Goetmann</h2>
            <p><strong>Cargo:</strong> Agilista</p>
            <p><strong>Descrição:</strong> Vitor é o agilista da equipe, garantindo que todos os processos sejam ágeis e eficientes. Sua habilidade em gerenciar projetos e otimizar fluxos de trabalho é essencial para nosso sucesso. Vitor acredita na importância da colaboração e na melhoria contínua.</p>
            <p><strong>Interesses:</strong> Gestão de projetos, esportes, música, natureza.</p>
        </div>
        <div class="member">
            <img src="imagens\lucas.png" alt="Lucas dos Santos Soares">
            <h2>Lucas dos Santos Soares</h2>
            <p><strong>Cargo:</strong> Product Owner</p>
            <p><strong>Descrição:</strong> Lucas é o Product Owner, responsável por definir a visão e a estratégia dos nossos produtos. Com um profundo conhecimento do mercado e das necessidades dos clientes, ele trabalha para garantir que nossos produtos sejam relevantes e inovadores.</p>
            <p><strong>Interesses:</strong> Inovação, mercado de produtos, jogos, cinema.</p>
        </div>
        <div class="contact">
            <h2>Contato</h2>
            <p><strong>Email:</strong> contato@nossaempresa.com</p>
            <p><strong>Telefone:</strong> (11) 1234-5678</p>
            <p><strong>Endereço:</strong> Rua das Inovações, 123, São Paulo, SP, Brasil</p>
        </div>
    </div>
    
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
                    <li>Perguntas frequentes</li>
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
