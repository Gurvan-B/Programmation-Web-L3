<?php 
// require_once "../functions/db.php";
require_once "../functions/session.php";
require_once "../functions/db.php";
force_connexion();

$result = request("SELECT * FROM tableaux WHERE auteur_id = ? ORDER BY date_maj DESC", [$_SESSION['id']]);
$resultNrows = $result->rowCount();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>Mes listes</title>
<link href="/css/mystyle.css?version=3" rel="stylesheet" type="text/css"/>
<link href="/css/tabstyle.css?version=130" rel="stylesheet" type="text/css"/>
<link rel="icon" href="/ressources/images/favicon.ico"/>
<!-- <link href="http://192.168.1.12/pw/header.css" rel="stylesheet" type="text/css"/> -->
</head>
<body>
<?php require_once "../misc/header.php"; ?>
<div class = "body">
    <h1 class = "blue">Gérer vos listes</h1>
    <div class="newlist">
        <h2 class = "blue">Créer une liste</h2>
        <form action="/functions/user_lists/newtab" method='POST'>
            <input class=largeinput type="text" name=title placeholder="Titre de la page" required autocomplete="off"/>
            <select class=largeinput name=color required>
				<option value= "null" >Couleur de la page</option>
				<option value= "#353148">Violet</option>
				<option value= "#fcd144">Jaune</option>
				<option value= "#0088a9">Bleu</option>
                <option value= "#669900">Vert</option>
                <option value= "#ff9f00">Orange</option>
			</select>
            <!-- <input type="color"/> --> 
            <input class=largebutton type="submit" value=Créer />
        </form>
    </div>
    <!--///////////////////////////////// -->
    <table>
    <thead>
        <tr class=topround>
           <th colspan='5'>Mes listes</th>
        </tr>
        <tr>
            <th>Titre</th>
            <th>Mise à jour</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        <?php
        if ($resultNrows > 0) :
            foreach ($result as $row) :
            $tab_id = $row['tab_id']?>
            <tr>
                <td>
                    <a href= " <?= "/user_lists/user_list?tab_id=$tab_id"?> " class=tablink>  <?=$row['title']; ?></a>
                </td>

                <td>
                    <?= $row['date_maj']; ?>
                </td>
                
                <td>
                    <a href="<?= "/functions/user_lists/deleteTab?tab_id=$tab_id" ?>">
                        <img src="/ressources/images/rouge.jpg" alt="Supprimer" height="20" width="20"/>
                    </a>
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