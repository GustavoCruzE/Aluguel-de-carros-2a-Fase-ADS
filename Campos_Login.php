
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login Estilizado</title>
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

    .login-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        max-width: 300px;
        width: 100%;
    }

    .login-container h2 {
        margin-bottom: 20px;
        text-align: center;
    }

    .login-container input[type="text"],
    .login-container input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
    }

    .login-container input[type="submit"] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    .login-container input[type="submit"]:hover {
        background-color: #45a049;
    }

    .forgot-password {
        text-align: center;
    }
</style>
    <head>
        <meta charset="utf-8">
        <title>Página de Login</title>
    </head>
    <body>
    <div class="login-container">
    <?php
    session_start();
    include('Conexao_Login.php');

    if(isset($_SESSION['ID'])) {
        header("Location: index.php");
        exit();
    }

    if(isset($_POST['CPF']) || isset($_POST['Senha'])) {

        if(strlen($_POST['CPF']) == 0) { ?>
            <h2>Preencha seu CPF</h2> <?php
        } else if(strlen($_POST['Senha']) == 0) { ?>
            <h2>Preencha sua senha</h2> <?php
        } else {

            $CPF = $mysqli->real_escape_string($_POST['CPF']);
            $Senha = $mysqli->real_escape_string ($_POST['Senha']);

            $sql_code = "SELECT * FROM InformacoesLogin WHERE CPF = '$CPF' AND Senha = '$Senha'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

            $quantidade = $sql_query->num_rows;

            if($quantidade == 1) {

                $Login = $sql_query->fetch_assoc();

                if(!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['redirect_url'] = $_SERVER['HTTP_REFERER'];
                
                $_SESSION['ID'] = $Login['ID'];
                $_SESSION['Nome'] = $Login['Nome'];
                $_SESSION['CPF'] = $CPF;
                $_SESSION['Cargo'] = $Login['Cargo'];

                setcookie("ID", $Login['ID'], time() + (86400 * 30), "/");
                setcookie("Nome", $Login['Nome'], time() + (86400 * 30), "/");
    
                header("Location: index.php");
                exit();
            }
            else {
                ?> <h2>CPF ou senha incorreto.</h2> <?php
            }

        }

    }

?>


    <h2>Login</h2>
    <form method="post">
        <input type="text" name="CPF" placeholder="Insira seu CPF" required>
        <input type="password" name="Senha" placeholder="Insira sua senha" required>
        <input type="submit" value="Login">
    </form>
    <div class="forgot-password">
        <br>
        <a href="Campos_Registro.php">Registrar-se</a>
        <br>
        <a href="javascript:history.back()">Voltar</a>
    </div>
</div>

    </body>
</html>
