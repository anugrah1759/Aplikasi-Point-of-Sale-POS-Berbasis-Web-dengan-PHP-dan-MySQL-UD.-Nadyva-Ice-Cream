<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include 'random_code.php';
include 'kode_pembelian.php';
include 'format_rupiah.php';
include 'koneksi.php';
include 'autocode.php';
session_start();

// $koneksi = mysqli_connect("localhost","root","","db_pos");
if(!empty($_SESSION['username']) AND !empty($_SESSION['id_karyawan'])) {

    $id_karyawan = $_SESSION['id_karyawan'];
    $user = mysqli_query($koneksi, "SELECT * FROM tb_karyawan, tb_jabatan WHERE tb_karyawan.id_jabatan = tb_jabatan.id_jabatan AND tb_karyawan.id_karyawan = '$id_karyawan'");
    $userData = mysqli_fetch_array($user);

    if (isset($_POST['batal'])) {
        if ($_POST['btl']!=='') {
            $sql=mysqli_query($koneksi, "UPDATE tb_pemesanan SET jadi='b' where invoice='".$_POST['btl']."'");
            if (!$sql) {
                echo "<script>alert('gagal update tb_pemesanan');window.location.href = '?page=beranda';</script>";
            }
            else{
                echo "<script>alert('berhasil update tb_pemesanan');window.location.href = '?page=beranda';</script>";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="asset/icon/cashier-machine.png"/>
    <title><?php include "title.php" ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="asset/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="asset/morrisjs/morris.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="asset/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="asset/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="asset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Chosen -->
    <link rel="stylesheet" href="asset/chosen/bootstrap-chosen.css"/>

    <!-- Flatpickr -->
    <link rel="stylesheet" href="asset/flatpickr/dist/flatpickr.min.css"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript" src="Chart.js"></script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="?page=beranda"><i><img src="asset/icon/cashier-machine-2.png" alt=""></i> POS </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                 <!-- /.dropdown -->
                 <li class="dropdown">
                    <?php 
                    $tarik=0;
                    $bar2 = mysqli_query($koneksi, "SELECT COUNT(id_barang) AS barang FROM `tb_barang` WHERE stok <= 10 ");
                    $ambil2 = mysqli_fetch_array($bar2);
                    if($userData['jabatan'] !== "Gudang") {
                    $bar3 = mysqli_query($koneksi, "SELECT  pelanggan FROM `tb_pemesanan` WHERE jadi='Y' group by invoice");
                    $ambil3 = mysqli_fetch_array($bar3);
                    $tarik=mysqli_num_rows($bar3);
                    }
                    $total=$ambil2['barang']+$tarik;
                    ?>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <b style="color: red"><?php echo $total; ?></b> <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <?php
                        if($userData['jabatan'] !== "Gudang") {
                        $bar = mysqli_query($koneksi, "SELECT * FROM `tb_pemesanan` WHERE jadi='Y' group by invoice order by invoice desc");
                        while($ambil = mysqli_fetch_array($bar)) {
                        ?>
                        <li>
                            <a href="index.php?page=pemesanan&aksi=preview&id=<?php echo $ambil['invoice'] ?>">
                                <div>
                                    
                                    <i class="fa fa-user fa-fw"></i> <?php echo $ambil['pelanggan'] ?>
                                    <span class="pull-right text-muted small"><?php echo date('d/m/Y',strtotime($ambil['tanggal'])) ?></span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <?php } 
                            }
                        $bar = mysqli_query($koneksi, "SELECT * FROM `tb_barang` WHERE stok <= 10 ");
                        while($ambil = mysqli_fetch_array($bar)) {
                        ?>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-cube fa-fw"></i> <?php echo $ambil['nama_barang'] ?>
                                    <span class="pull-right text-muted small">Stok <?php echo $ambil['stok'] ?></span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <?php } ?>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="?page=user"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <h4><?php echo $userData['nama'] ?></h4>
                            <h6>Login Sebagai <b><?php echo $userData['jabatan'] ?></b></h6>
                            <p><b><?php echo date("d/m/Y") ?></b></p>
                            <!-- /input-group -->
                        </li>
                        <?php if($userData['jabatan'] == "Administrator") { ?>
                        <li>
                            <a href="?page=beranda"><i class="fa fa-home fa-fw"></i> Beranda</a>
                        </li>
                        <li>
                            <a href="?page=barang"><i class="fa fa-cubes fa-fw"></i> Barang</a>
                        </li>
                        
                        <li>
                            <a href="?page=supplier"><i class="fa fa-truck fa-fw"></i> Supplier</a>
                        </li>
                        <li>
                            <a href="?page=pelanggan"><i class="fa fa-users fa-fw"></i> Pelanggan</a>
                        </li>
                        <li>
                            <a href="?page=karyawan"><i class="fa fa-male fa-fw"></i> Karyawan</a>
                        </li>
                        <li>
                            <a href="?page=laporan"><i class="fa fa-book fa-fw"></i> Laporan</a>
                        </li>
                        <li>
                            <a href="?page=pengaturan_aplikasi"><i class="fa fa-gear fa-fw"></i> Pengaturan Aplikasi</a>
                        </li>
                        <?php } elseif($userData['jabatan'] == "Gudang") { ?>
                        <li>
                            <a href="?page=beranda"><i class="fa fa-home fa-fw"></i> Beranda</a>
                        </li>
                        <li>
                            <a href="?page=barang"><i class="fa fa-cubes fa-fw"></i> Barang</a>
                        </li>
                        
                        <li>
                            <a href="?page=pembelian&kodepb=<?php echo $kodePB ?>"><i class="fa fa-cart-plus fa-fw"></i> Pembelian</a>
                        </li>
                        <li>
                            <a href="?page=supplier"><i class="fa fa-truck fa-fw"></i> Supplier</a>
                        </li>
                        
                        <li>
                            <a href="?page=laporan"><i class="fa fa-book fa-fw"></i> Laporan</a>
                        </li>
                        
                        <?php } else { ?>
                        <li>
                            <a href="?page=beranda"><i class="fa fa-home fa-fw"></i> Beranda</a>
                        </li>
                        <li>
                            <a href="?page=barang"><i class="fa fa-cubes fa-fw"></i> Barang</a>
                        </li>
                        <li>
                            <a href="?page=penjualan&kodepj=<?php echo $kode ?>"><i class="fa fa-shopping-cart fa-fw"></i> Penjualan</a>
                        </li>
                        <li>
                            <a href="?page=pelanggan"><i class="fa fa-users fa-fw"></i> Pelanggan</a>
                        </li>
                        <li>
                            <a href="?page=laporan"><i class="fa fa-book fa-fw"></i> Laporan</a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <?php include "konten.php"; ?>
        </div>
        <!-- /#page-wrapper --> 
    </div>
    <footer>
		<div class="container-fluid">
			<p class="copyright">&copy; 2019 <b>UD. Nadyva Ice Cream</b></p>
		</div>
	</footer>

    <div class="modal fade" id="modalbatal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
          <div class="modal-content">
            <form action="index.php?page=pemesanan" method="POST">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal" aria-hidden="true">
                &times;
              </button>
              <h4 class="modal-title" id="exampleModalLabel">Batalkan Pesanan Barang?</h4>
            </div>
            <div class="modal-body">Apakah Anda yakin ingin membatalkan pemesanan tersebut?</div>
            <input type="hidden" name="pk_hapus" class="pk_hapus">
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
              <input class="btn btn-primary dihapus" type="submit" name="dihapus" value="Ya">
            </div>
            </form>
          </div>
        </div>
    </div>
    

    <div class="modal fade" id="modalsimpan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
          <div class="modal-content">
            <form action="index.php?page=pemesanan" method="POST">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal" aria-hidden="true">
                &times;
              </button>
              <h4 class="modal-title" id="exampleModalLabel">Kirim permintaan pesanan?</h4>
            </div>
            <div class="modal-body">Apakah Anda yakin ingin mengirim permintaan tersebut?</div>
            <input type="hidden" name="pk" class="pk">
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
              <input class="btn btn-primary save" type="submit" name="save" value="Ya">
            </div>
            </form>
          </div>
        </div>
    </div>

    <div class="modal fade" id="proses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
          <div class="modal-content">
            <form action="?page=penjualan&kodepj=<?php echo $kode ?>" method="POST">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal" aria-hidden="true">
                &times;
              </button>
              <h4 class="modal-title" id="exampleModalLabel">Proses Pesanan</h4>
            </div>
            <div class="modal-body">Apakah Anda yakin ingin memproses pesanan?</div>
            <input type="hidden" name="proc" class="proc">
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
              <input class="btn btn-primary diproses" type="submit" name="diproses" value="Ya">
            </div>
            </form>
          </div>
        </div>
    </div>

    <div class="modal fade" id="batal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
          <div class="modal-content">
            <form action="?page=beranda" method="POST">
            <div class="modal-header">
              <button class="close" type="button" data-dismiss="modal" aria-hidden="true">
                &times;
              </button>
              <h4 class="modal-title" id="exampleModalLabel">Batalkan Pesanan</h4>
            </div>
            <div class="modal-body">Apakah Anda yakin ingin membatalkan pesanan?</div>
            <input type="hidden" name="btl" class="btl">
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
              <input class="btn btn-primary batal" type="submit" name="batal" value="Ya">
            </div>
            </form>
          </div>
        </div>
    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="asset/jquery/jquery.min.js"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="asset/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="asset/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="asset/raphael/raphael.min.js"></script>
    <script src="asset/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- DataTables JavaScript -->
    <script src="asset/datatables/js/jquery.dataTables.min.js"></script>
    <script src="asset/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="asset/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="asset/dist/js/sb-admin-2.js"></script>
    <!-- Validation form -->
    <script src="asset/jquery/jquery.validate.min.js"></script>
    <script src="asset/jquery/additional-methods.min.js"></script>
    
    <!-- JS Chosen -->
    <script src="asset/chosen/chosen.jquery.min.js"></script>

    <!-- JS flatpickr -->
    <script src="asset/flatpickr/dist/flatpickr.min.js"></script>

    <script src="asset/js/main.js"></script>
    <script type="text/javascript">
        $(document).on("click", ".batal", function(e){
            var pk_hapus=$(this).data('pk_hapus');
            $(".pk_hapus").val(pk_hapus);
        });

        $(document).on("click", ".simpan", function(e){
            var pk=$(this).data('pk');
            $(".pk").val(pk);
        });

        $(document).on("click", ".proses", function(e){
            var proses=$(this).data('proses');
            $(".proc").val(proses);
        });

        $(document).on("click", ".btl", function(e){
            var btl=$(this).data('btl');
            $(".btl").val(btl);
        });
    </script>
    <script>
        $(".chosen-select").chosen();
        
        flatpickr(".flatpickr", {
			dateFormat: "Y-m-d",
		});

        // $(document).ready(function(){
        //     $(".flatpickr").flatpickr({
        //         dateFormat: "Y-m-d"
        //     });
        // });

    </script>

</body>

</html>
<?php
} else {
    echo "<meta http-equiv='refresh' content='1;url=login.php' >";
}
?>
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
                    label: ' <?php if($userData['jabatan'] == "Gudang") { echo "Pembelian";}else{echo "Penjualan";} ?>',
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
    <?php if($userData['jabatan'] == "Administrator") { ?>
    <script>
        var nama1a = $("#nama1a").val();
        var nama2a = $("#nama2a").val();
        var nama3a = $("#nama3a").val();
        var nama4a = $("#nama4a").val();
        var nama5a = $("#nama5a").val();
        var nama6a = $("#nama6a").val();
        var nama7a = $("#nama7a").val();
        var nama8a = $("#nama8a").val();
        var nama9a = $("#nama9a").val();
        var nama10a = $("#nama10a").val();

        var jml1a = $("#jml1a").val();
        var jml2a = $("#jml2a").val();
        var jml3a = $("#jml3a").val();
        var jml4a = $("#jml4a").val();
        var jml5a = $("#jml5a").val();
        var jml6a = $("#jml6a").val();
        var jml7a = $("#jml7a").val();
        var jml8a = $("#jml8a").val();
        var jml9a = $("#jml9a").val();
        var jml10a = $("#jml10a").val();


        var ctx = document.getElementById("myCharta").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [nama1a, nama2a, nama3a, nama4a, nama5a, nama6a, nama7a, nama8a, nama9a, nama10a],
                datasets: [{
                    label: 'pembelian',
                    data: [jml1a, jml2a, jml3a, jml4a, jml5a, jml6a, jml7a, jml8a, jml9a, jml10a],
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
    <?php } ?>