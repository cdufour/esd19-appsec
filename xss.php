<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XSS Reflected</title>
</head>
<body>

    <!-- XSS Reflected -->
    <h1>XSS Reflected</h1>
    <form action="" method="post">
        <input type="text" placeholder="User">
        <input type="text" placeholder="tweet" name="tweet">
        <input type="submit" name="submit">
    </form>

    <!-- reflected area -->
    <?php
        if (isset($_POST['submit'])) {
            echo '<h2>Votre tweet:</h2>';
            echo '<p>' . $_POST['tweet'] . '</p>';
        }
    ?>

    <!-- XSS Stored -->
    <h1>XSS Stored</h1>
    <form action="" method="post">
        <input type="text" placeholder="User" />
        <br>
        <textarea name="tweet"></textarea>
        <br>
        <input type="submit" name="submit2" />
    </form>

    <!-- Stored tweets -->
    <?php
    // affichage des tweets depuis la db
        require('connect.php');
        $sql = 'SELECT body FROM tweet';
        $tweets = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($tweets);
        foreach($tweets as $tweet) {
            echo '<p>' . $tweet['body'] . '</p>';
        }
    ?>


    <?php
        if (isset($_POST['submit2'])) {
            // enregistrement du tweet en db
            require('connect.php');
            $sql = 'INSERT INTO tweet (body) VALUES (?)';
            $stm = $pdo->prepare($sql);
            $stm->execute([$_POST['tweet']]);
        }
    ?>
    
</body>
</html>