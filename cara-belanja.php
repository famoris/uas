<!DOCTYPE html>
<html>
<head>
	<?php include 'head.php';  ?>
</head>
<body>
	<?php include 'header-white.php';  
	date_default_timezone_set('Asia/Jakarta');?>
	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" method="POST" action="register_simpan.php">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-lg-7 col-xl-6 m-lr-auto m-b-50">
					
						<h4 class="mtext-109 cl2 p-b-30">
							Cara Melakukan Pembelian
						</h4>

						1. Silahkan  melakukan login terlebih dahulu<br>
						2. jika belum memiliki akun silahkan melakukan pendaftaran <a href="register.php" style="color: white" class="btn btn-success">Daftar</a><br>
						3. setelah login pilih produk yang anda inginkan<br>
						4. kemudian masukkan alamat pengiriman<br>
						5. lakukan pembayaran<br>
						
					
				</div>
			</div>
		</div>
	</form>
<?php include 'Footer.php';  ?>
<?php include 'script.php';  ?>
<script>
	function hanyaAngka(evt) {
	  var charCode = (evt.which) ? evt.which : event.keyCode
	   if (charCode > 31 && (charCode < 48 || charCode > 57))

	    return false;
	  return true;
	}
</script>
</body>
</html>