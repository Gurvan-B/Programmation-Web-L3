<?php
$user = 'root';
$password = '';
$dbname = 'inventory';
$host = 'localhost';
$port = 3306;
$pdo;
// Paramètres à modifier en fonction de la base de donnée
try {

    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $password);

} catch (PDOException $e) {

    die("Impossible de se connecter à la base de donn&eacutees $dbname :" . $e->getMessage());

}

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

function request($sql,$param){
  global $pdo;
  if (isset($pdo)){
    try {
      $prep = $pdo->prepare($sql);
      foreach ($param as &$p){ // le & permet de modifier le tableau pendant qu'il est parcouru
        if (isset($p)){
          $p = htmlspecialchars($p);
        }
      }
      // var_dump($param);
      $prep->execute($param);
      // var_dump($prep);
      return $prep;
    } catch(Exception $e) {
      echo 'Exception -> ';
      var_dump($e->getMessage());
    }
  }
}
?>