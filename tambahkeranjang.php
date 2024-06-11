<?php
include 'koneksi.php';
$idproduk = $_POST['idproduk'];
$jumlah = $_POST['jumlah'];
// $cek = mysqli_fetch_array(mysqli_query($db, "SELECT * FROM tbl_produk"));
// $cek_stok = $cek['stokproduk'];
// if ($jumlah > $cek_stok) {
// 	echo "<script>alert('Maaf Stok Tidak Cukup');</script>";
// 	echo "<script>location='detail_produk.php?id=" . $idproduk . "';</script>";
// } else {

	date_default_timezone_set('Asia/Jakarta');
	$idpelanggan = $_POST['idpelanggan'];
	$tanggalcart = date('Y-m-d h:i:s');

	$sqltambahcart = mysqli_query($db, "INSERT INTO tbl_cart(idproduk,idpelanggan,jumlahbeli, tglcart) VALUES ('$idproduk','$idpelanggan','$jumlah','$tanggalcart')");

	if ($sqltambahcart) {

		echo "<script>location='membercart.php';</script>";
	} else {
		echo "<script>alert('produk Tidak Bisa Ditambahkan');</script>";
		echo "<script>location='homemember.php';</script>";
	}
