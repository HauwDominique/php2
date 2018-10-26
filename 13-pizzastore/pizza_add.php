<?php
// Le fichier header.php est inclus dans la page
require_once(__DIR__.'/partials/header.php');?>

<?php
		// On déclare les variables pour éviter les erreurs
		$name = null;
        $price = null;
        $image = null;
        $description = null;

		$message = null;
		if (!empty($_POST)) { // Récupére les informations saisies dans le formulaire
		    $name = $_POST['name']; //ok 
            $price = $_POST['price']; //ok
            $image = $_POST['image'];
		    $description = $_POST['description'];

		    // $message = $_POST['message'];

			$errors = [];

		    if (empty($name)) {
		    	$errors['name'] = 'Le nom ne doit pas être vide. <br />';
		        //echo 'Le sujet ne doit pas être vide. <br />';
            }
            
            if (empty($price)) {
		    	$errors['price'] = 'Le prix ne doit pas être vide. <br />';
		        //echo 'Le sujet ne doit pas être vide. <br />';
            }
            
            if (empty($image)) {
		    	$errors['image'] = 'Le champ des image ne doit pas être vide. <br />';
		        //echo 'Le sujet ne doit pas être vide. <br />';
            }
            
            if (empty($description)) {
		    	$errors['description'] = 'Le champ description ne doit pas être vide. <br />';
		        //echo 'Le sujet ne doit pas être vide. <br />';
            }

		    if (empty($errors)) {
			    echo 'Envoi de l\'ajout de la pizza';
            }
            
            // S'il n'y a pas d'erreurs dans le formulaire
            if (empty($errors)) {
            $query = $db->prepare('
                INSERT INTO pizza (`name`, `price`, `image`) VALUES (:name, :price, :image)
            ');
            $query->bindValue(':name', $name, PDO::PARAM_STR);
            $query->bindValue(':price', $price, PDO::PARAM_STR);
            $query->bindValue(':image', $image, PDO::PARAM_STR);

            if ($query->execute()) { // On insère la pizza dans la BDD
                $success = true;
                // Envoyer un mail ?
                // Logger la création de la pizza
            }
        }
    }
	?>


<main class="container">
    <h1 class="page-title">Ajoutez une pizza</h1>

    <form method="POST">
        <div class="form-group">
            <label for="name" class='label_title'>Nom de la pizza</label>
            <input class="form-control <?= (isset($errors['name'])) ? 'is-invalid' : ''; ?>" type="text" name="name" id="name"
                value="<?= $name; ?>" />
            <div class="invalid-feedback">
                <?php echo (isset($errors['name'])) ? $errors['name']: ''; ?>
            </div>
        </div>

        <label for="price" class='label_title'>Prix de la pizza</label>
        <input class="form-control <?= (isset($errors['price'])) ? 'is-invalid' : ''; ?>" type="text" name="price" id="price"
            value="<?= $price; ?>" />
        <div class="invalid-feedback">
            <?php echo (isset($errors['price'])) ? $errors['price']: ''; ?>
        </div>

        <div class="form-group">
            <label for="image" class='label_title'>Image de la pizza</label>
            <input class="form-control <?= (isset($errors['image'])) ? 'is-invalid' : ''; ?>" type="text" name="image"
                id="image" value="<?= $image; ?>" />

            <div class="invalid-feedback">
                <?php echo (isset($errors['image'])) ? $errors['image']: ''; ?>
            </div>
        </div>

        <div class="form-group">
            <label for="description" class='label_title'>Description de votre pizza</label>
            <!-- <textarea class="form-control" id="description_pizza" rows="4"></textarea> -->

            <textarea class="form-control <?= (isset($errors['description'])) ? 'is-invalid' : ''; ?>" name="description"
                id="description"><?php echo $message; ?></textarea>
            <div class="invalid-feedback">
                <?php echo (isset($errors['description'])) ? $errors['description']: ''; ?>
            </div>

        </div>
        <div class="form-group">
            <label for="categorie" class='label_title'>Catégorie</label>
            <select class="form-control">
                <option>Vegan</option>
                <option>bio</option>
                <option>gourmande</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</main>


<?php
// Le fichier footerer.php est inclus dans la page
require_once(__DIR__.'/partials/footer.php');
?>