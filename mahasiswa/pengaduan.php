<?php 
  session_start();
  if($_SESSION['nim']!=true  OR !isset($_SESSION['nim']))
  {
    echo "<script>alert('login terlebih dahulu, agar dapat melapor');</script>";
    echo "<script>location='loginmhs.php';</script>";
  }

  include '../admin/conDB.php';
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengaduan | Mahasiswa</title>
    <link rel="stylesheet" href="../style/pengaduan.css?version=<?php echo filemtime('../style/pengaduan.css'); ?>">
  </head>
  <body>
    <nav>
      <div class="container">
        <div class="nav_brand">
          <img src="../assets/img/logo.png" alt="Logo PUTI ONLINE" />
          <h4>PUTI<br />ONLINE</h4>
        </div>
        <!-- <ul class="list_link">
          <li><a href="index.html">Home</a></li>
          <li><a href="tatacara.html">Tata Cara</a></li>
        </ul> -->
        <!-- <a href="mahasiswa/loginmhs.html" class="btn_login">Login</a> -->
        <p>Pengaduan Umum TI</p>
        <div class="profile_mhs">
          <img
            class="profile"
            src="../assets/foto profilemhs/<?php echo $_SESSION['nim']['fotomhs'] ?>"
            alt="Profile_Mahasiswa"
          />
          <div class="name">
            <p><?php echo $_SESSION['nim']['nama'] ?></p>
            <img src="../assets/img/arrow-drop.png" alt="Arrow Drop" />
            <input type="checkbox" name="check" id="check">
            <ul>
              <li><a href="../index.php">Dashboard</a></li>
              <li><a href="profilemhs.php">Profile Saya</a></li>
              <li><a href="editprofile.php">Edit Profile</a></li>
              <li><a href="loginmhs.php">Logout</a></li>
            </ul>
          </div>
        </div>
      </div>
    </nav>

    <main>
      <div class="container">
        <h1>PENGADUAN MAHASISWA</h1>
        <p>Ungkapkan keluh kesahmu disini ya...</p>
        <form action="" method="post" enctype="multipart/form-data">
          <label for="kategori">Kategori</label>
          <div class="select">
            <select name="kategori" id="kategori">
              <option value="">Kategori Laporan</option>
              <option value="1">Fasilitas Umum</option>
              <option value="2">Laboratorium</option>
              <option value="3">Kebersihan</option>
            </select>
          </div>
          <label for="bukti">Bukti Foto</label>
          <label class="requirenment">Gambar harus disertai tanggal dan waktu!</label>
          <label class="bukti">
            <input type="file" name="bukti" id="bukti" required/>
            <span>Pilih Foto Laporan</span>
          </label>
          <label for="deskripsi">Deskripsi</label>
          <textarea
            name="deskripsi"
            id="deskripsi"
            cols="30"
            rows="10"
          ></textarea>
          <button type="submit" name="submit">Kirim Laporan</button>
        </form>
      </div>
    </main>
    <?php
    include '../admin/conDB.php'; 
    if (isset($_POST['submit'])) {
        $nim= $_SESSION['nim']['nim'];
        $ekstensi_diperbolehkan	= array('png','jpg','jpeg');
        $nama_foto = $_FILES['bukti']['name'];
        $x = explode('.', $nama_foto);
        $ekstensi = strtolower(end($x));
        $ukuran	= $_FILES['bukti']['size'];
        $lokasi =$_FILES['bukti']['tmp_name'];
        $keluhan = htmlspecialchars($_POST['deskripsi']);
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
          if($ukuran < 3544070){
              move_uploaded_file($lokasi, "../assets/foto bukti laporan/$nama_foto");
              $conn->query("INSERT INTO status_laporan (status,feedback) VALUE('terkirim',' ')");
              //mengambil id dari status
              $status_barusan = $conn->insert_id;
              $hasil = $conn->query("INSERT INTO laporan (foto,keluhan,id_kategori,nim,id_status) VALUE ('$nama_foto','$keluhan','$_POST[kategori]','$nim','$status_barusan')");
              echo "<script>alert('laporan terkirim')</script>";
          }else{
            echo "<script>alert('UKURAN FILE TERLALU BESAR')</script>";
          }
        }else {
          echo "<script>alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN')</script>";
    }
    echo "<script>location='profilemhs.php';</script>";
     
      
    }
    ?>

    <footer>
      <p class="container">Copyright &copy; 2023 by PUTI ONLINE</p>
    </footer>
  </body>
</html>
