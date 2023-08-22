
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h2>Data Karyawan</h2>
                <table class="table">
                    <tbody>
                        <?php foreach ($karyawan as $log): ?>
                            <tr>
                                <th scope="row">NIK</th>
                                <td><?php echo $log->nik ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Nama Lengkap</th>
                                <td><?php echo $log->nama ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal Lahir</th>
                                <td><?php echo date('d M y', strtotime($log->tgl_lahir)) ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Gender</th>
                                <td><?php echo $log->gender ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Divisi</th>
                                <td><?php echo $log->nama_divisi ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Departemen</th>
                                <td><?php echo $log->nama_dep ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Section</th>
                                <td><?php echo $log->nama_section ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Shift</th>
                                <td><?php echo $log->nama_shift ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Golongan</th>
                                <td><?php echo $log->nama_golongan ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Jabatan</th>
                                <td><?php echo $log->nama_jabatan ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal Masuk</th>
                                <td><?php echo date('d M y', strtotime($log->tgl_masuk)) ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Tanggal Pensiun</th>
                                <td><?php echo date('d M y', strtotime($log->tgl_lahir)) ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Status</th>
                                <td><?php echo $log->keterangan ?></td>
                            </tr>

                            <tr>
                                <th scope="row">
                                <a href="" class="btn btn-warning btn-icon-split btn-sm" data-toggle="modal" data-target="#ModalEditKar<?php echo $log->nik ?>">
                					<span class="icon text-white-50">
                						<i class="fas fa-edit"></i>
                					</span>
                					<span class="text">Edit Data Karyawan</span>
                				</a>
                                </th>
                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


