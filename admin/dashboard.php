<?php
include 'conDB.php';
session_start();
if ($_SESSION['status_login'] != true) {
  echo '<script>window.location="loginadmin.php"</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan Mahasiswa</title>
  <link rel="stylesheet" href="../style/dashboardadmin.css?version=<?php echo filemtime('../style/dashboardadmin.css'); ?>">
</head>

<body>
  <nav>
    <div class="container">
      <div class="nav_brand">
        <img src="../assets/img/logo.png" alt="Logo PUTI ONLINE" />
        <h4>PUTI<br /> ONLINE</h4>
      </div>
      <p>Halaman Admin</p>
      <div class="profile_mhs">
        <div class="name">
          <p><span>Selamat Pagi, </span>Admin</p>
          <img src="../assets/img/arrow-drop.png" alt="Arrow Drop" />
          <input type="checkbox" name="check" id="check" />
          <ul>
            <li><a href="../index.html">Dashboard</a></li>
            <li><a href="loginadmin.html">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <main>
    <div class="container">
      <h1>LAPORAN MAHASISWA</h1>
      <form action="hasilpencarian.php" method="get">
        <div class="search">
          <label for="search" class="bold">Search: </label>
          <input type="text" placeholder="cari laporan..." name="search" id="search" name="search">
        </div>
      </form>
      <form>
        <div class="category_search">
          <label for="category" class="bold">Select Category:</label>

          <span>
            <input type="checkbox" name="all" id="all">
            <label for="all" class="all">ALL</label>
          </span>
          <span>
            <input type="checkbox" name="fasilitas" id="fasilitas">
            <label for="fasilitas" class="Fasilitas Umum">Fasilitas Umum</label>
          </span>
          <span>
            <input type="checkbox" name="laboratorium" id="laboratorium">
            <label for="laboratorium" class="laboratorium">Laboratorium</label>
          </span>
          <span>
            <input type="checkbox" name="kebersihan" id="kebersihan">
            <label for="kebersihan" class="kebersihan">Kebersihan</label>
          </span>
          <span>
            <input type="checkbox" name="setuju" id="setuju">
            <label for="setuju" class="setuju">Setuju</label>
          </span>
          <span>
            <input type="checkbox" name="tidakSetuju" id="tidakSetuju">
            <label for="tidakSetuju" class="tidakSetuju">Tidak Setuju</label>
          </span>

        </div>
      </form>

      <div class="riwayat_laporan">
       <?php include 'all.php' ?>
      </div>
  </main>

  <footer>
    <p class="container">Copyright &copy; 2023 by PUTI ONLINE</p>
  </footer>

  <script>
    let feedback = document.getElementById("feedback");
    let button = document.getElementById("btn_feedback");
    const riwayat = document.querySelector(".riwayat_laporan");
    const search = document.querySelector("#search")
    const span = document.querySelectorAll(".category_search span");

    search.addEventListener("keyup", (e) => {
      let xhr = new XMLHttpRequest()

      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          riwayat.innerHTML = `${xhr.responseText}`
        }
      }

      xhr.open("GET", "../ajax/search.php?keyword=" + e.target.value, true)
      xhr.send();
    })

    span.forEach((e)=>{
      e.addEventListener("click", (e) => {
      e.preventDefault()
      console.log(e)
      let xhr = new XMLHttpRequest()

      xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          riwayat.innerHTML = `${xhr.responseText}`
        }
      }

      xhr.open("GET", "../ajax/category.php?keycat=" + e.target.className, true)
      xhr.send();
    })
    })

    feedback.addEventListener("keydown", (e) => {
      if (e.target.value.length > 0) {
        button.style.display = "block"
      } else {
        button.style.display = "none"
      }
    })
  </script>
</body>

</html>