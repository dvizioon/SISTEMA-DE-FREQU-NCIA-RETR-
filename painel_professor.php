<?php
    session_start();
    include_once('verifica_professor.php');
    include_once('confinconnect.php');

            
    $mysql_proff = "SELECT * FROM professor ORDER BY id ASC";
    $resul_proff =$conn->query($mysql_proff);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Professor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/style.css" type="text/css" media="all">
</head>
<body>
   <!-- <h2>Bem-Vindo Professor Por Código , <?php // echo $_SESSION['codigo_professor']?> </h2> -->
   <div class="Sistema_professor">
    <ul class="nave_proff">
        <li><a href="sair_sistema.php">Sair</a></li>
        <li><a  class="Print" href="dados_aluno.php">Dados</a></li>
        <li><a href="frequencia_Proff.php">Frequêcia</a></li>
    </ul>
    <div class="tabela_sistema">
        <div class="m-4" id="TD">
            <div class="div_header">
                <ul class="heade_nav_tb">
                    <li><a id='li1' href="#">ID</a></li>
                    <li><a id='li2' href="#">Codigo</a></li>
                    <li><a id='li3' href="#">Senha</a></li>
                    <li><a id='li4' href="#">Lembrente_senha</a></li>
                </ul>
            </div>
        <table  class="table" id="Tb">
        <tbody>
            <?php
            while($user_data = mysqli_fetch_assoc($resul_proff)){
                echo "<tr>";
                echo "<td>".$user_data['id']."<td>";
                echo "<td>".$user_data['codigo']."<td>";
                echo "<td>".$user_data['senha']."<td>";
                echo "<td>".$user_data['confirma_Senha']."<td>";
                echo "<td>
                <a id='btn' class='btn btn-sm btn-primary' href='edit.php?id=$user_data[id]'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
                <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
                <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
                </svg>
                </a>
                <a id='btn' class='btn btn-sm btn-danger' href='delete.php?id=$user_data[id]'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                </svg>
                </a>
                </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
        </table>
        <form action="painel_professor.php" method="POST">
            <table>
                <div class="form_add">
                <tbody id="tbody">

                </tbody>
                </div>
            </table>
            <div class="add_btn">
            <button type="button" onclick="addcampo()"> + </button>
            </div>
            <div class="add_btn1">
            <button type="submit" name='Enviar' id='btnsub' style="display:none;"> Enviar </button>
            </div>
        </form>
    </div> 
    </div>
   </div>
</body>
</html>

<script>

    var control = 0;

    function addcampo(){
        control++;

        var html = "<tr>";
            html+= "<td class='control'>"+control+"</td>"
            html+= "<td><label class='label_camp'>Codigo:</label></td>"
            html+= "<td><input type='number' class='input_camp' name='Nome_ADD[]'></td>"
            html+= "<td><label class='label_camp'>Senha:</label></td>"
            html+= "<td><input type='password' class='input_camp' name='Senha_ADD[]'></td>"
            html+= "<td><label class='label_camp'>Confirmar_senha:</label></td>"
            html+= "<td><input type='password' class='input_camp' name='Confi_ADD[]'></td>"
            html+= "<td><input type='button' onclick='delcamp(this)' value=' - '></td>"
            html+= "</tr>"

            var row = document.getElementById('tbody').insertRow();
            row.innerHTML = html;

            var btn = document.getElementById('btnsub').style.display='block';
    }

    function delcamp(button){
        button.parentElement.parentElement.remove();
    }


</script>

<?php
    
    if(isset($_POST['Enviar'])){
        // echo 'Yes';
    echo "<meta http-equiv='refresh' content='0'>";
    if(isset($_POST['Nome_ADD'])||isset($_POST['Senha_ADD'])||isset($_POST['Confi_ADD'])){

        $Nome_ADD = implode($_POST['Nome_ADD']);
        $Senha_ADD = implode($_POST['Senha_ADD']);
        $Confi_ADD = implode($_POST['Confi_ADD']);

        if(empty($Nome_ADD) || empty($Senha_ADD) || empty($Confi_ADD)){
            echo "<script>alert('Preencha os Campos *')</script>";
        }
        else{
            
            if($Senha_ADD === $Confi_ADD){
                
            $id = mysqli_insert_id($conn);
            //var_dump($conn);
            $a = 0;
            for($a = 0;$a < count($_POST['Nome_ADD']) and count ($_POST['Senha_ADD']) and count ($_POST['Confi_ADD']);$a++ )
            {
              echo $a;
              $sql = "INSERT INTO professor(codigo,senha,confirma_Senha) VALUES('".$_POST["Nome_ADD"][$a]."','".md5($_POST["Senha_ADD"][$a])."','".$_POST["Confi_ADD"][$a]."')";
              mysqli_query($conn,$sql);
              var_dump($sql);
            }
            

            }
            else
            {
                echo "<script>alert('As Senhas Não Batem')</script>";
            }
        }

    }     

    }
    else{
        // echo "Not";
    }


?>