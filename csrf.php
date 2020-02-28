<?php

require("connect.php");

$sql = "DELETE FROM user";
$result = $pdo->query($sql)->execute();

?>