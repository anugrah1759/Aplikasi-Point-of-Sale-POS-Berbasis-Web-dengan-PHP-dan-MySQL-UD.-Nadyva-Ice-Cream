<?php
if(isset($_GET['kodepj'])) {
    $code = $_GET['kodepj'];
}
if (isset($_POST['diproses'])) {
    
    $sql=mysqli_query($koneksi, "select a.*,b.nama_barang,b.harga_jual,a.qty * b.harga_jual as jumlah FROM tb_pemesanan a join tb_barang b on a.barang=b.kode_barcode where a.invoice='".$_POST['proc']."'");
    while ($row=mysqli_fetch_array($sql)) {
        $bar=$row['barang'];
        $sum=$row['qty']*$row['harga_jual'];
        $qty=$row['qty'];
        $tgl=$row['tanggal'];

        $query = mysqli_query($koneksi, "INSERT INTO tb_penjualan SET kode_penjualan='$code', kode_barcode='$bar', jumlah = '$qty', total = '$sum', tgl_penjualan ='$tgl', id_pelanggan = '9', id_karyawan = '$id_karyawan'");
    }

    
    $query=mysqli_query($koneksi, "update tb_pemesanan set jadi='P' where invoice='".$_POST['proc']."'");

    if (!$query) {
        echo "<script type='text/javascript'>alert('pesanan gagal diproses')</script>";
    }
}

?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-shopping-cart fa-fw"></i> Penjualan</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<form method="POST">
    <div class="form-group">
        <label for="kodejual" class="label-control col-md-3">Kode Penjualan</label>
        <div class="col-md-3">
            <input type="text" name="kodejual" id="kodejual" readonly class="form-control" value="<?php echo $code; ?>">
        </div>
    </div>
    <div class="col-md-6"><br><br></div>
    <div class="form-group">
        <label for="kodejual" class="label-control col-md-3">Barang</label>
        <div class="col-md-4">
            <select name="barcode" id="barcode" class="chosen-select form-control" autofocus>
                <option value="">Masukkan Barang</option>
                <?php
                $sql = mysqli_query($koneksi, "SELECT * FROM tb_barang");
                while($pecah = mysqli_fetch_array($sql)) {
                    ?>
                    <option value="<?php echo $pecah['kode_barcode'] ?>"><?php echo $pecah['kode_barcode']." ".$pecah['nama_barang']." Rp.".rupiah($pecah['harga_jual']) ?></option>
                    <?php
                }
                ?>
            </select>

            <!-- <input type="text" name="barcode" id="barcode" class="form-control" autofocus> -->
        </div>
    </div>
    <div class="form-group">
        <label for="jumlah" class="label-control col-md-1">Jumlah</label>
        <div class="col-md-3">
            <input type="number" name="jumlah" id="jumlah" class="form-control" >
        </div>
    </div>
    <div class="col-md-12"><br></div>
    <div class="form-group">
    <label for="pelanggan" class="label-control col-md-3">Nama Pelanggan</label>
    <div class="col-md-4">
        <select name="pelanggan" id="pelanggan" class="chosen-select form-control">
            <option >Pilih Pelanggan</option>
            <?php 
            $query4 = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan");
            while($pelanggan = mysqli_fetch_array($query4)){
                echo "
                    <option value=$pelanggan[id_pelanggan]>$pelanggan[nama]</option>
                ";
            }
            ?>
        </select>
    </div>
</div>
    <div class="form-group">
        <div class="col-md-3">
            <input type="submit" name="tambahkan" class="btn btn-sm btn-primary" value="Tambahkan">
        </div>
    </div>
