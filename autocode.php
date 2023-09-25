<?php

	$date= date("Y-m-d");

	$query =mysqli_query($koneksi, "SELECT max(invoice) as maxKode FROM tb_pemesanan");
	$data = mysqli_fetch_array($query);
	$noOrder = $data['maxKode'];
	$noUrut = (int) substr($noOrder, 10, 3);
	$noUrut++;
	$char = "PSN";
	$tahun=substr($date, 0, 4);
	$bulan=substr($date, 5, 2);
	$id_Order = $char .$tahun .$bulan . sprintf("%03s", $noUrut);

?>