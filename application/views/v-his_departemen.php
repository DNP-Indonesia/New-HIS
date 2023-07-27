
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Daftar Departemen</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" data-toggle="modal" data-target="#ModalTbhDept">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Departemen Baru
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
                    

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <!-- <div class="card-header py-3 pull-right">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data User Aplikasi</h6> 
                        </div> -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="table-primary">
                                            <th>No</th>
                                            <th>Nama Departemen</th>
                                            <th>Nama Divisi</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="table-primary">
                                            <th>No</th>
                                            <th>Nama Departemen</th>
                                            <th>Nama Divisi</th>
                                            <th>Action Button</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                    $i=1;
                                    foreach($dep as $u){ ?>
                                        <tr>
                                            <td style="width:5%;"><?php echo $i ?></td>
                                            <td style="width:30%;"><?php echo $u->nama_dep ?></td>
                                            <td><?php echo $u->nama_divisi ?></td>                                          
                                            <td style="width:15%;">
                                                <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#edit<?php echo $u->id_dep ?>">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                    <span class="text">Edit</span>
                                                </a>

                                                <a href="#" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#view<?php echo $u->id_dep ?>">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-eye"></i>
                                                    </span>
                                                    <span class="text">Section</span>
                                                </a>

                                            </td>
                                        </tr>
                                    <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->




<!-- MOOOOODAAAAAL-->

<!-- TAMBAH USER Modal-->
<div class="modal fade" id="ModalTbhDept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Tambah Departemen Baru</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?php echo site_url(). 'action_his/do_tbh_departemen'; ?>" method="post">
                <div class="modal-body">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="exampleInputEmail1"><b>Pilih Divisi</b></label>
                                <select class="form-control" id="exampleFormControlSelect1" name="id_divisi" required>
                                        <option value="" selected disabled> -- Pilih Diivisi -- </option>
                                    <?php
                                    $div = $this->M_his->data_divisi();
                                    foreach($div as $d){ ?>
                                    ?>
                                        <option value="<?php echo $d->id_divisi?>"><?php echo $d->nama_divisi?></option>

                                    <?php } ?>
                                
                                </select>
                                <small id="emailHelp" class="form-text text-muted">Pilih nama divisi disini</small>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="exampleInputEmail1"><b>Nama Departemen</b></label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="nama_departemen" required>
                                <small id="emailHelp" class="form-text text-muted">Input nama departemen disini</small>
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


<?php foreach($dep as $u){ ?>

<!-- EDIT USER Modal-->
<div class="modal fade" id="edit<?php echo $u->id_dep?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-l" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Edit Departemen <?php echo $u->nama_dep?></h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?php echo site_url().'action_his/do_edit_departemen'?>" method="post">
                <input type="text" name="id_dep" value="<?= $u->id_dep ?>" hidden>

                <div class="modal-body">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="exampleInputEmail1"><b>Pilih Divisi</b></label>
                                <select class="form-control" id="exampleFormControlSelect1" name="id_divisi" required>
                                        <option value="" selected disabled> -- Pilih Diivisi -- </option>
                                    <?php
                                    $div = $this->M_his->data_divisi();
                                    foreach($div as $d){ ?>
                                    ?>
                                        <option value="<?php echo $d->id_divisi?>" <?php if($d->id_divisi==$u->id_divisi) {echo "selected"; } ?>><?php echo $d->nama_divisi?></option>

                                    <?php } ?>
                                
                                </select>
                                <small id="emailHelp" class="form-text text-muted">Pilih nama divisi disini</small>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="exampleInputEmail1"><b>Nama Departemen</b></label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="nama_dep" value="<?php echo $u->nama_dep;?>" required>
                                <small id="emailHelp" class="form-text text-muted">Input nama departemen disini</small>
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

<!-- VIEW Modal-->
<div class="modal fade" id="view<?php echo $u->id_dep?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Section Pada Departemen <br><strong><?php echo $u->nama_dep?></strong></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="alert alert-primary" role="alert">
                    <h5> Tambah Section Pada Departemen <strong><?php echo $u->nama_dep?></strong></h5><hr>

                    <form action="<?php echo site_url().'action_his/do_tbh_section'?>" method="post">
                        <input type="text" name="id_dep" value="<?= $u->id_dep ?>" hidden>
                    
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <!-- <label for="exampleInputEmail1"><b>Nama Departemen</b></label> -->
                                <input type="text" class="form-control" id="exampleInputEmail1" name="nama_section" value="" required>
                                <small id="emailHelp" class="form-text text-muted">Input nama section disini</small>
                            </div>
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Section</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                    </form>
                </div>

                <hr>

                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <ul class="list-group">
                            <?php 
                            $section    = $this->M_his->data_section_byId_dep($u->id_dep);
                            foreach($section as $o){ ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?php echo $o->nama_section?>
                                    <!-- <span class="badge badge-primary badge-pill">14</span> -->
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    
                </div>

            </div>
            <!-- <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="<?= site_url() ?>action/hapus_byid/dep/id_dep/<?= $u->id_dep; ?>">Hapus</a>
            </div> -->
        </div>
    </div>
</div>

<?php } ?>                