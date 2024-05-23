<?php
session_start();
include_once('verifica_professor.php');
include_once('confinconnect.php');

if (!empty($_GET['fr'])) {

    $fr = $_GET['fr'];

    $sql_fr = "SELECT * FROM frequencia_aluno WHERE id='{$fr}'";
    $sql_re = mysqli_query($conn, $sql_fr);

    if ($sql_re->num_rows > 0) {
        while ($user_data = mysqli_fetch_assoc($sql_re)) {

            $Nome = $user_data['Nome'];
            $Cpf = $user_data['Cpf'];
        }
    }
}


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Frequencia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style/style.css" type="text/css" media="all">
</head>

<body>
    <!-- <h2>Bem-Vindo Professor Por Código , <?php // echo $_SESSION['codigo_professor']
                                                ?> </h2> -->
    <div class="Sistema_professor">
        <ul class="nave_proff">
            <li><a href="sair_sistema.php">Sair</a></li>
            <li><a class="Print" href="#">PDF</a></li>
            <li><a href="frequencia_Proff.php">Relatorio</a></li>
        </ul>
        <div class="tabela_sistema">

            <form action="insert_frequencia.php" method="POST">
                <div class="flex_check">
                    <label>F</label>
                    <input type="checkbox" value="F" name="presenca">
                    <input type="hidden" value="<?php echo $fr; ?>" name="id">
                    <input type="hidden" value="<?php echo $Nome; ?>" name="nome">
                    <input type="hidden" value="<?php echo $Cpf; ?>" name="Cpf">
                </div>
                <div class="flex_box">
                    <label>Selecione A data</label>
                    <input type="datetime-local" name="dataTd">
                </div>
                <div class="flex_box">
                    <input type="submit" name="submit" value="Atualizar">
                </div>

            </form>

        </div>
    </div>
    </div>
</body>

</html>