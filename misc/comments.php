<?php
require_once "../functions/db.php";
require_once "../functions/session.php";
require_once "../classes/comment.php";

// if (isset($_POST['contenu']) && is_connected()){
//     $content = $_POST['contenu'];
//     $auteur = $_SESSION['id'];
//     // $dt = date_create();
//     // $currentts = date_timestamp_get($dt);
//     // echo $page_id . "<br>";
//     // echo $content . "<br>";
//     // echo $auteur . "<br>";

//     // request("INSERT INTO commentaires
//     // VALUES( ? , ? , ? , ? , ? , ? );",[null, $content,null, null , $auteur, $page_id]);
//     $pdo->query("INSERT INTO commentaires VALUES( null , '$content' , 0 , CURRENT_TIMESTAMP , '$auteur' , '$page_id' );");
// }
if (isset($page_id)){
    $request = request('SELECT * FROM commentaires WHERE page_id= ? ;',[$page_id]); // On pourrait les trier par nombre de likes -> à implementer
    $res = $request->fetchAll(PDO::FETCH_OBJ);
    $nb_com = $request->rowCount();
    if ($nb_com>1) $pluriel = 's';
    else $pluriel = '';
    ?>
    <link href="/css/comments.css?version=4" rel="stylesheet"/>
    <div class="comments">
        <div class="headertitle"><?=$nb_com?> Commentaire<?=$pluriel?></div>
        <?php if(is_connected()):?>
        <div class="comment">
            <img class= "comicon" src="/ressources/images/icons/icon<?= $_SESSION['icon_id']?>.png"/>
            <div class="combody newcomment">
                <div class="comhead">
                    <span class="auteur"><?= $_SESSION['login']?></span>
                </div>
                <div class="comcontent">
                    <?php
                    if (isset($tab_id))$getparams = "?tab_id=$tab_id";
                    else $getparams= "";
                    ?>
                    <form action="/functions/user_lists/addComment?page_id=<?=$page_id?>&path=<?=$_SERVER['PHP_SELF'].$getparams?>" method="post">   
                        <input class=addComment type="text" name="contenu" maxlength="1000" placeholder = "Ajouter un commentaire" autocomplete="off"/>
                        <input class=smallbutton type="submit" value="Ajouter"/>
                    </form>
                </div>
            </div>
        </div>
        <?php endif;?>
        <?php
        foreach($res as $row){
            $comment = new Comment($row->contenu,$row->user_id, $row->date_public);
            $comment->printlist();
        }?>
    </div>
<?php
} else {
    echo 'page_id is not defined !';
}
?>