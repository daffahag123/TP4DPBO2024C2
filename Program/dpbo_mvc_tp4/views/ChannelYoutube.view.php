<?php

  class ChannelYoutubeView {
    public function render($data) {
      $hrefAddForm = "index.php?action=add";
      $mainTitle = "Channel YouTube";
      $dataTH = null;
      $dataTH .= "<tr>
      <th scope='col'>NO</th>
      <th scope='col'>NAMA CHANNEL</th>
      <th scope='col'>NAMA YOUTUBER</th>
      <th scope='col'>KATEGORI</th>
      <th scope='col'>SUBSCRIBER</th>
      <th scope='col'>AKSI</th>
      </tr>";

      $no = 1;
      $dataChannelYoutube = null;
      $dataYoutuber = null;
      foreach($data as $val) {
        list($id, $nama_channel_youtube, $nama_youtuber, $kategori, $subscriber) = $val;
        $dataChannelYoutube .= "<tr>
                <td>" . $no++ . "</td>
                <td>" . $nama_channel_youtube . "</td>
                <td>" . $nama_youtuber . "</td>
                <td>" . $kategori . "</td>
                <td>" . $subscriber . " jt</td>
                <td>
                  <a href='index.php?action=edit&id=" . $id .  "' class='btn btn-warning' '>Edit</a>
                  <a href='index.php?action=delete&id=" . $id . "' class='btn btn-danger' '>Hapus</a>
                </td>";
        $dataChannelYoutube .= "</tr>";
      }

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

      $tpl = new Template("templates/skintabel.html");

      $tpl->replace("HREF_ADD_FORM", $hrefAddForm);
      $tpl->replace("DATA_MAIN_TITLE", $mainTitle);
      $tpl->replace("DATA_TABEL_HEADER", $dataTH);
      $tpl->replace("DATA_TABEL", $dataChannelYoutube);
      $tpl->replace("DATA_ACTIVE1", $homeActive);
      $tpl->replace("DATA_ACTIVE2", $youtuberActive);
      $tpl->replace("DATA_ACTIVE3", $memberActive);
      $tpl->write(); 
    }

    public function renderAddForm($data) {
      $title = "Tambah";
      $mainTitle = "Channel Youtube";

      $dataYoutuber = null;
      foreach($data as $val) {
        list($id, $nama_youtuber) = $val;
        $dataYoutuber .= "<option value='".$id."'>".$nama_youtuber."</option>";
      }

      $dataForm = null;
      $dataForm .= "<form method='post' action='index.php'>
      <br><br>
      <div class='card'>
          <div class='card-header bg-primary'>
              <h1 class='text-white text-center'> TAMBAH CHANNEL YOUTUBE </h1>
          </div><br>

          <label> NAMA CHANNEL YOUTUBE: </label>
          <input type='text' name='nama' class='form-control' required> <br>

          <label> NAMA YOUTUBER: </label>
          <select name='youtuber' class='form-select' required> 
            <option selected disabled>Pilih Youtuber</option>
            ' . $dataYoutuber . '
          </select> <br>

          <label> KATEGORI: </label>
          <input type='text' name='kategori' class='form-control' required> <br>

          <label> SUBSCRIBER: </label>
          <input type='number' name='subscriber' class='form-control' step='0.01' required> <br>

          <button class='btn btn-success' type='submit' name='submit'> Submit </button><br>
          <a class='btn btn-info' type='submit' name='cancel' href='index.php'> Cancel </a><br>
      </div>
      </form>";

      $tpl = new Template("templates/skinform.html");

      $tpl->replace("DATA_TITLE", $title);
      $tpl->replace("DATA_MAIN_TITLE", $mainTitle);
      $tpl->replace("DATA_FORM", $dataForm);
      $tpl->write(); 
    }

    public function renderEditForm($data) {
      $title = "Ubah";
      $mainTitle = "Channel YouTube";

      $youtuberOptions = null;
      foreach($data['youtuber'] as $val) {
        list($id, $nama_youtuber) = $val;
        $youtuberOptions .= "<option value='".$id."'>".$nama_youtuber."</option>";
      }

      foreach($data['channel_youtube'] as $val) {
        list($id, $nama_channel_youtube, $id_youtuber, $nama_youtuber, $kategori, $subscriber) = $val;
        $dataForm = null;
        $dataForm .= "<form method='post' action='index.php?id=" . $id . "' enctype='multipart/form-data'>
        <br><br>
        <div class='card'>
            <div class='card-header bg-primary'>
                <h1 class='text-white text-center'> UBAH CHANNEL YOUTUBE </h1>
            </div><br>

            <label> NAMA CHANNEL YOUTUBE: </label>
            <input type='text' name='nama' class='form-control' value='" . $nama_channel_youtube . "' required> <br>

            <label> NAMA YOUTUBER: </label>
            <select name='youtuber' class='form-select' required>";
              // Tentukan opsi yang terpilih untuk youtuber
              if (isset($_POST['youtuber'])) {
                  $dataForm .= '<option selected value="' . $_POST['youtuber'] . '">' . $nama_youtuber . '</option>';
              } else {
                  $dataForm .= '<option selected value="' . $id_youtuber . '">' . $nama_youtuber . '</option>';
              }

              $dataForm .= $youtuberOptions . "
            </select> <br>

            <label> KATEGORI: </label>
            <input type='text' name='kategori' class='form-control' value='" . $kategori . "' required> <br>

            <label> SUBSCRIBER: </label>
            <input type='number' name='subscriber' class='form-control' step='0.01' value='" . $subscriber . "' required> <br>

            <button class='btn btn-success' type='submit' name='submit'> Submit </button><br>
            <a class='btn btn-info' type='submit' name='cancel' href='index.php'> Cancel </a><br>
        </div>
        </form>";
      }

      $tpl = new Template("templates/skinform.html");

      $tpl->replace("DATA_TITLE", $title);
      $tpl->replace("DATA_MAIN_TITLE", $mainTitle);
      $tpl->replace("DATA_FORM", $dataForm);
      $tpl->write(); 
    }
  }
?>