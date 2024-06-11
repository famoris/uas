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
			<div class="col-lg-12 col-xl-12 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">
						<table class="table table-bordered">
							<tr class="table_head">
								<th class="column-1">No</th>
								<th class="column-2">Foto Produk</th>
								<th class="column-3">Nama Produk </th>
								<th class="column-4">Harga</th>
								<th class="column-5">Jumlah</th>
								<th class="column-6">Total</th>
								<th class="column-7">Aksi</th>
							</tr>

							<?php
							$no = 1;
							$sqltampilchart = mysqli_query($db, "SELECT * FROM tbl_cart JOIN tbl_produk ON tbl_cart.idproduk = tbl_produk.idproduk WHERE idpelanggan= '$idpelanggan'");
							while ($ambilcart = mysqli_fetch_array($sqltampilchart)) {
								$total = mysqli_fetch_assoc(mysqli_query($db, "SELECT *,SUM(hargaproduk*jumlahbeli) AS totharga FROM tbl_cart JOIN tbl_produk ON tbl_cart.idproduk = tbl_produk.idproduk")); ?>

								<tr class="table_row">
									<td class="column-1"><?= $no++ ?></td>
									<td class="column-2">
										<div class="how-itemcart1">
											<img src="Admin/dist/img/<?= $ambilcart['fotoproduk'] ?>" alt="IMG">
										</div>
									</td>

									<td class="column-3"><?= $ambilcart['namaproduk'] ?></td>
									<td class="column-4">Rp. <?= $ambilcart['hargaproduk'] ?></td>
									<td class="column-5"><?= $ambilcart['jumlahbeli'] ?></td>
									<td class="column-6">Rp. <?= $ambilcart['jumlahbeli'] * $ambilcart['hargaproduk'] ?></td>
									<td class="column-7">
										<form method="POST" action="hapuscart.php">
											<input type="hidden" name="idkeranjang" value="<?= $ambilcart['idcart'] ?>">
											<button type="submit" name="hapuskeranjang" class="btn btn-danger"> <i class="fa fa-trash"></i>

											</button>
										</form>
									</td>
								</tr>
							<?php }  ?>
						</table>
					</div>

					<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
						<a href="homemember.php" class="btn btn-success"> <i class="fa fa-shopping-cart"></i>
							+ Belanja
						</a>
						<a href="membercart_lanjutan.php" class="btn btn-danger"><i class="fa fa-arrow-right"></i>
							Lanjutkan
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'footer.php';
	include 'script.php';  ?>
	<script src="js/tambahan.js"></script>
</body>

</html>