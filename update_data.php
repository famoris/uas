<?php
include 'koneksi.php';
if (isset($_POST['simpan'])) {
   $idp = $_POST['idp'];
   $jk = $_POST['jk'];
   $nohp = $_POST['nohp'];
   $lamat = $_POST['alamat'];
   $foto = $_FILES['foto']['name'];

   $x = explode('.', $foto);
   $file_tmp = $_FILES['foto']['tmp_name'];
   move_uploaded_file($file_tmp, 'images/profil/' . $foto);

   $sqlupdate= mysqli_query($db,"UPDATE `tbl_pelanggan` SET `jenis_kelamin`='$jk',`nohp`='$nohp',`alamatanggota`='$lamat',`foto`='$foto' WHERE idpelanggan='$idp'");


  
   if ($sqlupdate) {
      echo "<script>alert('Profil Diubah');</script>";
      echo "<script>location='profil_member.php';</script>";
   } else {
      echo "<script>alert('Profil Tidak Bisa Diubah');</script>";
      echo "<script>location='profil_member.php';</script>";
   }
}