</form>
<!-- tambah daftar belanja --> 
<?php
if(isset($_POST['tambahkan'])) {
    $date = date("Y-m-d");
    $kodepj = $_POST['kodejual'];
    $barcode = $_POST['barcode'];
    $pelanggan1 = $_POST['pelanggan'];

    $barang = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE kode_barcode = '$barcode'");
    $data_barang = mysqli_fetch_array($barang);
    $harga_jual = $data_barang['harga_jual'];
    $jumlah = $_POST['jumlah'];
    $total = $jumlah * $harga_jual;

    $barang2 = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE kode_barcode = '$barcode'");
    while($data_barang2 = mysqli_fetch_array($barang2)) {
        $sisa = $data_barang2['stok'];
        if($sisa == 0) {
            ?>
            <script>alert("Barang Habis");
            //window.location.href="?page=penjualan&kodepj=<?php //echo $code ?>"
            </script>
            <?php
        } elseif($jumlah > $sisa) {
            ?>
            <script>alert("Jumlah Barang Diminta melebihi stok");
            //window.location.href="?page=penjualan&kodepj=<?php //echo $code ?>"
            </script>
            <?php
        } else {
            $query = mysqli_query($koneksi, "INSERT INTO tb_penjualan SET kode_penjualan='$kodepj', kode_barcode='$barcode', jumlah = '$jumlah', total = '$total', tgl_penjualan ='$date', id_pelanggan = '$pelanggan1', id_karyawan = '$id_karyawan'");
        }
    }
}
$query3 = mysqli_query($koneksi, "SELECT * FROM tb_penjualan_detail WHERE kode_penjualan='$code'");
$data3 = mysqli_fetch_array($query3);
?>
<br>
<br>
<br><br><br><br><hr>
<form method="post">
<h3>Daftar Belanjaan</h3>
<hr>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th>Kode Barcode</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $total_bayar=0;
        $query2 = mysqli_query($koneksi, "SELECT * FROM tb_penjualan, tb_barang WHERE tb_penjualan.kode_barcode = tb_barang.kode_barcode AND kode_penjualan = '$code'");
        while($data2 = mysqli_fetch_array($query2)) {
            ?>
            <tr>
                <td><?php echo $data2['kode_barcode'] ?></td>
                <td><?php echo $data2['nama_barang']?></td>
                <td><?php echo rupiah($data2['harga_jual']) ?></td>
                <td><?php echo $data2['jumlah'] ?></td>
                <td><?php echo rupiah($data2['total']) ?></td>
                <td>
                    <a href="?page=penjualan&aksi=tambah&id=<?php echo $data2['id_penjualan'] ?>&kodepj=<?php echo $data2['kode_penjualan'] ?>&harga=<?php echo $data2['harga_jual'] ?>&barcode=<?php echo $data2['kode_barcode'] ?>" class="btn btn-sm btn-success"><b>+</b></a>

                    <a href="?page=penjualan&aksi=kurang&id=<?php echo $data2['id_penjualan'] ?>&kodepj=<?php echo $data2['kode_penjualan'] ?>&harga=<?php echo $data2['harga_jual'] ?>&barcode=<?php echo $data2['kode_barcode'] ?>" class="btn btn-sm btn-success"><b>-</b></a>

                    <a href="?page=penjualan&aksi=hapus&id=<?php echo $data2['id_penjualan'] ?>&kodepj=<?php echo $data2['kode_penjualan'] ?>&harga=<?php echo $data2['harga_jual'] ?>&barcode=<?php echo $data2['kode_barcode'] ?>&jumlah=<?php echo $data2['jumlah'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i></a>
                </td>
            </tr>
            <?php
            $total_bayar = $total_bayar + $data2['total'];
        }
        ?>
    </tbody>
</table>
<hr>
    <div class="form-group">
        <label for="total_bayar" class="label-control col-md-3">Total</label>
        <div class="col-md-3">
            <input type="number" name="total_bayar" id="total_bayar" onkeyup="hitung();" readonly="" class="form-control" value="<?php echo $total_bayar ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="s_total" class="label-control col-md-3">Sub Total</label>
        <div class="col-md-3">
            <input type="number" name="s_total" id="s_total" readonly="" onkeyup="hitung();" class="form-control" value="<?php echo $data3['sub_total'] ?>">
        </div>
    </div>
    <br>
    <div class="form-group">
        <label for="diskon" class="label-control col-md-3">Diskon</label>
        <div class="col-md-3">
            <input type="number" name="diskon" id="diskon" onkeyup="hitung();" class="form-control" value="<?php echo $data3['diskon'] ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="bayar" class="label-control col-md-3">Bayar</label>
        <div class="col-md-3">
            <input type="number" name="bayar" onkeyup="hitung();" id="bayar" class="form-control" value="<?php echo $data3['bayar'] ?>">
        </div>
    </div>
    <br>
    <div class="form-group">
        <label for="potongan" class="label-control col-md-3">Potongan Diskon</label>
        <div class="col-md-3">
            <input type="number" name="potongan" id="potongan" readonly="" onkeyup="hitung();" class="form-control" value="<?php echo $data3['potongan_diskon'] ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="kembali" class="label-control col-md-3">Kembalian</label>
        <div class="col-md-3">
            <input type="number" name="kembali" id="kembali" readonly="" onkeyup="hitung();" class="form-control" value="<?php echo $data3['kembalian'] ?>">
        </div>
    </div><br><br>
    <input type="submit" name="simpan" class="btn btn-md btn-success" value="Simpan">
    <button type="button" class="btn btn-md btn-primary" onclick="window.open('penjualan/struk.php?kodepj=<?php echo $code; ?>','mywindow','width=450, height=400')"><i class="fa fa-print fa-fw"></i> Cetak</button>
</form>
<br>
<?php
if(isset($_POST['simpan'])) {
    $total_byr = $_POST["total_bayar"];
    $diskon = $_POST['diskon'];
    $potongan = $_POST['potongan'];
    $sub_total = $_POST['s_total'];
    $bayar = $_POST['bayar'];
    $kembali = $_POST['kembali'];
    $tanggal = date("Y-m-d");

    mysqli_query($koneksi, "INSERT INTO tb_penjualan_detail SET kode_penjualan ='$code', total = '$total_byr', diskon = '$diskon', potongan_diskon = '$potongan', sub_total = '$sub_total', bayar = '$bayar', kembalian = '$kembali', tanggal = '$tanggal'");
}
?>
<script>
    function hitung() {
        var diskon = document.getElementById('diskon').value;
        var total_bayar = document.getElementById('total_bayar').value;
        var diskon_potongan = parseInt(total_bayar) * parseInt(diskon) / parseInt(100);

        if(!isNaN(diskon_potongan)) {
            var potongan = document.getElementById('potongan').value = diskon_potongan;
        } 

        var sub_total = parseInt(total_bayar) - parseInt(potongan);

        if(!isNaN(sub_total)) {
            var s_total = document.getElementById('s_total').value = sub_total;
        } 

        var bayar = document.getElementById('bayar').value;

        var b_bayar = parseInt(bayar) - parseInt(s_total);

        if(!isNaN(b_bayar)) {
            var kembali = document.getElementById('kembali').value = b_bayar;
        }
    }
</script>