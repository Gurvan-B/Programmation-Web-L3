<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>Créer un compte</title>
<link href="/css/mystyle.css?version=41" rel="stylesheet" type="text/css"/>
<link rel="icon" href="/ressources/images/favicon.ico"/>
<!-- <link href="http://192.168.1.12/pw/header.css" rel="stylesheet" type="text/css"/> -->
</head>
<body>
<?php require_once "../misc/header.php"; ?>
<div class = "body" style='padding-top:150px;'>
    <div class="center">
        <h1 class="blue">Créer un compte</h1>
        <form class ="center_form" action = "identification?crea=1" method="post">
            <input class="text identifiants" type="text" name="clog" placeholder = "Identifiant" required autocomplete="off"/>
            <input class="text identifiants" type="password" name="cpass" placeholder = "Mot de passe" required autocomplete="off"/>
            <input class="button identifiants" type="submit" value="Créer un compte">
        </form>
        <p class=blue>Vous avez déja un compte ?</p>
        <a class = "stlink" href='/login/connexion'>Se connecter</a>
    </div>
</div>
<?php require_once "../misc/footer.html";?>
</body>
</html>