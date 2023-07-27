                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Karyawan Keluar</h1>
                        
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

                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id='dataTable' width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="table-info">
                                            <th>No</th>
                                            <th>Nama Karyawan</th>
                                            <th>NIK</th>
                                            <th>Divisi</th>
                                            <th>Departemen</th>
                                            <th>Section</th>
                                            <th>Shift</th>
                                            <th>Golongan</th>
                                            <th>Jabatan</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Gender</th>
                                            <th>Pendidikan</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="table-info">
                                            <th>No</th>
                                            <th>Nama Karyawan</th>
                                            <th>NIK</th>
                                            <th>Divisi</th>
                                            <th>Departemen</th>
                                            <th>Section</th>
                                            <th>Shift</th>
                                            <th>Golongan</th>
                                            <th>Jabatan</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Gender</th>
                                            <th>Pendidikan</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php 
                                        $i=1;
                                        foreach($karyawan_out as $u){ ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $u->nama ?></td>
                                                <td><?php echo $u->nik ?></td>
                                                <td><?php echo $u->nama_divisi ?></td>
                                                <td><?php echo $u->nama_dep ?></td>
                                                <td><?php echo $u->nama_section ?></td>
                                                <td><?php echo $u->nama_shift ?></td>
                                                <td><?php echo $u->nama_golongan ?></td>
                                                <td><?php echo $u->nama_jabatan ?></td>
                                                <td><?php echo date('d M y', strtotime($u->tgl_masuk)) ?></td>
                                                <td><?php echo date('d M y', strtotime($u->tgl_lahir)) ?></td>
                                                <td><?php echo $u->gender ?></td>
                                                <td><?php echo $u->pendidikan ?></td>
                                                <td><?php echo $u->keterangan ?></td>
                                            </tr>

                                            


                                        <?php $i++; } ?>
                                        
                                    </tbody>
                                </table>
                                
                                <!-- Paginate -->
                                <div style='margin-top: 10px;' id='pagination'></div>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->


                




            