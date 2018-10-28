<?php
// Le fichier header.php est inclus dans la page
require_once(__DIR__.'/partials/header.php');?>

<?php
		// On déclare les variables pour éviter les erreurs
		$name = null;
        $price = null;
        $image = null;
        $description = null;
        $category=null;
    
		// $message = null;
		if (!empty($_POST)) { // Récupére les informations saisies dans le formulaire
		    $name = $_POST['name']; //ok 
            $price = $_POST['price']; //ok
            $image = $_FILES['image']; //ATTENTION ICI IL FAUT PENSER A METTR $_FILES pour les images
            $description = $_POST['description'];
            $category = $_POST['category'];

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
            
            if ($image['error']===4) {
		    	$errors['image'] = 'L\'image n\'est pas valide. <br />';
		        //echo 'Le sujet ne doit pas être vide. <br />';
            }
            
            if (empty($description)) {
		    	$errors['description'] = 'Le champ description ne doit pas être vide. <br />';
		        //echo 'Le sujet ne doit pas être vide. <br />';
            }

            if (empty($category)) {
		    	$errors['category'] = 'Le champ ne doit pas être vide. <br />';
		        //echo 'Le sujet ne doit pas être vide. <br />';
            }


		    if (empty($errors)) {
			    echo 'Envoi de l\'ajout de la pizza';
            }

            // upload de l'image
            // if (empty($errors)) {
                var_dump($image);
                $file=$image['tmp_name'];//emplacement du fichier temporaire
                $fileName='img/pizzas/'.$image['name'];// variable pour la  base de donnée

                $info=finfo_open(FILEINFO_MIME_TYPE);//permet d'ouvrir un fichier pour analyser sont type
                $mimeType = finfo_file($info, $file); //ouvre le fichier et renvoie image/jpg
                $allowedExtensions= ['image/jpg', 'image/jped', 'image/gif', 'image/png'];
                
                // si l'extension n'est pas autorisée, il y a une erreur
                if(in_array($mimeType, $allowedExtensions)){
                    $errors['image']='ce type de fichier n\'est pas autorisé';
                }

                // vérifier la taille de l'image
                if($image['size']/1024 > 100) {
                    $errors['image'] = 'l\image est trop lourde';
                }

                if(!isset($errors['image'])) {
                    move_uploaded_file($file, __DIR__.'/assets/'.$fileName);
                    //on déplace le fichier upload où on le souhaite
                }
                
            // }
            
            // S'il n'y a pas d'erreurs dans le formulaire
            if (empty($errors)) {
            $query = $db->prepare('
            INSERT INTO pizza (`name`, `price`, `image`, `category`, `description`) 
            VALUES (:name, :price, :image, :category, :description)
            ');
            $query->bindValue(':name', $name, PDO::PARAM_STR);
            $query->bindValue(':price', $price, PDO::PARAM_STR);
            $query->bindValue(':image', $fileName, PDO::PARAM_STR);
            $query->bindValue(':category', $category, PDO::PARAM_STR);
            $query->bindValue(':description', $description, PDO::PARAM_STR);

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

    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name" class='label_title'>Nom de la pizza</label>
            <input class="form-control col-6 <?= (isset($errors['name'])) ? 'is-invalid' : ''; ?>" type="text" name="name" id="name"
                value="<?= $name; ?>" />
            <div class="invalid-feedback">
                <?php echo (isset($errors['name'])) ? $errors['name']: ''; ?>
            </div>
        </div>

        <label for="price" class='label_title'>Prix de la pizza</label>
        <input class="form-control col-6 <?= (isset($errors['price'])) ? 'is-invalid' : ''; ?>" type="text" name="price" id="price"
            value="<?= $price; ?>" />
        <div class="invalid-feedback">
            <?php echo (isset($errors['price'])) ? $errors['price']: ''; ?>
        </div>

        <div class="form-group">
            <label for="image" class='label_title' >Image de la pizza</label>
            <input type="file" class="form-control col-6 <?= (isset($errors['image'])) ? 'is-invalid' : ''; ?>" name="image"
                id="image"/>

            <div class="invalid-feedback">
                <?php echo (isset($errors['image'])) ? $errors['image']: ''; ?>
            </div>
        </div>

        <div class="form-group">
            <label for="description" class='label_title'>Description de votre pizza</label>
            <!-- <textarea class="form-control" id="description_pizza" rows="4"></textarea> -->

            <textarea name="description" id="description" rows="3" class="form-control col-9 
            <?php echo isset($errors['description']) ? 'is-invalid' : ''; ?>">
            <?php echo $description; ?></textarea>

            <?php if (isset($errors['description'])) {
                echo '<div class="invalid-feedback">';
                    echo $errors['description'];
                echo '</div>';
            } ?>
        </div>

        <div class="form-group">
            <label for="category" class='label_title'>Catégorie</label>
            <select class="form-control col-6 <?= isset($errors['category']) ? 'is-invalid' : '';?>" name="category">
                <option value="">Choisissez la catégorie</option>
                <option value="vegan">Vegan</option>
                <option value="bio">Bio</option>
                <option value="hot">Hot</option>
            </select>
            <div class="invalid-feedback">
                <?php echo (isset($errors['category'])) ? $errors['category']: ''; ?>
            </div>
        </div>

        <button type="submit" class="btn btn-danger form-control col-4">Ajoutez votre pizza</button>
    </form>
</main>

<?php

// Le fichier footerer.php est inclus dans la page
require_once(__DIR__.'/partials/footer.php');
?>