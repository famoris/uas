<!DOCTYPE html>
<html lang="en">

<head>
	<?php include 'head.php';  ?>
</head>

<body class="animsition">
	<?php include 'header-white.php';  ?>

	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<h2 style="font-family: Broadway">
						Produk
					</h2>
				</div>
			</div>

			<div class="row isotope-grid">
				<?php include 'koneksi.php';

				$sqlprodukkat1 = mysqli_query($db, "SELECT * FROM tbl_produk ORDER BY tglpost  DESC LIMIT 12");
				while ($ambilproduk1 = mysqli_fetch_array($sqlprodukkat1)) {
					# code...
					?>
					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
						<!-- Block2 -->
						<div class="block1 wrap-pic-w" style="padding: 30px">
							<div class="block2-pic hov-img0">
								<img src="Admin/dist/img/<?= $ambilproduk1['fotoproduk'] ?>" alt="IMG-PRODUCT" height="250px">
								<form method="POST" action="detail_produk2.php">
									<input type="hidden" name="idproduk" value="<?= $ambilproduk1['idproduk'] ?>">
								</form>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										<?= $ambilproduk1['namaproduk']  ?>
									</a>

									<span class="stext-105 cl3">
										Rp. <?= number_format($ambilproduk1['hargaproduk'],2)  ?>
									</span>
									<div class="row" align="center">
										<div class="col-md-6">
											<a style="width:100px" href="login.php" onclick="alert('Anda harus login terlebih dahulu!');" class="btn btn-danger" role="button">
												<i></i> BELI
											</a>
											</a>
										</div>
										<div class="col-md-6">
											<a style="width:100px" href="login.php" onclick="alert('Anda harus login terlebih dahulu!');" class="btn btn-success" role="button">
												<i></i> DETAIL
											</a>
										</div>
									</div>
								</div>


							</div>
						</div>
					</div>
				<?php } ?>

			</div>
		</div>
	</div>


	<!-- Footer -->
	<?php include 'Footer.php';  ?>
	<!-- end Footer -->



	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>


	<?php include 'script.php';  ?>
</body>

</html>