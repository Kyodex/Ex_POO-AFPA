<?php
require 'header.php';
require '../controllers/login_controller.php';
if(isset($_SESSION['login'])){
?>


<div class="container">
    <div class="row">
        <div class="col-12">

            <h1> TEST de connexion bienvenue <?= $_SESSION['login']?></h1>
            <a href="../controllers/deco_controller.php" class="btn btn-danger ">Decon</a>

        </div>           
    </div>       
</div>

<?php }else{
    ?>
<div class="container">
    <div class="row">
        <div class="col-12">

            <p>C'est un echec tu n'est pas co</p>

        </div>           
    </div>       
</div>
<?php }
require'footer.php';
?>