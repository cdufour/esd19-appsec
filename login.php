<?php
    session_start();
    //var_dump($_SESSION);
    $user = ['name' => 'Dybala', 'password' => 'juve123'];

    if (isset($_POST['submit'])) {
        // formulaire soumis par le client

        // connexion à mysql
        require('connect.php');
        
        $u = $_POST['username'];
        $p = $_POST['password'];

        // requête en sélection (lecture)
        $sql = "SELECT name, password FROM user WHERE name = ? AND password = ?";
        $stm = $pdo->prepare($sql);
        $stm->execute([$u, $p]);

        // conversion de la ligne sql en tableau associatif php 
        $result = $stm->fetch(PDO::FETCH_ASSOC); 
        //var_dump($result);

        if (!$result) {
            echo "Login impossible";
        } else {
            echo "<p>Welcome...</p>";
            echo '<p><a href="logout.php">Déconnexion</a></p>';

            // Ecriture dans la session (ouverte par session_start())
            $_SESSION['user_logged'] = $u;
            //var_dump($_SESSION);
        }

        // if ($u == $user['name'] && $p == $user['password']) {
        //     echo 'Bonjour ' . $u;
        // } else {
        //     echo "Accès interdit à " . $u;
        // }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        h1 {
           color: purple;
           text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Login</h1>
    <form action="" method="post">
        <input type="text" name="username" />
        <input type="password" name="password" />
        <input type="submit" name="submit" />
    </form>

    <div>
        <h1>Test JS</h1>
        <button id="btnTest">Test</button>
        <span id="spanTest">0</span>
        <section id="sectionTest"></section>
    </div>

    <script>

        // repérage du bouton et du span et stockage dans des variables
        var btnTest     = document.getElementById('btnTest');
        var spanTest    = document.getElementById('spanTest');
        var sectionTest = document.getElementById('sectionTest');

        var count = 0;

        // écoute événementielle, JS surveille le clic sur le bouton
        btnTest.addEventListener('click', () => {
            count = parseInt(spanTest.innerText); // convertit le string en int
            count += 1; // incrémentation
            spanTest.innerText = count; // écrasement du contenu du span
            
            // requête ajax via fetch. La réponse (asynchrone) du serveur
            // est "captée" par la méthode then()
            if (count > 5) {
                fetch('/ajax.php')
                    .then(res => res.text()) // extraction du texte du corps de la réponse
                    .then(res => {
                        // afficher la réponse dans le DOM (sectionTest)
                        sectionTest.innerText = res;
                    })
            }


        
        })

    </script>
    
</body>
</html>
