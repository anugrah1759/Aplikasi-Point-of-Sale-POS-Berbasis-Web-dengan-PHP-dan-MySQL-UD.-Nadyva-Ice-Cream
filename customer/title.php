<?php
$page = $_GET["page"];
$aksi = $_GET["aksi"];


if($page == "pemesanan") {
    if($aksi == "") {
        echo "Pemesanan - Point Of Sale";
    } if($aksi == "preview") {
        echo " Preview Pemesanan - Point Of Sale";
    }
}