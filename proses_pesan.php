<?php
    include 'koneksi.php';

    if(isset($_POST)){
         
            $id_pelanggan = $_POST['id_pelanggan'];
            $id_produk = $_POST['id_produk'];
            $chatku = $_POST['chatku'];
            
          



                $input = $db->query("INSERT INTO `tbl_chat_pelanggan`(`id_pelanggan`, `id_produk`, `chat`) VALUES  ('$id_pelanggan','$id_produk','$chatku')");
        
      
        echo "<script>alert('Pesan Terkirim');</script>";
      echo "<script>location='produk.php';</script>";
            
    }?>





