<?php
header('X-Perso:Chris');
require('connect.php');

// conseils: inspecter $tid
$tid = $_GET['tid'];

$sql = "DELETE FROM tweet WHERE id = ?";
$stm = $pdo->prepare($sql);

// si utilisateur logué, suppression autorisée
if (isset($_SESSION['user_logged'])) {
    $result = $stm->execute([$tid]); // !!! SUPPRESSION !!!
} else {
    echo 'Forbidden action';
}

?>