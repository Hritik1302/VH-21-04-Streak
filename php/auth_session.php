<?php
    session_start();
    if(!isset($_SESSION["Users_Id"])) {
        header("Location: index.php");
        exit();
    }
?>
