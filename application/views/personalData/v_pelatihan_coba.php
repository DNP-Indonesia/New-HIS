                <!-- Begin Page Content -->
                <div class="container-fluid">

                	<!-- Page Heading -->
                	<div class="d-sm-flex align-items-center justify-content-between mb-4">
                		<h1 class="h3 mb-0 text-gray-800">Data Karyawan Training & Percobaan</h1>
                		<a href="#" class="d-none d-sm-inline-block btn btn-lg btn-primary shadow-sm"
                			data-toggle="modal" data-target="#ModalTbhKar">
                			<span class="icon text-white-50">
                				<i class="fas fa-plus-circle"></i>
                			</span>
                			<span class="text">Tambah Karyawan Training / Percobaan</span>
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
                							<th>Keterangan</th>
                							<th></th>
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
                							<th>Keterangan</th>
                							<th>Action</th>
                						</tr>
                					</tfoot>
                					<tbody>
                						<?php
                                        $i = 1;
                                        foreach ($karyawan as $u) {
                                            $thn_lahir       = substr($u->tgl_lahir, 0, 4);
                                            $bln_lahir       = substr($u->tgl_lahir, 5, 2);
                                            $t_lahir         = substr($u->tgl_lahir, 8, 2);
                                            $thn_pensiun = $thn_lahir + 55;
                                            $tgl_pensiun = $thn_pensiun . "-" . $bln_lahir . "-" . $t_lahir;
                                        ?>
                						<tr>
                							<td><?php echo $i ?></td>
                							<td><?php echo $u->nama ?></td>
                							<td><?php echo $u->nik_training ?></td>
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
                							<td><?php echo $u->keterangan ?></td>
                							<td>
                								<div class="btn-group dropleft">
                									<button type="button" class="btn btn-info dropdown-toggle"
                										data-toggle="dropdown" aria-haspopup="true"
                										aria-expanded="false">
                										Menu
                									</button>
                									<div class="dropdown-menu bg-gradient-dark"
                										aria-labelledby="dropdownMenuButton">
                										<p class="dropdown-header">
                											<strong class="text-gray-100">MENU </strong>
                										</p>

                										<p class="dropdown-item">
                											<a href="" class="btn btn-primary btn-icon-split btn-sm"
                												data-toggle="modal"
                												data-target="#ModalAngkat<?php echo $u->nik_training ?>">
                												<span class="icon text-white-50">
                													<i class="fas fa-edit"></i>
                												</span>
                												<span class="text">Angkat Karyawan</span>
                											</a>
                										</p>

                										<p class="dropdown-item">
                											<a href="" class="btn btn-warning btn-icon-split btn-sm"
                												data-toggle="modal"
                												data-target="#ModalEditKar<?php echo $u->nik_training ?>">
                												<span class="icon text-white-50">
                													<i class="fas fa-edit"></i>
                												</span>
                												<span class="text">Edit Data Karyawan</span>
                											</a>
                										</p>

                										<p class="dropdown-item">
                											<a href=""
                												class="btn btn-danger btn-icon-split btn-sm accordion-toggle"
                												data-toggle="modal"
                												data-target="#ModalOut<?php echo $u->nik_training ?>">
                												<span class="icon text-white-50">
                													<i class="fas fa-trash"></i>
                												</span>
                												<span class="text">Keluarkan</span>
                											</a>
                										</p>
                									</div>
                								</div>
                							</td>
                						</tr>

                						<!-- Modal untuk Angkat Karyawan -->
                						<div class="modal fade" id="ModalAngkat<?php echo $u->nik_training ?>"
                							tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                							aria-hidden="true">
                							<div class="modal-dialog modal-dialog-centered" role="document">
                								<div class="modal-content">
                									<div class="modal-header">
                										<h3 class="modal-title" id="exampleModalLabel">Angkat Menjadi
                											Karyawan <?php echo $u->nama ?></h3>
                										<button class="close" type="button" data-dismiss="modal"
                											aria-label="Close">
                											<span aria-hidden="true">×</span>
                										</button>
                									</div>
                									<form
                										action="<?php echo site_url() . 'action_his/angkat_karyawan'; ?>"
                										method="post">
                										<input type="text" name="nik_training"
                											value="<?= $u->nik_training ?>" hidden>
                										<input type="text" name="keterangan" value="Aktif" hidden>
                										<div class="modal-body">
                											<div class="form-row" id="formNik">
                												<div class="col-md-12 mb-3">
                													<label for="exampleInputEmail1"><b>Nomor Induk
                															Karyawan (NIK)</b></label>
                													<input type="text" class="form-control" id="newNik"
                														name="new_nik"
                														placeholder="Contoh: A001 atau 1234">
                													<small class="form-text text-muted">NIK harus
                														terdiri dari 1 huruf di depan dan 3 angka, atau
                														langsung 4 angka seluruhnya.</small>
                													<div id="errorAlert" class="alert alert-danger mt-2"
                														style="display: none;"></div>
                												</div>
                											</div>
                										</div>
                										<div class="modal-footer">
                											<button class="btn btn-secondary" type="button"
                												data-dismiss="modal">Cancel</button>
                											<button type="submit" id=""
                												class="btn btn-primary">Submit</button>
                										</div>
                									</form>
                								</div>
                							</div>
                						</div>

                						<!-- Modal untuk Keluarkan Karyawan -->
                						<div class="modal fade" id="ModalOut<?php echo $u->nik_training ?>"
                							tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                							aria-hidden="true">
                							<div class="modal-dialog modal-dialog-centered" role="document">
                								<div class="modal-content">
                									<div class="modal-header">
                										<h3 class="modal-title" id="exampleModalLabel">Ubah Status
                											Karyawan <?php echo $u->nama ?></h3>
                										<button class="close" type="button" data-dismiss="modal"
                											aria-label="Close">
                											<span aria-hidden="true">×</span>
                										</button>
                									</div>
                									<form
                										action="<?php echo site_url() . 'action_his/do_out_karyawan_temp'; ?>"
                										method="post">
                										<input type="text" name="nik_training"
                											value="<?= $u->nik_training ?>" hidden>
                										<div class="modal-body">
                											<div class="form-row">
                												<div class="col-md-12 mb-3">
                													<label for="exampleInputEmail1"><b>Pilih Alasan
                															Perubahan</b></label>
                													<select class="form-control"
                														id="exampleFormControlSelect1" name="keterangan"
                														required>
                														<option value="" selected disabled> -- Pilih
                															Alasan -- </option>
                														<option value="Pasca Training">Pasca Training
                														</option>
                														<option value="Pasca Percobaan">Pasca Percobaan
                														</option>
                													</select>
                													<small id="emailHelp"
                														class="form-text text-muted">Pilih alasan
                														perubahan disini</small>
                												</div>
                											</div>
                										</div>
                										<div class="modal-footer">
                											<button class="btn btn-secondary" type="button"
                												data-dismiss="modal">Cancel</button>
                											<button type="submit" id=""
                												class="btn btn-primary">Submit</button>
                										</div>
                									</form>
                								</div>
                							</div>
                						</div>






                						<!-- EDIT KARYAWAN Modal-->
                						<div class="modal fade" id="ModalEditKar<?php echo $u->nik_training ?>"
                							tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                							aria-hidden="true">
                							<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                								<div class="modal-content">
                									<div class="modal-header">
                										<h3 class="modal-title" id="exampleModalLabel">Edit Karyawan
                										</h3>
                										<button class="close" type="button" data-dismiss="modal"
                											aria-label="Close">
                											<span aria-hidden="true">×</span>
                										</button>
                									</div>
                									<form
                										action="<?php echo site_url("action_his/do_edit_karyawan_temp/" . $u->nik_training) ?>"
                										method="post">
                										<div class="modal-body">
                											<div class="form-row">
                												<div class="col-md-6 mb-3">
                													<label for="exampleInputEmail1"><b>Nama
                															Karyawan</b></label>
                													<input type="text" class="form-control"
                														id="exampleInputEmail1" name="nama"
                														value="<?php echo $u->nama ?>" required>
                													<small id="emailHelp"
                														class="form-text text-muted">Input nama karyawan
                														disini</small>
                												</div>
                												<div class="col-md-6 mb-3">
                													<label><b>NIK</b></label>
                													<input type="text" class="form-control"
                														name="nik_training"
                														value="<?php echo $u->nik_training ?>" required>
                													<small class="form-text text-muted">Nomor Induk
                														Karyawan</small>
                												</div>
                											</div>
                											<div class="form-row">
                												<div class="col-md-6 mb-3">
                													<label><b>Jenis Kelamin
                															<?php echo $u->gender ?></b></label>
                													<select class="form-control"
                														id="exampleFormControlSelect1" name="gender"
                														required>
                														<option value="LAKI-LAKI" <?php if ($u->gender == "LAKI-LAKI") {
                                                                                                            echo "selected";
                                                                                                        } ?>>Laki-Laki
                														</option>
                														<option value="PEREMPUAN" <?php if ($u->gender == "PEREMPUAN") {
                                                                                                            echo "selected";
                                                                                                        } ?>>Perempuan
                														</option>
                													</select>
                													<small class="form-text text-muted">Jenis
                														Kelamin</small>
                												</div>
                												<div class="col-md-6 mb-3">

                													<label
                														for="exampleFormControlSelect1"><b>Section</b></label>
                													<select class="form-control"
                														id="exampleFormControlSelect1" name="id_section"
                														required>
                														<?php
                                                                            include "koneksi.php";
                                                                            ?>
                														<?php
                                                                            // $q_sec = mysqli_query($conn, "SELECT * FROM his_section");
                                                                            $q_sec = $this->M_his->data_section();
                                                                            foreach ($q_sec as $sec) {
                                                                                if ($sec->id_section == $u->id_section) {
                                                                                    $sel = "selected";
                                                                                } else {
                                                                                    $sel = "";
                                                                                } ?>
                														<option value="<?php echo $sec->id_section; ?>"
                															<?php echo $sel; ?>>
                															<?php echo $sec->nama_section; ?></option>
                														<?php } ?>
                													</select>
                													<small id="emailHelp"
                														class="form-text text-muted">Section</small>

                												</div>
                											</div>
                											<div class="form-row">
                												<div class="col-md-6 mb-3">
                													<label
                														for="exampleFormControlSelect1"><b>Golongan</b></label>
                													<select class="form-control"
                														id="exampleFormControlSelect1"
                														name="id_golongan" required>
                														<option value="" selected disabled> -- Pilih
                															Golongan -- </option>
                														<?php
                                                                            $q_class = $this->M_his->data_golongan();
                                                                            foreach ($q_class as $class) {
                                                                                if ($class->id_golongan == $u->id_golongan) {
                                                                                    $sel = "selected";
                                                                                } else {
                                                                                    $sel = "";
                                                                                }
                                                                            ?>
                														<option
                															value="<?php echo $class->id_golongan; ?>"
                															<?php echo $sel; ?>>
                															<?php echo $class->nama_golongan; ?>
                														</option>
                														<?php } ?>
                													</select>
                													<small id="emailHelp"
                														class="form-text text-muted">Class</small>
                												</div>
                												<div class="col-md-6 mb-3">
                													<label
                														for="exampleFormControlSelect1"><b>Shift</b></label>
                													<select class="form-control"
                														id="exampleFormControlSelect1" name="id_shift"
                														required>
                														<option value="" selected disabled> -- Pilih
                															Shift -- </option>
                														<?php
                                                                            $q_shift = $this->M_his->data_shift();
                                                                            foreach ($q_shift as $sh) {
                                                                                if ($sh->id_shift == $u->id_shift) {
                                                                                    $sel = "selected";
                                                                                } else {
                                                                                    $sel = "";
                                                                                }
                                                                            ?>
                														<option value="<?php echo $sh->id_shift; ?>"
                															<?php echo $sel; ?>>
                															<?php echo $sh->nama_shift; ?></option>
                														<?php } ?>
                													</select>
                													<small id="emailHelp"
                														class="form-text text-muted">Shift</small>
                												</div>
                											</div>
                											<div class="form-row">
                												<div class="col-md-6 mb-3">
                													<label
                														for="exampleFormControlSelect1"><b>Jabatan</b></label>
                													<select class="form-control"
                														id="exampleFormControlSelect1" name="id_jabatan"
                														required>
                														<?php
                                                                            $q_jab = $this->M_his->data_jabatan();
                                                                            foreach ($q_jab as $jab) {
                                                                                if ($jab->id_jabatan == $u->id_jabatan) {
                                                                                    $sel = "selected";
                                                                                } else {
                                                                                    $sel = "";
                                                                                }
                                                                            ?>
                														<option value="<?php echo $jab->id_jabatan; ?>"
                															<?php echo $sel; ?>>
                															<?php echo $jab->nama_jabatan; ?></option>
                														<?php } ?>
                													</select>
                													<small id="emailHelp"
                														class="form-text text-muted">Jabatan</small>
                												</div>
                												<div class="col-md-6 mb-3">
                													<label for="exampleInputEmail1"><b>Tanggal
                															Lahir</b></label>
                													<input type="text" class="form-control datepicker"
                														name="tgl_lahir"
                														value="<?php echo $u->tgl_lahir ?>" required>
                													<small id="emailHelp"
                														class="form-text text-muted">Input tanggal lahir
                														karyawan</small>
                												</div>
                											</div>
                											<div class="form-row">
                												<div class="col-md-6 mb-3">
                													<label><b>Tanggal Masuk</b></label>
                													<input type="text" class="form-control datepicker"
                														name="tgl_masuk"
                														value="<?php echo $u->tgl_masuk ?>" required>
                													<small id="emailHelp"
                														class="form-text text-muted">Tanggal
                														Masuk</small>
                												</div>
                												<div class="col-md-6 mb-3">
                													<label><b>Pendidikan</b></label>
                													<select class="form-control"
                														id="exampleFormControlSelect1" name="pendidikan"
                														required>
                														<option value="" selected disabled> -- Pilih
                															Pendidikan -- </option>
                														<option value="SD" <?php if ($u->pendidikan == "SD") {
                                                                                                    echo "selected";
                                                                                                } ?>>SD</option>
                														<option value="SMP" <?php if ($u->pendidikan == "SMP") {
                                                                                                    echo "selected";
                                                                                                } ?>>SMP</option>
                														<option value="SLTA" <?php if ($u->pendidikan == "SLTA") {
                                                                                                        echo "selected";
                                                                                                    } ?>>SLTA</option>
                														<option value="D3" <?php if ($u->pendidikan == "D3") {
                                                                                                    echo "selected";
                                                                                                } ?>>D3</option>
                														<option value="S1" <?php if ($u->pendidikan == "S1") {
                                                                                                    echo "selected";
                                                                                                } ?>>S1</option>
                														<option value="S2" <?php if ($u->pendidikan == "S2") {
                                                                                                    echo "selected";
                                                                                                } ?>>S2</option>
                														<option value="S3" <?php if ($u->pendidikan == "S3") {
                                                                                                    echo "selected";
                                                                                                } ?>>S3</option>
                													</select>
                													<small
                														class="form-text text-muted">Pendidikan</small>
                												</div>
                											</div>
                										</div>
                										<div class="modal-footer">
                											<button class="btn btn-secondary" type="button"
                												data-dismiss="modal">Cancel</button>
                											<button type="submit"
                												class="btn btn-primary">Submit</button>
                										</div>
                									</form>
                								</div>
                							</div>
                						</div>
                						<?php $i++;
                                        } ?>
                					</tbody>
                				</table>
                				<!-- Paginate -->
                				<div style='margin-top: 10px;' id='pagination'></div>
                			</div>
                		</div>
                	</div>
					<a href="<?php echo base_url('Master/Page_his/home_personalia')?>" class="back-link" >
			<i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
		</a>
		<br>
		<br>

                </div>
                <!-- /.container-fluid -->

                <!-- TAMBAH KARYAWAN Modal-->
                <div class="modal fade" id="ModalTbhKar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                	aria-hidden="true">
                	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                		<div class="modal-content">
                			<div class="modal-header">
                				<h3 class="modal-title" id="exampleModalLabel">Tambah Karyawan Baru</h3>
                				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
                					<span aria-hidden="true">×</span>
                				</button>
                			</div>
                			<form action="<?php echo site_url("action_his/do_tbh_karyawan_temp") ?>" method="post">
                				<div class="modal-body">
                					<div class="form-row">
                						<div class="col-md-6 mb-3">
                							<label for="exampleInputEmail1"><b>Spyssid</b></label>
                							<input type="text" class="form-control" id="exampleInputEmail1"
                								name="spysiid" required>
                							<small id="emailHelp" class="form-text text-muted">Input nama karyawan
                								disini</small>
                						</div>
                					</div>
                					<div class="form-row">
                						<div class="col-md-6 mb-3">
                							<label for="exampleInputEmail1"><b>Nama Karyawan</b></label>
                							<input type="text" class="form-control" id="exampleInputEmail1" name="nama"
                								required>
                							<small id="emailHelp" class="form-text text-muted">Input nama karyawan
                								disini</small>
                						</div>
                						<div class="col-md-6 mb-3">
                							<label><b>NIK</b></label>
                							<input type="text" class="form-control" name="nik_training" required>
                							<small class="form-text text-muted">Nomor Induk Karyawan</small>
                						</div>
                					</div>
                					<div class="form-row">
                						<div class="col-md-6 mb-3">
                							<label><b>Jenis Kelamin</b></label>
                							<select class="form-control" id="exampleFormControlSelect1" name="gender"
                								required>
                								<option value="" selected disabled> -- Pilih Jenis Kelamin -- </option>
                								<option value="LAKI-LAKI">Laki-Laki</option>
                								<option value="PEREMPUAN">Perempuan</option>
                							</select>
                							<small class="form-text text-muted">Jenis Kelamin</small>
                						</div>
                						<div class="col-md-6 mb-3">
                							<label for="exampleFormControlSelect1"><b>Section</b></label>
                							<select class="form-control" id="exampleFormControlSelect1"
                								name="id_section" required>
                								<option value="" selected disabled> -- Pilih Section -- </option>
                								<?php
                                                include "koneksi.php";
                                                ?>
                								<?php
                                                $q_sec = $this->M_his->data_section();
                                                foreach ($q_sec as $sec) {
                                                ?>
                								<option value="<?php echo $sec->id_section; ?>">
                									<?php echo $sec->nama_section; ?></option>
                								<?php } ?>
                							</select>
                							<small id="emailHelp" class="form-text text-muted">Section</small>
                						</div>
                					</div>
                					<div class="form-row">
                						<div class="col-md-6 mb-3">
                							<label for="exampleFormControlSelect1"><b>Golongan</b></label>
                							<select class="form-control" id="exampleFormControlSelect1"
                								name="id_golongan" required>
                								<option value="" selected disabled> -- Pilih Golongan -- </option>
                								<?php
                                                $q_class = $this->M_his->data_golongan();
                                                foreach ($q_class as $class) {
                                                ?>
                								<option value="<?php echo $class->id_golongan; ?>">
                									<?php echo $class->nama_golongan; ?></option>
                								<?php } ?>
                							</select>
                							<small id="emailHelp" class="form-text text-muted">Class</small>
                						</div>
                						<div class="col-md-6 mb-3">
                							<label for="exampleFormControlSelect1"><b>Shift</b></label>
                							<select class="form-control" id="exampleFormControlSelect1" name="id_shift"
                								required>
                								<option value="" selected disabled> -- Pilih Shift -- </option>
                								<?php
                                                $q_shift = $this->M_his->data_shift();
                                                foreach ($q_shift as $sh) {
                                                ?>
                								<option value="<?php echo $sh->id_shift; ?>">
                									<?php echo $sh->nama_shift; ?></option>
                								<?php } ?>
                							</select>
                							<small id="emailHelp" class="form-text text-muted">Shift</small>
                						</div>
                					</div>
                					<div class="form-row">
                						<div class="col-md-6 mb-3">
                							<label for="exampleFormControlSelect1"><b>Jabatan</b></label>
                							<select class="form-control" id="exampleFormControlSelect1"
                								name="id_jabatan" required>
                								<option value="" selected disabled> -- Pilih Jabatan -- </option>
                								<?php
                                                $q_jab = $this->M_his->data_jabatan();
                                                foreach ($q_jab as $jab) {
                                                ?>
                								<option value="<?php echo $jab->id_jabatan; ?>">
                									<?php echo $jab->nama_jabatan; ?></option>
                								<?php } ?>
                							</select>
                							<small id="emailHelp" class="form-text text-muted">Jabatan</small>
                						</div>
                						<div class="col-md-6 mb-3">
                							<label for="exampleInputEmail1"><b>Tanggal Lahir</b></label>
                							<input type="text" class="form-control datepicker" name="tgl_lahir"
                								required>
                							<small id="emailHelp" class="form-text text-muted">Input tanggal lahir
                								karyawan</small>
                						</div>
                					</div>
                					<div class="form-row">
                						<div class="col-md-6 mb-3">
                							<label><b>Tanggal Masuk</b></label>
                							<input type="text" class="form-control datepicker" name="tgl_masuk"
                								required>
                							<small id="emailHelp" class="form-text text-muted">Tanggal Masuk</small>
                						</div>
                						<div class="col-md-6 mb-3">
                							<label><b>Pendidikan</b></label>
                							<select class="form-control" id="exampleFormControlSelect1"
                								name="pendidikan" required>
                								<option value="" selected disabled> -- Pilih Pendidikan -- </option>
                								<option value="SD">SD</option>
                								<option value="SMP">SMP</option>
                								<option value="SLTA">SLTA</option>
                								<option value="D3">D3</option>
                								<option value="S1">S1</option>
                								<option value="S2">S2</option>
                								<option value="S3">S3</option>
                							</select>
                							<small class="form-text text-muted">Pendidikan</small>
                						</div>
                					</div>
                					<div class="form-row">
                						<div class="col-md-6 mb-3">
                							<label for="exampleFormControlSelect1"><b>Keterangan</b></label>
                							<select class="form-control" id="exampleFormControlSelect1"
                								name="keterangan" required>
                								<option value="" selected disabled> -- Pilih Keterangan -- </option>
                								<option value="Training">Training</option>
                								<option value="Percobaan">Percobaan</option>
                							</select>
                							<small id="emailHelp" class="form-text text-muted">Keterangan</small>
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

                <script>
                	// Fungsi untuk mengatur visibilitas form "nik" berdasarkan pilihan select box
                	// function toggleNikForm() {
                	//     var selectBox = document.getElementById('exampleFormControlSelect1');
                	//     var formNik = document.getElementById('formNik');

                	//     // Jika pilihan "Aktif" dipilih, tampilkan form "nik", jika tidak, sembunyikan form "nik"

                	//     // Panggil fungsi toggleSubmitButton untuk memperbarui status tombol submit
                	//     toggleSubmitButton();
                	// }

                	// // Panggil fungsi toggleNikForm() saat halaman pertama kali dimuat
                	// toggleNikForm();

                	// // Tambahkan event listener untuk memantau perubahan pada select box
                	// document.getElementById('exampleFormControlSelect1').addEventListener('change', toggleNikForm);

                	// // Tambahkan event listener untuk memantau perubahan pada input "nik"
                	// document.getElementById('newNik').addEventListener('input', toggleSubmitButton);

                	// // Fungsi untuk menampilkan pesan error
                	// function showError(message) {
                	//     var errorAlert = document.getElementById('errorAlert');
                	//     errorAlert.innerHTML = message;
                	//     errorAlert.style.display = 'block';
                	// }

                	// // Fungsi untuk menyembunyikan pesan error
                	// function hideError() {
                	//     var errorAlert = document.getElementById('errorAlert');
                	//     errorAlert.style.display = 'none';
                	// }

                	// // Fungsi untuk memeriksa apakah NIK sudah digunakan sebelumnya dengan permintaan AJAX ke server
                	// function isNikUsed(nik) {       
                	//     var xhr = new XMLHttpRequest();
                	//     var formData = new FormData();
                	//     formData.append('new_nik', nik);
                	//     xhr.open('POST', '<?php echo site_url() . 'action_his/check_nik_availability'; ?>', false);
                	//     xhr.onload = function () {
                	//         if (xhr.status === 200) {
                	//             var response = JSON.parse(xhr.responseText);
                	//             if (response.available) {
                	//                 return false; // NIK belum digunakan
                	//             } else {
                	//                 return true; // NIK telah digunakan
                	//             }
                	//         }
                	//     };
                	//     xhr.onerror = function () {
                	//         showError('Terjadi kesalahan saat mengirim data ke server.');
                	//         return false; // Pengolahan NIK dibatalkan karena kesalahan server
                	//     };
                	//     xhr.send(formData);
                	// }

                	// // Fungsi untuk mengaktifkan atau menonaktifkan tombol submit
                	// function toggleSubmitButton() {
                	//     var submitButton = document.getElementById('submitButton');
                	//     var keterangan = document.getElementById('exampleFormControlSelect1').value;
                	//     var newNik = document.getElementById('newNik').value;

                	//     // Validasi "nik" harus terdiri dari 1 huruf di depan dan 3 angka, atau langsung 4 angka seluruhnya
                	//     var nikRegex = /^[A-Za-z]?\d{3}$|^[A-Za-z]\d{4}$/;
                	//     if (!newNik.match(nikRegex)) {
                	//         showError('NIK harus terdiri dari 1 huruf di depan dan 3 angka, atau langsung 4 angka seluruhnya.');
                	//         submitButton.disabled = true; // Nonaktifkan tombol submit jika "nik" tidak valid
                	//     } else {
                	//         hideError();
                	//         if (keterangan === 'Aktif') {
                	//             if (isNikUsed(newNik)) {
                	//                 showError('NIK telah digunakan. Silakan pilih NIK yang lain.');
                	//                 submitButton.disabled = true; // Nonaktifkan tombol submit jika "nik" telah digunakan
                	//             } else {
                	//                 submitButton.disabled = false; // Aktifkan tombol submit jika "nik" valid dan belum digunakan sebelumnya
                	//             }
                	//         } else {
                	//             submitButton.disabled = false; // Aktifkan tombol submit jika pilihan bukan "Aktif"
                	//         }
                	//     }
                	// }

                </script>

<style scoped>
	.back-link{
        text-decoration: none;
        color: #fff;
        background-color: #1cc88a;
        padding: 1rem;
        border-radius: 8px;
        transition: color 0.3s, background-color 0.3s, transform 0.3s, box-shadow 0.3s;
    }

    .back-link:hover{
        color: #fff;
        background-color: #1cc88a; /* Ubah latar belakang menjadi hijau */
        text-decoration: none;
        transform: translateY(-5px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }
</style>

