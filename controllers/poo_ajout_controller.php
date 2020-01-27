<?php
 require 'co_bdd_controller.php';
//recupartion de commentaires : (artiste)
     $sql = 'SELECT * FROM artist ';
    $st = $db->query($sql);
    $artiste = $st->fetchALL(PDO::FETCH_OBJ);
   
    
 $error_msg= array();
 if(isset($_POST['submit'])){
     //verif title
     if (!empty($_POST['title'])) {
        if (preg_match($text_regex, $_POST['title'])) {
            $disc_title = htmlspecialchars($_POST['title']);
        } else {
            $error_msg['title'] = "Veuillez rentrer un titre Valide...";
        }
    } else {
        $error_msg['title'] = "Veuillez rentrer un titre";
    }
// verif year 
    if (!empty($_POST['year'])) {
        if (preg_match($num_regex, $_POST['year'])) {
            $disc_year = htmlspecialchars($_POST['year']);
        } else {
            $error_msg['year'] = 'Veuillez rentrer une date valide';
        }
    } else {
        $error_msg['year'] = 'Veuillez rentrer une date';
    }
    //verif genre
 if (!empty($_POST['genre'])) {
        if (preg_match($text_regex, $_POST['genre'])) {
            $disc_genre = htmlspecialchars($_POST['genre']);
        } else {
            $error_msg['genre'] = "Veuillez rentrer un genre musical valid";
        }
    } else {
        $error_msg['genre'] = "veuillez rentrer un genre musical";
    }
    // verif Artiste :
    if (!empty($_POST['artist'])) {
        if (preg_match($num_regex, $_POST['artist'])) {
            $artist_id = htmlspecialchars($_POST['artist']);
        }else{
            $error_msg['artist']="Veuillez rentrer un id artist valable";
        }        
   }else{
        $error_msg['artist']="Veuillez rentrer in id...";
    }
        // verif et implantation image 
    if(isset($_FILES['picture'])){
          $picture_path = '../assets/pictures/ ';
        $picture_name = basename($_FILES['picture']['name']);
        $picture_path = trim($picture_path) . $picture_name;
        // type de fichier accepter
        $aMimeTypes = array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");
        // On extrait le type du fichier via l'extension FILE_INFO 
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimetype = finfo_file($finfo, $_FILES['picture']['tmp_name']);
        finfo_close($finfo);
        if (in_array($mimetype, $aMimeTypes)) {          
        }else{
            $error_msg['picture']="Votre fichier n'est pas une image valide";
        }
    }else{
        $error_msg['picture']="Veuillez rentrer une image svp.";
    }
    //Verif prix
    if (!empty($_POST['price'])) {
        if (preg_match($price_regex, $_POST['price'])) {
            $disc_price = htmlspecialchars($_POST['price']);
        } else {
            $error_msg['price'] = " Veuillez rentrer un prix valide";
        }
    } else {
        $error_msg['price'] = "Veuillez rentrer un prix";
    }
    //verif label 
    if(!empty($_POST['label'])){
        if(preg_match($text_regex, $_POST['label'])){
            $disc_label = htmlspecialchars($_POST['label']);
        }else{
            $error_msg['label'] = "Veuillez rentrer un label correct";
        }
    }else{
        $error_msg['label']= "Veuillez rentrer un label";
    }
    if(count($error_msg)==0){
        // upload de l'image :
        move_uploaded_file($_FILES['picture']['tmp_name'], $picture_path);
        // creation de l'objet disc.
        $dis = new Disc();
        $dis->setTitle($disc_title);
        $dis->setYear($disc_year);
        $dis->setGenre($disc_genre);
        $dis->setArtist($artist_id); 
        $dis->setPicture($picture_name);
        $dis->setPrice($disc_price);
        //Ajoute du disc dans la base de données 
        $dao = new DiscDAO($db);
        $dao->insert($dis);
        header("Location:../views/alldata.php");
    }
    }
