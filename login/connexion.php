<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Connexion</title>
<link href="/css/mystyle.css?version=1" rel="stylesheet" type="text/css"/>
<link rel="icon" href="/ressources/images/favicon.ico"/>
<!-- <link href="http://192.168.1.12/pw/header.css" rel="stylesheet" type="text/css"/> -->
</head>
<body>
<?php require_once "../misc/header.php"; ?>
<div class = "body" style='padding-top:150px;'>
    <div class="center">    
        <h1 class="blue">Connexion</h1>
        <form class ="center_form" action = "identification" method="post">
            <input class="text identifiants" type="text" name="log" placeholder = "Identifiant" required autocomplete="off"/>
            <input class="text identifiants" type="password" name="pass" placeholder = "Mot de passe" required autocomplete="off"/>
            <input class="button identifiants" type="submit" value="Se Connecter"/>
        </form>
        <p class=blue>Vous n'avez pas de compte ?</p>
        <a class = "stlink" href='/login/creation'>Créer un compte</a>
    </div>
</div>
<?php require_once "../misc/footer.html";?>
<?php
    if (isset($_GET['erreur'])){
        if ($_GET['erreur'] == 1) echo '<script> alert("Erreur de login/mot de passe"); </script>';
        if ($_GET['erreur'] == 2) echo '<script> alert("Veuillez vous connecter pour accéder à cette page."); </script>';
    }
?>
</body>
</html>