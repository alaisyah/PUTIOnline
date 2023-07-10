<?php 
session_start(); 
include '../admin/conDB.php'
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Profile | Mahasiswa</title>
    <link rel="stylesheet" href="../style/editprofile.css" />
  </head>
  <body>
    <body>
      <nav>
        <div class="container">
          <div class="nav_brand">
            <img src="../assets/img/logo.png" alt="Logo PUTI ONLINE" />
            <h4>PUTI<br />ONLINE</h4>
          </div>
          <p>Pengaduan Umum TI</p>
          <div class="profile_mhs">
            <img
              class="profile"
              src="../assets/foto profilemhs/<?php echo $_SESSION['nim']['fotomhs']; ?>"
              alt="Profile_Mahasiswa"
            />
            <div class="name">
              <p><?php echo $_SESSION['nim']['nama']; ?></p>
              <img src="../assets/img/arrow-drop.png" alt="Arrow Drop" />
              <input type="checkbox" name="check" id="check" />
              <ul>
                <li><a href="../index.php">Dashboard</a></li>
                <li><a href="profilemhs.php">Profile Saya</a></li>
                <li><a href="editprofile.php">Edit Profile</a></li>
                <li><a href="../logout.php">Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>

      <main>
        <div class="container">
          <h1>HALAMAN EDIT PROFILE</h1>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="image">
              <img src="../assets/foto profilemhs/<?php echo $_SESSION['nim']['fotomhs']?>" alt="Profile Mahasiswa" />
              <label for="foto">
                <img src="../assets/img/camera.png" alt="icon-camera" />
                <input type="file" name="foto" id="foto" />
              </label>
            </div>
            <label for="nama">Nama Mahasiswa</label>
            <input type="text" name="nama" value="<?php echo $_SESSION['nim']['nama']; ?>" id="nama"  readonly/>
            <label for="username">Username</label>
            <input
              type="text"
              name="username"
              value="<?php echo $_SESSION['nim']['nim']; ?>"
              id="username"
              readonly
            />
            <label for="password">Password</label>
            <input
              type="password"
              name="password"
              value="<?php echo $_SESSION['nim']['password']; ?>"
              id="password"
            />
            <button type="submit" name="submit">Edit Profile</button>
          </form>
        </div>
      </main>
      <?php if (isset($_POST['submit'])) {
        $nim= $_SESSION['nim']['nim'];
        $nama_foto = $_FILES['foto']['name'];
        $lokasi =$_FILES['foto']['tmp_name'];
        if (!empty($lokasi)) {
          move_uploaded_file($lokasi, "../assets/foto profilemhs/$nama_foto");
          $conn->query("UPDATE mahasiswa SET password='$_POST[password]', fotomhs='$nama_foto' where nim='$nim'");

        }else{
          $conn->query("UPDATE mahasiswa SET password='$pass' WHERE nim='$id'");
        }
        echo "<script>alert('Data Berhasil Diubah')</script>";
        echo "<script>location='loginmhs.php';</script>";
      }?>


      <footer>
        <p class="container">Copyright &copy; 2023 by PUTI ONLINE</p>
      </footer>
      <script>
        const nama = document.getElementById("nama")
        const username = document.getElementById("username")

        nama.addEventListener("click", () => alert("Nama tidak dapat diubah!"))
        username.addEventListener("click", () => alert("Username tidak dapat diubah!"))
      </script>
    </body>
  </body>
</html>
