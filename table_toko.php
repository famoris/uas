<?php 
	include "koneksi.php";
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2 align="center">FORM DATA CUSTOMER</h2>
<form action="" method="POST" enctype="multipart/form-data">
	<table align="center" border="1">
		<tr>
			<td>NAMA TOKO</td>
			<td>:<input type="text" name="nm_toko" size="30"></td>
		</tr>
		<tr>
			<td>ALAMAT</td>
			<td>:<input type="text" name="alamat" size="50"></td>
		</tr>
		<tr>
			<td>NOMOR HP</td>
			<td>:<input type="text" name="no_tlp" size="20"></td>
		</tr>
		<tr>
			<td>E-MAIL</td>
			<td>:<input type="text" name="email" size="15"></td>
		</tr>
		<tr>
			<td>NO REKENING</td>
			<td>:<input type="text" name="no_rek" size="15"></td>
		</tr>
		<tr>
			<td>password</td>
			<td>:<input type="password" name="password" size="15"></td>
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

		for ($i=0; $i <=1; $i++) { 
			# code...
		}
		$nm_toko = $_POST['nm_toko'];
		$alamat = $_POST['alamat'];
		$no_tlp = $_POST['no_tlp'];
		$email = $_POST['email'];
		$no_rek = $_POST['no_rek'];
		$password = $_POST['password'];
		$exec = mysql_query("insert into tbl_toko values ('','$nm_toko','$alamat','$no_tlp','$email','$no_rek','$password')");
		if($exec){
		echo "Data Berhasil Tersimpan !";
		}else{
		echo "Data Gagal Tersimpan ! Error = ".mysql_error();
			}
 }
 ?>