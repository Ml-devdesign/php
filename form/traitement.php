<!-- //traitement il n'y a pas d'affichage sert a traiter les donner pour eviter que au moment du traiment des donnee dans un refraiche quel ne soit envoyer deux fois -->
<!--c'est le formulaire qui remplis le tableau -->
<!-- pour verifier si l$POST contient bien champ1 un existe a voir les formulaire dinamic -->

<!--
limiter les acces pour une question de securité     
champs masque qui va rendre une valeur unique sur eviter toute prerte de donnee ou de hackeur a chaque fois qu'il existe
    <label for="ok4"></label> 
    <input type="hidden" name="form1" id="ok4"> 
    if (isset($_POST["form1"]&&$_POST["form1"])=="sent")) => sent est la key
    ensuite dans le {
        echo ......
    }
 && || alternative and et or utiliser en php le premier car les and et or renvois tout de meme un resultat ou continue l'execution
 sauf si c'est le resultat d'une fonction et que de la seconde instruction et le resultat de la premier instruction 

 faille xss -> 
     <script>alert("Hacked")</script> => hacking cesi est une possibilité de hacking => ecrit dans le champ nom faille xss cette faille fait simplement un affichage = une injection de javascript  
    avec iun e balise img un onload("hacking) 
    pour eviter cela il faut une fonction html speciale chars(....) sa va prendre les caracteres et les remplacer par de l'encodage html &tt ou &gt , inferieur ou superieur ,le but est de remplacer tout l'encode par des caractere correspondant 
    ex de ce que php va ecrire dans le code source : &tt;script&gtalert("Hacked")&tt/script&tt 
    pour chaque echo un htmlspecialchars_($POST["CHAMP1]") qui interpret et nexucte pas 
    tout ceci evite les injection javascript
    aide aussi poue l'affichage des accents 
    le faire apres d'injecter dans une base de donnee a l'affichage utiliser htmlspecialchars  

    nosql -> notonly quand les donnee ne sont pas naturer -> pour completer les lacune du sql pour de l'agregation de donnee pour des donnee trop diverse 
    json sert a stocker un fichier il est interdit d'exploiter le pc de l'user car possible il est a conserver sur le serveur le fichier json par un utilisateur trouver son fichier et le parcourire le json est utiliser pour parcourir pas pour consesrver 
    JS -> localstorage partage local ou pour stocker et modiable et ne sont pas perene ett non securise  
    json -> format structure "mini base de donne "
    communique avec une api ceux qui renvois un json ou xml est un echange de donnee n'est pas concerver  
    [Pour la partie sécurite: 
    les cookie :
    
    durée de vie configurer Probleme stocker sur le pc user tout les nav propose dans inspecter de lister les cookie et meme de les modifier 
    user 1 est le super administrateur donne tout les droit via un cookies 
    bien pour  stocker les donnee qui ne sont pas sensible risqueer pour les donnnee sensible 
    cookie de trackiing : pas de donnee sensible pour prendre certaine donnee partager par d'autre  

    les session : 
    ne dure pas eternelement tant que l'user utilise le site temps definit par le serveur avec un timer de 15min 
    beaucoup moins risquer utiliiser pour eviter de stocker les donnnées ]

    Instasiation de classe : A voir pour la poo 

--> 


<?php 
if (isset($_POST["form1"])&&$_POST["form1"]=="sent"){
echo htmlspecialchars($POST["CHAMP1"]);
echo $_POST["champ1"];
echo "<br>";
echo $_POST["champ2"];
echo htmlspecialchars($POST["CHAMP1"]);
}
?>
<!-- //PDO POO -->
<!-- <?php 
// $objet=new Class();  
//new instancie un classe Class on obtitent l'objet  
    // echo $objet->attribut(); 
     //egale superieur -> 
    // $objet->methode();
?> -->

<!-- <?php 
//function objets(Type $args): void { 
   //action
// }
 ?>-->