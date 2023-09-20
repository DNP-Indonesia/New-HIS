<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="<?php echo base_url(); ?>dnp-logo.png" rel="icon">
    <title>DNP - HIS</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>bootstrap/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url(); ?>bootstrap/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>bootstrap/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style type="text/css">
        /* Tambahkan gaya baru untuk footer */
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Tambahkan margin bawah untuk container */
        .container-fluid {
            margin-bottom: 60px;
        }

        .modal-header {
            background-color: #3498db;
        }

        .modal-title {
            color: white;
        }

        .modal-content {
            padding-top: 0px;
            border-radius: 0;
            border: 5px solid #3498db;
        }

        .hidden {
            display: none;
        }

        .btn-purple {
            background-color: #8000ff;
            color: white;
        }

        .btn-purple:hover {
            color: white;
            background-color: #6906cc;
        }

        .table-container {
            width: 100%;
            overflow-x: auto;
        }

        /* Lebar kolom disesuaikan dengan kontennya */
        .table-container table th,
        .table-container table td {
            white-space: nowrap;
            /* Hindari pemotongan teks */
        }
    </style>

</head>

<body id="page-top">

    <!-- Start Page Wrapper -->
    <div id="wrapper">

        <!-- Start of Sidebar -->
        <!-- Variabel $sidebar diambil dari core MY_Controller -->
        <?php echo $headernya; ?>
        <!-- End of Sidebar -->

        <!-- Start of Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Start of Main Content -->
            <div id="main-content">

                <!-- Start of Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Toogle -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form action="<?php echo site_url('page/search_bynik'); ?>" method="post"
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input name="nik" type="text" class="form-control bg-light border-0 small"
                                placeholder="Input NIK Karyawan" aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Start Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Logout Modal -->
                        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Keluar?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Pilih tombol LOGOUT dibawah untuk keluar aplikasi.</div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button"
                                            data-dismiss="modal">Cancel</button>
                                        <a class="btn btn-primary" href="<?php echo site_url('logout'); ?>">Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo '<b>' . strtoupper($this->session->userdata('nama')) . '</b> (' . $this->session->userdata('role') . ')'; ?>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo base_url(); ?>bootstrap/img/user.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>
                    <!-- End Topbar Navbar -->

                </nav>
                <!-- End of Topbar -->

                <!-- Start Page Content -->
                <div class="container-fluid">

                    <!-- Start of Page Content -->
                    <!-- Variabel $content diambil dari core MY_Controller -->
                    <?php echo $contentnya; ?>
                    <!-- End of Page Content -->

                </div>

            </div>
            <!-- End of Main Content -->

            <!-- Start of Footer -->
            <footer id="footer" class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End Page Wrapper -->

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                        Batal
                    </button>
                    <a class="btn btn-warning" href="<?php echo site_url(); ?>/auth/logout">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- SDR ADMIN BAGIAN -->
    <!-- Permintaan -->

    <!-- Estimasi -->

    <!-- Konsumsi -->

    <!-- SDR KEPALA BAGIAN -->
    <!-- Permintaan -->

    <!-- Estimasi -->

    <!-- Konsumsi -->

    <!-- SDR ADMIN GUDANG -->
    <!-- Permintaan -->

    <!-- Pembelian -->

    <!-- Penerimaan -->
    <!-- SDR ADMIN GUDANG -->
    <!-- Permintaan -->

    <!-- Pembelian -->

    <!-- Penerimaan -->


    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>bootstrap/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>bootstrap/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url(); ?>bootstrap/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>bootstrap/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url(); ?>bootstrap/js/demo/datatables-demo.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#state").change(function() {
                // foo is the id of the other select box 
                if ($(this).val() == "TK0") {
                    $("#foo").show();
                } else {
                    $("#foo").hide();
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(function() {
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });

        $(document).ready(function() {
            $('table.display').DataTable();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.tabel-data').DataTable();
        });
    </script>

</body>

</html>

<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">Tutup</span>
                </button>
            </div>
            <div class="modal-body">
                Data Yang Dihapus Tidak Akan Bisa Dikembalikan.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                    Batal
                </button>
                <a id="tombolhapus" class="btn btn-danger" href="#">
                    Lanjutkan
                </a>
            </div>
        </div>
    </div>
</div>
