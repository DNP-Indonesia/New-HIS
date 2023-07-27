                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Karyawan Training & Percobaan Keluar</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" data-toggle="modal" data-target="#ModalTbhKar">
                            <span class="icon text-white-50">
                                <i class="fas fa-plus-circle"></i>
                            </span>
                            <span class="text">Tambah Karyawan Training / Percobaan</span>
                        </a> -->
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
                                            <!-- <th>Tanggal Pensiun</th> -->
                                            <th>Tanggal Lahir</th>
                                            <th>Gender</th>
                                            <th>Pendidikan</th>
                                            
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
                                            <!-- <th>Tanggal Pensiun</th> -->
                                            <th>Tanggal Lahir</th>
                                            <th>Gender</th>
                                            <th>Pendidikan</th>
                                            
                                        </tr>
                                    </tfoot>
                                    <tbody>

                                        <?php 
                                        $i=1;
                                        foreach($karyawan as $u){
                                            $thn_lahir       = substr($u->tgl_lahir, 0, 4);
                                            $bln_lahir       = substr($u->tgl_lahir, 5, 2);
                                            $t_lahir         = substr($u->tgl_lahir, 8, 2);

                                            $thn_pensiun = $thn_lahir+55;

                                            $tgl_pensiun = $thn_pensiun."-".$bln_lahir."-".$t_lahir;
                                        ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $u->nama ?></td>
                                                <td><?php echo $u->nik_temp ?></td>
                                                <td><?php echo $u->nama_divisi ?></td>
                                                <td><?php echo $u->nama_dep ?></td>
                                                <td><?php echo $u->nama_section ?></td>
                                                <td><?php echo $u->nama_shift ?></td>
                                                <td><?php echo $u->nama_golongan ?></td>
                                                <td><?php echo $u->nama_jabatan ?></td>
                                                <td><?php echo $u->tgl_masuk ?></td>
                                                <!-- <td><?php echo $tgl_pensiun ?></td> -->
                                                <td><?php echo $u->tgl_lahir ?></td>
                                                <td><?php echo $u->gender ?></td>
                                                <td><?php echo $u->pendidikan ?></td>
                                                
                                            </tr>

                                            <!-- KeLUARKAN Modal-->
                                            <div class="modal fade" id="ModalOut<?php echo $u->nik ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title" id="exampleModalLabel">Ubah Status Karyawan <?php echo $u->nama ?></h3>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <form action="<?php echo site_url(). 'action_his/do_out_karyawan'; ?>" method="post">
                                                            <input type="text" name="nik" value="<?= $u->nik ?>" hidden>

                                                            <div class="modal-body">
                                                                <div class="form-row">
                                                                    <div class="col-md-12 mb-3">
                                                                        <label for="exampleInputEmail1"><b>Pilih Alasan Perubahan</b></label>
                                                                        <select class="form-control" id="exampleFormControlSelect1" name="keterangan" required>
                                                                                <option value="" selected disabled> -- Pilih Alasan -- </option>
                                                                                <option value="Aktif">Aktif (Menjadi Karyawan Tetap)</option>
                                                                                <option value="Pasca Training">Pasca Training</option>
                                                                                <option value="Pasca Percobaan">Pasca Percobaan</option>
                                                                        </select>
                                                                        <small id="emailHelp" class="form-text text-muted">Pilih alasan perubahan disini</small>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            


                                            
                                        


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

