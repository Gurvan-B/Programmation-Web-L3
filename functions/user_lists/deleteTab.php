<?php
require_once "../db.php";
require_once '../session.php';
session_start();


function userIsOwner(): bool{ // Vérifie qu'il existe bien une ligne dont l'auteur est l'utilisateur et dont le tab_id est celui du tableau à modifier
    $prep = request("SELECT * FROM tableaux WHERE auteur_id = ? AND tab_id = ?",[$_SESSION['id'],$_GET['tab_id']]);
    return(isset($prep) && $prep->rowCount() > 0);
}

if(isset($_GET['tab_id']) && userIsOwner()){
    $tab_id = $_GET['tab_id'];
    request("DELETE FROM tableaux WHERE tab_id = ?",[$tab_id]); // Supprime de la liste des tableaux
    request("DELETE FROM commentaires WHERE page_id = ?",['usertab_'.$tab_id]); // Supprime tous les commentaires
    request("DROP TABLE IF EXISTS inventory.usertab_$tab_id",[]); // Supprime la table ( si elle existe)
}
header('Location:/user_lists/mylists');
?>