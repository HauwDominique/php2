<?php
// Le fichier header.php
require_once(__DIR__.'/partials/header.php');



		// On déclare les variables pour éviter les erreurs
		$titre = null;
        $adresse = null;
        $ville = null;
        $cp = null;
        $surface=null;
        $prix=null;
        // $photo =null; JE N'AI PAS REUSSI A RESOUDRE MON PROBLEME SUR LA VARIABLE $IMAGE QUI EST TOUJOURS VU COMME NULL
        $type=null;
        $description=null;

        // var_dump($_POST);//pour voir ce que le formulaire contient comme données 
        
        if (!empty($_POST)) { // $post Récupére les informations saisies dans le formulaire
		    $titre = $_POST['titre'];
            $adresse = $_POST['adresse'];
            $ville = $_POST['ville'];
            $cp = $_POST['cp'];
            $surface = $_POST['surface'];
            $prix = $_POST['prix'];
            // $photo = $_FILES['photo']; CHARGEMENT DE L IMAGE DESACTIVE SUITE AU PB DE $PHOTO vu comme NULL

            // var_dump($photo);
            $type = $_POST['type'];
            $description = $_POST['description'];

        //   var_dump($image);
            
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

            if (empty($cp)  && !is_numeric($cp)) {
		    	$errors['cp'] = 'Le code postal doit être rempli. <br />';
            }
            if (!is_numeric($cp)) {
                $errors['cp'] = 'Le code postal est incorrect. <br />';
            }

            if (empty($description)) {
		    	$errors['description'] = 'La description ne doit pas être vide. <br />';
            }

            if (empty($surface) && !is_int($surface)) {
		    	$errors['surface'] = 'La surface est incorrect. <br />';
            }

            if (empty($prix) && !is_int($prix)) {
                $errors['prix'] = 'Le prix est incorrect. <br />';
            }

            // Vérifier le type
            if (empty($type) || !in_array($type, ['location', 'vente'])) {
                $errors['type'] = 'La catégorie n\'est pas valide';
            }


                // Vérifier l'image
            if ($photo['error'] === 4) {
                $errors['photo'] = 'L\'image n\'est pas valide';
            }

            // Upload de l'image
            // if (empty($errors)) {
                    // var_dump($photo);
                    // $file = $photo['tmp_name']; // Emplacement du fichier temporaire
                    // $fileName = 'img/'.$photo['name']; // Variable pour la base de données
                    // $finfo = finfo_open(FILEINFO_MIME_TYPE); // Permet d'ouvrir un fichier
                    // $mimeType = finfo_file($finfo, $file); // Ouvre le fichier et renvoie image/jpg
                    // $allowedExtensions = ['image/jpg', 'image/jpeg', 'image/gif', 'image/png'];
                    // Si l'extension n'est pas autorisée, il y a une erreur
                    // if (!in_array($mimeType, $allowedExtensions)) {
                    //     $errors['photo'] = 'Ce type de fichier n\'est pas autorisé';
                    // }
                    // Vérifier la taille du fichier
                    // if ($photo['size'] / 2048 > 256) {
                    //     $errors['iphoto'] = 'L\image est trop lourde';
                    // // }
                    // if (!isset($errors['photo'])) {
                        // move_uploaded_file($file, __DIR__.'/assets/img'.$fileName); // On déplace le fichier uploadé où on le souhaite
                    // }
                }
    
        
            // S'il n'y a pas d'erreurs dans le formulaire
            if (empty($errors)) {
                $query = $db->prepare('INSERT INTO logement (`titre`, `adresse`, `ville`, `cp`, `surface`, `prix`, `type`, `description`)
                VALUES (:titre, :adresse, :ville, :cp, :surface, :prix, :type, :description)
                ');

                //  , `photo`, `type`, `description`) VOIR POUR AJOUTER CES DONNEES DANS LA TABLE
                //  , :photo, :type, :description)

                $query->bindValue(':titre', $titre, PDO::PARAM_STR);
                $query->bindValue(':adresse', $adresse, PDO::PARAM_STR);
                $query->bindValue(':ville', $ville, PDO::PARAM_STR);
                $query->bindValue(':cp', $cp, PDO::PARAM_INT);
                $query->bindValue(':surface', $surface, PDO::PARAM_INT);
                $query->bindValue(':prix', $prix, PDO::PARAM_INT);
                // $query->bindValue(':photo', $fileName, PDO::PARAM_STR);
                $query->bindValue(':type', $type, PDO::PARAM_STR);
                $query->bindValue(':description', $description, PDO::PARAM_STR);
    
                if ($query->execute()) { // On insère le logement dans la BDD
                    $success = true;
                }
            }
        
        // }

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

            <label for="cp" class='cp'>Code postal</label>
            <input class="form-control col-6 <?= (isset($errors['cp'])) ? 'is-invalid' : ''; ?>" type="text"
                name="cp" id="cp" value="<?= $cp; ?>" />
            <div class="invalid-feedback">
                <?php echo (isset($errors['cp'])) ? $errors['cp']: ''; ?>
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
                <label for="photo" class='label_title'>Photo</label>
                <input type="file" name="photo" id="photo" class="form-control col-6 <?= (isset($errors['photo'])) ? 'is-invalid' : null; ?> " />
                <div class="invalid-feedback">
                    <?php echo (isset($errors['photo'])) ? $errors['photo']: ''; ?>
                </div>
            </div>

            <button class="btn btn-primary">Ajoutez le logement</button>
    </form>
</div>
<?php

// Le fichier footerer.php est inclus dans la page
require_once(__DIR__.'/partials/footer.php');
?>
