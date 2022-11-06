<?php

namespace models;

class MoviesPageModel
{
    private array $movies;
    private array $pageInfo;

    public function __construct($movies, $pageInfo)
    {
        $this->movies = $movies;
        $this->pageInfo = $pageInfo;
    }
    public function getPageInfo(): array
    {
        return $this->pageInfo;
    }
    public function getMovies(): array
    {
        return $this->movies;
    }
}