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
                            <th class="text-center">No</th>
                            <th class="text-center">Faktur</th>
                            <th class="text-center">Dibuat Oleh</th>
                            <th class="text-center">Untuk Bagian</th>
                            <th class="text-center">Dibuat Tanggal</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
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
                            <td class="text-center">
                                <?php if ($tempel->status == 'Diajukan') { ?>
                                <a onclick="deleteConfirm('<?php echo site_url('delete/' . $tempel->faktur); ?>')" href="#"
                                    class="btn btn-sm btn-danger">
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
                Data Estimasi
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
        $('.tabel-data').DataTable();
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
        var id_user = $('#id_user').val();
        var catatan = $('#keterangan').val();

        if (id_barang == 0) {
            Swal.fire("Oops !", "Barang Harus Diisi...", "warning");
        } else if (qty == "" || qty == 0) {
            Swal.fire("Oops !", "Jumlah Permintaan Tidak Boleh Kosong...", "warning");
        } else {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('addkeranjangestimasi'); ?>",
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
