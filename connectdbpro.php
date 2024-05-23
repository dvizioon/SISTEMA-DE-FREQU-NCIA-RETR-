<?php

    session_start();
    include_once('confinconnect.php');

    if(empty($_POST['codigo_professor'])||empty($_POST['senha_professor'])){
        header('Location:pag_professor.php');
        exit();

    }

    $codigo_professor = mysqli_real_escape_string($conn,$_POST['codigo_professor']);
    $senha_professor = mysqli_real_escape_string($conn,$_POST['senha_professor']);

    $query_proff = "select id,codigo from professor where codigo ={$codigo_professor} and senha = md5('{$senha_professor}')";

    $result_proff = mysqli_query($conn,$query_proff);

    $row_proff = mysqli_num_rows($result_proff);

    echo $row_proff;

    if($row_proff == 1){
        $_SESSION['codigo'] = $codigo_professor ;
        header("Location:painel_professor.php");
        exit();
    }
    else{
        $_SESSION['not_autentic_proff'] = true;
        header('Location:pag_professor.php');
        exit;
    }



?>