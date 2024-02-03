<?php 

//https://www.php.net/manual/fr/book.pdo.php
// Difference entre le localhost et le virtualhost pour la securite ou vise le site internet la rcine du site le virtualhost
// Pour l'arborescence la cree a lorigine pour ensuite pour pouvoir ce mettre dans les meme condition qun serveur eviter l'axee de l'origine des fichier entre les dossier racin et dossier 
// creation d'un virtual host dan  trois champ 1=lanom acces au site en minuscul 2=chemin d'acces puis redemarage dns 
// il y a trois parametres
// 1er determine ou ce trouve la base de donnees la chaine de connection avec le nom du localhost et le nom de la base de donnee
// 2eme parametre le user name
// 3eme parametre le mdp



//UTF8 precision de jeu de caractere
// try {//Pour verifier ce que l'utilisateur fais a tester son code pour quil n'yas pas d'erreure possible  
          
    //mysql la base de donnee: host pas forcement sur le serveur a changer en fonction ; dbname= la base de donnee en ligne on auras pas forcement le choix depend du serveur ; UTF8mb4_general apres le UTF8mb4 est propre a la base de donnée 
    // $db=new PDO("mysql:host=localhost;dbname=france;charset=UTF8",
    //             "root","");//sensible au espace acces a la base de donnee=instancier suivie du login suivi du mdp

    // } catch (PDOException $th) {//le th n'as pas de valeur reel 
        //throw $th; 
        // echo $th->getMessage(); //pour afficher l'erreur en local a ne pas afficher une fois en ligne pour eviter des faille de securiter  
        // die("ERREUR DE BDD"); //--> Pour un User le rediriger sur une page destinee 
        // A faire pour la soutenance 
        // catch (PDOException $th) {
        //     die("ERREUR DE BDD : "$th.getMessage);
    // }
    //requet preparer pour rechercher un departement :
    // try {
    //     $db = new PDO(
    //       "mysql:host=localhost; dbname=france; charset=utf8", 
    //       "root", 
    //       ""
    //     );
    //   } catch(PDOException $e) {
    //     echo $e->getMessage();
    //     die("Erreur de base de donnees");
    //   };
    
    
    //   $sql = "SELECT * FROM departement WHERE departement_code=:num";num=key 57=valeur
    //   $stmt = $db->prepare($sql);
    //   $stmt->execute([":num" => $_GET["num"]]);//pour cibler un element comme une Key primaire  dans ce tableau il verifie chacune des valeur exemple pour un exemble de produit le get id recupere le produits concerner 
    //   $rs = $stmt->fetchAll();//tableau associatif qui recupere l'ensemble des donnéés//avec le fetchAll obligatoirement besoin d'une boucle car renvoie plusieur resultat 
    //   foreach($rs as $row)////dans chaque case du recordset il y a un tableau 
    //     echo htmlspecialchars($row['departement_nom']) . " " . htmlspecialchars($row['departement_code']) . "<br>";

    //OU BIEN
    // if ($row=$stmt->fetch()) {//recupere un seul resulat pas pertinant sans avoir a parcourir le tableau 
        # code...
        // echo $row['departement_nom'];
    // }
    try {
          
        $db=new PDO("mysql:host=localhost;dbname=france;charset=UTF8",
                    "root","");
    
        } catch (PDOException $th) {
            //throw $th; 
            echo $th->getMessage();  
            die("ERREUR DE BDD");
        }
    
    if ($recordset=$db->query($sql)) {//Si ce n'est pas false 
        # code...                      
        foreach ($recordset->fetchAll() as $row) { //fetchAll cherche tout 
            # code... parcourir tout le resultat 

            echo htmlspecialchars($row["departement_nom"])."<br>";
            # Sortie du tableau les valeurs . espace 
        }
        
        }

    $sql="SELECT * FROM departement";
    // la condition : recordset renvoie un booleen False 
    if ($recordset=$db->query($sql)) {//Si ce n'est pas false 
        # code...                      
        foreach ($recordset->fetchAll() as $row) { //fetchAll cherche dans tout le tableau 
            # code... parcourir tout le resultat 
            // htmlspecialchars Cross-site Scripting (abrégé XSS) 
            //  il s’agit pour un attaquant d’injecter du code malveillant via les paramètres d’entrée côté client.
            echo htmlspecialchars($row["departement_nom"])."<br>";
            # Sortie dans le tableau les valeurs . espace 
        }
    }
           
            // $recordset->fetch();//fetch renvoi qu e un resultat 

            // Eviter les les Injections SQL: 
            //var_dump($recordset) pour debuger  SORTIE -->
            //C:\wamp64\www\BDD\bdd\index.php:21:
            // object(PDOStatement)[2]
            // public 'queryString' => string 'SELECT * FROM departement' (length=25)           
?>

