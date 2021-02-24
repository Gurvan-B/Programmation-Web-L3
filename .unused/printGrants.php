
<?php
    require_once "../db.php";
    $res = request("show grants",[]);
    foreach ($res as $row) :
        var_dump($row);
        echo '<br>';
    endforeach;
?>