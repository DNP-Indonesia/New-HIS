<!-- Begin Page Content -->
<div class="container-fluid">
    <h4>Goods Receipt</h4>
    <?php
                        if ($this->session->userdata('role')=='sdr_Admin Gudang') {
                    ?>
    <a href="#" class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#modal-penerimaan">
        Buat Baru
    </a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-success">
                Data Penerimaan Barang
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive-xl">
                <table class="table table-borderless small tbl">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Surat Jalan</th>
                            <th class="text-center">Faktur Purchase</th>
                            <th class="text-center">Keterangan</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                            $no=1;
                                            foreach($penerimaan as $tempel){
                                        ?>
                        <tr>
                            <td class="text-center"><?php echo $no; ?></td>
                            <td class="text-center"><?php echo $tempel->suratjalan; ?></td>
                            <td class="text-center"><?php echo $tempel->fakturpurchase; ?></td>
                            <td class="text-center"><?php echo $tempel->keterangan; ?></td>
                            <td class="text-center">
                                <a onclick="deleteConfirm('<?php echo base_url('Sundries/penerimaancontroller/hapuspenerimaan/' . $tempel->id_penerimaan); ?>')" href="#"
                                    class="btn btn-sm btn-danger">
                                    Hapus
                                </a>
                                <a href="<?php echo base_url(); ?>Sundries/penerimaancontroller/detail/<?php echo $tempel->id_penerimaan; ?>"
                                    class="btn btn-sm btn-purple">
                                    Detail
                                </a>
                                <a href="<?php echo base_url(); ?>Sundries/penerimaancontroller/formaddbarang/<?php echo $tempel->id_penerimaan; ?>"
                                    class="btn btn-sm btn-info">
                                    Inputkan Daftar Barang
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
</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

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
                <a class="btn btn-sm btn-danger" href="<?php echo site_url(); ?>/auth/logout">
                    Logout
                </a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-penerimaan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Goods Receipt
                </h5>
                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">Tutup</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('Sundries/penerimaancontroller/penerimaanadd') ?>">
                <div class="modal-body">
                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <label>Surat Jalan</label>
                            <input type="text" name="suratjalan" class="form-control"
                                placeholder="Inputkan Nomor Surat Jalan...">
                        </div>
                        <div class="col-md-6">
                            <label>Faktur Purchase</label>
                            <select class="form-control" name="fakturpch">
                                <option>--Pilih Faktur Purchase</option>
                                <?php foreach ($pembelian as $tempel) {?>
                                <option><?php echo $tempel->faktur; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Keterangan (Opsional)</label>
                            <textarea class="form-control" name="keterangan"></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Nomer PO</label>
                            <input type="text" name="po" class="form-control"
                                placeholder="Inputkan Nomer PO...">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">
                        Batal
                    </button>
                    <button class="btn btn-sm btn-success" type="submit">
                        Lanjutkan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($penerimaan as $tempel) {?>
<div class="modal fade" id="modal-barang<?php echo $tempel->id_penerimaan; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Menambahkan Daftar Barang
                </h5>
                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">Tutup</span>
                </button>
            </div>
            <form method="post" action="<?= base_url('Sundries/penerimaancontroller/adddaftarbarang') ?>">
                <div class="modal-body">
                    <div class="form-row mb-3">
                        <div class="col-md-6">
                            <label>Faktur Purchase</label>
                            <select class="form-control" name="fakturpch">
                                <option>--Pilih Barang</option>
                                <?php foreach ($pembelian as $tempel) {?>
                                <option><?php echo $tempel->faktur; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Surat Jalan</label>
                            <input type="text" name="suratjalan" class="form-control"
                                placeholder="Inputkan Nomor Surat Jalan...">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <label>Keterangan (Opsional)</label>
                            <textarea class="form-control" name="keterangan">
                                        </textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Nomer PO</label>
                            <input type="text" name="po" class="form-control"
                                placeholder="Inputkan Nomer PO...">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">
                        Batal
                    </button>
                    <button class="btn btn-sm btn-success" type="submit">
                        Lanjutkan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>


<div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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

<script>
    $(document).ready(function() {
        $('.tbl').DataTable();
    });


    function deleteConfirm(url) {
        $('#tombolhapus').attr('href', url);
        $('#modal-hapus').modal();
    }
</script>

