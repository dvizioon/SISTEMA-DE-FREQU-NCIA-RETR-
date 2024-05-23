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
    <title>Login Professor</title>
</head>
<body>
   <div class="conteiner">
   <?php
     if(isset($_SESSION['not_autentic_proff'])):
    ?>
    <div class="alert_danger_proff">
        <h2>Teacher not found</h2>
    </div>
    <?php
    unset($_SESSION['not_autentic_proff']);
    endif;
    ?>
    <form name="formeuser" action="connectdbpro.php" method="POST">
        <fieldset class="fildform">
            <legend class="fildlsl">Login Professor</legend>
            <div class="box">
                <fieldset class="fildbox">
                <legend class="fildlegd">Código</legend>
                <input type="text" name="codigo_professor" id="codigo" class="user_input" placeholder="Digite Seu Código..." maxlength="12" onkeydown="return somenteNumeros(event)">
                <!-- <input type="number" name="codigo_professor" id="nome" class="user_input" placeholder="Digite Seu Código..." maxlength="12"> -->
                </fieldset>
            </div>
            <div class="box">
                <fieldset class="fildbox">
                    <legend class="fildlegd">Senha</legend>
                <input type="password" name="senha_professor" id="senha" class="user_input_senha" placeholder="Digite sua Senha..." maxlength="12">
                </fieldset>
            </div>
            <div class="btn-submit">
                <input type="submit" name="submit" onclick="return validar()" class="user_submit">
            </div>
            <div class="btnanco">
                <a class="anco" href="pag_aluno.php">Sou Aluno</a>
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


    function validar(){
        var codigo = formeuser.codigo.value;
        var senha = formeuser.senha.value;

        if(codigo == ""){
            alert('Preencha Campo Codigo * ');
            nome.formeuser.focus();
            return false;
        }

        if(senha == ""){
            alert('Preencha Campo Senha * ');
            senha.formeuser.focus();
            return false;
        }

       
    }

    function somenteNumeros(e) {
        var charCode = e.charCode ? e.charCode : e.keyCode;
        // charCode 8 = backspace   
        // charCode 9 = tab
        if (charCode != 8 && charCode != 9) {
            // charCode 48 equivale a 0   
            // charCode 57 equivale a 9
            if (charCode < 48 || charCode > 57) {
                return false;
            }
        }
    }
</script>
