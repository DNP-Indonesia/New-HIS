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

					


                	<h2>Karyawan akan pensiun</h2>

					<br>
                	<div class="card shadow mb-4">
                		<div class="card-body">
                			<div class="table-responsive">
                				<table class="table table-bordered" id='dataTable' width="100%" cellspacing="0">
									<thead>
										<tr class="table-info">
											<th>Nama</th>
											<th>NIK</th>	
											<th>Tanggal Pensiun</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
											<!-- Tambahkan kolom-kolom lain yang diperlukan -->
										</tr>
									</thead>
                					<?php foreach ($karyawan as $log) { 
                                     $thn_lahir       = substr($log->tgl_lahir, 0, 4);
                                     $bln_lahir       = substr($log->tgl_lahir, 5, 2);
                                     $t_lahir         = substr($log->tgl_lahir, 8, 2);
                                     $thn_pensiun = $thn_lahir + 55;
                                     $tgl_pensiun = $thn_pensiun . "-" . $bln_lahir . "-" . $t_lahir;    
                                    ?>

									<tbody>
                					<tr>
										<td><?php echo $log->nama; ?></td>
                						<td><?php echo $log->nik; ?></td>
                						<td><?php echo $tgl_pensiun; ?></td>
                                        <td>Belum Siap</td>
                                        <td><p class="dropdown-item">
                											<a href="<?php echo site_url("Master/Page_his/persiapan_pensiun/" . $log->nik) ?>" class="btn btn-primary btn-icon-split btn-sm">
                												<span class="icon text-white-50">
                													<i class="fas fa-edit"></i>
                												</span>
                												<span class="text">Persiapan</span>
                											</a>
                										</p></td>
                						<!-- Tambahkan kolom-kolom lain yang diperlukan -->
                					</tr>
									</tbody>
                					<?php } ?>
                				</table>
                				<div style='margin-top: 10px;' id='pagination'></div>
                			</div>
                		</div>
						
                	</div>

					<a href="<?php echo base_url('dashboard')?>" class="back-link" >
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
