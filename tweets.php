<?php
    session_start(); // accès à ou création de la session
    require('connect.php');
    $sql = 'SELECT id, body FROM tweet';
    $tweets = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tweets list</title>
</head>
<body>
    <h1>Tweets</h1>
    <table>
        <tr>
            <th>#</th>
            <th>Texte</th>
            <th>Actions</th>
        </tr>
        <?php
        foreach($tweets as $tweet) {
            echo '<tr>';
            echo '<td></td>';
            echo '<td>' . $tweet['body'] . '</td>';

            echo '<td>';
            // si utilisateur logué, on affiche lien de suppression
            if (isset($_SESSION['user_logged'])) {
                echo '<a href="delete_tweet.php?tid='.$tweet['id'].'">Supprimer</a>';
            }
            echo '</td>';

            echo '</tr>';
        }
        ?>
    </table>

</body>
</html>