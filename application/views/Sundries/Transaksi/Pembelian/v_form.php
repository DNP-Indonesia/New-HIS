<div class="container-fluid">
    <h5>Form Purchasing</h5>
    <?php
                            if ($this->session->userdata('role')=='sdr_Admin Gudang') {
                        ?>
    <?php if ($this->session->userdata('hapus')) { ?>
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $this->session->userdata('hapus'); ?>
        <?php echo $this->session->set_userdata('hapus', null); ?>
    </div>
    <?php }?>
    <?php if ($this->session->userdata('sukses')) { ?>
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $this->session->userdata('sukses'); ?>
        <?php echo $this->session->set_userdata('sukses', null); ?>
    </div>
    <?php }?>
    <?php if ($this->session->userdata('addbarang')) { ?>
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $this->session->userdata('addbarang'); ?>
        <?php echo $this->session->set_userdata('addbarang', null); ?>
    </div>
    <?php }?>
    <?php if ($this->session->userdata('requlang')) { ?>
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $this->session->userdata('requlang'); ?>
        <?php echo $this->session->set_userdata('requlang', null); ?>
    </div>
    <?php }?>
    <?php if ($this->session->userdata('update')) { ?>
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $this->session->userdata('update'); ?>
        <?php echo $this->session->set_userdata('update', null); ?>
    </div>
    <?php }?>
    <form action="<?= site_url('addkeranjangpembelian') ?>" method="POST">
        <div class="card shadow mb-3">
            <div class="card-header">
                <h5>Keranjang</h5>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Klik Tombol Dibawah Untuk Pilih Barang</label><br>
                        <a href="<?php echo site_url(''); ?>" class="btn btn-sm btn-purple" data-toggle="modal"
                            data-target="#modal-barang">Pilih Barang</a>
                        <label>Barang</label>
                        <input type="text" class="form-control" id="barang" readonly>
                        <input type="text" id="id_barang" name="id_barang" readonly hidden>
                        <input type="text" id="faktur" name="faktur" readonly hidden>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Brand</label>
                        <input type="text" class="form-control" id="brand" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Type</label>
                        <input type="text" class="form-control" id="type" readonly>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Ukuran</label>
                        <input type="text" class="form-control" id="ukuran" readonly>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Satuan</label>
                        <input type="text" class="form-control" id="satuan" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label>Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah" readonly>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Catatan Khusus</label>
                        <input type="text" class="form-control" name="catatan" id="catatan" readonly>
                        <input type="text" id="id_user" name="id_user" value=" <?php echo $this->session->userdata('id_user'); ?>" hidden>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Klik Untuk Masukkan Ke Keranjang</label>
                        <br>
                        <button type="submit" class="btn btn-sm btn-info">Tambahkan Ke
                            Keranjang</button>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="form-row">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless small">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Faktur Sundries</th>
                                                <th>Barang</th>
                                                <th>Brand</th>
                                                <th>Type</th>
                                                <th>Ukuran</th>
                                                <th>Satuan</th>
                                                <th>Jumlah</th>
                                                <th>Catatan</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; foreach($keranjang as $tempel) { ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $tempel->faeris; ?></td>
                                                <td><?php echo $tempel->barang; ?></td>
                                                <td><?php echo $tempel->brand; ?></td>
                                                <td><?php echo $tempel->type; ?></td>
                                                <td><?php echo $tempel->ukuran; ?></td>
                                                <td><?php echo $tempel->satuan; ?></td>
                                                <td><?php echo $tempel->jumlah; ?></td>
                                                <td><?php echo $tempel->keterangan; ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-danger"
                                                        onclick="deleteConfirm('<?php echo site_url('deletekeranjangpembelian' . $tempel->id_barang); ?>')">
                                                        Hapus Dari Keranjang
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <?php } ?>
</div>
