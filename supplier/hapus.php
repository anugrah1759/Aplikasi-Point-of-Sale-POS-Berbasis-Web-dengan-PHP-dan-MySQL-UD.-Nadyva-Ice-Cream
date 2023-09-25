<?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM tb_supplier WHERE id_supplier='$id'");
    echo "<meta http-equiv='refresh' content='1;url=?page=supplier'>";
}