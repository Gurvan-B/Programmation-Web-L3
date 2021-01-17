<?php 
require_once "../session.php";
require_once "../db.php";
if (is_connected()){
    request("DELETE FROM users WHERE login = ? ;",  [$_SESSION['login']]); // Ne supprime pas les commentaires de l'utilisateur car user_id de la table commentaires n'est pas une clée étrangère.
    $oldId = $_SESSION['icon_id'];
    if ($oldId{0} != '-'){
        unlink("../../ressources/images/icons/icon$oldId.png");
    }
    header("Location:/login/deconnexion");
}
else header("Location:/main/accueil");
?>