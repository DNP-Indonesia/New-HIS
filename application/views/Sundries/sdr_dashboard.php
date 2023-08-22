<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href=<?php echo base_url() ?>dnp-logo.png rel="icon">
    <title>DNP - HIS</title>


    <link href="<?php echo base_url() ?>bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>bootstrap/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url() ?>bootstrap/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>bootstrap/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
</head>

<style type="text/css">
    .btn-purple {
        background-color: #8000ff;
        color: white;
    }

    .btn-purple:hover {
        color: white;
        background-color: #6906cc;
    }
</style>

<body id="page-top">

    <!-- Start Page Wrapper -->
    <div id="wrapper">

        <?php $this->load->view('Sundries/sdr_sidebar'); ?>

        <!-- Start Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Start Main Content -->
            <div id="content">

                <!-- Start Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Start Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Start Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo
                                        "<b>" . $this->session->userdata('nama') .
                                        "</b> <br>"
                                        ?>
                                    <?php
                                    if ($this->session->userdata('role') == 'sdr_Admin Bagian') {
                                        echo "Admin Bagian";
                                    } elseif ($this->session->userdata('role') == 'sdr_Kepala Bagian') {
                                        echo "Kepala Bagian";
                                    } elseif ($this->session->userdata('role') == 'sdr_Admin Gudang') {
                                        echo "Admin Gudang";
                                    } elseif ($this->session->userdata('role') == 'sdr_Kepala Gudang') {
                                        echo "Kepala Gudang";
                                    }
                                    ?>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo base_url() ?>bootstrap/img/user.png">
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="nav-link text-gray-600" href="#" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-600"></i>
                                    Logout
                                </a>
                            </div>

                        </li>
                        <!-- Start Nav Item - User Information -->

                    </ul>
                    <!-- Start Topbar Navbar -->

                </nav>
                <!-- End Topbar -->

                <!-- Start Page Content -->
                <div class="container-fluid">

                    <!-- Start DataTables Example -->
                    <?php if ($this->session->userdata('role') == 'sdr_Kepala Bagian') { ?>
                        <h4>Dashboard</h4>
                        <h6 class="mb-3">
                            <?php echo
                                "Halo, Selamat Datang <b>" . $this->session->userdata('nama') .
                                "</b>, Tetap Semangat dan Jangan Pernah Menyerah"
                                ?>
                        </h6>
                        <?php if ($this->session->userdata('setuju')) { ?>
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <?php echo $this->session->userdata('setuju'); ?>
                                <?php echo $this->session->set_userdata('setuju', NULL); ?>
                            </div>
                        <?php } ?>
                        <?php if ($this->session->userdata('tolak')) { ?>
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <?php echo $this->session->userdata('tolak'); ?>
                                <?php echo $this->session->set_userdata('tolak', NULL); ?>
                            </div>
                        <?php } ?>

                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                    role="tab" aria-controls="nav-home" aria-selected="true">
                                    Request
                                </a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                    role="tab" aria-controls="nav-profile" aria-selected="false"> Estimation
                                </a>
                                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                                    role="tab" aria-controls="nav-contact" aria-selected="false"> Consumption
                                </a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="font-weight-bold text-success">
                                            Menunggu Persetujuan
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-borderless small" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Faktur</th>
                                                        <th>Direquest Oleh</th>
                                                        <th>Untuk Bagian</th>
                                                        <th>Dibuat Tanggal</th>
                                                        <th>Status</th>
                                                        <th>Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($forapprove as $tempel) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $no ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $tempel->faktur ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $tempel->nama_peminta ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $tempel->nama_section ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $tempel->tanggal ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($tempel->status == 'Request') { ?>
                                                                    <h6>
                                                                        <span class="badge badge-warning">
                                                                            <?php echo $tempel->status ?>
                                                                        </span>
                                                                    </h6>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo site_url('detailpermintaan/'); ?><?php echo $tempel->faktur ?>"
                                                                    class="btn btn-sm btn-purple">
                                                                    Lihat Detail
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
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="font-weight-bold text-success">
                                            Menunggu Persetujuan
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-borderless small" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Faktur</th>
                                                        <th>Dibuat Oleh</th>
                                                        <th>Untuk Bagian</th>
                                                        <th>Dibuat Tanggal</th>
                                                        <th>Status</th>
                                                        <th>Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($estimasi as $tempel) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $no ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $tempel->faktur ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $tempel->nama_pembuat ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $tempel->nama_section ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $tempel->tanggal ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($tempel->status == 'Diajukan') { ?>
                                                                    <h6>
                                                                        <span class="badge badge-warning">
                                                                            <?php echo $tempel->status ?>
                                                                        </span>
                                                                    </h6>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo site_url('detailestimasi/'); ?><?php echo $tempel->faktur ?>"
                                                                    target="blank" class="btn btn-sm btn-purple">
                                                                    Lihat Detail
                                                                </a>

                                                                <a href="#" class="btn btn-success btn-sm" data-toggle="modal"
                                                                    data-target="#modal-estimasi-setujui<?php echo $tempel->faktur ?>">
                                                                    Setujui
                                                                </a>

                                                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                                                    data-target="#modal-estimasi-tolak<?php echo $tempel->faktur ?>">
                                                                    Tolak
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
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="font-weight-bold text-success">
                                            Menunggu Persetujuan
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-borderless small" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Faktur</th>
                                                        <th>Dibuat Oleh</th>
                                                        <th>Untuk Bagian</th>
                                                        <th>Dibuat Tanggal</th>
                                                        <th>Status</th>
                                                        <th>Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($konsumsi as $tempel) {
                                                        ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $no ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $tempel->faktur ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $tempel->nama_peminta ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $tempel->nama_section ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $tempel->tanggal ?>
                                                            </td>
                                                            <td>
                                                                <?php if ($tempel->status == 'Request') { ?>
                                                                    <h6>
                                                                        <span class="badge badge-warning">
                                                                            <?php echo $tempel->status ?>
                                                                        </span>
                                                                    </h6>
                                                                <?php } ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo site_url('detailkonsumsi/'); ?><?php echo $tempel->faktur ?>"
                                                                    target="blank" class="btn btn-sm btn-purple">
                                                                    Lihat Detail
                                                                </a>

                                                                <a href="#" class="btn btn-success btn-sm" data-toggle="modal"
                                                                    data-target="#modal-consumption-setujui<?php echo $tempel->faktur ?>">
                                                                    Setujui
                                                                </a>

                                                                <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                                                    data-target="#modal-consumption-tolak<?php echo $tempel->faktur ?>">
                                                                    Tolak
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
                        </div>
                    <?php } ?>

                    <?php if ($this->session->userdata('role') == 'sdr_Admin Bagian') { ?>
                        <h4>Dashboard</h4>
                        <h6 class="mb-3">
                            <?php echo
                                "Halo, Selamat Datang <b>" . $this->session->userdata('nama') .
                                "</b>, Tetap Semangat dan Jangan Pernah Menyerah"
                                ?>
                        </h6>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="font-weight-bold text-success">
                                    Permintaan Anda Saat Ini
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless small" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Faktur</th>
                                                <th>Direquest Oleh</th>
                                                <th>Untuk Bagian</th>
                                                <th>Dibuat Tanggal</th>
                                                <th>Status</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($diproses as $tempel) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $no ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $tempel->faktur ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $tempel->nama_peminta ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $tempel->nama_section ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $tempel->tanggal ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($tempel->status == 'Diproses') { ?>
                                                            <h6>
                                                                <span class="badge badge-info">
                                                                    <?php echo $tempel->status ?>
                                                                </span>
                                                            </h6>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo site_url('detailpermintaan/'); ?><?php echo $tempel->faktur ?>"
                                                            class="btn btn-sm btn-purple">
                                                            Lihat Detail
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

                    <?php if ($this->session->userdata('role') == 'sdr_Admin Gudang') { ?>
                        <h4>Dashboard</h4>
                        <h6 class="mb-3">
                            <?php echo
                                "Halo, Selamat Datang <b>" . $this->session->userdata('nama') .
                                "</b>, Tetap Semangat dan Jangan Pernah Menyerah"
                                ?>
                        </h6>
                        <?php if ($this->session->userdata('reqproses')) { ?>
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <?php echo $this->session->userdata('reqproses'); ?>
                                <?php echo $this->session->set_userdata('reqproses', NULL); ?>
                            </div>
                        <?php } ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="font-weight-bold text-success">
                                    Permintaan Sundries Saat Ini
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless small" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Faktur</th>
                                                <th>Direquest Oleh</th>
                                                <th>Untuk Bagian</th>
                                                <th>Dibuat Tanggal</th>
                                                <th>Status</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($admingudang as $tempel) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $no ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $tempel->faktur ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $tempel->nama_peminta ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $tempel->nama_section ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $tempel->tanggal ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($tempel->status == 'Disetujui2') { ?>
                                                            <h6>
                                                                <span class="badge badge-primary">
                                                                    Disetujui Kepala Gudang
                                                                </span>
                                                            </h6>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo site_url('detailpermintaan/'); ?><?php echo $tempel->faktur ?>"
                                                            class="btn btn-sm btn-purple">
                                                            Lihat Detail
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

                    <?php if ($this->session->userdata('role') == 'sdr_Kepala Gudang') { ?>
                        <h4>Dashboard</h4>
                        <h6 class="mb-3">
                            <?php echo
                                "Halo, Selamat Datang <b>" . $this->session->userdata('nama') .
                                "</b>, Tetap Semangat dan Jangan Pernah Menyerah"
                                ?>
                        </h6>
                        <?php if ($this->session->userdata('setuju')) { ?>
                            <div class="alert alert-success">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <?php echo $this->session->userdata('setuju'); ?>
                                <?php echo $this->session->set_userdata('setuju', NULL); ?>
                            </div>
                        <?php } ?>
                        <?php if ($this->session->userdata('tolak')) { ?>
                            <div class="alert alert-danger">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <?php echo $this->session->userdata('tolak'); ?>
                                <?php echo $this->session->set_userdata('tolak', NULL); ?>
                            </div>
                        <?php } ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="font-weight-bold text-success">
                                    Menunggu Persetujuan
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless small" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Faktur</th>
                                                <th>Direquest Oleh</th>
                                                <th>Untuk Bagian</th>
                                                <th>Dibuat Tanggal</th>
                                                <th>Dibuat Jam</th>
                                                <th>Disetujui Kepala Bagian Tanggal</th>
                                                <th>Disetujui Kepala Bagian Jam</th>
                                                <th>Status</th>
                                                <th>Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($kepalagudang as $approve2) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $no ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $approve2->faktur ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $approve2->nama_peminta ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $approve2->nama_section ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $approve2->tanggal ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $approve2->jamdibuat ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $approve2->tanggal_setuju1 ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $approve2->jamsetuju1 ?>
                                                    </td>
                                                    <td>
                                                        <?php if ($approve2->status == 'Disetujui1') { ?>
                                                            <h6>
                                                                <span class="badge badge-primary">
                                                                    Disetujui Kepala Bagian
                                                                </span>
                                                            </h6>
                                                        <?php } ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?php echo site_url('detailpermintaan/'); ?><?php echo $approve2->faktur ?>"
                                                            class="btn btn-sm btn-purple">
                                                            Lihat Detail
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
                    <!-- End DataTables Example -->

                </div>
                <!-- End Page Content -->

            </div>
            <!-- End Main Content -->

            <!-- Start Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; HIS-DNP 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End Footer -->

        </div>
        <!-- End Content Wrapper -->

    </div>
    <!-- End Page Wrapper -->

    <!-- Scroll Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    </div>
    <!-- End Page Wrapper -->

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
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

    <script type="text/javascript"
        src="<?php echo base_url() ?>bootstrap/datepicker/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.table').DataTable();
        });
    </script>

</body>

</html>

<!-- <?php foreach ($admingudang as $tempel) { ?>
        <div class="modal fade" id="modal-proses<?php echo $tempel->faktur ?>" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel">Yakin Mau Memproses Request Sundries Ini ?</h4>
                        <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">Tutup</span>
                        </button>
                    </div>
                    <form action="<?php echo site_url('Sundries/Transaksi/Permintaan/v_proses') ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Faktur</label>
                                    <input type="text" class="form-control" name="faktur" required
                                        value="<?php echo $tempel->faktur; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Dibuat Oleh</label>
                                    <input type="text" class="form-control" name="nama" required
                                        value="<?php echo $tempel->nama_peminta; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Untuk Bagian</label>
                                    <input type="text" class="form-control" name="bagian" required
                                        value="<?php echo $tempel->nama_section; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Dibuat Tanggal</label>
                                    <input type="text" class="form-control" name="tanggal" required
                                        value="<?php echo $tempel->tanggal; ?>" readonly>
                                    <input type="text" class="form-control" name="status" required value="Disetujui" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success btn-sm">Proses</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?> -->