<?php
 // Début des Commentaires :
// Début de la session : Le session start ce trouve deja dans le header 
// Connexion à la bdd:
require 'co_bdd_controller.php';
//Déclaration d'un tableau d'erreurs:
$errormsg = array();
// Vérification de la valeur du submit :
if (isset($_POST['submit'])) {
    // Vérification de la contenance du login :
    if(isset($_POST['login'])){
    if (!empty($_POST['login'])) {
        // pregmatch a mettre ..
        // Requêtes dans la base de données pour récupérer les utilisateurs :
        $requete = $db->prepare("SELECT login,password FROM user_connexion WHERE login=:login;");
        // bindValue : permet de relier le marqueur nominatif :login au $_POST['login'] :
        $requete->bindValue(':login',$_POST['login'], PDO::PARAM_STR);
        // ON exécute la requête :
        $requete->execute();
        // ON récupère le résultat de la requête :
        $user = $requete->fetch(PDO::FETCH_OBJ);
        //Si l'objet login correspond à $_POST['login'] MODIF !!! : RowCount = Compte le nombre de ligne de la requete . Donc JEEEJ 
        if ($requete->rowCount()!=0) {
          //ON compare le mot de passe saisie par l'utilisateur et celui de la base de données :
            if (password_verify($_POST['password'], $user->password)) {
                // Déclaration d'une variable session dans laquelle on stock $_POST['login'] :
                $_SESSION['login'] = $_POST['login'];
                // Redirection vers la page de connexion : 
                header('Location: ../views/connect.php');
            } else {
                // ON stock un message d'erreur dans le tableau si le mot de passe est incorrect:
                $errormsg['password']="Problème : Mot de pase incorrect";
            }
        } else {
            // ON stock un message d'erreur dans le tableau si l'identifiant est incorrect:
            $errormsg['login'] = 'Problème : identifiant invalide';
        }
    }else{
        // ON stock un message d'erreur dans le tableau si l'utilisateur ne rentre pas d'identifiant :
        $error['login']="Problème : Veuillez rentrer un identifiant";
    }
}}

// FIN DES COMMENTAIRES 