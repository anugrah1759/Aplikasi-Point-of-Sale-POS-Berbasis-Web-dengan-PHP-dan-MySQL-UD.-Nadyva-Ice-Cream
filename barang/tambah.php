<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-cubes fa-fw"></i> Tambah Barang</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<form method="post" id="barang">
    <div class="form-group">
        <label for="barcode">Kode Barcode</label>
        <input type="text" name="barcode" id="barcode" class="form-control" id="barcode" autofocus="">
    </div>
    <div class="form-group">
        <label for="nama">Nama Barang</label>
        <input type="text" name="nama" id="nama" class="form-control">
    </div>
    <div class="form-group">
        <label for="stok">Stok</label>
        <input type="number" name="stok" id="stok" class="form-control">
    </div>
    <div class="form-group">
        <label for="satuan">Satuan</label>
        <select name="satuan" id="satuan" class="form-control">
            <option value="">--Pilih Satuan--</option>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM tb_satuan");
            while($row = mysqli_fetch_array($query)) {
            ?>
                <option value="<?php echo $row['satuan'] ?>"><?php echo $row['satuan'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="beli">Harga Beli</label>
        <input type="number" name="beli" id="beli" class="form-control" onkeyup="hitung();">
    </div>
    <div class="form-group">
        <label for="jual">Harga Jual</label>
        <input type="number" name="jual" id="jual" class="form-control" onkeyup="hitung();">
    </div>
    <div class="form-group">
        <label for="keuntungan">Keuntungan</label>
        <input type="number" name="keuntungan" id="keuntungan" class="form-control" readonly="" onkeyup="hitung();">
    </div>
    <div class="form-group">
        <label for="kategori">Kategori</label>
        <select name="kategori" id="kategori" class="form-control">
            <option value="">---Pilih Kategori---</option>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
            while($row = mysqli_fetch_array($query)){
                ?>
                <option value="<?php echo $row['id_kategori'] ?>"><?php echo $row['nama'] ?></option>
            <?php }
            ?>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" name="simpan" class="btn btn-lg btn-block btn-success" value="Simpan">
    </div>
</form>
<script>
    function hitung() {
        var beli = document.getElementById("beli").value;
        var jual = document.getElementById("jual").value;

        var keuntungan = parseInt(jual) - parseInt(beli);
        if(!isNaN(keuntungan)) {
            var potongan = document.getElementById('keuntungan').value = keuntungan;
        }
    }
</script>
<?php
if(isset($_POST['simpan'])) {
    $barcode = $_POST['barcode'];
    $nama = $_POST['nama'];
    $stok = $_POST['stok'];
    $satuan = $_POST['satuan'];
    $beli = $_POST['beli'];
    $jual = $_POST['jual'];
    $keuntung = $_POST['keuntungan'];
    $kategori = $_POST['kategori'];

    mysqli_query($koneksi, "INSERT INTO tb_barang SET kode_barcode = '$barcode', nama_barang='$nama', stok = '$stok', satuan = '$satuan', harga_jual = '$jual', harga_beli = '$beli', keuntungan = '$keuntung', id_kategori = '$kategori'");
    echo "<meta http-equiv='refresh' content='1;url=?page=barang'>";
    
}
?>