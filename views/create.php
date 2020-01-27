<?php

require '../models/disc_dao.php';
require '../controllers/poo_ajout_controller.php'; //importe le fichier comprenant la requête

require 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>    <!-- Titre de la page -->
                Ajout d'un disque
            </h1> 
            <!-- Formulaire d'ajout -->
            <form action="#" method="POST" enctype="multipart/form-data">
                <!-- Titre -->
                <div class="form-group">
                    <label for="title">Titre :</label>
                    <input type="text" class="form-control" name="title" id="title" placeholder="Entrer un titre" value="🤷">
                    <p class="text-danger"><?php if (isset($error_msg['title'])) {echo $error_msg['title'];} ?></p>
                </div>
                <!-- Artiste -->
                <div class="form-group">
                    <label for="artist">Choisir un artiste</label>
                    <select class="form-control" id="artist" name="artist">              
                        <?php
                        foreach ($artiste AS $nom) {  //Affiche la liste des artistes
                            ?>                        
                            <option value="<?= $nom->artist_id ?>">
                                <?= $nom->artist_name ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                    <p class="text-danger"><?php if (isset($error_msg['artist'])) {echo $error_msg['artist'];} ?></p>
                </div>
​            <!--Images-->
                <div class="custom-file">
                <input type="file" name="picture" id="disc_picture" class="custom-file-input">
                <label for="disc_picture" class="custom-file-label">Image de l'album </label>
                <p class="text-danger"><?php if(isset($error_msg['picture'])){ echo $error_msg['picture'];} ?></p>
                </div>
                <!-- Année -->
                <div class="form-group">
                    <label for="year">Année :</label>
                    <input type="text" class="form-control" id="year" name="year" placeholder="Entrer une année" value="?">
                    <p class="text-danger"><?php if (isset($error_msg['year'])) {echo $error_msg['year'];} ?></p>
                </div>
                <!-- Genre -->
                <div class="form-group">
                    <label for="genre">Genre :</label>
                    <input type="text" class="form-control" id="genre" name="genre" placeholder="Entrer un genre (Rock, Pop, Prog...)" value="">
                    <p class="text-danger"><?php if (isset($error_msg['genre'])) {echo $error_msg['genre'];} ?></p>
                </div>
                <!--Prix-->
                <div class="form-group">
                    <label for="price">Prix :</label>
                    <input type="text" class="form-control" id="price" name="price" placeholder="Entrer un Prix" value="">
                    <p class="text-danger"><?php if (isset($error_msg['price'])) {echo $error_msg[''];} ?></p>
                </div>
                <!--Label-->
                <div class="form-group">
                    <label for="label">Label :</label>
                    <input type="text" class="form-control" id="label" name="label" placeholder="Entrer un Label" value="">
                    <p class="text-danger"><?php if (isset($error_msg['price'])) {echo $error_msg[''];} ?></p>
                </div>
                <!-- bouton de validation du formulaire -->
                <button type="submit" class="btn btn-primary mt-3" name="submit">Ajouter</button>
                <a href="alldata.php" class="btn btn-primary mt-3">Retour</a>
            </form>
        </div>
    </div>
</div>
​
<?php
require 'footer.php';
?>
