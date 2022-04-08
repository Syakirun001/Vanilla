<?php
session_start();
$koneksi = new mysqli("localhost","root","","vanilla");

if (!isset($_SESSION["pelanggan"]) OR empty($_SESSION["pelanggan"]))
{
  echo "<script>alert('Silahkan Login');</script>";
  echo "<script>location='login.php';</script>";
  exit();
}

//mendapatkan id pembelian dari URL
$idpem = $_GET["id"];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian = '$idpem'");
$detpem = $ambil->fetch_assoc();

//mendapatkan id pelanggan yang beli
$id_pelanggan_beli = $detpem["id_pelanggan"];
//mendapatkan id pelanggan yang login
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_pelanggan_login !==$id_pelanggan_beli)
{
  echo "<script>alert('');</script>";
  echo "<script>location='riwayat.php';</script>";
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pembayaran</title>

  <!-- Custom fonts for this template-->
  <link href="sb/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="sb/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Halaman Pelanggan</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="keranjang.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Keranjang</span></a>
      </li>
      <?php if (isset($_SESSION["pelanggan"])): ?>
      <li class="nav-item">
        <a class="nav-link" href="riwayat.php">
          <i class="fas fa-fw fa-list"></i>
          <span>Riwayat Belanja</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">
          <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>Logout</span></a>
      </li>
      <?php else: ?>
      <li class="nav-item">
        <a class="nav-link" href="login.php">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Login</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="daftar.php">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Daftar</span></a>
      </li>
      <?php endif ?>
      <li class="nav-item">
        <a class="nav-link" href="checkout.php">
          <i class="fas fa-fw fa-user"></i>
          <span>Checkout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item no-arrow">
              <a href="logout.php">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Logout</span>
                
              </a>

            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <div class="card shadow">
            <div class="card-body">
  <h2>Konfirmasi pembayaran</h2>
  <p>Kirim bukti pembayaran anda disini</p>
  <div class="alert alert-info">Total tagihan anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]) ?></strong></div>

  <form method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Nama Penyetor</label>
      <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
      <label>Bank</label> 
      <select name="bank">
        <option value="Bank_DKI">Bank DKI</option>
        <option value="Bank_BRI">Bank BRI</option>
        <option value="Bank_Mandiri">Bank Mandiri</option>
        <option value="Bank_BNI">Bank BNI</option>
        <option value="Bank_BJB">Bank BJB</option>
        <option value="Bank_BCA">Bank BCA</option>
      </select> 
    </div>
    <div class="form-group">
      <label>Jumlah</label>
      <input type="number-danger" class="form-control" name="jumlah" min="1">
    </div>
    <div class="form-group">
      <label>Foto Bukti</label>
      <input type="file" class="form-control" name="bukti">
      <p class="text-danger">Foto bukti harus JPG maksimal 3MB</p>
    </div>
    <button class="btn btn-primary" name="kirim">Kirim</button>
  </form>
<?php
if (isset($_POST["kirim"])) 
{
  $namabukti = $_FILES["bukti"]["name"];
  $lokasibukti = $_FILES["bukti"]["tmp_name"];
  $namafiks = date("YmdHis").$namabukti;
  move_uploaded_file($lokasibukti, "bukti_pembayaran/$namafiks");

  $nama = $_POST["nama"];
  $bank = $_POST["bank"];
  $jumlah= $_POST["jumlah"];
  $tanggal = date("Y-m-d");

  //simpan pembayaran
  $koneksi->query("INSERT INTO pembayaran(id_pembelian,nama,bank,jumlah,tanggal,bukti)
    VALUES('$idpem','$nama','$bank','$jumlah','$tanggal','$namafiks') ");

  //update data pembayaran pending -> sudah dilakukan pembayaran
  $koneksi->query("UPDATE pembelian SET status_pembelian = 'sudah kirim pembayaran'
    WHERE id_pembelian='$idpem'");

  echo "<script>alert('terima kasih sudah mengirimkan bukti pembayaran');</script>";
  echo "<script>location='riwayat.php';</script>";


}
?>

  
  
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
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
