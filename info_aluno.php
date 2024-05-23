<?php
    session_start();
    include_once('verifica_professor.php');
    include_once('confinconnect.php');

            
    $mysql_aluno = "SELECT * FROM dados_aluno ORDER BY codigo_aluno ASC";
    $mysql_result =$conn->query($mysql_aluno);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Professor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style/style.css" type="text/css" media="all">
</head>
<body>
   <!-- <h2>Bem-Vindo Professor Por Código , <?php // echo $_SESSION['codigo_professor']?> </h2> -->
   <div class="Sistema_professor">
    <ul class="nave_proff">
        <li><a href="sair_sistema.php">Sair</a></li>
        <li><a  class="Print" href="dados_aluno.php">Dados</a></li>
        <li><a href="">ADM</a></li>
    </ul>
    <div class="tabela_sistema">
        <div class="m-4" id="TD">
            <div class="div_header">
                <ul class="heade_nav_tb">
                    <li><a id='l1' href="#">ID</a></li>
                    <li><a id='l2' href="#">Nome</a></li>
                    <li><a id='l3' href="#">Data_Nascimento</a></li>
                    <li><a id='l4' href="#">CPF(hash)</a></li>
                    <li><a id='l5' href="#">Curso</a></li>
                </ul>
            </div>
        <table  class="table" id="Tb">
        <tbody>
            <?php
            while($user_data = mysqli_fetch_assoc($mysql_result)){
                echo "<tr>";
                echo "<td id='ft'>".$user_data['codigo_aluno']."<td>";
                echo "<td id='ft'>".$user_data['Nome']."<td>";
                echo "<td id='ft'>".$user_data['data_nac']."<td>";
                echo "<td id='ft'>".$user_data['Cpf']."<td>";
                echo "<td id='ft'>".$user_data['Curso_scn']."<td>";
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

<style>
    #ft{
        font-size: 13px;
    }
</style>