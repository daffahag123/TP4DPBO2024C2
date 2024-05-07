<?php

// Termasuk kelas yang diperlukan
include_once("models/Template.class.php");
include_once("models/DB.class.php");
include_once("controllers/Member.controller.php");

// Membuat instance dari MemberController
$member = new MemberController();

// Menangani permintaan berdasarkan parameter yang diterima
if(isset($_GET['action'])) {
    // Jika permintaan adalah untuk menambahkan data baru
    if($_GET['action'] == 'add') {
        $member->addForm(); // Menampilkan formulir penambahan
    } 
    // Jika permintaan adalah untuk mengedit data
    elseif($_GET['action'] == 'edit') {
        $id = $_GET['id'];
        $member->editForm($id); // Menampilkan formulir edit
    } 
    // Jika permintaan adalah untuk menghapus data
    elseif($_GET['action'] == 'delete') {
        $id = $_GET['id'];
        $member->delete($id); // Menghapus data
    }
} 
// Jika ada permintaan POST
elseif(isset($_POST['submit'])) {
    // Jika terdapat ID yang ditentukan, maka proses edit data
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $member->edit($id, $_POST); // Menyunting data
    } 
    // Jika tidak ada ID, maka proses penambahan data baru
    else {
        $member->add($_POST); // Menambahkan data baru
    }
} 
// Jika tidak ada parameter action yang diberikan
else {
    $member->index(); // Menampilkan halaman utama
}

?>
