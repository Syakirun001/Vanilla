<?php $koneksi = new mysqli("localhost","root","","vanilla");?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Registrasi</title>

  <!-- Custom fonts for this template-->
  <link href="sb/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="sb/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block"><img src="img/daftar.jpg" class="img-fluid" alt="daftar"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Daftar Pelanggan</h1>
              </div>
              <form class="user" method="post">
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="nama" id="exampleFirstName" placeholder="Nama">
                  
                </div>
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Password">
                 
                </div>
                <div class="form-group">
                  <input type="text" name="alamat" class="form-control form-control-user" id="exampleInputEmail" placeholder="Alamat">
                </div>
                <div class="form-group">
                  <input type="text" name="telepon" class="form-control form-control-user" id="exampleInputEmail" placeholder="No. Telp">
                </div>
                <button class="btn btn-primary btn-user btn-block" name="daftar">
                  Daftar
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="login.php">Sudah Punya Akun? Login!</a>
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
if (isset($_POST["daftar"]))
{
  $nama = $_POST["nama"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $alamat = $_POST["alamat"];
  $telepon = $_POST["telepon"];

  $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email'");
  $yangcocok = $ambil -> num_rows;
  if ($yangcocok==1) 
  {
    echo "<script>alert('pendaftaran gagal, email sudah digunakan');</script>";
    echo "<script>location='daftar.php';</script>";
  }
  else
  {
    $koneksi -> query("INSERT INTO pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan,alamat_pelanggan)
      VALUES('$email','$password','$nama','$telepon','$alamat')");

    echo "<script>alert('pendaftaran sukses, silahkan login');</script>";
    echo "<script>location='login.php';</script>";
  }
}


?>