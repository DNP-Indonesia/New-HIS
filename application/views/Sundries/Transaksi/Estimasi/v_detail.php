<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href="<?php echo base_url() ?>dnp-logo.png"rel="icon">
        <title>DNP - HIS</title>


        <link href="<?php echo base_url() ?>bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="<?php echo base_url() ?>bootstrap/css/sb-admin-2.min.css" rel="stylesheet">

        <!-- Custom styles for this page -->
        <link href="<?php echo base_url() ?>bootstrap/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

        <link href="<?php echo base_url() ?>bootstrap/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    </head>
    <style type="text/css">
        .btn-purple{
            background-color: #6b0391;
            color: white;
        }

        .btn-purple:hover{
            color: white;
            background-color: #400257;
        }
    </style>
    <body id="page-top">   
        <div class="container-fluid">
            <div class="card shadow mt-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-success">Data Estimasi Anda</h5>
                </div>
                <div class="card-body">
                    <?php
                        foreach($data as $tempel){
                    ?>
                    <label>Faktur : <?php echo $tempel->faktur ?></label><br>
                    <label>Direquest Oleh : <?php echo $tempel->nama_pembuat ?></label><br>
                    <label>Untuk Bagian : <?php echo $tempel->nama_section ?></label><br>
                    <label>Dibuat Tanggal : <?php echo $tempel->tanggal ?></label><br>
                    <?php
                        }
                    ?>
                </div>
            </div>   
            <div class="card shadow mt-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-success">Detail Estimasi Anda</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless small">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Barang</th>
                                    <th>Jumlah Barang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no=1;
                                    foreach($detail as $tempel){
                                ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $tempel->barang ?></td>
                                    <td><?php echo $tempel->jumlah ?></td>
                                </tr>
                                <?php
                                    $no++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>     


        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo base_url() ?>bootstrap/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url() ?>bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url() ?>bootstrap/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="<?php echo base_url() ?>bootstrap/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>bootstrap/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="<?php echo base_url() ?>bootstrap/js/demo/datatables-demo.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>bootstrap/datepicker/js/bootstrap-datepicker.min.js"></script>
        
        <script>
            $(document).ready(function (){
                $('#dataTablee').DataTable();
            });
        </script> 
    </body>
</html>


            