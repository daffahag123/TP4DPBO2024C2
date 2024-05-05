<?php

class Youtuber extends DB
{
    function getYoutuber()
    {
        $query = "SELECT * FROM youtuber";
        return $this->execute($query);
    }

    function getYoutuberById($id)
    {
        $query = "SELECT * FROM youtuber WHERE id_youtuber=$id";
        return $this->execute($query);
    }

    function add($data)
    {
        $nama = $data['nama'];
        $query = "INSERT INTO youtuber VALUES ('', '$nama')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function edit($id, $data)
    {
        $nama = $data['nama'];
        $query = "UPDATE youtuber SET nama_youtuber='$nama' WHERE id_youtuber=$id";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM youtuber WHERE id_youtuber = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
