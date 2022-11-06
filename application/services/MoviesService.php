<?php

namespace services;

use models\MoviesPageModel;

class MoviesService extends \core\Service
{

    public function getMovies($page, $pageSize) : MoviesPageModel
    {
        $pageCount = 9999;
        $pageInfo = ["pageSize" => $pageSize, "pageCount" => $pageCount, "currentPage" => $page];
        $startIndex = ($page-1) * $pageSize;
        $endIndex = $startIndex + $pageSize;
        $query = "SELECT * FROM Movie WHERE id BETWEEN ${startIndex} AND $endIndex";
        $movies = $this->dbAdapter->query($query);
        $model = new MoviesPageModel($movies, $pageInfo);
        return $model;
    }
    public function getMovieDetails($id)
    {

    }
    public function addNewMovie($model){

    }
}