<?php
include_once("conf.php");
include_once("models/Youtuber.class.php");
include_once("views/Youtuber.view.php");

class YoutuberController {
    private $youtuber;
  
    function __construct() {
      $this->youtuber = new Youtuber(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index() {
      $this->youtuber->open();
      $this->youtuber->getYoutuber();
      $data = array();
      while($row = $this->youtuber->getResult()) {
        array_push($data, $row);
      }
  
      $this->youtuber->close();
  
      $view = new YoutuberView();
      $view->render($data);
    } 

    function addForm() {
      $view = new YoutuberView();
      $view->renderAddForm();
    }

    function editForm($id) {
      $this->youtuber->open();
      $this->youtuber->getYoutuberById($id);
      
      $data = array();
      while($row = $this->youtuber->getResult()) {
        array_push($data, $row);
      }
 
      $this->youtuber->close();
  
      $view = new YoutuberView();
      $view->renderEditForm($data);
    }
    
    function add($data) {
      $this->youtuber->open();
      $this->youtuber->add($data);
      $this->youtuber->close();
      
      header("location:youtuber.php");
    }
  
    function edit($id, $data) {
      $this->youtuber->open();
      $this->youtuber->edit($id, $data);
      $this->youtuber->close();
      
      header("location:youtuber.php");
    }
  
    function delete($id) {
      $this->youtuber->open();
      $this->youtuber->delete($id);
      $this->youtuber->close();
      
      header("location:youtuber.php");
    }
  
  
  }