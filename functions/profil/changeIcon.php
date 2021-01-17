<?php 
require_once "../session.php";
require_once "../db.php";
if (is_connected() && isset($_GET['icon'])){
    $oldId = $_SESSION['icon_id'];
    // echo $oldId;
    if ($oldId{0} != '-'){
        // echo $oldId{0};
        unlink("../../ressources/images/icons/icon$oldId.png");
    }
    $icon_id = $_GET['icon'];
    request("UPDATE users SET icon_id= ? WHERE login = ? ;",[$icon_id,$_SESSION['login']]);
    $_SESSION['icon_id'] = $icon_id;
}
header("Location:/main/profil");
?>