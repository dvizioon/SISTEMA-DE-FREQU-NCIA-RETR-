<?php
session_start();
include_once("confinconnect.php");
include('verifica_aluno.php');
// print_r($_SESSION);exit();

// if(!isset($_SESSION['nome_aluno']) == true){
//     session_destroy();
//     header("Location:index.php");

// }
$query = "select codigo_aluno,Nome,Cpf,Curso_scn from dados_aluno where Cpf = '{$_SESSION['Cpf']}' and Curso_scn = '{$_SESSION['Curso_scn']}'";
$resul  = $conn->query($query);

while ($row = mysqli_fetch_object($resul)) {
    $Nome =  $row->Nome;
    $Cpf = $row->Cpf;
    $Curso = $row->Curso_scn;
}

?>

<?php


if (!isset($_GET['nome'])) {
    echo "";
} else {

    if ($_GET['nome'] !== $Nome) {
    } else {
        $nome = "%" . trim($_GET['nome']) . "%";
        $db = new PDO('mysql:host=seu_host;dbname=seu_banco', 'seu_usuario', 'sua_senha');
        $cns = $db->prepare('SELECT * FROM `frequencia_dados` WHERE `Nome` LIKE :Nome');

        $cns->bindParam(':Nome', $nome, PDO::PARAM_STR);

        $cns->execute();

        $result = $cns->fetchAll(PDO::FETCH_ASSOC);

        // print_r($result);
    }
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Professor</title>
    <link rel="stylesheet" href="./style/style.css" type="text/css" media="all">
    <style>
        .btns_fren {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 200px;
            height: 50px;
            justify-items: center;
            align-items: center;
        }

        .chech {
            text-align: center;
            margin-left: 5px;
            width: 30px;
            height: 30px;
        }

        .sub {
            display: block;
            text-align: center;
            width: 200px;
            height: 50px;
            font-size: 22px;
        }

        label {
            font-size: 40px;
            margin-left: 50px;
        }

        .user {
            width: 1px;
            height: 1px;
            display: none;
        }
    </style>
</head>

<body>
    <div class="Sistema_alun">
        <div class="tabela_sistema_alun">
            <textarea disabled name="" id="" style="max-width:510px;max-height:30px;min-width:510px;min-height:30px;" class="texto" cols="70" rows="1" value=""><?php echo $Nome; ?> <?php echo $Cpf; ?> <?php echo $Curso; ?> => Chave de Acesso</textarea>

            <form action="painel_aluno.php" method="GET">
                <div class="relatorio">
                    <input type="hidden" name="nome" value="<?php echo $Nome; ?>">
                    <input type="submit" value="Gerar Fequência" name="submit" style="margin-left:80px;margin-top:20px;">
            </form>
        </div>
        <textarea name="" id="" cols="30" rows="10" style="height:270px;margin-top:10px;margin-left:20px;max-height:270px;min-height:270px;">
    <?php

    if (isset($_GET['submit'])) {

        if ($_GET['nome'] !== $Nome) {

            echo "Você não tem autorização para get=> " . $_GET['nome'];
        } else {
            if (count($result)) {
                foreach ($result as $Resultados) {
                    echo ($Resultados['nome']), "  ", ($Resultados['dataTm']), "  ", ($Resultados['frq_aluno']);
                    echo "\n";
                    echo "    ";
                }
            } else {
                echo "Não Foi Encontados Resultados";
            }
        }
    }

    ?>
    </textarea>
        <input disabled name="" id="" cols="30" rows="0" style="display: block;padding-top:-40px; margin-left:20px;width:245px;text-align:center;" value=" <?php

                                                                                                                                                            if (isset($_GET['submit'])) {


                                                                                                                                                                if ($_GET['nome'] !== $Nome) {
                                                                                                                                                                    echo $_GET['nome'] . " !== " . $Nome . " Erro";
                                                                                                                                                                } else {
                                                                                                                                                                    echo $nome . " == " . $Nome . " Sucesso";
                                                                                                                                                                }
                                                                                                                                                            }

                                                                                                                                                            ?>">

        <form action="registrar.php" method="post">
            <div class="btns_fren">
                <label>P</label>
                <input type="hidden" class="user" name="Nome" value="<?php echo $Nome ?>">
                <input type="hidden" class="user" name="cpf" value="<?php echo $Cpf ?>">
                <input type="hidden" class="user" name="curso" value="<?php echo $Curso ?>">
                <input type="checkbox" name="Present" value="P" class="chech" id="">
                <input type="submit" class="sub" name="registrar" value="Registra Frêquncia">
            </div>
        </form>

    </div>
    </div>

</body>

</html>