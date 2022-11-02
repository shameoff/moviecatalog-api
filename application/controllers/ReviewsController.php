<?php

class ReviewsController extends core\Controller {
    function index()
    {
        $this->view = 'INDEX PAGE';
        echo $this->view;
    }

    function add($id){
        $this->view = 'ADD REVIEW';
        echo $this->view;
    }
    function edit($id){
        $this->view = 'EDIT REVIEW';
        echo $this->view;
    }
    function delete($id){
        $this->view = "DELETE REVIEW $id";
        echo $this->view;
    }

}