<?php
require_once "../functions/private.php";
require_once "../functions/db.php";
require_once "../functions/session.php";
// if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] != "http://pw/projet/login/connexion"){ // Remplacé par private
//   // echo "{$_SERVER['DOCUMENT_ROOT']}/projet/login/connexion";
//   header("Location: /projet/login/connexion");
// }
/////////////-ATTEMPS-////////////////
  function incAttemps(){
    request('UPDATE essais SET nessais=nessais+1 WHERE ip = ? ;',[$_SERVER['REMOTE_ADDR']]);
  }

  function setAttemps($attemps){
    request("UPDATE essais SET nessais=$attemps WHERE ip = ? ;",[$_SERVER['REMOTE_ADDR']]);
  }

  function getAttemps(){
    $prep = request('SELECT nessais FROM essais WHERE ip= ? ;',[$_SERVER['REMOTE_ADDR']]);
    return $prep->fetchColumn();
  }

  /////////////-ICON-////////////////
  function getIconID($login){
    $prep = request('SELECT icon_id FROM users WHERE login= ? ;',[$login]);
    return $prep->fetchColumn();
  }
  // $sql = 'SELECT nessais FROM ESSAIS WHERE ip= ? ;';
  // $prep = $pdo->prepare($sql);
  // $prep->execute([$_SERVER['REMOTE_ADDR']]);
  // $count = $prep->rowCount();
  // if($count>0){
  //     $attemps = $prep->fetchColumn();
  // } else {
  //   $sql = 'INSERT INTO ESSAIS VALUES ( ? , 0 );';
  //   $prep = $pdo->prepare($sql);
  //   $prep->execute([$_SERVER['REMOTE_ADDR']]);
  // }
if ( isset($_GET['crea']) && $_GET['crea'] == 1){
  if (isset($_POST['clog']) && isset($_POST['cpass'])){
    $prep = request('SELECT * FROM users WHERE login= ?;',[$_POST['clog']]); // Empêche ddeux utilisateurs d'avoir le même login
    $count = $prep->rowCount();
    if($count==0){
        $hashmdp = md5($_POST["cpass"]);
        // var_dump($hashmdp);
        // var_dump($_POST['clog']);
        // request('INSERT INTO users VALUES( ? , ? );',[$_POST['clog'],$hashmdp]);

        request('INSERT INTO users (login,mdp) VALUES( ? , ? );',[$_POST['clog'],$hashmdp]);
        $_POST['log'] = $_POST['clog'];
        $_POST['pass'] = $_POST['cpass'];
    } else header("Location: creation");
  }
}

session_start();
if (isset($_POST["log"]) && isset($_POST["pass"])){
  // $log = htmlspecialchars($_POST["log"]);
  // echo $log;
  // $pass = htmlspecialchars($_POST["pass"]);
  $hashmdp = md5($_POST["pass"]);
  $prep = request('SELECT * FROM users WHERE login= ? AND mdp= ? ;',[$_POST['log'],$hashmdp]);
  $count = $prep->rowCount();
  $res = $prep->fetch(PDO::FETCH_OBJ);
  if($count<=0){
    incAttemps();
    unset($_SESSION['connecte']);
    // echo "1";
    // var_dump($prep);
    // var_dump($count);
    // var_dump(empty($_SESSION['connecte']));
    // var_dump(is_connected());
    if (getAttemps()>3){
      header("Location:/login/connexion?erreur=1");
    }
    header("Location:/login/connexion?erreur=1");
    exit();
  } else {
    $_SESSION['id'] = $res->user_id;
    $_SESSION['login'] = $res->login;
    $_SESSION['connecte'] = 1;
    $_SESSION['icon_id'] = getIconID($res->login);
    setAttemps(0);
    // var_dump(empty($_SESSION['connecte']));
    // var_dump(is_connected());
    // echo "2";
    // var_dump($prep);
    // var_dump($count);
    header("Location:/main/accueil");
    exit();
  }
}
 ?>
