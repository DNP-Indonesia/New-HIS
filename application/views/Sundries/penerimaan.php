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
        
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">

                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url() ?>">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div>
                    <div class="sidebar-brand-text mx-3"> DNP - HIS</div>
                </a>

                <!-- Divider -->
                
                <hr class="sidebar-divider my-0">
                <!-- Nav Item - Dashboard -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url() ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>        

                <li class="nav-item active">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-transaksi"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Transaksi Sundries</span>
                    </a>
                    <div id="collapse-transaksi" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <?php if ($this->session->userdata('role') != 'sdr_Admin Gudang' AND $this->session->userdata('role') != 'sdr_Kepala Gudang') {?>
                                <a class="collapse-item" href="<?= base_url('Sundries/estimasicontroller/estimasipage') ?>">
                                    Pembuatan Estimasi
                                </a>
                                <a class="collapse-item" href="<?= base_url('Sundries/consumptioncontroller/consumptionpage') ?>">
                                    Request Consumption
                                </a>
                            <?php } ?>
                            
                            <a class="collapse-item" href="<?= base_url('Sundries/requestsundriescontroller/requestsundriespage') ?>">
                                Request Sundries
                            </a>
                            <a class="collapse-item" href="<?= base_url('Sundries/purchasecontroller/purchasepage') ?>">
                                Request Purchase
                            </a>

                            <a href="<?= base_url('Sundries/penerimaancontroller/penerimaanpage') ?>" class="collapse-item text-success">
                                    Penerimaan Barang
                            </a>
                        </div>
                    </div>
                </li>
                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Log Out</span>
                    </a>
                </li>
                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

            </ul>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                        <?php echo 
                                            "<b>".$this->session->userdata('nama').
                                            "</b> <br>"
                                        ?>    
                                        <?php
                                            if ($this->session->userdata('role')== 'sdr_Admin Bagian') {
                                                echo "Admin Bagian";   
                                            }elseif ($this->session->userdata('role')== 'sdr_Kepala Bagian') {
                                                echo "Kepala Bagian";
                                            }elseif ($this->session->userdata('role')== 'sdr_Admin Gudang') {
                                                echo "Admin Gudang";
                                            }elseif($this->session->userdata('role')== 'sdr_Kepala Gudang') {
                                                echo "Kepala Gudang";
                                            }
                                        ?>
                                    </span>
                                    <img class="img-profile rounded-circle" src="<?php echo base_url() ?>bootstrap/img/user.png">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="nav-link text-gray-600" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-600"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <h4>Penerimaan Barang</h4>    
                    <?php
                        if ($this->session->userdata('role')=='sdr_Admin Gudang') {
                    ?>
                        <a href="#" class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#modal-penerimaan">
                            Buat Penerimaan Barang
                        </a>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="font-weight-bold text-success">
                                    Data Penerimaan Barang
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive-xl">
                                <table class="table table-borderless small tbl">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Surat Jalan</th>
                                            <th>Faktur Purchase</th>
                                            <th>Keterangan</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no=1;
                                            foreach($penerimaan as $tempel){
                                        ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $tempel->suratjalan ?></td>
                                            <td><?php echo $tempel->fakturpurchase ?></td>
                                            <td><?php echo $tempel->keterangan ?></td>
                                            <td>
                                                <a onclick="deleteConfirm('<?php echo base_url('Sundries/penerimaancontroller/hapuspenerimaan/'.$tempel->id_penerimaan) ?>')"
                                                                href="#" class="btn btn-sm btn-danger">
                                                    Hapus
                                                </a>
                                                <a href="<?php echo base_url(); ?>Sundries/penerimaancontroller/detail/<?php echo $tempel->id_penerimaan ?>" class="btn btn-sm btn-purple">
                                                    Lihat Detail   
                                                </a> 
                                                <a href="<?php echo base_url(); ?>Sundries/penerimaancontroller/formaddbarang/<?php echo $tempel->id_penerimaan ?>" class="btn btn-sm btn-info">
                                                    Masukan Daftar Barang  
                                                </a>  
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
                    <!-- /.container-fluid -->
                </div>
                <!-- End of Main Content -->
                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; HIS-DNP 2023</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Yakin Ingin Keluar Aplikasi ?
                        </h5>
                        <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">Tutup</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih Logout Untuk Keluar Aplikasi</div>
                    <div class="modal-footer">
                        <button class="btn btn-sm btn-success" type="button" data-dismiss="modal">
                            Batal
                        </button>
                        <a class="btn btn-sm btn-danger" href="<?php echo site_url() ?>/auth/logout">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-penerimaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Buat Penerimaan Barang
                        </h5>
                        <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">Tutup</span>
                        </button>
                    </div>
                    <form method="post" action="<?= base_url('Sundries/penerimaancontroller/penerimaanadd') ?>">
                        <div class="modal-body">
                            <div class="form-row mb-3">
                                <div class="col-md-6">
                                    <label>Faktur Purchase</label>
                                    <select class="form-control" name="fakturpch">
                                        <option>--Pilih Faktur Purchase</option>
                                        <?php foreach ($purchase as $tempel) {?>
                                            <option><?php echo $tempel->faktur ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Surat Jalan</label>
                                    <input type="text" name="suratjalan" class="form-control" placeholder="Masukan Nomor Surat Jalan....">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Keterangan (Opsional)</label>
                                    <textarea class="form-control" name="keterangan">
                                    </textarea>
                                </div>
                                <div class="col-md-6">
                                    <label>Nomer PO</label>
                                    <input type="text" name="po" class="form-control" placeholder="Masukan Nomer PO....">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">
                                Batal
                            </button>
                            <button class="btn btn-sm btn-success" type="submit"> 
                                Buat Penerimaan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php foreach ($penerimaan as $tempel) {?>
            <div class="modal fade" id="modal-barang<?php echo $tempel->id_penerimaan;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Menambahkan Daftar Barang
                            </h5>
                            <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">Tutup</span>
                            </button>
                        </div>
                        <form method="post" action="<?= base_url('Sundries/penerimaancontroller/adddaftarbarang') ?>">
                            <div class="modal-body">
                                <div class="form-row mb-3">
                                    <div class="col-md-6">
                                        <label>Faktur Purchase</label>
                                        <select class="form-control" name="fakturpch">
                                            <option>--Pilih Barang</option>
                                            <?php foreach ($purchase as $tempel) {?>
                                                <option><?php echo $tempel->faktur ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Surat Jalan</label>
                                        <input type="text" name="suratjalan" class="form-control" placeholder="Masukan Nomor Surat Jalan....">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label>Keterangan (Opsional)</label>
                                        <textarea class="form-control" name="keterangan">
                                        </textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Nomer PO</label>
                                        <input type="text" name="po" class="form-control" placeholder="Masukan Nomer PO....">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">
                                    Batal
                                </button>
                                <button class="btn btn-sm btn-success" type="submit"> 
                                    Tambahkan Barang
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
        

        <div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Yakin ?</h5>
                        <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">Tutup</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Data Yang Dihapus Tidak Akan Bisa Dikembalikan.
                    </div>
                    <div class="modal-footer">
                        <button class="btn-sm btn btn-success" type="button" data-dismiss="modal">
                            Batal
                        </button>
                        <a id="tombolhapus" class="btn-sm btn btn-danger" href="#">
                            Hapus
                        </a>
                    </div>
                </div>
            </div>
        </div>

       
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
             $(document).ready(function (){
                $('.tbl').DataTable();
            });

            
            function deleteConfirm(url){
                $('#tombolhapus').attr('href', url);
                $('#modal-hapus').modal();
            }

        </script>
    </body>
</html>


            