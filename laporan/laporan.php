<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-book fa-fw"></i> Laporan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
<?php if($userData['jabatan'] == "Kasir") { ?>
    <div class="col-md-3 col-md-6">
        <a href="?page=laporan&aksi=riwayat_penjualan">
            <div class="panel panel-info">
                <div class="panel-heading text-center">
                    <i><img src="asset/icon/shopping-cart.png" alt=""></i>
                    <div class="huge-1">Riwayat Penjualan</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 col-md-6">
        <a href="?page=laporan&aksi=laporan_penjualan">
            <div class="panel panel-red">
                <div class="panel-heading text-center">
                    <i><img src="asset/icon/book.png" alt=""></i>
                    <div class="huge-1">Laporan Penjualan</div>
                </div>
            </div>
        </a>
    </div>
    <?php } elseif($userData['jabatan'] == "Gudang") { ?>
    <div class="col-md-3 col-md-6">
        <a href="?page=laporan&aksi=riwayat_pembelian">
            <div class="panel panel-green">
                <div class="panel-heading text-center">
                    <i><img src="asset/icon/trolley.png" alt=""></i>
                    <div class="huge-1">Riwayat Pembelian</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 col-md-6">
        <a href="?page=laporan&aksi=laporan_pembelian">
            <div class="panel panel-yellow">
                <div class="panel-heading text-center">
                    <i><img src="asset/icon/book.png" alt=""></i>
                    <div class="huge-1">Laporan Pembelian</div>
                </div>
            </div>
        </a>
    </div>
<?php } elseif($userData['jabatan'] == "Administrator"){ ?>
    <div class="col-md-3 col-md-6">
        <a href="?page=laporan&aksi=riwayat_penjualan">
            <div class="panel panel-info">
                <div class="panel-heading text-center">
                    <i><img src="asset/icon/shopping-cart.png" alt=""></i>
                    <div class="huge-1">Riwayat Penjualan</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 col-md-6">
        <a href="?page=laporan&aksi=laporan_penjualan">
            <div class="panel panel-red">
                <div class="panel-heading text-center">
                    <i><img src="asset/icon/book.png" alt=""></i>
                    <div class="huge-1">Laporan Penjualan</div>
                </div>
            </div>
        </a>
    </div>
<div class="col-md-3 col-md-6">
        <a href="?page=laporan&aksi=riwayat_pembelian">
            <div class="panel panel-green">
                <div class="panel-heading text-center">
                    <i><img src="asset/icon/trolley.png" alt=""></i>
                    <div class="huge-1">Riwayat Pembelian</div>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-3 col-md-6">
        <a href="?page=laporan&aksi=laporan_pembelian">
            <div class="panel panel-yellow">
                <div class="panel-heading text-center">
                    <i><img src="asset/icon/book.png" alt=""></i>
                    <div class="huge-1">Laporan Pembelian</div>
                </div>
            </div>
        </a>
    </div>
    <?php } ?>
</div>