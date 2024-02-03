<?php 
// Ce code PHP effectue les actions suivantes :

// Connexion à la base de données :
// Il utilise la classe PDO (PHP Data Objects) pour se connecter à une base de données MySQL sur un serveur local (localhost).
// Les informations de connexion comprennent le nom de l'hôte, le nom de la base de données (france), le jeu de caractères (utf8),
// le nom d'utilisateur (root), et le mot de passe ("") dans ce cas, ce qui signifie qu'aucun mot de passe n'est spécifié 
// dans le code).

try {
    $db = new PDO(
        "mysql:host=localhost; dbname=france; charset=utf8",
        "root",
        ""
    );
} catch(PDOException $e) {
    echo $e->getMessage();
    die("Erreur de base de données");
}
// Si une erreur se produit lors de la connexion à la base de données, elle est capturée par le bloc catch, 
// et un message d'erreur est affiché avant que le script ne se termine.

// Récupération des données à partir de la base de données :

//     Il vérifie si le paramètre GET "num" est présent dans l'URL ($_GET["num"]). Si oui, il exécute une requête SQL 
// pour récupérer les informations d'un département spécifique en fonction du code du département.

if(isset($_GET["num"])){
    $sql = "SELECT * FROM departement WHERE departement_code=:num";
    $stmt = $db->prepare($sql);
    $stmt->execute([":num" => $_GET["num"]]);
    $rs = $stmt->fetchAll();
    foreach($rs as $row)
        echo htmlspecialchars($row['departement_nom']) . " " . htmlspecialchars($row['departement_code']) . "<br>";
}

// Les résultats de la requête SQL sont stockés dans la variable $rs sous forme de tableau associatif. 
// Ensuite, une boucle foreach est utilisée pour afficher les noms et codes des départements.
// Les données sont échappées avec htmlspecialchars pour éviter les attaques XSS.

// Gestion du cas où le paramètre GET est absent :

//     Si le paramètre GET "num" n'est pas présent dans l'URL, un message d'erreur est affiché.
else{
    echo "Erreur il n'y a pas de parametre GET de num stp met en un ";
}
// Cela indique à l'utilisateur qu'il doit fournir le paramètre GET "num" pour que le script fonctionne correctement.

// En résumé, ce script PHP se connecte à une base de données MySQL, récupère des informations sur un département 
// en fonction du code du département passé en paramètre GET, et affiche ces informations après les avoir échappées 
// pour prévenir les attaques XSS.
// Si le paramètre GET "num" n'est pas fourni, un message d'erreur est affiché.
?>