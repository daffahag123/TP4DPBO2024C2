<?php
// Memasukkan file konfigurasi dan kelas-kelas yang diperlukan
include_once("conf.php");
include_once("models/ChannelYoutube.class.php");
include_once("models/Youtuber.class.php");
include_once("views/ChannelYoutube.view.php");

// Mendefinisikan kelas Controller untuk entitas Channel Youtube
class ChannelYoutubeController {
  private $channel_youtube; // Objek untuk mengakses model ChannelYoutube
  private $youtuber;        // Objek untuk mengakses model Youtuber

  // Konstruktor untuk menginisialisasi objek ChannelYoutube dan Youtuber
  function __construct() {
    $this->channel_youtube = new ChannelYoutube(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->youtuber = new Youtuber(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  // Fungsi untuk menampilkan daftar channel YouTube
  public function index() {
    // Membuka koneksi ke database dan mendapatkan data channel YouTube
    $this->channel_youtube->open();
    $this->channel_youtube->getChannelYoutubeJoin();

    // Array untuk menyimpan data channel YouTube
    $data = array();
    while($row = $this->channel_youtube->getResult()) {
      array_push($data, $row);
    }
    // Menutup koneksi database
    $this->channel_youtube->close(); 

    // Memanggil view untuk menampilkan daftar channel YouTube
    $view = new ChannelYoutubeView();
    $view->render($data);
  }

  // Fungsi untuk menampilkan formulir penambahan data channel YouTube
  function addForm() {
    // Membuka koneksi ke database dan mendapatkan data youtuber untuk dropdown
    $this->youtuber->open();
    $this->youtuber->getYoutuber();

    // Array untuk menyimpan data youtuber
    $data = array(); 
    while($row = $this->youtuber->getResult()) {
      array_push($data, $row);
    }
    // Menutup koneksi database
    $this->youtuber->close(); 

    // Memanggil view untuk menampilkan formulir penambahan data channel YouTube
    $view = new ChannelYoutubeView();
    $view->renderAddForm($data);
  }

  // Fungsi untuk menampilkan formulir pengeditan data channel YouTube
  function editForm($id) {
    // Membuka koneksi ke database dan mendapatkan data channel YouTube dan youtuber untuk dropdown
    $this->channel_youtube->open();
    $this->channel_youtube->getChannelYoutubeById($id);
    $this->youtuber->open();
    $this->youtuber->getYoutuber();
    
    // Array untuk menyimpan data channel YouTube dan youtuber
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
    // Menutup koneksi database
    $this->channel_youtube->close(); 
    // Menutup koneksi database
    $this->youtuber->close(); 

    // Memanggil view untuk menampilkan formulir pengeditan data channel YouTube
    $view = new ChannelYoutubeView();
    $view->renderEditForm($data);
  }

  // Fungsi untuk menambahkan data channel YouTube ke database
  function add($data) {
    $this->channel_youtube->open();     // Membuka koneksi ke database
    $this->channel_youtube->add($data); // Menambahkan data channel YouTube
    $this->channel_youtube->close();    // Menutup koneksi database
    
    header("location:index.php");       // Mengalihkan ke halaman utama
  }

  // Fungsi untuk mengedit data channel YouTube di database
  function edit($id, $data) {
    $this->channel_youtube->open();           // Membuka koneksi ke database
    $this->channel_youtube->edit($id, $data); // Mengedit data channel YouTube
    $this->channel_youtube->close();          // Menutup koneksi database

    header("location:index.php");             // Mengalihkan ke halaman utama
  }

  // Fungsi untuk menghapus data channel YouTube dari database
  function delete($id) {
    $this->channel_youtube->open();       // Membuka koneksi ke database
    $this->channel_youtube->delete($id);  // Menghapus data channel YouTube
    $this->channel_youtube->close();      // Menutup koneksi database

    header("location:index.php");         // Mengalihkan ke halaman utama
  }

}
?>
