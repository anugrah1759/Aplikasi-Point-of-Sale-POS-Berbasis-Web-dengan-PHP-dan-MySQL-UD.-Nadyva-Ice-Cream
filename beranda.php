<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"><i class="fa fa-home fa-fw"></i> Beranda</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <?php if($userData['jabatan'] !== "Gudang") { ?>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i><img src="asset/icon/shopping-cart.png" alt=""></i>
                    </div>
                    <?php
                    $date = date("Y-m-d");
                    $query1 = mysqli_query($koneksi, "SELECT SUM(sub_total) AS pendapatan, COUNT(kode_penjualan) AS penjualan FROM tb_penjualan_detail WHERE tanggal ='$date' ");
                    $data1 = mysqli_fetch_array($query1);
                    ?>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $data1['penjualan'] ?></div>
                        <div>Penjualan <?php echo date("d/m/Y", strtotime($date)); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i><img src="asset/icon/rich.png" alt=""></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">Rp. <?php echo rupiah($data1['pendapatan']) ?></div>
                        <div>Pendapatan <?php echo date("d/m/Y", strtotime($date)); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } if($userData['jabatan'] !== "Kasir") { ?>
    <div class="col-lg-4 col-md-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i><img src="asset/icon/trolley.png" alt=""></i>
                    </div>
                    <?php
                    $query2 = mysqli_query($koneksi, "SELECT SUM(total) AS pengeluaran, COUNT(kode_pembelian) AS pembelian FROM tb_pembelian_detail WHERE tanggal = '$date' ");
                    $data2= mysqli_fetch_array($query2);
                    ?>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $data2['pembelian'] ?></div>
                        <div>Pembelian <?php echo date("d/m/Y", strtotime($date)); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i><img src="asset/icon/payment.png" alt=""></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge">Rp. <?php echo rupiah($data2['pengeluaran']) ?></div>
                        <div>Pengeluaran <?php echo date("d/m/Y", strtotime($date)); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
</div>
<div class="row">
    <div class="col-md-5">
        <h4>Stok Barang Mendekati Habis</h4>
        <table class="table table-responsive table-bordered">
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query3 = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE stok <= 10");
                while($data3 = mysqli_fetch_array($query3)) {
                ?>
                <tr>
                    <td><?php echo $data3['nama_barang'] ?></td>
                    <td><?php echo $data3['stok'] ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-7">
       <?php
        if($userData['jabatan'] == "Gudang") {
        $x=1;
        $sql = mysqli_query($koneksi, "SELECT b.nama_barang, sum(p.jumlah) jumlah FROM tb_pembelian p join tb_barang b WHERE p.kode_barcode = b.kode_barcode GROUP by p.kode_barcode order by jumlah desc limit 10");
        }else{
            $x=1;
        $sql = mysqli_query($koneksi, "SELECT b.nama_barang, sum(p.jumlah) jumlah FROM tb_penjualan p join tb_barang b WHERE p.kode_barcode = b.kode_barcode GROUP by p.kode_barcode order by jumlah desc limit 10");
        }
        while($cell = mysqli_fetch_array($sql)){
            if ($x==1) {
                $satu=$cell['jumlah'];
                $n_satu=$cell['nama_barang'];
                echo'<input type="hidden" id="nama1" value="'.$n_satu.'">';
                echo'<input type="hidden" id="jml1" value="'.$satu.'">';
            } else if ($x==2) {
                $dua=$cell['jumlah'];
                $n_dua=$cell['nama_barang'];
                echo'<input type="hidden" id="nama2" value="'.$n_dua.'">';
                echo'<input type="hidden" id="jml2" value="'.$dua.'">';
            } else if ($x==3) {
                $tiga=$cell['jumlah'];
                $n_tiga=$cell['nama_barang'];
                echo'<input type="hidden" id="nama3" value="'.$n_tiga.'">';
                echo'<input type="hidden" id="jml3" value="'.$tiga.'">';
            } else if ($x==4) {
                $empat=$cell['jumlah'];
                $n_empat=$cell['nama_barang'];
                echo'<input type="hidden" id="nama4" value="'.$n_empat.'">';
                echo'<input type="hidden" id="jml4" value="'.$empat.'">';
            }else if ($x==5) {
                $lima=$cell['jumlah'];
                $n_lima=$cell['nama_barang'];
                echo'<input type="hidden" id="nama5" value="'.$n_lima.'">';
                echo'<input type="hidden" id="jml5" value="'.$lima.'">';
            } else if ($x==6) {
                $enam=$cell['jumlah'];
                $n_enam=$cell['nama_barang'];
                echo'<input type="hidden" id="nama6" value="'.$n_enam.'">';
                echo'<input type="hidden" id="jml6" value="'.$enam.'">';
            } else if ($x==7) {
                $tujuh=$cell['jumlah'];
                $n_tujuh=$cell['nama_barang'];
                echo'<input type="hidden" id="nama7" value="'.$n_tujuh.'">';
                echo'<input type="hidden" id="jml7" value="'.$tujuh.'">';
            }else if ($x==8) {
                $delapan=$cell['jumlah'];
                $n_delapan=$cell['nama_barang'];
                echo'<input type="hidden" id="nama8" value="'.$n_delapan.'">';
                echo'<input type="hidden" id="jml8" value="'.$delapan.'">';
            }else if ($x==9) {
                $sembilan=$cell['jumlah'];
                $n_sembilan=$cell['nama_barang'];
                echo'<input type="hidden" id="nama9" value="'.$n_sembilan.'">';
                echo'<input type="hidden" id="jml9" value="'.$sembilan.'">';
            }else if ($x==10) {
                $sepuluh=$cell['jumlah'];
                $n_sepuluh=$cell['nama_barang'];
                echo'<input type="hidden" id="nama10" value="'.$n_sepuluh.'">';
                echo'<input type="hidden" id="jml10" value="'.$sepuluh.'">';
            }
        $x++;
        }

        
        if($userData['jabatan'] == "Administrator") {
            $i=1;
            $sql2 = mysqli_query($koneksi, "SELECT b.nama_barang, sum(p.jumlah) jumlah FROM tb_pembelian p join tb_barang b WHERE p.kode_barcode = b.kode_barcode GROUP by p.kode_barcode order by jumlah desc limit 10");

            while($row = mysqli_fetch_array($sql2)){
                if ($i==1) {
                    $satu2=$row['jumlah'];
                    $n_satu2=$row['nama_barang'];
                    echo'<input type="hidden" id="nama1a" value="'.$n_satu2.'">';
                    echo'<input type="hidden" id="jml1a" value="'.$satu2.'">';
                } else if ($i==2) {
                    $dua2=$row['jumlah'];
                    $n_dua2=$row['nama_barang'];
                    echo'<input type="hidden" id="nama2a" value="'.$n_dua2.'">';
                    echo'<input type="hidden" id="jml2a" value="'.$dua2.'">';
                } else if ($i==3) {
                    $tiga2=$row['jumlah'];
                    $n_tiga2=$row['nama_barang'];
                    echo'<input type="hidden" id="nama3a" value="'.$n_tiga2.'">';
                    echo'<input type="hidden" id="jml3a" value="'.$tiga2.'">';
                } else if ($i==4) {
                    $empat2=$row['jumlah'];
                    $n_empat2=$row['nama_barang'];
                    echo'<input type="hidden" id="nama4a" value="'.$n_empat2.'">';
                    echo'<input type="hidden" id="jml4a" value="'.$empat2.'">';
                }else if ($i==5) {
                    $lima2=$row['jumlah'];
                    $n_lima2=$row['nama_barang'];
                    echo'<input type="hidden" id="nama5a" value="'.$n_lima2.'">';
                    echo'<input type="hidden" id="jml5a" value="'.$lima2.'">';
                } else if ($i==6) {
                    $enam2=$row['jumlah'];
                    $n_enam2=$row['nama_barang'];
                    echo'<input type="hidden" id="nama6a" value="'.$n_enam2.'">';
                    echo'<input type="hidden" id="jml6a" value="'.$enam2.'">';
                } else if ($i==7) {
                    $tujuh2=$row['jumlah'];
                    $n_tujuh2=$row['nama_barang'];
                    echo'<input type="hidden" id="nama7a" value="'.$n_tujuh2.'">';
                    echo'<input type="hidden" id="jml7a" value="'.$tujuh2.'">';
                }else if ($i==8) {
                    $delapan2=$row['jumlah'];
                    $n_delapan2=$row['nama_barang'];
                    echo'<input type="hidden" id="nama8a" value="'.$n_delapan2.'">';
                    echo'<input type="hidden" id="jml8a" value="'.$delapan2.'">';
                }else if ($i==9) {
                    $sembilan2=$row['jumlah'];
                    $n_sembilan2=$row['nama_barang'];
                    echo'<input type="hidden" id="nama9a" value="'.$n_sembilan2.'">';
                    echo'<input type="hidden" id="jml9a" value="'.$sembilan2.'">';
                }else if ($i==10) {
                    $sepuluh2=$row['jumlah'];
                    $n_sepuluh2=$row['nama_barang'];
                    echo'<input type="hidden" id="nama10a" value="'.$n_sepuluh2.'">';
                    echo'<input type="hidden" id="jml10a" value="'.$sepuluh2.'">';
                }
            $i++;
            }
        }
        ?>

        <div style="width: 100%;height: 300px">
            <canvas id="myChart"></canvas>
        </div>
        <?php if($userData['jabatan'] == "Administrator") { ?>
        <div style="width: 100%;height: 300px">
            <canvas id="myCharta"></canvas>
        </div>
    <?php } ?>
   </div>
</div>