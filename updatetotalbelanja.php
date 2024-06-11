<?php
	include 'koneksi.php';

	function ambil_kode_barang(){
    global $db;
    $kueri = "SELECT * FROM tbl_produk";
    $hasil = array();
    $output = mysqli_query($db, $kueri);
    while($data = mysqli_fetch_array($output)){
        $hasil[] = $data['idproduk'];
    }
    return $hasil;
    }
	if (isset($_POST['checkout'])) {
		if ($_POST['kotakirim']) {
			$a = date('Y-m-d-h-i-s');
			$krr = explode('-',$a);
			$idorder = implode("",$krr);
			$idpelanggan = $_POST['idpelanggan'];
			$totbayar = $_POST['totfinal'];
			$tglorg = date('Y-m-d');
			$statusorder = "Belum Konfirmasi";
			$idkota = $_POST['kotakirim'];
			$alamat   = $_POST['alamat'];
			$diskon   = $_POST['diskon'];
			$total_beli   = $_POST['total_beli'];
			$totall   = $_POST['totall'];

			$sqltambahorder = mysqli_query($db, "INSERT INTO `tbl_orders` (`idorder`, `idpelanggan`,`diskon`, `total`,`totals`,`jumlah`, `tglorder`, `statusorder`, `idkota`,`alamat_lengkap`) VALUES ('$idorder', '$idpelanggan','$diskon', '$totbayar','$totall','$total_beli', '$tglorg', '$statusorder', '$idkota','$alamat');");

			//mengamnil nilai no order
			$sqltampilorder = mysqli_query($db, "SELECT `idorder` FROM `tbl_orders` WHERE `idpelanggan`='$idpelanggan' AND `total`='$totbayar' AND `statusorder`='$statusorder' AND `idkota` ='$idkota' AND  `tglorder`='$tglorg'");
			$zz_id = mysqli_fetch_array($sqltampilorder);
			$idcartorder =  $zz_id['idorder'];


			// ambil data cart
			$sqlkeranjang = mysqli_query($db, "SELECT * FROM `tbl_cart` JOIN tbl_produk ON tbl_cart.idproduk = tbl_produk.idproduk WHERE `idpelanggan`='$idpelanggan'");
			while ($ambilnilai = mysqli_fetch_array($sqlkeranjang)) {
				$subtotal = $ambilnilai['hargaproduk']*$ambilnilai['jumlahbeli'];
				$sqltambahdetailorder = mysqli_query($db, "INSERT INTO `tbl_orderdetail`(`idorder`, `idproduk`, `jumlahbeli`, `subtotal`) VALUES ('$idcartorder','$ambilnilai[idproduk]','$ambilnilai[jumlahbeli]','$subtotal')");

				$sqlp = mysqli_query($db, "SELECT idproduk,stokproduk FROM tbl_produk WHERE idproduk='$ambilnilai[idproduk]'");
				$c_bl = mysqli_fetch_array($sqlp);
				$stk  = $c_bl['stokproduk']-$ambilnilai['jumlahbeli'];
				if ($stk < 0) {
					// echo $stk;
				}else{
					$aa = mysqli_query($db, "UPDATE tbl_produk SET stokproduk='$stk' WHERE idproduk='$ambilnilai[idproduk]'");
				}
			}
			if ($sqltambahdetailorder) {
				$hapus = mysqli_query($db, "DELETE FROM `tbl_cart` WHERE idpelanggan='$idpelanggan'");
			}
			else{
				echo "<script>alert('Data Cart Kosong');</script>";	
			}
			
			

		}
		else {
			echo "<script>alert('Isi Alamat Pengiriman');</script>";
			echo "<script>location='membercart.php';</script>";
		}
	}
	else{
		echo "gagal";

	}
	echo "<META HTTP-EQUIV='Refresh' Content='1; URL=pesanan.php'>";

?>
