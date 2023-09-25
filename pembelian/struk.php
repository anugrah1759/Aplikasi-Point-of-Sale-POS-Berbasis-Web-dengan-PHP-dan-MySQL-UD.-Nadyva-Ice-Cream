<?php
// $koneksi = mysqli_connect("localhost","root","","db_pos");
include '../koneksi.php';
if(isset($_GET['kodebeli'])) {
    $kode = $_GET['kodebeli'];
    $query = mysqli_query($koneksi, "SELECT * FROM tb_pembelian, tb_supplier WHERE tb_pembelian.id_supplier=tb_supplier.id_supplier AND kode_pembelian = '$kode'");
    $data = mysqli_fetch_array($query);
}
?>
<h1 align="center">UD. NADYVA ICE CREAM</h1>
<hr>
<table>
    <tr>
        <td>Kode Beli</td>
        <td>: &nbsp;&nbsp;</td>
        <td><?php echo $kode ?></td>
    </tr>
    <tr>
        <td>Tanggal</td>
        <td>: &nbsp;&nbsp;</td>
        <td><?php echo $data['tgl_pembelian'] ?></td>
    </tr>
    <tr>
        <td>Nama Supplier</td>
        <td>: &nbsp;&nbsp;</td>
        <td><?php echo $data['nama'] ?></td>
    </tr>
</table>
<hr>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th width="320px">Nama Barang</th>
            <th width="100px">Harga</th>
            <th width="80px">Jumlah</th>
            <th width="150px">Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query2 = mysqli_query($koneksi, "SELECT * FROM tb_pembelian, tb_barang WHERE tb_pembelian.kode_barcode=tb_barang.kode_barcode AND kode_pembelian='$kode'");
        while($row = mysqli_fetch_array($query2)) {
            ?>
            <tr>
                <td><?php echo $row['nama_barang'] ?></td>
                <td>Rp. <?php echo $row['harga_beli'] ?></td>
                <td><?php echo $row['jumlah'] ?></td>
                <td>Rp. <?php echo $row['total'] ?></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<hr>
<?php
$query3 = mysqli_query($koneksi, "SELECT * FROM tb_pembelian_detail WHERE kode_pembelian ='$kode'");
$data2 = mysqli_fetch_array($query3);
?>
<table>
    <tr>
        <td>Total</td>
        <td>: &nbsp;&nbsp;</td>
        <td>Rp. <?php echo $data2['total'] ?></td>
    </tr>
    <tr>
        <td>Bayar</td>
        <td>: &nbsp;&nbsp;</td>
        <td>Rp. <?php echo $data2['bayar'] ?></td>
    </tr>
    <tr>
        <td>Kembalian</td>
        <td>: &nbsp;&nbsp;</td>
        <td>Rp. <?php echo $data2['kembalian'] ?></td>
    </tr>
</table>