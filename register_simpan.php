<?php
include 'koneksi.php';
if (isset($_POST['daftarmember'])) {
	$Username = $_POST['Username'];
	$Password = $_POST["Password"];
	$Nama = $_POST['Nama'];
	$eamil = $_POST["email"];
	$tgldaftar = $_POST['tgldaftar'];
	# code...

	$sqlmember = mysqli_query($db, "INSERT INTO tbl_pelanggan(username, password,namalengkapanggota,jenis_kelamin, email , nohp,alamatanggota, tgldaftar,foto) 
		VALUES ('$Username','$Password','$Nama','-','$eamil','-','-','$tgldaftar','-')");

	if ($sqlmember) {
		echo "<script>alert('Berhasil Ditambahkan');</script>";
		echo "<script>location='login.php';</script>";
	} else {
		echo "<script>alert('gagal Ditambahkan');</script>";
		echo "<script>location='register.php';</script>";
	}
}
