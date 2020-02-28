<?php
session_start();

function isPasswordOk($p) {
    $isUp       = preg_match('@[A-Z]@', $p);
    $isLo       = preg_match('@[a-z]@', $p);
    $isNb       = preg_match('@[0-9]@', $p);
    $isLenOk    = strlen($p) >= 10;
    return $isUp && $isLo && $isNb && $isLenOk;
}

if (isset($_POST['submit'])) { // formulaire posté
    require('connect.php'); // crée la connexion PDO
    $name   = $_POST['name'];
    $p      = $_POST['password'];
    $sql    = "INSERT INTO user (name, password) VALUES (?, ?)";
    $stm    = $pdo->prepare($sql);

    if ($_POST['token'] == $_SESSION['token']) {
        // correspondance entre les tokens

        if (isPasswordOk($p)) {
            $hashed_pass = password_hash($p, PASSWORD_BCRYPT);
            $stm->execute([$name, $hashed_pass]);
        } else {
            echo 'Uncorrect password';
        }

    } else {
        echo 'Nikommook';
    }
    $token = "";
    
} else { // ressource requise en GET

    $token = bin2hex(random_bytes(10));
    $_SESSION['token'] = $token; // mise en session du token

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert  User</title>
</head>
<body>
    <h1>Insert User</h1>
    <form method="post">

        <!-- Token anti-CSRF -->
        <input type="hidden" value="<?php echo $token ?>" name="token" />

        <input type="text" placeholder="Nom" name="name" />
        <input type="text" placeholder="Mot de passe" name="password" />
        <input type="submit" name="submit" />
    </form>
</body>
</html>