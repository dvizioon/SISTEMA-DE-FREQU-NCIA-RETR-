<?php
session_start();
include_once('verifica_professor.php');
include_once('confinconnect.php');

if (isset($_POST['enviar'])) {
    if (!empty($_POST['nome']) && !empty($_POST['data_nacs']) && !empty($_POST['cpf']) && !empty($_POST['select_curso'])) {

        $Nome = $_POST['nome'];
        $DNMT = DateTime::createFromFormat('Y-m-d', $_POST['data_nacs']);
        $NCPF = $_POST['cpf'];
        $CRSO = $_POST['select_curso'];
        $SAFE = $_POST['select_safe'];

        if ($DNMT === false) {
            echo "<script>alert('Data de nascimento inválida')</script>";
        } else {

            $formattedDate = $DNMT->format('dmY');

            if ($CRSO === 'Nenhum') {
                echo "<script>alert('Selecione um curso')</script>";
            } elseif ($SAFE === 'SemChave') {
                echo "<script>alert('Selecione uma chave')</script>";
            } else {
                switch ($SAFE) {
                    case "0":
                        $sql = mysqli_query($conn, "INSERT INTO dados_aluno (Nome, data_nac, Cpf, Curso_scn) VALUES ('$Nome', '$formattedDate', '$NCPF', '$CRSO')");
                        $mysql = mysqli_query($conn, "INSERT INTO frequencia_aluno (Nome, Cpf) VALUES ('$Nome', '$NCPF')");
                        break;

                    case "1":
                        $sql = mysqli_query($conn, "INSERT INTO dados_aluno (Nome, data_nac, Cpf, Curso_scn) VALUES ('$Nome', '$formattedDate', md5('$NCPF'), '$CRSO')");
                        $mysql = mysqli_query($conn, "INSERT INTO frequencia_aluno (Nome, Cpf) VALUES ('$Nome', md5('$NCPF'))");
                        break;

                    case "2":
                        $senha = password_hash($NCPF, PASSWORD_DEFAULT);
                        $sql = mysqli_query($conn, "INSERT INTO dados_aluno (Nome, data_nac, Cpf, Curso_scn) VALUES ('$Nome', '$formattedDate', '$senha', '$CRSO')");
                        $mysql = mysqli_query($conn, "INSERT INTO frequencia_aluno (Nome, Cpf) VALUES ('$Nome', '$senha')");
                        break;

                    case "3":
                        $custo = '08';
                        $salt = 'Cf1f11ePArKlBJomM0F6aJ';
                        $bcrypt = crypt($NCPF, '$2a$' . $custo . '$' . $salt . '$');
                        $sql = mysqli_query($conn, "INSERT INTO dados_aluno (Nome, data_nac, Cpf, Curso_scn) VALUES ('$Nome', '$formattedDate', '$bcrypt', '$CRSO')");
                        $mysql = mysqli_query($conn, "INSERT INTO frequencia_aluno (Nome, Cpf) VALUES ('$Nome', '$bcrypt')");
                        break;

                    case "4":
                        $options = ['cost' => 18];
                        $superkey = password_hash($NCPF, PASSWORD_DEFAULT, $options);
                        $sql = mysqli_query($conn, "INSERT INTO dados_aluno (Nome, data_nac, Cpf, Curso_scn) VALUES ('$Nome', '$formattedDate', '$superkey', '$CRSO')");
                        $mysql = mysqli_query($conn, "INSERT INTO frequencia_aluno (Nome, Cpf) VALUES ('$Nome', '$superkey')");
                        echo "<script>alert('Obrigado Pela espera')</script>";
                        break;
                }
            }
        }
    } else {
        echo "<script>alert('Campos Vazios')</script>";
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
</head>

<body>
    <div class="Sistema_professor">
        <ul class="nave_proff">
            <li><a href="painel_professor.php">Voltar</a></li>
            <li><a class="Print" href="info_aluno.php">Info_alunos</a></li>
            <li><a href="sair_sistema.php">Sair</a></li>
        </ul>
        <div class="tabela_sistema">
            <form action="dados_aluno.php" method="POST">
                <div class="form-box">
                    <label>NOME</label>
                    <input type="text" name="nome">
                </div>
                <div class="form-box">
                    <label>DNMT</label>
                    <input type="date" name="data_nacs">
                </div>
                <div class="form-box">
                    <label>NCPF</label>
                    <input type="text" name="cpf">
                </div>
                <div class="form-box">
                    <label>CRSO</label>
                    <select name="select_curso">
                        <option value="Nenhum">Selecionar_Curso</option>
                        <option value="Programador De sistema">Programador De sistema</option>
                        <option value="Programador web">Programador web</option>
                    </select>
                </div>
                <div class="form-box">
                    <label>SAFE</label>
                    <select name="select_safe">
                        <option value="SemChave">Selecionar_Chave</option>
                        <option value="0">Padrão</option>
                        <option value="1" disabled>MD5()</option>
                        <option value="2" disabled>Has1()</option>
                        <option value="3" disabled>bcrypt</option>
                        <option value="4" disabled>Superkey n-18/t/3m</option>
                    </select>
                </div>
                <div class="form-btn">
                    <input class="btn-in" name="enviar" type="submit" value="Enviar">
                </div>
            </form>
        </div>
    </div>
</body>

</html>