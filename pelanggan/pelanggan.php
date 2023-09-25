<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-users fa-fw"></i> Pelanggan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<br>
<a href="?page=pelanggan&aksi=tambah" class="btn btn-sm btn-primary">Tambah Pelanggan</a>
<br>
<br>
<table class="table table-responsive table-bordered" id="tables">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Alamat </th>
            <th>No. Telp/HP</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $no=1;
    $query = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan");
    while($row = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['no_telepon']; ?></td>
            <td>
                <a href="?page=pelanggan&aksi=edit&id=<?php echo $row['id_pelanggan'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square fa-fw"></i> Edit</a>
                <a href="?page=pelanggan&aksi=hapus&id=<?php echo $row['id_pelanggan'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i> Hapus</a>     
            </td>
        </tr>
        <?php
        $no++;
    }
    ?>
    </tbody>
</table>