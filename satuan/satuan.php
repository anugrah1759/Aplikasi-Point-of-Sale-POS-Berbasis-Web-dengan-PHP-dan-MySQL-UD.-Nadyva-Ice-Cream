<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Satuan Barang</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<br>
<a href="?page=satuan&aksi=tambah" class="btn btn-md btn-primary">Tambah</a>
<br>
<br>
<table class="table table-responsive table-bordered" id="tables">
    <thead>
        <tr>
            <th>No</th>
            <th>Satuan Barang</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM tb_satuan");
        while($row = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row['satuan'] ?></td>
                <td>
                    <a href="?page=satuan&aksi=edit&id=<?php echo $row['id_satuan'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="?page=satuan&aksi=hapus&id=<?php echo $row['id_satuan'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            <?php
            $no++;
        }
        ?>
    </tbody>
</table>