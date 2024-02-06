<?php 

//https://www.php.net/manual/fr/book.pdo.php
// Difference entre le localhost et le virtualhost pour la securite ou vise le site internet la rcine du site le virtualhost
// Pour l'arborescence la cree a lorigine pour ensuite pour pouvoir ce mettre dans les meme condition qun serveur eviter l'axee de l'origine des fichier entre les dossier racin et dossier 
// creation d'un virtual host dan  trois champ 1=lanom acces au site en minuscul 2=chemin d'acces puis redemarage dns 
// il y a trois parametres
// 1er determine ou ce trouve la base de donnees la chaine de connection avec le nom du localhost et le nom de la base de donnee
// 2eme parametre le user name
// 3eme parametre le mdp



try {
    $db = new PDO(
      "mysql:host=localhost; dbname=france; charset=utf8", 
      "root", 
      ""
    );
  } catch(PDOException $e) {
    echo $e->getMessage();
    die("Erreur de base de donnees");
  };

  if(isset( $_GET["num"])){
    $sql = "SELECT * FROM departement WHERE departement_code=:num";
    $stmt = $db->prepare($sql);
    $stmt->execute([":num" => $_GET["num"]]);
    $resultats = $stmt->fetchAll();
    print_r($resultats);
    foreach($resultats as $row)
      echo htmlspecialchars($row['departement_nom']) . " " . htmlspecialchars($row['departement_code']) . "<br>";
  
    }

  else{
    echo "Erreur il n'y a pas de parametre GET de num stp met en un ";
  }
     
?>

