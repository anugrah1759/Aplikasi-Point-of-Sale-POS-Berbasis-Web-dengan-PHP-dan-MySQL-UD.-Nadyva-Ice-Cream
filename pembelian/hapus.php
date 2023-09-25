<?php

$id = $_GET['id'];
$kodepb = $_GET['kodebeli'];
$harga = $_GET['harga'];
$barcode = $_GET['barcode'];
$jumlah = $_GET['jumlah'];

$query = mysqli_query($koneksi, "DELETE FROM tb_pembelian WHERE id_pembelian='$id'");
$query3 = mysqli_query($koneksi, "UPDATE tb_barang SET stok=(stok+$jumlah) WHERE kode_barcode='$barcode'");

?>
<script>
    window.location.href="?page=pembelian&kodepb=<?php echo $kodepb ?>"
</script>