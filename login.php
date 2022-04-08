<?php 
session_start();
$koneksi = new mysqli("localhost","root","","vanilla");
?><!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login</title>

  <!-- Custom fonts for this template-->
  <link href="sb/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="sb/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block"><img src="img/login.jpg" class="img-fluid" alt="login"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login Pelanggan</h1>
                  </div>
                  <form class="user" method="post">
                    <div class="form-group">
                      <input type="text" name="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <button class="btn btn-primary btn-user btn-block" name="login">
                      Login
                    </button>
                    <hr>
                    
                  </form>
                  <div class="text-center">
                    <a class="small" href="daftar.php">Buat Akun!</a>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="sb/vendor/jquery/jquery.min.js"></script>
  <script src="sb/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="sb/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="sb/js/sb-admin-2.min.js"></script>

</body>

</html>
<?php  
if (isset($_POST["login"]))
{
  $email = $_POST["email"];
  $password = $_POST["password"];
  $ambil = $koneksi->query("SELECT * FROM pelanggan
    WHERE email_pelanggan ='$email' AND password_pelanggan = '$password'");

  $akunyangcocok = $ambil->num_rows;

  if ($akunyangcocok==1)
  {
    //anda sudah login
    $akun =  $ambil->fetch_assoc();
    $_SESSION["pelanggan"] = $akun;
    echo "<script>alert('Login berhasil');</script>";

    //jika sudah belanja
    if (isset($_SESSION["keranjang"]) OR !empty($_SESSION["keranjang"]))
    {
      echo "<script>location = 'index.php';</script>";
    }
    else
    {
      echo "<script>location = 'riwayat.php';</script>";  
    }
  }
    else
    {
    //anda gagal
      echo "<script>alert('Anda gagal login, periksa kembali akun anda');</script>";
      echo "<script>location = 'login.php';</script>";
    }
  }
?>