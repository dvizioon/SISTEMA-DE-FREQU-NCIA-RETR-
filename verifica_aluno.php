<?php
    // session_start();
    if(!isset($_SESSION['Cpf']) || !isset($_SESSION['Curso_scn'])){
        header("Location:pag_aluno.php");
        exit();
    }


?>