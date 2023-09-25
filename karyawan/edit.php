<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query1 = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id_karyawan='$id'");
    $data = mysqli_fetch_array($query1);
}
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-male fa-fw"></i> Edit Karyawan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<form method="post" id="karyawan">
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $data['nama'] ?>">
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat" cols="10" rows="7" class="form-control"><?php echo $data['alamat'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="telp">Telepon/Hp</label>
        <input type="text" name="telp" class="form-control" id="telp" value="<?php echo $data['telepon'] ?>">
    </div>
    <div class="form-group">
        <label for="jabatan">Jabatan</label>
        <select name="jabatan" id="jabatan" class="form-control">
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM tb_jabatan");
            while($jabatan = mysqli_fetch_array($query)) {
                ?>
                <option <?php if($data['id_jabatan'] == $jabatan['id_jabatan']){echo "selected";} ?> value="<?php echo $jabatan['id_jabatan']?>"><?php echo $jabatan['jabatan'] ?></option>
                <?php
            }
            ?>
        </select>
    </div>
    <input type="submit" name="simpan" value="Simpan" class="btn btn-lg btn-block btn-primary">
</form>
<br>
<br>
<?php
if(isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $jabatan = $_POST['jabatan'];

    mysqli_query($koneksi, "UPDATE tb_karyawan SET nama = '$nama', alamat = '$alamat', telepon = '$telp', id_jabatan = '$jabatan' WHERE id_karyawan='$id'");
    echo "<meta http-equiv='refresh' content='1;url=?page=karyawan'>";
}
?>