<?php

// récupérer l'ID de la pizza dans l'URL
$id = $_GET['id'];

// inclure la base de données
require_once(__DIR__.'/config/database.php');

// récupérer les informations de la pizza
$query=$db->prepare('SELECT * FROM pizza WHERE id = :id'); // :id est un paramètre
// $query=$db->prepare('SELECT * FROM pizza WHERE id = '.$id); // :id est un paramètre
$query->bindvalue(':id', $id, PDO::PARAM_INT); //Liaison des 2 valeurs entre elle (:id devient $id) 
// on s'assure que l'id est bien un entier
$query->execute(); //Execute la requête
$pizza = $query->fetch();

// renvoyer une 404 si la pizza n'existe pas
if($pizza === false){
    http_response_code(404);
    // on pourrait aussi rediriger l'utilisateur vers la liste des pizzas
    // header('location: pizza_list.php);
    require_once(__DIR__.'/partials/header.php'); ?>
    <h1>404. Redirection dans 5 secondes...</h1>
    <script>
        setTimeout(function(){
            window.location = 'pizza_list.php';
        }, 5000);
    </script>
    
    <?php require_once(__DIR__.'/partials/footer.php');
    die();
}

// var_dump($pizza);

$currentPageTitle = $pizza['name'];

// Le fichier header.php est inclus dans la page
require_once(__DIR__.'/partials/header.php');
?>

<main class="container">
    <div class="row">
            <div class="col-md-6">
                
                <img class="img-fluid" src="assets/<?php echo $pizza['image']; ?>" alt=<?php $pizza['name'];?>>

            <!-- <h1>IMAGE DE LA PIZZA</h1> -->
            ></div>
            <div class="col-md-6">
            <div class="card descript-pizza">
                <h3 class="pizza-name-title"><?php echo $pizza['name'];?></h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto adipisci optio eaque expedita aliquid, 
                    amet minima sequi aspernatur minus ab?</p>
        
                <?php
                //récupère la liste des tailles de pizzas
                $query = $db->query('SELECT * FROM size');
                $sizes = $query->fetchall();
                // var_dump($sizes);
                ?>
                
                <p>Taille des pizzas :</p>
                <?php                
                foreach($sizes as $values) {
                $size=$values['name'];
                $sup_price=$values['price'];
                $price=$pizza['price'];
                $total_price=$sup_price+$price;
                }
                ?>

                <h3 class=""><?php echo formatPrice($pizza['price']); ?></h3>
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
