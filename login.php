<?php
session_start();

//jika ditemukan session, maka user akan otomatis dialihkan ke halaman admin
if (isset($_SESSION['idanggota'])) {
	if ($_SESSION['role'] == "anggota") {
		header("Location: homemember.php");
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<?php include 'head.php';  ?>
</head>

<body>
	<?php include 'header-white.php';  ?>

	<!-- Shoping Cart -->
	<form class="bg0 p-t-75 p-b-85" method="POST" action="ceklogin.php">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-lg-7 col-xl-6 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30" style="color: red;" align="center">
							Silahkan Login!!!
						</h4>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Email
								</span>
							</div>

							<div class="bor8 bg0 m-b-12">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="email" placeholder="email user" required="required">
							</div>
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Password
								</span>
							</div>

							<div class="bor8 bg0 m-b-12">
								<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="password" name="Password" placeholder="password" required="required">
							</div>
							<div style="padding-right: 10px">
							<button type="submit" name="login" class="btn btn-danger stext-101 cl0 size-115 "><i class="fa fa-circle-o-notch"> Login</i>
							</button>
							</div>
<!-- 						<div class="form-group text-left">
                           <input type="button"  class="btn btn-danger stext-101 cl0 size-115" data-toggle="modal" data-target="#modal-default" name="login" type="submit" value="Lupa Password" class="site-button pull-left">
                        </div> -->
						</div>
						<center>Sudah punya Akun?<a href="register.php" style="margin-left: 10px" class="btn btn-success"> DAFTAR</a></center>
					</div>
				</div>
			</div>
		</div>
	</form>
	        <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Silahkan Inputkan Email</h4>
              </div>
              <form method="post" action="">
              <div class="modal-body">
               <input type="text" name="email" class="form-control" placeholder="email"><br>
                <input type="password" name="password" class="form-control" placeholder="Password Baru"><br>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="submit" name="submit_email" class="btn btn-primary">Kirim</button>
              </div>
              </form>


                <?php
                include 'koneksi.php';
                if (isset($_POST['submit_email'])) {
                   
                    $email = $_POST['email'];
                    $password = $_POST['password'];



                    $sqlsimpanproduk = mysqli_query($db, "UPDATE `tbl_anggota` SET `password`='$password' WHERE `email`='$email'");
                    if ($sqlsimpanproduk) {
                        echo "<script>alert('Password Sukses Di Update');</script>";
                        echo "<script>location='login.php';</script>";
                    } else {
                        echo "<script>alert('Data Gagal');</script>";
                        echo "<script>location='login.php';</script>";
                    }
                }
                ?>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
	<?php include 'Footer.php';  ?>
	<?php include 'script.php';  ?>
</body>

</html>