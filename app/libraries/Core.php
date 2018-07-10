<?php
  /*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/parameters
   */
  class Core {

    //properties and their defaults
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){
      // print_r($this->getUrl()); //prints array

      $url = $this->getUrl();

      //look in controllers for first value
      if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
        //if it exists, set it as controller
        $this->currentController = ucwords($url[0]);

        //unset 0 index
        unset($url[0]);
      }

      //require the controller
      require_once '../app/controllers/' . $this->currentController . '.php';

      //instantiate controller class
      $this->currentController = new $this->currentController;

      //check for second part of url (method)
      if(isset($url[1])){
        //check to see if the method exists in controller
        if(method_exists($this->currentController, $url[1])){
          $this->currentMethod = $url[1];

          //unset 1 index
          unset($url[1]);
        }
      }

      //get parameters
      $this->params = $url ? array_values($url) : []; //if url exists, use its values for params

      //call a callback with array of params
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);


    }

    public function getUrl(){
      if(isset($_GET['url'])){
        //strip the ending slash
        $url = rtrim($_GET['url'], '/');
        //sanitize it (removes illegal URL characters)
        $url = filter_var($url, FILTER_SANITIZE_URL);
        //break into an array by slash
        $url = explode('/', $url);

        return $url;

      }

    }



  }

?>