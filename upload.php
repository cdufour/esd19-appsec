<?php

//var_dump($_FILES);

$src = $_FILES['file']['tmp_name']; // emplacement temporaire

// ** destination choisie **
//$dst = 'uploads/' . $_FILES['file']['name'];  avec nom d'origine
$dst = 'uploads/file-renamed.txt'; // avec renommage

// vérification de contraintes avant upload (déplacement)
if ($_FILES['file']['size'] < 5) {
    // déplacement du fichier
    $result = move_uploaded_file($src, $dst);
} else {
    echo "upload forbidden";
}


?>