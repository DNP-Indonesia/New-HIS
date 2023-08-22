
    <div class="container-fluid">
        <!-- 404 Error Text -->
        <div class="text-center">
            <h1>
                <div data-text="DNP">DNP</div>
            </h1>
            <p class="lead text-gray-800 mb-5">HRCA Information System</p>
            <p class="text-gray-500 mb-0">Selamat datang, Salam Sehat!</p>
        </div>
    </div>
    <br>
    <!-- Modul yang tersedia di HIS -->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <a href="<?= base_url('index.php/page_his/home_personalia') ?>" style="text-decoration: none;">
                    <div class="card text-white mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Personalia</h5>
                        </div>
                    </div>
                </a>
            </div>
            <!-- Tambahkan button-menu lain di sini -->
            <div class="col-sm-4">
                <a href="<?= base_url('index.php/page_his/karyawan_out') ?>" style="text-decoration: none;">
                    <div class="card text-white  mb-3">
                        <div class="card-body">
                            <h5 class="card-title">DIV LAIN</h5>
                            
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4">
                <a href="<?= base_url('index.php/page_his/karyawan_temp') ?>" style="text-decoration: none;">
                    <div class="card text-white  mb-3">
                        <div class="card-body">
                            <h5 class="card-title">DIV LAIN</h5>
                           
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-4">
                <a href="<?= base_url('index.php/page_his/karyawan_temp') ?>" style="text-decoration: none;">
                    <div class="card text-white mb-3">
                        <div class="card-body">
                            <h5 class="card-title">DIV LAIN</h5>
                           
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-sm-4">
                <a href="<?= base_url('index.php/page_his/karyawan_temp') ?>" style="text-decoration: none;">
                    <div class="card text-white mb-3">
                        <div class="card-body">
                            <h5 class="card-title">DIV LAIN</h5>
                           
                        </div>
                    </div>
                </a>
            </div>
            
        </div>
    </div>

    <style scoped>

    .card {
        position: relative;
        transition: transform 0.3s, box-shadow 0.3s;
        will-change: transform;
        background: #4e73df;
    }

    .card:hover, .card:focus {
        transform: translateY(-5px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        background-color: #1cc88a; /* Warna hijau saat tombol melayang */
    }

    .card:active {
        transform: translateY(0);
        box-shadow: none;
    }

    .card-body {
        padding: 1.25rem;
    }

</style>

