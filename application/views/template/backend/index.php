<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="<?php echo base_url() ?>dnp-logo.png" rel="icon">
    <title>DNP - HIS</title>

    <!-- Custom fonts for this template-->

    <link href="<?php echo base_url() ?>bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>bootstrap/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url() ?>bootstrap/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>bootstrap/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <style type="text/css">
       /* body{
            padding-top:50px;
            background-color:#34495e;
        }

        .hiddenRow {
            padding: 0 !important;
        } */

        .modal-header{
            background-color: #3498db;
        }

        .modal-title{
            color: white;
        }

        .modal-content{
            padding-top: 0px;
            border-radius: 0;
            border: 5px solid #3498db;
        }

        .hidden { display: none; }
        .btn-purple{
            background-color: #8000ff;
            color: white;
        }

        .btn-purple:hover{
            color: white;
            background-color:#6906cc;
        }
    </style>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function (){
            $("#state").change(function() {
                // foo is the id of the other select box 
                if ($(this).val() == "TK0") {
                    $("#foo").show();
                }else{
                    $("#foo").hide();
                } 
            });
        });
    </script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <!-- +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
        <?php
        /*
        * Variabel $headernya diambil dari core MY_Controller
        * (application/core/MY_Controller.php)
        * */
        echo $headernya;
        ?>
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

                    <!-- Topbar Search -->
                    <form action="<?php echo site_url("page/search_bynik") ?>" method="post"
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input name="nik" type="text" class="form-control bg-light border-0 small" placeholder="Input NIK Karyawan"
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
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

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo "<b>".strtoupper($this->session->userdata('nama'))."</b> (".$this->session->userdata('role').")"  ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo base_url() ?>bootstrap/img/user.png">
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

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- konten++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ -->
                    <?php
                    /*
                    * Variabel $contentnya diambil dari core MY_Controller
                    * (application/core/MY_Controller.php)
                    * */
                    echo $contentnya;
                    ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
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
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

     <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
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
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?php echo site_url() ?>/auth/logout">Logout</a>
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


    <script type="text/javascript">
        $(function(){
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });

        $(document).ready(function() {
            $('table.display').DataTable();
        } );
    </script>

    <script>
                $(document).ready(function () {
        $('.tabel-data').DataTable();
        });
    </script>

</body>

</html>