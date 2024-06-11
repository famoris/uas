<?php
include 'koneksi.php';
$id = $_POST['idkeranjang'];
if (isset($_POST['hapuskeranjang'])) {
	$deletecart = mysqli_query($db, "DELETE FROM tbl_cart WHERE idcart='$id'");
	if ($deletecart) {
		echo "<script>alert('Data Berhasil Dihapus');</script>";
		echo "<script>location='membercart.php';</script>";
	}
	else {
		echo "<script>alert('Data gagal Dihapus');</script>";
		echo "<script>location='membercart.php';</script>";
	}
}

  ?>