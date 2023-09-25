<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

include '../koneksi.php';
include '../autocode.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../asset/icon/cashier-machine.png"/>
    <title><?php include "title.php" ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="../asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../asset/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../asset/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../asset/morrisjs/morris.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../asset/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../asset/datatables-responsive/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../asset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Chosen -->
    <link rel="stylesheet" href="../asset/chosen/bootstrap-chosen.css"/>

    <!-- Flatpickr -->
    <link rel="stylesheet" href="../asset/flatpickr/dist/flatpickr.min.css"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript" src="Chart.js"></script>
</head>

<body>
<style type="text/css">
    @media print{
        .batal, .cetak, .simpan, .copyright{
            display: none;
        }
        .container{
            padding: 0;
        }
    }
</style>
    

        <!-- Navigation -->


        <div class="container">
            <?php include "konten.php"; ?>
        </div>
        <!-- /#page-wrapper --> 
    
    <footer>
		<div class="container-fluid">
			<p class="copyright">&copy; 2019 <b>Toko Kimia - CV. Multi Citra Kimia</b></p>
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

    

    
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../asset/jquery/jquery.min.js"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="../asset/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../asset/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../asset/raphael/raphael.min.js"></script>
    <script src="../asset/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../asset/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../asset/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="../asset/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../asset/dist/js/sb-admin-2.js"></script>
    <!-- Validation form -->
    <script src="../asset/jquery/jquery.validate.min.js"></script>
    <script src="../asset/jquery/additional-methods.min.js"></script>
    
    <!-- JS Chosen -->
    <script src="../asset/chosen/chosen.jquery.min.js"></script>

    <!-- JS flatpickr -->
    <script src="../asset/flatpickr/dist/flatpickr.min.js"></script>

    <script src="../asset/js/main.js"></script>
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

