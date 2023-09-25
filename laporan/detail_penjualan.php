<?php
if(isset($_GET['kode'])) {
    $kodepj = $_GET['kode'];
    $query = mysqli_query($koneksi, "SELECT * FROM tb_penjualan, tb_pelanggan WHERE tb_penjualan.id_pelanggan=tb_pelanggan.id_pelanggan AND tb_penjualan.kode_penjualan = '$kodepj'");
    $data = mysqli_fetch_array($query);

    $query1 = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id_karyawan = '$data[id_karyawan]'");
    $data1 = mysqli_fetch_array($query1);
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
                <input type="text" value="<?php echo $data['tgl_penjualan'] ?>" class="form-control" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="label-control col-md-2">Nama Pelanggan</label>
            <div class="col-md-5">
                <input type="text" value="<?php echo $data['nama'] ?>" class="form-control" readonly>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="label-control col-md-2">Nama Kasir</label>
            <div class="col-md-5">
                <input type="text" value="<?php echo $data1['nama'] ?>" class="form-control" readonly>
            </div>
        </div>
    </form>
</div>
<?php
$query2 = mysqli_query($koneksi, "SELECT * FROM tb_penjualan, tb_barang WHERE tb_penjualan.kode_barcode=tb_barang.kode_barcode AND kode_penjualan='$kodepj'");
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
                <td>Rp. <?php echo rupiah($row['harga_jual']) ?></td>
                <td><?php echo $row['jumlah'] ?></td>
                <td>Rp. <?php echo rupiah($row['total']) ?></td>

            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<?php
$query3 = mysqli_query($koneksi, "SELECT * FROM tb_penjualan_detail WHERE kode_penjualan ='$kodepj'");
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
        <td>Diskon</td>
        <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
        <td><?php echo $data2['diskon'] ?>%</td>
    </tr>
    <tr>
        <td>Potongan Diskon</td>
        <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
        <td>Rp. <?php echo $data2['potongan_diskon'] ?></td>
    </tr>
    <tr>
        <td>Sub Total</td>
        <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
        <td>Rp. <?php echo $data2['sub_total'] ?></td>
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