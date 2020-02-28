<?php
session_start();
//var_dump($_SESSION);

if (isset($_SESSION['user_logged'])) {
    echo 'key found';
} else {
    echo 'key not found';
}

?>