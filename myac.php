<?php
	include 'koneksi.php';
    $idanggota = $_SESSION['idanggota'];

    //jika tidak ada session/session kosong, maka user akan di arahkan ke halaman login
    if (empty($_SESSION['idanggota'])) {
        header("Location:login.php");
    }
    if($_SESSION['role']!= "anggota"){
       
        header("Location:login.php");
    }
?>

<head>
	<?php 
	include 'head.php';   ?>

</head>
<body>
	<?php include 'memberheader.php';  ?>

<?php
	
$sqldata = mysqli_query($db,"SELECT * FROM `tbl_anggota` WHERE idanggota ='$_GET[idanggota]'");

$tampildata=mysqli_fetch_array($sqldata);
?>

			<form class="bg0 p-t-75 p-b-85" method="POST" action="" enctype="multipart/form-data">
			<div class="row">
				<div class="col-sm-10 col-lg-7 col-xl-10 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Konfirmasi Pembayaran
						</h4>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Atas Nama : <?php echo "$tampildata[jk]"; ?>
								</span>
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2" id="namaorder" value="<?= $tampildata['namalengkapanggota'] ?>">
									
								</span>
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Tanggal Order
								</span>
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2" id="tglorder">
									-
								</span>
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Total Pembayaran
								</span>
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2" id="totalbelanja">
									-
								</span>
							</div>
						</div>
						<h4 class="mtext-109 cl2 p-b-30">
							Masukkan Data Pembayaran
							<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="hidden" name="idOrder" id="idOrder" placeholder="email user">
						</h4>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Nama Bank Pengirim
								</span>
							</div>
							<div class="bor8 bg0 m-b-12 col-lg-7">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="bankKirim" placeholder="......." >
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									No Rek
								</span>
							</div>
							<div class="bor8 bg0 m-b-12 col-lg-7">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="noRek" placeholder="......." >
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Atas Nama
								</span>
							</div>
							<div class="bor8 bg0 m-b-12 col-lg-7">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="pengirim" placeholder="......." >
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Tanggal Pengiriman
								</span>
							</div>
							<div class="bor8 bg0 m-b-12 col-lg-7">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="date" name="tanggalkirim" >
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Jumlah Transfer
								</span>
							</div>
							<div class="bor8 bg0 m-b-12 col-lg-7">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="jmltf" placeholder="......." >
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Dikirim ke Rekening
								</span>
							</div>
							<div class="bor8 bg0 m-b-12 col-lg-7">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="rekpenerima" placeholder="......." >
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Bukti Pengiriman
								</span>
							</div>
							<div class="size-208 w-full-ssm">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="file" name="foto" placeholder="email user" >
							</div>
							<div class="size-208 w-full-ssm">
								<button class="btn  stext-101 cl0 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
								Simpan Data Pengiriman
								</button>
							</div></div>
					</div>
				</div>
			</div>
		</div>
	</form>
<?php include 'Footer.php';  ?>
<?php include 'script.php';  ?>
<script src="js/konfirmasi.js"></script>
</body>
</html>