<!-- navbar -->

<header class="navbar navbar-form navbar-header">
	<div class="container">	

	<ul class="nav navbar-nav">
		<li><a href="index.php">Home</a></li> 
		</ul>
		<ul class="nav navbar-nav">
		<li><a href="keranjang.php">Keranjang</a></li>
		</ul>
		
		<?php if (isset($_SESSION["pelanggan"])): ?>
		<ul class="nav navbar-nav">
			<li><a href="riwayat.php">Riwayat Belanja</a></li>
			</ul>
			<ul class="nav navbar-nav">
			<li><a href="logout.php">Logout</a></li>
			</ul>
		<?php else: ?>
		<ul class="nav navbar-nav">
		<li><a href="login.php">Login</a></li>
		</ul>
		<ul class="nav navbar-nav">
		<li><a href="daftar.php">Daftar</a></li>
		</ul>
	<?php endif ?>
		<ul class="nav navbar-nav">
		<li><a href="checkout.php">Checkout</a></li>
	</ul>

	</div>
</header>