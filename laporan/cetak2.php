<?php
// $koneksi = mysqli_connect('localhost','root','','db_pos');
include '../koneksi.php';
include '../format_rupiah.php';
$mulai = $_GET['mulai'];
$akhir = $_GET['akhir'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_pembelian, tb_barang WHERE (tgl_pembelian BETWEEN '$mulai' AND '$akhir') AND tb_pembelian.kode_barcode = tb_barang.kode_barcode");
?>
<title>Laporan Pembelian</title>
<script type="text/javascript" src="../Chart.js"></script>
<style>
.container {
    width: 80%;
    padding-right: 20px;
    padding-left: 20px;
    margin-right: auto;
    margin-left: auto;
}
</style>
<div class='container' onclick="window.print()">
    <h1 align="center">UD. NADYVA ICE CREAM</h1>
    <br>
    <br>
    Laporan Pembelian Tanggal <?php echo $mulai." Sampai ". $akhir ?>
    <br>
    <br>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Tanggal Penjualan</th>
                <th width="200px">Kode Barcode</th>
                <th width="200px">Nama Barang</th>
                <th>Jumlah</th>
                <th width="150px">Harga Jual</th>
                <th width="200px">Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            while($row = mysqli_fetch_array($query)){
            ?>
                <tr>
                    <td><?php echo $row['tgl_pembelian'] ?></td>
                    <td><?php echo $row['kode_barcode']; ?></td>
                    <td><?php echo $row['nama_barang']; ?></td>
                    <td><?php echo $row['jumlah']; ?></td>
                    <td><?php echo rupiah($row['harga_beli']); ?></td>
                    <td><?php echo rupiah($row['total']); ?></td>
                </tr>
            <?php 
            $total = $total + $row['total'];
            } ?> 
            <tr>
                <td colspan="5">Jumlah Pendapatan</td>
                <td><b>Rp. <?php echo rupiah($total) ?></b></td>
            </tr>
        </tbody>
    </table>
    <?php
    $x=1;
    $query = mysqli_query($koneksi, "SELECT b.nama_barang, sum(p.jumlah) jumlah FROM tb_pembelian p join tb_barang b WHERE (p.tgl_pembelian BETWEEN '$mulai' AND '$akhir') AND p.kode_barcode = b.kode_barcode GROUP by p.kode_barcode order by jumlah desc limit 10");
    while($row = mysqli_fetch_array($query)){
        if ($x==1) {
            $satu=$row['jumlah'];
            $n_satu=$row['nama_barang'];
            echo'<input type="hidden" id="nama1" value="'.$n_satu.'">';
            echo'<input type="hidden" id="jml1" value="'.$satu.'">';
        } else if ($x==2) {
            $dua=$row['jumlah'];
            $n_dua=$row['nama_barang'];
            echo'<input type="hidden" id="nama2" value="'.$n_dua.'">';
            echo'<input type="hidden" id="jml2" value="'.$dua.'">';
        } else if ($x==3) {
            $tiga=$row['jumlah'];
            $n_tiga=$row['nama_barang'];
            echo'<input type="hidden" id="nama3" value="'.$n_tiga.'">';
            echo'<input type="hidden" id="jml3" value="'.$tiga.'">';
        } else if ($x==4) {
            $empat=$row['jumlah'];
            $n_empat=$row['nama_barang'];
            echo'<input type="hidden" id="nama4" value="'.$n_empat.'">';
            echo'<input type="hidden" id="jml4" value="'.$empat.'">';
        }else if ($x==5) {
            $lima=$row['jumlah'];
            $n_lima=$row['nama_barang'];
            echo'<input type="hidden" id="nama5" value="'.$n_lima.'">';
            echo'<input type="hidden" id="jml5" value="'.$lima.'">';
        } else if ($x==6) {
            $enam=$row['jumlah'];
            $n_enam=$row['nama_barang'];
            echo'<input type="hidden" id="nama6" value="'.$n_enam.'">';
            echo'<input type="hidden" id="jml6" value="'.$enam.'">';
        } else if ($x==7) {
            $tujuh=$row['jumlah'];
            $n_tujuh=$row['nama_barang'];
            echo'<input type="hidden" id="nama7" value="'.$n_tujuh.'">';
            echo'<input type="hidden" id="jml7" value="'.$tujuh.'">';
        }else if ($x==8) {
            $delapan=$row['jumlah'];
            $n_delapan=$row['nama_barang'];
            echo'<input type="hidden" id="nama8" value="'.$n_delapan.'">';
            echo'<input type="hidden" id="jml8" value="'.$delapan.'">';
        }else if ($x==9) {
            $sembilan=$row['jumlah'];
            $n_sembilan=$row['nama_barang'];
            echo'<input type="hidden" id="nama9" value="'.$n_sembilan.'">';
            echo'<input type="hidden" id="jml9" value="'.$sembilan.'">';
        }else if ($x==10) {
            $sepuluh=$row['jumlah'];
            $n_sepuluh=$row['nama_barang'];
            echo'<input type="hidden" id="nama10" value="'.$n_sepuluh.'">';
            echo'<input type="hidden" id="jml10" value="'.$sepuluh.'">';
        }
    $x++;
    }
    ?>

    <div style="width: 1000px;height: 500px">
        <canvas id="myChart"></canvas>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.0.min.js"></script>

    <script>
        var nama1 = $("#nama1").val();
        var nama2 = $("#nama2").val();
        var nama3 = $("#nama3").val();
        var nama4 = $("#nama4").val();
        var nama5 = $("#nama5").val();
        var nama6 = $("#nama6").val();
        var nama7 = $("#nama7").val();
        var nama8 = $("#nama8").val();
        var nama9 = $("#nama9").val();
        var nama10 = $("#nama10").val();

        var jml1 = $("#jml1").val();
        var jml2 = $("#jml2").val();
        var jml3 = $("#jml3").val();
        var jml4 = $("#jml4").val();
        var jml5 = $("#jml5").val();
        var jml6 = $("#jml6").val();
        var jml7 = $("#jml7").val();
        var jml8 = $("#jml8").val();
        var jml9 = $("#jml9").val();
        var jml10 = $("#jml10").val();


        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [nama1, nama2, nama3, nama4, nama5, nama6, nama7, nama8, nama9, nama10],
                datasets: [{
                    label: 'Pembelian',
                    data: [jml1, jml2, jml3, jml4, jml5, jml6, jml7, jml8, jml9, jml10],
                    backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(48, 9, 99, 0.53)',
                    'rgba(4, 82, 95, 0.66)',
                    'rgba(178, 92, 184, 0.62)',
                    'rgba(243, 247, 6, 0.66)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                    ],
                    
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    </script>
