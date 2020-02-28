<?php
// CSP: Content Security Policy
// Grâce à cet entête HTTP, le client (navigateur) recevant cette réponse
// autorisera toutes les balises HTML disposant d'un attribut src à requérir des 
// ressources provenant de la même origine ou bien de https://www.animalidacompagnia.it
// doc: https://www.projectseven.net/php-content-security-policy.php
header("Content-Security-Policy: default-src 'self' https://www.animalidacompagnia.it");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSP Example</title>
</head>
<body>
    <h1>CSP Example</h1>
    <img src="https://www.animalidacompagnia.it/wp-content/uploads/2018/09/Il-lupo-696x464.jpg" />
    
    <script>
        // requête ajax. En fonction des entêtes CORS placés par le serveur
        // dans sa réponse, le client autorisera ou pas le traitement de la réponse
        var url = "http://localhost:5000/";
        fetch(url)
            .then(res => res.text())
            .then(res => console.log(res));
    </script>

</body>
</html>