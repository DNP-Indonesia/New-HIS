<div class="container-fluid">
    <!-- 404 Error Text -->
    <div class="text-center">
        <h1>
            <div data-text="DNP">DNP</div>
        </h1>
        <p class="lead text-gray-800 mb-5">HRCA Information System</p>
        <p class="text-gray-500 mb-0">Selamat datang, Salam Sehat!</p>
        <div class="notifikasi" id="notifikasi"></div>
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
    opacity: 0; /* Awalnya diatur menjadi 0 */
    display: block;
    animation: fadeIn 0.5s ease-in-out forwards; /* Gunakan animasi fadeIn */
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


<script>
const karyawanAkanPensiun = <?= json_encode($karyawanAkanPensiun) ?>; // Perhatikan penggunaan sintaksis PHP di sini.

function showNotification() {
    const notifikasi = document.getElementById('notifikasi');
    if (notifikasi) {
        // Ubah konten notifikasi sesuai kebutuhan Anda
        notifikasi.innerHTML = `
        <h5>Pemberitahuan Karyawan Akan Pensiun</h5>
        <br>
        ${karyawanAkanPensiun.length > 0 ? 
            `<ul>${karyawanAkanPensiun.map(karyawan => {
                const tanggalLahir = new Date(karyawan.tgl_lahir);
                const tahunPensiun = tanggalLahir.getFullYear() + 55;
                const tanggalPensiun = new Date(tahunPensiun, tanggalLahir.getMonth(), tanggalLahir.getDate());
                const formattedTanggalPensiun = tanggalPensiun.toLocaleDateString('id-ID');
                return `<li>${karyawan.nama} - ${formattedTanggalPensiun} </li>`;
                
            }).join('')}</ul>` :
            `<p>Tidak ada karyawan yang akan pensiun dalam 1 bulan ke depan.</p>`}
            <br>
            <a href="Master/page_his/karyawan_pensiun" class="btn btn-primary btn-sm">Detail</a>
         `;
         

        // Tampilkan notifikasi dengan mengubah gaya elemen
        notifikasi.style.display = 'block';

        // Sembunyikan notifikasi setelah 5 detik
        setTimeout(() => {
            notifikasi.style.display = 'none';
        }, 15000);
    }
}

// Panggil fungsi showNotification saat data karyawan tersedia
if (karyawanAkanPensiun.length > 0) {
    showNotification();
}

</script>
