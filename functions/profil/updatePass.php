<?php 
require_once "../session.php";
require_once "../db.php";
if (is_connected() && isset($_POST['newpass'])){
    $hashnewmdp = md5($_POST['newpass']);
    request("UPDATE users SET mdp='$hashnewmdp' WHERE login = ? ;",  [$_SESSION['login']]);
}
header("Location:/main/profil");
?>