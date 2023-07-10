<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tata Cara | PUTI Online</title>
    <link rel="stylesheet" href="style/tatacara.css?version=<?php echo filemtime('style/tatacara.css'); ?>">
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
    <main class="container">
      <h2>TATA CARA PENGADUAN</h2>
      <section>
        <div class="nomor">
          <div class="bottom_nomor"></div>
          <h3>1</h3>
        </div>
        <div class="description">
          <div class="bottom_description"></div>
          <p class="bold">Pastikan anda warga TI POLIWANGI</p>
        </div>
      </section>
      <section>
        <div class="nomor">
          <div class="bottom_nomor"></div>
          <h3>2</h3>
        </div>
        <div class="description">
          <div class="bottom_description"></div>
          <p class="bold">Login Akun</p>
          <div class="desc">
            <p>Login Akun Mahasiswa:</p>
            <ul>
              <li>Username: NIM Mahasiswa</li>
              <li>Password: No Pendaftaran</li>
            </ul>
            <p>Login Akun Admin:</p>
            <ul>
              <li>Username: NIPK</li>
              <li>Password: POLIWANGI</li>
            </ul>
          </div>
        </div>
      </section>
      <section>
        <div class="nomor">
          <div class="bottom_nomor"></div>
          <h3>3</h3>
        </div>
        <div class="description">
          <div class="bottom_description"></div>
          <p class="bold">Mahasiswa melapor dengan memilih jenis pelaporan</p>
        </div>
      </section>
      <section>
        <div class="nomor">
          <div class="bottom_nomor"></div>
          <h3>4</h3>
        </div>
        <div class="description">
          <div class="bottom_description"></div>
          <p class="bold">
            Mahasiswa memberikan laporan pada kolom yang disediakan
          </p>
        </div>
      </section>
      <section>
        <div class="nomor">
          <div class="bottom_nomor"></div>
          <h3>5</h3>
        </div>
        <div class="description">
          <div class="bottom_description"></div>
          <p class="bold">Unggah dokumen atau bukti yang sesuai ketentuan</p>
        </div>
      </section>
      <section>
        <div class="nomor">
          <div class="bottom_nomor"></div>
          <h3>6</h3>
        </div>
        <div class="description">
          <div class="bottom_description"></div>
          <p class="bold">Submit laporan</p>
        </div>
      </section>
      <section>
        <div class="nomor">
          <div class="bottom_nomor"></div>
          <h3>7</h3>
        </div>
        <div class="description">
          <div class="bottom_description"></div>
          <p class="bold">Jika Admin Masuk ke halaman Admin</p>
        </div>
      </section>
      <section>
        <div class="nomor">
          <div class="bottom_nomor"></div>
          <h3>8</h3>
        </div>
        <div class="description">
          <div class="bottom_description"></div>
          <p class="bold">Admin mengevaluasi laporan</p>
        </div>
      </section>
    </main>
    <footer>
      <p class="container">Copyright &copy; 2023 by PUTI ONLINE</p>
    </footer>
    <script src="mahasiswa/script.js"></script>
  </body>
</html>
