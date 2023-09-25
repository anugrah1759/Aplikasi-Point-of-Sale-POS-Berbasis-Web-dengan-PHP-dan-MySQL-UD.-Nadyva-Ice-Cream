<?php
$page = $_GET["page"];
$aksi = $_GET["aksi"];

if ($page == "beranda") {
    if ($aksi == "") {
        echo "Beranda - Point Of Sale";
    }
}

elseif ($page == "kategori") {
    if ($aksi == "") {
        echo "Kategori - Point Of Sale";
    } if ($aksi == "tambah") {
        echo "Tambah Kategori - Point Of Sale";
    } if ($aksi == "edit") {
        echo "Edit Kategori - Point Of Sale";
    } if ($aksi == "hapus") {
        echo "Hapus Kategori - Point Of Sale";
    }
}

elseif ($page == "barang") {
    if ($aksi == "") {
        echo "Barang - Point Of Sale";
    } if ($aksi == "tambah") {
        echo "Tambah Barang - Point Of Sale";
    } if ($aksi == "edit") {
        echo "Edit Barang - Point Of Sale";
    } if ($aksi == "hapus") {
        echo "Hapus Barang - Point Of Sale";
    }
}

elseif ($page == "pelanggan") {
    if ($aksi == "") {
        echo "Pelanggan - Point Of Sale";
    } if ($aksi == "tambah") {
        echo "Tambah Pelanggan - Point Of Sale";
    } if ($aksi == "edit") {
        echo "Edit Pelanggan - Point Of Sale";
    } if ($aksi == "hapus") {
        echo "Hapus Pelanggan - Point Of Sale";
    }
}

elseif ($page == "supplier") {
    if ($aksi == "") {
        echo "Supplier - Point Of Sale";
    } if ($aksi == "tambah") {
        echo "Tambah Supplier - Point Of Sale";
    } if ($aksi == "edit") {
        echo "Edit Supplier - Point Of Sale";
    } if ($aksi == "hapus") {
        echo "Hapus Supplier - Point Of Sale";
    }
}

elseif ($page == "karyawan") {
    if ($aksi == "") {
        echo "Karyawan - Point Of Sale";
    } if ($aksi == "tambah") {
        echo "Tambah Karyawan - Point Of Sale";
    } if ($aksi == "edit") {
        echo "Edit Karyawan - Point Of Sale";
    } if ($aksi == "hapus") {
        echo "Hapus Karyawan - Point Of Sale";
    } if ($aksi == "aktif") {
        echo "Aktifkan Akun Karyawan - Point Of Sale";
    } if ($aksi == "reset") {
        echo "Reset Akun Karyawan - Point Of Sale";
    }
}

elseif ($page == "laporan") {
    if($aksi == "") {
        echo "Laporan - Point Of Sale";
    } if($aksi == "riwayat_penjualan") {
        echo "Riwayat Penjualan - Point Of Sale";
    } if($aksi == 'detail_penjualan') {
        echo "Detail Penjualan - Point Of Sale";
    } if($aksi == 'laporan_penjualan') {
        echo "Laporan Penjualan - Point Of Sale";
    } if($aksi == "riwayat_pembelian") {
        echo "Riwayat Pembelian - Point Of Sale";
    } if($aksi == 'detail_pembelian') {
        echo "Detail Pembelian - Point Of Sale";
    } if($aksi == 'laporan_pembelian') {
        echo "Laporan Pembelian - Point Of Sale";
    } 
}

elseif($page == "satuan") {
    if($aksi == "") {
        echo "Satuan Barang - Point Of Sale";
    } if($aksi == 'tambah') {
        echo "Satuan Barang - Point Of Sale";
    } if($aksi == 'edit') {
        echo "Satuan Barang - Point Of Sale";
    } if($aksi == 'hapus') {
        echo "Satuan Barang - Point Of Sale";
    }
}

elseif ($page == "penjualan") {
    if ($aksi == "") {
        echo "Penjualan Barang - Pointt Of Sale";
    }
}

elseif ($page == "pembelian") {
    if ($aksi == "") {
        echo "Pembelian Barang - Point Of Sale";
    }
}

elseif($page == "pengaturan_aplikasi") {
    if($aksi == "") {
        echo "Pengaturan Aplikasi - Point Of Sale";
    }
}

elseif($page == "pemesanan") {
    if($aksi == "") {
        echo "Pemesanan - Point Of Sale";
    } if($aksi == "preview") {
        echo " Preview Pemesanan - Point Of Sale";
    }
}

elseif($page == "user") {
    if($aksi == "") {
        echo "User - Point Of Sale";
    } 
}

else {
    echo "Beranda - Point Of Sale";
}