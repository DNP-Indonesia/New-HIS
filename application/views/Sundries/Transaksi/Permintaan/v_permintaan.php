<!-- Begin Page Content -->
<div class="container-fluid">
    <h4>Request Sundries</h4>
    <?php
    if ($this->session->userdata('role') == 'sdr_Admin Bagian') {
        ?>
        <!-- DataTales Example -->
        <a href="#" class="btn btn-sm btn-success mb-3" data-toggle="modal" data-target="#modal-tambah">
            Buat Baru
        </a>

        <?php if ($this->session->userdata('berhasil')) { ?>
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <?php echo $this->session->userdata('berhasil'); ?>
                <?php echo $this->session->set_userdata('berhasil', null); ?>
            </div>
        <?php } ?>
        <?php if ($this->session->userdata('update')) { ?>
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <?php echo $this->session->userdata('update'); ?>
                <?php echo $this->session->set_userdata('update', null); ?>
            </div>
        <?php } ?>
        <?php if ($this->session->userdata('sukses')) { ?>
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <?php echo $this->session->userdata('sukses'); ?>
                <?php echo $this->session->set_userdata('sukses', null); ?>
            </div>
        <?php } ?>
        <?php if ($this->session->userdata('hapus')) { ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <?php echo $this->session->userdata('hapus'); ?>
                <?php echo $this->session->set_userdata('hapus', null); ?>
            </div>
        <?php } ?>
        <?php if ($this->session->userdata('keranjangkosong')) { ?>
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <?php echo $this->session->userdata('keranjangkosong'); ?>
                <?php echo $this->session->set_userdata('keranjangkosong', null); ?>
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

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-success">
                    Data Request Sundries Anda
                </h6>
            </div>
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#request" role="tab"
                            aria-controls="nav-home" aria-selected="true">
                            Request
                        </a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#disetujui1" role="tab"
                            aria-controls="nav-profile" aria-selected="false">
                            Disetujui Kepala Bagian
                        </a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#disetujui2" role="tab"
                            aria-controls="nav-profile" aria-selected="false">
                            Disetujui Kepala Gudang
                        </a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#ditolak" role="tab"
                            aria-controls="nav-contact" aria-selected="false">
                            Ditolak
                        </a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#diproses" role="tab"
                            aria-controls="nav-contact" aria-selected="false">
                            Diproses
                        </a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#selesai" role="tab"
                            aria-controls="nav-contact" aria-selected="false">
                            Selesai
                        </a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="request" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="table-responsive-xl">
                            <table class="table table-borderless small tbl">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Faktur</th>
                                        <th class="text-center">Direquest Oleh</th>
                                        <th class="text-center">Untuk Bagian</th>
                                        <th class="text-center">Dibuat Tanggal</th>
                                        <th class="text-center">Dibuat Jam</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($permintaan as $tempel) {
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
                                                <?php echo $tempel->jamdibuat; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($tempel->status == 'Request') { ?>
                                                    <h6>
                                                        <span class="badge badge-warning">
                                                            <?php echo $tempel->status; ?>
                                                        </span>
                                                    </h6>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-sm btn-danger"
                                                    onclick="deleteConfirm('<?php echo site_url('deletepermintaan/' . $tempel->faktur); ?>')">Hapus</a>
                                                <a href="<?php echo site_url('detailpermintaan/' . $tempel->faktur); ?>"
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
                    <div class="tab-pane fade" id="disetujui1" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="table-responsive-xl">
                            <table class="table table-borderless small tbl">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Faktur</th>
                                        <th class="text-center">Direquest Oleh</th>
                                        <th class="text-center">Untuk Bagian</th>
                                        <th class="text-center">Dibuat Tanggal</th>
                                        <th class="text-center">Dibuat Jam</th>
                                        <th class="text-center">Disetujui Tanggal</th>
                                        <th class="text-center">Disetujui Jam</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($setuju1 as $tempel) {
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
                                                <?php echo $tempel->jamdibuat; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $tempel->tanggal_setuju1; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $tempel->jamsetuju1; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($tempel->status == 'Disetujui1') { ?>
                                                    <h6>
                                                        <span class="badge badge-primary">
                                                            Disetujui Kepala Bagian
                                                        </span>
                                                    </h6>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo site_url('printpermintaan/'); ?><?php echo $tempel->faktur; ?>"
                                                    target="_blank" class="btn btn-sm btn-success">
                                                    Cetak PDF
                                                </a>
                                                <a href="<?php echo site_url('detailpermintaan/'); ?><?php echo $tempel->faktur; ?>"
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
                    <div class="tab-pane fade" id="disetujui2" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="table-responsive-xl">
                            <table class="table table-borderless small tbl">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Faktur</th>
                                        <th class="text-center">Direquest Oleh</th>
                                        <th class="text-center">Untuk Bagian</th>
                                        <th class="text-center">Dibuat Tanggal</th>
                                        <th class="text-center">Dibuat Jam</th>
                                        <th class="text-center">Disetujui Tanggal</th>
                                        <th class="text-center">Disetujui Jam</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($setuju2 as $tempel) {
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
                                                <?php echo $tempel->jamdibuat; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $tempel->tanggal_setuju2; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $tempel->jamsetuju2; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($tempel->status == 'Disetujui2') { ?>
                                                    <h6>
                                                        <span class="badge badge-primary">
                                                            Disetujui Kepala Gudang
                                                        </span>
                                                    </h6>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo site_url('printpermintaan/'); ?><?php echo $tempel->faktur; ?>"
                                                    target="_blank" class="btn btn-sm btn-success">
                                                    Cetak PDF
                                                </a>
                                                <a href="<?php echo site_url('detailpermintaan/'); ?><?php echo $tempel->faktur; ?>"
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
                    <div class="tab-pane fade" id="ditolak" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="table-responsive-xl">
                            <table class="table table-borderless small tbl">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Faktur</th>
                                        <th class="text-center">Direquest Oleh</th>
                                        <th class="text-center">Untuk Bagian</th>
                                        <th class="text-center">Dibuat Tanggal</th>
                                        <th class="text-center">Dibuat Jam</th>
                                        <th class="text-center">Ditolak Tanggal</th>
                                        <th class="text-center">Ditolak Jam</th>
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
                                                <?php echo $tempel->nama_peminta; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $tempel->nama_section; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $tempel->tanggal; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $tempel->jamdibuat; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $tempel->tanggal_tolak; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $tempel->jamtolak; ?>
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
                                                <a onclick="deleteConfirm('<?php echo site_url('deletepermintaan' . $tempel->faktur); ?>')"
                                                    href="#" class="btn btn-sm btn-danger">
                                                    Hapus
                                                </a>
                                                <a href="<?php echo site_url('detailpermintaan/'); ?><?php echo $tempel->faktur; ?>"
                                                    class="btn btn-sm btn-purple">
                                                    Lihat Alasan
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
                    <div class="tab-pane fade" id="diproses" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="table-responsive-xl">
                            <table class="table table-borderless small tbl">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Faktur</th>
                                        <th class="text-center">Direquest Oleh</th>
                                        <th class="text-center">Untuk Bagian</th>
                                        <th class="text-center">Dibuat Tanggal</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Jam</th>
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
                                                <?php echo $tempel->nama_peminta; ?>
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
                                                        <span class="badge badge-info">
                                                            <?php echo $tempel->status; ?>
                                                        </span>
                                                    </h6>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $tempel->waktu; ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo site_url('printpermintaan/'); ?><?php echo $tempel->faktur; ?>"
                                                    target="_blank" class="btn btn-sm btn-success">
                                                    Cetak PDF
                                                </a>
                                                <a href="<?php echo site_url('detailpermintaan/'); ?><?php echo $tempel->faktur; ?>"
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
                    <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="table-responsive-xl">
                            <table class="table table-borderless small tbl">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Faktur</th>
                                        <th class="text-center">Direquest Oleh</th>
                                        <th class="text-center">Untuk Bagian</th>
                                        <th class="text-center">Dibuat Tanggal</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Jam</th>
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
                                                <?php echo $tempel->nama_peminta; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $tempel->nama_section; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $tempel->tanggal; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($tempel->status == 'Selesai') { ?>
                                                    <h6>
                                                        <span class="badge badge-success">
                                                            <?php echo $tempel->status; ?>
                                                        </span>
                                                    </h6>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $tempel->waktu; ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo site_url('printpermintaan/'); ?><?php echo $tempel->faktur; ?>"
                                                    target="_blank" class="btn btn-sm btn-success">
                                                    Cetak PDF
                                                </a>
                                                <a href="<?php echo site_url('detailpermintaan/'); ?><?php echo $tempel->faktur; ?>"
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
            </div>
        </div>
    <?php } ?>
    <?php
    if ($this->session->userdata('role') == 'sdr_Kepala Bagian') {
        ?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-success">
                    Data Request Sundries Dibagian Anda
                </h6>
            </div>
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#request" role="tab"
                            aria-controls="nav-home" aria-selected="true">
                            Request
                        </a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#disetujui1" role="tab"
                            aria-controls="nav-profile" aria-selected="false">
                            Disetujui Kepala Bagian
                        </a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#disetujui2" role="tab"
                            aria-controls="nav-profile" aria-selected="false">
                            Disetujui Kepala Gudang
                        </a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#ditolak" role="tab"
                            aria-controls="nav-contact" aria-selected="false">
                            Ditolak
                        </a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#diproses" role="tab"
                            aria-controls="nav-contact" aria-selected="false">
                            Diproses
                        </a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#selesai" role="tab"
                            aria-controls="nav-contact" aria-selected="false">
                            Selesai
                        </a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="request" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="table-responsive-xl">
                            <table class="table table-borderless small tbl">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Faktur</th>
                                        <th class="text-center">Direquest Oleh</th>
                                        <th class="text-center">Untuk Bagian</th>
                                        <th class="text-center">Dibuat Tanggal</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kabagpermintaan as $tempel) {
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
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo site_url('detailpermintaan/'); ?><?php echo $tempel->faktur; ?>"
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
                    <div class="tab-pane fade" id="disetujui1" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="table-responsive-xl">
                            <table class="table table-borderless small tbl">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Faktur</th>
                                        <th class="text-center">Direquest Oleh</th>
                                        <th class="text-center">Untuk Bagian</th>
                                        <th class="text-center">Dibuat Tanggal</th>
                                        <th class="text-center">Dibuat Jam</th>
                                        <th class="text-center">Disetujui Tanggal</th>
                                        <th class="text-center">Disetujui Jam</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kabagsetuju as $tempel) {
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
                                                <?php echo $tempel->jamdibuat; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $tempel->tanggal_setuju; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $tempel->jamsetuju; ?>
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
                                                <a href="<?php echo site_url('printpermintaan/'); ?><?php echo $tempel->faktur; ?>"
                                                    target="_blank" class="btn btn-sm btn-success">
                                                    Cetak PDF
                                                </a>
                                                <a href="<?php echo site_url('detailpermintaan/'); ?><?php echo $tempel->faktur; ?>"
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
                    <div class="tab-pane fade" id="disetujui2" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="table-responsive-xl">
                            <table class="table table-borderless small tbl">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Faktur</th>
                                        <th class="text-center">Direquest Oleh</th>
                                        <th class="text-center">Untuk Bagian</th>
                                        <th class="text-center">Dibuat Tanggal</th>
                                        <th class="text-center">Dibuat Jam</th>
                                        <th class="text-center">Disetujui Tanggal</th>
                                        <th class="text-center">Disetujui Jam</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kabagsetuju as $tempel) {
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
                                                <?php echo $tempel->jamdibuat; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $tempel->tanggal_setuju; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php echo $tempel->jamsetuju; ?>
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
                                                <a href="<?php echo site_url('printpermintaan/'); ?><?php echo $tempel->faktur; ?>"
                                                    target="_blank" class="btn btn-sm btn-success">
                                                    Cetak PDF
                                                </a>
                                                <a href="<?php echo site_url('detailpermintaan/'); ?><?php echo $tempel->faktur; ?>"
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
                    <div class="tab-pane fade" id="ditolak" role="tabpanel" aria-labelledby="nav-contact-tab">
                        <div class="table-responsive-xl">
                            <table class="table table-borderless small tbl">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Faktur</th>
                                        <th class="text-center">Direquest Oleh</th>
                                        <th class="text-center">Untuk Bagian</th>
                                        <th class="text-center">Dibuat Tanggal</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kabagtolak as $tempel) {
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
                                                <?php if ($tempel->status == 'Ditolak') { ?>
                                                    <h6>
                                                        <span class="badge badge-danger">
                                                            <?php echo $tempel->status; ?>
                                                        </span>
                                                    </h6>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo site_url('detailpermintaan/'); ?><?php echo $tempel->faktur; ?>"
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
                    <div class="tab-pane fade" id="diproses" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="table-responsive-xl">
                            <table class="table table-borderless small tbl">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Faktur</th>
                                        <th class="text-center">Direquest Oleh</th>
                                        <th class="text-center">Untuk Bagian</th>
                                        <th class="text-center">Dibuat Tanggal</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kabagproses as $tempel) {
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
                                                <?php if ($tempel->status == 'Diproses') { ?>
                                                    <h6>
                                                        <span class="badge badge-info">
                                                            <?php echo $tempel->status; ?>
                                                        </span>
                                                    </h6>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo site_url('printpermintaan/'); ?><?php echo $tempel->faktur; ?>"
                                                    target="_blank" class="btn btn-sm btn-success">
                                                    Cetak PDF
                                                </a>
                                                <a href="<?php echo site_url('detailpermintaan/'); ?><?php echo $tempel->faktur; ?>"
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
                    <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="table-responsive-xl">
                            <table class="table table-borderless small tbl">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Faktur</th>
                                        <th class="text-center">Direquest Oleh</th>
                                        <th class="text-center">Untuk Bagian</th>
                                        <th class="text-center">Dibuat Tanggal</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kabagselesai as $tempel) {
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
                                                <?php if ($tempel->status == 'Selesai') { ?>
                                                    <h6>
                                                        <span class="badge badge-success">
                                                            <?php echo $tempel->status; ?>
                                                        </span>
                                                    </h6>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo site_url('printpermintaan/'); ?><?php echo $tempel->faktur; ?>"
                                                    target="_blank" class="btn btn-sm btn-success">
                                                    Cetak PDF
                                                </a>
                                                <a href="<?php echo site_url('detailpermintaan/'); ?><?php echo $tempel->faktur; ?>"
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
            </div>
        </div>
    <?php } ?>
    <?php
    if ($this->session->userdata('role') == 'sdr_Admin Gudang' or $this->session->userdata('role') == 'sdr_Kepala Gudang') {
        ?>
        <?php if ($this->session->userdata('role') == 'sdr_Admin Gudang') { ?>
            <a href="#" class="btn btn-sm btn-info mb-3" data-toggle="modal" data-target="#modal-tambah-barang">
                Tambah Barang
            </a>
        <?php } ?>
        <div class="card shadow mb-3">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-success">
                    Semua Data Request Sundries
                </h6>
            </div>
            <div class="card-body">
                <nav>
                    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">

                        <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#disetujui2"
                            role="tab" aria-controls="nav-profile" aria-selected="false">
                            Disetujui Kepala Gudang
                        </a>

                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#diproses" role="tab"
                            aria-controls="nav-contact" aria-selected="false">
                            Diproses
                        </a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#selesai" role="tab"
                            aria-controls="nav-contact" aria-selected="false">
                            Selesai
                        </a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="disetujui2" role="tabpanel"
                        aria-labelledby="nav-profile-tab">
                        <div class="table-responsive-xl">
                            <table class="table table-borderless small tbl">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Faktur</th>
                                        <th class="text-center">Direquest Oleh</th>
                                        <th class="text-center">Untuk Bagian</th>
                                        <th class="text-center">Dibuat Tanggal</th>
                                        <th class="text-center">Dibuat Jam</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($bysetuju2 as $tempel) {
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
                                                <?php echo $tempel->jamdibuat; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($tempel->status == 'Disetujui2') { ?>
                                                    <h6>
                                                        <span class="badge badge-primary">
                                                            Disetujui Kelapa Gudang
                                                        </span>
                                                    </h6>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo site_url('detailpermintaan/'); ?><?php echo $tempel->faktur; ?>"
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
                    <div class="tab-pane fade" id="diproses" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="table-responsive-xl">
                            <table class="table table-borderless small tbl">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Faktur</th>
                                        <th class="text-center">Direquest Oleh</th>
                                        <th class="text-center">Untuk Bagian</th>
                                        <th class="text-center">Dibuat Tanggal</th>
                                        <th class="text-center">Dibuat Jam</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($byproses as $tempel) {
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
                                                <?php echo $tempel->jamdibuat; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($tempel->status == 'Diproses') { ?>
                                                    <h6>
                                                        <span class="badge badge-info">
                                                            <?php echo $tempel->status; ?>
                                                        </span>
                                                    </h6>
                                                <?php } ?>
                                            </td>
                                            <?php if ($this->session->userdata('role') == 'sdr_Admin Gudang') { ?>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-sm btn-success" data-toggle="modal"
                                                        data-target="#modal-selesai<?php echo $tempel->id_request_sundries; ?>">
                                                        Selesaikan Request
                                                    </a>
                                                </td>
                                            <?php } ?>
                                            <?php if ($this->session->userdata('role') == 'sdr_Kepala Gudang' or $this->session->userdata('role') == 'sdr_Admin Gudang') { ?>
                                                <td class="text-center">
                                                    <a href="<?php echo site_url('detailpermintaan/'); ?><?php echo $tempel->faktur; ?>"
                                                        class="btn btn-sm btn-purple">
                                                        Detail
                                                    </a>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                        <?php
                                        $no++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="selesai" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="table-responsive-xl">
                            <table class="table table-borderless small tbl">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Faktur</th>
                                        <th class="text-center">Direquest Oleh</th>
                                        <th class="text-center">Untuk Bagian</th>
                                        <th class="text-center">Dibuat Tanggal</th>
                                        <th class="text-center">Dibuat Jam</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($byselesai as $tempel) {
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
                                                <?php echo $tempel->jamdibuat; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($tempel->status == 'Selesai') { ?>
                                                    <h6>
                                                        <span class="badge badge-success">
                                                            <?php echo $tempel->status; ?>
                                                        </span>
                                                    </h6>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?php echo site_url('detailpermintaan/'); ?><?php echo $tempel->faktur; ?>"
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
                        Lanjutkan
                    </a>
                </div>
            </div>
        </div>
    </div>

    <?php foreach ($byproses as $tempel) { ?>
        <div class="modal fade" id="modal-selesai<?php echo $tempel->id_request_sundries; ?>" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Yakin Mau Menyelesaikan Request Sundries Ini ?</h5>
                        <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">Tutup</span>
                        </button>
                    </div>
                    <form action="<?php echo site_url('permintaanselesai'); ?>" method="POST">
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>Faktur</label>
                                    <input type="text" class="form-control" name="faktur" required
                                        value="<?php echo $tempel->faktur; ?>" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Dibuat Oleh</label>
                                    <input type="text" class="form-control" name="nama" required
                                        value="<?php echo $tempel->nama_peminta; ?>" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label>Untuk Bagian</label>
                                    <input type="text" class="form-control" name="bagian" required
                                        value="<?php echo $tempel->nama_section; ?>" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Dibuat Tanggal</label>
                                    <input type="text" class="form-control" name="tanggal" required
                                        value="<?php echo $tempel->tanggal; ?>" readonly>
                                    <input type="text" class="form-control" name="status" required value="Selesai" hidden>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-sm btn-danger" type="button" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success btn-sm">Selesaikan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

<script>
    $(document).ready(function () {
        $('.tbl').DataTable();
    });

    function loaddatabarang() {
        var id_user = $('#id_user').val();
        $.ajax({
            type: 'POST',
            url: "<?php echo site_url('showkeranjangpermintaan'); ?>",
            data: {
                id_user: id_user
            },
            cache: false,
            success: function (respond) {
                $('#isikeranjang').html(respond);
            }
        });
    }

    $("#keranjang").click(function () {
        var id_barang = $('#id_barang').val();
        var qty = $('#jumlah').val();
        var catatan = $('#catatan').val();
        var id_user = $('#id_user').val();

        if (id_barang == 0) {
            Swal.fire("Barang Belum Dipilih... !", "Pilih Barang...", "warning");
        } else if (qty == "" || qty == 0) {
            Swal.fire("Jumlah Barang Kosong...", "Isi Jumlah...", "warning");
            // }else if(catatan ==""){
            //   Swal.fire("Yakin Nggak Ada Catatan Khusus ?", "Isikan '-' Aja Kalo Begitu...", "warning");
        } else {
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('cekkeranjangpermintaan'); ?>",
                data: {
                    id_barang: id_barang,
                    qty: qty,
                    id_user: id_user,
                    catatan: catatan
                },
                cache: false,
                success: function (respond) {
                    loaddatabarang();
                }
            });
        }
    });

    function deleteConfirm(url) {
        $('#tombolhapus').attr('href', url);
        $('#modal-hapus').modal();
    }

    $(document).ready(function () {
        $('.yoi').select2({
            theme: 'bootstrap4',
        });
    });

    $(document).ready(function () {
        $('#id_barang').change(function () {
            var id_barang = $(this).val();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('detailbarang'); ?>",
                data: 'id_barang=' + id_barang,
                dataType: 'JSON',
                success: function (data) {
                    $("#brand").val(data.brand);
                    $("#type").val(data.type);
                    $("#ukuran").val(data.ukuran);
                    $("#satuan").val(data.satuan);
                }
            });
        });
    });
</script>

<script>
    function getBarangDetails() {
        var selectedBarangId = document.getElementById("id_barang").value;

        // Buat request AJAX ke controller untuk mendapatkan informasi barang berdasarkan ID
        $.ajax({
            url: "<?php echo site_url('detailbarang'); ?>",
            method: "POST",
            data: {
                id_barang: selectedBarangId
            },
            success: function (response) {
                // Isi nilai field dengan informasi barang yang diterima dari controller
                document.getElementById("brand").value = response.brand;
                document.getElementById("type").value = response.type;
                document.getElementById("ukuran").value = response.ukuran;
                document.getElementById("satuan").value = response.satuan;
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
</script>