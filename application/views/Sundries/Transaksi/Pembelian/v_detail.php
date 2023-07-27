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
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

    </head>
    <style type="text/css">
        .btn-purple{
            background-color: #8000ff;
            color: white;
        }

        .btn-purple:hover{
            color: white;
            background-color:#6906cc;
        }
    </style>
    <body id="page-top">   
        <div class="container-fluid">
                <a href="<?= base_url('Sundries/purchasecontroller/purchasepage') ?>" class="btn btn-sm btn-purple mt-4 mb-4">
                    Kembali Ke Halaman Request Purchase
                </a>
                <?php if ($this->session->userdata('role')== 'sdr_Kepala Gudang') {?>
                    <a href="<?php echo site_url() ?>" class="btn btn-sm btn-purple mt-4 mb-4">
                        Kembali Ke Halaman Dashboard
                    </a>
                <?php } ?>
            <h3 class="font-weight-bold">Halaman Detail Request Purchase</h3>
            <div class="card shadow mt-2 mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-success">Data Request</h5>
                </div>
                <div class="card-body row justify-content-around">
                    <div class="col-md-12">
                         <?php foreach($data as $tempel){?>
                        <label id="faktur" hidden><?php echo $tempel->faktur ?></label>
                        <label>Faktur : <?php echo $tempel->faktur ?></label><br>
                        <label>Direquest Oleh : <?php echo $tempel->nama_peminta ?></label><br>
                        <label>Dibuat Tanggal : <?= date('d F Y', strtotime($tempel->tanggal)); ?></label><br>
                        <label>Dibuat Jam : <?= $tempel->jamdibuat; ?></label>
                    </div>
                </div>
            </div>   
            <div class="card shadow mt-4 mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-success">Detail Barang Request</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless small">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Faktur Sundries</th>
                                    <th>Untuk Bagian</th>
                                    <th>Barang</th>
                                    <th>Brand</th>
                                    <th>Type</th>
                                    <th>Ukuran</th>
                                    <th>Satuan</th>
                                    <th>Jumlah Barang</th>
                                    <th>Catatan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no=1;
                                    foreach($detail as $tempel){
                                ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $tempel->faktursundries ?></td>
                                    <td><?php echo $tempel->nama_section ?></td>
                                    <td><?php echo $tempel->barang ?></td>
                                    <td><?php echo $tempel->brand ?></td>
                                    <td><?php echo $tempel->type ?></td>
                                    <td><?php echo $tempel->ukuran ?></td>
                                    <td><?php echo $tempel->satuan ?></td>
                                    <td><?php echo $tempel->jumlah ?></td>
                                    <td><?php echo $tempel->keterangan ?></td>
                                    <td>
                                        <?php if ($this->session->userdata('role')=='sdr_Admin Gudang'){?>
                                            <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal-terima<?php echo $tempel->id_purchase_detail ?>">
                                                Terima Barang  
                                            </a> 
                                        <?php } ?>
                                    </td>
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
            <?php } ?>
        </div>

        <?php foreach($detail as $tempel){?>
        <div class="modal fade" id="modal-terima<?php echo $tempel->id_purchase_detail;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Yakin Barang Telah Tiba ?</h5>
                        <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">Tutup</span>
                        </button>
                    </div>
                    <form action="<?= base_url('Sundries/requestsundriescontroller/jumlahupdate') ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>Faktur</label>
                                    <input class="form-control" type="text" name="faktur" value="<?php echo $tempel->faktursundries;?>" readonly>
                                </div> 
                                <div class="col-md-6 mb-3">
                                    <label>Barang</label>
                                    <input class="form-control" type="text" name="barang" value="<?php echo $tempel->id_barang;?>" hidden>
                                    <input class="form-control" type="text" value="<?php echo $tempel->barang;?>" readonly>
                                </div>                       
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>Brand</label>
                                    <input type="text" class="form-control" value="<?php echo $tempel->brand;?>" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Type</label>
                                    <input type="text" class="form-control" value="<?php echo $tempel->type;?>" readonly>
                                </div>                       
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>Ukuran</label>
                                    <input type="text" class="form-control" value="<?php echo $tempel->ukuran;?>" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Satuan</label>
                                    <input type="text" class="form-control" value="<?php echo $tempel->satuan;?>" readonly>
                                </div>        
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>Jumlah</label>
                                    <input type="number" class="form-control" name="jumlah" required value="<?php echo $tempel->jumlah;?>" readonly>
                                </div> 
                                <div class="col-md-6 mb-3">
                                    <label>Catatan</label>
                                    <input type="text" class="form-control" name="catatan" value="<?php echo $tempel->keterangan;?>" readonly>
                                </div> 
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success btn-sm">Barang Telah Tiba</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>


        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo base_url() ?>bootstrap/vendor/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url() ?>bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="<?php echo base_url() ?>bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="<?php echo base_url() ?>bootstrap/js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="<?php echo base_url() ?>bootstrap/vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url() ?>bootstrap/vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="<?php echo base_url() ?>bootstrap/js/demo/datatables-demo.js"></script>

        <script type="text/javascript" src="<?php echo base_url() ?>bootstrap/datepicker/js/bootstrap-datepicker.min.js"></script>

        <script>
            function deleteConfirm(url){
                $('#btn-delete').attr('href', url);
                $('#deleteModal').modal();
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.yoi').select2({
                    theme: 'bootstrap4',
                });
            });
        </script>
    </body>
</html>


            