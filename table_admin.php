<?php 
	include "koneksi.php";
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2 align="center">FORM DATA BARANG</h2>
<form action="" method="POST" enctype="multipart/form-data">
	<table align="center" border="1">
		<tr>
			<td>nama admin</td>
			<td>:<input type="text" name="nama" size="10"></td>
		</tr>
		<tr>
			<td>password</td>
			<td>:<input type="password" name="password" size="50"></td>
		</tr>
		<tr>
			<td>email</td>
			<td>:<input type="text" name="email" size="20"></td>
		</tr>
		<tr>
			<td>Nomor rek</td>
			<td>:<input type="text" name="no_rek" size="15"></td>
		</tr>
		<td>
			<button type="submit" name="simpan" >SIMPAN</button>
			<button type="reset" name ="hapus">RESET</button>
		</td>
	</table>
</form>
</body>
</html>


<?php 
	if(isset($_POST['simpan'])){

		for ($i=0; $i<=1; $i++) { 
			# code...
		}
		$nama = $_POST['nama'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$no_rek = $_POST['no_rek'];
		$exec = mysql_query("insert into tbl_admin values ('$i','$nama','$password','$email','$no_rek')");
		if($exec){
		echo "Data Berhasil Tersimpan !";
		}else{
		echo "Data Gagal Tersimpan ! Error = ".mysql_error();
			}
 }
 ?>