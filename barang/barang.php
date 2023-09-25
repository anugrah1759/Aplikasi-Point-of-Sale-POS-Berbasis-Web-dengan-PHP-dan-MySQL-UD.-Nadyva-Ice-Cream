<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-cubes fa-fw"></i> Barang</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<br>
<a href="?page=barang&aksi=tambah" class="btn btn-sm btn-primary">Tambah Barang</a>
<br>
<br>
<table class="table table-responsive table-bordered" id="tables">
    <thead>
        <tr>
            <th>Kode Barcode</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Satuan</th>
            <th width="8%">Harga Jual</th>
            <th width="8%">Harga Beli</th>
            <th>Keuntungan</th>
            <th>Kategori</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $query = mysqli_query($koneksi, "SELECT * FROM tb_kategori INNER JOIN tb_barang ON tb_kategori.id_kategori=tb_barang.id_kategori");
    while($row = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td><?php echo $row['kode_barcode']; ?></td>
            <td><?php echo $row['nama_barang']; ?></td>
            <td><?php echo $row['stok']; ?></td>
            <td><?php echo $row['satuan']; ?></td>
            <td><?php echo $row['harga_jual']; ?></td>
            <td><?php echo $row['harga_beli']; ?></td>
            <td><?php echo $row['keuntungan'] ?></td>
            <td><?php echo $row['nama'] ?></td>
            <td>
                <a href="?page=barang&aksi=edit&id=<?php echo $row['id_barang'] ?>" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square fa-fw"></i> Edit</a>
                <a href="?page=barang&aksi=hapus&id=<?php echo $row['id_barang'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i> Hapus</a>     
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>