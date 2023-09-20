<div class="container-fluid">
        <!-- 404 Error Text -->
        <div class="text-center">
            <h1>
                <div data-text="DNP">Personalia</div>
            </h1>
            <p class="lead text-gray-800 mb-5">HRCA Information System</p>
            
        </div>
        
    </div>
    <a href="<?php echo base_url('dashboard')?>" class="back-link" >
			<i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
		</a>

        <br>
        <br>

    <div class="card shadow mb-2">
            <div class="card-body">
                <div class="table-responsive">
                <table class="table" id='dataTable' >
                    <thead>
                        <tr>
                            <th>Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="<?= base_url('Master/Page_his/karyawan') ?>" class="menu-link">Daftar Karyawan</a></td>
                        </tr>
                        <tr>
                            
                            <td><a href="<?= base_url('Master/Page_his/karyawan_out') ?>" class="menu-link">Daftar Karyawan Keluar</a></td>
                        </tr>
                        <tr>
                            
                            <td><a href="<?= base_url('Master/Page_his/karyawan_temp') ?>" class="menu-link">Karyawan Training dan Percobaan</a></td>
                        </tr>
                        <tr>
                            
                            <td><a href="<?= base_url('Master/Page_his/karyawan_out_temp') ?>" class="menu-link">Karyawan Training dan Percobaan Keluar</a></td>
                        </tr>
                        <tr>
                            
                            <td><a href="<?= base_url('Master/Page_his/divisi') ?>" class="menu-link">Daftar Divisi</a></td>
                        </tr>
                        <tr>
                            
                            <td><a href="<?= base_url('Master/Page_his/karyawan_mutasi') ?>" class="menu-link">Log Mutasi</a></td>
                        </tr>
                        <tr>
                            
                            <td><a href="<?= base_url('Master/Page_his/departemen') ?>" class="menu-link">Daftar Departemen</a></td>
                        </tr>
                        <tr>
                            
                            <td><a href="<?= base_url('Master/Page_his/section') ?>" class="menu-link">Daftar Section</a></td>
                        </tr>
                        <tr>
                        
                            <td><a href="<?= base_url('Master/Page_his/shift') ?>" class="menu-link">Daftar Shift</a></td>
                        </tr>
                        <tr>
                            
                            <td><a href="<?= base_url('Master/Page_his/jabatan') ?>" class="menu-link">Daftar Jabatan</a></td>
                        </tr>
                        <tr>
                        
                            <td><a href="<?= base_url('Master/Page_his/golongan') ?>" class="menu-link">Daftar Golongan</a></td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
            <br>
    
</div>

<style scoped>
     .card {
        border: none;
    }

    .card-body {
        padding: 1.5rem;
    }

    .table {
        margin-bottom: 0;
        border: none;
    }

    .menu-link {
        text-decoration: none;
        color: #333;
        display: block;
        padding: 1rem;
        border-radius: 8px;
        transition: color 0.3s, background-color 0.3s, transform 0.3s, box-shadow 0.3s;
    }

    .menu-link:hover {
        color: #fff;
        background-color: #1cc88a; /* Ubah latar belakang menjadi hijau */
        text-decoration: none;
        transform: translateY(-5px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

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

