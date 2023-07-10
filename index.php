<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HOME | PUTI Online</title>
    <link rel="stylesheet" href="style/style.css" />
  </head>
  <body>
    <nav>
      <div class="container">
        <div class="nav_brand">
          <img src="assets/img/logo.png" alt="Logo PUTI ONLINE" />
          <h4>
            PUTI<br />
            ONLINE
          </h4>
        </div>
        <label class="burger_menu" for="burger" id="label">
          <input type="checkbox" name="burger" id="burger" />
        </label>
        <ul class="list_link" id="link">
          <li class="home"><a href="index.php">Home</a></li>
          <li class="cara"><a href="tatacara.php">Tata Cara</a></li>
          <li class="btn_login"><a href="mahasiswa/loginmhs.php">Login</a></li>
        </ul>
        <?php if (isset($_SESSION['nim'])) { ?>
          <div class="btn">
            <a href="logout.php">Logout</a>
          </div>
        <?php }else{ ?>
          <div class="btn">
          <a href="mahasiswa/loginmhs.php">Login</a>
        </div>
        <?php }?>
      </div>
    </nav>
    <main>
      <div class="container">
        <section class="left">
          <h1>Layanan Pengaduan Umum TI Online</h1>
          <p>
            Sampaikan laporan masalah anda disini, kami akan memprosesnya dengan
            cepat
          </p>
          <a href="mahasiswa/pengaduan.php">Laporkan!</a>
        </section>
        <section class="right">
          <img src="assets/img/speaker.png" alt="Speaker" />
        </section>
      </div>
    </main>
    <div class="category_laporan">
      <h2>HAL YANG BISA ANDA LAPORKAN</h2>
      <section class="category container">
        <div class="fasilitas_umum">
          <div class="kotak"></div>
          <img src="assets/img/building.png" width="153" alt="" />
          <h3>FASILITAS UMUM</h3>
          <p>Anda dapat melaporkan kerusakan fasilitas umum yang ada di TI</p>
        </div>
        <div class="laboratorium">
          <div class="kotak"></div>
          <img src="assets/img/computer.png" width="154" alt="" />
          <h3>LABORATORIUM</h3>
          <p>Anda dapat melaporkan kerusakan fasilitas Lab yang ada di TI</p>
        </div>
        <div class="kebersihan">
          <div class="kotak"></div>
          <img src="assets/img/office-building.png" width="154" alt="" />
          <h3>KEBERSIHAN</h3>
          <p>Anda dapat melaporkan tentang kebersihan di wilayah TI</p>
        </div>
      </section>
    </div>
    <footer>
      <p class="container">Copyright &copy; 2023 by PUTI ONLINE</p>
    </footer>
    <script src="mahasiswa/script.js"></script>
  </body>
</html>
