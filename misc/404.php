<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<title>Erreur 404</title>
<link href="/css/mystyle.css?version=9" rel="stylesheet" type="text/css"/>
<link rel="icon" href="/ressources/images/favicon.ico"/>
<meta http-equiv="refresh" content="4; url=/main/accueil" />
</head>
<body>
<?php require_once "../misc/header.php"; ?>

<div class = body>
    <div class='center'>    
        <h1 class='blue'>Page introuvable !</h1>
        <img class="stdmargin" src="/ressources/images/404.png" alt="Erreur 404" height=200 />
        <div class="stdmargin center blue">Vous allez être redirigé vers l'accueil</div>
        <button class="stdmargin smallbutton center" onClick="window.location.href='/login/connexion'">Retour à l'accueil</button>
    </div>
</div>
</body>
</html>