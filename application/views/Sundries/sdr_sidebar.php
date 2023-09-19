<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href=<?php echo base_url() ?>dnp-logo.png rel="icon">
    <title>DNP - HIS</title>

    <link href="<?php echo base_url() ?>bootstrap/vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url() ?>bootstrap/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url() ?>bootstrap/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>bootstrap/datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <style type="text/css">
        .btn-purple {
            background-color: #8000ff;
            color: white;
        }

        .btn-purple:hover {
            color: white;
            background-color: #6906cc;
        }

        /* Gaya untuk font pada elemen navigasi aktif */
        .navbar-nav .nav-item.active .nav-link,
        .navbar-nav .nav-item.active .nav-link:hover,
        .navbar-nav .nav-item.active .nav-link:focus {
            color: white !important;
        }

        /* Gaya untuk font pada elemen navigasi ketika dihover (tersedia juga pada versi mobile) */
        .navbar-nav .nav-item .nav-link:hover {
            color: white;
        }

        /* Gaya untuk menampilkan dropdown */
        .show {
            display: block !important;
        }
    </style>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
</head>

<body id="page-top">

    <!-- Start Sidebar -->
    <ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url() ?>">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3"> DNP - HIS</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo site_url() ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-transaksi"
                aria-expanded="false" aria-controls="collapsePages" onclick="toggleDropdown('collapse-transaksi')">
                <i class="fas fa-fw fa-folder"></i>
                <span>Transaksi Sundries</span>
            </a>
            <div id="collapse-transaksi" class="collapse" aria-labelledby="headingPages"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo site_url('permintaan') ?>">Request Sundries</a>
                    <?php
                    // Cek apakah peran pengguna termasuk dalam 'sdr_Admin Bagian' atau 'sdr_Kepala Bagian'
                    if ($this->session->userdata('role') == 'sdr_Admin Bagian' || $this->session->userdata('role') == 'sdr_Kepala Bagian') {
                        ?>
                        <a class="collapse-item" href="<?php echo site_url('estimasi') ?>">Estimation Making</a>
                        <a class="collapse-item" href="<?php echo site_url('konsumsi') ?>">Request Consumption</a>
                        <?php
                    }
                    ?>
                    <?php
                    // Cek apakah peran pengguna termasuk dalam 'sdr_Admin Gudang' atau 'sdr_Kepala Gudang'
                    if ($this->session->userdata('role') == 'sdr_Admin Gudang' || $this->session->userdata('role') == 'sdr_Kepala Gudang') {
                        ?>
                        <a class="collapse-item" href="<?php echo site_url('pembelian') ?>">Request Purchase</a>
                        <a class="collapse-item" href="<?php echo site_url('penerimaan') ?>">Goods Receipt</a>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </li>

        <?php if ($this->session->userdata('role') == 'sdr_Kepala Bagian') { ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-laporan"
                    aria-expanded="false" aria-controls="collapsePages" onclick="toggleDropdown('collapse-laporan')">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapse-laporan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="#">Laporan Sundries</a>
                        <a class="collapse-item" href="#">Laporan Consumption</a>
                        <a class="collapse-item" href="#">Laporan Purchase</a>
                    </div>
                </div>
            </li>
        <?php } ?>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-fw fa-table"></i>
                <span>Log Out</span>
            </a>
        </li>

        <!-- Sidebar Toogler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End Sidebar -->

    <!-- Start Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        Yakin Ingin Keluar Aplikasi ?
                    </h5>
                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">Tutup</span>
                    </button>
                </div>
                <div class="modal-body">Pilih Logout Untuk Keluar Aplikasi</div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-success" type="button" data-dismiss="modal">
                        Batal
                    </button>
                    <a class="btn btn-sm btn-danger" href="<?php echo site_url('logout') ?>">
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Logout Modal -->

    <!-- JavaScript untuk mengatur dropdown -->
    <script>
        function toggleDropdown(collapseId) {
            var $collapse = $('#' + collapseId);
            var isOpen = $collapse.hasClass('show');

            if (!isOpen) {
                // Jika dropdown tidak terbuka, buka dropdown
                $collapse.collapse('show');
            } else {
                // Jika dropdown terbuka, tutup dropdown
                $collapse.collapse('hide');
            }
        }

        // Hapus kelas 'show' saat halaman berubah
        $(document).ready(function () {
            $(window).on('beforeunload', function () {
                // Cari elemen dengan kelas 'show' pada sidebar
                var $activeDropdown = $('.navbar-nav .show');
                // Hapus kelas 'show' pada elemen tersebut
                $activeDropdown.removeClass('show');
            });

            // Tandai elemen navigasi yang sesuai dengan halaman aktif
            var activeSegment = "<?php echo $this->uri->segment(1); ?>";
            var $activeNavItem = $('.navbar-nav .nav-item');
            $activeNavItem.removeClass('active');
            $activeNavItem.each(function () {
                var href = $(this).find('a').attr('href');
                var segment = href.substr(href.lastIndexOf('/') + 1);
                if (segment === activeSegment || (activeSegment === '' && href === '<?php echo site_url(); ?>')) {
                    $(this).addClass('active');
                    return false;
                }
            });
        });
    </script>

</body>

</html>