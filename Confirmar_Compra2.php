<?php
    require_once 'Conexao_Login.php';
    session_start();

    $CPF = isset($_SESSION['CPF']) ? $_SESSION['CPF'] : '';
    $PrecoFinal = $_POST['PrecoFinal'];
    $DataDeRetirada = $_POST['DataDeRetirada'];
    $DataDeDevolucao = $_POST['DataDeDevolucao'];
    $Placa = $_POST['Placa'];

    $sql = "SELECT * FROM InformacoesVeiculos WHERE Placa = '$Placa'";
    $sqlInfo = $mysqli->query($sql);

    while ($row = mysqli_fetch_assoc($sqlInfo)){
        $Modelo = $row['Modelo'];
        $Marca = $row['Marca'];
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resumo da Reserva</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 0px;
}

.containertotal {
    font-family: Arial, sans-serif;
    background-color: #ffffff;
    display:flex;
    justify-content: center;
    align-items: center;
    margin: 0;
}

.container {
    background-color: #eeeeee;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    border-radius: 8px;
    width: 90%;
    max-width: 600px;
    padding: 20px;
    text-align: center;
    margin: 5% 0% 10% 0%;
}

h2 {
    color: #343a40;
    margin-bottom: 20px;
}

.section {
    margin-bottom: 20px;
}

.section h3 {
    color: #5af350;
    margin-bottom: 10px;
}

.section p {
    color: #495057;
    margin: 5px 0;
}

.special-offer, .protection {
    text-align: left;
    background-color: #e9ecef;
    padding: 10px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);

}

.total-cost {
    font-size: 1.2em;
    font-weight: bold;
    color: #28a745;
}

.container-header {
width: 70%;
margin: 0 auto;
background: rgb(13, 63, 0);
color: #fff;
padding: 20px;
border-radius: 0px 0px 25px 25px;
display: flex;
justify-content: space-between;
}

header h1 {
display: inline-block;
font-family: 'Courier New', Courier, monospace;
margin: 0;
}

nav {
display: inline-block;
font-family: 'Courier New', Courier, monospace;
margin-top: 20px;
}

nav ul {
list-style: none;
}

nav ul li {
display: inline;
margin-left: 20px;
}

nav ul li a {
text-decoration: none;
color: #fff;
}

footer {
background-color: rgb(13, 63, 0);
color: #fff;
padding: 40px 0;
font-family: 'Courier New', Courier, monospace;
}

.column {
width: 30%;
}

.column h3 {
font-size: 18px;
margin-bottom: 10px;
color: rgb(56, 167, 56);
}

.column ul {
list-style: none;
padding: 0;
}

.column ul li {
margin-bottom: 5px;
}

.column ul li a {
color: #fff;
text-decoration: none;
}

.column ul li a:hover {
text-decoration: underline;
}

footer {
background-color:rgb(13, 63, 0);
color: #fff;
padding: 1px;
}

.conteiner-footer-informações {
display: flex;
justify-content: space-between;
max-width: 1200px;
margin: 0 auto;
margin-top: 20px;
}

.column {
width: 30%;
}

.column h3 {
font-size: 18px;
margin-bottom: 10px;
}

.column ul {
list-style: none;
padding: 0;
}

.column ul li {
margin-bottom: 5px;
}

.column ul li a {
color: #fff;
text-decoration: none;
}

.column ul li a:hover {
text-decoration: underline;
}

.container-redes-sociais {
max-width: 1200px;
margin: 0 auto;
background-color:rgb(13, 63, 0);
padding: 5px 0;
text-align: center;
}

.social-icons a {
display: inline-block;
margin: 0 10px;
}

.social-icons img {
width: 70px; /* Defina o tamanho desejado para todos os ícones */
height: 70px;
}

.social-icons img{filter: invert(100%);}

.container-footer-final{
background: rgb(13, 63, 0);
color: #fff;
padding: 20px 0;
text-align: center;
}

.purchase-button {
    background-color: #4CAF50; /* cor de fundo */
    border: none; /* remover borda */
    color: white; /* cor do texto */
    padding: 15px 32px; /* espaçamento interno */
    text-align: center; /* alinhar texto */
    text-decoration: none; /* remover sublinhado */
    display: inline-block; /* exibir como bloco */
    font-size: 16px; /* tamanho da fonte */
    margin: 4px 2px; /* margem */
    cursor: pointer; /* cursor ao passar */
    border-radius: 8px; /* borda arredondada */
}

.purchase-button:hover {
    background-color: #7bff82; /* nova cor de fundo ao passar o mouse */
}
</style>
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


 <div class="containertotal"  >
    <div class="container">
        <h2>Resumo da Reserva</h2>
        <div class="section">
            <h3>Retirada</h3>
            <?php echo "$DataDeRetirada" ?>
            <p>LOCAL: Locação Palhoça</p>
        </div>
        <div class="section">
            <h3>Devolução</h3>
            <?php echo "$DataDeDevolucao" ?>
            <p>LOCAL: Locação Palhoça</p>
        </div>
        <div class="section">
            <h3>Informações do Carro</h3>

            <p>Modelo:<?php echo isset($Modelo) ?></p>
            <p>Marca: <?php echo isset($Marca) ?></p>
            <p>Valor final: R$ <?php echo number_format($PrecoFinal, 2, ',', '.'); ?></p>

        </div>
        <form action="FimCompra.php" method ="post">
            <input type="hidden" name="Placa" value="<?php echo $Placa ?>">
            <input type="hidden" name="CPF" value="<?php echo $CPF ?>">
            <input type="hidden" name="PrecoFinal" value="<?php echo $PrecoFinal ?>">
            <input type="hidden" name="DataDeRetirada" value="<?php echo $DataDeRetirada ?>">
            <input type="hidden" name="DataDeDevolucao" value="<?php echo $DataDeDevolucao ?>">
            <button class="purchase-button">Comprar</button>
        </form>
        </div>
    </div>
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
