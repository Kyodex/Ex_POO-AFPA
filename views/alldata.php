<?php
require 'header.php';
require '../controllers/alldata_poo_controller.php'; //importe le fichier comprenant la requête

?>
<div class="container">
    <div class="row">
        <div class="col-12 col-md-10">
            <!-- Titre de la page -->
            <h1 class="float-left">
                POO : Liste de disques (<?= count($tableau) ?>)
            </h1>
        </div>
        <div class="col-12 col-md-2 pt-md-5">
            <!-- Bouton pour ajouter un disque -->
            <a href="create.php" class="float-sm-right  btn btn-primary" >Ajouter</a>
            <!-- affiche chaque disque -->
        </div>
    </div>
    <div class="row pt-3">
        
        <?php
        
        foreach ($tableau as $artist):
            ?>
            <div class="col-12 col-sm-6 pb-4">
                <!--image-->
                <img class = "mr-3 float-left" src = "../assets/pictures/<?= $artist->disc_picture ?>" width = "180" height = "180">
                <!--nom du disque-->
                <span class="font-weight-bold n_disque"><?= $artist->disc_title ?><br></span>
                <!-- artiste -->
                <span class="font-weight-bold"><?= $artist->artist_name ?></span><br>
                <!-- Label -->
                <span class="font-weight-bold">Label : </span><?= $artist->disc_label ?><br>
                <!-- Année -->
                <span class="font-weight-bold">Année : </span><?= $artist->disc_year ?><br>
                <!-- Genre -->
                <span class="font-weight-bold">Genre : </span><?= $artist->disc_genre ?><br>
                <!--Prix-->
                <span class="font-weight-bold">Prix : </span><?= $artist->disc_price ?><br>
                <!-- Lien vers la page du disque -->                                   
                <a href="read.php?disc_id=<?= $artist->disc_id ?>" class="btn btn-primary" >Détail</a>
            </div>
            <?php
        endforeach;
        ?> 
    </div>
</div>
​
<?php
require 'footer.php';
?>