
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Daftar Section</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" data-toggle="modal" data-target="#ModalTbhsection">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Section Baru
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
                                            <th>Nama Section</th>
                                            <th>Nama Departemen</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="table-primary">
                                            <th>No</th>
                                            <th>Nama Section</th>
                                            <th>Nama Departemen</th>
                                            <th>Action Button</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                    $i=1;
                                    foreach($section as $u){ ?>
                                        <tr>
                                            <td style="width:5%;"><?php echo $i ?></td>
                                            <td style="width:30%;"><?php echo $u->nama_section ?></td>
                                            <td><?php echo $u->nama_dep ?></td>                                          
                                            <td style="width:10%;">
                                                <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#edit<?php echo $u->id_section ?>">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                    <span class="text">Edit</span>
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
<div class="modal fade" id="ModalTbhsection" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Tambah Section Baru</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?php echo site_url(). 'action_his/do_tbh_section'; ?>" method="post">
                <div class="modal-body">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="exampleInputEmail1"><b>Pilih Departemen</b></label>
                                <select class="form-control" id="exampleFormControlSelect1" name="id_dep" required>
                                        <option value="" selected disabled> -- Pilih Departemen -- </option>
                                    <?php
                                    $dep = $this->M_his->data_dep();
                                    foreach($dep as $d){ ?>
                                    ?>
                                        <option value="<?php echo $d->id_dep?>"><?php echo $d->nama_dep?></option>

                                    <?php } ?>
                                
                                </select>
                                <small id="emailHelp" class="form-text text-muted">Pilih nama departemen disini</small>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="exampleInputEmail1"><b>Nama Section</b></label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="nama_section" required>
                                <small id="emailHelp" class="form-text text-muted">Input nama Section disini</small>
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


<?php foreach($section as $u){ ?>

<!-- EDIT USER Modal-->
<div class="modal fade" id="edit<?php echo $u->id_section?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-l" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Edit Section <?php echo $u->nama_section?></h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?php echo site_url().'action_his/do_edit_section'?>" method="post">
                <input type="text" name="id_section" value="<?= $u->id_section ?>" hidden>

                <div class="modal-body">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="exampleInputEmail1"><b>Pilih Departemen</b></label>
                                <select class="form-control" id="exampleFormControlSelect1" name="id_dep" required>
                                        <option value="" selected disabled> -- Pilih Departemen -- </option>
                                    <?php
                                    $dep = $this->M_his->data_dep();
                                    foreach($dep as $d){ ?>
                                    ?>
                                        <option value="<?php echo $d->id_dep?>" <?php if($d->id_dep==$u->id_dep) {echo "selected"; } ?>><?php echo $d->nama_dep?></option>

                                    <?php } ?>
                                
                                </select>
                                <small id="emailHelp" class="form-text text-muted">Pilih nama departemen disini</small>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="exampleInputEmail1"><b>Nama Section</b></label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="nama_section" value="<?php echo $u->nama_section;?>" required>
                                <small id="emailHelp" class="form-text text-muted">Input nama Section disini</small>
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

<!-- HAPUS Modal-->
<div class="modal fade" id="hapus<?php echo $u->id_section?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus data <br><strong><?php echo $u->nama_section?>?</strong></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih tombol HAPUS dibawah untuk menghapus.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="<?= site_url() ?>action/hapus_byid/section/id_section/<?= $u->id_section; ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>

<?php } ?>                