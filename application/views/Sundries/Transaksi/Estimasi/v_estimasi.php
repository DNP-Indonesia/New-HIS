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
                    Data Estimasi Anda
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive-xl">
                    <table class="table table-borderless small" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Faktur</th>
                                <th>Dibuat Oleh</th>
                                <th>Untuk Bagian</th>
                                <th>Dibuat Tanggal</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($estimasi as $tempel) {
                            ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $tempel->faktur ?></td>
                                    <td><?php echo $tempel->nama_pembuat ?></td>
                                    <td><?php echo $tempel->nama_section ?></td>
                                    <td><?php echo $tempel->tanggal ?></td>
                                    <td>
                                        <?php if ($tempel->status == 'Diajukan') { ?>
                                            <div class="alert alert-danger text-center">
                                                <?php echo $tempel->status ?>
                                            </div>
                                        <?php } ?>
                                        <?php if ($tempel->status == 'Disetujui') { ?>
                                            <div class="alert alert-success text-center">
                                                <?php echo $tempel->status ?>
                                            </div>
                                        <?php } ?>
                                        <?php if ($tempel->status == 'Tolak') { ?>
                                            <div class="alert alert-warning text-center">
                                                <?php echo $tempel->status ?>
                                            </div>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if ($tempel->status == 'Diajukan') { ?>
                                            <a onclick="deleteConfirm('<?php echo site_url('delete/' . $tempel->faktur) ?>')" href="#" class="btn btn-sm btn-danger">
                                                Hapus
                                            </a>
                                        <?php } ?>

                                        <a href="<?php echo site_url('detailestimasi/'); ?>" target="_blank" class="btn btn-sm btn-purple">
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
    <?php } ?>
    <?php
    if ($this->session->userdata('role') == 'sdr_Kepala Bagian') {
    ?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-success">
                    Data Estimasi Dibagian Anda
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive-xl">
                    <table class="table table-borderless small" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Faktur</th>
                                <th>Dibuat Oleh</th>
                                <th>Untuk Bagian</th>
                                <th>Dibuat Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($kepalabagian as $tempel) {
                            ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $tempel->faktur ?></td>
                                    <td><?php echo $tempel->nama_pembuat ?></td>
                                    <td><?php echo $tempel->nama_section ?></td>
                                    <td><?php echo $tempel->tanggal ?></td>
                                    <td>
                                        <?php if ($tempel->status == 'Diajukan') { ?>
                                            <div class="alert alert-danger text-center">
                                                <?php echo $tempel->status ?>
                                            </div>
                                        <?php } ?>
                                        <?php if ($tempel->status == 'Disetujui') { ?>
                                            <div class="alert alert-success text-center">
                                                <?php echo $tempel->status ?>
                                            </div>
                                        <?php } ?>
                                        <?php if ($tempel->status == 'Tolak') { ?>
                                            <div class="alert alert-warning text-center">
                                                <?php echo $tempel->status ?>
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
                    Data Estimasi
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive-xl">
                    <table class="table table-borderless small" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Faktur</th>
                                <th>Dibuat Oleh</th>
                                <th>Untuk Bagian</th>
                                <th>Dibuat Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($allestimasi as $tempel) {
                            ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $tempel->faktur ?></td>
                                    <td><?php echo $tempel->nama_pembuat ?></td>
                                    <td><?php echo $tempel->nama_section ?></td>
                                    <td><?php echo $tempel->tanggal ?></td>
                                    <td>
                                        <?php if ($tempel->status == 'Diajukan') { ?>
                                            <div class="alert alert-danger text-center">
                                                <?php echo $tempel->status ?>
                                            </div>
                                        <?php } ?>
                                        <?php if ($tempel->status == 'Disetujui') { ?>
                                            <div class="alert alert-success text-center">
                                                <?php echo $tempel->status ?>
                                            </div>
                                        <?php } ?>
                                        <?php if ($tempel->status == 'Tolak') { ?>
                                            <div class="alert alert-warning text-center">
                                                <?php echo $tempel->status ?>
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
<!-- /.container-fluid -->

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
                    Batal
                </button>
                <a class="btn btn-warning" href="<?php echo site_url('logout') ?>">
                    Logout
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Estimasi Baru</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= site_url('addestimasi') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label>Faktur</label>
                            <input type="text" class="form-control" value="ES-<?= date('d-m-Y-H-i-s') ?>" name="faktur" required readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Tanggal</label>
                            <input type="text" class="form-control" value="<?= date('Y-m-d') ?>" name="tanggal" required readonly>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Dibuat Oleh</label>
                            <input type="text" class="form-control" value=" <?php echo $this->session->userdata('nama') ?>" name="nama" required readonly>

                            <input type="text" id="id_user" name="id_user" value=" <?php echo $this->session->userdata('id_user') ?>" hidden>

                            <input type="text" class="form-control" value="Diajukan" name="status" hidden>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <div class="form-row">
                                <div class="col-md-11 mb-3">
                                    <label>Pilihan Barang</label>
                                    <select class="form-control yoi" id="id_barang">
                                        <option value="0">--Pilih Barang--</option>
                                        <?php foreach ($barcons as $tempel) { ?>
                                            <option value="<?php echo $tempel->id_barang ?>">
                                                <?php echo $tempel->barang ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-11 mb-3">
                                    <label>Jumlah Untuk Satu Bulan Kedepan</label>
                                    <input type="number" class="form-control" id="jumlah">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-11 mb-3">
                                    <label>Catatan Detail Barang Atau Lainnya</label>
                                    <input type="text" class="form-control" id="keterangan" placeholder="Contoh, Pulpen Standar Joyko Hitam 75 Mili...">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-11 mb-3">
                                    <a href="<?php echo site_url('addkeranjangestimasi'); ?>" class="btn btn-sm btn-info" id="keranjang">Tambahkan Ke Keranjang</a>
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
                                                        <th>No</th>
                                                        <th>Barang</th>
                                                        <th>Jumlah</th>
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

<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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




<script>
    $(document).ready(function() {
        $('.tabel-data').DataTable();
    });

    function loaddatabarang() {
        var id_user = $('#id_user').val();
        $.ajax({
            type: 'POST',
            url: "<?php site_url('showkeranjangestimasi') ?>",
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
        var catatan = $('#keterangan').val();

        if (id_barang == 0) {
            Swal.fire("Oops !", "Barang Harus Diisi...", "warning");
        } else if (qty == "" || qty == 0) {
            Swal.fire("Oops !", "Jumlah Permintaan Tidak Boleh Kosong...", "warning");
        } else {
            $.ajax({
                type: 'POST',
                url: "<?php site_url('addkeranjangestimasi') ?>",
                data: {
                    id_barang: id_barang,
                    qty: qty,
                    id_user: id_user,
                    catatan: catatan
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
        $('.yoi').select2({
            theme: 'bootstrap4',
        });
    });
</script>