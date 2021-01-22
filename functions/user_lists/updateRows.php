<?php
require_once '../db.php';
require_once '../session.php';
session_start();


function userIsOwner(): bool{ // Vérifie qu'il existe bien une ligne dont l'auteur est l'utilisateur et dont le tab_id est celui du tableau à modifier
    $prep = request("SELECT * FROM tableaux WHERE auteur_id = ? AND tab_id = ?",[$_SESSION['id'],$_GET['tab_id']]);
    return(isset($prep) && $prep->rowCount() > 0);
}
function update_date(){
    request("UPDATE tableaux SET date_maj = CURRENT_TIMESTAMP WHERE tab_id = ?",[$tab_id]);
}


$tab_id = $_GET['tab_id'];
if (isset($_GET["del"]) && $_GET["del"] != null){
    if (userIsOwner()){
        request("DELETE FROM usertab_$tab_id WHERE row_id = ?;",[$_GET["del"]]);
        update_date();
    }   // TODO Créer une alerte si tentative échouée / Ne pas afficher le bouton
}

if (isset($_POST["nom"]) && $_POST['nom'] != null){
    if (userIsOwner()){
        request("INSERT INTO usertab_$tab_id VALUES( ?, ?, ? , ? , ? , ? );",[null,$_POST["cout"], $_POST["nom"],$_POST["classe"],$_POST["type"],$_POST["rarete"]]);
        update_date();
    }
}

header("Location:".$_SERVER['HTTP_REFERER']);
?>