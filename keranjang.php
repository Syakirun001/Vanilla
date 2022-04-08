<?php 
session_start();



$koneksi = new mysqli("localhost","root","","vanilla");

if (empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"]))

{
  echo "<script>alert('keranjang kosong, silakan belanja terlebih dahulu');</script>";
  echo "<script>location = 'index.php';</script>";
}

?><!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vanilla Coffee</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  	<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Vanilla Coffee </a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
			<?php include 'nav.php'; ?>
			</ul>
	      </div>
		  </div>
	  </nav>
    <!-- END nav -->

    <section class="home-slider owl-carousel">

      <div class="slider-item" style="background-image: url(images/bg_5.jpg);" data-stellar-background-ratio="0.5">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center">

            <div class="col-md-7 col-sm-12 text-center ftco-animate">
            	<h1 class="mb-3 mt-5 bread">Cart</h1>
	            
            </div>

          </div>
        </div>
      </div>
    </section>
		
		<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
        <?php
        $namaSession=@$_POST["namaSession"];
        $quantity=@$_POST["quantity"];
        if(!empty($namaSession)){
        	$_SESSION["keranjang"][$namaSession]=$quantity;
        }
        $nomor=1; 
        $subtotalharga = 0;
        ?>
        
        <?php
         foreach ($_SESSION["keranjang"] as $id_produk => $jumlah):?>
        <?php
        $ambil = $koneksi ->query("SELECT * FROM produk
          WHERE id_produk='$id_produk'");
        $pecah = $ambil ->fetch_assoc();
        $subharga = $pecah["harga_produk"]*$jumlah;
        
        
        ?>
                  <tr class="text-center">
                    <td class="product-remove"><a href="hapuskeranjang.php?id=<?php echo $id_produk ?>"><span class="icon-close"></span></a></td>
                    
                    <td class="image-prod"><div class="img" style="background-image:url(foto_produk/<?php echo $pecah['foto_produk']; ?>);"></div></td>
                    
                    <td class="product-name">
                      <h3><?php echo $pecah["nama_produk"]; ?></h3>
                      <p><?php echo $pecah["deskripsi_produk"]; ?></p>
                    </td>
                    
                    <td class="price">Rp. <?php echo number_format ($pecah["harga_produk"]); ?></td>
                    
                    <td class="quantity">
                    	<div class="input-group mb-3">
                    			<form method="post"><input type="text" name="quantity" class="quantity form-control input-number" value="<?php echo $jumlah; ?>" min="1" max="100">
                    			<input type="hidden" name="namaSession" value="<?php echo $id_produk;?>">
                    			<input type="submit" style="position: absolute; left: -9999px">
                    			</form>
                      
                      </div>
                    </td>
                    
                    <td class="total">Rp. <?php echo number_format($subharga); $subtotalharga=$subtotalharga+$subharga; ?></td>
                  </tr>
      <?php $nomor++; ?>
      <?php endforeach ?>
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>Rp. <?php echo number_format($subtotalharga);?></span>
    					</p>
    				</div>
    				<p class="text-center"><a href="index.php" class="btn btn-primary py-3 px-4">Lanjutkan Belanja</a></p>
					<p class="text-center"><a href="checkout.php" class="btn btn-primary py-3 px-4">Checkout</a></p>
    			</div>
    		</div>
			</div>
		</section>

          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>