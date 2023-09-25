<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM tb_karyawan WHERE id_karyawan='$id'");
    $data = mysqli_fetch_array($query);

    $potong_nama = explode(" ",$data['nama']);
    $username = strtoupper($potong_nama[0]);
    $password = sha1(md5(strtoupper($potong_nama[0])));

    mysqli_query($koneksi, "INSERT INTO tb_admin SET username = '$username', password = '$password', id_karyawan = '$id'");
    mysqli_query($koneksi, "UPDATE tb_karyawan SET status = 'Aktif' WHERE id_karyawan = '$id'");
    echo "<meta http-equiv='refresh' content='1;url=?page=karyawan'>";
}