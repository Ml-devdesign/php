<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title><!--http://127.0.0.1/php/test/-->
</head>
<body>
    <h1>
       <?php echo "Hello"?> Fichier Test</h1> 
      <!--Boucle for -->
      <?php 
       $variable="Hello";
       $variable2=42;
       $variable3=true;

       if ($variable2==42){
        echo"hello you";
       }

       for( $i=0; $i<=10 ; $i++ ){                    //Voir Sucre Syntaxique                       //inisialisisation condition incrementattion dollar i = dolor i - 1 / ++$1 -> ex : echo $i++;
        echo($i);
       }
       ?> 
        <hr>
       <ul>
            <?php for($i=1 ; $i<=100 ; $i++) {
                echo"<li>".$i."</li>";               //model d'architecture mvc controler 
            }?>
        </ul>
        <hr>
        <ul>
            <?php for($i=1 ; $i<=100 ; $i++) {?>
                <li><?=$i;?></li>                     <!--  façon de faire correcte-->
            <?php }?>
        </ul>
        <hr>
        
        <!--Tableau PHP  INDEXER
        // Tableau //sortie 12345//-->
        <hr>
        <?php $tableau=[1,2,3,4,5,6,7,8,9];           
            for($i=0;$i<5;$i++){
            echo $tableau[$i];
        }
        ?>
        <hr>
        <!-- Count le tableau pour avoir l'index et la position et la valeur //sortie : 123456789// -->
        <?php $tableau=[1,2,3,4,5,6,7,8,9];           
            for($i=0;$i<count($tableau);$i++){
            echo $tableau[$i];
        }
        ?>
        <hr>
        <!-- Count le tableau pour chaque case du tableau il va faire la meme operation //sortie 123456789// -->
        <?php foreach($tableau as $case){
            echo $case;
        }
        ?>
        <hr>
        <!--Tableau PHP ASSOCIATIF avec une KEY 
        // Tableau //sortie Brunelli//-->
        <?php $tableauAsso=["prenom(Key)"=>"Maxime(valeur)","nom"=>"Brunelli"];{
            echo $tableauAsso["nom"]."<br>";
        }?>
        <hr>
        <!--Tableau PHP foreach 
        // Tableau //sortie prenom(Key):Maxime(valeur)
        nom:Brunelli//-->
        <?php foreach($tableauAsso as $key => $value){
            echo $key. ":".$value."<br>";                                               //Les points sont de la concatenations
        }
        ?>
        <hr>
        <!--Tableau PHP Deux Dimensions avec des boucles IMBRIQUER
        // Tableau //sortie : 123456789//-->
        <?php 
        $tableaux=[
            [1,2,3],
            [4,5,6],
            [7,8,9],
        ];           
        for($i=0;$i<count($tableaux);$i++){                                             //Pour i = 0 ; i<compte le tableau ; compte i +1
            for($j=0;$j<count($tableaux[$i]);$j++){ 
                echo $tableaux[$i][$j];
            }
        } 
        ?>
        <hr>

         <!--Tableau PHP INDEXE A Deux Dimensions ASSOCIATIF avec des boucles imbriquée
        // Tableau //sortie : 123456789//
        // Record set -->
        <?php 
        $untableaux=[
            ["prenom(Key)"=>"Max(valeur)","nom"=>"Brune(valeur)"],
            ["prenom(Key)"=>"Maxi(valeur)","nom"=>"Brunel(valeur)"],
            ["prenom(Key)"=>"Maxime(valeur)","nom"=>"Brunelli(valeur)"],
        ];           
        foreach($untableaux as $row){                                             //Pour i = 0 ; i<compte le tableau ; compte i +1
            echo $row["prenom(Key)"]."<br>";
        } 
        ?>
        <hr>
        <!--Tableau PHP  -->

        <table>
            <thead>
            <th>
                <tr>Nom</tr><br>
                <tr>Prenom</tr>
            </th>
        </thead>
        <tbody>
        <?php foreach($untableaux as $row){?>
            <tr>
                <td><?=$row["nom"];?></td>
                <td><?=$row["prenom(Key)"];?></td>
            </tr>
        <?php }?>
        </table>
        </tbody>
        <hr>
        <?php 
        $_GET=[[
            '1' => "Bonjour",
            '2' => "Ma Variable",//Transmettre des information via le balise poste  <form action ="traitement.php" methode="POST> pour recuperer $_POST  <inpu type="text" name="key> et cest la key qui recupere les donnee de la key 
        ]];//Tableau associatif le $_Get sert a recuperer une valeur via les url  ex:echo $_GET["id"]  url=   vitualhostdissier/php?cle1=valeur & key=valeur  pour savoirr si elle existe un if(isset($_GET['])) ne pas utilisant pour des info non vital et toujr utiliser le if IMPORTANT
        foreach ($_GET as $item) {  // Pour la page formulaire la recuperation de donnee                                             //prend les aleurs  succesivement chacune des case 
                echo $item['1'];                                                  //pour lestableau assosiatif pur recuperer les key foreach($Get as $key=>Value)
        }
        ?>
        <?php 
        $var='chuck norris';
        echo $var;
        for ($i=0; $i < 5; $i++) { 
            # code...
            echo $i;
        }
        ?>
       
        
        
</body>
</html>