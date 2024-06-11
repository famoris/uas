 <script type="text/javascript">
    function cek_stok(input) {
        stk = document.frmBeli.stok.value;
        jml = document.frmBeli.jumlah.value;
        var num = input.value;
        var stok = eval(stk);
        var jumlah = eval(jml);
        if(stok < jumlah){
            alert('Jumlah Stok Tidak Memenuhi, Kurangi Jumlah Beli');
            input.value = input.value.substring(0,input.value.length-1);
        }
    }
</script>
<?php
include 'koneksi.php';
if (isset($_POST['lihat'])) {
	$idproduk = $_POST['idproduk'];
	$sqldetailproduk = mysqli_query($db, "SELECT * FROM tbl_produk WHERE idproduk='$idproduk'");
	$ambilproduk = mysqli_fetch_array($sqldetailproduk);
} else {
	$idproduk = $_GET['id'];
	$sqldetailproduk = mysqli_query($db, "SELECT * FROM `tbl_produk` WHERE idproduk='$idproduk'");
	$ambilproduk = mysqli_fetch_array($sqldetailproduk);
}
?>
<!DOCTYPE html>
<html>

<head>
	<?php include 'head.php';  ?>
</head>

<body>
	<?php include 'memberheader.php';  ?>

	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="homemember.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
			<span class="stext-109 cl4">
				Keranjang produk
			</span>
		</div>
	</div>

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="">
								<div class="item-slick3" data-thumb="Admin/dist/img/<?= $ambilproduk['fotoproduk']  ?>">
									<div class="wrap-pic-w pos-relative">
										<img style="height:230px;witdh:200px" src="Admin/dist/img/<?= $ambilproduk['fotoproduk']  ?>" alt="IMG-PRODUCT">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<form method="POST" action="tambahkeranjang.php" name="frmBeli">
							<h4 class="mtext-105 cl2 js-name-detail p-b-14">
								<?= $ambilproduk['namaproduk']  ?>
							</h4>
							<input type="hidden" name="idproduk" value="<?= $ambilproduk['idproduk']  ?>">
							<input type="hidden" name="idpelanggan" value="<?php echo $_SESSION['idpelanggan']  ?>">
							<input type="hidden" name="stok" value="<?= $ambilproduk['stokproduk']  ?>">

							<span class="mtext-106 cl2">
								Rp. <?= $ambilproduk['hargaproduk']  ?> <br>Jumlah Stok : <?= $ambilproduk['stokproduk']  ?>
							</span>
							<!--  -->
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="jumlah" value="1" onkeyup="cek_stok(this)">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<button type="submit" name="tambahkeranjang" class="btn btn-success"><i class="fa fa-telegram"></i>
											Tambah ke Keranjang
										</button>
									</div>
								</div>
						</form>
					</div>


				</div>
			</div>
		</div>

		<div class="bor10 m-t-50 p-t-43 p-b-40">
			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item p-b-10">
						<a class="nav-link" data-toggle="tab" href="#information" role="tab">Deskripsi Produk</a>
					</li>
				</ul>
				<!-- Tab panes -->
				<div class="tab-content p-t-43">
					<!-- - -->
					<div class="tab-pane fade" id="information" role="tabpanel">
						<div class="row">
							<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
								<ul class="p-lr-28 p-lr-15-sm">
									<li class="flex-w flex-t p-b-7">
										<span class="stext-102 cl3 size-205">
											Nama
										</span>

										<span class="stext-102 cl6 size-206">
											<?= $ambilproduk['namaproduk']  ?>
										</span>
									</li>

									<li class="flex-w flex-t p-b-7">
										<span class="stext-102 cl3 size-205">
											Harga
										</span>

										<span class="stext-102 cl6 size-206">
											<?= $ambilproduk['hargaproduk']  ?>
										</span>
									</li>
									<li class="flex-w flex-t p-b-7">
										<span class="stext-102 cl3 size-205">
											Berat
										</span>

										<span class="stext-102 cl6 size-206">
											<?= $ambilproduk['berat']  ?> Kg
										</span>
									</li>

									<li class="flex-w flex-t p-b-7">
										<span class="stext-102 cl3 size-205">
											Stok
										</span>

										<span class="stext-102 cl6 size-206">
											<?= $ambilproduk['stokproduk']  ?>
										</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
	</section>
<div class="about-box">
    <div style="padding-right:50px;padding-left:50px">
   
        <div class="row">
        <?php $ses_pelanggan= $_SESSION['idpelanggan']?>
            <div class="col-sm-6">
            <label for="">Admin</label>
               <textarea class="form-control">Ada yang bisa kami bantu?</textarea> 
               <?php
            $sqlt = mysqli_query($db, "SELECT * from tbl_chat_admin where id_produk = '$idproduk' AND id_pelanggan='$ses_pelanggan'");
            $no=1;
            while($data = mysqli_fetch_array($sqlt)){  ?>
            <label for="">Admin</label>
           <textarea class="form-control"><?= $data['chat_admin']; ?></textarea>
           <br>
          <?php } ?>
          
            </div>

            <div class="col-sm-6" style="margin-top: 25px;">
            
            <?php
            $sqlt = mysqli_query($db, "SELECT * from tbl_chat_pelanggan where id_produk = '$idproduk' AND id_pelanggan='$ses_pelanggan'");
            $no=1;
            while($data = mysqli_fetch_array($sqlt)){  ?>
                                  
      
            <label for=""><?= @$_SESSION['pelanggan']['username'];?></label>
           <textarea class="form-control"><?= $data['chat']; ?></textarea>
           <br>
          <?php } ?>
          </div>
           
        </div>
    </div>
</div>


<!-- xxxxxxxxxxxxxxxxxxx -->
<div style="padding-right:50px;padding-left:50px">
<div class="row">
<span class="border-top">

_______________________________________________________________________________________________________________________________________________________________________________________________
</span>

<form role="form" method="POST" action="proses_pesan.php" enctype="multipart/form-data">
<div class="col-sm-10 " style="padding-bottom:30px">
<p>Ketik pesan disini</p>
<textarea name="chatku" class="form-control"></textarea>
</div>

<div class="col-sm-2"  style="padding-bottom:30px">
<p >...</p>
    <input type="hidden" name="id_produk" value="<?= $idproduk ?>">
    <input type="hidden" name="id_pelanggan" value="<?=  $ses_pelanggan ?>">
   <button name="kirimpesan" class="btn-info btn">KIRIM PESAN</button>
</div>

</form>
</div>
	<?php include 'footer.php'; ?>

</body>

</html>
<?php include 'script.php';  ?>