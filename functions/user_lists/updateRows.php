<?php
require_once '../db.php';
require_once '../session.php';
session_start();


function userIsOwner(): bool{
    $prep = request("SELECT * FROM tableaux WHERE auteur_id = ? AND tab_id = ?",[$_SESSION['id'],$_GET['tab_id']]);
    return(isset($prep) && $prep->rowCount() > 0);
}

$tab_id = $_GET['tab_id'];
if (isset($_GET["del"]) && $_GET["del"] != null){
    var_dump(userIsOwner());
    if (userIsOwner()){
        request("DELETE FROM usertab_$tab_id WHERE row_id = ?;",[$_GET["del"]]);
    }   // TODO Créer une alerte si tentative échouée / Ne pas afficher le bouton
}

if (isset($_POST["nom"]) && $_POST['nom'] != null){
    $test = request("INSERT INTO usertab_$tab_id VALUES( ?, ?, ? , ? , ? , ? );",[null,$_POST["cout"], $_POST["nom"],$_POST["classe"],$_POST["type"],$_POST["rarete"]]);
    // var_dump ($test);
}

request("UPDATE tableaux SET date_maj = CURRENT_TIMESTAMP WHERE tab_id = ?",[$tab_id]);
header("Location:".$_SERVER['HTTP_REFERER']);
?>