<?php

$id = $_GET['id'];
$kodepj = $_GET['kodepj'];
$harga = $_GET['harga'];
$barcode = $_GET['barcode'];

$query = mysqli_query($koneksi, "UPDATE tb_penjualan SET jumlah=(jumlah-1) WHERE id_penjualan='$id'");
$query2 = mysqli_query($koneksi, "UPDATE tb_penjualan SET total=(total-$harga) WHERE id_penjualan='$id'");
$query3 = mysqli_query($koneksi, "UPDATE tb_barang SET stok=(stok+1) WHERE kode_barcode='$barcode'");

?>
<script>
    window.location.href="?page=penjualan&kodepj=<?php echo $kodepj ?>"
</script>