<!-- Start Main Content -->
<div id="content">

    <!-- Start Page Content -->
    <div class="container-fluid">

        <!-- Start DataTables Example -->
        <?php if ($this->session->userdata('role') == 'sdr_Kepala Bagian') { ?>
        <h4>Dashboard</h4>
        <h6 class="mb-3">
            <?php echo 'Halo, Selamat Datang <b>' . $this->session->userdata('nama') . '</b>, Tetap Semangat dan Jangan Pernah Menyerah';
            ?>
        </h6>
        <?php if ($this->session->userdata('setuju')) { ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <?php echo $this->session->userdata('setuju'); ?>
            <?php echo $this->session->set_userdata('setuju', null); ?>
        </div>
        <?php } ?>
        <?php if ($this->session->userdata('tolak')) { ?>
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <?php echo $this->session->userdata('tolak'); ?>
            <?php echo $this->session->set_userdata('tolak', null); ?>
        </div>
        <?php } ?>

        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                    aria-controls="nav-home" aria-selected="true">
                    Request
                </a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab"
                    aria-controls="nav-profile" aria-selected="false"> Estimation
                </a>
                <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab"
                    aria-controls="nav-contact" aria-selected="false"> Consumption
                </a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="font-weight-bold text-success">
                            Menunggu Persetujuan
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless small" width="100%" cellspacing="0">
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
                                                    foreach ($forapprove as $tempel) {
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
                </div>
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="font-weight-bold text-success">
                            Menunggu Persetujuan
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless small" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Faktur</th>
                                        <th class="text-center">Dibuat Oleh</th>
                                        <th class="text-center">Untuk Bagian</th>
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
                                            <a href="<?php echo site_url('detailestimasi/'); ?><?php echo $tempel->faktur; ?>" target="blank"
                                                class="btn btn-sm btn-purple">
                                                Detail
                                            </a>

                                            <a href="#" class="btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#modal-estimasi-setujui<?php echo $tempel->faktur; ?>">
                                                Setujui
                                            </a>

                                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#modal-estimasi-tolak<?php echo $tempel->faktur; ?>">
                                                Tolak
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
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="font-weight-bold text-success">
                            Menunggu Persetujuan
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-borderless small" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Faktur</th>
                                        <th class="text-center">Dibuat Oleh</th>
                                        <th class="text-center">Untuk Bagian</th>
                                        <th class="text-center">Dibuat Tanggal</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                                    $no = 1;
                                                    foreach ($konsumsi as $tempel) {
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
                                            <a href="<?php echo site_url('detailkonsumsi/'); ?><?php echo $tempel->faktur; ?>" target="blank"
                                                class="btn btn-sm btn-purple">
                                                Detail
                                            </a>

                                            <a href="#" class="btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#modal-consumption-setujui<?php echo $tempel->faktur; ?>">
                                                Setujui
                                            </a>

                                            <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                                                data-target="#modal-consumption-tolak<?php echo $tempel->faktur; ?>">
                                                Tolak
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

        <?php if ($this->session->userdata('role') == 'sdr_Admin Bagian') { ?>
        <h4>Dashboard</h4>
        <h6 class="mb-3">
            <?php echo 'Halo, Selamat Datang <b>' . $this->session->userdata('nama') . '</b>, Tetap Semangat dan Jangan Pernah Menyerah';
            ?>
        </h6>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-success">
                    Permintaan Anda Saat Ini
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless small" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Faktur</th>
                                <th class="text-center">Direquest Oleh</th>
                                <th class="text-center">Untuk Bagian</th>
                                <th class="text-center">Dibuat Tanggal</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                            $no = 1;
                                            foreach ($diproses as $tempel) {
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
                                    <a href="<?php echo site_url('detailpermintaan/'); ?><?php echo $tempel->faktur; ?>" class="btn btn-sm btn-purple">
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
        <?php } ?>

        <?php if ($this->session->userdata('role') == 'sdr_Admin Gudang') { ?>
        <h4>Dashboard</h4>
        <h6 class="mb-3">
            <?php echo 'Halo, Selamat Datang <b>' . $this->session->userdata('nama') . '</b>, Tetap Semangat dan Jangan Pernah Menyerah';
            ?>
        </h6>
        <?php if ($this->session->userdata('reqproses')) { ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <?php echo $this->session->userdata('reqproses'); ?>
            <?php echo $this->session->set_userdata('reqproses', null); ?>
        </div>
        <?php } ?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-success">
                    Permintaan Sundries Saat Ini
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless small" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Faktur</th>
                                <th class="text-center">Direquest Oleh</th>
                                <th class="text-center">Untuk Bagian</th>
                                <th class="text-center">Dibuat Tanggal</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                            $no = 1;
                                            foreach ($admingudang as $tempel) {
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
                                    <?php if ($tempel->status == 'Disetujui2') { ?>
                                    <h6>
                                        <span class="badge badge-primary">
                                            Disetujui Kepala Gudang
                                        </span>
                                    </h6>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo site_url('detailpermintaan/'); ?><?php echo $tempel->faktur; ?>" class="btn btn-sm btn-purple">
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
        <?php } ?>

        <?php if ($this->session->userdata('role') == 'sdr_Kepala Gudang') { ?>
        <h4>Dashboard</h4>
        <h6 class="mb-3">
            <?php echo 'Halo, Selamat Datang <b>' . $this->session->userdata('nama') . '</b>, Tetap Semangat dan Jangan Pernah Menyerah';
            ?>
        </h6>
        <?php if ($this->session->userdata('setuju')) { ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <?php echo $this->session->userdata('setuju'); ?>
            <?php echo $this->session->set_userdata('setuju', null); ?>
        </div>
        <?php } ?>
        <?php if ($this->session->userdata('tolak')) { ?>
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <?php echo $this->session->userdata('tolak'); ?>
            <?php echo $this->session->set_userdata('tolak', null); ?>
        </div>
        <?php } ?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="font-weight-bold text-success">
                    Menunggu Persetujuan
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless small" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Faktur</th>
                                <th class="text-center">Direquest Oleh</th>
                                <th class="text-center">Untuk Bagian</th>
                                <th class="text-center">Dibuat Tanggal</th>
                                <th class="text-center">Dibuat Jam</th>
                                <th class="text-center">Disetujui Kepala Bagian Tanggal</th>
                                <th class="text-center">Disetujui Kepala Bagian Jam</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                            $no = 1;
                                            foreach ($kepalagudang as $approve2) {
                                                ?>
                            <tr>
                                <td class="text-center">
                                    <?php echo $no; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $approve2->faktur; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $approve2->nama_peminta; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $approve2->nama_section; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $approve2->tanggal; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $approve2->jamdibuat; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $approve2->tanggal_setuju1; ?>
                                </td>
                                <td class="text-center">
                                    <?php echo $approve2->jamsetuju1; ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($approve2->status == 'Disetujui1') { ?>
                                    <h6>
                                        <span class="badge badge-primary">
                                            Disetujui Kepala Bagian
                                        </span>
                                    </h6>
                                    <?php } ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo site_url('detailpermintaan/'); ?><?php echo $approve2->faktur; ?>"
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
        <?php } ?>
        <!-- End DataTables Example -->

    </div>
    <!-- End Page Content -->

</div>
<!-- End Main Content -->
