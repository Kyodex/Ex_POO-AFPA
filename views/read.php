<?php
require'../controllers/read_poo_controller.php';
require'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
             
                    <div class="card-header">
                        <h3 class="card-title"><?= $disc->getTitle(); ?></h3>                    
                        <caption class="card-text"><?= $disc->getYear(); ?></caption>
                    </div>
                    <img src="../assets/pictures/<?= $disc->getPicture(); ?>" class="card-img img-thumbnail">
                    <div class="card-body">
                        
                        <p class="card-text">Genre: <?= $disc->getGenre(); ?></p>
                        
                        <p class="card-text">N° artiste   <?= $disc->getArtist(); ?> </p>
                    </div>
                    <a class="badge badge-info" href="alldata.php">Back to home</a>
                    
                    <?php if(isset($_SESSION['login'])){ ?><a href="update.php?disc_id=<?= $disc_id ?>" class="btn btn-outline-warning" role="button">Edit</a><?php 
                                
                                }?>
                  
                    
            </div>
        </div>
    </div>
</div>
</div>
</div>           
</div>       
</div>


<?php
require 'footer.php';
?>