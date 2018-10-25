<?php 

$currentPageTitle = 'Nos pizzas';

// Le fichier header.php est inclus dans la page
require_once(__DIR__.'/partials/header.php');

    //récupère la liste des pizzas
        $query = $db->query('SELECT * FROM pizza');
        $pizzas = $query->fetchall();
        ?>

    <main class="container">
        <h1 class="page-title">Liste des pizzas</h1>

        <div class="row">
            <?php
                // on affiche les pizzas
                foreach($pizzas as $pizza) { ?>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-img-top-container">
                                <!-- <img class="card-img-top card-img-top-zoom-effect" src="assets/img/pizzas/reine.jpg" alt=<?php $pizza['name'];?>> -->
                                <div class="card-price "><?php echo formatPrice($pizza['price']); ?></div>
                            <img class="card-img-top card-img-top-zoom-effect" src="assets/<?php echo $pizza['image']; ?>" alt=<?php $pizza['name'];?>>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $pizza['name'];?></h5>

                                <!-- Quand on clique sur le lien, on doit se rendre sur pizza_single.php -->
                                <!-- l'URL doit ressembler à pizza_single.php?id=ID de la pizza -->

                                <a href="pizza_single.php?id=<?php echo $pizza['id'];?>" class="btn btn-danger">Commandez</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
        </div>
    </main>

<?php
// Le fichier footer.php est inclus dans la page
require_once(__DIR__.'/partials/footer.php');
?>