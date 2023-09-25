<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query1 = mysqli_query($koneksi, "SELECT * FROM tb_kategori WHERE id_kategori='$id'");
    $data = mysqli_fetch_array($query1);
}
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit Kategori Barang</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<form method="post" id="kategori">
    <div class="form-group">
        <label for="nama">Nama Kategori</label>
        <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $data['nama'] ?>">
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi Kategori</label>
        <textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="6"><?php echo $data['deskripsi'] ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" name="simpan" class="btn btn-lg btn-block btn-success" value="Simpan">
    </div>
</form>
<?php
if(isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $update_at = "CURRENT_TIMESTAMP";

    mysqli_query($koneksi, "UPDATE tb_kategori SET nama = '$nama', deskripsi = '$deskripsi' WHERE id_kategori='$id'");
    echo "<meta http-equiv='refresh' content='1;url=?page=kategori'>";
}
?>