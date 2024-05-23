<?php
    if(!isset($_SESSION['codigo'])){
        session_destroy();
        header('Location:pag_professor.php');
        exit();
    }
?>