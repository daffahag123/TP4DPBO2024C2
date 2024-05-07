<?php
// Memasukkan file konfigurasi dan kelas-kelas yang diperlukan
include_once("conf.php");
include_once("models/Youtuber.class.php");
include_once("views/Youtuber.view.php");

// Mendefinisikan kelas Controller untuk entitas Youtuber
class YoutuberController {
    // Objek untuk mengakses model Youtuber
    private $youtuber; 
  
    // Konstruktor untuk menginisialisasi objek Youtuber
    function __construct() {
      $this->youtuber = new Youtuber(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    // Fungsi untuk menampilkan daftar Youtuber
    public function index() {
      // Membuka koneksi ke database dan mendapatkan data Youtuber
      $this->youtuber->open();
      $this->youtuber->getYoutuber();
      // Array untuk menyimpan data Youtuber
      $data = array(); 
      while($row = $this->youtuber->getResult()) {
        array_push($data, $row);
      }
      // Menutup koneksi database
      $this->youtuber->close();
  
      // Memanggil view untuk menampilkan daftar Youtuber
      $view = new YoutuberView();
      $view->render($data);
    } 

    // Fungsi untuk menampilkan formulir penambahan data Youtuber
    function addForm() {
      // Memanggil view untuk menampilkan formulir penambahan data Youtuber
      $view = new YoutuberView();
      $view->renderAddForm();
    }

    // Fungsi untuk menampilkan formulir pengeditan data Youtuber
    function editForm($id) {
      // Membuka koneksi ke database dan mendapatkan data Youtuber berdasarkan ID
      $this->youtuber->open();
      $this->youtuber->getYoutuberById($id);
      
      // Array untuk menyimpan data Youtuber
      $data = array(); 
      while($row = $this->youtuber->getResult()) {
        array_push($data, $row);
      }
      // Menutup koneksi database
      $this->youtuber->close(); 
  
      // Memanggil view untuk menampilkan formulir pengeditan data Youtuber
      $view = new YoutuberView();
      $view->renderEditForm($data);
    }
    
    // Fungsi untuk menambahkan data Youtuber ke database
    function add($data) {
      $this->youtuber->open();      // Membuka koneksi ke database
      $this->youtuber->add($data);  // Menambahkan data Youtuber
      $this->youtuber->close();     // Menutup koneksi database
      
      header("location:youtuber.php"); // Mengalihkan ke halaman Youtuber
    }
  
    // Fungsi untuk mengedit data Youtuber di database
    function edit($id, $data) {
      $this->youtuber->open();            // Membuka koneksi ke database
      $this->youtuber->edit($id, $data);  // Mengedit data Youtuber
      $this->youtuber->close();           // Menutup koneksi database
      
      header("location:youtuber.php");    // Mengalihkan ke halaman Youtuber
    }
  
    // Fungsi untuk menghapus data Youtuber dari database
    function delete($id) {
      $this->youtuber->open();      // Membuka koneksi ke database
      $this->youtuber->delete($id); // Menghapus data Youtuber
      $this->youtuber->close();     // Menutup koneksi database
      
      header("location:youtuber.php"); // Mengalihkan ke halaman Youtuber
    }
}
?>
