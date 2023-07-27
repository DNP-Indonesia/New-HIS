                <div class="container-fluid">

                    <!-- Page Heading -->
                    
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data User</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm" data-toggle="modal" data-target="#ModalTbhUser"><i
                                class="fas fa-plus fa-sm text-white-50"></i> Tambah User Baru</a>
                    </div>

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
                                            <th style="width:5%;">No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                            <th>Section</th>
                                            <th>Action Button</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr class="table-primary">
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Role</th>
                                            <th>Section</th>
                                            <th>Action Button</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php 
                                    $i=1;
                                    foreach($user as $u){ ?>
                                        <tr>
                                            <td><?php echo $i ?></td>
                                            <td><?php echo $u->nama ?></td>
                                            <td><?php echo $u->username ?></td>
                                            <td><?php echo $u->password ?></td>
                                            <td><?php echo $u->role ?></td>
                                            <td><?php echo $u->nama_section ?></td>
                                            <td>
                                                <a href="#" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#edit<?php echo $u->id_user ?>">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-edit"></i>
                                                    </span>
                                                    <span class="text">Edit</span>
                                                </a>

                                                <!-- <a href="#" class="btn btn-danger btn-icon-split btn-sm" data-toggle="modal" data-target="#hapus<?php echo $u->id_user ?>">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-trash"></i>
                                                    </span>
                                                    <span class="text">Hapus</span>
                                                </a> -->


                                            <!-- <a href="#" class="btn btn-warning btn-circle btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-circle btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </a> -->
                                            </td>
                                        </tr>
                                    <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>



<!-- MOOOOODAAAAAL-->

<!-- TAMBAH USER Modal-->
<div class="modal fade" id="ModalTbhUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Tambah User Baru</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= site_url(). '/action_his/do_tbh_user'; ?>" method="post">
                <div class="modal-body">
                        <div class="form-row">
                            
                            <div class="col-md-12 mb-3">
                                <label for="exampleInputEmail1"><b>Pilih karyawan</b></label>
                                <select class='form-control' id='exampleFormControlSelect1' name='spysiid' required>
                                    <option value='' selected disabled> -- Pilih Karyawan -- </option>

                                    <?php 
                                    $karyawan = $this->M_his->data_karyawan();
                                    foreach ($karyawan as $kar){
                                    ?>

                                    <option value='<?= $kar->spysiid; ?>'> <?= $kar->spysiid.' - '.$kar->nama.' ['.$kar->nik.']'; ?> </option>
                                    
                                    <?php } ?>

                                </select>
                                <small id="emailHelp" class="form-text text-muted">Pilih karyawan pemegang user</small>
                            </div>

                        

                            <div class="col-md-12 mb-3">
                                <label for="exampleInputEmail1"><b>Username</b></label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="username" required>
                                <small id="emailHelp" class="form-text text-muted">Input Username disini</small>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="exampleInputEmail1"><b>Password</b></label>
                                <input type="password" class="form-control" id="exampleInputEmail1" name="password" required>
                                <small id="emailHelp" class="form-text text-muted">Input Password disini</small>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="exampleInputEmail1"><b>Role User</b></label>
                                <select class='form-control' id='exampleFormControlSelect1' name='role' required>
                                    <option value='' selected disabled> -- Pilih Role -- </option>
                                    <option value='ybs'> Admin </option>
                                    <option value='medical_1'> Medical 1 </option>
                                    <option value='medical_2'> Medical 2 </option>
                                    <option value='sdr_Admin Bagian'> Admin Bagian </option>
                                    <option value='sdr_Kepala Bagian'> Kepala Bagian </option>
                                    <option value='sdr_Admin Gudang'> Admin Gudang </option>
                                    <option value='sdr_Kepala Gudang'> Kepala Gudang </option>
                                </select>
                                <small id="emailHelp" class="form-text text-muted">Pilih Role user</small>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php foreach($user as $u){ ?>

<!-- EDIT USER Modal-->
<div class="modal fade" id="edit<?= $u->id_user?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Edit User <?= $u->nama?></h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?= site_url(). '/action_his/do_edit_user'; ?>" method="post">
                <input type="text" name="id_user" value="<?= $u->id_user ?>" hidden>

                <div class="modal-body">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="exampleInputEmail1"><b>Pilih karyawan <?= $u->role ?></b></label>
                                <select class='form-control' id='exampleFormControlSelect1' name='spysiid' required>
                                    <option value='' selected disabled> -- Pilih Karyawan -- </option>

                                    <?php 
                                    $karyawan = $this->M_his->data_karyawan();
                                    foreach ($karyawan as $kar){
                                        if ($kar->spysiid == $u->spysiid){$sel = 'selected';} else {$sel = '';}
                                    ?>

                                    <option value='<?= $kar->spysiid; ?>' <?= $sel; ?>> <?= $kar->spysiid.' - '.$kar->nama.' ['.$kar->nik.']'; ?> </option>
                                    
                                    <?php } ?>

                                </select>
                                <small id="emailHelp" class="form-text text-muted">Pilih karyawan pemegang user</small>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="exampleInputEmail1"><b>Username</b></label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="username" value="<?= $u->username ?>" required>
                                <small id="emailHelp" class="form-text text-muted">Input Username disini</small>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="exampleInputEmail1"><b>Password</b></label>
                                <input type="password" class="form-control" id="exampleInputEmail1" name="password" value="<?= $u->password ?>" required>
                                <small id="emailHelp" class="form-text text-muted">Input Password disini</small>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label for="exampleInputEmail1"><b>Role User</b></label>
                                <select class='form-control' id='exampleFormControlSelect1' name='role' required>
                                    <option value='' disabled> -- Pilih Role -- </option>

                                    <?php 
                                    $role = $this->M_his->data_role_fromUser();
                                    foreach ($role as $rol){
                                        if ($rol->role == $u->role) {$sele = "selected"; } else {$sele = '';}
                                    ?>

                                    <option value='<?= $rol->role ?>' <?= $sele; ?>> <?= $rol->role ?> </option>

                                    <?php  } ?>

                                    <!-- <option value='admin_medical' <?php if ($u->role == "admin_medical") {echo "selected";} ?>> Admin Medical</option>
                                    <option value='medical_1' <?php if ($u->role == "medical_1") {echo "selected";} ?>> Medical 1 </option>
                                    <option value='medical_2' <?php if ($u->role == "medical_2") {echo "selected";} ?>> Medical 2 </option> -->
                                </select>
                                <small id="emailHelp" class="form-text text-muted">Pilih Role user</small>
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
<div class="modal fade" id="hapus<?= $u->id_user?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Yakin ingin menghapus data <br><strong><?= $u->nama?>?</strong></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Pilih tombol HAPUS dibawah untuk menghapus.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger" href="<?= site_url() ?>action/hapus_byid/user/id_user/<?= $u->id_user; ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>

<?php } ?>                