@ -1,789 +0,0 @@
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


    <link href="<?php echo base_url(); ?>bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>bootstrap/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url(); ?>bootstrap/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>bootstrap/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

</head>
<style type="text/css">
    .btn-purple {
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
                <h5 class="m-0 font-weight-bold text-success">Data Request</h5>
            </div>
            <div class="card-body row justify-content-around">
                <div class="col-md-6">
                    <?php foreach ($data as $tempel) { ?>
                    <label>Faktur :
                        <?php echo $tempel->faktur; ?>
                    </label><br>
                    <label>Direquest Oleh :
                        <?php echo $tempel->nama_peminta; ?>
                    </label><br>
                    <label>Bagian :
                        <?php echo $tempel->nama_section; ?>
                    </label><br>
                    <label>Dibuat Tanggal :
                        <?= date('d F Y', strtotime($tempel->tanggal)) ?>
                    </label><br>
                    <h6>
                        <?php if ($tempel->status == 'Request') { ?>
                        <span class="badge badge-warning">
                            <?php echo $tempel->status; ?>
                        </span>
                        <?php } elseif ($tempel->status == 'Disetujui') { ?>
                        <span class="badge badge-primary">
                        <?php echo $tempel->status; ?>
                        </span>
                        <?php } elseif ($tempel->status == 'Diproses') { ?>
                        <span class="badge badge-info">
                            <?php echo $tempel->status; ?>
                        </span>
                        <?php } elseif ($tempel->status == 'Ditolak') { ?>
                        <span class="badge badge-danger">
                            <?php echo $tempel->status; ?>
                        </span>
                        <?php } elseif ($tempel->status == 'Barang Ready') { ?>
                        <span class="badge badge-secondary">
                            <?php echo $tempel->status; ?>
                        </span>
                        <?php } elseif ($tempel->status == 'Selesai') { ?>
                        <span class="badge badge-success">
                            <?php echo $tempel->status; ?>
                        </span>
                        <?php } ?>
                    </h6>
                    <?php } ?>
                    <?php if ($this->session->userdata('role') == 'sdr_Admin Bagian' && $tempel->status == 'Ditolak') { ?>
                    <a href="#" class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="#modal-tambah<?php echo $tempel->id_request_sundries; ?>">
                        <span class="text">Tambah Barang</span>
                    </a>
                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal"
                        data-target="#modal-repeat<?php echo $tempel->id_request_sundries; ?>">
                        <span class="text">Ajukan Perbaikan</span>
                    </a>
                    <?php } ?>
                </div>
                <div class="col-md-6">
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
                    <?php } elseif ($this->session->userdata('role') == 'sdr_Kepala Bagian' && $tempel->status == "Request") { ?>
                    <a href="#" class="btn btn-success btn-sm" data-toggle="modal"
                        data-target="#modal-setujui<?php echo $tempel->id_request_sundries; ?>">
                        Setuju
                    </a>
                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                        data-target="#modal-tolak<?php echo $tempel->id_request_sundries; ?>">
                        Tolak
                    </a>
                    <?php } elseif ($this->session->userdata('role') == 'sdr_Admin Gudang' && $tempel->status == "Disetujui") { ?>
                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal"
                        data-target="#modal-proses<?php echo $tempel->id_request_sundries; ?>">
                        Proses
                    </a>
                    <?php } ?>
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
                                <th class="text-center">No</th>
                                <th class="text-center">Barang</th>
                                <th class="text-center">Jumlah Barang</th>
                                <th class="text-center">Brand</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Ukuran</th>
                                <th class="text-center">Satuan</th>
                                <th class="text-center">Catatan</th>
                                <?php if ($this->session->userdata('role') == 'sdr_Admin Bagian' && $tempel->status == 'Ditolak') { ?>
                                <th class="text-center">Opsi</th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                foreach ($detail as $tempel) {
                                    ?>
                            <tr>
                                <td class="text-center">
                                    <?php echo $no; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $tempel->barang; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $tempel->jumlah; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $tempel->brand; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $tempel->type; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $tempel->ukuran; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $tempel->satuan; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $tempel->keterangan; ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($this->session->userdata('role') == 'sdr_Admin Bagian' && $tempel->status == 'Ditolak') { ?>
                                    <a href="#" class="btn btn-secondary btn-sm" data-toggle="modal"
                                        data-target="#modal-edit<?php echo $tempel->id_detail_sundries; ?>">
                                        <span class="text">Ubah</span>
                                    </a>
                                    <a onclick="deleteConfirm('<?php echo base_url('Sundries/requestsundriescontroller/barangdelete/' . $tempel->id_detail_sundries); ?>')" href="#"
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
    </div>

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
        function deleteConfirm(url) {
            $('#btn-delete').attr('href', url);
            $('#deleteModal').modal();
        }

        $(document).ready(function() {
            $('.yoi').select2({
                theme: 'bootstrap4',
            });
        });

        $(document).ready(function() {
            $('#id_barang').change(function() {
                var id_barang = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: "<?= site_url('Sundries/requestsundriescontroller/tampildetailbarang') ?>",
                    data: 'id_barang=' + id_barang,
                    dataType: 'JSON',
                    success: function(data) {
                        $("#brand").val(data.brand);
                        $("#type").val(data.type);
                        $("#ukuran").val(data.ukuran);
                        $("#satuan").val(data.satuan);
                    }
                });
            });
        });
    </script>
</body>

<?php foreach ($data as $tempel) { ?>
<div class="modal fade" id="modal-setujui<?php echo $tempel->id_request_sundries; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Persetujuan Permintaan</h5>
                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <form action="<?php echo site_url('approvepermintaan'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Faktur</label>
                            <input type="text" class="form-control" name="faktur" required
                                value="<?php echo $tempel->faktur; ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Bagian</label>
                            <input type="text" class="form-control" name="bagian" required
                                value="<?php echo $tempel->nama_section; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label>Dibuat Oleh</label>
                            <input type="text" class="form-control" name="nama" required
                                value="<?php echo $tempel->nama_peminta; ?>" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Dibuat Tanggal</label>
                            <input type="text" class="form-control" name="tanggal" required
                                value="<?php echo $tempel->tanggal; ?>" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Dibuat Jam</label>
                            <input type="text" class="form-control" name="tanggal" required
                                value="<?php echo $tempel->jamdibuat; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label>Disetujui Oleh</label>
                            <input type="text" class="form-control" name="penyetuju" value="<?php echo $this->session->userdata('nama'); ?>"
                                readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Disetujui Tanggal</label>
                            <input type="text" class="form-control" name="tgl_setuju"
                                value="<?= date('Y-m-d') ?>" required readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Disetujui Jam</label>
                            <input type="text" class="form-control" value="<?php date_default_timezone_set('Asia/Jakarta');
                            echo date('H:i:s'); ?>" name="jamsetuju"
                                required readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <input type="text" class="form-control" name="status" required value="Disetujui"
                                hidden>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success btn-sm">Lanjut</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>

<?php foreach ($data as $tempel) { ?>
<div class="modal fade" id="modal-tolak<?php echo $tempel->id_request_sundries; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Penolakan Permintaan</h5>
                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <form action="<?php echo site_url('rejectpermintaan'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Faktur</label>
                            <input type="text" class="form-control" name="faktur" required
                                value="<?php echo $tempel->faktur; ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Bagian</label>
                            <input type="text" class="form-control" name="bagian" required
                                value="<?php echo $tempel->nama_section; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label>Dibuat Oleh</label>
                            <input type="text" class="form-control" name="nama" required
                                value="<?php echo $tempel->nama_peminta; ?>" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Dibuat Tanggal</label>
                            <input type="text" class="form-control" required value="<?php echo $tempel->tanggal; ?>"
                                readonly>
                            <input type="text" class="form-control" name="status" required value="Ditolak"
                                hidden>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Dibuat Jam</label>
                            <input type="text" class="form-control" required value="<?php echo $tempel->jamdibuat; ?>"
                                readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label>Ditolak Oleh</label>
                            <input type="text" class="form-control" name="penolak" value="<?php echo $this->session->userdata('nama'); ?>"
                                readonly>
                            <input type="text" class="form-control" name="id_user" value="<?php echo $this->session->userdata('id_user'); ?>"
                                readonly hidden>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Ditolak Tanggal</label>
                            <input type="text" class="form-control" name="tanggaltolak" required
                                value="<?= date('Y-m-d') ?>" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Ditolak Jam</label>
                            <input type="text" class="form-control" value="<?php date_default_timezone_set('Asia/Jakarta');
                            echo date('H:i:s'); ?>" name="jam"
                                required readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label>Alasan Menolak</label>
                            <textarea class="form-control" required name="alasan"></textarea>
                        </div>
                        <input type="text" class="form-control" name="status" required value="Ditolak" hidden>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success btn-sm">Lanjut</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>

<?php foreach ($detail as $tempel) { ?>
<div class="modal fade" id="modal-edit<?php echo $tempel->id_detail_sundries; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pembaruan Permintaan</h5>
                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <form action="<?php echo site_url('updatepermintaan/'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Faktur</label>
                            <input class="form-control" type="text" name="faktur" value="<?php echo $tempel->faktur; ?>"
                                readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Barang</label>
                            <input class="form-control" type="text" name="barang" value="<?php echo $tempel->id_barang; ?>"
                                hidden>
                            <input class="form-control" type="text" value="<?php echo $tempel->barang; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Brand</label>
                            <input type="text" class="form-control" value="<?php echo $tempel->brand; ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Type</label>
                            <input type="text" class="form-control" value="<?php echo $tempel->type; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Ukuran</label>
                            <input type="text" class="form-control" value="<?php echo $tempel->ukuran; ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Satuan</label>
                            <input type="text" class="form-control" value="<?php echo $tempel->satuan; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" required
                                value="<?php echo $tempel->jumlah; ?>">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Catatan</label>
                            <input type="text" class="form-control" name="catatan" value="<?php echo $tempel->keterangan; ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success btn-sm">Lanjut</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>

<?php foreach ($data as $tempel) { ?>
<div class="modal fade" id="modal-tambah<?php echo $tempel->id_request_sundries; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <form action="<?php echo site_url('Sundries/requestsundriescontroller/barangnew'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label>Faktur</label>
                            <input type="text" class="form-control" name="faktur" required
                                value="<?php echo $tempel->faktur; ?>" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Dibuat Oleh</label>
                            <input type="text" class="form-control" name="nama" required
                                value="<?php echo $tempel->nama_peminta; ?>" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Bagian</label>
                            <input type="text" class="form-control" name="bagian" required
                                value="<?php echo $tempel->nama_section; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Pilih Barang</label>
                            <select class="form-control yoi" name="barang" id="id_barang">
                                <option value="">--Pilih Barang--</option>
                                <?php foreach ($barsund as $tempel) { ?>
                                <option value="<?php echo $tempel->id_barang; ?>">
                                    <?php echo $tempel->barang; ?>
                                    [<?php echo $tempel->brand; ?>]
                                    [<?php echo $tempel->type; ?>]
                                    [<?php echo $tempel->ukuran; ?>]
                                    [<?php echo $tempel->satuan; ?>]
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="text-danger font-weight-bold">Barang Yang Diinginkan Tidak Ada Dipilihan,
                                Silahkan Hubungi Gudang Untuk Menambahkan Barang</label>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Brand</label>
                            <input type="text" class="form-control" id="brand" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Type</label>
                            <input type="text" class="form-control" id="type" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Ukuran</label>
                            <input type="text" class="form-control" id="ukuran" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Satuan</label>
                            <input type="text" class="form-control" id="satuan" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Catatan Khusus Atau Lainnya</label>
                            <input type="text" class="form-control" name="keterangan"
                                placeholder="Contoh : Yang Buy 1 Get 1....">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success btn-sm">Lanjut</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>

<?php foreach ($data as $tempel) { ?>
<div class="modal fade" id="modal-repeat<?php echo $tempel->id_request_sundries; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pengajuan Ulang Permintaan</h5>
                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <form action="<?php echo site_url('permintaanulang'); ?>" method="POST">
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
                            <label>Bagian</label>
                            <input type="text" class="form-control" name="bagian" required
                                value="<?php echo $tempel->nama_section; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label>Tanggal</label>
                            <input type="text" class="form-control" value="<?= date('Y-m-d') ?>" name="tanggal"
                                required readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" name="status" value="Request" required
                                hidden>
                            <input type="text" class="form-control" name="stkeranjang" value="Tidak" required
                                hidden>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success btn-sm">Lanjut</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>

<?php foreach ($data as $tempel) { ?>
<div class="modal fade" id="modal-proses<?php echo $tempel->id_request_sundries; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pemrosesan Permintaan</h5>
                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <form action="<?php echo site_url('permintaanproses'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Faktur</label>
                            <input type="text" class="form-control" name="faktur" required
                                value="<?php echo $tempel->faktur; ?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Bagian</label>
                            <input type="text" class="form-control" name="bagian" required
                                value="<?php echo $tempel->nama_section; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label>Dibuat Oleh</label>
                            <input type="text" class="form-control" name="nama" required
                                value="<?php echo $tempel->nama_peminta; ?>" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Dibuat Tanggal</label>
                            <input type="text" class="form-control" name="tanggal" required
                                value="<?php echo $tempel->tanggal; ?>" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Dibuat Jam</label>
                            <input type="text" class="form-control" name="tanggal" required
                                value="<?php echo $tempel->jamdibuat; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label>Diproses Oleh</label>
                            <input type="text" class="form-control" name="pemroses" required
                                value="<?php echo $this->session->userdata('nama'); ?>" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Diproses Tanggal</label>
                            <input type="text" class="form-control" name="tanggalproses" required
                                value="<?= date('Y-m-d') ?>" readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Diproses Jam</label>
                            <input type="text" class="form-control" name="jamproses" required
                                value="<?php date_default_timezone_set('Asia/Jakarta');
                                echo date('H:i:s'); ?>" readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <input type="text" class="form-control" name="status" value="Diproses" required
                                hidden>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success btn-sm">Lanjut</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kamu Yakin ?</h5>
                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                Barang Akan Dihapus Dari Request.....
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-success" type="button" data-dismiss="modal">
                    Batal
                </button>
                <a id="btn-delete" class="btn btn-sm btn-danger" href="#">
                    Hapus
                </a>
            </div>
        </div>
    </div>
</div>

</html>
