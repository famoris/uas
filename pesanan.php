<?php include 'koneksi.php';  ?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>
	<?php include 'memberheader.php';  ?><br><br><br>

	<!-- Shoping Cart -->
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-12 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">
						<table class="table table-bordered">
							<tr class="table_head">
								<th class="column-1">No</th>
								<th class="column-1">No Order</th>
								<th class="column-1">Nama Pemesan</th>
								<th class="column-3">Tanggal Pesan</th>
								<th class="column-4">Total </th>
								<th class="column-4">Status Pemesanan</th>
								<th class="column-5">Opsi</th>
								<th class="column-5">Opsi</th>
								<th class="column-5">Opsi</th>
							</tr>
							<?php
							$no = 1;
							$a = $_SESSION['idpelanggan'];
							$sql = mysqli_query($db, "SELECT * FROM `tbl_orders` JOIN `tbl_pelanggan` USING (idpelanggan) WHERE idpelanggan = '$a' ");
							while ($ambilorder = mysqli_fetch_array($sql)) {
								?>
								<tr style="text-align: center;">
									<td class="column-1"><?= $no++ ?></td>
									<td class="column-2"><?= $ambilorder['idorder']  ?></td>
									<td class="column-2"><?= $ambilorder['namalengkapanggota']  ?></td>
									<td class="column-3"><?= $ambilorder['tglorder']  ?></td>
									<td class="column-4">Rp. <?= number_format($ambilorder['total']-$ambilorder['diskon'],2)  ?></td>
									<td class="column-4"><?= $ambilorder['statusorder']  ?></td>
									<td>
										<a href="konfirmasipembayaran.php?idorder=<?= $ambilorder['idorder'] ?>" class="btn btn-sm btn-danger btn-flat"><i class="fa fa-pencil"></i> Konfirmasi Pembayaran</a>
									</td>
									<td class="column-5" style="padding-left:50px">
										<form method="POST" action="detail_pesanan.php">
											<input type="hidden" name="idorder" value="<?= $ambilorder['idorder'] ?>">
											<button name="detailorder" class="btn btn-success"><i class="fa fa-eye"></i>
												Detail Pesanan
											</button>
										</form>
									</td>
									<td>
									<form action="update_status.php" method="POST">
										<input type="hidden" name="idorder" value="<?= $ambilorder['idorder'] ?>">
										<button class="btn btn-warning" type="submit" name="updatestattus" style="margin-left: 20px"><i class="fa fa-check"></i> Pesanan Diterima</button>
									</form>
									</td>
								</tr>
							<?php }  ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
<?php include 'footer.php';
include 'script.php';  ?>