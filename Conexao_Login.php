<?php
    $servidor="localhost";
    $usuario="root";
    $senha="";
    $dbname="Projeto_Integrador";
    
    $mysqli= new mysqli($servidor, $usuario, $senha, $dbname);
    if ($mysqli->error){
        die("Houve um erro: ". $mysqli->error);
    }
    ?>