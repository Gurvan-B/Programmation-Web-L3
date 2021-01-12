<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Profil</title>
<link href="/css/mystyle.css?version=22" rel="stylesheet" type="text/css"/>
<link rel="icon" href="/ressources/images/favicon.ico"/>
</head>
<body>
<?php
require_once "../functions/session.php";
force_connexion();
// var_dump(is_connected());
// var_dump(isset($_POST['logofile']));
if (is_connected() && isset($_POST['logofile'])){
    var_dump($_POST['logofile']);
    $_SESSION['logo'] = $_POST['logofile'];
}
require_once "../misc/header.php";?>
<div class = body>
    <div class=center>
        <h1 class=blue>Profil</h1>
    </div>
    <div class="profil">
        <div>
        <h2>Changer la photo de profil</h2>
            <ul class=icons>
                <!-- <li><img class="iconimg" src="http://192.168.1.12/pw/projet/ressources/images/icons/icon1.png" alt="" onMouseOver="this.classList.toggle('upscale');"/></li>
                <li><img class="iconimg" src="http://192.168.1.12/pw/projet/ressources/images/icons/icon1.png" alt="" onClick="this.classList.toggle('upscale');"/></li>
                <li><img class=iconimg src="http://192.168.1.12/pw/projet/ressources/images/icons/icon1.png" alt="" onClick="this.classList.toggle('upscale');"/></li>
                <li><img class=iconimg src="http://192.168.1.12/pw/projet/ressources/images/icons/icon1.png" alt="" onClick="this.classList.toggle('upscale');"/></li> -->
                <li><img src="/ressources/images/icons/icon<?=$_SESSION['icon_id']?>.png" alt="" height=100px width=100px/>
                    <div class="center blue">Votre photo</div>
                </li>
                <li><img class="iconimg" src="/ressources/images/icons/icon-0.png" alt="" height=50px width=50px/></li>
                <li><img class="iconimg" src="/ressources/images/icons/icon-1.png" alt="" height=50px width=50px/></li>
                <li><img class=iconimg src="/ressources/images/icons/icon-2.png" alt="" height=50px width=50px/></li>
                <li><img class=iconimg src="/ressources/images/icons/icon-3.png" alt="" height=50px width=50px/></li>
                <li>
                    <form action="/functions/profil/uploadIcon" method="POST" enctype="multipart/form-data" >
                        <input type="file" name="file"/>
                        <input class=xsmallinput type="submit" name="submit"/>
                    </form>
                </li>
            </ul>
            <!-- <form enctype="multipart/form-data" method="post" action=profil>
            <input type="hidden" name="MAX_FILE_SIZE" value="30000"/>
            <input name='logofile' class=file type="file"/>
            <input type="submit" class=smallbutton></input>
            </form> -->
        </div>
        <div id=profilmdp>
            <h2>Changer de mot de passe</h2>
            <button id=buttonmdp class=smallbutton>Nouveau mot de passe</button>
        </div>
        <div>
            <h2>Suppression du compte</h2>
            <button class=smallbutton id=profildelete>Supprimer le compte</button>
            <div id=date></div>
        </div>
    </div>
</div>
<?php require_once "../misc/footer.html";?>
</body>
</html>
<script type="text/javascript" src='../js/iconhover.js'></script>
<script type="text/javascript" src='../js/profil.js'></script>