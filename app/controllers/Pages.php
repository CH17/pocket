<?php

class Pages {

    public function __construct(){
        echo "Page Loaded.....";
    }

    public function index(){
        
    }

    public function about($id){
        echo "About Method....." . $id;
    }
}