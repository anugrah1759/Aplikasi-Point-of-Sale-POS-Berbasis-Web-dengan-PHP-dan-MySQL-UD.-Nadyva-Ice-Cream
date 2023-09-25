<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-male fa-fw"></i> Tambah Karyawan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<form method="post" id="karyawan">
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" class="form-control" id="nama">
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea name="alamat" id="alamat" cols="10" rows="7" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="telp">Telepon/Hp</label>
        <input type="text" name="telp" class="form-control" id="telp">
    </div>
    <div class="form-group">
        <label for="jabatan">Jabatan</label>
        <select name="jabatan" id="jabatan" class="form-control">
            <option value="">--Pilih Jabatan--</option>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM tb_jabatan");
            while($jabatan = mysqli_fetch_array($query)) {
                echo "<option value='$jabatan[id_jabatan]'>$jabatan[jabatan]</option>";
            }
            ?>
        </select>
    </div>
    <input type="submit" name="simpan" value="Simpan" class="btn btn-lg btn-block btn-primary">
</form>
<br>
<br>
<?php
if(isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $jabatan = $_POST['jabatan'];

    mysqli_query($koneksi, "INSERT INTO tb_karyawan SET nama = '$nama', alamat = '$alamat', telepon = '$telp', id_jabatan = '$jabatan'");
    echo "<meta http-equiv='refresh' content='1;url=?page=karyawan'>";
}
?>