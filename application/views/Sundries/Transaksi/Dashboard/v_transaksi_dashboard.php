<br>
<br>
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
            <div class="mb-3">
                <div class="dropdown" style="height: 100%; width: 100%;">
                    <a href="<?= site_url('dashboard-request-sundries') ?>" style="text-decoration: none;">
                        <div class="card text-white">
                            <div class="card-body">
                                <h5 class="card-title">Request Sundries</h5>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-content" style="width: 100%;">
                        <a href="<?= site_url('admin-bagian-request-sundries') ?>">Admin Bagian</a>
                        <a href="<?= site_url('admin-gudang-request-sundries') ?>">Admin Gudang</a>
                        <a href="<?= site_url('kepala-bagian-request-sundries') ?>">Kepala Bagian</a>
                        <a href="<?= site_url('kepala-gudang-request-sundries') ?>">Kelapa Gudang</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="mb-3">
                <div class="dropdown" style="height: 100%; width: 100%;">
                    <a href="<?= site_url('dashboard-estimation-making') ?>" style="text-decoration: none;">
                        <div class="card text-white">
                            <div class="card-body">
                                <h5 class="card-title">Estimation Making</h5>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-content" style="width: 100%;">
                        <a href="<?= site_url('admin-bagian-estimation-making') ?>">Admin Bagian</a>
                        <a href="<?= site_url('kepala-bagian-estimation-making') ?>">Kepala Bagian</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="mb-3">
                <div class="dropdown" style="height: 100%; width: 100%;">
                    <a href="<?= site_url('dashboard-consumption-sundries') ?>" style="text-decoration: none;">
                        <div class="card text-white">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <Cap>Consumption Sundries</Cap>
                                </h5>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-content" style="width: 100%;">
                        <a href="<?= site_url('admin-bagian-consumption-sundries') ?>">Admin Bagian</a>
                        <a href="<?= site_url('kepala-bagian-consumption-sundries') ?>">Kepala Bagian</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="mb-3">
                <div class="dropdown" style="height: 100%; width: 100%;">
                    <a href="<?= site_url('dashboard-request-purchase') ?>" style="text-decoration: none;">
                        <div class="card text-white">
                            <div class="card-body">
                                <h5 class="card-title">Request Purchase</h5>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-content" style="width: 100%;">
                        <a href="<?= site_url('admin-gudang-request-purchase') ?>">Admin Gudang</a>
                        <a href="<?= site_url('kepala-gudang-request-purchase') ?>">Kelapa Gudang</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="mb-3">
                <div class="dropdown" style="height: 100%; width: 100%;">
                    <a href="<?= site_url('dashboard-goods-receipt') ?>" style="text-decoration: none;">
                        <div class="card text-white mb">
                            <div class="card-body">
                                <h5 class="card-title">Goods Resceipt</h5>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-content" style="width: 100%;">
                        <a href="<?= site_url('admin-gudang-goods-receipt') ?>">Admin Gudang</a>
                        <a href="<?= site_url('kepala_gudang-goods-receipt') ?>">Kelapa Gudang</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="mb-3">
                <div class="dropdown" style="height: 100%; width: 100%;">
                    <a href="<?= site_url('dashboard-consumption-estimation') ?>" style="text-decoration: none;">
                        <div class="card text-white">
                            <div class="card-body">
                                <h5 class="card-title">Consumption Estimation</h5>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-content" style="width: 100%;">
                        <a href="<?= site_url('admin-bagian-consumption-estimation') ?>">Admin Bagian</a>
                        <a href="<?= site_url('kepala-bagian-consumption-estimation') ?>">Kepala Bagian</a>
                    </div>
                </div>
            </div>
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

    .notifikasi {
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: #1cc88a;
        color: #fff;
        padding: 10px 20px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        z-index: 1000;
        opacity: 0;
        /* Awalnya diatur menjadi 0 */
        display: block;
        animation: fadeIn 0.5s ease-in-out forwards;
        /* Gunakan animasi fadeIn */
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
</style>