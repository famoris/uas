<?php
include 'koneksi.php';
if (empty($_POST['idOrder'])) {
	echo "<script>alert('Silahkan Masukkan No Order');</script>";
	echo "<script>location='konfirmasipembayaran.php';</script>";
} else {
	$idOrder = $_POST['idOrder'];
	$bankKirim = $_POST['bankKirim'];
	$noRek = $_POST['noRek'];
	$pengirim = $_POST['pengirim'];
	$tanggalkirim = $_POST['tanggalkirim'];
	$jmltf = $_POST['jmltf'];
	$rekpenerima = $_POST['rekpenerima'];
	$foto = $_FILES['foto']['name'];

	$x = explode('.', $foto);
	$file_tmp = $_FILES['foto']['tmp_name'];
	move_uploaded_file($file_tmp, 'Admin/dist/faktur/' . $foto);

	$sqltambahkonfirmasi = mysqli_query($db, "INSERT INTO `tbl_konfirmasi_pembayaran`( `idorder`, `bankpengirim`, `namapengirim`, `nominal`, `tgltransfer`, `bankpenerima`, `bukti`) VALUES ('$idOrder','$bankKirim','$pengirim','$jmltf','$tanggalkirim','$rekpenerima','$foto')");
	if ($sqltambahkonfirmasi) {
		$cariorder = mysqli_query($db, "UPDATE `tbl_orders` SET `statusorder`='Menunggu Konfirmasi' WHERE `idorder`='$idOrder'");

		echo "<script>alert('Konfirmasi Pembayaran Berhasil');</script>";
		echo "<script>location='pesanan.php';</script>";
	} else {
		echo "<script>alert('Konfirmasi Pembayaran gagal');</script>";
		echo "<script>location='konfirmasipembayaran.php';</script>";
	}
}
