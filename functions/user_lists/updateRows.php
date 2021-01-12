<?php
require_once '../db.php';
$tab_id = $_GET['tab_id'];
if ( isset($_GET["del"]) && $_GET["del"] != null){
    request("DELETE FROM usertab_$tab_id WHERE row_id = ? ;",[$_GET["del"]]);
}

if ( isset($_POST["nom"]) && $_POST['nom'] != null){
    $test = request("INSERT INTO usertab_$tab_id VALUES( ?, ?, ? , ? , ? , ? );",[null,$_POST["cout"], $_POST["nom"],$_POST["classe"],$_POST["type"],$_POST["rarete"]]);
    // var_dump ($test);
}

request("UPDATE tableaux SET date_maj = CURRENT_TIMESTAMP WHERE tab_id = ?",[$tab_id]);
header("Location:".$_SERVER['HTTP_REFERER']);
?>