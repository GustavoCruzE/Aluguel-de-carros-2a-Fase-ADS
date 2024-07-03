<?php

    include("Conexao_Banco.php");

        $TipoVeiculo=$_POST['TipoVeiculo'];
        $Modelo=$_POST['Modelo'];
        $Placa=$_POST['Placa'];
        $Marca=$_POST['Marca'];
        $Refrigeracao=$_POST['Refrigeracao'];
        $NumeroDePortas=$_POST['NumeroDePortas'];
        $TipoDeTrava=($_POST['TipoDeTrava']);
        $TipoDeVidro=($_POST['TipoDeVidro']);
        $Airbag=$_POST['Airbag'];
        $TipoDeDirecao=$_POST['TipoDeDirecao'];
        $NumeroDeAssentos=$_POST['NumeroDeAssentos'];
        $Preco=$_POST['Preco'];
        $Disponibilidade = "Disponível";

        $Preco = str_replace(',', '.', $Preco);

        $ImagemPasta= "Imagens/";
        $ImagemPasta.$_FILES["ImagemVeiculo"]['name'];
        $ImagemArquivo= $ImagemPasta.basename($_FILES["ImagemVeiculo"]['name']);
        $TipoImagem= strtolower(pathinfo($ImagemArquivo,PATHINFO_EXTENSION));

        if ($TipoImagem == "jpg" || $TipoImagem == "png" || $TipoImagem == "jpeg"){
            move_uploaded_file($_FILES["ImagemVeiculo"]["tmp_name"],$ImagemArquivo);
        

         $sql="INSERT INTO InformacoesVeiculos(TipoVeiculo, Modelo, Placa, Marca, Refrigeracao, NumeroDePortas, TipoDeTrava, TipoDeVidro, Airbag, TipoDeDirecao, NumeroDeAssentos, Preco, ImagemVeiculo, Disponibilidade)
            VALUES ('$TipoVeiculo', '$Modelo', '$Placa', '$Marca', '$Refrigeracao', '$NumeroDePortas', '$TipoDeTrava', '$TipoDeVidro', '$Airbag', '$TipoDeDirecao', '$NumeroDeAssentos', '$Preco', '$ImagemArquivo', '$Disponibilidade')";
        
         if(mysqli_query($conexao, $sql)){
            header("Location: Campos_AnuncioVeiculos.php");
            exit();
            }
         else{
                echo "Erro".mysqli_connect_Error($conexao);

            }
         mysqli_close($conexao);
        }

        else {
            echo "Imagem inválida";
            ?>
            <br>
            <a href="Campos_AnuncioVeiculos.php">Voltar</a>
            <?php
        }
?>