<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query1 = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan WHERE id_pelanggan='$id'");
    $data = mysqli_fetch_array($query1);
}
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-users fa-fw"></i> Edit Pelanggan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<form method="post" id="pelanggan">
    <div class="form-group">
        <label for="nama">Nama Pelanggan</label>
        <input type="text" name="nama" class="form-control" id="nama" value="<?php echo $data['nama'] ?>">
    </div><div class="form-group">
        <label for="nama">Alamat Pelanggan</label>
        <textarea name="alamat" id="alamat" cols="15" rows="10" class="form-control"><?php echo $data['alamat'] ?></textarea>
    </div><div class="form-group">
        <label for="telp">No Telepon/Hp Pelanggan</label>
        <input type="text" name="telp" class="form-control" id="telp" value="<?php echo $data['no_telepon'] ?>">
    </div>
    <input type="submit" class="btn btn-lg btn-primary btn-block" name="simpan" value="Simpan">
</form>
<?php
if(isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    mysqli_query($koneksi, "UPDATE tb_pelanggan SET nama = '$nama', alamat = '$alamat', no_telepon = '$telp' WHERE id_pelanggan = '$id'");
    echo "<meta http-equiv='refresh' content='1;url=?page=pelanggan'>";
}
?>