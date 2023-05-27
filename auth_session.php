<?php
    session_start();
    if(!isset($_SESSION["studentNo"] ) ) {
        header("Location: home.php");
        exit();
    }
 
?>