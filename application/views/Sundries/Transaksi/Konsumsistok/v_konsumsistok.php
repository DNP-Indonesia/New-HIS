<?php
date_default_timezone_set('Asia/Jakarta'); // Mengatur zona waktu menjadi Asia/Jakarta
?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <h4>Consumption Estimation</h4>
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
                Data Consumption Estimation Anda
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
                            foreach ($konsumsistok as $tempel) {
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
                                <h6>
                                    <span class="badge badge-warning">
                                        <?php echo $tempel->status; ?>
                                    </span>
                                </h6>
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
                                <?php if ($tempel->status == 'Diproses') { ?>
                                <span class="badge badge-info">
                                    <?php echo $tempel->status; ?>
                                </span>
                                <?php } ?>
                                <?php if ($tempel->status == 'Selesai') { ?>
                                <span class="badge badge-success">
                                    <?php echo $tempel->status; ?>
                                </span>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <?php if ($tempel->status == 'Request') { ?>
                                <!-- <a onclick="deleteConfirm('<?php echo site_url('deletekonsumsistok/' . $tempel->faktur); ?>')" href="#"
                                                class="btn btn-sm btn-danger">
                                                Hapus
                                             </a> -->
                                <a href="<?php echo site_url('deletekonsumsistok/' . $tempel->faktur); ?>" class="btn btn-sm btn-danger">
                                    Hapus
                                </a>
                                <?php } ?>

                                <a href="<?php echo site_url('detailkonsumsistok/' . $tempel->faktur); ?>" target="_blank" class="btn btn-sm btn-purple">
                                    Detail
                                </a>

                                <a href="<?php echo site_url('printkonsumsistok'); ?>" target="_blank" class="btn btn-sm btn-success">
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
                Data Consumption Estimation Dibagian Anda
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
                                <h6>
                                    <span class="badge badge-warning">
                                        <?php echo $tempel->status; ?>
                                    </span>
                                </h6>
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
                                <?php if ($tempel->status == 'Diproses') { ?>
                                <span class="badge badge-info">
                                    <?php echo $tempel->status; ?>
                                </span>
                                <?php } ?>
                                <?php if ($tempel->status == 'Selesai') { ?>
                                <span class="badge badge-success">
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
    <?php
    if ($this->session->userdata('role') == 'super_user') {
        ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-success">
                Data Konsumsi
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
                                <?php if ($tempel->status == 'Request') { ?>
                                <h6>
                                    <span class="badge badge-warning">
                                        <?php echo $tempel->status; ?>
                                    </span>
                                </h6>
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
                                <?php if ($tempel->status == 'Diproses') { ?>
                                <span class="badge badge-info">
                                    <?php echo $tempel->status; ?>
                                </span>
                                <?php } ?>
                                <?php if ($tempel->status == 'Selesai') { ?>
                                <span class="badge badge-success">
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
                <h5 class="modal-title" id="exampleModalLabel">Consumption Estimation</h5>
                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">Tutup</span>
                </button>
            </div>
            <form action="<?php echo site_url('addkonsumsistok'); ?>" method="POST">
                <div class="modal-body">
                    <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger">
                        <?php echo validation_errors(); ?>
                    </div>
                    <?php } ?>
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
                            <label>DibuatOleh</label>
                            <input type="text" class="form-control" value=" <?php echo $this->session->userdata('nama'); ?>" name="nama"
                                required readonly>

                            <input type="text" id="id_user" name="id_user" value=" <?php echo $this->session->userdata('id_user'); ?>"
                                hidden>

                            <input type="text" class="form-control" value="Request" name="status" hidden>
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="col-md-4 mb-3">
                            <label>Faktur Sundries</label>
                            <select class="form-control yoi" id="faris">
                                <option value="" disabled selected>Pilih Sundries</option>
                                <?php foreach ($estimasi as $tempel) { ?>
                                <option value="<?php echo $tempel->id_detail_estimasi; ?>">
                                    <?php echo $tempel->faktur; ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Barang sesuai Faktur Estimasi</label>
                            <input type="text" class="form-control" id="id_barang"
                                placeholder="Pilih Faktur Estimasi" readonly required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Jumlah sesuai Faktur Estimasi</label>
                            <input type="text" class="form-control" id="jumlah"
                                placeholder="Pilih Faktur Estimasi" readonly required>
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
                                                <th class="text-center">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="isikeranjang">
                                            <!-- Table rows for keranjang items here -->
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
            url: "<?php echo site_url('showkeranjangkonsumsistok'); ?>",
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
            Swal.fire("Faktur Estimasi Belum Dipilih !", "Pilih Faktur Estimasi...", "warning");
        } else {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('cekkeranjangkonsumsistok'); ?>",
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
        $('.yoi').select2({
            theme: 'bootstrap4',
        });
    });

    $(document).ready(function() {
        $('#faris').change(function() {
            var id_detail_estimasi = $(this).val(); // Mengambil id_detail_estimasi dari dropdown
            console.log(id_detail_estimasi); // Cek id_detail_estimasi di konsol
            $.ajax({
                type: "POST",
                url: "<?php echo site_url('barangdetailestimasi'); ?>", // Ganti dengan URL yang sesuai untuk controller yang akan mengambil barang berdasarkan id_detail_estimasi
                data: {
                    id_detail_estimasi: id_detail_estimasi // Kirim id_detail_estimasi ke controller
                },
                dataType: 'JSON',
                success: function(response) {
                    console.log(response); // Cek respons dari server di konsol
                    if (response.length > 0) {
                        // Set nilai input barang dan input jumlah sesuai dengan respons JSON
                        $('#id_barang').val(response[0].barang);
                        $('#jumlah').val(response[0].jumlah);
                    } else {
                        // Jika tidak ada barang yang ditemukan, kosongkan nilai input barang dan input jumlah
                        $('#id_barang').val('');
                        $('#jumlah').val('');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(
                    error); // Tampilkan pesan error jika permintaan AJAX gagal
                }
            });
        });
    });
</script>
