<?php

try {
    // instanciation de la classe PDO (connection à mysql)
    $pdo = new PDO('mysql:host=localhost;dbname=esd', 'root', '');
    //var_dump($pdo); // var_dump permet d'inspecter le contenu d'une variable
} catch (PDOException $e) {
    echo "Connection to mysql failed";
}

?>