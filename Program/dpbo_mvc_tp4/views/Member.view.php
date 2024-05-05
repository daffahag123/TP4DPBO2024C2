<?php
  class MemberView {
    public function render($data) {
      $hrefAddForm = "member.php?action=add";
      $mainTitle = "Member";
      $dataTH = null;
      $dataTH .= "<tr>
      <th scope='col'>NO</th>
      <th scope='col'>NAMA MEMBER</th>
      <th scope='col'>EMAIL</th>
      <th scope='col'>NO TELEPHONE</th>
      <th scope='col'>JOIN DATE</th>
      <th scope='col'>MEMBERSHIP CHANNEL YT</th>
      <th scope='col'>AKSI</th> 
      </tr>";

      $no = 1;
      $dataYoutuber = null;
      foreach($data as $val) {
        list($id, $nama, $email, $phone, $join_date, $nama_channel) = $val;
        
            $dataYoutuber .= "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $nama . "</td>
                    <td>" . $email . "</td>
                    <td>" . $phone . "</td>
                    <td>" . $join_date . "</td>
                    <td>" . $nama_channel . "</td>
                    <td>
                    <a href='member.php?action=edit&id=" . $id .  "' class='btn btn-warning''>Edit</a>
                    <a href='member.php?action=delete&id=" . $id . "' class='btn btn-danger''>Hapus</a>
                    </td>
                    </tr>";
        
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
      $tpl->replace("DATA_TABEL", $dataYoutuber);
      $tpl->replace("DATA_ACTIVE1", $homeActive);
      $tpl->replace("DATA_ACTIVE2", $youtuberActive);
      $tpl->replace("DATA_ACTIVE3", $memberActive);
      $tpl->write();
    }

    public function renderAddForm($data) {
      $title = "Tambah";
      $mainTitle = "Member";

      $dataChannelYoutube = null;
      foreach($data as $val) {
        list($id, $nama_channel_youtube) = $val;
        $dataChannelYoutube .= "<option value='".$id."'>".$nama_channel_youtube."</option>";
      }

      $dataForm = null;
      $dataForm .= "<form method='post' action='member.php'>
      <br><br>
      <div class='card'>
          <div class='card-header bg-primary'>
              <h1 class='text-white text-center'> TAMBAH MEMBER </h1>
          </div><br>

          <label> NAMA MEMBER: </label>
          <input type='text' name='nama' class='form-control' required> <br>

          <label> EMAIL: </label>
          <input type='text' name='email' class='form-control' required> <br>

          <label> NO TELEPHONE: </label>
          <input type='number' name='phone' class='form-control' required> <br>

          <label> JOIN DATE: </label>
          <input type='date' name='join_date' class='form-control' required> <br>

          <label> MEMBERSHIP CHANNEL YT: </label>
          <select name='channel_youtube' class='form-select' required> 
            <option selected disabled>Pilih Channel Youtube</option>
            ' . $dataChannelYoutube . '
          </select> <br>

          <button class='btn btn-success' type='submit' name='submit'> Submit </button><br>
          <a class='btn btn-info' type='submit' name='cancel' href='member.php'> Cancel </a><br>
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
      $mainTitle = "Member";

      $channelYoutubeOptions = null;
      foreach($data['channel_youtube'] as $val) {
        list($id, $nama_channel_youtube) = $val;
        $channelYoutubeOptions .= "<option value='".$id."'>".$nama_channel_youtube."</option>";
      }

      foreach($data['member'] as $val) {
        list($id, $nama_member, $email, $phone, $join_date, $id_channel_youtube, $nama_channel_youtube) = $val;
        $dataForm = null;
        $dataForm .= "<form method='post' action='member.php?id=" . $id . "' enctype='multipart/form-data'>
        <br><br>
        <div class='card'>
            <div class='card-header bg-primary'>
                <h1 class='text-white text-center'> UBAH MEMBER </h1>
            </div><br>

            <label> NAMA MEMBER: </label>
            <input type='text' name='nama' class='form-control' value='" . $nama_member . "' required> <br>

            <label> EMAIL: </label>
            <input type='text' name='email' class='form-control' value='" . $email . "' required> <br>

            <label> NO TELEPHONE: </label>
            <input type='number' name='phone' class='form-control' value='" . $phone . "' required> <br>

            <label> JOIN DATE: </label>
            <input type='date' name='join_date' class='form-control' value='" . $join_date . "' required> <br>

            <label> MEMBERSHIP CHANNEL YT: </label>
            <select name='channel_youtube' class='form-select' required>";
              // Tentukan opsi yang terpilih untuk Channel Youtube
              if (isset($_POST['channel_youtube'])) {
                  $dataForm .= '<option selected value="' . $_POST['channel_youtube'] . '">' . $nama_channel_youtube . '</option>';
              } else {
                  $dataForm .= '<option selected value="' . $id_channel_youtube . '">' . $nama_channel_youtube . '</option>';
              }

              $dataForm .= $channelYoutubeOptions . "
            </select> <br>

            <button class='btn btn-success' type='submit' name='submit'> Submit </button><br>
            <a class='btn btn-info' type='submit' name='cancel' href='member.php'> Cancel </a><br>
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