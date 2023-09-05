<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <a href="#" class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#modal-tambah">
        Buat Barang Baru
    </a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-success">
                Data Barang
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-borderless small" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Barang</th>
                            <th>Brand</th>
                            <th>Type</th>
                            <th>Ukuran</th>
                            <th>Satuan</th>
                            <th>Jenis</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($barang as $tempel) {
                            ?>
                        <tr>
                            <td>
                                <?php echo $no; ?>
                            </td>
                            <td>
                                <?php echo $tempel->barang; ?>
                            </td>
                            <td>
                                <?php echo $tempel->brand; ?>
                            </td>
                            <td>
                                <?php echo $tempel->type; ?>
                            </td>
                            <td>
                                <?php echo $tempel->ukuran; ?>
                            </td>
                            <td>
                                <?php echo $tempel->satuan; ?>
                            </td>
                            <td>
                                <?php echo $tempel->jenis; ?>
                            </td>
                            <td>
                                <?php echo $tempel->kategori; ?>
                            </td>
                            <td>
                                <?php echo $tempel->stok; ?>
                            </td>
                            <td>
                                <a href="#" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#modal-edit<?php echo $tempel->id_barang; ?>">
                                    <span class="text">Ubah</span>
                                </a>
                                <a onclick="deleteConfirm('<?php echo base_url('Sundries/Barang/c_barang/delete/' . $tempel->id_barang); ?>')" href="#"
                                    class="btn btn-sm btn-danger">
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
<!-- /.container-fluid -->

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
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Buat Barang Baru</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?php echo site_url('addbarang') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Jenis</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="jenis" required>
                                <option value="--Pilih Kategori--" selected>--Pilih Jenis--</option>
                                <?php
                                $div = $this->m_jenis->getJenisAll();
                                foreach ($div as $d) { ?>
                                ?>
                                <option value="<?php echo $d->id_jenis; ?>">
                                    <?php echo $d->jenis; ?> -> <?php echo $d->kategori; ?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" name="barang" required
                                placeholder="Masukan Nama Barang....">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Brand</label>
                            <input type="text" class="form-control" name="brand" required
                                placeholder="Masukan Brand.....">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Type</label>
                            <input type="text" class="form-control" name="type" required
                                placeholder="Masukan Type....">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Ukuran</label>
                            <input type="text" class="form-control" name="ukuran" required
                                placeholder="Masukan Ukuran.....">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Satuan</label>
                            <input type="text" class="form-control" name="satuan" required
                                placeholder="Masukan Satuan....">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Stok</label>
                            <input type="text" class="form-control" name="stok"
                                onkeypress="return hanyaAngka(event)" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-warning" type="button" data-dismiss="modal">Nggak Jadi
                        Deh</button>
                    <button type="submit" class="btn btn-success btn-sm">Buat</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php foreach ($barang as $tempel) { ?>
<div class="modal fade" id="modal-edit<?php echo $tempel->id_barang; ?>" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Ubah Barang</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?php echo site_url('Sundries/Barang/c_barang/update') ?>" method="POST">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label>Nama Barang</label>
                            <input type="text" class="form-control" name="barang" required
                                value="<?php echo $tempel->barang; ?>">
                            <input type="text" name="id_barang" value="<?= $tempel->id_barang ?>" hidden>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label>Jenis</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="jenis" required>
                                <option value="" disabled> -- Pilih Jenis -- </option>
                                <?php
                                    $div = $this->m_jenis->getJenisAll();
                                    foreach ($div as $d) { ?>
                                ?>
                                <option value="<?php echo $d->id_jenis; ?>" <?php if ($d->id_jenis == $tempel->id_jenis) {
                                    echo 'selected';
                                } ?>>
                                    <?php echo $d->jenis; ?>
                                </option>
                                <?php
                                    }
                                    ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label>Stok</label>
                            <input type="text" class="form-control" name="stok" required
                                value="<?php echo $tempel->stok; ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-warning" type="button" data-dismiss="modal">Nggak Jadi
                        Deh</button>
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
