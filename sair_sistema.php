<?php
        session_start();
        session_destroy();
        header("Location:pag_professor.php");
        exit();

?>