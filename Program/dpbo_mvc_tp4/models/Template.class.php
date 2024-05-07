<?php

// Definisi kelas Template
class Template
{
    var $filename = ''; // Properti untuk menyimpan nama file
    var $content = '';  // Properti untuk menyimpan isi konten template

    // Konstruktor untuk inisialisasi nama file dan membaca isi konten template
    function __construct($filename='')
    {
        $this->filename = $filename;

        // Membaca isi konten dari file template
        $this->content = implode('', @file($filename));
    }

    // Fungsi untuk menghapus placeholder dalam template
    function clear()
    {
        // Menghapus placeholder dengan pola regex DATA_[A-Z|_|0-9]+
        $this->content = preg_replace("/DATA_[A-Z|_|0-9]+/", "", $this->content);
    }

    // Fungsi untuk menampilkan isi konten template yang sudah dibersihkan
    function write()
    {
        $this->clear();
        print $this->content;
    }

    // Fungsi untuk mendapatkan isi konten template yang sudah dibersihkan
    function getContent()
    {
        $this->clear();
        return $this->content;
    }

    // Fungsi untuk mengganti nilai placeholder dalam template dengan nilai baru
    function replace($old = '', $new = '')
    {
        // Mengganti placeholder dengan nilai baru
        if (is_int($new)) {
            $value = sprintf("%d", $new);
        }
        elseif (is_float($new)) {
            $value = sprintf("%f", $new);
        }
        elseif (is_array($new)) {
            $value = '';

            // Menggabungkan nilai array menjadi string
            foreach ($new as $item) {
                $value .= $item. ' ';
            }
        }
        else {
            $value = $new;
        }
        $this->content = preg_replace("/$old/", $value, $this->content);
    }
}

?>
