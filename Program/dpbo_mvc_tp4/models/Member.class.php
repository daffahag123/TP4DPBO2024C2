<?php

// Definisi kelas Member
class Member extends DB
{
    // Fungsi untuk mendapatkan data member dengan join tabel channel_youtube
    function getMemberJoin()
    {
        // Query untuk mendapatkan data Member dengan join tabel channel YouTube
        $query = "SELECT member.id_member, member.nama_member, member.email, member.phone, member.join_date, channel_youtube.nama_channel_youtube
        FROM member 
        JOIN channel_youtube ON member.id_channel_youtube=channel_youtube.id_channel_youtube 
        ORDER BY member.id_member";

        // Menjalankan query dan mengembalikan hasilnya
        return $this->execute($query);
    }

    // Fungsi untuk mendapatkan semua data member
    function getMember()
    {
        // Query untuk mendapatkan semua data Member
        $query = "SELECT * FROM member";

        // Menjalankan query dan mengembalikan hasilnya
        return $this->execute($query);
    }

    // Fungsi untuk mendapatkan data member berdasarkan ID
    function getMemberById($id)
    {
         // Query untuk mendapatkan data member berdasarkan ID dengan melakukan join dengan tabel channel YouTube
        $query = "SELECT member.id_member, member.nama_member, member.email, member.phone, member.join_date, channel_youtube.id_channel_youtube, channel_youtube.nama_channel_youtube
        FROM member JOIN channel_youtube ON member.id_channel_youtube=channel_youtube.id_channel_youtube WHERE id_member=$id";
        
        // Menjalankan query dan mengembalikan hasilnya
        return $this->execute($query);
    }

    // Fungsi untuk menambahkan data member baru
    function add($data)
    {
        // Mendapatkan data yang akan ditambahkan
        $nama = $data['nama'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $id_channel_youtube = $data['channel_youtube'];

        // Query untuk menambahkan data member ke database
        $query = "INSERT INTO member VALUES ('', '$nama', '$email', '$phone', '$join_date', '$id_channel_youtube')";

        // Menjalankan query dan mengembalikan hasilnya
        return $this->execute($query);
    }

    // Fungsi untuk mengedit data member
    function edit($id, $data)
    {
        // Mendapatkan data yang akan diubah
        $nama = $data['nama'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $id_channel_youtube = $data['channel_youtube'];

        // Query untuk mengedit data member di database berdasarkan ID
        $query = "UPDATE member SET nama_member='$nama', email='$email', phone='$phone', join_date='$join_date', id_channel_youtube='$id_channel_youtube' WHERE id_member=$id";
        
        // Menjalankan query dan mengembalikan hasilnya
        return $this->execute($query);
    }

    // Fungsi untuk menghapus data member
    function delete($id)
    {
        // Query untuk menghapus data member dari database berdasarkan ID
        $query = "DELETE FROM member WHERE id_member = '$id'";

        // Menjalankan query dan mengembalikan hasilnya
        return $this->execute($query);
    }
}

?>
