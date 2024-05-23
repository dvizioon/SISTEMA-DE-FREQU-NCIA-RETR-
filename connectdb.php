<?php

    session_start();

    include_once("confinconnect.php");


    if(empty($_POST['cpf_aluno']) || empty($_POST['data_aluno']) || $_POST['op_curso'] == "0"){
        header("Location:pag_aluno.php");
        exit();
    }

    $cpf_aluno  = mysqli_real_escape_string($conn,$_POST['cpf_aluno']);
    $Data_aluno  = mysqli_real_escape_string($conn,$_POST['data_aluno']);
    $op_curso = mysqli_real_escape_string($conn,$_POST['op_curso']);
   


    if(isset($_POST['op_curso'])){
      
            if($_POST['op_curso'] == "0"){
                // sem metodo --provavaelmento um sessão;
               
            }
            else{

                if($op_curso == "Programador De sistema"){
                    $query = "select codigo_aluno,Cpf,Curso_scn,Nome from dados_aluno where Cpf='{$cpf_aluno}' and data_nac='{$Data_aluno }' and Curso_scn='{$op_curso}'";
                    
                    $result = mysqli_query($conn,$query);

                    
                    $row = mysqli_num_rows($result);
                                       

                    if($row == "1"){
                        // echo "Yes - Existe";
                        $_SESSION['Cpf'] = $cpf_aluno;
                        $_SESSION['Curso_scn'] = $op_curso;
                        header("Location:painel_aluno.php");
                    }
                    else{
                        // echo "Not - Existe";
                        $_SESSION['not_autentic_alun'] = true;
                        header("Location:pag_aluno.php");
                    }
                }
                else{

                    $query = "select codigo_aluno,Cpf,Curso_scn from dados_aluno where Cpf='{$cpf_aluno}' and data_nac='{$Data_aluno }' and Curso_scn='{$op_curso}'";
                    
                    $result = mysqli_query($conn,$query);

                    $row = mysqli_num_rows($result);

                    if($row == "1"){
                        // echo "Yes - Existe";
                        $_SESSION['Cpf'] = $cpf_aluno;
                        $_SESSION['Curso_scn'] = $op_curso;
                        header("Location:painel_aluno.php");
                    }
                    else{
                        // echo "Not - Existe";
                        $_SESSION['not_autentic_alun'] = true;
                        header("Location:pag_aluno.php");
                    }
                }
    
            }

    }

    



?>
