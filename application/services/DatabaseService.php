<?php

class DatabaseService
{
    private $connection;

    public function __construct()
    {
        $hostname = getenv("DB_HOST");
        $port = getenv("DB_PORT");
        $username = getenv("MYSQL_USER");
        $password = getenv("MYSQL_PASSWORD");
        $database = getenv("MYSQL_DATABASE");
        $this->connection = mysqli_connect($hostname,$username,$password,$database,$port);
    }

    public function saveNewMovie(MovieModel $new_movie){

    }
    public function editMovie(MovieModel $movie){

    }
    public function deleteMovie(MovieModel $movie){

    }

    public function saveNewReview(ReviewModel $new_review){

    }
    public function editReview(ReviewModel $review){

    }
    public function deleteReview(ReviewModel $review){

    }

    public function createUser(UserModel $new_user){

    }
    public function editUserInfo(UserModel $user){

    }
    public function deleteUser(UserModel $user){

    }
}