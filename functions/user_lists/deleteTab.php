<?php
require_once "../db.php";

if(isset($_GET['tab_id'])){
    $tab_id = $_GET['tab_id'];
    request("DELETE FROM tableaux WHERE tab_id = ?",[$tab_id]); // Supprime de la liste des tableaux
    request("DELETE FROM commentaires WHERE page_id = ?",['usertab_'.$tab_id]); // Supprime tous les commentaires
    request("DROP TABLE IF EXISTS inventory.usertab_$tab_id",[]); // Supprime la table ( si elle existe)
}
header('Location:/user_lists/mylists');
?>