<?php

    include_once('confinconnect.php');

    if(!empty($_GET['id'])){

        $ID = $_GET['id'];

        $mysql_query_alun_del = "SELECT * FROM  professor WHERE id=$ID";
        $result_query_alun_del = $conn->query($mysql_query_alun_del);

        if($result_query_alun_del->num_rows>0){
            while($user_data = mysqli_fetch_assoc($result_query_alun_del)){
                $del_alun = "DELETE FROM professor WHERE id='$ID'";
                $res_alun = $conn->query($del_alun);
            }
        }

    }
    header('Location:painel_professor.php');

?>