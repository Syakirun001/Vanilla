

	          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>

		<?php if (isset($_SESSION["pelanggan"])): ?>
			<li class="nav-item"><a href="riwayat.php" class="nav-link">Riwayat Belanja</a></li>
			<li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
		<?php else: ?>
		<li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
	<?php endif ?>
			  
	          <li class="nav-item dropdown">
	          <li class="nav-item cart"><a href="keranjang.php" class="nav-link"><span class="icon icon-shopping_cart"></span>
<?php
if (!empty($_SESSION["keranjang"]) OR isset($_SESSION["keranjang"]))

{
	echo'<span class="bag d-flex justify-content-center align-items-center"><small>!</small></span>';
	}
?>
	          </a></li>