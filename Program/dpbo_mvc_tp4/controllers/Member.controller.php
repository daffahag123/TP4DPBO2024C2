<?php
include_once("conf.php");
include_once("models/Member.class.php");
include_once("models/ChannelYoutube.class.php");
include_once("views/Member.view.php");

class MemberController {
    private $member;
    private $channel_youtube;
  
    function __construct() {
      $this->member = new Member(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
      $this->channel_youtube = new ChannelYoutube(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    public function index() {
      $this->member->open();
      $this->member->getMemberJoin();
      $data = array();
      while($row = $this->member->getResult()) {
        array_push($data, $row);
      }
  
      $this->member->close();
  
      $view = new MemberView();
      $view->render($data);
    } 

    function addForm() {
      $this->channel_youtube->open();
      $this->channel_youtube->getChannelYoutube();
  
      $data = array();
      while($row = $this->channel_youtube->getResult()) {
        array_push($data, $row);
      }
  
      $this->channel_youtube->close();
  
      $view = new MemberView();
      $view->renderAddForm($data);
    }

    function editForm($id) {
      $this->member->open();
      $this->member->getMemberById($id);
      $this->channel_youtube->open();
      $this->channel_youtube->getChannelYoutube();
      
      $data = array(
        'member' => array(),
        'channel_youtube' => array()
      );
      
      while($row = $this->member->getResult()) {
        array_push($data['member'], $row);
      }
      
      while($row = $this->channel_youtube->getResult()) {
        array_push($data['channel_youtube'], $row);
      }
      
      $this->member->close();
      $this->channel_youtube->close();
  
      $view = new MemberView();
      $view->renderEditForm($data);
    }
    
    function add($data) {
      $this->member->open();
      $this->member->add($data);
      $this->member->close();
      
      header("location:member.php");
    }
  
    function edit($id, $data) {
      $this->member->open();
      $this->member->edit($id, $data);
      $this->member->close();
      
      header("location:member.php");
    }
  
    function delete($id) {
      $this->member->open();
      $this->member->delete($id);
      $this->member->close();
      
      header("location:member.php");
    }
  
  
  }