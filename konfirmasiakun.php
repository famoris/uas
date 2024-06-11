							
								

<?php
	include 'koneksi.php';
	if (isset($_POST['lihat'])) {
		$idproduk = $_POST['idproduk'];
		$sqldetailproduk= mysqli_query($db, "SELECT * FROM tbl_produk JOIN tbl_kategori USING (idkat) WHERE idproduk='$idproduk'");
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
					
									<?php  
									if(isset($_POST['afu'])) {

									echo "<script>alert('Anda harus Memiliki AKUN Terlebih Dahulu');</script>";
									echo "<script>location='cara-belanja.php';</script>";}
									?>


								
					
	<?php  include 'footer.php'; ?>

</body>
</html>
<?php include 'script.php';  ?>