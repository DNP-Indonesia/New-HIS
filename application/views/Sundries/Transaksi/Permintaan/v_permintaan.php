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

            <?php $this->load->view('Sundries/sdr_sidebar'); ?>

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
                        <h4>Request Sundries</h4>
                        <?php
                        if ($this->session->userdata('role') == 'sdr_Admin Bagian') {
                            ?>
                            <!-- DataTales Example -->
                            <a href="#" class="btn btn-sm btn-success mb-3"data-toggle="modal" data-target="#modal-tambah">
                                Buat Baru
                            </a>
                        
                            <?php if ($this->session->userdata('berhasil')) { ?>
                                <div class="alert alert-success">  
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>  
                                    <?php echo $this->session->userdata('berhasil'); ?> 
                                    <?php echo $this->session->set_userdata('berhasil', NULL); ?> 
                                </div> 
                        <?php } ?>
                            <?php if ($this->session->userdata('update')) { ?>
                                <div class="alert alert-success">  
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>  
                                    <?php echo $this->session->userdata('update'); ?> 
                                    <?php echo $this->session->set_userdata('update', NULL); ?> 
                                </div> 
                        <?php } ?>
                            <?php if ($this->session->userdata('sukses')) { ?>
                                <div class="alert alert-success">  
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>  
                                    <?php echo $this->session->userdata('sukses'); ?> 
                                    <?php echo $this->session->set_userdata('sukses', NULL); ?>  
                                </div> 
                        <?php } ?>
                            <?php if ($this->session->userdata('hapus')) { ?>
                                <div class="alert alert-danger">  
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>  
                                    <?php echo $this->session->userdata('hapus'); ?> 
                                    <?php echo $this->session->set_userdata('hapus', NULL); ?>  
                                </div> 
                        <?php } ?>
                            <?php if ($this->session->userdata('keranjangkosong')) { ?>
                                <div class="alert alert-danger">  
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>  
                                    <?php echo $this->session->userdata('keranjangkosong'); ?> 
                                    <?php echo $this->session->set_userdata('keranjangkosong', NULL); ?>  
                                </div> 
                        <?php } ?>
                            <?php if ($this->session->userdata('addbarang')) { ?>
                                <div class="alert alert-success">  
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>  
                                    <?php echo $this->session->userdata('addbarang'); ?> 
                                    <?php echo $this->session->set_userdata('addbarang', NULL); ?>  
                                </div> 
                        <?php } ?>
                            <?php if ($this->session->userdata('requlang')) { ?>
                                <div class="alert alert-success">  
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>  
                                    <?php echo $this->session->userdata('requlang'); ?> 
                                    <?php echo $this->session->set_userdata('requlang', NULL); ?>  
                                </div> 
                        <?php } ?>
                        
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="font-weight-bold text-success">
                                        Data Request Sundries Anda
                                    </h6>
                                </div>
                                <div class="card-body">
                                    <nav>
                                        <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#request" role="tab" aria-controls="nav-home" aria-selected="true">
                                                Request
                                            </a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#disetujui1" role="tab" aria-controls="nav-profile" aria-selected="false">         
                                                Disetujui Kepala Bagian
                                            </a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#disetujui2" role="tab" aria-controls="nav-profile" aria-selected="false">         
                                                Disetujui Kepala Gudang
                                            </a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#ditolak" role="tab" aria-controls="nav-contact" aria-selected="false">
                                                Ditolak
                                            </a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#diproses" role="tab" aria-controls="nav-contact" aria-selected="false">
                                                Diproses
                                            </a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#selesai" role="tab" aria-controls="nav-contact" aria-selected="false">
                                                Selesai
                                            </a>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="request" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="table-responsive-xl">
                                                <table class="table table-borderless small tbl">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Faktur</th>
                                                            <th>Direquest Oleh</th>
                                                            <th>Untuk Bagian</th>
                                                            <th>Dibuat Tanggal</th>
                                                            <th>Dibuat Jam</th>
                                                            <th>Status</th>
                                                            <th>Opsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($permintaan as $tempel) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $no ?></td>
                                                                <td><?php echo $tempel->faktur ?></td>
                                                                <td><?php echo $tempel->nama_peminta ?></td>
                                                                <td><?php echo $tempel->nama_section ?></td>
                                                                <td><?php echo $tempel->tanggal ?></td>
                                                                <td><?php echo $tempel->jamdibuat ?></td>
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
                                                                    <a onclick="deleteConfirm('<?php echo site_url('deletepermintaan/' . $tempel->faktur) ?>')"
                                                                        href="#" class="btn btn-sm btn-danger">
                                                                        Hapus
                                                                    </a>
                                                                    <a href="<?php echo site_url('detailpermintaan/'); ?><?php echo $tempel->faktur ?>" class="btn btn-sm btn-purple">
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
                                        <div class="tab-pane fade" id="disetujui1" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <div class="table-responsive-xl">
                                                <table class="table table-borderless small tbl">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Faktur</th>
                                                            <th>Direquest Oleh</th>
                                                            <th>Untuk Bagian</th>
                                                            <th>Dibuat Tanggal</th>
                                                            <th>Dibuat Jam</th>
                                                            <th>Disetujui Tanggal</th>
                                                            <th>Disetujui Jam</th>
                                                            <th>Status</th>
                                                            <th>Opsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($setuju1 as $tempel) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $no ?></td>
                                                                <td><?php echo $tempel->faktur ?></td>
                                                                <td><?php echo $tempel->nama_peminta ?></td>
                                                                <td><?php echo $tempel->nama_section ?></td>
                                                                <td><?php echo $tempel->tanggal ?></td>
                                                                <td><?php echo $tempel->jamdibuat ?></td>
                                                                <td><?php echo $tempel->tanggal_setuju1 ?></td>
                                                                <td><?php echo $tempel->jamsetuju1 ?></td>
                                                                <td>
                                                                     <?php if ($tempel->status == 'Disetujui1') { ?>
                                                                         <h6>
                                                                             <span class="badge badge-primary">
                                                                                 Disetujui Kepala Bagian
                                                                             </span>
                                                                         </h6>
                                                                  <?php } ?>
                                                                </td>
                                                                <td>
                                                                    <a href="<?php echo site_url('printpermintaan'); ?><?php echo $tempel->faktur ?>" target="_blank" class="btn btn-sm btn-success">
                                                                        Cetak PDF
                                                                    </a>
                                                                    <a href="<?php echo site_url('detailpermintaan'); ?><?php echo $tempel->faktur ?>" class="btn btn-sm btn-purple">
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
                                        <div class="tab-pane fade" id="disetujui2" role="tabpanel" aria-labelledby="nav-profile-tab">
                                            <div class="table-responsive-xl">
                                                <table class="table table-borderless small tbl">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Faktur</th>
                                                            <th>Direquest Oleh</th>
                                                            <th>Untuk Bagian</th>
                                                            <th>Dibuat Tanggal</th>
                                                            <th>Dibuat Jam</th>
                                                            <th>Disetujui Tanggal</th>
                                                            <th>Disetujui Jam</th>
                                                            <th>Status</th>
                                                            <th>Opsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($setuju2 as $tempel) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $no ?></td>
                                                                <td><?php echo $tempel->faktur ?></td>
                                                                <td><?php echo $tempel->nama_peminta ?></td>
                                                                <td><?php echo $tempel->nama_section ?></td>
                                                                <td><?php echo $tempel->tanggal ?></td>
                                                                <td><?php echo $tempel->jamdibuat ?></td>
                                                                <td><?php echo $tempel->tanggal_setuju2 ?></td>
                                                                <td><?php echo $tempel->jamsetuju2 ?></td>
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
                                                                    <a href="<?php echo site_url('printpermintaan'); ?><?php echo $tempel->faktur ?>" target="_blank" class="btn btn-sm btn-success">
                                                                        Cetak PDF
                                                                    </a>
                                                                    <a href="<?php echo site_url('detailpermintaan'); ?><?php echo $tempel->faktur ?>" class="btn btn-sm btn-purple">
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
                                        <div class="tab-pane fade" id="ditolak" role="tabpanel" aria-labelledby="nav-contact-tab">
                                            <div class="table-responsive-xl">
                                                <table class="table table-borderless small tbl">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Faktur</th>
                                                            <th>Direquest Oleh</th>
                                                            <th>Untuk Bagian</th>
                                                            <th>Dibuat Tanggal</th>
                                                            <th>Dibuat Jam</th>
                                                            <th>Ditolak Tanggal</th>
                                                            <th>Ditolak Jam</th>
                                                            <th>Status</th>
                                                            <th>Opsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($tolak as $tempel) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $no ?></td>
                                                                <td><?php echo $tempel->faktur ?></td>
                                                                <td><?php echo $tempel->nama_peminta ?></td>
                                                                <td><?php echo $tempel->nama_section ?></td>
                                                                <td><?php echo $tempel->tanggal ?></td>
                                                                <td><?php echo $tempel->jamdibuat ?></td>
                                                                <td><?php echo $tempel->tanggal_tolak ?></td>
                                                                <td><?php echo $tempel->jamtolak ?></td>
                                                                <td>
                                                                     <?php if ($tempel->status == 'Ditolak') { ?>
                                                                         <h6>
                                                                             <span class="badge badge-danger">
                                                                                 <?php echo $tempel->status ?>
                                                                             </span>
                                                                         </h6>
                                                                  <?php } ?> 
                                                                </td>
                                                                <td>
                                                                    <a onclick="deleteConfirm('<?php echo site_url('deletepermintaan' . $tempel->faktur) ?>')"
                                                                        href="#" class="btn btn-sm btn-danger">
                                                                        Hapus
                                                                    </a>
                                                                    <a href="<?php echo site_url('detailpermintaan'); ?><?php echo $tempel->faktur ?>" class="btn btn-sm btn-purple">
                                                                        Lihat Alasan  
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
                                        <div class="tab-pane fade" id="diproses" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="table-responsive-xl">
                                                <table class="table table-borderless small tbl">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Faktur</th>
                                                            <th>Direquest Oleh</th>
                                                            <th>Untuk Bagian</th>
                                                            <th>Dibuat Tanggal</th>
                                                            <th>Status</th>
                                                            <th>Jam</th>
                                                            <th>Opsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($proses as $tempel) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $no ?></td>
                                                                <td><?php echo $tempel->faktur ?></td>
                                                                <td><?php echo $tempel->nama_peminta ?></td>
                                                                <td><?php echo $tempel->nama_section ?></td>
                                                                <td><?php echo $tempel->tanggal ?></td>
                                                                <td>
                                                                     <?php if ($tempel->status == 'Diproses') { ?>
                                                                         <h6>
                                                                             <span class="badge badge-info">
                                                                                 <?php echo $tempel->status ?>
                                                                             </span>
                                                                         </h6>
                                                                  <?php } ?>     
                                                                </td>
                                                                <td><?php echo $tempel->waktu ?></td>
                                                                <td>
                                                                    <a href="<?php echo site_url('printpermintaan'); ?><?php echo $tempel->faktur ?>" target="_blank" class="btn btn-sm btn-success">
                                                                    Cetak PDF
                                                                    </a>
                                                                    <a href="<?php echo site_url('detailpermintaan'); ?><?php echo $tempel->faktur ?>" class="btn btn-sm btn-purple">
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
                                        <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="nav-home-tab">
                                            <div class="table-responsive-xl">
                                                <table class="table table-borderless small tbl">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Faktur</th>
                                                            <th>Direquest Oleh</th>
                                                            <th>Untuk Bagian</th>
                                                            <th>Dibuat Tanggal</th>
                                                            <th>Status</th>
                                                            <th>Jam</th>
                                                            <th>Opsi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $no = 1;
                                                        foreach ($selesai as $tempel) {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $no ?></td>
                                                                <td><?php echo $tempel->faktur ?></td>
                                                                <td><?php echo $tempel->nama_peminta ?></td>
                                                                <td><?php echo $tempel->nama_section ?></td>
                                                                <td><?php echo $tempel->tanggal ?></td>
                                                                <td>
                                                                     <?php if ($tempel->status == 'Selesai') { ?>
                                                                         <h6>
                                                                             <span class="badge badge-success">
                                                                                 <?php echo $tempel->status ?>
                                                                             </span>
                                                                         </h6>
                                                                  <?php } ?>     
                                                                </td>
                                                                <td><?php echo $tempel->waktu ?></td>
                                                                <td>
                                                                    <a href="<?php echo site_url('printpermintaan'); ?><?php echo $tempel->faktur ?>" target="_blank" class="btn btn-sm btn-success">
                                                                    Cetak PDF
                                                                    </a>
                                                                    <a href="<?php echo site_url('detailpermintaan'); ?><?php echo $tempel->faktur ?>" class="btn btn-sm btn-purple">
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
                                </div>
                            </div>
                    <?php } ?>
                    <?php
                    if ($this->session->userdata('role') == 'sdr_Kepala Bagian') {
                        ?>
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="font-weight-bold text-success">
                                    Data Request Sundries Dibagian Anda
                                </h6>
                            </div>
                            <div class="card-body">
                                <nav>
                                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#request" role="tab" aria-controls="nav-home" aria-selected="true">
                                            Request
                                        </a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#disetujui1" role="tab" aria-controls="nav-profile" aria-selected="false">         
                                            Disetujui Kepala Bagian
                                        </a>
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#disetujui2" role="tab" aria-controls="nav-profile" aria-selected="false">         
                                            Disetujui Kepala Gudang
                                        </a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#ditolak" role="tab" aria-controls="nav-contact" aria-selected="false">
                                            Ditolak
                                        </a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#diproses" role="tab" aria-controls="nav-contact" aria-selected="false">
                                            Diproses
                                        </a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#selesai" role="tab" aria-controls="nav-contact" aria-selected="false">
                                            Selesai
                                        </a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="request" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="table-responsive-xl">
                                            <table class="table table-borderless small tbl">
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
                                                    foreach ($kabagpermintaan as $tempel) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no ?></td>
                                                            <td><?php echo $tempel->faktur ?></td>
                                                            <td><?php echo $tempel->nama_peminta ?></td>
                                                            <td><?php echo $tempel->nama_section ?></td>
                                                            <td><?php echo $tempel->tanggal ?></td>
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
                                                                <a href="<?php echo site_url('detailpermintaan'); ?><?php echo $tempel->faktur ?>" class="btn btn-sm btn-purple">
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
                                    <div class="tab-pane fade" id="disetujui1" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="table-responsive-xl">
                                            <table class="table table-borderless small tbl">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Faktur</th>
                                                        <th>Direquest Oleh</th>
                                                        <th>Untuk Bagian</th>
                                                        <th>Dibuat Tanggal</th>
                                                        <th>Dibuat Jam</th>
                                                        <th>Disetujui Tanggal</th>
                                                        <th>Disetujui Jam</th>
                                                        <th>Status</th>
                                                        <th>Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($kabagsetuju as $tempel) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no ?></td>
                                                            <td><?php echo $tempel->faktur ?></td>
                                                            <td><?php echo $tempel->nama_peminta ?></td>
                                                            <td><?php echo $tempel->nama_section ?></td>
                                                            <td><?php echo $tempel->tanggal ?></td>
                                                            <td><?php echo $tempel->jamdibuat ?></td>
                                                            <td><?php echo $tempel->tanggal_setuju ?></td>
                                                            <td><?php echo $tempel->jamsetuju ?></td>
                                                            <td>
                                                                 <?php if ($tempel->status == 'Disetujui') { ?>
                                                                     <h6>
                                                                         <span class="badge badge-primary">
                                                                             <?php echo $tempel->status ?>
                                                                         </span>
                                                                     </h6>
                                                              <?php } ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo site_url('printpermintaan'); ?><?php echo $tempel->faktur ?>" target="_blank" class="btn btn-sm btn-success">
                                                                Cetak PDF
                                                                </a>
                                                                <a href="<?php echo site_url('detailpermintaan'); ?><?php echo $tempel->faktur ?>" class="btn btn-sm btn-purple">
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
                                    <div class="tab-pane fade" id="disetujui2" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="table-responsive-xl">
                                            <table class="table table-borderless small tbl">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Faktur</th>
                                                        <th>Direquest Oleh</th>
                                                        <th>Untuk Bagian</th>
                                                        <th>Dibuat Tanggal</th>
                                                        <th>Dibuat Jam</th>
                                                        <th>Disetujui Tanggal</th>
                                                        <th>Disetujui Jam</th>
                                                        <th>Status</th>
                                                        <th>Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($kabagsetuju as $tempel) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no ?></td>
                                                            <td><?php echo $tempel->faktur ?></td>
                                                            <td><?php echo $tempel->nama_peminta ?></td>
                                                            <td><?php echo $tempel->nama_section ?></td>
                                                            <td><?php echo $tempel->tanggal ?></td>
                                                            <td><?php echo $tempel->jamdibuat ?></td>
                                                            <td><?php echo $tempel->tanggal_setuju ?></td>
                                                            <td><?php echo $tempel->jamsetuju ?></td>
                                                            <td>
                                                                 <?php if ($tempel->status == 'Disetujui') { ?>
                                                                     <h6>
                                                                         <span class="badge badge-primary">
                                                                             <?php echo $tempel->status ?>
                                                                         </span>
                                                                     </h6>
                                                              <?php } ?>
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo site_url('printpermintaan'); ?><?php echo $tempel->faktur ?>" target="_blank" class="btn btn-sm btn-success">
                                                                Cetak PDF
                                                                </a>
                                                                <a href="<?php echo site_url('detailpermintaan'); ?><?php echo $tempel->faktur ?>" class="btn btn-sm btn-purple">
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
                                    <div class="tab-pane fade" id="ditolak" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <div class="table-responsive-xl">
                                            <table class="table table-borderless small tbl">
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
                                                    foreach ($kabagtolak as $tempel) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no ?></td>
                                                            <td><?php echo $tempel->faktur ?></td>
                                                            <td><?php echo $tempel->nama_peminta ?></td>
                                                            <td><?php echo $tempel->nama_section ?></td>
                                                            <td><?php echo $tempel->tanggal ?></td>
                                                            <td>
                                                                 <?php if ($tempel->status == 'Ditolak') { ?>
                                                                     <h6>
                                                                         <span class="badge badge-danger">
                                                                             <?php echo $tempel->status ?>
                                                                         </span>
                                                                     </h6>
                                                              <?php } ?> 
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo site_url('detailpermintaan'); ?><?php echo $tempel->faktur ?>" class="btn btn-sm btn-purple">
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
                                    <div class="tab-pane fade" id="diproses" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="table-responsive-xl">
                                            <table class="table table-borderless small tbl">
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
                                                    foreach ($kabagproses as $tempel) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no ?></td>
                                                            <td><?php echo $tempel->faktur ?></td>
                                                            <td><?php echo $tempel->nama_peminta ?></td>
                                                            <td><?php echo $tempel->nama_section ?></td>
                                                            <td><?php echo $tempel->tanggal ?></td>
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
                                                                <a href="<?php echo site_url('printpermintaan'); ?><?php echo $tempel->faktur ?>" target="_blank" class="btn btn-sm btn-success">
                                                                Cetak PDF
                                                                </a>
                                                                <a href="<?php echo site_url('detailpermintaan'); ?><?php echo $tempel->faktur ?>" class="btn btn-sm btn-purple">
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
                                    <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="table-responsive-xl">
                                            <table class="table table-borderless small tbl">
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
                                                    foreach ($kabagselesai as $tempel) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no ?></td>
                                                            <td><?php echo $tempel->faktur ?></td>
                                                            <td><?php echo $tempel->nama_peminta ?></td>
                                                            <td><?php echo $tempel->nama_section ?></td>
                                                            <td><?php echo $tempel->tanggal ?></td>
                                                            <td>
                                                                 <?php if ($tempel->status == 'Selesai') { ?>
                                                                     <h6>
                                                                         <span class="badge badge-success">
                                                                             <?php echo $tempel->status ?>
                                                                         </span>
                                                                     </h6>
                                                              <?php } ?>     
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo site_url('printpermintaan'); ?><?php echo $tempel->faktur ?>" target="_blank" class="btn btn-sm btn-success">
                                                                Cetak PDF
                                                                </a>
                                                                <a href="<?php echo site_url('detailpermintaan'); ?><?php echo $tempel->faktur ?>" class="btn btn-sm btn-purple">
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
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    if ($this->session->userdata('role') == 'sdr_Admin Gudang' or $this->session->userdata('role') == 'sdr_Kepala Gudang') {
                        ?>
                        <?php if ($this->session->userdata('role') == 'sdr_Admin Gudang') { ?>
                            <a href="#" class="btn btn-sm btn-info mb-3"data-toggle="modal" data-target="#modal-tambah-barang">
                                Tambah Barang
                            </a>
                        <?php } ?>
                        <div class="card shadow mb-3">
                            <div class="card-header py-3">
                                <h6 class="font-weight-bold text-success">
                                    Semua Data Request Sundries
                                </h6>
                            </div>
                            <div class="card-body">
                                <nav>
                                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                        
                                        <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#disetujui2" role="tab" aria-controls="nav-profile" aria-selected="false">         
                                            Disetujui Kepala Gudang
                                        </a>
                                        
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#diproses" role="tab" aria-controls="nav-contact" aria-selected="false">
                                            Diproses
                                        </a>
                                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#selesai" role="tab" aria-controls="nav-contact" aria-selected="false">
                                            Selesai
                                        </a>
                                    </div>
                                </nav>
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="disetujui2" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="table-responsive-xl">
                                            <table class="table table-borderless small tbl">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Faktur</th>
                                                        <th>Direquest Oleh</th>
                                                        <th>Untuk Bagian</th>
                                                        <th>Dibuat Tanggal</th>
                                                        <th>Dibuat Jam</th>
                                                        <th>Status</th>
                                                        <th>Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($bysetuju2 as $tempel) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no ?></td>
                                                            <td><?php echo $tempel->faktur ?></td>
                                                            <td><?php echo $tempel->nama_peminta ?></td>
                                                            <td><?php echo $tempel->nama_section ?></td>
                                                            <td><?php echo $tempel->tanggal ?></td>
                                                            <td><?php echo $tempel->jamdibuat ?></td>
                                                            <td>
                                                                 <?php if ($tempel->status == 'Disetujui2') { ?>
                                                                     <h6>
                                                                         <span class="badge badge-primary">
                                                                             Disetujui Kelapa Gudang
                                                                         </span>
                                                                     </h6>
                                                              <?php } ?>    
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo site_url('detailpermintaan'); ?><?php echo $tempel->faktur ?>" class="btn btn-sm btn-purple">
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
                                    <div class="tab-pane fade" id="diproses" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="table-responsive-xl">
                                            <table class="table table-borderless small tbl">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Faktur</th>
                                                        <th>Direquest Oleh</th>
                                                        <th>Untuk Bagian</th>
                                                        <th>Dibuat Tanggal</th>
                                                        <th>Dibuat Jam</th>
                                                        <th>Status</th>
                                                        <th>Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($byproses as $tempel) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no ?></td>
                                                            <td><?php echo $tempel->faktur ?></td>
                                                            <td><?php echo $tempel->nama_peminta ?></td>
                                                            <td><?php echo $tempel->nama_section ?></td>
                                                            <td><?php echo $tempel->tanggal ?></td>
                                                            <td><?php echo $tempel->jamdibuat ?></td>
                                                            <td>
                                                                <?php if ($tempel->status == 'Diproses') { ?>
                                                                    <h6>
                                                                        <span class="badge badge-info">
                                                                            <?php echo $tempel->status ?>
                                                                        </span>
                                                                    </h6>
                                                            <?php } ?>     
                                                            </td>
                                                            <?php if ($this->session->userdata('role') == 'sdr_Admin Gudang') { ?>
                                                                <td>
                                                                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-selesai<?php echo $tempel->id_request_sundries ?>">
                                                                        Selesaikan Request   
                                                                    </a> 
                                                                </td>
                                                        <?php } ?>
                                                            <?php if ($this->session->userdata('role') == 'sdr_Kepala Gudang' or $this->session->userdata('role') == 'sdr_Admin Gudang') { ?>
                                                                <td>
                                                                    <a href="<?php echo site_url('detailpermintaan'); ?><?php echo $tempel->faktur ?>" class="btn btn-sm btn-purple">
                                                                        Detail   
                                                                    </a> 
                                                                </td>
                                                        <?php } ?>
                                                        </tr>
                                                        <?php
                                                        $no++;
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="table-responsive-xl">
                                            <table class="table table-borderless small tbl">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Faktur</th>
                                                        <th>Direquest Oleh</th>
                                                        <th>Untuk Bagian</th>
                                                        <th>Dibuat Tanggal</th>
                                                        <th>Dibuat Jam</th>
                                                        <th>Status</th>
                                                        <th>Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($byselesai as $tempel) {
                                                        ?>
                                                        <tr>
                                                            <td><?php echo $no ?></td>
                                                            <td><?php echo $tempel->faktur ?></td>
                                                            <td><?php echo $tempel->nama_peminta ?></td>
                                                            <td><?php echo $tempel->nama_section ?></td>
                                                            <td><?php echo $tempel->tanggal ?></td>
                                                            <td><?php echo $tempel->jamdibuat ?></td>
                                                            <td>
                                                                 <?php if ($tempel->status == 'Selesai') { ?>
                                                                     <h6>
                                                                         <span class="badge badge-success">
                                                                             <?php echo $tempel->status ?>
                                                                         </span>
                                                                     </h6>
                                                              <?php } ?>     
                                                            </td>
                                                            <td>
                                                                <a href="<?php echo site_url('detailpermintaan'); ?><?php echo $tempel->faktur ?>" class="btn btn-sm btn-purple">
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

        <div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Request Sundries</h5>
                        <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">Tutup</span>
                        </button>
                    </div>
                    <form action="<?php echo site_url('addpermintaan') ?>" method="POST">
                        <div class="modal-body">
                            <?php if (validation_errors()) { ?>
                                <div class="alert alert-danger">
                                    <?php echo validation_errors(); ?>
                                </div>
                            <?php } ?>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label>Faktur</label>
                                    <input type="text" class="form-control" value="<?= $faktur; ?>" name="faktur" required readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Tanggal</label>
                                    <input type="text" class="form-control" value="<?= date('Y-m-d') ?>" name="tanggal" required readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Jam</label>
                                    <input type="text" class="form-control" value="<?php date_default_timezone_set('Asia/Jakarta');
                                    echo date('H:i') ?>" name="jamdibuat" required readonly>
                                </div>                       
                                <div class="col-md-3 mb-3">
                                    <label>Direquest Oleh</label>
                                    <input type="text" class="form-control" name="nama" required value="<?php echo $this->session->userdata('nama') ?>" readonly>

                                    <input type="text" id="id_user" name="id_user"
                                        value=" <?php echo $this->session->userdata('id_user') ?>"
                                    hidden>

                                    <input type="text" class="form-control" value="Request" name="status" hidden>
                                    <input type="text" class="form-control" value="-" name="alasan" hidden>
                                    <input type="text" class="form-control" value="tidak" name="statuskeranjang" hidden>
                                </div>    
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>Pilihan Barang</label>
                                    <select class="form-control yoi" id="id_barang" onchange="getBarangDetails()">
                                        <option value="">--Pilih Barang--</option>
                                        <?php foreach ($barang as $tempel) { ?>
                                            <option value="<?php echo $tempel->id_barang ?>">
                                                <?php echo $tempel->barang ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label>Brand</label>
                                    <input type="text" class="form-control" id="brand" readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Type</label>
                                    <input type="text" class="form-control" id="type" readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Ukuran</label>
                                    <input type="text" class="form-control" id="ukuran" readonly>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label>Satuan</label>
                                    <input type="text" class="form-control" id="satuan" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>Jumlah</label>
                                    <input type="number" class="form-control" id="jumlah">
                                </div> 
                                <div class="col-md-6 mb-3">
                                    <label>Catatan Khusus</label>
                                    <input type="text" class="form-control" id="catatan" placeholder="Contoh, Warna Merah...">
                                </div> 
                            </div>
                            <div class="form-row mb-3">
                                <div class="col-md-12">
                                    <a href="#" class="btn btn-sm btn-info" id="keranjang">Tambahkan Ke Keranjang</a>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Keranjang</label>
                                    <div class="card shadow">
                                        <div class="table-responsive">
                                            <table class="table table-borderless small">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Barang</th>
                                                        <th>Brand</th>
                                                        <th>Type</th>
                                                        <th>Ukuran</th>
                                                        <th>Satuan</th>
                                                        <th>Jumlah</th>
                                                        <th>Catatan</th>
                                                        <th>Opsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="isikeranjang">
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>   
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success btn-sm">Buat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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

        <?php foreach ($byproses as $tempel) { ?>
            <div class="modal fade" id="modal-selesai<?php echo $tempel->id_request_sundries; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Yakin Mau Menyelesaikan Request Sundries Ini ?</h5>
                            <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">Tutup</span>
                            </button>
                        </div>
                        <form action="<?php echo site_url('permintaanselesai') ?>" method="POST">
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label>Faktur</label>
                                        <input type="text" class="form-control" name="faktur" required value="<?php echo $tempel->faktur; ?>" readonly>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label>Dibuat Oleh</label>
                                        <input type="text" class="form-control" name="nama" required value="<?php echo $tempel->nama_peminta; ?>" readonly>
                                    </div>                        
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 mb-3">
                                        <label>Untuk Bagian</label>
                                        <input type="text" class="form-control" name="bagian" required value="<?php echo $tempel->nama_section; ?>" readonly>
                                    </div> 
                                    <div class="col-md-6 mb-3">
                                        <label>Dibuat Tanggal</label>
                                        <input type="text" class="form-control" name="tanggal" required value="<?php echo $tempel->tanggal; ?>" readonly>
                                        <input type="text" class="form-control" name="status" required value="Selesai" hidden>
                                    </div>                        
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success btn-sm">Selesaikan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>

        <div class="modal fade" id="modal-tambah-barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                        <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">Tutup</span>
                        </button>
                    </div>
                    <form action="<?php echo site_url('addbarangother') ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>Jenis</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="jenis" required>
                                        <option value="--Pilih Kategori--" selected>--Pilih Jenis--</option>
                                    <?php
                                    $div = $this->m_jenis->getJenisAll();
                                    foreach ($div as $d) { ?>
                                        ?>
                                            <option value="<?php echo $d->id_jenis ?>">
                                                <?php echo $d->jenis ?> -> <?php echo $d->kategori ?>
                                            </option>
                                    <?php
                                    }
                                    ?>
                                    </select>
                                </div> 
                                <div class="col-md-6 mb-3">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="barang" required placeholder="Inputkan Nama Barang...">
                                </div>                        
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>Brand</label>
                                    <input type="text" class="form-control" name="brand" required placeholder="Inputkan Brand...">
                                </div> 
                                <div class="col-md-6 mb-3">
                                    <label>Type</label>
                                    <input type="text" class="form-control" name="type" required placeholder="Inputkan Type...">
                                </div>                       
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>Ukuran</label>
                                    <input type="text" class="form-control" name="ukuran" required placeholder="Inputkan Ukuran...">
                                </div> 
                                <div class="col-md-6 mb-3">
                                    <label>Satuan</label>
                                    <input type="text" class="form-control" name="satuan" required placeholder="Inputkan Satuan...">
                                </div> 
                                <input type="text" class="form-control" name="stok" value="0" required hidden>                    
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success btn-sm">Buat</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

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

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <script>
            $(document).ready(function (){
                $('.tbl').DataTable();
            });

            function loaddatabarang(){
                var id_user   = $('#id_user').val();
                $.ajax({
                    type:'POST',
                    url: "<?php echo site_url('showkeranjangpermintaan') ?>",
                    data:{id_user:id_user},
                    cache:false,
                    success:function(respond){
                        $('#isikeranjang').html(respond);
                    }
                });
            }

            $("#keranjang").click(function(){
                var id_barang = $('#id_barang').val();
                var qty       = $('#jumlah').val();
                var catatan   = $('#catatan').val();
                var id_user   = $('#id_user').val();

                if (id_barang == 0){
                    Swal.fire("Barang Belum Dipilih... !", "Pilih Barang...", "warning");
                }else if (qty == "" || qty == 0){
                    Swal.fire("Jumlah Barang Kosong...", "Isi Jumlah...", "warning");
               // }else if(catatan ==""){
                 //   Swal.fire("Yakin Nggak Ada Catatan Khusus ?", "Isikan '-' Aja Kalo Begitu...", "warning");
                }else{
                    $.ajax({
                        type:'POST',
                        url:"<?php echo site_url('cekkeranjangpermintaan') ?>",
                        data:{
                            id_barang : id_barang,
                            qty : qty,
                            id_user : id_user,
                            catatan : catatan
                        },
                        cache: false,
                        success: function(respond){
                            loaddatabarang();
                        }
                    }); 
                } 
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

            $(document).ready(function(){
                $('#id_barang').change(function(){
                    var id_barang = $(this).val();
                    $.ajax({
                        type:'POST',
                        url:"<?php echo site_url('detailbarang') ?>",
                        data:'id_barang='+id_barang,
                        dataType:'JSON',
                        success:function(data){
                            $("#brand").val(data.brand);
                            $("#type").val(data.type);
                            $("#ukuran").val(data.ukuran);
                            $("#satuan").val(data.satuan);
                        }
                    });
                });
            });
        </script>

        <script>
            function getBarangDetails() {
                var selectedBarangId = document.getElementById("id_barang").value;
            
                // Buat request AJAX ke controller untuk mendapatkan informasi barang berdasarkan ID
                $.ajax({
                    url: "<?php echo site_url('Sundries/Transaksi/c_permintaan/detailBarang') ?>",
                    method: "POST",
                    data: {id_barang: selectedBarangId},
                    success: function(response) {
                        // Isi nilai field dengan informasi barang yang diterima dari controller
                        document.getElementById("brand").value = response.brand;
                        document.getElementById("type").value = response.type;
                        document.getElementById("ukuran").value = response.ukuran;
                        document.getElementById("satuan").value = response.satuan;
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        </script>

    </body>
</html>


            