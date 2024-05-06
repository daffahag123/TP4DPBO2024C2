# TP4DPBO2024C2

Saya Daffa Fakhry Anshori dengan NIM 2200337 mengerjakan soal TP 4 dalam Praktikum mata kuliah Desain dan Pemrograman Berbasis Objek, untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamin.

# Desain Database
![desain_db](https://github.com/daffahag123/TP4DPBO2024C2/assets/135239333/c606295b-9850-48c5-8397-9019de91aa60)

# Desain Program
Pertama untuk membuat program saya mempersiapkan dengan membuat 3 tabel yang akan digunakan nanti yaitu tabel Channel Youtube, tabel Youtuber, dan tabel Member. Berikut beberapa penjelasannya:


Program ini dirancang dengan menggunakan bahasa pemrograman PHP dan menerapkan pola MVC (Model, View, Controller). Program ini bertemakan Membership YouTube dan bertujuan untuk mengelola data Channel YouTube, data Youtuber, dan data Member. Fokus utama program ini adalah untuk memudahkan pengguna dalam menambah, mengedit, dan menghapus data Channel YouTube, data Youtuber, dan data Member. Berikut komponen-komponen utama dalam program ini:
1. Model:
- ChannelYoutube.class.php: Kelas ini berfungsi untuk mengelola data channel YouTube. Itu memiliki fungsi-fungsi untuk mendapatkan data channel YouTube, menambahkan data channel baru, mengedit data channel yang sudah ada, dan menghapus data channel.
- Youtuber.class.php: Kelas ini berfokus pada manajemen data Youtuber. Mirip dengan ChannelYoutube, ini memiliki fungsi-fungsi untuk mendapatkan, menambahkan, mengedit, dan menghapus data Youtuber.
- Member.class.php: Kelas ini bertanggung jawab untuk mengelola data Member. Seperti kelas lainnya, ini memiliki fungsi-fungsi untuk mendapatkan, menambahkan, mengedit, dan menghapus data Member.
- DB.class.php: Kelas yang bertanggung jawab untuk mengatur koneksi database dan eksekusi query. Ini memiliki fungsi-fungsi seperti open untuk membuka koneksi, execute untuk mengeksekusi query, getResult untuk mendapatkan hasil dari query, dan close untuk menutup koneksi.
- Template.class.php: Kelas ini tampaknya berhubungan dengan manipulasi template. Ini memiliki fungsi-fungsi untuk membaca, menghapus, menulis, mengganti konten dalam template.
  
2. View:
- ChannelYoutube.view.php: Kelas ini bertanggung jawab untuk menampilkan tampilan terkait dengan channel YouTube. Ini memiliki tiga metode utama:
  - render: Metode ini digunakan untuk menampilkan daftar channel YouTube beserta tombol-tombol aksi seperti edit dan hapus.
  - renderAddForm: Metode ini menampilkan formulir untuk menambahkan channel YouTube baru.
  - renderEditForm: Metode ini menampilkan formulir untuk mengedit channel YouTube yang sudah ada.
- Youtuber.view.php: Kelas ini bertanggung jawab untuk menampilkan tampilan yang berkaitan dengan youtuber. Mirip dengan ChannelYoutubeView, ini memiliki tiga metode utama:
  - render: Menampilkan daftar youtuber beserta tombol-tombol aksi.
  - renderAddForm: Menampilkan formulir untuk menambahkan youtuber baru.
  - renderEditForm: Menampilkan formulir untuk mengedit informasi youtuber yang sudah ada. 
- Member.view.php: Kelas ini bertanggung jawab untuk menampilkan tampilan terkait dengan member. Seperti kelas lainnya, ini memiliki tiga metode utama:
  - render: Menampilkan daftar member beserta tombol-tombol aksi.
  - renderAddForm: Menampilkan formulir untuk menambahkan member baru.
  - renderEditForm: Menampilkan formulir untuk mengedit informasi member yang sudah ada.

3. Controller:
- ChannelYoutube.controller.php: Kelas ini mengatur logika terkait dengan channel YouTube. Ini memiliki beberapa metode:
  - index: Metode ini menampilkan daftar channel YouTube.
  - addForm: Menampilkan formulir untuk menambahkan channel YouTube baru.
  - editForm: Menampilkan formulir untuk mengedit channel YouTube yang sudah ada.
  - add: Menangani penambahan channel YouTube baru ke dalam database.
  - edit: Menangani pengeditan informasi channel YouTube yang sudah ada di dalam database.
  - delete: Menghapus channel YouTube dari database.
- Youtuber.controller.php: Kelas ini mengelola logika terkait dengan youtuber. Mirip dengan ChannelYoutubeController, ini memiliki beberapa metode:
  - index: Menampilkan daftar youtuber.
  - addForm: Menampilkan formulir untuk menambahkan youtuber baru.
  - editForm: Menampilkan formulir untuk mengedit informasi youtuber yang sudah ada.
  - add: Menangani penambahan youtuber baru ke dalam database.
  - edit: Menangani pengeditan informasi youtuber yang sudah ada di dalam database.
  - delete: Menghapus youtuber dari database.
- Member.controller.php: Kelas ini mengelola logika terkait dengan member. Seperti kelas lainnya, ini memiliki beberapa metode:
  - index: Menampilkan daftar member.
  - addForm: Menampilkan formulir untuk menambahkan member baru.
  - editForm: Menampilkan formulir untuk mengedit informasi member yang sudah ada.
  - add: Menangani penambahan member baru ke dalam database.
  - edit: Menangani pengeditan informasi member yang sudah ada di dalam database.
  - delete: Menghapus member dari database.
 
4. Templates:
- skinform.html: Digunakan untuk membuat tampilan formulir untuk menambahkan atau mengedit data.
- skintabel.html: Dugunakan untuk menampilkan data dalam bentuk tabel.

5. Pengaturan Routing dan Pengelolaan Aksi:
- Conf.php : Berisi definisi konfigurasi untuk koneksi database seperti host, username, password, dan nama database. Digunakan untuk menyimpan informasi konfigurasi yang dapat diakses dari berbagai bagian aplikasi.
- ChannelYoutube.php: Ini adalah file pengontrol (controller) untuk entitas Channel Youtube. Memuat instansiasi dari ChannelYoutubeController dan menangani logika untuk menampilkan halaman, menambah, mengedit, dan menghapus data channel Youtube. Melakukan penanganan terhadap parameter pada URL untuk menentukan tindakan yang harus dilakukan.
- Youtuber.php: Sama seperti ChannelYoutube.php, ini adalah file pengontrol (controller) untuk entitas Youtuber. Memuat instansiasi dari YoutuberController dan menangani logika untuk menampilkan halaman, menambah, mengedit, dan menghapus data youtuber.
- Member.php: Mirip dengan ChannelYoutube.php dan Youtuber.php, ini adalah file pengontrol (controller) untuk entitas Member. Memuat instansiasi dari MemberController dan menangani logika untuk menampilkan halaman, menambah, mengedit, dan menghapus data member.
  
# Penjelasan Alur

# Dokumentasi Program
Tabel Channel Youtube, memiliki beberapa halaman:
1. Halaman Home/Daftar Channel Youtube
![image](https://github.com/daffahag123/TP4DPBO2024C2-/assets/135239333/9f38a712-0801-4edd-ae2b-dd7632bb83f3)
2. Halaman Tambah Channel Youtube
![image](https://github.com/daffahag123/TP4DPBO2024C2-/assets/135239333/04101ab8-a35f-4821-b5dd-e61b0b2b8f74)
3. Halaman Ubah Channel Youtube
![image](https://github.com/daffahag123/TP4DPBO2024C2-/assets/135239333/604c821c-91fa-4cb2-80e0-e2a0f8f3d966)

Tabel Youtuber, memiliki beberapa halaman:
1. Halaman Daftar Youtuber
![image](https://github.com/daffahag123/TP4DPBO2024C2-/assets/135239333/021a7de8-e9a3-4f06-b95e-43d4fb568c61)
2. Halaman Tambah Youtuber
![image](https://github.com/daffahag123/TP4DPBO2024C2-/assets/135239333/63916f71-eb2f-4cae-ad4f-da8aa247237b)
3. Halaman Ubah Youtuber
![image](https://github.com/daffahag123/TP4DPBO2024C2-/assets/135239333/45712665-0c3f-4109-a9ee-90e77587990d)

Tabel Member, memiliki beberapa halaman:
1. Halaman Daftar Member
![image](https://github.com/daffahag123/TP4DPBO2024C2-/assets/135239333/a5aae961-67bc-4f4d-818e-87cf21aaefbd)
2. Halaman Tambah Member
![image](https://github.com/daffahag123/TP4DPBO2024C2-/assets/135239333/2c4bd80a-ef70-46c6-9cd1-65e8f2c26cfa)
3. Halaman Ubah Member
![image](https://github.com/daffahag123/TP4DPBO2024C2-/assets/135239333/953be79b-04f4-4815-9efd-5ecbf9094544)







