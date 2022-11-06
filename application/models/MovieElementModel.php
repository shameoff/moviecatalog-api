<?php

namespace models;

class MovieElementModel{
    private int $id;
    private string $name;
    private string $poster;
    private int $year;
    private string$country;
    private array $genres;
    private array $reviews;

    public function __construct($id, $name, $poster, $year, $country, $genres, $reviews){
        $this->id = $id;
        $this->name = $name;
        $this->poster = $poster;
        $this->year = $year;
        $this->country = $country;
        $this->genres = $genres;
        $this->reviews = $reviews;
    }

    public function getId(){
        return $this->id;
}
    public function getName(){
        return $this->name;
}
    public function getPoster(){
        return $this->poster;
}
    public function getYear(){
        return $this->year;
}
    public function getCountry(){
        return $this->country;
}
    public function getGenres(){
        return $this->genres;
}
    public function getReviews(){
        return $this->reviews;
}

}