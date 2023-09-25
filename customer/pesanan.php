<?php
if (isset($_POST['dihapus'])) {
        $query=mysqli_query($koneksi, "delete from tb_pemesanan where invoice='".$_POST['pk_hapus']."'");

        if ($query) {
            echo "<script type='text/javascript'>alert('pemesanan berhasil dihapus | delete from tb_pemesanan where invoice=".$_POST['pk_hapus']."')</script>";
        }
        else {
            echo "<script type='text/javascript'>alert('pemesanan gagal dihapus')</script>";
        }
    }

    if (isset($_POST['save'])) {
        $query=mysqli_query($koneksi, "update tb_pemesanan set jadi='Y' where invoice='".$_POST['pk']."'");

        if ($query) {
            echo "<script type='text/javascript'>alert('permintaan anda telah dikirim')</script>";
        }
        else {
            echo "<script type='text/javascript'>alert('permintaan anda gagal dikirim')</script>";
        }
    }
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-cubes fa-fw"></i> List Stok Barang</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<br>
<br>
<form action="index.php?page=pemesanan&aksi=preview&id=<?php echo $id_Order; ?>" method="POST">
<table class="table table-responsive table-bordered" id="tables">
    <thead>
        <tr>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Satuan</th>
            <th width="8%">Harga</th>
            <th>Kategori</th>
            <th>Jumlah Pesan</th>
        </tr>
    </thead>
    <tbody>
        
    <?php
    
    $query = mysqli_query($koneksi, "SELECT * FROM tb_kategori INNER JOIN tb_barang ON tb_kategori.id_kategori=tb_barang.id_kategori");
    while($row = mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td><?php echo $row['nama_barang']; ?></td>
            <td><?php echo $row['stok']; ?></td>
            <td><?php echo $row['satuan']; ?></td>
            <td><?php echo $row['harga_jual']; ?></td>
            <td><?php echo $row['nama'] ?></td>
            <td>
                
                    <input type="hidden" name="barang[]" value="<?php echo $row['kode_barcode']; ?>">
                    <input type="number" name="qty[]" id="<?php echo $row['kode_barcode']; ?>" min="0" value="0" style="width: 100%;outline: none !important;border: 0px">
                
            </td>
            
        </tr>

        <?php
        
    }
    ?>
    
    </tbody>
</table>
<input class="form-control pelanggan" placeholder="Nama Pemesan" style="width: 50%" type="text" name="pelanggan">
<br>
<input class="btn btn-sm btn-primary" value="Pesan" type="submit" name="add">
</form>
