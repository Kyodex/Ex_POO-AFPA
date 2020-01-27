<?php
require '../controllers/co_bdd_controller.php';
require 'disc.php';


class DiscDAO
{
 private $db;
 
    function __construct($db) {
       $this->db = $db ;
    }
 
    function insert($dis) {
        // générer une requête insert à partir de l'objet $dis (représentant un objet de la classe Disc)
        // exécuter cette requête à partir de la propriété $db
         $requete = $this->db->prepare("insert into disc (disc_title,disc_year,disc_genre,artist_id,disc_picture,disc_price,disc_label) values (:disc_title,:disc_year,:disc_genre,:artist_id,:disc_picture,:disc_price,:disc_label)");
         // foo = new Disc(.......);
         $requete->bindValue(':disc_title', $dis->getTitle());
         $requete->bindValue(':disc_year', $dis->getYear());
         $requete->bindValue(':disc_genre', $dis->getGenre());
         $requete->bindValue(':artist_id', $dis->getArtist());
         $requete->bindValue(':disc_picture', $dis->getPicture());
         $requete->bindValue(':disc_price', $dis->getPrice());
         $requete->bindValue(':disc_label', $dis->getLabel());
        $requete->execute();
    }
 
    function update($dis) {
        
        $requete=$this->db->prepare('UPDATE disc SET disc_title=:disc_title,disc_year=:disc_year,disc_genre=:disc_genre,artist_id=:artist_id,disc_picture=:disc_picture,disc_price=:disc_price,disc_label=:disc_label WHERE disc_id =:disc_id');
        $requete->bindValue(':disc_id', $_GET['disc_id']);
        $requete->bindValue(':disc_title', $dis->getTitle());
         $requete->bindValue(':disc_year', $dis->getYear());
         $requete->bindValue(':disc_genre', $dis->getGenre());
         $requete->bindValue(':artist_id', $dis->getArtist());
         $requete->bindValue(':disc_picture', $dis->getPicture());
         $requete->bindValue(':disc_price', $dis->getPrice());
         $requete->bindValue(':disc_label', $dis->getLabel());
        $requete->execute();
        
    }
 
    function delete($dis) {
        // foo = null ;
           $requete = $this->db->prepare('DELETE FROM Disc WHERE disc_id= ?;');
           $requete->execute(array($id));
    }
 
    function find($id) {
           $requete = $this->db->prepare('SELECT * FROM disc WHERE disc_id = :id;');
        $requete->bindValue(':id',$id);
        $requete->execute();
        $resultat=$requete->fetch(PDO::FETCH_OBJ);
        
        //Crée un objet disc avec les valeurs du résultat de la requête
        $dis2 = new Disc();
        $dis2->setTitle($resultat->disc_title);
        $dis2->setYear($resultat->disc_year);
        $dis2->setGenre($resultat->disc_genre);
        $dis2->setArtist($resultat->artist_id);
        $dis2->setPicture($resultat->disc_picture);
        $dis2->setPrice($resultat->disc_price);
        $dis2->setLabel($resultat->disc_label);
        return $dis2;
    }
 
    function liste() {
            $requete = $this->db->query('SELECT * FROM disc INNER JOIN Artist ON disc.artist_id=artist.artist_id');
            $resultat = $requete->fetchAll(PDO::FETCH_CLASS);
            return $resultat;
    }
}
