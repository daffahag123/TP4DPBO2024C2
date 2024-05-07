<?php

// Definisi kelas Youtuber
class Youtuber extends DB
{
    // Fungsi untuk mendapatkan daftar semua youtuber
    function getYoutuber()
    {
        // Query untuk mengambil semua data youtuber dari tabel youtuber
        $query = "SELECT * FROM youtuber";

        // Mengeksekusi query dan mengembalikan hasilnya
        return $this->execute($query);
    }

    // Fungsi untuk mendapatkan data youtuber berdasarkan ID
    function getYoutuberById($id)
    {
        // Query untuk mengambil data youtuber berdasarkan ID
        $query = "SELECT * FROM youtuber WHERE id_youtuber=$id";

        // Mengeksekusi query dan mengembalikan hasilnya
        return $this->execute($query);
    }

    // Fungsi untuk menambahkan data youtuber baru
    function add($data)
    {
        // Mengambil nama youtuber dari data yang diberikan
        $nama = $data['nama'];
        // Query untuk menambahkan data youtuber baru ke dalam tabel youtuber
        $query = "INSERT INTO youtuber VALUES ('', '$nama')";

        // Mengeksekusi query dan mengembalikan hasilnya
        return $this->execute($query);
    }

    // Fungsi untuk mengedit data youtuber berdasarkan ID
    function edit($id, $data)
    {
        // Mengambil nama youtuber dari data yang diberikan
        $nama = $data['nama'];
        // Query untuk mengedit data youtuber berdasarkan ID
        $query = "UPDATE youtuber SET nama_youtuber='$nama' WHERE id_youtuber=$id";

        // Mengeksekusi query dan mengembalikan hasilnya
        return $this->execute($query);
    }

    // Fungsi untuk menghapus data youtuber berdasarkan ID
    function delete($id)
    {
        // Query untuk menghapus data youtuber berdasarkan ID
        $query = "DELETE FROM youtuber WHERE id_youtuber = '$id'";
        
        // Mengeksekusi query dan mengembalikan hasilnya
        return $this->execute($query);
    }
}

?>
