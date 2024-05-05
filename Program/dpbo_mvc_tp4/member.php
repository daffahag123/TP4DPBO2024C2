<?php

include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Member.controller.php");

$member = new MemberController();

if(isset($_GET['action'])) {
    if($_GET['action'] == 'add') {
        $member->addForm();
    } elseif($_GET['action'] == 'edit') {
        $id = $_GET['id'];
        $member->editForm($id);
    } elseif($_GET['action'] == 'delete') {
        $id = $_GET['id'];
        $member->delete($id);
    }
} elseif(isset($_POST['submit'])) {
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $member->edit($id, $_POST);
    } else {
        $member->add($_POST);
    }
} else {
    $member->index();
}

