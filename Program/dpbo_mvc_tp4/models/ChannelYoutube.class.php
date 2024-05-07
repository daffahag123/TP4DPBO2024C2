<?php

// Definisi kelas ChannelYoutube yang merupakan turunan dari kelas DB
class ChannelYoutube extends DB
{
    // Fungsi untuk mendapatkan data channel YouTube dengan melakukan join dengan tabel Youtuber
    function getChannelYoutubeJoin()
    {
        // Query untuk mendapatkan data channel YouTube dengan join tabel Youtuber
        $query = "SELECT channel_youtube.id_channel_youtube, channel_youtube.nama_channel_youtube, youtuber.nama_youtuber, channel_youtube.kategori, channel_youtube.subscriber 
        FROM channel_youtube 
        JOIN youtuber ON channel_youtube.id_youtuber=youtuber.id_youtuber 
        ORDER BY channel_youtube.id_channel_youtube";
        
        // Menjalankan query dan mengembalikan hasilnya
        return $this->execute($query);
    }

    // Fungsi untuk mendapatkan semua data channel YouTube
    function getChannelYoutube()
    {
        // Query untuk mendapatkan semua data channel YouTube
        $query = "SELECT * FROM channel_youtube";

        // Menjalankan query dan mengembalikan hasilnya
        return $this->execute($query);
    }

    // Fungsi untuk mendapatkan data channel YouTube berdasarkan ID
    function getChannelYoutubeById($id)
    {
        // Query untuk mendapatkan data channel YouTube berdasarkan ID dengan melakukan join dengan tabel Youtuber
        $query = "SELECT channel_youtube.id_channel_youtube, channel_youtube.nama_channel_youtube, youtuber.id_youtuber , youtuber.nama_youtuber, channel_youtube.kategori, channel_youtube.subscriber  
        FROM channel_youtube 
        JOIN youtuber ON channel_youtube.id_youtuber=youtuber.id_youtuber 
        WHERE id_channel_youtube=$id";

        // Menjalankan query dan mengembalikan hasilnya
        return $this->execute($query);
    }

    // Fungsi untuk menambahkan data channel YouTube ke database
    function add($data)
    {
        // Mendapatkan data yang akan ditambahkan
        $nama = $data['nama'];
        $id_youtuber = $data['youtuber'];
        $kategori = $data['kategori'];
        $subscriber = $data['subscriber'];

        // Query untuk menambahkan data channel YouTube ke database
        $query = "INSERT INTO channel_youtube VALUES ('', '$nama', '$id_youtuber', '$kategori', '$subscriber')";

        // Mengeksekusi query dan mengembalikan hasilnya
        return $this->execute($query);
    }

    // Fungsi untuk mengedit data channel YouTube di database berdasarkan ID
    function edit($id, $data)
    {
        // Mendapatkan data yang akan diubah
        $nama = $data['nama'];
        $id_youtuber = $data['youtuber'];
        $kategori = $data['kategori'];
        $subscriber = $data['subscriber'];

        // Query untuk mengedit data channel YouTube di database berdasarkan ID
        $query = "UPDATE channel_youtube SET nama_channel_youtube='$nama', id_youtuber='$id_youtuber', kategori='$kategori', subscriber='$subscriber' WHERE id_channel_youtube=$id";
        
        // Mengeksekusi query dan mengembalikan hasilnya
        return $this->execute($query);
    }

    // Fungsi untuk menghapus data channel YouTube dari database berdasarkan ID
    function delete($id)
    {
        // Query untuk menghapus data channel YouTube dari database berdasarkan ID
        $query = "DELETE FROM channel_youtube WHERE id_channel_youtube = '$id'";

        // Mengeksekusi query dan mengembalikan hasilnya
        return $this->execute($query);
    }
}
?>
