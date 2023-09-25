<?php
if (isset($_POST['add'])) {
    $number=count($_POST['barang']);
    for ($i=0; $i < $number; $i++) { 
        if (trim($_POST['barang'][$i] != '')) {
            if ($_POST['qty'][$i] > 0) {
                $sql=mysqli_query($koneksi, "insert into tb_pemesanan(id,invoice,pelanggan,barang,qty,tanggal, jadi) values ('','".$id_Order."','".$_POST['pelanggan']."','".$_POST['barang'][$i]."','".$_POST['qty'][$i]."','".date('Y-m-d')."','N') ");
            }
        }
    }
    if ($sql) {
        
        echo "<script type='text/javascript'>alert('simpan berhasil')</script>";
        
        
    } else {
        header("Refresh: 1;url=index.php?page=pemesanan&aksi=preview");
        echo "<script type='text/javascript'>alert('simpan gagal')</script>";
    }
}
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-cubes fa-fw"></i> Bukti Pemesanan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<br>
<br>
<?php
    $query = mysqli_query($koneksi, "SELECT * FROM tb_pemesanan where invoice='".$_GET['id']."'");
    while($row = mysqli_fetch_array($query)){
        $id=$row['invoice'];
        $nama=$row['pelanggan'];
        $tanggal=$row['tanggal'];
    }
?>
<div class="row" style="margin-top: 25px;">
    <div class="col-lg-12" style="border-radius: 10px;box-shadow: 0 1px 8px 0 rgba(0,0,0.12);padding: 20px">
        <h5>Nomor Pesanan : <?php echo $id; ?></h5>
        <h5>Nama Pemesan : <?php echo $nama; ?></h5>
        <h5>Tanggal : <?php echo date('d/m/Y',strtotime($tanggal)); ?></h5>

        <table border="1">
            <thead>
                <tr>
                    <th style="padding: 0 5px">Nama Barang</th>
                    <th style="padding: 0 5px">Satuan</th>
                    <th style="padding: 0 5px">Jumlah Pesan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $query = mysqli_query($koneksi, "SELECT a.qty,b.nama_barang,b.satuan FROM tb_pemesanan a JOIN tb_barang b on a.barang=b.kode_barcode where a.invoice='".$_GET['id']."'");
                    while($row = mysqli_fetch_array($query)){
                ?>
                <tr>
                    <td style="padding: 0 5px"><?php echo $row['nama_barang']; ?></td>
                    <td style="padding: 0 5px"><?php echo $row['satuan']; ?></td>
                    <td style="padding: 0 5px"><?php echo $row['qty']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <br><br>
        <?php
        if (isset($_SESSION['username'])) {
            if ($_SESSION['username']!='') {
        ?>
        <button class="btn btn-sm btn-warning proses" type="button" data-toggle="modal" data-target="#proses" data-proses="<?php echo $_GET['id']; ?>">PROSES</button>
        <?php }} else { ?>
        <button class="btn btn-sm btn-danger batal" type="button" data-toggle="modal" data-target="#modalbatal" data-pk_hapus="<?php echo $_GET['id']; ?>">BATAL</button>
        <a class="btn btn-sm btn-primary cetak" href="javascript:window.print()">CETAK</a>
        <button class="btn btn-sm btn-success simpan" type="button" data-toggle="modal" data-target="#modalsimpan" data-pk="<?php echo $_GET['id']; ?>">KIRIM</button>
    <?php } ?>
    </div>
</div>