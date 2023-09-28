<div class="container-fluid">
    <h5>Form Purchasing</h5>
    <?php if ($this->session->userdata('role') == 'sdr_Admin Gudang' || $this->session->userdata('role') == 'super_user') { ?>
    <?php if ($this->session->userdata('hapus')) { ?>
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $this->session->userdata('hapus'); ?>
        <?php echo $this->session->set_userdata('hapus', null); ?>
    </div>
    <?php } ?>
    <?php if ($this->session->userdata('sukses')) { ?>
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $this->session->userdata('sukses'); ?>
        <?php echo $this->session->set_userdata('sukses', null); ?>
    </div>
    <?php } ?>
    <?php if ($this->session->userdata('addbarang')) { ?>
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $this->session->userdata('addbarang'); ?>
        <?php echo $this->session->set_userdata('addbarang', null); ?>
    </div>
    <?php } ?>
    <?php if ($this->session->userdata('requlang')) { ?>
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $this->session->userdata('requlang'); ?>
        <?php echo $this->session->set_userdata('requlang', null); ?>
    </div>
    <?php } ?>
    <?php if ($this->session->userdata('update')) { ?>
    <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $this->session->userdata('update'); ?>
        <?php echo $this->session->set_userdata('update', null); ?>
    </div>
    <?php } ?>
    <?php if ($this->session->userdata('keranjang')) { ?>
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $this->session->userdata('keranjang'); ?>
        <?php echo $this->session->set_userdata('keranjang', null); ?>
    </div>
    <?php } ?>
    <form action="<?= site_url('addkeranjangpembelian') ?>" method="POST">
        <div class="card shadow mb-3">
            <div class="card-header">
                <h5>Keranjang</h5>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-3 mb-3 text-center">
                        <br>
                        <a href="#" class="btn btn-sm btn-purple" data-toggle="modal"
                            data-target="#modal-barang">Pilih
                            Barang</a>
                        <br>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Barang</label>
                        <input type="text" class="form-control" id="barang" readonly>
                        <input type="text" id="id_barang" name="id_barang" readonly hidden>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah" readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Brand</label>
                        <input type="text" class="form-control" id="brand" readonly>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3 text-center">
                        <br>
                        <button type="submit" class="btn btn-sm btn-info">Tambahkan Ke
                            Keranjang</button>
                        <br>
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
                    <input type="text" id="id_user" name="id_user" value=" <?php echo $this->session->userdata('id_user'); ?>" hidden>
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
                                                <th class="text-center">No</th>
                                                <th class="text-center">Barang</th>
                                                <th class="text-center">Brand</th>
                                                <th class="text-center">Type</th>
                                                <th class="text-center">Ukuran</th>
                                                <th class="text-center">Satuan</th>
                                                <th class="text-center">Jumlah</th>
                                                <th class="text-center">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                                foreach ($keranjang as $tempel) { ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo $no; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $tempel->barang; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $tempel->brand; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $tempel->type; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $tempel->ukuran; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $tempel->satuan; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $tempel->jumlah; ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-sm btn-danger"
                                                        onclick="deleteConfirm('<?php echo site_url('deletekeranjangpembelian/' . $tempel->id_keranjang_purchase); ?>')">
                                                        Hapus Dari Keranjang
                                                    </a>
                                                </td>
                                                <!-- <td class="text-center">
                                                    <a href="<?php echo site_url('deletekeranjangpembelian/' . $tempel->id_keranjang_purchase); ?>" class="btn btn-sm btn-danger">
                                                        Hapus Dari Keranjang
                                                    </a>
                                                </td> -->
                                            </tr>
                                            <?php $no++;
                                                } ?>
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

    <form action="<?= site_url('addpembelian') ?>" method="POST">
        <div class="card shadow mb-3">
            <div class="card-header">
                <h5>Form Request Purchase</h5>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label>Faktur</label>
                        <input type="text" class="form-control" value="PCH-<?= date('d-m-Y-H-i-s') ?>"
                            name="faktur" required readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Tanggal</label>
                        <input type="text" class="form-control" value="<?= date('Y-m-d') ?>" name="tanggal"
                            required readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Jam</label>
                        <input type="text" class="form-control" value="<?php date_default_timezone_set('Asia/Jakarta');
                        echo date('H:i:s'); ?>" name="jam"
                            required readonly>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label>Dibuat Oleh</label>
                        <input type="text" class="form-control" name="nama" required
                            value="<?php echo $this->session->userdata('nama'); ?>" readonly>

                        <input type="text" id="id_user" name="id_user" value=" <?php echo $this->session->userdata('id_user'); ?>" hidden>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-sm">
                    Buat
                </button>
            </div>
        </div>
    </form>
    <?php } ?>
