<?php
// $koneksi = mysqli_connect("localhost", "root", "", "db_pos");
include '../koneksi.php';
$kode = $_GET['kodepj'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_penjualan, tb_pelanggan WHERE tb_penjualan.id_pelanggan=tb_pelanggan.id_pelanggan AND kode_penjualan='$kode'");
$data = mysqli_fetch_array($query);

$query1 = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id_karyawan = '$data[id_karyawan]'");
$data1 = mysqli_fetch_array($query1);
?>
<h1 align="center">UD. NADYVA ICE CREAM</h1>
<hr>
<table>
    <tr>
        <td>Kode Penjualan</td>
        <td> :&nbsp;&nbsp; </td>
        <td><?php echo $kode ?></td>
    </tr>
    <tr>
        <td>Tanggal</td>
        <td> :&nbsp;&nbsp; </td>
        <td><?php echo $data['tgl_penjualan'] ?></td>
    </tr>
    <tr>
        <td>Nama Pelanggan</td>
        <td> :&nbsp;&nbsp; </td>
        <td><?php echo $data['nama'] ?></td>
    </tr>
    <tr>
        <td>Nama kasir</td>
        <td> :&nbsp;&nbsp; </td>
        <td><?php echo $data1['nama'] ?></td>
    </tr>
</table>
<br>
<?php
$query2 = mysqli_query($koneksi, "SELECT * FROM tb_penjualan, tb_barang WHERE tb_penjualan.kode_barcode=tb_barang.kode_barcode AND kode_penjualan='$kode'");
?>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th width="300px">Nama Barang</th>
            <th width="80px">Harga</th>
            <th>Jumlah</th>
            <th width="80px">Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($row = mysqli_fetch_array($query2)) {
            ?>
            <tr>
                <td><?php echo $row['nama_barang'] ?></td>
                <td>Rp. <?php echo $row['harga_jual'] ?></td>
                <td><?php echo $row['jumlah'] ?></td>
                <td>Rp. <?php echo $row['total'] ?></td>

            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<?php
$query3 = mysqli_query($koneksi, "SELECT * FROM tb_penjualan_detail WHERE kode_penjualan ='$kode'");
$data2 = mysqli_fetch_array($query3);
?>
<hr>
<table>
    <tr>
        <td>Total</td>
        <td>: &nbsp;&nbsp;</td>
        <td>Rp. <?php echo $data2['total'] ?></td>
    </tr>
    <tr>
        <td>Diskon</td>
        <td>: &nbsp;&nbsp;</td>
        <td><?php echo $data2['diskon'] ?>%</td>
    </tr>
    <tr>
        <td>Potongan Diskon</td>
        <td>: &nbsp;&nbsp;</td>
        <td>Rp. <?php echo $data2['potongan_diskon'] ?></td>
    </tr>
    <tr>
        <td>Sub Total</td>
        <td>: &nbsp;&nbsp;</td>
        <td>Rp. <?php echo $data2['sub_total'] ?></td>
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