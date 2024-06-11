<?php
include 'koneksi.php';
//ambil id dari query string
$id = $_GET['id_js'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM tbl_kota WHERE  idkota=$id";

$query = mysqli_query($db, $sql);
$result = array();
  while($row = mysqli_fetch_array($query)){

    array_push($result, 
    	array(
    		'idkota'=>$row[0], 
    		'ongkir'=>$row[2]    		
    		));
  }
  echo json_encode(array($result));
  mysqli_close($db);
  ?>