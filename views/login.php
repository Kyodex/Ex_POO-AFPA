<?php
require 'header.php';
require '../controllers/login_controller.php';

if(!isset($_SESSION['login'])){
?>
<div class="container">
    <div class="row">
        <div class="col-12">
           <div class="form-group">
               <h3>Connexion:</h3>
                  
            <form action ="#" method ="POST" >
                <label for ="login" >Identifiant :</label>
                <input class="form-group form-control" type="text" name="login" id="login" value="">
                <p class="text-danger"><?php if (isset($errormsg['login'])) { echo $errormsg['login'];} ?></p>
                <label for="password">Mot de passe :</label>
                <input class="form-group form-control" type="password" name="password" id="password" value="">
                <p class="text-danger"><?php if (isset($errormsg['password'])) { echo $errormsg['password'];} ?></p>
                <input class="btn btn-success" type="submit" name="submit" value="Submit">
                <a href="signup.php" class="btn btn-warning">S'inscrire</a>
            </form>
           </div>
        </div>           
    </div>       
</div>
<?php }else{ ?>
<div class="container">
    <div class="row">
        <div class="col-12">

            <h1> YOSH Tu veux te déco ??... <?= $_SESSION['login']?></h1>
            <a href="../controllers/deco_controller.php" class="btn btn-danger ">Decon</a>

        </div>           
    </div>       
</div>

<?php } require'footer.php';
?>