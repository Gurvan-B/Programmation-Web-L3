<?php require_once "../functions/session.php"; ?>
<link href="/css/header.css?version=14" rel="stylesheet" type="text/css"/>
<header>
<a class = "logo" href="/main/accueil"><img class = "logo" src = "/ressources/images/logo.png" alt="logo" height="60" /></a>
<nav>
        <ul class="nav_links">
            <!-- <li>if (isset($_SERVER['HTTP_REFERER'])) echo $_SERVER['HTTP_REFERER']?>;</li> -->
            <!-- <li>echo "{$_SERVER['DOCUMENT_ROOT']}/projet/functions/session";?></li> -->
            <li>
                <form action="/user_lists/searchlists" method='GET'>
                <!-- <img src="/ressources/images/loupe.png" alt="loupe" height=10px width=10px> -->
                    <input class=searchinput name='q' type="text" placeholder="Rechercher" autocomplete="off"/>
                    <!-- <input type="submit" style='display:none'> -->
                </form>
            </li>
            <li><a class="link" href='/user_lists/mylists'>Mes listes</a></li>
            <li><a class="link" href='/main/tableau'>Tableau</a></li>
            <li><a class="link" href='/main/ajax.html'>Tests</a></li>
        </ul>
    </nav>
<?php if (is_connected()):?>
    <div id=dropmenu>
        <button class=connected_btn><p style=margin:10px><?php echo $_SESSION['login']?></p><img class=icon src="/ressources/images/icons/icon<?php echo $_SESSION['icon_id']; ?>.png" height=35px width=35px/></button>
    </div>
    <ol id="dropdown"> 
            <a class="link2" href='/main/profil'><li>Profil</li></a>
            <a class="link2" href='/login/deconnexion?chang=1;'><li>Changer de compte</li></a>
            <a class="link2" href='/login/deconnexion'><li>D&eacute;connexion</li></a>
         </ol>
<?php else: ?>
    <!-- <a href='/login/connexion'> -->
        <button class=connect_btn onClick="window.location.href='/login/connexion'">Connexion</button>
    <!-- </a> -->
<?php endif;?>
</header>
<script src="/js/header.js"></script>