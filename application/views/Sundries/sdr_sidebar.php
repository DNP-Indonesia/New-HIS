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
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Transaksi Sundries</span>
        </a>
        <div id="collapse-transaksi" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <?php
                // Cek apakah peran pengguna termasuk dalam 'sdr_Admin Bagian' atau 'sdr_Kepala Bagian'
                if ($this->session->userdata('role') == 'sdr_Admin Bagian' || $this->session->userdata('role') == 'sdr_Kepala Bagian') {
                    ?>
                    <a class="collapse-item" href="<?php echo site_url('estimasi') ?>">
                        Pembuatan Estimasi
                    </a>
                    <a class="collapse-item" href="<?php echo site_url('konsumsi') ?>">
                        Request Consumption
                    </a>
                    <?php
                }
                ?>
                <a class="collapse-item" href="<?php echo site_url('permintaan') ?>">
                    Request Sundries
                </a>
                <?php
                // Cek apakah peran pengguna termasuk dalam 'sdr_Admin Gudang' atau 'sdr_Kepala Gudang'
                if ($this->session->userdata('role') == 'sdr_Admin Gudang' || $this->session->userdata('role') == 'sdr_Kepala Gudang') {
                    ?>
                    <a class="collapse-item" href="<?php echo site_url('pembelian') ?>">
                        Request Purchase
                    </a>
                    <a class="collapse-item" href="<?php echo site_url('penerimaan') ?>">
                        Penerimaan Barang
                    </a>
                    <?php
                }
                ?>
            </div>
        </div>
    </li>
    <?php if ($this->session->userdata('role') == 'sdr_Kepala Bagian') { ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-laporan"
                aria-expanded="true" aria-controls="collapsePages">
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

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url() ?>bootstrap/vendor/jquery/jquery.min.js"></script>

<script src="<?php echo base_url() ?>bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url() ?>bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url() ?>bootstrap/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url() ?>bootstrap/vendor/datatables/jquery.dataTables.min.js"></script>

<script src="<?php echo base_url() ?>bootstrap/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url() ?>bootstrap/js/demo/datatables-demo.js"></script>

<script type="text/javascript"
    src="<?php echo base_url() ?>bootstrap/datepicker/js/bootstrap-datepicker.min.js"></script>

<script>
    $(document).ready(function () {
        $('.table').DataTable();
    });
</script>