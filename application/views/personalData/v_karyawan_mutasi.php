                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Karyawan Mutasi</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" data-toggle="modal" data-target="#ModalTbhKar">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus-circle"></i>
                            </span>
                            <span class="text">Mutasi Karyawan</span>
                        </a>
                    </div>
                    <?php
                    if ($this->session->has_userdata('success')) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?=
                            $this->session->flashdata('success');
                            $this->session->set_flashdata('success', NULL);
                            ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>

                    <?php
                    if ($this->session->has_userdata('error')) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?=
                            $this->session->flashdata('error');
                            $this->session->set_flashdata('error', NULL);
                            ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php } ?>


    <h2>Log Mutasi Karyawan</h2>
    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id='dataTable' width="100%" cellspacing="0">

                                    <tr>
                                        <th>SPYSIID</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Section Sebelum</th>
                                        <th>Section Sesudah</th>
                                        <th>Golongan Sebelum</th>
                                        <th>Golongan Sesudah</th>
                                        <th>Jabatan Sebelum</th>
                                        <th>Jabatan Sesudah</th>
                                        <th>Shift Sebelum</th>
                                        <th>Shift Sesudah</th>
                                        <th>Waktu Mutasi</th>
                                        <!-- Tambahkan kolom-kolom lain yang diperlukan -->
                                    </tr>
                                    <?php foreach ($karyawan as $log) { ?>
                                        <tr>
                                            <td><?php echo $log->spysiid; ?></td>
                                            <td><?php echo $log->nik; ?></td>
                                            <td><?php echo $log->nama_karyawan; ?></td>
                                            <td><?php echo $log->nama_section_sebelum; ?></td>
                                            <td><?php echo $log->nama_section_sesudah; ?></td>
                                            <td><?php echo $log->nama_golongan_sebelum; ?></td>
                                            <td><?php echo $log->nama_golongan_sesudah; ?></td>
                                            <td><?php echo $log->nama_jabatan_sebelum; ?></td>
                                            <td><?php echo $log->nama_jabatan_sesudah; ?></td>
                                            <td><?php echo $log->nama_shift_sebelum; ?></td>
                                            <td><?php echo $log->nama_shift_sesudah; ?></td>
                                            <td><?php echo $log->tgl_mutasi; ?></td>
                                            <!-- Tambahkan kolom-kolom lain yang diperlukan -->
                                        </tr>
                                    <?php } ?>
                                </table>
                                <div style='margin-top: 10px;' id='pagination'></div>
                            </div>
                        </div>
                    </div>
