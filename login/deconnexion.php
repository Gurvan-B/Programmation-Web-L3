<?php
require_once "../functions/private.php";
require_once "../functions/session.php" ;
if(is_connected()){
    unset($_SESSION['connecte']);
    // echo 'unset';
}
if (isset($_GET['chang'])){
    header("Location: /login/connexion");
    exit();
} else {
    header("Location: /main/accueil");
    exit();
}
?>