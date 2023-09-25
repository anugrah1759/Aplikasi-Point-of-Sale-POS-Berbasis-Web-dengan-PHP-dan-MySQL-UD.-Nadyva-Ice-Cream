<?php

$id = $_GET['id'];
$kodepj = $_GET['kodepj'];
$harga = $_GET['harga'];
$barcode = $_GET['barcode'];
$jumlah = $_GET['jumlah'];

$query = mysqli_query($koneksi, "DELETE FROM tb_penjualan WHERE id_penjualan='$id'");
$query3 = mysqli_query($koneksi, "UPDATE tb_barang SET stok=(stok+$jumlah) WHERE kode_barcode='$barcode'");

?>
<script>
    window.location.href="?page=penjualan&kodepj=<?php echo $kodepj ?>"
</script>