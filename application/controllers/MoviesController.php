<?php

use core\Service;

class MoviesController extends core\Controller
{
    private Service $service;
    function __construct()
    {
        parent::__construct();
        $this->service = new \services\MoviesService();
    }

    function index()
    {
        $this->view = "Available Methods:";
    }
    public function getMovies($page)
    {
        $this->service->getMovies($page);
    }
    public function getMovieDetails($id)
    {
        $this->service->getMovieDetails($id);
    }
    public function addNewMovie()
    {
        $model = 0; //NewMovieModel
        $this->service->addNewMovie($model);
    }

}