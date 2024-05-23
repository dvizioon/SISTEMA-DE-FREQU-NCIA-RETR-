<?php
session_start();
    include_once('verifica_professor.php');
    include_once('confinconnect.php');

    if(!empty($_GET['id'])){
        $id = $_GET['id'];

        $mysql_query_alun = "SELECT * FROM professor WHERE id=$id";
        $result_query_alun = $conn->query($mysql_query_alun);

        if($result_query_alun ->num_rows>0){
            while($user_data = mysqli_fetch_assoc($result_query_alun)){
                $email = $user_data['codigo'];
                $senha = $user_data['senha'];
                $cofir = $user_data['confirma_Senha'];
            }
            // print_r($email);
            // print_r($senha);
        }
        else{
            header("Location:painel_professor.php");
        }
    }
    else{
        header("Location:painel_professor.php");
    }

            
 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar ALuno</title>
    <link rel="stylesheet" href="style/style.css" type="text/css" media="all">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
   <!-- <h2>Bem-Vindo Professor Por Código , <?php // echo $_SESSION['codigo_professor']?> </h2> -->
   <div class="Sistema_professor">
    <ul class="nave_proff_edit">
        <li><a href="painel_professor.php">Voltar</a></li>
        <li><a href="sair_sistema.php">Sair</a></li>
        <li><a href="">Sobre</a></li>
    </ul>
    <div class="tabela_sistema">
        <fieldset>
        <form action="saved.php" method="POST" name='formuser'>
            <div class="box_lli">
                <fieldset>
                    <legend class="lgd" >Codigo:</legend>
                <input type="text" name="Edit_codigo" id="Email" value="<?php echo $email ?>" placeholder="Editar codigo@professor.com...">
                </fieldset>
            </div>
            <div class="box_lli">
                <fieldset>
                    <legend  class="lgd" >Senha em MD5()</legend>
                    <input type="text" name="Edit_senha" value="<?php echo $senha ?>" placeholder="Editar Senha...">
                </fieldset>
            </div>
            <div class="box_lli">
                <fieldset>
                    <legend  class="lgd" >Lembrete da Senha em MD5()</legend>
                    <input type="text" name="confirma_senha" value="<?php echo $cofir ?>" placeholder="Confirma Senha..." required>
                </fieldset>
            </div>
            <div class="box_lli">
                <input type="hidden" name="id" value="<?php echo $id?>">
                <button class="box-btn" type="submit" name="Update" onclick="return validar()">Gerar Md5()</button>
            </div>
        </fieldset>
        </form>
    </div> 
    </div>
   </div>
    <img src="style/backvideo.gif" class="backvideo">
</body>
</html>


