<?php include 'koneksi.php'; 
	  include 'tglindo.php';
 ?>
<?php
if (isset($_POST['idorder'])) {
	$idorder = $_POST['idorder'];
}
$sqlorder = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM `tbl_orders` JOIN tbl_kota USING (idkota) WHERE idorder = '$idorder'"));
?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>
	<?php include 'memberheader.php';  ?>

	<!-- Shoping Cart -->
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-12 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<div class="wrap-table-shopping-cart" style="margin-top: 30px">
						<table class="table-shopping-cart">


							<tr class="table_head" style="border: 0px">
								<th style="padding-left: 10px">No Pesanan</th>
								<th colspan="5" class="column-1" style="text-align: left;">: <?= $sqlorder['idorder']  ?></th>
							</tr>
							<tr class="table_head" style="border: 0px">
								<th style="padding-left: 10px">Tanggal Order</th>
								<th colspan="5" class="column-1" style="text-align: left;">: <?= TanggalIndo($sqlorder['tglorder'])  ?></th>
							</tr>
							<tr class="table_head">
								<th class="column-1">No</th>
								<th class="column-1">FOTO BARANG</th>
								<th class="column-2">NAMA BARANG</th>
								<th class="column-3">JUMLAH</th>
								<th class="column-4">HARGA</th>
								<th class="column-5">SUB TOTAL</th>
							</tr>

							<?php
							$no=1;
							$total=1;
							$sqldetail = mysqli_query($db, "SELECT * FROM `tbl_orderdetail` JOIN `tbl_produk` ON tbl_orderdetail.idproduk = tbl_produk.idproduk WHERE idorder = '$idorder'");
							while ($tangkapdetail = mysqli_fetch_array($sqldetail)) {
								?>
								<tr class="table_row">
									<td class="column-1"><?= $no++ ?></td>
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="Admin/dist/img/<?= $tangkapdetail['fotoproduk'] ?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?= $tangkapdetail['namaproduk'] ?></td>
									<td class="column-3"><?= $tangkapdetail['jumlahbeli'] ?></td>
									<td class="column-4">Rp. <?= number_format($tangkapdetail['hargaproduk'],2) ?></td>
									<td class="column-5">Rp. <?= $tangkapdetail['hargaproduk'] * $tangkapdetail['jumlahbeli'] ?></td>
								</tr>
								<?=  $totall = $tangkapdetail['hargaproduk'] * $tangkapdetail['jumlahbeli']?>
								
							<?php }  ?>
							<tr class="table_head">
								<th colspan="5" style="text-align: right;">TOTAL</th>
								<th class="column-1" style="text-align: center;">Rp. <?= number_format($totall,2)  ?></th>
							</tr>
							<tr class="table_head">
								<th colspan="5" style="text-align: right;">DISKON</th>
								<th class="column-1" style="text-align: center;">Rp. <?= number_format($sqlorder['diskon'],2)  ?></th>
							</tr>
							<tr class="table_head">
								<th colspan="5" style="text-align: right;">ONGKOS KIRIM</th>
								<th class="column-1" style="text-align: center;">Rp. <?= number_format($sqlorder['ongkir'],2)  ?></th>
							</tr>
							<tr class="table_head">
								<th colspan="5" style="text-align: right;">TOTAL BAYAR</th>
								<th class="column-1" style="text-align: center;">Rp. <?= number_format($sqlorder['total']-$sqlorder['diskon'],2)  ?></th>
							</tr>
						</table>
					</div>
					<div style="margin-top: 10px" align="left">
						<a href="cetakstruk.php?id=<?= $sqlorder['idorder']  ?>" class="btn btn-danger" style="margin-left: 10px" target="_blank"><i class="fa fa-print"></i> Cetak Struk</a>

					</div>
				</div>
			</div>
		</div>
	</div>


</body>

</html>
<?php include 'script.php';
include 'footer.php';  ?>