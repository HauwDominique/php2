<?php
// Le fichier header.php est inclus dans la page
require_once(__DIR__.'/partials/header.php');?>

<?php
		// On déclare les variables pour éviter les erreurs
		$pizza_name = null;
        $pizza_price = null;
        $pizza_image = null;
        $pizza_description = null;

		$message = null;
		if (!empty($_POST)) { // Récupére les informations saisies dans le formulaire
		    $pizza_name = $_POST['pizza_name']; //ok 
            $pizza_price = $_POST['pizza_price']; //ok
            $pizza_image = $_POST['pizza_image'];
		    $pizza_description = $_POST['pizza_description'];

		    // $message = $_POST['message'];

			$errors = [];

		    if (empty($pizza_name)) {
		    	$errors['pizza_name'] = 'Le nom ne doit pas être vide. <br />';
		        //echo 'Le sujet ne doit pas être vide. <br />';
            }
            
            if (empty($pizza_price)) {
		    	$errors['pizza_price'] = 'Le prix ne doit pas être vide. <br />';
		        //echo 'Le sujet ne doit pas être vide. <br />';
            }
            
            if (empty($pizza_image)) {
		    	$errors['pizza_image'] = 'Le champ des image ne doit pas être vide. <br />';
		        //echo 'Le sujet ne doit pas être vide. <br />';
            }
            
            if (empty($pizza_description)) {
		    	$errors['pizza_description'] = 'Le champ description ne doit pas être vide. <br />';
		        //echo 'Le sujet ne doit pas être vide. <br />';
            }

		    if (empty($errors)) {
			    echo 'Envoi de l\'ajout de la pizza';
			}
		}
	?>


<main class="container">
    <h1 class="page-title">Ajoutez une pizza</h1>

    <form method="POST">
        <div class="form-group">
            <label for="pizza_name" class='label_title'>Nom de la pizza</label>
            <input class="form-control <?= (isset($errors['pizza_name'])) ? 'is-invalid' : ''; ?>" type="text" name="pizza_name"
                id="pizza_name" value="<?= $pizza_name; ?>" />
                <div class="invalid-feedback">
		        	<?php echo (isset($errors['pizza_name'])) ? $errors['pizza_name']: ''; ?>
		        </div>
        </div>

        <label for="pizza_price" class='label_title'>Prix de la pizza</label>
        <input class="form-control <?= (isset($errors['pizza_price'])) ? 'is-invalid' : ''; ?>" type="text" name="pizza_price"
            id="pizza_price" value="<?= $pizza_price; ?>" />
            <div class="invalid-feedback">
		        	<?php echo (isset($errors['pizza_price'])) ? $errors['pizza_price']: ''; ?>
		        </div>

        <div class="form-group">
            <label for="pizza_image" class='label_title'>Image de la pizza</label>
             <input class="form-control <?= (isset($errors['pizza_image'])) ? 'is-invalid' : ''; ?>" type="text" name="pizza_image"
            id="pizza_image" value="<?= $pizza_image; ?>" />
          
            <div class="invalid-feedback">
		        <?php echo (isset($errors['pizza_image'])) ? $errors['pizza_image']: ''; ?>
		    </div>
        </div>      
        
        <div class="form-group">
            <label for="description_pizza" class='label_title'>Description de votre pizza</label>
            <!-- <textarea class="form-control" id="description_pizza" rows="4"></textarea> -->

            <textarea class="form-control <?= (isset($errors['pizza_description'])) ? 'is-invalid' : ''; ?>" 
            name="pizza_description" id="pizza_description"><?php echo $message; ?></textarea>
		        <div class="invalid-feedback">
		        	<?php echo (isset($errors['pizza_description'])) ? $errors['pizza_description']: ''; ?>
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