<?php

class Posts extends Controller {

    public function __construct(){
        
    }

    public function index(){

    }

    public function about(){
        $data = [
            'title' => 'My New Home',
        ];
        $this->view('home',  $data);
    }
}