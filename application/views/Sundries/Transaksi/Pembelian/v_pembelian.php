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

            <?php $this->load->view('Sundries/sdr_sidebar');?>

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
                        <h4>Request Purchase</h4>    
                    <?php
                        if ($this->session->userdata('role')=='sdr_Kepala Gudang') {
                    ?>
                        <?php if ($this->session->userdata('tolak')) { ?>
                            <div class="alert alert-danger">  
                                <a href="#" class="close" data-dismiss="alert">&times;</a>  
                                <?php echo $this->session->userdata('tolak'); ?> 
                                <?php echo $this->session->set_userdata('tolak', NULL); ?> 
                            </div> 
                        <?php }?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="font-weight-bold text-success">
                                    Data Buat Baru
                                </h6>
                            </div>
                            <div class="table-responsive-xl">
                                <table class="table table-borderless small tbl">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Faktur</th>
                                            <th>Dibuat Tanggal</th>
                                            <th>Dibuat Jam</th>
                                            <th>Status</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no=1;
                                            foreach($pembelian as $tempel){
                                        ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $tempel->faktur ?></td>
                                            <td><?php echo $tempel->tanggal ?></td>
                                            <td><?php echo $tempel->jamdibuat ?></td>
                                            <td>
                                                <?php if ($tempel->status =='Request'){?>
                                                    <h6>
                                                        <span class="badge badge-warning">
                                                            <?php echo $tempel->status ?>
                                                        </span>
                                                    </h6>
                                                 <?php } ?> 
                                            </td>
                                            <td>
                                                <a href="<?php echo site_url('detailpembelian/' . $tempel->faktur); ?>" class="btn btn-sm btn-purple">
                                                    Detail   
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
                    <?php } ?>

                    <?php
                        if ($this->session->userdata('role')=='sdr_Admin Gudang') {
                    ?>
                        <?php if ($this->session->userdata('hapus')) { ?>
                            <div class="alert alert-danger">  
                                <a href="#" class="close" data-dismiss="alert">&times;</a>  
                                <?php echo $this->session->userdata('hapus'); ?> 
                                <?php echo $this->session->set_userdata('hapus', NULL); ?>  
                            </div> 
                        <?php }?>
                        <?php if ($this->session->userdata('sukses')) { ?>
                            <div class="alert alert-success">  
                                <a href="#" class="close" data-dismiss="alert">&times;</a>  
                                <?php echo $this->session->userdata('sukses'); ?> 
                                <?php echo $this->session->set_userdata('sukses', NULL); ?>  
                            </div> 
                        <?php }?>
                        <a href="<?= site_url('formpembelian') ?>" class="btn btn-sm btn-success mb-3">
                            Buat Baru
                        </a>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="font-weight-bold text-success">
                                    Data Request Purchase Anda
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive-xl">
                                    <table class="table table-borderless small tbl">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Faktur</th>
                                                <th>Dibuat Tanggal</th>
                                                <th>Dibuat Jam</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                foreach($pembelian as $tempel){
                                            ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $tempel->faktur ?></td>
                                                <td><?php echo $tempel->tanggal ?></td>
                                                <td><?php echo $tempel->jamdibuat ?></td>
                                                <td>
                                                    <a href="<?php echo site_url('printpembelian'); ?><?php echo $tempel->faktur ?>" target="_blank" class="btn btn-sm btn-success">
                                                    Cetak PDF
                                                    </a>
                                                    <a href="<?php echo site_url('detailpembelian/'); ?><?php echo $tempel->faktur ?>" class="btn btn-sm btn-purple">
                                                        Detail   
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
                $('.table').DataTable();
            });

            
            function deleteConfirm(url){
                $('#tombolhapus').attr('href', url);
                $('#modal-hapus').modal();
            }
        
            $(document).ready(function() {
                $('.yoi').select2({
                    theme: 'bootstrap4',
                });
            });

        </script>
    </body>
</html>


            