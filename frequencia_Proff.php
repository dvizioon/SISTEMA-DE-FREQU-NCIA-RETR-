<?php
    session_start();
    include_once('verifica_professor.php');
    include_once('confinconnect.php');


    $mysql = "SELECT * FROM frequencia_aluno ORDER BY id ASC";
    $resut = $conn->query($mysql);
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Frequencia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <scrip src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style/style.css" type="text/css" media="all">
</head>
<body>

   <!-- <h2>Bem-Vindo Professor Por Código , <?php // echo $_SESSION['codigo_professor']?> </h2> -->
   <div class="Sistema_professor">
    <ul class="nave_proff">
        <li><a href="sair_sistema.php">Sair</a></li>
        <li><a  class="Print" href="dados_relatorio.php">DD_Fren</a></li>
        <li><a href="frequencia_Proff.php">Relatorio</a></li>
    </ul>
    <div class="tabela_sistema">
        <?php

          if(isset($_SESSION['not_con'])):
          $r = "<script>alert('Preenchas os campos *')</script>";
          
        ?>
        <?php
            echo $r;
        ?>
        <?php
        unset($_SESSION['not_con']);
            endif;
        ?>
        <div class="m-4" id="TD">
            <div class="div_header">
                <ul class="heade_nav_tb">
                    <li><a id='li1' href="#">Nome</a></li>
                    <li><a id='li2' href="#">Data_Nacimento</a></li>
                    <li><a id='li3' href="#">CPF</a></li>
                </ul>
            </div>
        <table  class="table" id="Tb">
        <tbody>
           <?php
                while($user_data = mysqli_fetch_assoc($resut)){
                    echo "<tr>";
                    echo "<td>".$user_data['id']."</td>";
                    echo "<td>".$user_data['Nome']."</td>";
                    echo "<td>".$user_data['Cpf']."</td>";
                    echo "<td><a href='relatorio_alun.php?fr=$user_data[id]' style='color:white;'>registrar Frequencia</a></td>";
                    echo "</tr>";
                }
           ?>
        </tbody>
        </table>
    </div> 
    </div>
   </div>
</body>
</html>