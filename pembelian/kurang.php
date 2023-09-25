<?php

$id = $_GET['id'];
$kodepb = $_GET['kodebeli'];
$harga = $_GET['harga'];
$barcode = $_GET['barcode'];

$query = mysqli_query($koneksi, "UPDATE tb_pembelian SET jumlah=(jumlah-1) WHERE id_pembelian='$id'");
$query2 = mysqli_query($koneksi, "UPDATE tb_pembelian SET total=(total-$harga) WHERE id_pembelian='$id'");
$query3 = mysqli_query($koneksi, "UPDATE tb_barang SET stok=(stok+1) WHERE kode_barcode='$barcode'");

?>
<script>
    window.location.href="?page=pembelian&kodepb=<?php echo $kodepb ?>"
</script>