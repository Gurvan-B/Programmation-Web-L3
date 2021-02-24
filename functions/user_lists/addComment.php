<?php
require_once "../db.php";
require_once "../session.php";

if (isset($_GET['page_id']) && isset($_POST['contenu']) && is_connected()){
    $page_id = $_GET['page_id'];
    $content = $_POST['contenu'];
    $auteur = $_SESSION['id'];
    if ($content != ""){
        request("INSERT INTO commentaires            
        VALUES( ? , ? , ? , CURRENT_TIMESTAMP , ? , ? );",[null, $content,0, $auteur, $page_id]);
    }
}
if (isset($_GET['path'])) $path = htmlspecialchars($_GET['path']);
else $path = "/misc/404";
// header("Location:$path");
header("Location:".$_SERVER['HTTP_REFERER']);
?>