<?php
session_start();
include_once('confinconnect.php');

if (isset($_POST['submit'])) {

    if (isset($_POST['nome']) || isset($_POST['dataTd']) || isset($_POST['presenca'])) {

        $id_fr = $_POST['id'];
        $nome = $_POST['nome'];
        $Cpf = $_POST['Cpf'];
        $dataTm = $_POST['dataTd'];
        $presenca = $_POST['presenca'];

        // Formatar a data
        $date = DateTime::createFromFormat('Y-m-d\TH:i', $dataTm);
        $formattedDate = $date->format('d/m/Y H:i');

        print_r($id_fr . "&nbsp;&nbsp;&nbsp;" . $nome . "&nbsp;&nbsp;&nbsp;" . $Cpf . "&nbsp;&nbsp;&nbsp;" . $formattedDate . "&nbsp;&nbsp;&nbsp;" . $presenca);

        if($nome == "" || $Cpf == ""|| $dataTm == ""||$presenca==""){
            $_SESSION['not_con'] = true;
        }
        else{
            $sql_query =mysqli_query($conn,"INSERT INTO frequencia_dados(nome,Cpf,dataTm,frq_aluno) VALUES('{$nome}','{$Cpf}','{$formattedDate}','{$presenca}')");
        }
    }
}

header("Location:frequencia_proff.php");
