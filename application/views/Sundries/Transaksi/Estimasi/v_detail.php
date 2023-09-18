<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="<?php echo base_url(); ?>dnp-logo.png"rel="icon">
    <title>DNP - HIS</title>


    <link href="<?php echo base_url(); ?>bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>bootstrap/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url(); ?>bootstrap/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>bootstrap/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
</head>
<style type="text/css">
    .btn-purple {
        background-color: #6b0391;
        color: white;
    }

    <style type="text/css">.btn-purple {
        background-color: #6b0391;
        color: white;
    }

    .btn-purple:hover {
        color: white;
        background-color: #400257;
    }
</style>

<body id="page-top">
    <div class="container-fluid">
        <div class="card shadow mt-4">
            <div class="card-header py-3">
                <h5 class="m-0 font-weight-bold text-success">Data Estimasi</h5>
            </div>
            <div class="card-body row">
                <div class="col-md-6">
                    <?php foreach ($data as $tempel) { ?>
                    <label>Faktur :
                        <?php echo $tempel->faktur; ?>
                    </label><br>
                    <label>Direquest Oleh :
                        <?php echo $tempel->nama_pembuat; ?>
                    </label><br>
                    <label>Bagian :
                        <?php echo $tempel->nama_section; ?>
                    </label><br>
                    <label>Dibuat Tanggal :
                        <?= date('d F Y', strtotime($tempel->tanggal)) ?>
                    </label><br>
                    <h6>
                        <?php if ($tempel->status == 'Diajukan') { ?>
                        <span class="badge badge-warning">
                            <?php echo $tempel->status; ?>
                        </span>
                        <?php } elseif ($tempel->status == 'Disetujui') { ?>
                        <span class="badge badge-primary">
                            <?php echo $tempel->status; ?>
                        </span>
                        <?php } elseif ($tempel->status == 'DiTolak') { ?>
                        <span class="badge badge-danger">
                            <?php echo $tempel->status; ?>
                        </span>
                        <?php } ?>
                    </h6>
                    <?php } ?>
                    <?php if ($this->session->userdata('role') == 'sdr_Admin Bagian' && $tempel->status == 'Ditolak') { ?>
                    <a href="#" class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="#modal-tambah<?php echo $tempel->id_estimasi; ?>">
                        <span class="text">Tambah Barang</span>
                    </a>
                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal"
                        data-target="#modal-repeat<?php echo $tempel->id_estimasi; ?>">
                        <span class="text">Ajukan Perbaikan</span>
                    </a>
                    <?php } ?>

                    <?php if ($this->session->userdata('role') == 'sdr_Admin Bagian' OR $this->session->userdata('role') == 'sdr_Kepala Bagian' && $tempel->status == 'Ditolak') { ?>
                    <?php foreach ($tolak as $isi) { ?>
                    <div class="list-group mb-2">
                        <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1 font-weight-bold text-danger">
                                    Alasan Penolakan
                                </h5>
                                <small class="text-muted text-right">
                                    <?php echo date('d F Y', strtotime($isi->tanggal_tolak)); ?>
                                    -
                                    <?php echo $isi->jamtolak; ?><br>
                                    Ditolak Oleh<br>
                                    <?php echo $isi->nama; ?>
                                </small>
                            </div>
                            <p class="mb-1">
                                <?php echo $isi->alasan_tolak; ?>
                            </p>
                        </a>
                    </div>
                    <?php }?>
                    <?php } elseif ($this->session->userdata('role') == 'sdr_Kepala Bagian' && $tempel->status == "Diajukan") { ?>
                    <a href="#" class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="#modal-setujui<?php echo $tempel->id_estimasi; ?>">
                        Setuju
                    </a>
                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                        data-target="#modal-tolak<?php echo $tempel->id_estimasi; ?>">
                        Tolak
                    </a>
                    <?php } ?>
                </div>
                <div class="card-body">
                    <?php
                        foreach($data as $tempel){
                    ?>
                    <label>Faktur : <?php echo $tempel->faktur; ?></label><br>
                    <label>Direquest Oleh : <?php echo $tempel->nama_pembuat; ?></label><br>
                    <label>Untuk Bagian : <?php echo $tempel->nama_section; ?></label><br>
                    <label>Dibuat Tanggal : <?php echo $tempel->tanggal; ?></label><br>
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
                                <td>
                                    <?php echo $no; ?>
                                </td>
                                <td>
                                    <?php echo $tempel->barang; ?>
                                </td>
                                <td>
                                    <?php echo $tempel->jumlah; ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($this->session->userdata('role') == 'sdr_Admin Bagian' && $tempel->status == 'Ditolak') { ?>
                                    <a href="#" class="btn btn-secondary btn-sm" data-toggle="modal"
                                        data-target="#modal-edit<?php echo $tempel->id_detail_estimasi; ?>">
                                        <span class="text">Ubah</span>
                                    </a>
                                    <a onclick="deleteConfirm('<?php echo base_url('Sundries/requestsundriescontroller/barangdelete/' . $tempel->id_detail_estimasi); ?>')" href="#"
                                        class="btn btn-sm btn-danger">
                                        Hapus
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


            <!-- Bootstrap core JavaScript-->
            <script src="<?php echo base_url(); ?>bootstrap/vendor/jquery/jquery.min.js"></script>
            <script src="<?php echo base_url(); ?>bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- Core plugin JavaScript-->
            <script src="<?php echo base_url(); ?>bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Page level plugins -->
            <script src="<?php echo base_url(); ?>bootstrap/vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="<?php echo base_url(); ?>bootstrap/vendor/datatables/dataTables.bootstrap4.min.js"></script>
            <!-- Page level custom scripts -->
            <script src="<?php echo base_url(); ?>bootstrap/js/demo/datatables-demo.js"></script>

            <script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/datepicker/js/bootstrap-datepicker.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url(); ?>bootstrap/js/demo/datatables-demo.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/datepicker/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTablee').DataTable();
        });
    </script>
</body>

</html>
