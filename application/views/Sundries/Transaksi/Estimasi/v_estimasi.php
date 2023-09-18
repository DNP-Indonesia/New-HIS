<!-- Begin Page Content -->
<div class="container-fluid">
    <h4>Estimation Making</h4>
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
                Data Estimation Making Anda
            </h6>
        </div>
        <div class="card-body">
            <nav>
                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#diajukan"
                        role="tab" aria-controls="nav-home" aria-selected="true">
                        Pengajuan
                    </a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#disetujui" role="tab"
                        aria-controls="nav-profile" aria-selected="false">
                        Persetujuan
                    </a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#ditolak" role="tab"
                        aria-controls="nav-contact" aria-selected="false">
                        Penolakan
                    </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabcontent">
                <div class="tab-pane fade show active" id="diajukan" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="table-container table-responsive-xl">
                        <table class="table table-borderless small" id="dataTable">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Faktur</th>
                                    <th class="text-center">Dibuat Oleh</th>
                                    <th class="text-center">Untuk Bagian</th>
                                    <th class="text-center">Dibuat Tanggal</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            $no = 1;
                            foreach ($estimasi as $tempel) {
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo $no; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $tempel->faktur; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $tempel->nama_pembuat; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $tempel->nama_section; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $tempel->tanggal; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($tempel->status == 'Diajukan') { ?>
                                        <h6>
                                            <span class="badge badge-warning">
                                                <?php echo $tempel->status; ?>
                                            </span>
                                        </h6>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($tempel->status == 'Diajukan') { ?>
                                        <!-- <a onclick="deleteConfirm('<?php echo site_url('deleteestimasi/' . $tempel->faktur); ?>')" href="#"
                                    class="btn btn-sm btn-danger">
                                    Hapus
                                </a> -->
                                        <a href="<?php echo site_url('deleteestimasi/' . $tempel->faktur); ?>" class="btn btn-sm btn-danger">
                                            Hapus
                                        </a>
                                        <?php } ?>

                                        <a href="<?php echo site_url('detailestimasi/' . $tempel->faktur); ?>" target="_blank" class="btn btn-sm btn-purple">
                                            Detail
                                        </a>

                                        <a href="<?php echo site_url('printestimasi'); ?>" target="_blank" class="btn btn-sm btn-success">
                                            Cetak PDF
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
                <div class="tab-pane fade" id="disetujui" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="table-container table-responsive-xl">
                        <table class="table table-borderless small" id="dataTable">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Faktur</th>
                                    <th class="text-center">Dibuat Oleh</th>
                                    <th class="text-center">Untuk Bagian</th>
                                    <th class="text-center">Dibuat Tanggal</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            $no = 1;
                            foreach ($setuju as $tempel) {
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo $no; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $tempel->faktur; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $tempel->nama_pembuat; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $tempel->nama_section; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $tempel->tanggal; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($tempel->status == 'Disetujui') { ?>
                                        <h6>
                                            <span class="badge badge-primary">
                                                <?php echo $tempel->status; ?>
                                            </span>
                                        </h6>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($tempel->status == 'Diajukan') { ?>
                                        <!-- <a onclick="deleteConfirm('<?php echo site_url('deleteestimasi/' . $tempel->faktur); ?>')" href="#"
                                    class="btn btn-sm btn-danger">
                                    Hapus
                                </a> -->
                                        <a href="<?php echo site_url('deleteestimasi/' . $tempel->faktur); ?>" class="btn btn-sm btn-danger">
                                            Hapus
                                        </a>
                                        <?php } ?>

                                        <a href="<?php echo site_url('detailestimasi/' . $tempel->faktur); ?>" target="_blank" class="btn btn-sm btn-purple">
                                            Detail
                                        </a>

                                        <a href="<?php echo site_url('printestimasi'); ?>" target="_blank" class="btn btn-sm btn-success">
                                            Cetak PDF
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
                <div class="tab-pane fade" id="ditolak" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="table-container table-responsive-xl">
                        <table class="table table-borderless small" id="dataTable">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Faktur</th>
                                    <th class="text-center">Dibuat Oleh</th>
                                    <th class="text-center">Untuk Bagian</th>
                                    <th class="text-center">Dibuat Tanggal</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                            $no = 1;
                            foreach ($tolak as $tempel) {
                                ?>
                                <tr>
                                    <td class="text-center">
                                        <?php echo $no; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $tempel->faktur; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $tempel->nama_pembuat; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $tempel->nama_section; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php echo $tempel->tanggal; ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($tempel->status == 'Ditolak') { ?>
                                        <h6>
                                            <span class="badge badge-warning">
                                                <?php echo $tempel->status; ?>
                                            </span>
                                        </h6>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <?php if ($tempel->status == 'Diajukan') { ?>
                                        <!-- <a onclick="deleteConfirm('<?php echo site_url('deleteestimasi/' . $tempel->faktur); ?>')" href="#"
                                    class="btn btn-sm btn-danger">
                                    Hapus
                                </a> -->
                                        <a href="<?php echo site_url('deleteestimasi/' . $tempel->faktur); ?>" class="btn btn-sm btn-danger">
                                            Hapus
                                        </a>
                                        <?php } ?>

                                        <a href="<?php echo site_url('detailestimasi/' . $tempel->faktur); ?>" target="_blank" class="btn btn-sm btn-purple">
                                            Detail
                                        </a>

                                        <a href="<?php echo site_url('printestimasi'); ?>" target="_blank" class="btn btn-sm btn-success">
                                            Cetak PDF
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
                Data Estimation Making Dibagian Anda
            </h6>
        </div>
        <div class="card-body">
            <div class="table-container table-responsive-xl">
                <table class="table table-borderless small" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Faktur</th>
                            <th class="text-center">Dibuat Oleh</th>
                            <th class="text-center">Untuk Bagian</th>
                            <th class="text-center">Dibuat Tanggal</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Opsi</th>
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
                                <?php echo $tempel->nama_pembuat; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tempel->nama_section; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tempel->tanggal; ?>
                            </td>
                            <td class="text-center">
                                <?php if ($tempel->status == 'Diajukan') { ?>
                                <span class="badge badge-warning">
                                    <?php echo $tempel->status; ?>
                                </span>
                                <?php } ?>
                                <?php if ($tempel->status == 'Disetujui') { ?>
                                <span class="badge badge-primary">
                                    <?php echo $tempel->status; ?>
                                </span>
                                <?php } ?>
                                <?php if ($tempel->status == 'Ditolak') { ?>
                                <span class="badge badge-danger">
                                    <?php echo $tempel->status; ?>
                                </span>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <a href="<?php echo site_url('detailestimasi/'); ?><?php echo $tempel->faktur; ?>" target="_blank"
                                    class="btn btn-sm btn-purple">
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
    <?php
    if ($this->session->userdata('role') == 'super_user') {
        ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-success">
                Data Estimation Making
            </h6>
        </div>
        <div class="card-body">
            <div class="table-container table-responsive-xl">
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
                            foreach ($allestimasi as $tempel) {
                                ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $no; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tempel->faktur; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tempel->nama_pembuat; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tempel->nama_section; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tempel->tanggal; ?>
                            </td>
                            <td class="text-center">
                                <?php if ($tempel->status == 'Diajukan') { ?>
                                <span class="badge badge-warning">
                                    <?php echo $tempel->status; ?>
                                </span>
                                <?php } ?>
                                <?php if ($tempel->status == 'Disetujui') { ?>
                                <span class="badge badge-primary">
                                    <?php echo $tempel->status; ?>
                                </span>
                                <?php } ?>
                                <?php if ($tempel->status == 'Ditolak') { ?>
                                <span class="badge badge-danger">
                                    <?php echo $tempel->status; ?>
                                </span>
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
                    <span aria-hidden="true">Tutup</span>
                </button>
            </div>
            <div class="modal-body">Pilih Logout Untuk Keluar Aplikasi</div>
            <div class="modal-footer">
                <button class="btn btn-success" type="button" data-dismiss="modal">
                    Batal
                </button>
                <a class="btn btn-warning" href="<?php echo site_url('logout'); ?>">
                    Logout
                </a>
            </div>
        </div>
    </div>
</div>

<!-- SDR ADMIN BAGIAN MODAL -->
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Estimation Making</h5>
                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">Tutup</span>
                </button>
            </div>
            <form action="<?php echo site_url('addestimasi'); ?>" method="POST">
                <div class="modal-body">
                    <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger">
                        <?php echo validation_errors(); ?>
                    </div>
                    <?php } ?>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label>Faktur</label>
                            <input type="text" class="form-control" value="EM-<?= date('d-m-Y-H-i-s') ?>"
                                name="faktur" required readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Tanggal</label>
                            <input type="text" class="form-control" value="<?= date('Y-m-d') ?>" name="tanggal"
                                required readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Dibuat Oleh</label>
                            <input type="text" class="form-control" value=" <?php echo $this->session->userdata('nama'); ?>" name="nama"
                                required readonly>

                            <input type="text" id="id_user" name="id_user" value=" <?php echo $this->session->userdata('id_user'); ?>"
                                hidden>

                            <input type="text" class="form-control" value="Diajukan" name="status" hidden>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Pilih Barang</label>
                            <select class="form-control yoi" id="id_barang">
                                <option value="" disabled selected>Pilih Barang</option>
                                <?php foreach ($barcons as $tempel) { ?>
                                <option value="<?php echo $tempel->id_barang; ?>">
                                    <?php echo $tempel->barang; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Jumlah untuk 1 Bulan</label>
                            <input type="number" class="form-control" id="jumlah">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label>Catatan</label>
                            <textarea class="form-control" id="catatan" placeholder="Misal, Joyko Erasable Gel Pen | GP-321 Warna Hitam"
                                rows="3"></textarea>

                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="col-md-12">
                            <a href="#" class="btn btn-sm btn-info" id="keranjang">Masukkan Ke
                                Keranjang</a>
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
                                                <th class="text-center">No</th>
                                                <th class="text-center">Barang</th>
                                                <th class="text-center">Jumlah</th>
                                                <th class="text-center">Catatan</th>
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

<script>
    $(document).ready(function() {
        $('.tbl').DataTable();
    });

    function loaddatabarang() {
        var id_user = $('#id_user').val();
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('showkeranjangestimasi'); ?>",
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
        var catatan = $('#catatan').val();
        var id_user = $('#id_user').val();

        if (id_barang == 0) {
            Swal.fire("Barang Belum Dipilih... !", "Pilih Barang...", "warning");
        } else if (qty == "" || qty == 0) {
            Swal.fire("Jumlah Barang Kosong...", "Isi Jumlah...", "warning");
        } else {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('cekkeranjangestimasi'); ?>",
                data: {
                    id_barang: id_barang,
                    qty: qty,
                    id_user: id_user,
                    catatan: catatan
                },
                cache: false,
                success: function(respond) {
                    loaddatabarang();
                }
            });
        }
    });

    function deleteConfirm(url) {
        $('#tombolhapus').attr('href', url);
        $('#modal-hapus').modal();
    }

    $(document).ready(function() {
        $('.yoi').select2({
            theme: 'bootstrap4',
        });
    });
</script>
