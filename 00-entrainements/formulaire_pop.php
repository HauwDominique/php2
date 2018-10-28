<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>formulaire pop</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>


<?php

    // connexion à la base de donnée formulaire
    require_once(__DIR__.'/config/database.php');


      //récupère la liste du formulaire
      $query = $db->query('SELECT * FROM formulaire');
      $formulaire = $query->fetchall();

      var_dump($formulaire);

    // déclaration des variables
    $name = null;
    $firstname = null;
    $mail = null;
    
    if (!empty($_POST)) { // Récupére les informations saisies dans le formulaire
        $name = $_POST['name'];
        $firstname = $_POST['firstname'];
        $mail = $_POST['mail'];

        $errors = [];

        if (empty($name)) {
        $errors['name'] = 'Le champ nom ne doit pas être vide. <br />';
        }
        if (empty($firstname)) {
            $errors['firstname'] = 'Le champ prénom ne doit pas être vide. <br />';
            }
            if (empty($mail)) {
                $errors['mail'] = 'Le champ email ne doit pas être vide. <br />';
                } 
    
    }

if (empty($errors)) {
  $query = $db->prepare('
  INSERT INTO formulaire (`name`, `firstname`, `mail`) 
  VALUES (:name, :firstname, :mail)
  ');
  $query->bindValue(':name', $name, PDO::PARAM_STR);
  $query->bindValue(':firstname', $firstname, PDO::PARAM_STR);
  $query->bindValue(':mail', $mail, PDO::PARAM_STR);

  $query->execute();
}

//   if ($query->execute()) { // On insère les données du formalaire dans la BDD
//       $success = true;
//       // Envoyer un mail ?
//       // Logger la création de la pizza
//   }

?>

    <form class="container" method="POST">

        <h1>Entrez vos coordonnées</h1>

        <div class="row">
            <div class="col">
                <label for="name">Nom</label>
                <input type="text" class="form-control <?= (isset($errors['name'])) ? 'is-invalid' : ''; ?>" 
                name="name" value="<?php echo $name; ?>">
                <div class="invalid-feedback">
		        	<?php echo (isset($errors['name'])) ? $errors['name']: ''; ?>
		        </div>
            </div>
            <div class="col">
                <label for="firstname">Prénom</label>
                <input type="text" class="form-control <?= (isset($errors['name'])) ? 'is-invalid' : ''; ?>" 
                name="firstname" value="<?php echo $firstname; ?>">
                <div class="invalid-feedback">
		        	<?php echo (isset($errors['firstname'])) ? $errors['firstname']: ''; ?>
		        </div>

            </div>
            <div class="col">
                <label for="mail">Email</label>
                <input type="email"  id="mail" class="form-control <?= (isset($errors['mail'])) ? 'is-invalid' : ''; ?>" 
                name="mail" value="<?php echo $mail; ?>">
                <div class="invalid-feedback">
		        	<?php echo (isset($errors['mail'])) ? $errors['mail']: ''; ?>
		        </div>

            </div>
        </div>

        <!-- <div class="row">
            <div class="col">
                <label for="adress">Addresse</label>
                <input type="text" class="form-control" id="adress">
            </div>
        </div>    

        <div class="row">
            <div class="col">
                <label for="zip">Code Postal</label>
                <input type="text" class="form-control" id="zip">
            </div>
            <div class="col">
                <label for="city">Ville</label>
                <input type="text" class="form-control" id="city">
            </div>
            <div class="col">
                <label for="state">Pays</label>
                <select id="state" class="form-control">
                    <option selected>France</option>
                    <option>Belgique</option>
                </select>
            </div>
        </div>
        </div> -->

        <div class="row">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</body>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"> </script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>

</html>