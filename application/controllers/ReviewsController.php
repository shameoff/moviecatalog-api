<?php

class ReviewsController extends core\Controller {
    function index()
    {
        echo "Available Methods:";
    }

    function add($id){
        echo 'ADD REVIEW';
    }
    function edit($id){
        echo 'EDIT REVIEW';
    }
    function delete($id){

        echo "DELETE REVIEW $id";
    }

}