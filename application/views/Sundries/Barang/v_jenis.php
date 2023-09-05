<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <a href="#" class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#modal-tambah">
        Tambah Jenis
    </a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-success">
                Data Jenis
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless small" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Jenis</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($jenis as $tempel) {
                            ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $no; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tempel->jenis; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tempel->kategori; ?>
                            </td>
                            <td class="text-center">
                                <a href="#" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#modal-edit<?php echo $tempel->id_jenis; ?>">
                                    <span class="text">Ubah</span>
                                </a>
                                <!-- <a onclick="deleteConfirm('<?php echo site_url('deletejenis/' . $tempel->id_jenis); ?>')" href="#"
                                    class="btn btn-sm btn-danger">
                                    Hapus
                                </a> -->
                                <a href="<?php echo site_url('deletejenis/' . $tempel->id_jenis); ?>" class="btn btn-sm btn-danger">
                                    Hapus
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
                    Batal
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
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Tambah Jenis</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?php echo site_url('addjenis'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label>Nama Jenis</label>
                            <input type="text" class="form-control" name="jenis" required
                                placeholder="Masukan Nama Jenis Yang Diinginkan....">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label>Kategori</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="kategori" required>
                                <option value="--Pilih Kategori--" selected>--Pilih Kategori--
                                </option>
                                <?php
                                $div = $this->m_kategori->getKategoriAll();
                                foreach ($div as $d) { ?>
                                ?>
                                <option value="<?php echo $d->id_kategori; ?>">
                                    <?php echo $d->kategori; ?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-warning" type="button" data-dismiss="modal">Nggak
                        Jadi Deh</button>
                    <button type="submit" class="btn btn-success btn-sm">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($jenis as $tempel) { ?>
<div class="modal fade" id="modal-edit<?php echo $tempel->id_jenis; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Ubah jenis</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?php echo site_url('updatejenis'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label>Nama Jenis</label>
                            <input type="text" class="form-control" name="jenis" required
                                value="<?php echo $tempel->jenis; ?>">
                            <input type="text" name="id_jenis" value="<?= $tempel->id_jenis ?>" hidden>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label>Kategori</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="id_kategori" required>
                                <option value="" disabled> -- Pilih Kategori -- </option>
                                <?php
                                    $div = $this->m_kategori->getKategoriAll();
                                    foreach ($div as $d) { ?>
                                ?>
                                <option value="<?php echo $d->id_kategori; ?>" <?php if ($d->id_kategori == $tempel->id_kategori) {
                                    echo 'selected';
                                } ?>>
                                    <?php echo $d->kategori; ?>
                                </option>
                                <?php
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-warning" type="button" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success btn-sm">Ubah</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Data yang dihapus tidak akan bisa dikembalikan.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">
                    Cancel
                </button>
                <a id="btn-delete" class="btn btn-danger" href="#">
                    Delete
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
    $(document).ready(function() {
        $('.tabel-data').DataTable();
    });
</script>
<script>
    function deleteConfirm(url) {
        $('#btn-delete').attr('href', url);
        $('#modal-hapus').modal();
    }
</script>

</body>

</html>
