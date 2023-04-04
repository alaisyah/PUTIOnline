<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Admin | PUTI Online</title>
    <link rel="stylesheet" href="../style/login.css" />
  </head>
  <body>
    <nav>
      <div class="container">
        <div class="nav_brand">
          <img src="../assets/img/logo.png" alt="Logo PUTI ONLINE" />
          <h4>
            PUTI<br />
            ONLINE
          </h4>
        </div>
        <label class="burger_menu" for="burger" id="label">
          <input type="checkbox" name="burger" id="burger" />
        </label>
        <ul class="list_link" id="link">
          <li class="home"><a href="../index.php">Home</a></li>
          <li class="cara"><a href="../tatacara.php">Tata Cara</a></li>
        </ul>
      </div>
    </nav>

    <div class="container">
      <main>
        <h2>LOGIN ADMIN</h2>
        <p>Please login with your account</p>
        <form action="" method="post">
          <label for="username">Username</label>
          <div class="input-form">
            <img src="../assets/img/user.png" alt="user-icon" width="24px" />
            <input type="text" name="username" id="username" />
          </div>
          <label for="password">Password</label>
          <div class="input-form">
            <img src="../assets/img/lock.png" alt="lock-icon" width="24px" />
            <input type="text" name="password" id="password" />
          </div>
          <button type="submit" name="submit">Login Now</button>
          <a href="../mahasiswa/loginmhs.php">Login as Mahasiswa</a>
        </form>
      </main>
    </div>

     <?php 
      include 'conDB.php';
      if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $pass = $_POST['password'];

        $cek = mysqli_query($conn, "SELECT * FROM admin WHERE nip='".$username."' AND password='".$pass."'");
          if (mysqli_num_rows($cek) >0) {
            $d = mysqli_fetch_object($cek);
            $_SESSION['status_login'] = true;
            $_SESSION['a_global'] = $d;
            $_SESSION['id'] = $d->id_admin;
            echo '<script>window.location="dashboard.php"</script>';
        }else{
            echo '<script>alert("username atau password anda salah!")</script>';
        
          }
      }
      
    ?>

    <footer>
      <p class="container">Copyright &copy; 2023 by PUTI ONLINE</p>
    </footer>
    <script src="../mahasiswa/script.js"></script>
  </body>
</html>
