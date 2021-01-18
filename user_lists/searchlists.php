<?php 
require_once "../functions/db.php";
if (!isset($_GET['q'])){
    header('Location:/main/accueil');
    exit();
}

// function getAuteurInfos($auteur_id){
//     $request = request('SELECT login,icon_id FROM users WHERE user_id= ?;',[$auteur_id]);
//     $count = $request->rowCount();
//     // var_dump($count);
//     if($count==1){
//         $res= $request->fetch(PDO::FETCH_OBJ);
//         return $res;
//     } else{
//         echo 'erreur dans getAuteurInfos';
//         return null;
//     }
// }

// function getAuteurId($auteur_login){
//     $request = request('SELECT user_id FROM users WHERE login= ?;',[$auteur_login]);
//     $count = $request->rowCount();
//     if($count==1){
//         return $request->fetchColumn();
//     } else{
//         echo 'erreur dans getId';
//         return null;
//     }
// }

$query = htmlspecialchars($_GET['q']);
if ($query!=""){
    $result = request(
        "SELECT * FROM tableaux,users WHERE ( login LIKE ? OR title LIKE ? ) AND tableaux.auteur_id=users.user_id",
        ["%".$query."%","%".$query."%"]);
    $resultNrows = $result->rowCount();
    // $result = Les n-uplets de tableaux et users dont le login de l'auteur ou le titre contient $query
} else {
    $resultNrows = 0;
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>Recherche</title>
<link href="/css/mystyle.css?version=2" rel="stylesheet" type="text/css"/>
<link href="/css/tabstyle.css?version=130" rel="stylesheet" type="text/css"/>
<link rel="icon" href="/ressources/images/favicon.ico"/>
<!-- <link href="http://192.168.1.12/pw/header.css" rel="stylesheet" type="text/css"/> -->
</head>
<body>
<?php 
require_once "../misc/header.php"; ?>
<div class = "body">
    <h1 class = "blue">Résultats de recherche</h1>
    <h2 class = "blue" style='margin-left:15px'>Résultats de la recherche pour " <i><?=$query?></i> "</h2>
    <!--///////////////////////////////// -->
    <table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Date création</th>
        </tr>
    </thead>
    <tbody>

        <?php
        if ($resultNrows > 0) :
            foreach ($result as $row) :
            $tab_id = $row['tab_id']?>
            <tr>
                <td>
                <a href= " <?="/user_lists/user_list?tab_id=$tab_id" ?> " class=tablink >
                    <?=$row['title'];?>
                </a>
                    
                </td>

                <td>
                    <div class=flexcenter>
                        <img src="/ressources/images/icons/icon<?= $row['icon_id'] ?>.png" height=40px width=40px/>
                        <span class=autopadding><?=$row['login'] ?></span>
                    </div>
                </td>

                <td>
                    <?= str_replace("-"," / ",$row['date_maj']); ?>
                </td>
            </tr>
            <?php
            endforeach;
        endif;?>
    </tbody>
    </table>
</div>
<?php require_once "../misc/footer.html";?>
</body>
</html>