</div>

<div class="modal fade" id="modal-barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Barang Request</h5>
                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">
                    Tutup
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless small">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <!-- <th class="text-center">ID Barang</th> -->
                                                <th class="text-center">Barang</th>
                                                <th class="text-center">Brand</th>
                                                <th class="text-center">Type</th>
                                                <th class="text-center">Ukuran</th>
                                                <th class="text-center">Satuan</th>
                                                <th class="text-center">Jumlah</th>
                                                <th class="text-center">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Di dalam v_form.php -->
                                            <?php
                                            $no = 1;
                                            foreach ($barang as $tempel) { ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo $no; ?>
                                                </td>
                                                <!-- <td class="text-center"><?php echo $tempel['id_barang']; ?></td> -->
                                                <td class="text-center">
                                                    <?php echo $tempel['barang']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $tempel['brand']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $tempel['type']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $tempel['ukuran']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php echo $tempel['satuan']; ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php
                                                    if ($tempel['estimasi'] == 0) {
                                                        echo $tempel['sundries'];
                                                    } else {
                                                        echo $tempel['estimasi'];
                                                    }
                                                    ?>
                                                </td>

                                                <td class="text-center">
                                                    <a href="#" class="btn btn-sm btn-success pilih-barang"
                                                        data-id-barang="<?php echo $tempel['id_barang']; ?>"
                                                        data-barang="<?php echo $tempel['barang']; ?>"
                                                        data-brand="<?php echo $tempel['brand']; ?>"
                                                        data-type="<?php echo $tempel['type']; ?>"
                                                        data-ukuran="<?php echo $tempel['ukuran']; ?>"
                                                        data-satuan="<?php echo $tempel['satuan']; ?>"
                                                        data-sundries="<?php echo $tempel['sundries']; ?>"
                                                        data-estimasi="<?php echo $tempel['estimasi']; ?>">
                                                        Pilih
                                                    </a>

                                                </td>

                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteConfirm(url) {
        $('#tombolhapus').attr('href', url);
        $('#modal-hapus').modal();
    }

    $(document).ready(function() {
        // Tangani klik tombol "Pilih"
        $(".pilih-barang").click(function() {
            var idBarang = $(this).data("id-barang");
            var barang = $(this).data("barang");
            var brand = $(this).data("brand");
            var type = $(this).data("type");
            var ukuran = $(this).data("ukuran");
            var satuan = $(this).data("satuan");
            var sundries = $(this).data("sundries"); // Ambil nilai sundries
            var estimasi = $(this).data("estimasi"); // Ambil nilai estimasi
            console.log("Nilai Sundries:", sundries);
            console.log("Nilai Estimasi:", estimasi);

            if (sundries === 0) {
                jumlah = estimasi;
            } else {
                jumlah = sundries;
            }

            // Isi nilai input pada modal dengan data yang dipilih
            $("#id_barang").val(idBarang);
            $("#barang").val(barang);
            $("#brand").val(brand);
            $("#type").val(type);
            $("#ukuran").val(ukuran);
            $("#satuan").val(satuan);
            $("#jumlah").val(jumlah);
        });
    });
</script>
