<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Kategori Barang</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<br>
<a href="?page=kategori&aksi=tambah" class="btn btn-sm btn-primary">Tambah Kategori</a>
<br>
<br>
<table class="table table-responsive table-bordered" id="tables">
    <thead>
        <tr>
            <th width="8%">No</th>
            <th>Nama Kategori</th>
            <th>Deskripsi</th>
            <th width="20%">Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $no=1;
    $query = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
    while($row = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['deskripsi']; ?></td>
            <td>
                <a href="?page=kategori&aksi=edit&id=<?php echo $row['id_kategori'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square fa-fw"></i> Edit</a>
                <a href="?page=kategori&aksi=hapus&id=<?php echo $row['id_kategori'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i> Hapus</a>     
            </td>
        </tr>
        <?php
        $no++;
    }
    ?>
    </tbody>
</table>