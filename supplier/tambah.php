<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-truck fa-fw"></i> Tambah Supplier</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<form method="post" id="supplier">
    <div class="form-group">
        <label for="nama">Nama Supplier</label>
        <input type="text" name="nama" class="form-control" id="nama">
    </div><div class="form-group">
        <label for="nama">Alamat Supplier</label>
        <textarea name="alamat" id="alamat" cols="15" rows="10" class="form-control"></textarea>
    </div><div class="form-group">
        <label for="telp">No Telepon/Hp Supplier</label>
        <input type="text" name="telp" class="form-control" id="telp">
    </div>
    <input type="submit" class="btn btn-lg btn-primary btn-block" name="simpan" value="Simpan">
</form>
<?php
if(isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    mysqli_query($koneksi, "INSERT INTO tb_supplier SET nama = '$nama', alamat = '$alamat', telepon = '$telp'");
    echo "<meta http-equiv='refresh' content='1;url=?page=supplier'>";
}
?>