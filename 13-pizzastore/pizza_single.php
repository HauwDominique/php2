<?php

// récupérer l'ID de la pizza dans l'URL
$id = $_GET['id'];

// inclure la base de données
require_once(__DIR__.'/config/database.php');

// récupérer les informations de la pizza
$query=$db->prepare('SELECT * FROM pizza WHERE id = :id'); // :id est un paramètre
$query->bindvalue(':id', $id, PDO::PARAM_INT); //on s'assure que l'id est bien un entier
$query->execute(); //Execute la requête
$pizza = $query->fetch();

var_dump($pizza);

$currentPageTitle = $pizza['name'];

// Le fichier header.php est inclus dans la page
require_once(__DIR__.'/partials/header.php');
?>

<main class="container">
    <div class="row">
            <div class="col-md-6">
            <h1>IMAGE DE LA PIZZA</h1>
            ></div>
            <div class="col-md-6">
            <h1>titre DE LA PIZZA</h1>
            </div>
        </div>
    </div>
</main>

<?php
// Le fichier footerer.php est inclus dans la page
require_once(__DIR__.'/partials/footer.php');


?>







<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="assets/js/script.js"></script>
</body>

</html>
