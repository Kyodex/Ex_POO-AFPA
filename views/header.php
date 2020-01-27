<?php 
session_start();
?>
<!DOCTYPE html>
<html lang = "fr">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <meta http-equiv = "X-UA-Compatible" content = "ie=edge">
        <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity = "sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin = "anonymous">
      
        <title>PHP jeej</title>
    </head>
    <body>
        <!--navbar-->
        <div class = "container-fluid">
            <nav class = "navbar navbar-expand-lg navbar-dark bg-dark">
                <a class = "navbar-brand" href = "alldata.php">Index</a>
                <button class = "navbar-toggler" type = "button" data-toggle = "collapse" data-target = "#navbarNavDropdown" aria-controls = "navbarNavDropdown" aria-expanded = "false" aria-label = "Toggle navigation">
                    <span class = "navbar-toggler-icon"></span>
                </button>
                <div class = "collapse navbar-collapse" id = "navbarNavDropdown">
                    <ul class = "navbar-nav">
                        <li class = "nav-item ">
                            <a class = "nav-link" href = "../index.php">Accueil </a>
                        </li>
                        <li class = "nav-item dropdown">
                            <a class = "nav-link dropdown-toggle" href = "#" id = "navbarDropdownMenuLink" data-toggle = "dropdown" aria-haspopup = "true" aria-expanded = "false">
                                Exercice PDO
                            </a>
                            <div class = "dropdown-menu" aria-labelledby = "navbarDropdownMenuLink">
                                <a class = "dropdown-item" href = "alldata.php">Connexion pdo artist... </a>
                                <a class="dropdown-item" href= "create.php">Page ajouter.</a>
                            </div>
                        </li>
                        <li class="nav-item ">
                                <?php if(isset($_SESSION['login'])){?><a class="nav-link" href="login.php">Deconnexion</a>
                                <?php }else{?><a class="nav-link" href="login.php">Connexion</a><?php } ?>
                            </li>
                    </ul>
                </div>
            </nav>
        </div>
