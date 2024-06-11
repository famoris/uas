<?php
include 'koneksi.php';
if (isset($_POST['updatestattus'])) {
   $idorder = $_POST['idorder'];
   $sqlupdate = mysqli_query($db, "UPDATE `tbl_orders` SET `statusorder`='Barang Di Terima' WHERE idorder='$idorder'");
   if ($sqlupdate) {
      echo "<script>alert('Konfirmasi Diubah');</script>";
      echo "<script>location='pesanan.php';</script>";
   } else {
      echo "<script>alert('Konfirmasi Tidak Bisa Diubah');</script>";
      echo "<script>location='pesanan.php';</script>";
   }
}
