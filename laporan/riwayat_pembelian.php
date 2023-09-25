<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-cart-plus fa-fw"></i> Riwayat Pembelian</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<div class="row">
    <table class="table table-responsive table-bordered" id="tables">
        <thead>
            <tr>
                <th>Kode Pembelian</th>
                <th>Total Bayar</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM tb_pembelian_detail");
            while($row = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?php echo $row['kode_pembelian'] ?></td>
                    <td><?php echo $row['total'] ?></td>
                    <td><?php echo $row['tanggal'] ?></td>
                    <td>
                        <a href="?page=laporan&aksi=detail_pembelian&kode=<?php echo $row['kode_pembelian'] ?>" class="btn btn-sm btn-primary">Detail</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>