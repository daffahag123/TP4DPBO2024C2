<?php

class ChannelYoutube extends DB
{
    function getChannelYoutubeJoin()
    {
        $query = "SELECT channel_youtube.id_channel_youtube, channel_youtube.nama_channel_youtube, youtuber.nama_youtuber, channel_youtube.kategori, channel_youtube.subscriber 
        FROM channel_youtube 
        JOIN youtuber ON channel_youtube.id_youtuber=youtuber.id_youtuber 
        ORDER BY channel_youtube.id_channel_youtube";
        return $this->execute($query);
    }

    function getChannelYoutube()
    {
        $query = "SELECT * FROM channel_youtube";
        return $this->execute($query);
    }

    function getChannelYoutubeById($id)
    {
        $query = "SELECT channel_youtube.id_channel_youtube, channel_youtube.nama_channel_youtube, youtuber.id_youtuber , youtuber.nama_youtuber, channel_youtube.kategori, channel_youtube.subscriber  
        FROM channel_youtube 
        JOIN youtuber ON channel_youtube.id_youtuber=youtuber.id_youtuber 
        WHERE id_channel_youtube=$id";
        return $this->execute($query);
    }

    function add($data)
    {
        $nama = $data['nama'];
        $id_youtuber = $data['youtuber'];
        $kategori = $data['kategori'];
        $subscriber = $data['subscriber'];

        $query = "INSERT INTO channel_youtube VALUES ('', '$nama', '$id_youtuber', '$kategori', '$subscriber')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function edit($id, $data)
    {
        $nama = $data['nama'];
        $id_youtuber = $data['youtuber'];
        $kategori = $data['kategori'];
        $subscriber = $data['subscriber'];

        $query = "UPDATE channel_youtube SET nama_channel_youtube='$nama', id_youtuber='$id_youtuber', kategori='$kategori', subscriber='$subscriber' WHERE id_channel_youtube=$id";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM channel_youtube WHERE id_channel_youtube = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
