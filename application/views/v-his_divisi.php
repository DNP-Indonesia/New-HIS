
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Daftar Divisi</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" data-toggle="modal" data-target="#ModalTbhDiv">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Divisi Baru
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
                                            <th>Nama Divisi</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="table-primary">
                                            <th>No</th>
                                            <th>Nama Divisi</th>
                                            <th>Action Button</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                    $i=1;
                                    foreach($div as $u){ ?>
                                        <tr>
                                            <td style="width:5%;"><?php echo $i ?></td>
                                            <td><?php echo $u->nama_divisi ?></td>                                          
                                            <td style="width:15%;">
                                                <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#edit<?php echo $u->id_divisi ?>">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                    <span class="text">Edit</span>
                                                </a>

                                                <a href="#" class="btn btn-success btn-icon-split btn-sm" data-toggle="modal" data-target="#view<?php echo $u->id_divisi ?>">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-eye"></i>
                                                    </span>
                                                    <span class="text">Departemen</span>
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

<!-- TAMBAH DIVISI Modal-->
<div class="modal fade" id="ModalTbhDiv" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Tambah Divisi Baru</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?php echo site_url(). '/action_his/do_tbh_divisi'; ?>" method="post">
                <div class="modal-body">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="exampleInputEmail1"><b>Nama Divisi</b></label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="nama_divisi" required>
                                <small id="emailHelp" class="form-text text-muted">Input nama divisi disini</small>
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


<?php foreach($div as $u){ ?>

<!-- EDIT DIVISI Modal-->
<div class="modal fade" id="edit<?php echo $u->id_divisi?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Edit Divisi <?php echo $u->nama_divisi?></h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?php echo site_url().'action_his/do_edit_divisi'?>" method="post">
                <input type="text" name="id_divisi" value="<?= $u->id_divisi ?>" hidden>

                <div class="modal-body">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="exampleInputEmail1"><b>Nama Divisi</b></label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="nama_divisi" value="<?php echo $u->nama_divisi;?>" required>
                                <small id="emailHelp" class="form-text text-muted">Input nama divisi disini</small>
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
<div class="modal fade" id="view<?php echo $u->id_divisi?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Departemen Pada Divisi <br><strong><?php echo $u->nama_divisi?></strong></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="alert alert-primary" role="alert">
                    <h5> Tambah Departemen Pada Divisi <strong><?php echo $u->nama_divisi?></strong></h5><hr>

                    <form action="<?php echo site_url().'action_his/do_tbh_departemen'?>" method="post">
                        <input type="text" name="id_divisi" value="<?= $u->id_divisi ?>" hidden>
                    
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <!-- <label for="exampleInputEmail1"><b>Nama Departemen</b></label> -->
                                <input type="text" class="form-control" id="exampleInputEmail1" name="nama_departemen" value="" required>
                                <small id="emailHelp" class="form-text text-muted">Input nama departemen disini</small>
                            </div>
                            
                        </div>

                        <button type="submit" class="btn btn-primary">Tambah Departemen</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                    </form>
                    
                    
                </div>
                <hr>
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <ul class="list-group">
                            <?php 
                            $dep    = $this->M_his->data_departemen_byId_div($u->id_divisi);
                            foreach($dep as $o){ ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?php echo $o->nama_dep?>

                                    <div class="btn-group dropleft">
                                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Section
                                      </button>
                                        <div class="dropdown-menu bg-gradient-dark" aria-labelledby="dropdownMenuButton">
                                            <?php 
                                            $section    = $this->M_his->data_section_byId_dep($o->id_dep);
                                            foreach($section as $i){ ?>
                                                <p class="dropdown-header">
                                                    <strong class="text-gray-100"><?php echo $i->nama_section?> </strong>
                                                </p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
</div>

<?php } ?>                