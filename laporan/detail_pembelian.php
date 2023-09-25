<?php
if(isset($_GET['kode'])) {
    $kodepj = $_GET['kode'];
    $query = mysqli_query($koneksi, "SELECT * FROM tb_pembelian, tb_supplier WHERE tb_pembelian.id_supplier=tb_supplier.id_supplier AND tb_pembelian.kode_pembelian = '$kodepj'");
    $data = mysqli_fetch_array($query);
}
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-shopping-cart fa-fw"></i> Detail Penjualan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <form class="form-horizontal">
        <div class="form-group">
            <label for="" class="label-control col-md-2">Kode Penjualan</label>
            <div class="col-md-5">
                <input type="text" value="<?php echo $data['kode_penjualan'] ?>" class="form-control" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="label-control col-md-2">Tanggal Pembelian</label>
            <div class="col-md-5">
                <input type="text" value="<?php echo $data['tgl_pembelian'] ?>" class="form-control" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="label-control col-md-2">Nama Pelanggan</label>
            <div class="col-md-5">
                <input type="text" value="<?php echo $data['nama'] ?>" class="form-control" readonly>
            </div>
        </div>
    </form>
</div>
<?php
$query2 = mysqli_query($koneksi, "SELECT * FROM tb_pembelian, tb_barang WHERE tb_pembelian.kode_barcode=tb_barang.kode_barcode AND tb_pembelian.kode_pembelian='$kodepj'");
?>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($row = mysqli_fetch_array($query2)) {
            ?>
            <tr>
                <td><?php echo $row['nama_barang'] ?></td>
                <td>Rp. <?php echo rupiah($row['harga_beli']) ?></td>
                <td><?php echo $row['jumlah'] ?></td>
                <td>Rp. <?php echo rupiah($row['total']) ?></td>

            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<?php
$query3 = mysqli_query($koneksi, "SELECT * FROM tb_pembelian_detail WHERE kode_pembelian ='$kodepj'");
$data2 = mysqli_fetch_array($query3);
?>
<hr>
<table>
    <tr>
        <td>Total</td>
        <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
        <td>Rp. <?php echo $data2['total'] ?></td>
    </tr>
    <tr>
        <td>Bayar</td>
        <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
        <td>Rp. <?php echo $data2['bayar'] ?></td>
    </tr>
    <tr>
        <td>Kembalian</td>
        <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
        <td>Rp. <?php echo $data2['kembalian'] ?></td>
    </tr>
</table>