<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css" type="text/css" media="all">
    <script src="js/node.js"></script>
    <title>Login Aluno</title>
</head>
<body>
   <div class="conteiner" style="height:460px;">
    <?php
     if(isset($_SESSION['not_autentic_alun'])):
    ?>
    <div class="alert_danger_alun">
        <h2>Student not found</h2>
    </div>
    <?php
    unset($_SESSION['not_autentic_alun']);
    endif;
    ?>
    <form name='formeuser' action="connectdb.php" method="POST">

    <?php 
        if(isset($_SESSION['frequencia_registrada']) === true):
    ?>
    <div>Já Registrado</div>
    <?php endif;?>
        <fieldset class="fildform" style="height:390px;">
            <legend class="fildlsl">Login Aluno</legend>
            <div class="box">
                <fieldset class="fildbox">
                <legend class="fildlegd">CPF:</legend>
                <input type="text" name="cpf_aluno" id="Email" class="user_input" placeholder="Digite Seu Cpf..." maxlength="25">
                </fieldset>
            </div>
            <div class="box">
                <fieldset class="fildbox">
                    <legend class="fildlegd">Data:</legend>
                <input type="password" name="data_aluno" id="" class="user_input_senha" placeholder="Digite sua Data..." maxlength="12">
                </fieldset>
            </div>
            <div class="box">
                <fieldset class="fildbox">
                    <legend class="fildlegd">Curso:</legend>
                    <select name="op_curso" id="">
                        <option value="0">Curso....</option>
                        <option value="Programador De sistema">Programador De sistema</option>
                        <option value="Programador web">Programador web</option>
                    </select>
                </fieldset>
            </div>
            <div class="btn-submit">
                <input type="submit" name="submit_aluno" onclick="return validar()" id="submit" class="user_submit">
            </div>
            <div class="btnanco">
                <a class="anco" href="pag_professor.php">Sou Professor</a>
            </div>
        </fieldset>
    </form>
   </div> 

</body>
</html>

<script>

    const txpass = document.querySelector(".user_input_senha");
    const btn = document.querySelector(".btnpass");

    btn.onclick = () =>{
        
        if(txpass.type == 'password')
        {
            txpass.type = 'text';
            btn.style.fontWeight = 'bolder';
            btn.innerHTML ='O';
        }
        else
        {
            txpass.type = 'password';
            btn.style.fontWeight = 'bolder';
            btn.innerHTML ='M';
        }
    }





</script>
