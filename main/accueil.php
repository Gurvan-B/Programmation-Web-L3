<?php
require_once "../functions/db.php";
require_once "../functions/session.php";
session_start();
function getAuteurInfos($auteur_id){
    $request = request('SELECT login,icon_id FROM users WHERE user_id= ?;',[$auteur_id]);
    $count = $request->rowCount();
    // var_dump($count);
    if($count==1){
        $res= $request->fetch(PDO::FETCH_OBJ);
        return $res;
    } else{
        echo 'erreur dans getAuteurInfos';
        return null;
    }
}

function getOnlyDate($timestamp){
    $sub = substr($timestamp,0,10);
    $repl = str_replace("-"," / ",$sub);
    return $repl;
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Accueil</title>
<link href="/css/mystyle.css?version=7" rel="stylesheet" type="text/css"/>
<link href="/css/tabstyle.css?version=5" rel="stylesheet" type="text/css"/>
<link rel="icon" href="/ressources/images/favicon.ico"/>
</head>
<body>
<?php require_once "../misc/header.php";?>
<div class = body>
    <h1 class = "blue">Accueil</h1>
    <p class = "bordure">
        Hearthstone is a free-to-play online digital collectible card game developed and published by Blizzard Entertainment. 
        Originally subtitled Heroes of Warcraft, Hearthstone builds upon the existing lore of the Warcraft series by using the same elements, 
        characters, and relics. It was first released for Microsoft Windows and macOS in March 2014, with ports for iOS and Android releasing later that year. 
        The game features cross-platform play, allowing players on any supported device to compete with one another, restricted only by geographical region account limits.
    </p>
    
    <p class = "bordure">
        Hearthstone is a free-to-play online digital collectible card game developed and published by Blizzard Entertainment. 
        Originally subtitled Heroes of Warcraft, Hearthstone builds upon the existing lore of the Warcraft series by using the same elements, 
        characters, and relics. It was first released for Microsoft Windows and macOS in March 2014, with ports for iOS and Android releasing later that year. 
        The game features cross-platform play, allowing players on any supported device to compete with one another, restricted only by geographical region account limits.
    </p>
    <p class = "bordure">
        Hearthstone is a free-to-play online digital collectible card game developed and published by Blizzard Entertainment. 
        Originally subtitled Heroes of Warcraft, Hearthstone builds upon the existing lore of the Warcraft series by using the same elements, 
        characters, and relics. It was first released for Microsoft Windows and macOS in March 2014, with ports for iOS and Android releasing later that year. 
        The game features cross-platform play, allowing players on any supported device to compete with one another, restricted only by geographical region account limits.
    </p>
    <?php
    $result = request("SELECT * FROM tableaux ORDER BY date_maj DESC ", []); // Trie par ordre décroissant en fct de la date de maj
    $resultNrows = $result->rowCount();
    ?>
<div class=flexcenter>
<div class="tabaccueil">
    <h2 class="blue center">Derniers decks mis à jour</h1>
    <table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Auteur</th>
            <th>Mise à jour</th>
        </tr>
    </thead>
    <tbody>

        <?php
        if ($resultNrows > 0) :
        foreach ($result as $row) :
            $tab_id = $row['tab_id']?>
            <tr>
                <td>
                    <a href= " <?= "/user_lists/user_list?tab_id=$tab_id"?>" class=tablink><?=$row['title']; ?></a>
                </td>

                <td>
                    <div class=flexcenter>
                    <?php $auteurInfos = getAuteurInfos($row['auteur_id']);?>
                    <img src="/ressources/images/icons/icon<?= $auteurInfos->icon_id ?>.png" height=40px width=40px/>
                    <span class=autopadding><?=$auteurInfos->login ?></span>
                    </div>
                </td>
                <td>
                    <?= getOnlyDate($row['date_maj']); ?>
                </td>
            </tr>
        <?php
        endforeach;
        endif;?>
    </tbody>
    </table>
</div>
    <video class=center src="/ressources/videos/trailer.mp4" poster="/ressources/images/logo.png" width=40% autoplay controls muted></video>
</div>

    <p class = "bordure">
        Hearthstone is a free-to-play online digital collectible card game developed and published by Blizzard Entertainment. 
        Originally subtitled Heroes of Warcraft, Hearthstone builds upon the existing lore of the Warcraft series by using the same elements, 
        characters, and relics. It was first released for Microsoft Windows and macOS in March 2014, with ports for iOS and Android releasing later that year. 
        The game features cross-platform play, allowing players on any supported device to compete with one another, restricted only by geographical region account limits.
    </p>
    <p class = "bordure">
        Hearthstone is a free-to-play online digital collectible card game developed and published by Blizzard Entertainment. 
        Originally subtitled Heroes of Warcraft, Hearthstone builds upon the existing lore of the Warcraft series by using the same elements, 
        characters, and relics. It was first released for Microsoft Windows and macOS in March 2014, with ports for iOS and Android releasing later that year. 
        The game features cross-platform play, allowing players on any supported device to compete with one another, restricted only by geographical region account limits.
    </p>
</div>
<?php require_once "../misc/footer.html";?>

</body>
</html>