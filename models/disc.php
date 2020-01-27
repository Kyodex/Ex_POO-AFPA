<?php

class Disc {
// Attribut de notre objet 
    private $title;
    private $year;
    private $genre;
    private $artist_id;
    private $picture_name;
    private $price;
    private $label;
// fonction get Pour recuperer la données voulu 
    public function getTitle() {
        return $this->title;
    }
// set pour attribuer une valeur à un des attribut;
    public function setTitle($title) {
        $this->title = $title;
    }

    // accesseurs (get/set) pour les propriétés year, genre
    public function getYear() {
        return $this->year;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function getGenre() {
        return $this->genre;
    }

    public function setGenre($genre) {
        $this->genre = $genre;
    }

    public function getArtist() {
        return $this->artist_id;
    }

    public function setArtist($artist_id) {
        $this->artist_id = $artist_id;
    }

    public function getPicture() {
        return $this->picture;
    }

    public function setPicture($picture_name) {
        $this->picture = $picture_name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }
    
    public function getLabel() {
        return $this->label;
    }

    public function setLabel($label) {
        $this->label = $label;
    }
}

;
