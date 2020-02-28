<?php
session_start(); // il faut d'abord accéder à la session
session_destroy(); // avant de pouvoir la détruire
header('location: tweets.php'); // redirection vers la liste des tweets
?>