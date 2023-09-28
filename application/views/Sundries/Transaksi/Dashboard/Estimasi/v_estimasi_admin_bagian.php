<?php
date_default_timezone_set('Asia/Jakarta'); // Mengatur zona waktu menjadi Asia/Jakarta
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <h4>Estimation Making</h4>
    <?php if ($this->session->userdata('role') == 'super_user') { ?><h6>Admin Bagian</h6> <?php } ?>
    <?php
    if ($this->session->userdata('role') == 'sdr_Admin Bagian' || $this->session->userdata('role') == 'super_user') {
    ?>
    <!-- DataTales Example -->
    <a href="#" class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#modal-tambah">
        Buat Baru
    </a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-success">
                Detail Estimation Making Anda
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
                    </a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#proses" role="tab"
                        aria-controls="nav-contact" aria-selected="false">
                        Pemerosesan
                    </a>
                    </a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#ready" role="tab"
                        aria-controls="nav-contact" aria-selected="false">
                        Barang Ready
                    </a>
                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#selesai" role="tab"
                        aria-controls="nav-contact" aria-selected="false">
                        Selesai
                    </a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabcontent">
                <div class="tab-pane fade show active" id="diajukan" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="table-container table-responsive-xl">
                        <table class="table table-borderless small tbl">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Faktur</th>
                                    <th class="text-center">Dibuat Oleh</th>
                                    <th class="text-center">Bagian</th>
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
                                        <a onclick="deleteConfirm('<?php echo site_url('deleteestimasi/' . $tempel->faktur); ?>')" href="#"
                                            class="btn btn-sm btn-danger">
                                            Hapus
                                        </a>
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
                        <table class="table table-borderless small tbl">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Faktur</th>
                                    <th class="text-center">Dibuat Oleh</th>
                                    <th class="text-center">Bagian</th>
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

                                        <a href="<?php echo site_url('printestimasi'); ?>" target="_blank"
                                            class="btn btn-sm btn-success">
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
                        <table class="table table-borderless small tbl">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Faktur</th>
                                    <th class="text-center">Dibuat Oleh</th>
                                    <th class="text-center">Bagian</th>
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
                                            <span class="badge badge-danger">
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

                                        <a href="<?php echo site_url('printestimasi'); ?>" target="_blank"
                                            class="btn btn-sm btn-success">
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
                        <table class="table table-borderless small tbl">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Faktur</th>
                                    <th class="text-center">Dibuat Oleh</th>
                                    <th class="text-center">Bagian</th>
                                    <th class="text-center">Dibuat Tanggal</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($proses as $tempel) {
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
                                        <?php if ($tempel->status == 'Diproses') { ?>
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

                                        <a href="<?php echo site_url('printestimasi'); ?>" target="_blank"
                                            class="btn btn-sm btn-success">
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
                        <table class="table table-borderless small tbl">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Faktur</th>
                                    <th class="text-center">Dibuat Oleh</th>
                                    <th class="text-center">Bagian</th>
                                    <th class="text-center">Dibuat Tanggal</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($ready as $tempel) {
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
                                        <?php if ($tempel->status == 'Ready') { ?>
                                        <h6>
                                            <span class="badge badge-success">
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

                                        <a href="<?php echo site_url('printestimasi'); ?>" target="_blank"
                                            class="btn btn-sm btn-success">
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
                        <table class="table table-borderless small tbl">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Faktur</th>
                                    <th class="text-center">Dibuat Oleh</th>
                                    <th class="text-center">Bagian</th>
                                    <th class="text-center">Dibuat Tanggal</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    foreach ($selesai as $tempel) {
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
                                            <span class="badge badge-danger">
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

                                        <a href="<?php echo site_url('printestimasi'); ?>" target="_blank"
                                            class="btn btn-sm btn-success">
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
</div>
<br>


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
                <h5 class="modal-title" id="exampleModalLabel">Request Sundries</h5>
                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">Tutup</span>
                </button>
            </div>
            <form id="form-permintaan" action="<?php echo site_url('addestimasi'); ?>" method="POST">
                <div class="modal-body">
                    <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger">
                        <?php echo validation_errors(); ?>
                    </div>
                    <?php } ?>
                    <div class="form-row">
                        <div class="col-md-3 mb-3">
                            <label>Faktur</label>
                            <input type="text" class="form-control" value="EM-<?= date('d-m-Y-H-i-s') ?>"
                                name="faktur" required readonly>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Tanggal</label>
                            <input type="text" class="form-control" value="<?= date('Y-m-d') ?>" name="tanggal"
                                required readonly>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Jam</label>
                            <input type="text" class="form-control" value="<?= date('H:i:s') ?>" name="jamdibuat"
                                required readonly>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Dibuat Oleh</label>
                            <input type="text" class="form-control" value=" <?php echo $this->session->userdata('nama'); ?>" name="nama"
                                required readonly>

                            <input type="text" id="id_user" name="id_user" value=" <?php echo $this->session->userdata('id_user'); ?>"
                                hidden>

                            <input type="text" class="form-control" value="Tidak Ready" name="statusstok" hidden>

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
                        <div class="col-md-12 mb-3">
                            <label>Catatan</label>
                            <textarea class="form-control" id="catatan" placeholder="Misal, Joyko Erasable Gel Pen | GP-321 Warna Hitam"
                                rows="2"></textarea>
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
                                                <th class="text-center">Brand</th>
                                                <th class="text-center">Type</th>
                                                <th class="text-center">Ukuran</th>
                                                <th class="text-center">Satuan</th>
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
                    <button id="buat" class="btn btn-success btn-sm" type="button">Buat</button>
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
    // Ketika tombol "Buat" dalam modal diklik
    $("#buat").click(function() {
        // Cek apakah keranjang sudah terisi
        if (isCartEmpty()) {
            Swal.fire("Keranjang Masih Kosong", "Tambahkan barang ke keranjang terlebih dahulu.", "warning");
        } else {
            // Jika keranjang sudah terisi, kirim permintaan dengan mengirimkan formulir
            $("#form-permintaan").submit();
        }
    });

    // Fungsi untuk memeriksa apakah keranjang kosong
    function isCartEmpty() {
        // Gantilah ini dengan logika yang sesuai untuk memeriksa keranjang
        // Misalnya, periksa apakah elemen keranjang memiliki item atau tidak
        var keranjang = $("#isikeranjang");
        return keranjang.children().length === 0;
    }
</script>

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

    $(document).ready(function() {
        $('#id_barang').change(function() {
            var id_barang = $(this).val();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('detailbarangestimasi'); ?>",
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
