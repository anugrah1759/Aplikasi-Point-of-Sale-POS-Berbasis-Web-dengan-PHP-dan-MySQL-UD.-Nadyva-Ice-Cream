<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-user fa-fw"></i> Profil <?php echo $userData['nama'] ?></h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<h3>
<table>
    <tr>
        <td>Nama</td>
        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
        <td><?php echo $userData['nama'] ?></td>
    </tr>
    <tr>
        <td>Jabatan</td>
        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
        <td><?php echo $userData['jabatan'] ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
        <td><?php echo $userData['alamat'] ?></td>
    </tr>
    <tr>
        <td>Telepon/Hp</td>
        <td>&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
        <td><?php echo $userData['telepon'] ?></td>
    </tr>
</table>
</h3>
<br>
<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#myModal">Ganti Password</button>

  <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
            </div>
            <form method="post" id="password">
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Password Baru</label>
                    <input type="password" name="passBaru" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Ulangi Password Baru</label>
                    <input type="password" name="passUlang" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
      
    </div>
</div>
<?php
if(isset($_POST['simpan'])) {
    $passBaru = $_POST['passBaru'];
    $passUlang = $_POST['passUlang'];

    if($passBaru == $passUlang) {
        $pass = sha1(md5($passBaru));
        mysqli_query($koneksi, "UPDATE tb_admin SET password = '$pass' WHERE id_karyawan = '$id_karyawan'");
        echo "<script>alert('Berhasil Diganti')</script>";
    } else {
        echo "<script>alert('Password Tidak Sama')</script>";
    }
}

?>