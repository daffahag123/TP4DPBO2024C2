<?php
  // Kelas untuk mengatur tampilan Youtuber
  class YoutuberView {
    // Fungsi untuk menampilkan halaman daftar Youtuber
    public function render($data) {
      // URL untuk menambahkan data Youtuber baru
      $hrefAddForm = "youtuber.php?action=add";
      // Judul utama halaman
      $mainTitle = "Youtuber";
      // Data header tabel
      $dataTH = null;
      $dataTH .= "<tr>
      <th scope='col'>NO</th>
      <th scope='col'>NAMA YOUTUBER</th>
      <th scope='col'>AKSI</th>
      </tr>";

      // Nomor untuk urutan
      $no = 1;
      // Data Youtuber
      $dataYoutuber = null;

      // Membuat baris tabel untuk setiap data Youtuber
      foreach($data as $val) {
        list($id, $nama) = $val;
        
        $dataYoutuber .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $nama . "</td>
                <td>
                <a href='youtuber.php?action=edit&id=" . $id .  "' class='btn btn-warning''>Edit</a>
                <a href='youtuber.php?action=delete&id=" . $id . "' class='btn btn-danger''>Hapus</a>
                </td>
                </tr>";
      }

      // Data aktif untuk setiap halaman
      $homeActive = ""; 
      $youtuberActive = "";
      $memberActive = "";

      // Periksa halaman yang sedang ditampilkan
      $currentPage = basename($_SERVER['PHP_SELF']);
      
      // Atur status aktif berdasarkan halaman yang sedang ditampilkan
      if ($currentPage == "index.php") {
          $homeActive = "active";
      } else if ($currentPage == "youtuber.php") {
          $youtuberActive = "active";
      } else {
          $memberActive = "active";
      }

      // Mengganti placeholder di dalam template HTML dengan data yang diperlukan
      $tpl = new Template("templates/skintabel.html");

      $tpl->replace("HREF_ADD_FORM", $hrefAddForm);
      $tpl->replace("DATA_MAIN_TITLE", $mainTitle);
      $tpl->replace("DATA_TABEL_HEADER", $dataTH);
      $tpl->replace("DATA_TABEL", $dataYoutuber);
      $tpl->replace("DATA_ACTIVE1", $homeActive);
      $tpl->replace("DATA_ACTIVE2", $youtuberActive);
      $tpl->replace("DATA_ACTIVE3", $memberActive);
      $tpl->write();
    }

    // Fungsi untuk menampilkan formulir penambahan Youtuber
    public function renderAddForm() {
      $title = "Tambah";
      $mainTitle = "Youtuber";
      
      // Formulir penambahan data Youtuber
      $dataForm = null;
      $dataForm .= "<form method='post' action='youtuber.php'>
      <br><br>
      <div class='card'>
          <div class='card-header bg-primary'>
              <h1 class='text-white text-center'> TAMBAH YOUTUBER </h1>
          </div><br>

          <label> NAMA YOUTUBER: </label>
          <input type='text' name='nama' class='form-control' required> <br>

          <button class='btn btn-success' type='submit' name='submit'> Submit </button><br>
          <a class='btn btn-info' type='submit' name='cancel' href='youtuber.php'> Cancel </a><br>
      </div>
      </form>";

      // Mengganti placeholder di dalam template HTML dengan data yang diperlukan
      $tpl = new Template("templates/skinform.html");

      $tpl->replace("DATA_TITLE", $title);
      $tpl->replace("DATA_MAIN_TITLE", $mainTitle);
      $tpl->replace("DATA_FORM", $dataForm);
      $tpl->write(); 
    }

    // Fungsi untuk menampilkan formulir pengeditan Youtuber
    public function renderEditForm($data) {
      $title = "Ubah";
      $mainTitle = "Youtuber";

      foreach($data as $val) {
        list($id, $nama_youtuber) = $val;
        // Formulir untuk pengeditan data Youtuber
        $dataForm = null;
        $dataForm .= "<form method='post' action='youtuber.php?id=" . $id . "' enctype='multipart/form-data'>
        <br><br>
        <div class='card'>
            <div class='card-header bg-primary'>
                <h1 class='text-white text-center'> UBAH YOUTUBER </h1>
            </div><br>

            <label> NAMA YOUTUBER: </label>
            <input type='text' name='nama' class='form-control' value='" . $nama_youtuber . "' required> <br>

            <button class='btn btn-success' type='submit' name='submit'> Submit </button><br>
            <a class='btn btn-info' type='submit' name='cancel' href='youtuber.php'> Cancel </a><br>
        </div>
        </form>";
      }

      // Mengganti placeholder di dalam template HTML dengan data yang diperlukan
      $tpl = new Template("templates/skinform.html");

      $tpl->replace("DATA_TITLE", $title);
      $tpl->replace("DATA_MAIN_TITLE", $mainTitle);
      $tpl->replace("DATA_FORM", $dataForm);
      $tpl->write(); 
    }
  }

?>
