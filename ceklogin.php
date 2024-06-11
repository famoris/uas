
<!DOCTYPE html>
<html>
<head>
	<?php
	session_start();
    include 'head.php';  ?>
</head>
<body>
	<?php include 'header-white.php';  ?>


<?php
include 'koneksi.php'; 

if(isset($_POST['login']))
 {

	$email = $_POST['email'];
	$password = $_POST['Password'];
	$query =  "SELECT * FROM tbl_pelanggan WHERE email='$email' AND password='$password'";
	$apa = mysqli_query($db, $query);
 	if ($apa->num_rows > 0) {
 		$r = mysqli_fetch_assoc($apa);	
	 	
	 	$role = "anggota";
		$_SESSION['idpelanggan'] = $r['idpelanggan'];
 		$_SESSION['namalengkapanggota'] = $r['namalengkapanggota'];
 		$_SESSION['role'] = $role;
		
		echo "<script>location='homemember.php';</script>";
		die();
	 }
	 else{
	 	echo "<script>alert('Username / Password Tidak Valid');</script>";
		echo "<script>location='login.php';</script>";
	 }
	
}
else{
	echo "Akses Dilarang";
}?>




<?php include 'Footer.php';  ?>
<?php include 'script.php';  ?>
</body>
</html>
