<?php

/************************************************
 * Application Main or Core Class
 * Create URL and load necessary files
 */

 class Core {
     
    //Base Properties for default controlles, methods and prams
     protected $currentController   = "Pages";
     protected $currentMethod       = "index";
     protected $params              = [];

    /************************************************
     * __Construct Method for Core
     * Call Get URL to get Prams Array
     * Load Controller and Methods
     * Instantiate the controllers
     * 
     ***********************************************/
     // 
    public function __construct(){
        
      // print_r($this->getUrl());
       $url = $this->getUrl(); 

        if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }

       require_once '../app/controllers/' .$this->currentController . '.php';        
       $this->currentController = new $this->currentController;

       //Check Method

       if(isset($url[1])){
           if(method_exists($this->currentController, $url[1])){
               $this->currentMethod = $url[1];
           }
        
           unset($url[1]);   
       }

       $this->params = $url ? array_values($url) : [];

       call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    } 
    
    /**************************************************
     * Get Prams from URL
     * Explode and Sanitize
     * Return as Array
     * 
     *************************************************/
    public function getUrl(){

        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }
     }
 }

