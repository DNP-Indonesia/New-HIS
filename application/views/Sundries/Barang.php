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
                        <span>Super User</span>
                    </a>
                </li>        

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Data User Account</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages_personal"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Personal Data</span>
                    </a>
                    <div id="collapsePages_personal" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            
                            <a class="collapse-item" href="<?= base_url('page_his/karyawan')?>">Daftar Karyawan</a>
                            <a class="collapse-item" href="<?= base_url('page_his/karyawan_out')?>">Daftar Karyawan Keluar</a>
                            <a class="collapse-item" href="<?= base_url('page_his/karyawan_temp')?>">Karyawan Training & <br>Percobaan</a>
                            <a class="collapse-item" href="<?= base_url('page_his/karyawan_out_temp')?>">Karyawan Training & <br>Percobaan Keluar</a>
                            <a class="collapse-item" href="<?= base_url('page_his/divisi')?>">Daftar Divisi</a>
                            <a class="collapse-item" href="<?= base_url('page_his/departemen')?>">Daftar Departemen</a>
                            <a class="collapse-item" href="<?= base_url('page_his/section')?>">Daftar Section</a>
                            <a class="collapse-item" href="<?= base_url('page_his/shift')?>">Daftar Shift</a>
                            <a class="collapse-item" href="<?= base_url('page_his/jabatan')?>">Daftar Jabatan</a>
                            <a class="collapse-item" href="<?= base_url('page_his/golongan')?>">Daftar Golongan</a>
                            
                        </div>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapse-master"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Master Sundries</span>
                    </a>
                    <div id="collapse-master" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?= base_url('Sundries/kategoricontroller/kategoripage') ?>">Kategori</a>
                            <a class="collapse-item" href="<?= base_url('Sundries/jeniscontroller/jenispage')?>">Jenis</a>
                            <a class="collapse-item text-success" href="<?= base_url('Sundries/barangcontroller/barangpage')?>">Barang</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-transaksi"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Transaksi Sundries</span>
                    </a>
                    <div id="collapse-transaksi" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="#">Pembuata Estimasi</a>
                            <a class="collapse-item" href="#">Request Sundries</a>
                            <a class="collapse-item" href="#">Request Consumption</a>
                            <a class="collapse-item" href="#">Request Purchase</a>
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
                        <!-- DataTales Example -->
                        <a href="#" class="btn btn-sm btn-success mb-3"data-toggle="modal" data-target="#modal-tambah">
                            Buat Barang Baru
                        </a>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="font-weight-bold text-success">
                                    Data Barang
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless small" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Barang</th>
                                                <th>Brand</th>
                                                <th>Type</th>
                                                <th>Ukuran</th>
                                                <th>Satuan</th>
                                                <th>Jenis</th>
                                                <th>Kategori</th>
                                                <th>Stok</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no=1;
                                                foreach($ambil as $tempel){
                                            ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $tempel->barang ?></td>
                                                <td><?php echo $tempel->brand ?></td>
                                                <td><?php echo $tempel->type ?></td>
                                                <td><?php echo $tempel->ukuran ?></td>
                                                <td><?php echo $tempel->satuan ?></td>
                                                <td><?php echo $tempel->jenis ?></td>
                                                <td><?php echo $tempel->kategori ?></td>
                                                <td><?php echo $tempel->stok ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-edit<?php echo $tempel->id_barang ?>">
                                                        <span class="text">Ubah</span>
                                                    </a>
                                                    <a onclick="deleteConfirm('<?php echo base_url('Sundries/barangcontroller/barangdelete/'.$tempel->id_barang) ?>')"
                                                        href="#" class="btn btn-sm btn-danger">
                                                        Hapus
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
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            Yakin Ingin Keluar Aplikasi ?
                        </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">x</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih Logout Untuk Keluar Aplikasi</div>
                    <div class="modal-footer">
                        <button class="btn btn-success" type="button" data-dismiss="modal">
                            Nggak Jadi
                        </button>
                        <a class="btn btn-warning" href="<?php echo site_url() ?>/auth/logout">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Buat Barang Baru</h3>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="<?= base_url('Sundries/barangcontroller/barangadd') ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>Jenis</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="jenis" required>
                                        <option value="--Pilih Kategori--" selected>--Pilih Jenis--</option>
                                    <?php
                                        $div = $this->modeljenis->findAll();
                                        foreach($div as $d){ ?>
                                    ?>
                                        <option value="<?php echo $d->id_jenis?>">
                                            <?php echo $d->jenis?> -> <?php echo $d->kategori ?>
                                        </option>
                                    <?php 
                                        } 
                                    ?>
                                    </select>
                                </div> 
                                <div class="col-md-6 mb-3">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="barang" required placeholder="Masukan Nama Barang....">
                                </div>                        
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>Brand</label>
                                    <input type="text" class="form-control" name="brand" required placeholder="Masukan Brand.....">
                                </div> 
                                <div class="col-md-6 mb-3">
                                    <label>Type</label>
                                    <input type="text" class="form-control" name="type" required placeholder="Masukan Type....">
                                </div>                       
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>Ukuran</label>
                                    <input type="text" class="form-control" name="ukuran" required placeholder="Masukan Ukuran.....">
                                </div> 
                                <div class="col-md-6 mb-3">
                                    <label>Satuan</label>
                                    <input type="text" class="form-control" name="satuan" required placeholder="Masukan Satuan....">
                                </div>                       
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>Stok</label>
                                    <input type="text" class="form-control" name="stok" onkeypress="return hanyaAngka(event)" required>
                                </div>                    
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-warning" type="button" data-dismiss="modal">Nggak Jadi Deh</button>
                            <button type="submit" class="btn btn-success btn-sm">Buat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php foreach($ambil as $tempel){?>
        <div class="modal fade" id="modal-edit<?php echo $tempel->id_barang;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Ubah Barang</h3>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <form action="<?= base_url('Sundries/barangcontroller/barangupdate') ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="barang" required value="<?php echo $tempel->barang;?>">
                                    <input type="text" name="id_barang" value="<?= $tempel->id_barang ?>" hidden>
                                </div>                        
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Jenis</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="jenis" required>
                                        <option value="" disabled> -- Pilih Jenis -- </option>
                                        <?php
                                            $div = $this->modeljenis->findAll();
                                            foreach($div as $d){ ?>
                                        ?>
                                        <option value="<?php echo $d->id_jenis?>" <?php if($d->id_jenis==$tempel->id_jenis) {echo "selected"; } ?> >
                                            <?php echo $d->jenis?>    
                                        </option>
                                        <?php 
                                            } 
                                        ?>
                                </select>
                                </div>                        
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Stok</label>
                                    <input type="text" class="form-control" name="stok" required value="<?php echo $tempel->stok;?>">
                                </div>                        
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-warning" type="button" data-dismiss="modal">Nggak Jadi Deh</button>
                            <button type="submit" class="btn btn-success btn-sm">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php } ?>

        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Data yang dihapus tidak akan bisa dikembalikan.
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">
                            Cancel
                        </button>
                        <a id="btn-delete" class="btn btn-danger" href="#">
                            Delete
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
                $('.tabel-data').DataTable();
            });
        </script>
        <script>
            function deleteConfirm(url){
                $('#btn-delete').attr('href', url);
                $('#deleteModal').modal();
            }
        </script>
        <script>
            function hanyaAngka(event) {
                var angka = (event.which) ? event.which : event.keyCode
                if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
                    return false;
                return true;
            }
        </script>

    </body>
</html>


            