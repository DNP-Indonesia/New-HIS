                <!-- Begin Page Content -->
                <div class="container-fluid">

                	<!-- Page Heading -->
                	<br>
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

					<br>
                	<div class="card shadow mb-4">
                		<div class="card-body">
                			<div class="table-responsive">
                				<table class="table table-bordered" id='dataTable' width="100%" cellspacing="0">
									<thead>
										<tr class="table-info">
											<th>Nama</th>
											<th>NIK</th>	
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
									</thead>
                					<?php foreach ($karyawan as $log) { ?>

									<tbody>
                					<tr>
										<td><?php echo $log->nama_karyawan; ?></td>
                						<td><?php echo $log->nik; ?></td>
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
									</tbody>
                					<?php } ?>
                				</table>
                				<div style='margin-top: 10px;' id='pagination'></div>
                			</div>
                		</div>
						
                	</div>

					<a href="<?php echo base_url('Master/Page_his/home_personalia')?>" class="back-link" >
			<i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
		</a>

		<br>
		<br>

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
