<!DOCTYPE html>
<html>

<head>
	<?php include 'head.php';  ?>
</head>

<body>
	<?php include 'header-white.php';
	date_default_timezone_set('Asia/Jakarta'); ?>
	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" method="POST" action="register_simpan.php">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-6 col-xl-6 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30" align="center">
							Silahkan Registrasi
						</h4>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30" align="center">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
								</span>
							</div>

							<div class="bor8 bg0 m-b-12">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="Username" placeholder="Username" required="required">
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
								</span>
							</div>
							<div class="bor8 bg0 m-b-12">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="password" name="Password" placeholder="Password" required="required">
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
								</span>
							</div>
							<div class="bor8 bg0 m-b-12">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="Nama" placeholder="Nama" required="required">
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
								</span>
							</div>
							<div class="bor8 bg0 m-b-12">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="email" placeholder="email" required="required">
							</div>
							<div class="bor8 bg0 m-b-12">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="hidden" name="tgldaftar" value="<?= date('Y-m-d') ?>">
							</div>
							<br><br><br>
							<button type="submit" name="daftarmember" class="btn flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
								 SIMPAN</i> 
							</button>
						</div>
					</div>
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