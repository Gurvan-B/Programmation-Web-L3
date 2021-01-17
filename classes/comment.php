<?php
require_once "../functions/db.php";
class Comment {
    public $contenu;
    public $likes;
    public $auteur_id;
    public $date_public;

    public function __construct(string $contenu, int $auteur_id,$date_public){
        $this->contenu = $contenu;
        $this->likes = 0;
        $this->auteur_id = $auteur_id;
        $this->date_public = $date_public;
    }

    public function printlist(){
        $auteur_name = 'Compte supprimé';
        $auteur_icon_id = '-none';
        $request = request('SELECT login,icon_id FROM users WHERE user_id= ?;',[$this->auteur_id]);
        $count = $request->rowCount();
        if($count==1){
            $res= $request->fetch(PDO::FETCH_OBJ);
            $auteur_name = $res->login;
            // echo 'name:'.$auteur_name;
            $auteur_icon_id = $res->icon_id;
            // echo 'icon_id:'.$auteur_icon_id;
        }
        ?>
        <div class="comment">
            <img class= "comicon" src="/ressources/images/icons/icon<?= $auteur_icon_id ?>.png"/>
            <div class="combody">
                <div class="comhead">
                    <span class="auteur"><?=$auteur_name?></span>
                    <span class="date"><?=$this->date_public?></span>
                </div>
                <div class="comcontent">
                    <p><?=$this->contenu?></p>
                </div>
            </div>
        </div>
        <?php
    }

}
?>