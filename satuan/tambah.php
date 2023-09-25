<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Satuan Barang</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<br>
<form method="POST" id="f_satuan">
    <div class="form-group">
        <label for="">Satuan</label>
        <input type="text" name="satuan" id="satuan" class="form-control">
    </div>
    <input type="submit" name="simpan" class="btn btn-sm btn-success" value="Simpan">
</form>
<?php
if(isset($_POST['simpan'])) {
    $satuan = $_POST['satuan'];

    mysqli_query($koneksi, "INSERT INTO tb_satuan SET satuan = '$satuan'");
    echo "<meta http-equiv='refresh' content='1;url=?page=satuan'>";
}
?>