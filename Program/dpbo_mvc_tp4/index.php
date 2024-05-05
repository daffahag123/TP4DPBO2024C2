<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/ChannelYoutube.controller.php");

$channelYoutube = new ChannelYoutubeController();

if(isset($_GET['action'])) {
    if($_GET['action'] == 'add') {
        $channelYoutube->addForm();
    } elseif($_GET['action'] == 'edit') {
        $id = $_GET['id'];
        $channelYoutube->editForm($id);
    } elseif($_GET['action'] == 'delete') {
        $id = $_GET['id'];
        $channelYoutube->delete($id);
    }
} elseif(isset($_POST['submit'])) {
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $channelYoutube->edit($id, $_POST);
    } else {
        $channelYoutube->add($_POST);
    }
} else {
    $channelYoutube->index();
}

