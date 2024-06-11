<!DOCTYPE html>
<html>

<body>
	<?php include 'memberheader.php';  ?>


<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url(img/3.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
							</div>
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
							</div>
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="padding-top: 70px; background-image: url(img/2.webp);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
							</div>
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
							</div>
							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
							</div>
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(img/10.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">

							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
							</div>
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
							</div>
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<h2>
						Produk
					</h2>
				</div>
			</div>

			<div class="row isotope-grid">
				<?php include 'koneksi.php';

				$sqlprodukkat1 = mysqli_query($db, "SELECT * FROM tbl_produk");
				while ($ambilproduk1 = mysqli_fetch_array($sqlprodukkat1)) {
					# code...
					?>
					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
						<!-- Block2 -->
						<div class="block1 wrap-pic-w" style="padding: 30px">
							<div class="block2-pic hov-img0">
								<img src="Admin/dist/img/<?= $ambilproduk1['fotoproduk'] ?>" alt="IMG-PRODUCT" height="200px">
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										<?= $ambilproduk1['namaproduk']  ?>

									</a>
									<span class="stext-105 cl3">
										Rp <?= $ambilproduk1['hargaproduk']  ?>
									</span>
									<div class="row">
										<div class="col-md-6">
											<form method="POST" action="detail_produk.php">
												<input type="hidden" name="idproduk" value="<?= $ambilproduk1['idproduk'] ?>">
												<button type="submit" name="lihat" class="btn btn-danger" style="width: 100px">
													<i class="fa fa-shopping-cart"></i> Beli
												</button>
											</form>
										</div>
										<div class="col-md-6">
<!-- 											<td>
												<a href="?page=detail_produk&idongkir=<?= $ambilproduk1['idproduk'] ?>" class="btn btn-success"><i class="fa fa-eyes"></i>Lihat Detail</a>
											</td> -->

											<form method="POST" action="detail_produk.php">
												<input type="hidden" name="idproduk" value="<?= $ambilproduk1['idproduk'] ?>">
												<button type="submit" name="lihat" class="btn btn-success" style="width: 100px">
													<i class="fa fa-eye"></i> Lihat
												</button>
											</form>
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

</body>

</html>
<?php include 'script.php';  ?>