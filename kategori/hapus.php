<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM tb_kategori WHERE id_kategori='$id'");
    echo "<meta http-equiv='refresh' content='1;url=?page=kategori'>";
}