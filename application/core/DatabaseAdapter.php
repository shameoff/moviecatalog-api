<?php

namespace core;

class DatabaseAdapter
{
    private $connection;

    public function __construct()
    {
        $hostname = getenv("DB_HOST");
        $port = getenv("DB_PORT");
        $username = getenv("MYSQL_USER");
        $password = getenv("MYSQL_PASSWORD");
        $database = getenv("MYSQL_DATABASE");
        $this->connection = mysqli_connect($hostname, $username, $password, $database, $port);
        if (!$this->connection) {
            throw new Exception("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
        }
        mysqli_set_charset($this->connection, "utf8");
    }

    public function query(string $sql_request)
    {
        $result = mysqli_query($this->connection, $sql_request);
        return $result;
    }
    public function getError(){ // returns an error message if query was failed
        return mysqli_error($this->connection);
    }
//    public function saveNewMovie(MovieModel $new_movie){
//
//    }
//    public function editMovie(MovieModel $movie){
//
//    }
//    public function deleteMovie(MovieModel $movie){
//
//    }
//
//    public function saveNewReview(ReviewModel $new_review){
//
//    }
//    public function editReview(ReviewModel $review){
//
//    }
//    public function deleteReview(ReviewModel $review){
//
//    }
//
//    public function createUser(UserModel $new_user){
//
//    }
//    public function editUserInfo(UserModel $user){
//
//    }
//    public function deleteUser(UserModel $user){

}