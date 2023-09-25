<?php 
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query1 = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang='$id'");
    $data = mysqli_fetch_array($query1);
}
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-cubes fa-fw"></i> Edit Barang</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<form method="post" id="barang">
    <div class="form-group">
        <label for="barcode">Kode Barcode</label>
        <input type="text" name="barcode" id="barcode" class="form-control" id="barcode" autofocus="" value="<?php echo $data['kode_barcode'] ?>">
    </div>
    <div class="form-group">
        <label for="nama">Nama Barang</label>
        <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $data['nama_barang'] ?>">
    </div>
    <div class="form-group">
        <label for="stok">Stok</label>
        <input type="number" name="stok" id="stok" class="form-control" value="<?php echo $data['stok'] ?>">
    </div>
    <div class="form-group">
        <label for="satuan">Satuan</label>
        <select name="satuan" id="satuan" class="form-control">
        <?php
            $query2 = mysqli_query($koneksi, "SELECT * FROM tb_satuan");
            while($row1 = mysqli_fetch_array($query2)) {
            ?>
                <option <?php if($row1['satuan'] == $data['satuan']){echo "selected"; } ?> value="<?php echo $row1['satuan'] ?>"><?php echo $row1['satuan'] ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="beli">Harga Beli</label>
        <input type="number" name="beli" id="beli" class="form-control" value="<?php echo $data['harga_beli'] ?>" onkeyup="hitung();">
    </div>
    <div class="form-group">
        <label for="jual">Harga Jual</label>
        <input type="number" name="jual" id="jual" class="form-control" value="<?php echo $data['harga_jual'] ?>" onkeyup="hitung();">
    </div>
    <div class="form-group">
        <label for="keuntungan">Keuntungan</label>
        <input type="number" name="keuntungan" id="keuntungan" class="form-control" value="<?php echo $data['keuntungan'] ?>" readonly="" onkeyup="hitung();">
    </div>
    <div class="form-group">
        <label for="kategori">Kategori</label>
        <select name="kategori" id="kategori" class="form-control">
            <!-- <option value="">---Pilih Kategori---</option> -->
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
            while($row = mysqli_fetch_array($query)){
                ?>
                <option <?php if($data['id_kategori'] == $row['id_kategori']){echo "selected";} ?> value="<?php echo $row['id_kategori'] ?>"><?php echo $row['nama'] ?></option>
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

    mysqli_query($koneksi, "UPDATE tb_barang SET kode_barcode = '$barcode', nama_barang='$nama', stok = '$stok', satuan = '$satuan', harga_jual = '$jual', harga_beli = '$beli', keuntungan = '$keuntung', id_kategori = '$kategori' WHERE id_barang='$id'");
    echo "<meta http-equiv='refresh' content='1;url=?page=barang'>";
    
}
?>