<?php session_start(); ?>
<?php $ambil = $koneksi = new mysqli("localhost","root","","vanilla"); ?>
<?php
$id_produk = $_GET["id"];

$ambil = $koneksi -> query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil -> fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Vanilla Coffee</title>

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
              <a href="index.php?halaman=logout">
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

    <div class="row">
      <div class="col-md-6">
        <img src="foto_produk/<?php echo $detail["foto_produk"]; ?>" alt="" class="img-fluid">
      </div>
      <div class="col-md-6">
        <h2><?php echo $detail["nama_produk"] ?></h2>
        <h4>Rp. <?php echo number_format($detail["harga_produk"]); ?></h4>

        <h5>Stok: <?php echo $detail['stok_produk'] ?></h5>

        <form method="post">
          <div class="form-group">
            <div class="input-group">
              <input type="number"  min="1" class="form-control" name="jumlah" max="<?php echo $detail['stok_produk'] ?>">
              <div class="input-group-btn">
                <button class="btn btn-primary" name="beli">Beli</button>
              </div>
            </div>
          </div>
        </form>

        <?php
        if (isset($_POST["beli"]))
        {
          $jumlah = $_POST["jumlah"];

          $_SESSION["keranjang"][$id_produk] = $jumlah;

          echo "<script>alert('produk telah masuk di keranjang belanja');</script>";
          echo "<script>location = 'keranjang.php';</script>";
        }


        ?>
        <p><?php echo $detail["deskripsi_produk"]; ?></p>
        </div>
    </div>
  
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
            <span>Halaman Admin</span>
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
