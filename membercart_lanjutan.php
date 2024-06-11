<!DOCTYPE html>
<html>

<head>
</head>

<body>
	<?php
	include 'memberheader.php';  ?>

	<!-- Shoping Cart -->
	<br><br>

	<div class="container">
		<div class="row">
			<?php
			$no = 1;
		
			
			$sqltampilchart = mysqli_query($db, "SELECT * FROM tbl_cart JOIN tbl_produk ON tbl_cart.idproduk = tbl_produk.idproduk WHERE idpelanggan= '$idpelanggan'");
			while ($ambilcart = mysqli_fetch_array($sqltampilchart)) {
				$total = mysqli_fetch_assoc(mysqli_query($db, "SELECT *,SUM(hargaproduk*jumlahbeli) AS totharga,sum(jumlahbeli) AS jmlbeli FROM tbl_cart JOIN tbl_produk ON tbl_cart.idproduk = tbl_produk.idproduk")); ?>
			<?php }  

			?>
			<?php 


  $diskon=0;
  $totalbayar = $total['totharga'];
  if ($totalbayar<=200000){
  $diskon=(0.05*$totalbayar);
 } else{
  ($totalbayar>=200000);
  $diskon=(0.15*$totalbayar);
}
			?>
			<div class="col-sm-12 col-lg-12 m-lr-auto m-b-50">
				<form method="POST" action="updatetotalbelanja.php">
					<input type="hidden" name="idpelanggan" value="<?php echo $_SESSION['idpelanggan'] ?>">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Total Belanja
						</h4>
						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									</br>Subtotal:
								</span>
							</div>

							<div class="size-209">
								<input type="hidden" name="totsub" id="totsub" value="<?= $total['totharga'] ?>">
								<span class="mtext-110 cl2">
									</br>Rp. <?= number_format($total['totharga'], 2) ?>
								<!-- 	</br>Rp. <?= number_format($diskon, 2) ?>
									</br>Rp. <?= number_format($total['totharga'] - $diskon,2) ?> -->
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Kota/ Kecamatan:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<div class="p-t-15">
									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="kotakirim" id="mySelect" required onChange="myFunction()">
											<option value="01" disabled="disabled" selected>Pilih Tujuan</option>
											<?php
											$a = mysqli_query($db, "SELECT * FROM tbl_kota");
											while ($kota = mysqli_fetch_array($a)) {
												?>
												<option value="<?= $kota['idkota'] ?>"><?= $kota['namakota'] ?>(<?= $kota['ongkir'] ?>)</option>
											<?php }  ?>
										</select>
										<div class="dropDownSelect2"></div>
									</div>

									<div class="bor8 bg0 m-b-12" id="hasil">
									</div>
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Alamat Lengkap:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                        		<textarea class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="alamat" placeholder="Alamat"></textarea>
							</div>
						</div>



						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total Bayar:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<input type="hidden" name="total_beli" id="total_beli" value="<?= $total['jmlbeli'] ?>" readonly>
 
								<input type="hidden" name="totfinal" id="totfinal" class="stext-111 cl8 plh3 size-111 p-lr-15" value="<?= $total['totharga'] ?>"> 
								
								<input type="hidden" name="diskon" id="diskon" class="stext-111 cl8 plh3 size-111 p-lr-15" value="<?= $diskon ?>"> 

	<input type="hidden" name="totall" id="totall" class="stext-111 cl8 plh3 size-111 p-lr-15" value="<?= $total['totharga'] - $diskon ?>"> 

								<input type="text" name="spantotfinal" id="spantotfinal" class="stext-111 cl8 plh3 size-111 p-lr-15" value="Rp. <?= number_format($total['totharga'],2) ?>" readonly>
							</div>
						</div>

						<button type="submit" name="checkout" class="btn btn-danger"><i class="fa fa-telegram"></i>
							Checkout
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php include 'footer.php';
	include 'script.php';  ?>
	<script src="js/tambahan.js"></script>
</body>

</html>
