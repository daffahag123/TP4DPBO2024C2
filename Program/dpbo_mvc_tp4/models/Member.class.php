<?php

class Member extends DB
{
    function getMemberJoin()
    {
        $query = "SELECT member.id_member, member.nama_member, member.email, member.phone, member.join_date, channel_youtube.nama_channel_youtube
        FROM member 
        JOIN channel_youtube ON member.id_channel_youtube=channel_youtube.id_channel_youtube 
        ORDER BY member.id_member";
        return $this->execute($query);
    }

    function getMember()
    {
        $query = "SELECT * FROM member";
        return $this->execute($query);
    }

    function getMemberById($id)
    {
        $query = "SELECT member.id_member, member.nama_member, member.email, member.phone, member.join_date, channel_youtube.id_channel_youtube, channel_youtube.nama_channel_youtube
        FROM member JOIN channel_youtube ON member.id_channel_youtube=channel_youtube.id_channel_youtube WHERE id_member=$id";
        return $this->execute($query);
    }

    function add($data)
    {
        $nama = $data['nama'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $id_channel_youtube = $data['channel_youtube'];

        $query = "INSERT INTO member VALUES ('', '$nama', '$email', '$phone', '$join_date', '$id_channel_youtube')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function edit($id, $data)
    {
        $nama = $data['nama'];
        $email = $data['email'];
        $phone = $data['phone'];
        $join_date = $data['join_date'];
        $id_channel_youtube = $data['channel_youtube'];

        $query = "UPDATE member SET nama_member='$nama', email='$email', phone='$phone', join_date='$join_date', id_channel_youtube='$id_channel_youtube' WHERE id_member=$id";
        
        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        $query = "DELETE FROM member WHERE id_member = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
}
