<?php
// Le fichier header.php
require_once(__DIR__.'/partials/header.php');

		// On déclare les variables pour éviter les erreurs
		$titre = null;
        $adresse = null;
        $ville = null;
        $code_postal = null;
        $description=null;
        $surface=null;
        $prix=null;
        $type=null;
        $image=null;

        var_dump($_POST);//pour voir ce que le formulaire contient comme données 
        
        if (!empty($_POST)) { // $post Récupére les informations saisies dans le formulaire
		    $titre = $_POST['titre'];
            $adresse = $_POST['adresse'];
            $ville = $_POST['ville'];
            $code_postal = $_POST['code_postal'];
            $description = $_POST['description'];
            $surface = $_POST['surface'];
            $prix = $_POST['prix'];
            $type = $_POST['type'];
            $image = $_FILES['image'];

        //   var_dump($image);

            // $message = $_POST['message'];
            
            $errors = [];

            if (empty($titre)) {
		    	$errors['titre'] = 'Le titre ne doit pas être vide. <br />';
            }

            if (empty($adresse)) {
		    	$errors['adresse'] = 'L\'adresse ne doit pas être vide. <br />';
            }

            if (empty($ville)) {
		    	$errors['ville'] = 'La ville ne doit pas être vide. <br />';
            }

            if (empty($code_postal) || !is_numeric($code_postal)) {
		    	$errors['code_postal'] = 'Le code postal est incorrect. <br />';
            }

            if (empty($surface) || !is_int($surface)) {
		    	$errors['surface'] = 'La surface est incorrect. <br />';
            }

            if (empty($prix) || !is_int($prix)) {
		    	$errors['prix'] = 'Le prix est incorrect. <br />';
            }

            // Upload de l'image
            if (empty($errors)) {
                    // var_dump($image);
                    $file = $image['tmp_name']; // Emplacement du fichier temporaire
                    $fileName = 'img/'.$image['name']; // Variable pour la base de données
                    $finfo = finfo_open(FILEINFO_MIME_TYPE); // Permet d'ouvrir un fichier
                    $mimeType = finfo_file($finfo, $file); // Ouvre le fichier et renvoie image/jpg
                    $allowedExtensions = ['image/jpg', 'image/jpeg', 'image/gif', 'image/png'];
                    // Si l'extension n'est pas autorisée, il y a une erreur
                    if (!in_array($mimeType, $allowedExtensions)) {
                        $errors['image'] = 'Ce type de fichier n\'est pas autorisé';
                    }
                    // Vérifier la taille du fichier
                    // Le 30 est défini en Ko
                    if ($image['size'] / 2048 > 256) {
                        $errors['image'] = 'L\image est trop lourde';
                    }
                    if (!isset($errors['image'])) {
                        move_uploaded_file($file, __DIR__.'/assets/'.$fileName); // On déplace le fichier uploadé où on le souhaite
                    }
                }
    
        
            // S'il n'y a pas d'erreurs dans le formulaire
            if (empty($errors)) {
                $query = $db->prepare('
                INSERT INTO pizza (`titre`, `adresse`, `ville`, `code_postal`, `description`, `surface`, `prix`, `type`, `photo`) 
                VALUES (:titre, :adresse, :ville, :code_postal, :description, :surface, :prix, :type, :image)
                ');
                $query->bindValue(':titre', $titre, PDO::PARAM_STR);
                $query->bindValue(':adresse', $adresse, PDO::PARAM_STR);
                $query->bindValue(':ville', $ville, PDO::PARAM_STR);
                $query->bindValue(':code_postal', $code_postal, PDO::PARAM_INT);
                $query->bindValue(':description', $description, PDO::PARAM_STR);
                $query->bindValue(':surface', $surface, PDO::PARAM_INT);
                $query->bindValue(':prix', $prix, PDO::PARAM_INT);
                $query->bindValue(':type', $type, PDO::PARAM_STR);
                $query->bindValue(':image', $fileName, PDO::PARAM_STR);
    
                if ($query->execute()) { // On insère le logement dans la BDD
                    $success = true;
                }
            }
        
        }

    ?>


<div class="container">
    <h1>Ajoutez un logement</h1>

    <form method="POST">
        <div class="form-group">

            <!-- champ titre -->
            <label for="titre" class='titre'>Titre</label>
            <input class="form-control col-6 <?= (isset($errors['titre'])) ? 'is-invalid' : ''; ?>" type="text" name="titre"
                id="titre" value="<?= $titre; ?>" />
            <div class="invalid-feedback">
                <?php echo (isset($errors['titre'])) ? $errors['titre']: ''; ?>
            </div>

            <!-- champ adresse -->

            <label for="adresse" class='adresse'>Adresse</label>
            <input class="form-control col-6 <?= (isset($errors['adresse'])) ? 'is-invalid' : ''; ?>" type="text" name="adresse"
                id="adresse" value="<?= $adresse; ?>" />
            <div class="invalid-feedback">
                <?php echo (isset($errors['adresse'])) ? $errors['adresse']: ''; ?>
            </div>

            <!-- champ ville -->

            <label for="ville" class='ville'>Ville</label>
            <input class="form-control col-6 <?= (isset($errors['ville'])) ? 'is-invalid' : ''; ?>" type="text" name="ville"
                id="ville" value="<?= $ville; ?>" />
            <div class="invalid-feedback">
                <?php echo (isset($errors['ville'])) ? $errors['ville']: ''; ?>
            </div>

            <!-- champ code postal -->

            <label for="code_postal" class='code_postal'>Code postal</label>
            <input class="form-control col-6 <?= (isset($errors['code_postal'])) ? 'is-invalid' : ''; ?>" type="text"
                name="code_postal" id="code_postal" value="<?= $code_postal; ?>" />
            <div class="invalid-feedback">
                <?php echo (isset($errors['code_postal'])) ? $errors['code_postal']: ''; ?>
            </div>

            <!-- champ description -->
            <label for="description" class='label_title'>Description</label>

            <textarea name="description" id="description" rows="3" class="form-control col-6 
            <?php echo isset($errors['description']) ? 'is-invalid' : ''; ?>"><?php echo $description; ?></textarea>

            <?php if (isset($errors['description'])) {
                echo '<div class="invalid-feedback">';
                    echo $errors['description'];
                echo '</div>';
            } ?>

            <!-- champ surface -->
            <label for="surface" class='surface'>Surface</label>
            <input class="form-control col-6 <?= (isset($errors['surface'])) ? 'is-invalid' : ''; ?>" type="text" name="surface"
                id="surface" value="<?= $surface; ?>" />
            <div class="invalid-feedback">
                <?php echo (isset($errors['surface'])) ? $errors['surface']: ''; ?>
            </div>

            <!-- champ prix -->
            <label for="prix" class='prix'>Prix</label>
            <input class="form-control col-6 <?= (isset($errors['prix'])) ? 'is-invalid' : ''; ?>" type="text" name="prix"
                id="prix" value="<?= $prix; ?>" />
            <div class="invalid-feedback">
                <?php echo (isset($errors['prix'])) ? $errors['prix']: ''; ?>
            </div>


            <!-- champ type -->
            <div class="form-group">
                <label for="type" class='label_title'>Type</label>
                <select class="form-control col-6 <?= isset($errors['type']) ? 'is-invalid' : '';?>" name="type">
                    <option value="">Choisissez la catégorie</option>
                    <option value="location">Location</option>
                    <option value="vente">Vente</option>
                </select>
                <div class="invalid-feedback">
                    <?php echo (isset($errors['type'])) ? $errors['type']: ''; ?>
                </div>
            </div>

            <!-- champ image -->
            <div class="form-group">
                <label for="image" class='label_title'>Photo du logement</label>
                <input type="file" class="form-control col-6 <?= (isset($errors['image'])) ? 'is-invalid' : ''; ?>"
                    name="image" id="image"/>

                <div class="invalid-feedback">
                    <?php echo (isset($errors['image'])) ? $errors['image']: ''; ?>
                </div>
            </div>

            <button class="btn btn-primary">Ajoutez le logement</button>
    </form>
</div>
<?php

// Le fichier footerer.php est inclus dans la page
require_once(__DIR__.'/partials/footer.php');
?>