<br>
    <div class="container-fluid">
        <h2>Log Mutasi Karyawan</h2>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="table-info">
                                <th>Nama</th>
                                <th>NIK</th>
                                <th style="background-color: #de0404; color: #ffffff;">Section Sebelum</th>
                                <th>Section Sesudah</th>
                                <th style="background-color: #de0404; color: #ffffff;">Golongan Sebelum</th>
                                <th>Golongan Sesudah</th>
                                <th style="background-color: #de0404; color: #ffffff;">Jabatan Sebelum</th>
                                <th>Jabatan Sesudah</th>
                                <th style="background-color: #de0404; color: #ffffff;">Shift Sebelum</th>
                                <th>Shift Sesudah</th>
                                <th>Waktu Mutasi</th>
                                <!-- Tambahkan kolom-kolom lain yang diperlukan -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($history as $h): ?>
                                <tr>
                                    <td><?php echo $h->nama_karyawan; ?></td>
                                    <td><?php echo $h->nik; ?></td>
                                    <td style="background-color: #de0404; color: #ffffff;"><?php echo $h->nama_section_sebelum; ?></td>
                                    <td><?php echo $h->nama_section_sesudah; ?></td>
                                    <td style="background-color: #de0404; color: #ffffff;"><?php echo $h->nama_golongan_sebelum; ?></td>
                                    <td><?php echo $h->nama_golongan_sesudah; ?></td>
                                    <td style="background-color: #de0404; color: #ffffff;"><?php echo $h->nama_jabatan_sebelum; ?></td>
                                    <td><?php echo $h->nama_jabatan_sesudah; ?></td>
                                    <td style="background-color: #de0404; color: #ffffff;"><?php echo $h->nama_shift_sebelum; ?></td>
                                    <td><?php echo $h->nama_shift_sesudah; ?></td>
                                    <td><?php echo $h->tgl_mutasi; ?></td>
                                    <!-- Tambahkan kolom-kolom lain yang diperlukan -->
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div id="pagination"></div>
            </div>
        </div>
        <a href="<?= base_url('index.php/page_his/karyawan') ?>" class="btn btn-primary">Kembali</a>
    </div>

    <!-- EDIT KARYAWAN Modal-->
    <div class="modal fade" id="ModalEditKar<?php echo $log->nik ?>" tabindex="-1"
                							role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                									<form action="<?php echo site_url("action_his/do_edit_karyawan/" . $log->nik) ?>" method="post">
                										<div class="modal-body">
                											<div class="form-row">
                												<div class="col-md-6 mb-3">
                													<label for="exampleInputEmail1"><b>Nama
                															Karyawan</b></label>
                													<input type="text" class="form-control"
                														id="exampleInputEmail1" name="nama"
                														value="<?php echo $log->nama ?>" required>
                													<small id="emailHelp"
                														class="form-text text-muted">Input nama karyawan
                														disini</small>
                												</div>
                												<?php //if (substr($u->nik,0,1) == 'T' OR substr($u->nik,0,1) == 'P') { 
                                                                    ?>
                												<div class="col-md-6 mb-3">
                													<label><b>NIK</b></label>
                													<input type="text" class="form-control" name="nik"
                														value="<?php echo $log->nik; ?>" required>
                													<small class="form-text text-muted">Nomor Induk
                														Karyawan</small>
                												</div>
                												<?php //} 
                                                                    ?>
                											</div>
                											<div class="form-row">
                												<div class="col-md-6 mb-3">
                													<label><b>Jenis Kelamin
                															<?php echo $log->gender ?></b></label>
                													<select class="form-control"
                														id="exampleFormControlSelect1" name="gender"
                														required>
                														<option value="LAKI-LAKI" <?php if ($log->gender == "LAKI-LAKI") {
                                                                                                            echo "selected";
                                                                                                        } ?>>Laki-Laki
                														</option>
                														<option value="PEREMPUAN" <?php if ($log->gender == "PEREMPUAN") {
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
                                                                                if ($sec->id_section == $log->id_section) {
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
                                                                            // $q_class = mysqli_query($conn, "SELECT * FROM his_golongan");
                                                                            $q_class = $this->M_his->data_golongan();
                                                                            foreach ($q_class as $class) {
                                                                                if ($class->id_golongan == $log->id_golongan) {
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
                                                                            // $q_shift = mysqli_query($conn, "SELECT * FROM his_shift");
                                                                            $q_shift = $this->M_his->data_shift();
                                                                            foreach ($q_shift as $sh) {
                                                                                if ($sh->id_shift == $log->id_shift) {
                                                                                    $sel = "selected";
                                                                                } else {
                                                                                    $sel = "";
                                                                                } ?>
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
                                                                            // $q_jab = mysqli_query($conn, "SELECT * FROM his_jabatan");
                                                                            $q_jab = $this->M_his->data_jabatan();
                                                                            foreach ($q_jab as $jab) {
                                                                                if ($jab->id_jabatan == $log->id_jabatan) {
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
                														value="<?php echo $log->tgl_lahir ?>" required>
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
                														value="<?php echo $log->tgl_masuk ?>" required>
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
                														<option value="SD" <?php if ($log->pendidikan == "SD") {
                                                                                                    echo "selected";
                                                                                                } ?>>SD</option>
                														<option value="SMP" <?php if ($log->pendidikan == "SMP") {
                                                                                                    echo "selected";
                                                                                                } ?>>SMP</option>
                														<option value="SLTA" <?php if ($log->pendidikan == "SLTA") {
                                                                                                        echo "selected";
                                                                                                    } ?>>SLTA</option>
                														<option value="D3" <?php if ($log->pendidikan == "D3") {
                                                                                                    echo "selected";
                                                                                                } ?>>D3</option>
                														<option value="S1" <?php if ($log->pendidikan == "S1") {
                                                                                                    echo "selected";
                                                                                                } ?>>S1</option>
                														<option value="S2" <?php if ($log->pendidikan == "S2") {
                                                                                                    echo "selected";
                                                                                                } ?>>S2</option>
                														<option value="S3" <?php if ($log->pendidikan == "S3") {
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

                    
    <style>
        .container-fluid {
            padding: 20px;
        }
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            padding: 20px;
        }
        .card h2 {
            margin-bottom: 20px;
        }
        .card table {
            width: 100%;
        }
        .card th, .card td {
            padding: 8px;
        }
        #pagination {
            margin-top: 10px;
        }
        .bg-red {
        background-color: #ff0000; /* Red color */
        color: #ffffff; /* White text color for better contrast */
    }
    </style>