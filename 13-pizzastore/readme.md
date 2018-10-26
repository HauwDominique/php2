# Pizza Store PDO SQL

- Récupérer un backup de la BDD de pizzastore.  
L'intérêt est de pouvoir recréer la structure de la base à tout moment.

Au niveau du php, on va créer quelques fichiers/dossiers.
- config/database.php -> Connexion à la base de données en PDO, sera inclus dans tous les fichiers PHP
- config/config.php -> Stocke toutes les variables globales
- index.php -> La page d'accueil du site
- partials/header.php -> Le header du site à inclure dans toutes les pages (BOOSTRAP CDN).
- partials/footer.php -> Le footer du site à inclure dans toutes les pages.
- pizza_list.php -> Lister toutes les pizzas de la base de données
- pizza_single.php -> Page d'une pizza seule.

Au niveau du front
- assets/ -> Dossier qui contiendra le css, le js, les images (images statiques du site, pas les pizzas).
- assets/css/style.css
- assets/js/script.js
- assets/img/


## Ajout d'une pizza

- Créer la page pizza_add.php (permettra d'ajouter une pizza côté administrateur)
- Ne pas oublier le header et le footer
- Ajouter un titre "ajouter une pizza"
- Ajouter un formulaire aves les champs suivants
    - nom : Saisie libre
    - Prix : Entre 5 et 19.99
    - image : Saisie libre
    - description : Saisie libre
    - catégorie : Select
- Faire le traitement du formulaire (vérifier les données)
- Modifier la base de donnée pour ajouter le champ description (TEXT) et catégorie (VAR CHAR ou ENUM) dans la table pizza
- Ajouter la pizza dans la base avec une requête quand on clique sur le bouton submit du formulaire