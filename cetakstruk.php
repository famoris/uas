<?php
include 'koneksi.php';
include 'tglindo.php';

	$id = $_GET['id'];
	$sqlorder = mysqli_fetch_array(mysqli_query($db,"SELECT * FROM `tbl_orders` JOIN tbl_kota USING (idkota) JOIN `tbl_pelanggan` USING (idpelanggan) WHERE idorder = '$id'"));
?>

<body onLoad="window.print()">
 <center>Pace Store<br>Jln.Padang-painan kampung Lubuk Kumpai, Kenagarian 
Pasar Baru, Kec Bayang, Kab Pesisir Selatan<br>Prov. Sumatera Barat
<hr>
<center>FAKTUR PEMBELIAN</center>
<br>
<table width="80%" border="0" align="center">
  <tr>
    <td width="19%">NOMOR TRANSAKSI </td>
    <td width="41%">: <?= $sqlorder['idorder']  ?></td>
  </tr>
  <tr>
    <td width="19%">TANGGAL </td>
    <td width="41%">: <?= TanggalIndo($sqlorder['tglorder'])  ?></td>
  </tr>
  <tr>
    <td width="19%">NAMA PELANGGAN</td>
    <td width="41%">: <?= $sqlorder['namalengkapanggota']  ?></td>
  </tr>
  <tr>
    <td width="19%">ALAMAT PELANGGAN</td>
    <td width="41%">: <?= $sqlorder['alamatanggota']  ?></td>
  </tr>
  <tr>
    <td width="19%">NO TELP</td>
    <td width="41%">: <?= $sqlorder['nohp']  ?></td>
  </tr>
</table>
<table width="80%" border="1" align="center" cellpadding="3" cellspacing="0">
  <tr>
    <td width="5%"><div align="center">NO</div></td>
    <td width="16%"><div align="center">NAMA BARANG</div></td>
    <td width="26%"><div align="center">HARGA</div></td>
    <td width="5%"><div align="center">JUMLAH</div></td>
    <td width="19%"><div align="center">SUB TOTAL</div></td>
  </tr>
  <?php
  $no = 1;
    $sqldetail = mysqli_query($db, "SELECT * FROM `tbl_orderdetail` JOIN `tbl_produk` ON tbl_orderdetail.idproduk = tbl_produk.idproduk WHERE idorder = '$id'");
    while ($tangkapdetail = mysqli_fetch_array($sqldetail)) {
  ?>
  <tr>
    <td><?= $no++  ?></td>
    <td><?= $tangkapdetail['namaproduk'] ?></td>
    <td>Rp. <?= number_format($tangkapdetail['hargaproduk'],2) ?></td>
        <td><?= $tangkapdetail['jumlahbeli'] ?></td>
    <td>Rp. <?= number_format($tangkapdetail['subtotal'],2) ?></td>
  </tr>
  <!-- $total=$total+ <?=$tangkapdetail['subtotal'] ?>; -->
<?php }  ?>
  <tr>
    <td colspan="4"><div align=""> TOTAL </div></td>
    <?php
    $j = mysqli_query($db, "SELECT SUM(subtotal) AS total FROM `tbl_orderdetail` WHERE idorder='$id'");
    $jml = mysqli_fetch_array($j);
    $jmlc = $jml['total'];
    ?>
    <td>Rp. <?= number_format($jmlc,2) ?></td>
  </tr>
    <tr>
    <td colspan="4"><div align="">DISKON</div></td>
    <td>Rp. <?= number_format($sqlorder['diskon'],2)  ?></td>
  </tr>
  <tr>
    <td colspan="4"><div align="">ONGKOS KIRIM</div></td>
    <td>Rp. <?= number_format($sqlorder['ongkir'],2)  ?></td>
  </tr>
  <tr>
    <td colspan="4"><div align="">TOTAL </div></td>
    <td>Rp. <?= number_format($sqlorder['total']-$sqlorder['diskon'],2)  ?></td>
  </tr>
</table>
<table width=80% align="center">
  <tr>
    <td colspan="2"></td>
    <td width="286"></td>
  </tr>
  <tr>
    <td width="230" align="center"> <br> 
   </td>
    <td width="530"></td>
	
    <td align="center"><?php  
      $bulan = array(
                '01' => 'JANUARI',
                '02' => 'FEBRUARI',
                '03' => 'MARET',
                '04' => 'APRIL',
                '05' => 'MEI',
                '06' => 'JUNI',
                '07' => 'JULI',
                '08' => 'AGUSTUS',
                '09' => 'SEPTEMBER',
                '10' => 'OKTOBER',
                '11' => 'NOVEMBER',
                '12' => 'DESEMBER',
        );
    ?>

    Pasar Baru, <?php echo date('d').' '.(strtolower($bulan[date('m')])).' '.date('Y') ?></td>
  </tr>
  <tr>
    <td align="center"><br /><br /><br /><br /><br />
     <br /><br /><br /></td>
    <td>&nbsp;</td>
    <td align="center" valign="top"><br /><br /><br /><br /><br />
      ( ...................... )<br />
    </td>
  </tr>
  
  
</table>
</body>