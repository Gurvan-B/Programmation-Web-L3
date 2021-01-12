<?php

if (isset($_POST['submit'])){
    $file = $_FILES['file'];
    // print_r($file);
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];
    $fileError = $_FILES['file']['error'];

    $fileNameExpl = explode('.',$fileName); // On sépare le nom du fichier par les .
    // print_r($fileExtension);
    $fileExtension = strtolower(end($fileNameExpl));         // On récupère l'extension (Element après le dernier . dans le nom du fichier)
    // print_r($fileExtens);
    if ($fileExtension == 'png'){
        if($fileError === 0 && $fileSize < 400000){
            $fileId = uniqid('~',true);
            $fileUploadName = "icon$fileId.$fileExtension"; // Créer un nom unique (proportionnel au temps en millisecondes au moment ou uniqid() est appelée )
            print_r($fileId);
            $uploadPath = "../../ressources/images/icons/$fileUploadName"; // Chemin de destination
            move_uploaded_file($fileTmpName,$uploadPath);
            header("Location:changeIcon.php?icon=$fileId");
            exit();
        } else echo('fichier trop volumineux !');
    } else{
        // echo('format non supporté !');
        header("Location:/main/profil");
    }
}
?>