<!--  D'accord, voyons quelques exemples concrets pour illustrer ces mesures de sécurité en PHP: -->
    <?php 
// 1. **Validation des données d'entrée:**
//    - Utilisez `filter_input` pour nettoyer et valider les données d'entrée.
//    Exemple:
   
        $userInput = filter_input(INPUT_POST, 'user_input', FILTER_UNSAFE_RAW);

        // Validation manuelle, assurez-vous que $userInput répond à vos critères
        if (isValidUserInput($userInput)) {
        // Utilisez $userInput dans votre application
        } else {
        // Traitement des données non valides
        }

        // Fonction de validation personnalisée
        function isValidUserInput($data) {
        // Appliquer ici vos critères de validation
        // Par exemple, vérifiez la longueur, les caractères autorisés, etc.
        return (strlen($data) <= 255 && preg_match('/^[a-zA-Z0-9]+$/', $data));
        }

    ?>

  <?php 
// 2. **Éviter les requêtes SQL non sécurisées:**
//    - Utilisez des requêtes préparées pour empêcher les injections SQL.
//    Exemple:
   
   $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
   $stmt->bindParam(':username', $username);
   $stmt->execute();
   ?>

   <?php
// 3. **Protection contre les attaques par force brute:**
//    - Implémentez un mécanisme pour bloquer les tentatives de connexion après un certain nombre d'échecs.
//    Exemple:
//    php
   // Vérification de la limite de tentatives
   if ($loginAttempts >= $maxLoginAttempts) {
       // Bloquer le compte ou imposer un délai avant la prochaine tentative
   }
    ?>

<!-- 4. **Échappement des données affichées:**
   - Utilisez `htmlspecialchars` pour échapper les données avant de les afficher.
   Exemple: -->
   
   <?php 
   echo htmlspecialchars($userInput, ENT_QUOTES, 'UTF-8');
   ?>

<!-- 5. **Utilisation de sessions sécurisées:**
   - Configurez les sessions avec des options de sécurité.
   Exemple: -->
   <?php
   session_start([
       'cookie_secure' => true,
       'cookie_httponly' => true
   ]); 
   ?>
   
<!-- 6. **Mise à jour régulière:**
   - Assurez-vous que PHP, le serveur web, la base de données et le système d'exploitation sont à jour.
   Exemple: -->
   <!-- ```bash
   # Mettre à jour PHP (sous Linux)
   sudo apt-get update
   sudo apt-get upgrade
   ``` -->
<!-- 7. **Gestion des erreurs:**
   - Configurez PHP pour ne pas afficher les erreurs détaillées au public.
   Exemple: -->
   <?php 
   ini_set('display_errors', 0);
   error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);
   ?>

<!-- 8. **Utilisation de fonctions de hachage sécurisées:**
   - Utilisez `password_hash` pour stocker les mots de passe de manière sécurisée.
   Exemple: -->
   <?php 
   $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
   ?>

<!-- 9. **Protection contre les attaques CSRF (Cross-Site Request Forgery):**
   - Utilisez des jetons CSRF pour vérifier que les demandes proviennent bien de votre application.
   Exemple: -->
   <?php 
   // Génération du jeton CSRF
   $csrfToken = bin2hex(random_bytes(32));
   $_SESSION['csrf_token'] = $csrfToken;

   // Inclusion du jeton dans le formulaire
   echo '<input type="hidden" name="csrf_token" value="' . $csrfToken . '">';
   
//    Lors de la réception de la demande, vérifiez que le jeton CSRF est valide avant de traiter les données.
    ?>


<!-- 10. **Filtrage des fichiers téléchargés:**
   - Limitez les types et tailles de fichiers téléchargés et stockez-les dans un emplacement sécurisé.

   Exemple: -->
   <?php 
   // Vérification du type de fichier
   $allowedTypes = ['image/jpeg', 'image/png'];
   if (!in_array($_FILES['file']['type'], $allowedTypes)) {
       // Type de fichier non autorisé
   }

   // Vérification de la taille du fichier
   $maxSize = 2 * 1024 * 1024; // 2 Mo
   if ($_FILES['file']['size'] > $maxSize) {
       // Fichier trop volumineux
   }

   // Déplacement du fichier téléchargé vers un emplacement sécurisé
   move_uploaded_file($_FILES['file']['tmp_name'], '/chemin/vers/dossier/secure/');
   ?>


<!-- 11. **Utilisation de constantes pour les clés API et les secrets:**
   - Stockez les clés API, les secrets et autres informations sensibles dans des constantes définies dans un fichier de configuration en dehors du dossier public.
   Exemple: -->
   <?php 
   // config.php (en dehors du dossier public)
   define('API_KEY', 'your_api_key');
   define('API_SECRET', 'your_api_secret');

   // Utilisation dans le code
   $apiKey = API_KEY;
   
//    Assurez-vous que le fichier de configuration n'est pas accessible directement depuis le navigateur.
    ?>

<!-- 12. **Validation des URL:**
    - Lorsque vous utilisez des paramètres d'URL, assurez-vous qu'ils sont valides pour éviter les attaques telles que l'injection de scripts.
    Exemple: -->
    <?php 
    $productId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

    if ($productId === false || $productId === null) {
        // ID invalide
    }
    ?>

<!-- 13. **Restriction des permissions des fichiers et répertoires:**
    - Limitez les permissions d'accès aux fichiers et répertoires de votre application pour réduire les risques d'exploitation.
    Exemple:
    bash
    Réglage des permissions (sous Linux)
    chmod 755 /chemin/vers/dossier
    chmod 644 /chemin/vers/fichier.php -->
    ```
