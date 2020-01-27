<?php 

 require'../models/disc_dao.php';
 
if (isset($_GET['disc_id'])) {  //s'il y a 
    $disc_id = htmlspecialchars($_GET['disc_id']);  //récupère l'identifiant
    $dao = new DiscDAO($db);
    $disc = new Disc();    //Crée l'objet avec le disque
    $disc = $dao->find($disc_id);  //récupère les valeurs 
    $sql = 'SELECT * FROM disc INNER JOIN artist ON disc.artist_id = artist.artist_id  WHERE disc_id =?';

    $st = $db->prepare($sql);
    $st->execute(array($_GET['disc_id']));
    $disc8 = $st->fetch(PDO::FETCH_OBJ);
   
    if(isset($_POST['Supprimer'])){ //Si l'utilistaeur clique sur supprimer
        $dao->delete($_GET['disc_id']); //alors on supprime le disque
        //Redirection
        header('Location:../views/poo_liste.php');
    }

    
    
}
    

    