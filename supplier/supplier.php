<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-truck fa-fw"></i> Supplier</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<a href="?page=supplier&aksi=tambah" class="btn btn-sm btn-info">Tambah Supplier</a>
<br><br>
<table class="table table-responsive table-bordered" id="tables">
    <thead>
        <tr>
            <th>Nama Supplier</th>
            <th>Alamat</th>
            <th>No Telepon/Hp</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM tb_supplier");
        while($row = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td><?php echo $row['nama'] ?></td>
                <td><?php echo $row['alamat'] ?></td>
                <td><?php echo $row['telepon'] ?></td>
                <td>
                    <a href="?page=supplier&aksi=edit&id=<?php echo $row['id_supplier'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="?page=supplier&aksi=hapus&id=<?php echo $row['id_supplier'] ?>" class="btn btn-sm btn-danger">Hapus</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>