<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-male fa-fw"></i> Karyawan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<br>
<a href="?page=karyawan&aksi=tambah" class="btn btn-sm btn-primary">Tambah Karyawan</a>
<br>
<br>
<table class="table table-bordered table-responsive" id="tables">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Jabatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = mysqli_query($koneksi, "SELECT * FROM tb_karyawan, tb_jabatan WHERE tb_karyawan.id_jabatan = tb_jabatan.id_jabatan");
        while($row = mysqli_fetch_array($query)){
        ?>
        <tr>
            <td><?php echo $row['nama'] ?></td>
            <td><?php echo $row['alamat'] ?></td>
            <td><?php echo $row['telepon'] ?></td>
            <td><?php echo $row['jabatan'] ?></td>
            <td>
                <?php
                if($row['status'] == "Belum Aktif") {
                    ?>
                        <a href="?page=karyawan&aksi=aktif&id=<?php echo $row['id_karyawan'] ?>" class="btn btn-sm btn-danger">Aktifkan Akun</a>
                    <?php
                } else {
                    ?>
                    <a href="?page=karyawan&aksi=reset&id=<?php echo $row['id_karyawan'] ?>" class="btn btn-sm btn-warning">Reset Akun</a>
                    <?php
                }
                ?>
                <a href="?page=karyawan&aksi=edit&id=<?php echo $row['id_karyawan'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="?page=karyawan&aksi=hapus&id=<?php echo $row['id_karyawan'] ?>" class="btn btn-sm btn-danger">Hapus</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>