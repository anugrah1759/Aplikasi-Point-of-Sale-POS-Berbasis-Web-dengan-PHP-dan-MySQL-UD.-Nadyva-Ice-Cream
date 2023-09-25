<?php
ob_start();
session_start();

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include 'random_code.php';
include 'kode_pembelian.php';
include 'format_rupiah.php';
include 'koneksi.php';

ob_flush();
?>