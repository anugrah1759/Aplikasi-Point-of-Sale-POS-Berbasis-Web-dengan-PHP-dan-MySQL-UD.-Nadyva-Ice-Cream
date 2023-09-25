<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-book fa-fw"></i> Laporan Penjualan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<form method="post" class="form-horizontal">
    <label for="" class="col-md-3">Pilih Tanggal Penjualan</label>
    <div class="col-md-3">
        <input type="text" class="form-control flatpickr" name="mulai">
    </div>
    <div class="col-md-3">
        <input type="text" class="form-control flatpickr" name="akhir">
    </div>
    <input type="submit" name="cari" class="btn btn-sm btn-success" value="Cari">
</form>
<?php
if(isset($_POST['cari'])) {
    $mulai = $_POST['mulai'];
    $akhir = $_POST['akhir'];

    $query = mysqli_query($koneksi, "SELECT * FROM tb_penjualan, tb_barang WHERE (tgl_penjualan BETWEEN '$mulai' AND '$akhir') AND tb_penjualan.kode_barcode = tb_barang.kode_barcode");
    ?>
    <br>
    <a href="laporan/cetak1.php?mulai=<?php echo $mulai ?>&akhir=<?php echo $akhir ?>" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-print"></i> Cetak</a><br><br>
    Tanggal <?php echo $mulai." Sampai ". $akhir ?>
    <br>
    <br>
    <table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <th>Tanggal Penjualan</th>
                <th>Kode Barcode</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga Jual</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            while($row = mysqli_fetch_array($query)){
            ?>
                <tr>
                    <td><?php echo $row['tgl_penjualan'] ?></td>
                    <td><?php echo $row['kode_barcode']; ?></td>
                    <td><?php echo $row['nama_barang']; ?></td>
                    <td><?php echo $row['jumlah']; ?></td>
                    <td><?php echo rupiah($row['harga_jual']); ?></td>
                    <td><?php echo rupiah($row['total']); ?></td>
                </tr>
            <?php 
            $total = $total + $row['total'];
            } ?> 
            <tr>
                <td colspan="5">Jumlah Pendapatan</td>
                <td><b>Rp. <?php echo rupiah($total) ?></b></td>
            </tr>
        </tbody>
    </table>

    <?php
}
?>