<?php
require '../controllers/create_user_controller.php';
require '../controllers/mail_controller.php';
require 'header.php';

?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class='form-group'>
                <h3>Inscription : </h3>
            <form action ="#" method ="POST" >
                <label for ="login" >Identifiant :</label>
                <input class="form-group form-control" type="text" name="login" id="login" value="">
                <p class="text-danger"><?php if(isset($errorco['login'])){ echo $errorco['login'];} ?></p>
    
                <label for="password1">Mot de passe :</label>
                <input class="form-group form-control" type="password" name="password1" id="password1" value="">
                <p class="text-danger"><?php if(isset($errorco['password1'])){ echo $errorco['password1'];} ?></p>
                
                <label for="password2">Mot de passe AGAIN :</label>
                <input class="form-group form-control" type="password" name="password2" id="password2" value="">
                <p class="text-danger"><?php if(isset($errorco['password2'])){ echo $errorco['password2'];} ?></p>
                
                
                <label for="mail">Votre Email: </label>
                <input type="mail" name="mail" id="mail" class="form-group form-control">
                 <p class="text-danger"><?php if(isset($errorco['mail'])){ echo $errorco['mail'];} ?></p>


                <input class="btn btn-success" type="submit" name="submit" value="S'inscrire">
            </form>
                
           </div>
        </div>   
    </div>       
</div>


<?php

 
require'footer.php';
?>