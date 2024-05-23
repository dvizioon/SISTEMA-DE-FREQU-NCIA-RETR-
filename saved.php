<?php
    include_once('confinconnect.php');

    if(isset($_POST['Update'])){
        $ID = $_POST['id'];
        $Edit_codigo = $_POST['Edit_codigo'];
        $Edit_senha = $_POST['Edit_senha'];
        $Conf_Senha = $_POST['confirma_senha'];

        if(filter_var($Edit_codigo,FILTER_SANITIZE_NUMBER_INT))
        {   
            $Update = "UPDATE professor SET codigo = '{$Edit_codigo}' , senha = md5('{$Edit_senha}'),confirma_Senha = '{$Conf_Senha}' WHERE id='{$ID}'";
            $UpResu = $conn->query($Update);
        }
        else{
           echo 'Email Invalido';
        }


    }
    header("Location:painel_professor.php");




?>