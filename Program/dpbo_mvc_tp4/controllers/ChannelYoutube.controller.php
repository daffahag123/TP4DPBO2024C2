<?php
include_once("conf.php");
include_once("models/ChannelYoutube.class.php");
include_once("models/Youtuber.class.php");
include_once("views/ChannelYoutube.view.php");

class ChannelYoutubeController {
  private $channel_youtube;
  private $youtuber;

  function __construct() {
    $this->channel_youtube = new ChannelYoutube(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->youtuber = new Youtuber(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->channel_youtube->open();
    $this->channel_youtube->getChannelYoutubeJoin();
    
    $data = array();
    while($row = $this->channel_youtube->getResult()) {
      array_push($data, $row);
    }
    
    $this->channel_youtube->close();

    $view = new ChannelYoutubeView();
    $view->render($data);
  }

  function addForm() {
    $this->youtuber->open();
    $this->youtuber->getYoutuber();

    $data = array();
    while($row = $this->youtuber->getResult()) {
      array_push($data, $row);
    }

    $this->youtuber->close();

    $view = new ChannelYoutubeView();
    $view->renderAddForm($data);
  }

  function editForm($id) {
    $this->channel_youtube->open();
    $this->channel_youtube->getChannelYoutubeById($id);
    $this->youtuber->open();
    $this->youtuber->getYoutuber();
    
    $data = array(
      'channel_youtube' => array(),
      'youtuber' => array()
    );
    
    while($row = $this->channel_youtube->getResult()) {
      array_push($data['channel_youtube'], $row);
    }
    
    while($row = $this->youtuber->getResult()) {
      array_push($data['youtuber'], $row);
    }
    
    $this->channel_youtube->close();
    $this->youtuber->close();

    $view = new ChannelYoutubeView();
    $view->renderEditForm($data);
  }

  function add($data) {
    $this->channel_youtube->open();
    $this->channel_youtube->add($data);
    $this->channel_youtube->close();
    
    header("location:index.php");
  }

  function edit($id, $data) {
    $this->channel_youtube->open();
    $this->channel_youtube->edit($id, $data);
    $this->channel_youtube->close();
    header("location:index.php");
  }

  function delete($id) {
    $this->channel_youtube->open();
    $this->channel_youtube->delete($id);
    $this->channel_youtube->close();

    header("location:index.php");
  }

}