<?php
session_start();
include_once("confinconnect.php");
include('verifica_aluno.php');

$query = "select codigo_aluno,Nome,Cpf,Curso_scn from dados_aluno where Cpf = '{$_SESSION['Cpf']}' and Curso_scn = '{$_SESSION['Curso_scn']}'";
$resul  = $conn->query($query);

while ($row = mysqli_fetch_object($resul)) {
    $Nome =  $row->Nome;
    $Cpf = $row->Cpf;
    $Curso = $row->Curso_scn;
}

if (isset($_POST['registrar'])) {

    if (isset($_POST['Nome']) || isset($_POST['cpf']) || isset($_POST['curso']) || isset($_POST['Present'])) {

        $nome = $_POST['Nome'];
        $cpf  = $_POST['cpf'];
        $curso = $_POST['curso'];
        $Present = $_POST['Present'];

        if ($nome !== $Nome || $cpf !== $Cpf || $curso !== $Curso || $Present !== "P") {
            header("Location:painel_aluno.php");
            $_SESSION['not_value_found'] = true;
        } else {
            if ($nome == "" || $cpf == "" || $curso == "" || $Present == "") {
                $_SESSION['value_marked_not_found'] = true;
                header("Location:painel_aluno.php");
            } else {

                date_default_timezone_set('America/Sao_Paulo');
                $dataAtual = date('d/m/Y H:i');

                $sql = "INSERT INTO frequencia_dados(nome, Cpf, dataTm, frq_aluno) VALUES('$nome', '$cpf', '$dataAtual', '$Present')";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    $_SESSION['frequencia_registrada'] = true;
                } else {
                    echo "<script>alert('".mysqli_error($conn)."')</script>";
                }

                var_dump($result);
                unset($_SESSION['Cpf']);
                unset($_SESSION['Curso_scn']);
                header("Location:pag_aluno.php");
            }
        }
    } else {
    }
}
