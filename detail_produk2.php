<?php
	include 'koneksi.php';
	if (isset($_POST['lihat'])) {
		$idproduk = $_POST['idproduk'];
		$sqldetailproduk= mysqli_query($db, "SELECT * FROM tbl_produk WHERE idproduk='$idproduk'");
		$ambilproduk = mysqli_fetch_array($sqldetailproduk);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'head2.php';  ?>
</head>
<body>
	<?php include 'header.php';  ?>

		<!-- breadcrumb -->
	<div class="container " style="padding-top: 150px;">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="produkproduk.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
			<span class="stext-109 cl4">
				Lihat Produk
			</span>
		</div>
	</div>

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="">
								<div class="item-slick3" data-thumb="Admin/dist/img/<?= $ambilproduk['fotoproduk']  ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="Admin/dist/img/<?= $ambilproduk['fotoproduk']  ?>" alt="IMG-PRODUCT"  width="10%">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<form method="POST" action="konfirmasiakun.php">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?= $ambilproduk['namaproduk']  ?>
						</h4>
						<input type="hidden" name="idproduk" value="<?= $ambilproduk['idproduk']  ?>">
						<span class="mtext-106 cl2">
							Rp. <?= $ambilproduk['hargaproduk']  ?>
						</span>
				
						<!--  -->
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>
									<button type="submit" name="afu" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 ">
										Tambah ke Keranjang
									</button>

								</div>
							</div>	
							</form>
								
							
							


						</div>

						
					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Deskripsi</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#information" role="tab">Informasi Tambahan</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									<?= $ambilproduk['ketproduk']  ?>
								</p>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="information" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<ul class="p-lr-28 p-lr-15-sm">
										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Nama
											</span>

											<span class="stext-102 cl6 size-206">
												<?= $ambilproduk['namaproduk']  ?>
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Harga
											</span>

											<span class="stext-102 cl6 size-206">
												<?= $ambilproduk['hargaproduk']  ?>
											</span>
										</li>
										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Berat
											</span>

											<span class="stext-102 cl6 size-206">
												<?= $ambilproduk['berat']  ?> Kg
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Stok 
											</span>

											<span class="stext-102 cl6 size-206">
												<?= $ambilproduk['stokproduk']  ?>
											</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php  include 'footer.php'; ?>

</body>
</html>
<?php include 'script.php';  ?>