<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-shopping-cart fa-fw"></i> Riwayat Penjualan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <table class="table table-responsive table-bordered" id="tables">
        <thead>
            <tr>
                <th>Kode Penjualan</th>
                <th>Total Bayar</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM tb_penjualan_detail");
            while($row = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?php echo $row['kode_penjualan'] ?></td>
                    <td><?php echo $row['sub_total'] ?></td>
                    <td><?php echo $row['tanggal'] ?></td>
                    <td>
                        <a href="?page=laporan&aksi=detail_penjualan&kode=<?php echo $row['kode_penjualan'] ?>" class="btn btn-sm btn-primary">Detail</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>