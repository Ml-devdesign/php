<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testphp</title><!-- http://localhost/php/form/form.php -->
</head>
<body>
    <form action="traitement.php" method="POST">

        <label for="ok1"></label>
        <input type="text" name="champ1" id="ok1">

        <label for="ok2"></label>
        <input type="text" name="champ2" id="ok2">

        <label for="ok3"></label>
        <input type="text" name="champ3" id="ok3">
<!-- champ masquer qui va rendre une valeur unique determine si il ce champs existe est sont coontenue existe  -->
       
        <input type="hidden" name="form1" value="sent">

        <input type="submit" value="ok">

    </form>
    <!-- <script>alert("Hacked")</script> possibilité de hacking => ecrit dans le champ nom faille xss cette faille fait simplement un affichage = une injection de javascript   -->
</html>