<?php

require 'co_bdd_controller.php';
require 'mail_controller.php';
//require 'login_controller.php';

$errorco = array();

if (isset($_POST['submit'])) {
// verif login :
    if (isset($_POST['login'])) {
        if (!empty($_POST['login'])) {
            if (preg_match($text_regex, $_POST['login'])) {
                $requete = $db->prepare("SELECT login,password FROM user_connexion WHERE login=:login;");
                // bindValue : permet de relier le marqueur nominatif :login au $_POST['login'] :
                $requete->bindValue(':login', $_POST['login'], PDO::PARAM_STR);
                // ON exécute la requête :
                $requete->execute();

                if ($requete->rowCount()==0) {
                    $login = htmlspecialchars($_POST['login']);
                } else {
                    $errorco['login'] = " Cet identifiant est déja utiliser veuillez en rentrer un autre!";
                }
            } else {
                $errorco['login'] = "Problème : Veuillez rentrer un login sans cararctere speciaux.";
            }
        } else {
            $errorco['login'] = "Problème : Veuillez rentrer un indentifiant";
        }
    }

// verif mot de passe :
    if (isset($_POST['password1']) && isset($_POST['password2'])) {
        if (!empty($_POST['password1'])) {
            if (preg_match($password_regex, $_POST['password1'])) {
                $password1 = htmlspecialchars($_POST['password1']);
            } else {
                $errorco['password1'] = "Votre mot de passe n'est pas assez sécuriser : Une MAJ un Chiffre et un caractère special min.";
            }
        } else {
            $errorco['password1'] = "Veuillez rentrer un mot de passe";
        }
        if (!empty($_POST['password2'])) {
            if (preg_match($password_regex, $_POST['password2'])) {
                
            } else {
                $errorco['password2'] = "Votre mot de passe n'est pas assez sécuriser : Une MAJ un Chiffre et un caractère special min.";
            }
            if ($_POST['password2'] == $password1) {
                $password = password_hash($password1, PASSWORD_DEFAULT);
            } else {
                $errorco['password2'] = "Problème: Le mot de passe est different de celui tapé précedement";
            }
        } else {
            $errorco['password2'] = "Problème: Veuillez réentrer votre mot de passe";
        }
    }
    //verifd mail
    if (isset($_POST['mail'])) {
        if (preg_match($email_regex, $_POST['mail'])) {
            
        } else {
            $errorco['mail'] = " Veuillez rentrer un email valide";
        }
    }
    if (count($errorco) == 0) {
        $sql = 'INSERT INTO user_connexion (login, password) VALUES (:login, :password)';
        if ($st = $db->prepare($sql)) {
            $st->bindValue(':login', $login, PDO::PARAM_STR);
            $st->bindValue(':password', $password, PDO::PARAM_STR);
            if ($st->execute()) {
                echo '<div class="alert alert-success" role="alert">Votre compte a bien été créééééééééé!!! Vous receverez un mail de Bienvenue</div>';
                //envoi du mail 
                mail($_POST['mail'], "Bonjour", $message, $sHeaders);
                header("Refresh:4; url= ../views/login.php");
            } else {
                echo "Problème technique non executé";
            }
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">C\'est un echec...</div>';
    }
}    