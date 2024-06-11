<!-- ----------------LIHAT PRODUK----------------- -->
<!-- Product -->
<section class="bg0 p-t-23 p-b-100">
	<div class="container">
		<div class="p-b-10">
			<h3 class="ltext-103 cl5" align="center" style="font-family: Broadway">
				Produk
			</h3>
		</div>


		<div class="row isotope-grid">
			<?php include 'koneksi.php';

			$sqlproduk = mysqli_query($db, "SELECT * FROM tbl_produk ORDER BY tglpost  DESC LIMIT 8");
			while ($ambilproduk = mysqli_fetch_array($sqlproduk)) {
				# code...
				?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item shoes">
					<!-- Block2 -->
					<div class="block1 wrap-pic-w" style="padding: 30px">
						<div class="block2-pic ">
							<img src="Admin/dist/img/<?= $ambilproduk['fotoproduk']  ?>" alt="IMG-PRODUCT" width="100px" height="200px">

						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?= $ambilproduk['namaproduk']  ?>
								</a>

								<span class="stext-105 cl3">
									Rp. <?= number_format($ambilproduk['hargaproduk'],2)  ?>
								</span>
								<div class="row" align="center">
									<div class="col-md-6">
										<a style="width:100px" href="login.php" onclick="alert('Anda harus login terlebih dahulu!');" class="btn btn-danger" role="button">
											<i class="fa fa-shopping-cart"></i> BELI
										</a>
										</a>
									</div>
									<div class="col-md-6">
										<a style="width:100px" href="login.php" onclick="alert('Anda harus login terlebih dahulu!');" class="btn btn-success" role="button">
											<i class="fa fa-eye"></i> DETAIL
										</a>
									</div>
								</div>
							</div>


						</div>
					</div>
				</div>
			<?php }  ?>
		</div>
	</div>
</section>
<!-- ----------------LIHAT PRODUK--------------------------- -->