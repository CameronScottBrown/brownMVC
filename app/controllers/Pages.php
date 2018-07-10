<?php
  class Pages extends Controller {
    public function __construct(){

    }

    public function index(){
      //shows default index page
      $data = [
        'title' => 'Welcome to the BrownMVC',
      ];

      $this->view('pages/index', $data);
    }

    public function about(){
      //shows about page
      $data = [
        'title' => 'About'
      ];

      $this->view('pages/about', $data);
    }
  }

?>