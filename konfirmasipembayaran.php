<!DOCTYPE html>
<html>

<head>
	<?php include 'head.php'; 
		  include 'tglindo.php';
	 ?>
</head>

<body>
	<?php include 'memberheader.php';  ?>

<?php
include 'koneksi.php';
$id = $_GET['idorder'];
$ambildata = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM tbl_orders  LEFT JOIN tbl_pelanggan  ON tbl_orders.idpelanggan=tbl_pelanggan.idpelanggan WHERE tbl_orders.idorder='$id'"));
?>
	<!-- Shoping Cart -->
	<div class="container">
		<div class="row">
<!-- 			<div class="col-md-6">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<h4 class="mtext-109 cl2 p-b-30">
						Konfirmasi
					</h4>
				</div>
			</div> -->
			<div class="col-md-12">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<form class="bg0 p-t-75 p-b-85" method="POST" action="tambah_konfirmasi.php" enctype="multipart/form-data">
						<h4 class="mtext-109 cl2 p-b-30">
							Konfirmasi Pembayaran
						</h4>
						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Atas Nama :
								</span>
							</div>
							<div class="size-208 w-full-ssm">
								<input class="stext-110 cl2" id="namaorder" value="<?php echo $ambildata['namalengkapanggota']; ?>">
								<input class="stext-110 cl2" id="idorder" type="hidden" name="idorder" value="<?php echo $id; ?>">
									
								</input>
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Tanggal Order
								</span>
							</div>
							<div class="size-208 w-full-ssm">
								<input class="stext-110 cl2" id="tglorder" value="<?php echo TanggalIndo($ambildata['tglorder']); ?>">
									
								</input>
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Total
								</span>
							</div>
							<div class="size-208 w-full-ssm">
								<input class="stext-110 cl2" id="totalbelanja" value="Rp. <?php echo number_format($ambildata['total']-$ambildata['diskon'],2); ?>">
								</input>
							</div>
						</div>
						<h4 class="mtext-109 cl2 p-b-30">
							<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="hidden" name="idOrder" id="idOrder"  value="<?php echo $ambildata['idorder']; ?>" placeholder="email user">
						</h4>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									 Bank Pengirim
								</span>
							</div>
							<div class="bor8 bg0 m-b-12 col-lg-7">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="bankKirim" placeholder=".......">
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									No Rekening
								</span>
							</div>
							<div class="bor8 bg0 m-b-12 col-lg-7">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="noRek" placeholder=".......">
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Atas Nama
								</span>
							</div>
							<div class="bor8 bg0 m-b-12 col-lg-7">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="pengirim" placeholder=".......">
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Tanggal Pengiriman
								</span>
							</div>
							<div class="bor8 bg0 m-b-12 col-lg-7">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="date" name="tanggalkirim">
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Jumlah Transfer
								</span>
							</div>
							<div class="bor8 bg0 m-b-12 col-lg-7">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="jmltf" placeholder=".......">
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									No Rekening Tujuan
								</span>
							</div>
							<div class="bor8 bg0 m-b-12 col-lg-7">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="rekpenerima" placeholder=".......">
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Bukti Pengiriman
								</span>
							</div>
							<div class="size-208 w-full-ssm">
								<input class="form control" type="file" name="foto" placeholder="email user">
								<p style="color:red;">Max Ukuran 1MB</p>
							</div>
							<div class="size-208 w-full-ssm">
								<button class="btn  btn-danger"><i class="fa fa-send"></i>
									Kirim
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php include 'Footer.php';  ?>
	<?php include 'script.php';  ?>
	<script src="js/konfirmasi.js"></script>
</body>

</html>