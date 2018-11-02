<?php
// Le fichier header.php
require_once(__DIR__.'/partials/header.php');

    //récupère la liste des logements
    $query = $db->query('SELECT * FROM logement');
    $logements = $query->fetchall();

    // var_dump($logements);
?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">photo</th>
      <th scope="col">titre</th>
      <th scope="col">adresse</th>
      <th scope="col">ville</th>
      <th scope="col">cp</th>
      <th scope="col">surface</th>
      <th scope="col">prix</th>
      <th scope="col">type</th>
      <th scope="col">description</th>
    </tr>
  </thead>


  <tbody>

    <?php   foreach($logements as $logement) { ?>

            <tr><th scope="row"><img src="assets/<?php echo $logement['photo']; ?>" alt="" class="img-table"> </th>
            <td><?php echo $logement['titre']; ?></td>
            <td><?php echo $logement['adresse']; ?></td>
            <td><?php echo $logement['ville']; ?></td>
            <td><?php echo $logement['cp']; ?></td>
            <td><?php echo $logement['surface']; ?></td>
            <td><?php echo $logement['prix']; ?></td>
            <td><?php echo $logement['type']; ?></td>
            <td><?php echo $logement['description']; ?></td>




            
            </tr>

        </tbody>

    <?php } ?>
</table>


<?php
// Le fichier footerer.php est inclus dans la page
require_once(__DIR__.'/partials/footer.php');
?>
