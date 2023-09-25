<?php
$page = $_GET["page"];
$aksi = $_GET["aksi"];

if ($page == "beranda") {
    if ($aksi == "") {
        include "beranda.php";
    }
}

elseif ($page == "kategori") {
    if ($aksi == "") {
        include "kategori/kategori.php";
    } if ($aksi == "tambah") {
        include "kategori/tambah.php";
    } if ($aksi == "edit") {
        include "kategori/edit.php";
    } if ($aksi == "hapus") {
        include "kategori/hapus.php";
    }
}

elseif ($page == "barang") {
    if ($aksi == "") {
        include "barang/barang.php";
    } if ($aksi == "tambah") {
        include "barang/tambah.php";
    } if ($aksi == "edit") {
        include "barang/edit.php";
    } if ($aksi == "hapus") {
        include "barang/hapus.php";
    }
}

elseif ($page == "pelanggan") {
    if ($aksi == "") {
        include "pelanggan/pelanggan.php";
    } if ($aksi == "tambah") {
        include "pelanggan/tambah.php";
    } if ($aksi == "edit") {
        include "pelanggan/edit.php";
    } if ($aksi == "hapus") {
        include "pelanggan/hapus.php";
    }
}

elseif ($page == "penjualan") {
    if ($aksi == "") {
        include "penjualan/penjualan.php";
    } if ($aksi == "tambah") {
        include "penjualan/tambah.php";
    } if ($aksi == "kurang") {
        include "penjualan/kurang.php";
    } if ($aksi == "hapus") {
        include "penjualan/hapus.php";
    }
}

elseif ($page == "pembelian") {
    if ($aksi == "") {
        include "pembelian/pembelian.php";
    } if ($aksi == "tambah") {
        include "pembelian/tambah.php";
    } if ($aksi == "kurang") {
        include "pembelian/kurang.php";
    } if ($aksi == "hapus") {
        include "pembelian/hapus.php";
    }
}

elseif ($page == "supplier") {
    if ($aksi == "") {
        include "supplier/supplier.php";
    } if ($aksi == "tambah") {
        include "supplier/tambah.php";
    } if ($aksi == "edit") {
        include "supplier/edit.php";
    } if ($aksi == "hapus") {
        include "supplier/hapus.php";
    }
}

elseif ($page == "karyawan") {
    if ($aksi == "") {
        include "karyawan/karyawan.php";
    } if ($aksi == "tambah") {
        include "karyawan/tambah.php";
    } if ($aksi == "edit") {
        include "karyawan/edit.php";
    } if ($aksi == "hapus") {
        include "karyawan/hapus.php";
    } if ($aksi == "aktif") {
        include "karyawan/aktif.php";
    } if ($aksi == "reset") {
        include "karyawan/reset.php";
    } 
}

elseif ($page == "laporan") {
    if($aksi == "") {
        include 'laporan/laporan.php';
    } if($aksi == "riwayat_penjualan") {
        include 'laporan/riwayat_penjualan.php';
    } if($aksi == 'detail_penjualan') {
        include 'laporan/detail_penjualan.php';
    } if($aksi == 'laporan_penjualan') {
        include 'laporan/laporan_penjualan.php';
    } if($aksi == "riwayat_pembelian") {
        include 'laporan/riwayat_pembelian.php';
    } if($aksi == 'detail_pembelian') {
        include 'laporan/detail_pembelian.php';
    } if($aksi == 'laporan_pembelian') {
        include 'laporan/laporan_pembelian.php';
    } 
}

elseif ($page == "satuan") {
    if($aksi == "") {
        include 'satuan/satuan.php';
    } if($aksi == 'tambah') {
        include 'satuan/tambah.php';
    } if($aksi == 'edit') {
        include 'satuan/edit.php';
    } if($aksi == 'hapus') {
        include 'satuan/hapus.php';
    }
}

elseif ($page == "user") {
    if ($aksi == "") {
        include 'user/user.php';
    }
}

elseif($page == "pengaturan_aplikasi") {
    if($aksi == "") {
        include "pengaturan_aplikasi.php";
    }
}

elseif($page == "pemesanan") {
    if($aksi == "") {
        include "pemesanan/pesanan.php";
    } if($aksi == "preview") {
        include "pemesanan/preview.php";
    }
}

else {
    include 'beranda.php';
}