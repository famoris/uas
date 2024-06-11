<?php include 'koneksi.php';  ?>
<!DOCTYPE html>
<html>

<head>
</head>

<body>
    <?php include 'memberheader.php';  ?><br><br><br>

    <!-- Shoping Cart -->
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <?php
                include "koneksi.php";
                $a = $_SESSION['idpelanggan'];
                $sql = mysqli_query($db, "SELECT * FROM `tbl_pelanggan`  WHERE idpelanggan = '$a' ");
                $data = mysqli_fetch_array($sql);
                ?>
                <h2>Foto Profil</h2>
                <tr>
                    <img style="witdh:250px;height:170px" src="images/profil.jpg/<?= $data['foto'] ?>" alt="IMG-PRODUCT" height="250px">
                </tr>
            </div>
            <div class="col-md-6">
                <h2>Profil</h2>
                <table class="table table-bordered border:0px">
                    <thead>
                        <tr>
                            <td><b>Nama Lengkap</b></td>
                            <td><?= $data['namalengkapanggota'] ?></td>
                        </tr>

                        <tr>
                            <td><b>Jenis Kelamin</b></td>
                            <td><?= $data['jenis_kelamin'] ?></td>
                        </tr>

                        <tr>
                            <td><b>Email</b></td>
                            <td><?= $data['email'] ?></th>

                        </tr>

                        <tr>
                            <td><b>Nomor Telepon</b></td>
                            <td><?= $data['nohp'] ?></td>

                        </tr>

                        <tr>
                            <td><b>Alamat Lengkap</b></td>
                            <td><?= $data['alamatanggota'] ?></td>
                        </tr>
                    </thead>
                </table>
                <a href="homemember.php" class="btn btn-danger" style="margin-bottom: 10px"><i></i> Kembali</a>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" style="margin-bottom: 10px"><i></i> Lengkapi Profil</button>
            </div>
        </div>
    </div>


</body>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Input Your Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="update_data.php" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="idp" value="<?= $_SESSION['idpelanggan'] ?>">
                    <div class="size-208 w-full-ssm">
                        <span class="stext-110 cl2">
                            Jenis Kelamin
                        </span>
                    </div>
                    <div class="bor8 bg0 m-b-12">
                        <select class="form-control" name="jk">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="size-208 w-full-ssm">
                        <span class="stext-110 cl2">
                            No Hp
                        </span>
                    </div>

                    <div class="bor8 bg0 m-b-12">
                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="nohp" placeholder="08xxxx" required="required" onkeypress="return hanyaAngka(event)">
                    </div>

                    <div class="size-208 w-full-ssm">
                        <span class="stext-110 cl2">
                            Alamat
                        </span>
                    </div>

                    <div class="bor8 bg0 m-b-12">
                        <textarea class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="alamat" placeholder="Alamat"></textarea>
                    </div>

                    <div class="size-208 w-full-ssm">
                        <span class="stext-110 cl2">
                            Foto Profil
                        </span>
                    </div>

                    <div class="bor8 bg0 m-b-12">
                        <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="file" name="foto" placeholder="Foto Profil">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                    <button type="submit" name="simpan" class="btn btn-primary"> <i class="fa fa-check"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

</html>
<?php include 'footer.php';
include 'script.php';  ?>