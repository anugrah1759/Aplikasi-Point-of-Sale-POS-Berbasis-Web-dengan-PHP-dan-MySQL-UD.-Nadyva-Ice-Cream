<?php
$page = $_GET["page"];
$aksi = $_GET["aksi"];

if($page == "pemesanan") {
    if($aksi == "") {
        include "pesanan.php";
    } if($aksi == "preview") {
        include "preview.php";
    }
}
