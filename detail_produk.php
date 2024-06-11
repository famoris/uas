 <script type="text/javascript">
    function cek_stok(input) {
        stk = document.frmBeli.stok.value;
        jml = document.frmBeli.jumlah.value;
        var num = input.value;
        var stok = eval(stk);
        var jumlah = eval(jml);
        if(stok < jumlah){
            alert('Jumlah Stok Tidak Memenuhi, Kurangi Jumlah Beli');
            input.value = input.value.substring(0,input.value.length-1);
        }
    }
</script>
<?php
include 'koneksi.php';
if (isset($_POST['lihat'])) {
	$idproduk = $_POST['idproduk'];
	$sqldetailproduk = mysqli_query($db, "SELECT * FROM tbl_produk WHERE idproduk='$idproduk'");
	$ambilproduk = mysqli_fetch_array($sqldetailproduk);
} else {
	$idproduk = $_GET['id'];
	$sqldetailproduk = mysqli_query($db, "SELECT * FROM `tbl_produk` WHERE idproduk='$idproduk'");
	$ambilproduk = mysqli_fetch_array($sqldetailproduk);
}
?>
<!DOCTYPE html>
<html>

<head>
	<?php include 'head.php';  ?>
</head>

<body>
	<?php include 'memberheader.php';  ?>

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="homemember.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
			<span class="stext-109 cl4">
				Keranjang produk
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
										<img style="height:230px;witdh:200px" src="Admin/dist/img/<?= $ambilproduk['fotoproduk']  ?>" alt="IMG-PRODUCT">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<form method="POST" action="tambahkeranjang.php" name="frmBeli">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								<?= $ambilproduk['namaproduk']  ?>
							</h4>
							<input type="hidden" name="idproduk" value="<?= $ambilproduk['idproduk']  ?>">
							<input type="hidden" name="idpelanggan" value="<?php echo $_SESSION['idpelanggan']  ?>">
							<input type="hidden" name="stok" value="<?= $ambilproduk['stokproduk']  ?>">

							<span class="mtext-106 cl2">
								Rp. <?= $ambilproduk['hargaproduk']  ?> <br>Jumlah Stok : <?= $ambilproduk['stokproduk']  ?>
							</span>
							<!--  -->
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="jumlah" value="1" onkeyup="cek_stok(this)">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<button type="submit" name="tambahkeranjang" class="btn btn-success"><i class="fa fa-telegram"></i>
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
						<a class="nav-link" data-toggle="tab" href="#information" role="tab">Deskripsi Produk</a>
					</li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content p-t-43">
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


	<!-- Related Products -->
	<div align="center" style="margin-bottom:5%">
		<h1>Produk Lainnya</h1>
	</div>

	<!-- Slide2 -->
	<div class="wrap-slick2">
		<div class="slick2">
			<?php include 'koneksi.php';

			$sqlprodukkat1 = mysqli_query($db, "SELECT * FROM tbl_produk ORDER BY tglpost  DESC LIMIT 4");
			while ($ambilproduk1 = mysqli_fetch_array($sqlprodukkat1)) {
				# code...
				?>
				<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15" style="margin-left: 10px;margin-right:10px ">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img style="height: 250px;width: 270px" src="Admin/dist/img/<?= $ambilproduk1['fotoproduk'] ?>" alt="IMG-PRODUCT">
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l">
								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?= $ambilproduk1['namaproduk']  ?>
								</a>

								<span class="stext-105 cl3">
									Rp <?= $ambilproduk1['hargaproduk']  ?>
								</span>
								<div class="row" align="center">
									<div class="col-md-6">
										<form method="POST" action="detail_produk.php">
											<input type="hidden" name="idproduk" value="<?= $ambilproduk1['idproduk'] ?>">
											<button type="submit" name="lihat" class="btn btn-danger" style="width: 100px">
												<i class="fa fa-shopping-cart"></i> Beli
											</button>
										</form>
									</div>
									<div class="col-md-6">

										<form method="POST" action="detail_produk.php">
											<input type="hidden" name="idproduk" value="<?= $ambilproduk1['idproduk'] ?>">
											<button type="submit" name="lihat" class="btn btn-success" style="width: 100px">
												<i class="fa fa-eye"></i> Lihat
											</button>
										</form>
									</div>
								</div>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3" style="margin-bottom: 40%">
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	<?php include 'footer.php'; ?>

</body>

</html>
<?php include 'script.php';  ?>