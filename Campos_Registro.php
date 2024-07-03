
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registro Estilizado</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .register-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 400px;
        width: 100%;
    }

    .register-container h2 {
        margin-bottom: 20px;
        text-align: center;
    }

    .register-container input[type="text"],
    .register-container input[type="email"],
    .register-container input[type="password"],
    .register-container input[type="tel"],
    .register-container input[type="date"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }

    .register-container input[type="submit"] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .register-container input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>

<div class="register-container">
<?php

session_start();

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['Nome'], $_POST['Sobrenome'],$_POST['CPF'],$_POST['Telefone'],$_POST['Email'],$_POST['Senha'],$_POST['ConfirmarSenha'],$_POST['DataDeNascimento'])){

        include("Conexao_Banco.php");

        $Nome=$_POST['Nome'];
        $Sobrenome=$_POST['Sobrenome'];
        $CPF=$_POST['CPF'];
        $Telefone=$_POST['Telefone'];
        $Email=$_POST['Email'];
        $Senha=($_POST['Senha']);
        $ConfirmarSenha=($_POST['ConfirmarSenha']);
        $DataDeNascimento=$_POST['DataDeNascimento'];
        $Cargo = "Cliente";

        $dataAtual = new DateTime();
        $dataSelecionada = new DateTime($DataDeNascimento);
        $diferenca = $dataAtual->diff($dataSelecionada);
        $anos = $diferenca->y;


        if ($Senha === $ConfirmarSenha) {

            
         if ($anos >= 18 AND $anos <= 100){

            $sql="INSERT INTO InformacoesLogin(Nome, Sobrenome, CPF, Telefone, Email, Senha, DataDeNascimento, Cargo)
            VALUES ('$Nome', '$Sobrenome', '$CPF', '$Telefone', '$Email', '$Senha', '$DataDeNascimento', '$Cargo')";

            if(mysqli_query($conexao, $sql)){
                header("Location: Campos_Login.php");
                exit();
            }
         }
            else{  ?>
             <h2>Idade inválida.</h2> <?php
            }
        
    }
    
        else { ?>
            <h2>Senhas diferentes.</h2> <?php
        }
    }
}
?>
    <h2>Registro</h2>
    <form method="post">
        <input type="text" name="Nome" placeholder="Nome" required>
        <input type="text" name="Sobrenome" placeholder="Sobrenome" required>
        <input type="text" name="CPF" placeholder="CPF" required>
        <input type="tel" name="Telefone" placeholder="Número de Telefone" required>
        <input type="email" name="Email" placeholder="Email" required>
        <input type="password" name="Senha" placeholder="Senha" required>
        <input type="password" name="ConfirmarSenha" placeholder="Confirmar Senha" required>
        <input type="date" name="DataDeNascimento" required>
        <input type="submit" value="Registrar-se">
        <a href="javascript:history.back()">Voltar</a>
    </form>
</div>

</body>
</html>