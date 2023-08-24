<!-- Begin Page Content -->
<div class="container-fluid">
    <h4>Consumption Sundries</h4>
    <?php
                    if ($this->session->userdata('role') == 'sdr_Admin Bagian') {
                        ?>
    <!-- DataTales Example -->
    <a href="#" class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#modal-tambah">
        Buat Baru
    </a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-success">
                Data Request Consumption Anda
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive-xl">
                <table class="table table-borderless small" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Faktur</th>
                            <th class="text-center">Direquest Oleh</th>
                            <th class="text-center">Untuk Bagian</th>
                            <th class="text-center">Dibuat Tanggal</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                            $no = 1;
                                            foreach ($konsumsi as $tempel) {
                                                ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $no; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tempel->faktur; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tempel->nama_peminta; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tempel->nama_section; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tempel->tanggal; ?>
                            </td>
                            <td class="text-center">
                                <?php if ($tempel->status == 'Request') { ?>
                                <div class="alert alert-danger text-center">
                                    <?php echo $tempel->status; ?>
                                </div>
                                <?php } ?>
                                <?php if ($tempel->status == 'Disetujui') { ?>
                                <div class="alert alert-primary text-center">
                                    <?php echo $tempel->status; ?>
                                </div>
                                <?php } ?>
                                <?php if ($tempel->status == 'Diproses') { ?>
                                <div class="alert alert-warning text-center">
                                    <?php echo $tempel->status; ?>
                                </div>
                                <?php } ?>
                                <?php if ($tempel->status == 'Selesai') { ?>
                                <div class="alert alert-success text-center">
                                    <?php echo $tempel->status; ?>
                                </div>
                                <?php } ?>
                                <?php if ($tempel->status == 'Ditolak') { ?>
                                <div class="alert alert-secondary text-center">
                                    <?php echo $tempel->status; ?>
                                </div>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <?php if ($tempel->status == 'Request') { ?>
                                <a onclick="deleteConfirm('<?php echo site_url('deletekonsumsi/' . $tempel->faktur); ?>')" href="#"
                                    class="btn btn-sm btn-danger">
                                    Hapus
                                </a>
                                <?php } ?>

                                <a href="<?= base_url() ?>Sundries/Transaksi/c_consumption/detail/<?php echo $tempel->faktur; ?>"
                                    target="_blank" class="btn btn-sm btn-purple">
                                    Detail
                                </a>
                                <?php if ($tempel->status != 'Request') { ?>
                                <a href="<?php echo site_url(); ?>Sundries/consumptioncontroller/printpdf/<?php echo $tempel->faktur; ?>"
                                    target="_blank" class="btn btn-sm btn-success">
                                    Cetak PDF
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
    <?php
                    if ($this->session->userdata('role') == 'sdr_Kepala Bagian') {
                        ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-success">
                Data Request Consumption Dibagian Anda
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive-xl">
                <table class="table table-borderless small" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Faktur</th>
                            <th class="text-center">Dibuat Oleh</th>
                            <th class="text-center">Untuk Bagian</th>
                            <th class="text-center">Dibuat Tanggal</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                            $no = 1;
                                            foreach ($kepalabagian as $tempel) {
                                                ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $no; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tempel->faktur; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tempel->nama_peminta; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tempel->nama_section; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tempel->tanggal; ?>
                            </td>
                            <td class="text-center">
                                <?php if ($tempel->status == 'Request') { ?>
                                <div class="alert alert-danger text-center">
                                    <?php echo $tempel->status; ?>
                                </div>
                                <?php } ?>
                                <?php if ($tempel->status == 'Disetujui') { ?>
                                <div class="alert alert-success text-center">
                                    <?php echo $tempel->status; ?>
                                </div>
                                <?php } ?>
                                <?php if ($tempel->status == 'Tolak') { ?>
                                <div class="alert alert-warning text-center">
                                    <?php echo $tempel->status; ?>
                                </div>
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
    <?php
                    if ($this->session->userdata('role') == 'super_user') {
                        ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-success">
                Data Request Consumption
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive-xl">
                <table class="table table-borderless small" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Faktur</th>
                            <th class="text-center">Dibuat Oleh</th>
                            <th class="text-center">Untuk Bagian</th>
                            <th class="text-center">Dibuat Tanggal</th>
                            <th class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                            $no = 1;
                                            foreach ($allkonsumsi as $tempel) {
                                                ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $no; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tempel->faktur; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tempel->nama_peminta; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tempel->nama_section; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tempel->tanggal; ?>
                            </td>
                            <td class="text-center">
                                <?php if ($tempel->status == 'Request') { ?>
                                <div class="alert alert-danger text-center">
                                    <?php echo $tempel->status; ?>
                                </div>
                                <?php } ?>
                                <?php if ($tempel->status == 'Disetujui') { ?>
                                <div class="alert alert-success text-center">
                                    <?php echo $tempel->status; ?>
                                </div>
                                <?php } ?>
                                <?php if ($tempel->status == 'Ditolak') { ?>
                                <div class="alert alert-warning text-center">
                                    <?php echo $tempel->status; ?>
                                </div>
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
                <a class="btn btn-warning" href="<?php echo site_url(); ?>/auth/logout">
                    Logout
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Request Consumption Baru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?php echo site_url('addkonsumsi'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label>Faktur</label>
                            <input type="text" class="form-control" value="RC-<?= date('d-m-Y-H-i-s') ?>"
                                name="faktur" required readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Tanggal</label>
                            <input type="text" class="form-control" value="<?= date('Y-m-d') ?>" name="tanggal"
                                required readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Di Request Oleh</label>
                            <input type="text" class="form-control" value=" <?php echo $this->session->userdata('nama'); ?>" name="nama"
                                required readonly>

                            <input type="text" id="id_user" name="id_user" value=" <?php echo $this->session->userdata('id_user'); ?>"
                                hidden>

                            <input type="text" class="form-control" value="Request" name="status" hidden>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="form-row">
                                <div class="col-md-11 mb-3">
                                    <label>Faktur Estimasi</label>
                                    <select class="form-control" id="fakturestimasi" name="fakest">
                                        <option value=" ">--Pilih Estimasi--</option>
                                        <?php foreach ($estimasi as $tempel) { ?>
                                        <option value="<?php echo $tempel->faktur; ?>">
                                            <?php echo $tempel->faktur; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-11 mb-3">
                                    <label>Pilihan Barang dan Jumlah, Sesuai Dengan Estimasi Yang Sudah
                                        Dibuat</label>
                                    <select class="form-control" id="id_barang">

                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-11 mb-3">
                                    <label>Jumlahnya</label>
                                    <input type="text" class="form-control" id="jumlah"
                                        placeholder="Inputkan Jumlah....">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-11 mb-3">
                                    <a href="#" class="btn btn-sm btn-info" id="keranjang">Masukan Ke
                                        Keranjang</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-row">
                                <div class="col-md-12 mb-3">
                                    <label>Keranjang</label>
                                    <div class="card shadow">
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th class="text-center">No</th>
                                                        <th class="text-center">Barang</th>
                                                        <th class="text-center">Jumlah</th>
                                                        <th class="text-center">Opsi</th>
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-warning" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success btn-sm">Buat</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kamu Yakin ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
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


<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url(); ?>bootstrap/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url(); ?>bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url(); ?>bootstrap/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url(); ?>bootstrap/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>bootstrap/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url(); ?>bootstrap/js/demo/datatables-demo.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/datepicker/js/bootstrap-datepicker.min.js"></script>

<script>
    loaddatabarang();


    $(document).ready(function() {
        $('.tabel-data').DataTable();
    });

    function loaddatabarang() {
        var id_user = $('#id_user').val();
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('showkeranjangkonsumsi'); ?>",
            data: {
                id_user: id_user
            },
            cache: false,
            success: function(respond) {
                $('#isikeranjang').html(respond);
            }
        });
    }

    $("#keranjang").click(function() {
        var id_barang = $('#id_barang').val();
        var qty = $('#jumlah').val();
        var id_user = $('#id_user').val();
        var fakest = $('#fakturestimasi').val();

        if (id_barang == 0) {
            Swal.fire("Oops !", "Barang Harus Diisi...", "warning");
        } else if (qty == "" || qty == 0) {
            Swal.fire("Oops !", "Jumlah Permintaan Tidak Boleh Kosong...", "warning");
        } else {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('addkeranjangkonsumsi'); ?>",
                data: {
                    id_barang: id_barang,
                    qty: qty,
                    id_user: id_user,
                    fakest: fakest
                },
                cache: false,
                success: function() {
                    loaddatabarang();
                }
            });
        }
    });
</script>
<script>
    function deleteConfirm(url) {
        $('#tombolhapus').attr('href', url);
        $('#modal-hapus').modal();
    }

    $(document).ready(function() {
        $('#fakturestimasi').change(function() {
            var faktur = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('barangfaktur'); ?>",
                data: {
                    faktur: faktur
                },
                dataType: 'JSON',
                success: function(response) {
                    var options = '<option value=" ">--Pilih Barang--</option>';
                    for (var i = 0; i < response.length; i++) {
                        options += '<option value="' + response[i].id_barang + '">' +
                            response[i].barang + '</option>';
                    }
                    $('#id_barang').html(options);
                },
                error: function(xhr, status, error) {
                    console.error(
                    error); // Tampilkan pesan error jika permintaan AJAX gagal
                }
            });
        });
    });
</script>
</body>

</html>
