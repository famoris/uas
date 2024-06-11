<?php
include 'koneksi.php';
session_start();
$idpelanggan = $_SESSION['idpelanggan'];

//jika tidak ada session/session kosong, maka user akan di arahkan ke halaman login
if (empty($_SESSION['idpelanggan'])) {
	header("Location:login.php");
}
if ($_SESSION['role'] != "anggota") {

	header("Location:login.php");
}
?>
<?php include 'head.php';  ?>
<!-- Header -->
<header class="header-v4">
	<!-- Header desktop -->
	<div class="container-menu-desktop">
		<!-- Topbar -->
		<div class="wrap-menu-desktop how-shadow1">
			<nav class="limiter-menu-desktop container">

				<!-- Logo desktop -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#"><img style="width:150px;height:150px" src="images/logo.png" alt=""></a>
				</div>

				<!-- Menu desktop -->
				<div class="menu-desktop">
					<ul class="main-menu">
						<li class="active-menu">
							<a href="homemember.php">HOME</a>
						</li>

						<li class="active-menu">
							<a href="produk.php">PRODUK</a>
						</li>

						<li class="active-menu">
							<a href="profil_member.php">AKUN</a>
						</li>

						<li class="active-menu">
							<a href="pesanan.php">PESANAN</a>
						</li>

 						<li class="active-menu">
							<a href="konfirmasipembayaran.php">KONFIRMASI</a>
						</li> 

						<li class="active-menu">
							<a href="logout.php" class="flex-c-m trans-04 p-lr-25">LOGOUT</a>
						</li>

						<li class="active-menu" style="color:white">
							Welcome <?= $_SESSION['namalengkapanggota']  ?>
						</li>

					</ul>
				</div>
				<?php
				$jumlahkeranjang = mysqli_query($db, "SELECT COUNT(*) AS total FROM tbl_orders WHERE statusorder='Proses Pengiriman' and idpelanggan='$idpelanggan'");
				$jml = mysqli_fetch_array($jumlahkeranjang);
				$jmlc = $jml['total'];
				?>
				<a href="pesanan.php">
				<div class="wrap-icon-header flex-w flex-r-m">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?= $jmlc ?>">
						<i class="zmdi zmdi-email"></i>
					</div>
				</div>	
				<!-- Icon header -->
				<?php
				$jumlahkeranjang = mysqli_query($db, "SELECT COUNT(*) AS total FROM tbl_cart WHERE idpelanggan='$idpelanggan'");
				$jml = mysqli_fetch_array($jumlahkeranjang);
				$jmlc = $jml['total'];
				?>
				<a href="membercart.php">
				<div class="wrap-icon-header flex-w flex-r-m">
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?= $jmlc ?>">
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>
				</div>	
					</a>
			</nav>
		</div>
	</div>

	<!-- Header Mobile -->
	<div class="wrap-header-mobile">
		<!-- Logo moblie -->
		<div class="logo-mobile">
			<a href="index.html"><img style="width:200;height:100px" src="images/icons/logo.png" alt="IMG-LOGO"></a>
		</div>

		<!-- Icon header -->
		<div class="wrap-icon-header flex-w flex-r-m m-r-15">

			<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>
		</div>

		<!-- Button show menu -->
		<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
			<span class="hamburger-box">
				<span class="hamburger-inner"></span>
			</span>
		</div>
	</div>


	<!-- Menu Mobile -->
	<div class="menu-mobile">
		<ul class="topbar-mobile">
			<li>
				<div class="left-top-bar">
					AKUN
				</div>
			</li>
		</ul>

		<ul class="main-menu-m">
			<li>
				<a href="index.php">HOME</a>
			</li>

			<li>
				<a href="product.html">PESANAN</a>
			</li>

			<li>
				<a href="shoping-cart.html">KONFIRMASI</a>
			</li>

			<li>
				<a href="index.php">LOGOUT</a>
			</li>
		</ul>
	</div>

</header>
<!-- Cart -->
<div class="wrap-header-cart js-panel-cart">
	<div class="s-full js-hide-cart"></div>

	<div class="header-cart flex-col-l p-l-65 p-r-25">
		<div class="header-cart-title flex-w flex-sb-m p-b-8">
			<span class="mtext-103 cl2">
				Daftar Belanja
			</span>

			<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
				<i class="zmdi zmdi-close"></i>
			</div>
		</div>

		<div class="header-cart-content flex-w js-pscroll">
			<ul class="header-cart-wrapitem w-full">
				<?php
				$sqltampilchart = mysqli_query($db, "SELECT * FROM tbl_cart JOIN tbl_produk ON tbl_cart.idproduk = tbl_produk.idproduk WHERE idpelanggan= '$idanggota'");
				while ($ambilcart = mysqli_fetch_array($sqltampilchart)) {
					?>
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="Admin/dist/img/<?= $ambilcart['fotoproduk'] ?>" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								<?= $ambilcart['namaproduk'] ?>
							</a>

							<span class="header-cart-item-info">
								<?= $ambilcart['jumlahbeli'] ?> x Rp <?= $ambilcart['hargaproduk'] ?>
							</span>
						</div>
					</li>
				<?php }  ?>
			</ul>

			<div class="w-full">
				<?php
				$total = mysqli_fetch_assoc(mysqli_query($db, "SELECT *,SUM(hargaproduk*jumlahbeli) AS totharga FROM tbl_cart JOIN tbl_produk ON tbl_cart.idproduk = tbl_produk.idproduk WHERE tbl_cart.idpelanggan = '$idanggota' "));  ?>
				<div class="header-cart-total w-full p-tb-40">
					Rp. <?= $total['totharga'] ?>
				</div>

				<div class="header-cart-buttons flex-w w-full">
					<a href="membercart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
						Lihat Belanja
					</a>
				</div>
			</div>
		</div>
	</div>
</div>