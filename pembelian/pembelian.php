<?php
if(isset($_GET['kodepb'])) {
    $kodepb = $_GET['kodepb'];
}
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-cart-plus fa-fw"></i> Pembelian</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<form method="POST">
<div class="form-group">
        <label for="kodejual" class="label-control col-md-3">Kode Pembelian</label>
        <div class="col-md-3">
            <input type="text" name="kodebeli" id="kodebeli" readonly class="form-control" value="<?php echo $kodepb; ?>">
        </div>
    </div>
    <div class="col-md-6"><br><br></div>
    <div class="form-group">
        <label for="kodejual" class="label-control col-md-3">Kode Barcode</label>
        <div class="col-md-4">
            <select name="barcode" id="barcode" class="chosen-select form-control" autofocus>
                <option value="">Masukkan Barang</option>
                <?php
                $sql = mysqli_query($koneksi, "SELECT * FROM tb_barang");
                while($pecah = mysqli_fetch_array($sql)) {
                    ?>
                    <option value="<?php echo $pecah['kode_barcode'] ?>"><?php echo $pecah['kode_barcode']." ".$pecah['nama_barang']." Rp.".rupiah($pecah['harga_jual']) ?></option>
                    <?php
                }
                ?>
            </select>
            <!-- <input type="text" name="barcode" id="barcode" class="form-control" autofocus> -->
        </div>
    </div>
    <div class="form-group">
        <label for="jumlah" class="label-control col-md-1">Jumlah</label>
        <div class="col-md-3">
            <input type="number" name="jumlah" id="jumlah" class="form-control" >
        </div>
    </div>
    <div class="col-md-12"><br></div>
    <div class="form-group">
        <label for="pelanggan" class="label-control col-md-3">Nama Supplier</label>
        <div class="col-md-4">
            <select name="supplier" id="supplier" class="chosen-select form-control">
                <option >Pilih Supplier</option>
                <?php 
                $query4 = mysqli_query($koneksi, "SELECT * FROM tb_supplier");
                while($supplier = mysqli_fetch_array($query4)){
                    echo "
                        <option value=$supplier[id_supplier]>$supplier[nama]</option>
                    ";
                }
                ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-3">
            <input type="submit" name="tambahkan" class="btn btn-sm btn-primary" value="Tambahkan">
        </div>
    </div>
</form>
<?php
if(isset($_POST['tambahkan'])) {
    $date = date("Y-m-d");
    $kodebeli = $_POST['kodebeli'];
    $barcode = $_POST['barcode'];
    $supplier1 = $_POST['supplier'];

    $barang = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE kode_barcode = '$barcode'");
    $data_barang = mysqli_fetch_array($barang);
    $harga_beli = $data_barang['harga_beli'];
    $jumlah = $_POST['jumlah'];
    $total = $jumlah * $harga_beli;

    $query = mysqli_query($koneksi, "INSERT INTO tb_pembelian SET kode_pembelian='$kodebeli', kode_barcode='$barcode', jumlah = '$jumlah', total = '$total', tgl_pembelian ='$date', id_supplier = '$supplier1'");
}
$query3 = mysqli_query($koneksi, "SELECT * FROM tb_pembelian_detail WHERE kode_pembelian='$kodepb'");
$data3 = mysqli_fetch_array($query3);
?>
<br>
<br>
<br><br><br><br><hr>
<form method="post">
<h3>Daftar Pembelian</h3>
<hr>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th>Kode Barcode</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query2 = mysqli_query($koneksi, "SELECT * FROM tb_pembelian, tb_barang WHERE tb_pembelian.kode_barcode = tb_barang.kode_barcode AND tb_pembelian.kode_pembelian = '$kodepb'");
        while($data2 = mysqli_fetch_array($query2)) {
        ?>
            <tr>
                <td><?php echo $data2['kode_barcode'] ?></td>
                <td><?php echo $data2['nama_barang']?></td>
                <td><?php echo rupiah($data2['harga_beli']) ?></td>
                <td><?php echo $data2['jumlah'] ?></td>
                <td><?php echo rupiah($data2['total']) ?></td>
                <td>
                    <a href="?page=pembelian&aksi=tambah&id=<?php echo $data2['id_pembelian'] ?>&kodebeli=<?php echo $data2['kode_pembelian'] ?>&harga=<?php echo $data2['harga_beli'] ?>&barcode=<?php echo $data2['kode_barcode'] ?>" class="btn btn-sm btn-success"><b>+</b></a>

                    <a href="?page=pembelian&aksi=kurang&id=<?php echo $data2['id_pembelian'] ?>&kodebeli=<?php echo $data2['kode_pembelian'] ?>&harga=<?php echo $data2['harga_beli'] ?>&barcode=<?php echo $data2['kode_barcode'] ?>" class="btn btn-sm btn-success"><b>-</b></a>

                    <a href="?page=pembelian&aksi=hapus&id=<?php echo $data2['id_pembelian'] ?>&kodebeli=<?php echo $data2['kode_pembelian'] ?>&harga=<?php echo $data2['harga_beli'] ?>&barcode=<?php echo $data2['kode_barcode'] ?>&jumlah=<?php echo $data2['jumlah'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i></a>
                </td>
            </tr>
        <?php
            $total_bayar = $total_bayar + $data2['total'];
        }
        ?>
    </tbody>
</table>
<hr>
    <div class="form-group">
        <label for="total_bayar" class="label-control col-md-3">Total</label>
        <div class="col-md-3">
            <input type="number" name="total_bayar" id="total_bayar" onkeyup="hitung();" readonly="" class="form-control" value="<?php echo $total_bayar ?>">
        </div>
    </div>
    <div class="col-md-6"><br><br></div>
    <div class="form-group">
        <label for="bayar" class="label-control col-md-3">Bayar</label>
        <div class="col-md-3">
            <input type="number" name="bayar" onkeyup="hitung();" id="bayar" class="form-control" value="<?php echo $data3['bayar'] ?>">
        </div>
    </div>
    <div class="col-md-6"><br><br></div>
    <div class="form-group">
        <label for="kembali" class="label-control col-md-3">Kembalian</label>
        <div class="col-md-3">
            <input type="number" name="kembali" id="kembali" readonly="" onkeyup="hitung();" class="form-control" value="<?php echo $data3['kembalian'] ?>">
        </div>
    </div>
    <div class="col-md-6"><br><br></div><br><br>
    <input type="submit" name="simpan" class="btn btn-md btn-success" value="Simpan">
    <button type="button" class="btn btn-md btn-primary" onclick="window.open('pembelian/struk.php?kodebeli=<?php echo $kodepb; ?>','mywindow','width=720, height=480')"><i class="fa fa-print fa-fw"></i> Cetak</button>
</form>
<?php
if(isset($_POST['simpan'])) {
    $total_bayar = $_POST['total_bayar'];
    $bayar = $_POST['bayar'];
    $kembalian = $_POST['kembali'];
    $tanggal = date("Y-m-d");

    mysqli_query($koneksi, "INSERT INTO tb_pembelian_detail SET kode_pembelian = '$kodepb', total = '$total_bayar', bayar = '$bayar', kembalian = '$kembalian', tanggal = '$tanggal'");
}
?>
<script>
function hitung() {
    var total = document.getElementById("total_bayar").value;
    var bayar = document.getElementById("bayar").value;

    var kembalian = parseInt(bayar) - parseInt(total);
    if(!isNaN(kembalian)) {
        document.getElementById("kembali").value = kembalian;
    }
}
</script>