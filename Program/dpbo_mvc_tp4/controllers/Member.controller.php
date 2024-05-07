<?php
// Memasukkan file konfigurasi dan kelas-kelas yang diperlukan
include_once("conf.php");
include_once("models/Member.class.php");
include_once("models/ChannelYoutube.class.php");
include_once("views/Member.view.php");

// Mendefinisikan kelas Controller untuk entitas Member
class MemberController {
    private $member;          // Objek untuk mengakses model Member
    private $channel_youtube; // Objek untuk mengakses model ChannelYoutube
  
    // Konstruktor untuk menginisialisasi objek Member dan ChannelYoutube
    function __construct() {
      $this->member = new Member(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
      $this->channel_youtube = new ChannelYoutube(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    }

    // Fungsi untuk menampilkan daftar member
    public function index() {
      // Membuka koneksi ke database dan mendapatkan data member
      $this->member->open();
      $this->member->getMemberJoin();

      // Array untuk menyimpan data member
      $data = array(); 
      while($row = $this->member->getResult()) {
        array_push($data, $row);
      }
    // Menutup koneksi database
      $this->member->close(); 

      // Memanggil view untuk menampilkan daftar member
      $view = new MemberView();
      $view->render($data);
    } 

    // Fungsi untuk menampilkan formulir penambahan data member
    function addForm() {
      // Membuka koneksi ke database dan mendapatkan data channel youtube untuk dropdown
      $this->channel_youtube->open();
      $this->channel_youtube->getChannelYoutube();
  
      // Array untuk menyimpan data channel youtube
      $data = array(); 
      while($row = $this->channel_youtube->getResult()) {
        array_push($data, $row);
      }
      // Menutup koneksi database
      $this->channel_youtube->close(); 
  
      // Memanggil view untuk menampilkan formulir penambahan data member
      $view = new MemberView();
      $view->renderAddForm($data);
    }

    // Fungsi untuk menampilkan formulir pengeditan data member
    function editForm($id) {
      // Membuka koneksi ke database dan mendapatkan data member dan channel youtube untuk dropdown
      $this->member->open();
      $this->member->getMemberById($id);
      $this->channel_youtube->open();
      $this->channel_youtube->getChannelYoutube();
      
      // Array untuk menyimpan data member dan channel youtube
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
      // Menutup koneksi database
      $this->member->close(); 
      // Menutup koneksi database
      $this->channel_youtube->close(); 
  
      // Memanggil view untuk menampilkan formulir pengeditan data member
      $view = new MemberView();
      $view->renderEditForm($data);
    }
    
    // Fungsi untuk menambahkan data member ke database
    function add($data) {
      $this->member->open();      // Membuka koneksi ke database
      $this->member->add($data);  // Menambahkan data member
      $this->member->close();     // Menutup koneksi database
      
      header("location:member.php"); // Mengalihkan ke halaman member
    }
  
    // Fungsi untuk mengedit data member di database
    function edit($id, $data) {
      $this->member->open();            // Membuka koneksi ke database
      $this->member->edit($id, $data);  // Mengedit data member
      $this->member->close();           // Menutup koneksi database
      
      header("location:member.php");    // Mengalihkan ke halaman member
    }
  
    // Fungsi untuk menghapus data member dari database
    function delete($id) {
      $this->member->open();      // Membuka koneksi ke database
      $this->member->delete($id); // Menghapus data member
      $this->member->close();     // Menutup koneksi database
      
      header("location:member.php"); // Mengalihkan ke halaman member
    }
}
?>
