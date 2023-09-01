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
            <div class="dropdown" style="height: 100%; width: 100%;">
                <a href="#" style="text-decoration: none;">
                    <div class="card text-white">
                        <div class="card-body">
                            <h5 class="card-title">Personalia</h5>
                        </div>
                    </div>
                </a>
                <div class="dropdown-content">
                    <a href="<?= base_url('Master/page_his/home_personalia') ?>">Personal Data</a>
                    <a href="#">Medical</a>
                </div>
            </div>
        </div>
        <!-- Tambahkan button-menu lain di sini -->
        <div class="col-sm-4">
            <a href="<?= base_url('Master/Page_his/karyawan_out') ?>" style="text-decoration: none;">
                <div class="card text-white  mb-3">
                    <div class="card-body">
                        <h5 class="card-title">General Affair</h5>

                    </div>
                </div>
            </a>
        </div>
        <div class="col-sm-4">
            <a href="<?= base_url('Master/Page_his/karyawan_temp') ?>" style="text-decoration: none;">
                <div class="card text-white  mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Training Kaizen</h5>

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
        background: #1cc88a;
    }

    .card:hover,
    .card:focus {
        transform: translateY(-5px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        background-color: #1cc88a;
    }

    .card:active {
        transform: translateY(0);
        box-shadow: none;
    }

    .card-body {
        padding: 1.25rem;
    }

    .personalia-card {
        width: 100%;
        margin: 0;
        padding: 0;
        position: relative;
        background: #1cc88a;
    }

    /* Tambahkan styling untuk dropdown */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
        border-radius: 5px;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }
</style>