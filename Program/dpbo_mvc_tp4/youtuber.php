<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Youtuber.controller.php");

$youtuber = new YoutuberController();

if(isset($_GET['action'])) {
    if($_GET['action'] == 'add') {
        $youtuber->addForm();
    } elseif($_GET['action'] == 'edit') {
        $id = $_GET['id'];
        $youtuber->editForm($id);
    } elseif($_GET['action'] == 'delete') {
        $id = $_GET['id'];
        $youtuber->delete($id);
    }
} elseif(isset($_POST['submit'])) {
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $youtuber->edit($id, $_POST);
    } else {
        $youtuber->add($_POST);
    }
} else {
    $youtuber->index();
}

