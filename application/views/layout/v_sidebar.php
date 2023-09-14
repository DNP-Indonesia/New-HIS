<!-- Start Sidebar -->
<ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url(); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> DNP - HIS</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo site_url(); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Start Nav Item - Sidebar -->
    <?php if ($this->session->userdata('role') == 'super_user') { ?>
    <li class="nav-item <?php if (isset($menu) && $menu == 'user') {
        echo 'active';
    } ?>">
        <a class="nav-link" href="<?php echo site_url('data-user'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Data User Account</span>
        </a>
    </li>

    <li class="nav-item <?php if (isset($menu) && in_array($menu, ['karyawan', 'divisi', 'departemen', 'section', 'shift', 'golongan', 'jabatan', 'karyawan_out', 'karyawan_temp', 'karyawan_out_temp', 'mutasi'])) {
        echo 'active';
    } ?>">
        <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages_personal"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Personal Data</span>
        </a> -->
        <div id="collapsePages_personal" class="collapse <?php if (isset($menu) && in_array($menu, ['karyawan', 'departemen', 'divisi', 'section', 'shift', 'golongan', 'jabatan', 'karyawan_out', 'karyawan_temp', 'karyawan_out_temp', 'mutasi'])) {
            echo 'show';
        } ?>" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php if ($menu == 'karyawan') {
                    echo 'active';
                } ?>" href="<?php echo site_url('page_his/karyawan'); ?>">Daftar Karyawan</a>
                <a class="collapse-item <?php if ($menu == 'karyawan_out') {
                    echo 'active';
                } ?>" href="<?php echo site_url('page_his/karyawan_out'); ?>">Daftar Karyawan Keluar</a>
                <a class="collapse-item <?php if ($menu == 'karyawan_temp') {
                    echo 'active';
                } ?>" href="<?php echo site_url('page_his/karyawan_temp'); ?>">Karyawan Training & <br>
                    Percobaan</a>
                <a class="collapse-item <?php if ($menu == 'karyawan_out_temp') {
                    echo 'active';
                } ?>" href="<?php echo site_url('page_his/karyawan_out_temp'); ?>">Karyawan Training & <br>
                    Percobaan Keluar</a>
                <a class="collapse-item <?php if ($menu == 'divisi') {
                    echo 'active';
                } ?>" href="<?php echo site_url('page_his/divisi'); ?>">Daftar Divisi</a>
                <a class="collapse-item <?php if ($menu == 'mutasi') {
                    echo 'active';
                } ?>" href="<?php echo site_url('page_his/karyawan_mutasi'); ?>">Log Karyawan Mutasi</a>
                <a class="collapse-item <?php if ($menu == 'departemen') {
                    echo 'active';
                } ?>" href="<?php echo site_url('page_his/departemen'); ?>">Daftar Departemen</a>
                <a class="collapse-item <?php if ($menu == 'section') {
                    echo 'active';
                } ?>" href="<?php echo site_url('page_his/section'); ?>">Daftar Section</a>
                <a class="collapse-item <?php if ($menu == 'shift') {
                    echo 'active';
                } ?>" href="<?php echo site_url('page_his/shift'); ?>">Daftar Shift</a>
                <a class="collapse-item <?php if ($menu == 'jabatan') {
                    echo 'active';
                } ?>" href="<?php echo site_url('page_his/jabatan'); ?>">Daftar Jabatan</a>
                <a class="collapse-item <?php if ($menu == 'golongan') {
                    echo 'active';
                } ?>" href="<?php echo site_url('page_his/golongan'); ?>">Daftar Golongan</a>
            </div>
        </div>
    </li>

    <li class="nav-item <?php if (isset($menu) && in_array($menu, ['kategori', 'jenis', 'barang'])) {
        echo 'active';
    } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-master"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Master Sundries</span>
        </a>
        <div id="collapse-master" class="collapse <?php if (isset($menu) && in_array($menu, ['kategori', 'jenis', 'barang'])) {
            echo 'show';
        } ?>" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php if ($menu == 'kategori') {
                    echo 'active';
                } ?>" href="<?php echo site_url('kategori'); ?>">Kategori</a>
                <a class="collapse-item <?php if ($menu == 'jenis') {
                    echo 'active';
                } ?>" href="<?php echo site_url('jenis'); ?>">Jenis</a>
                <a class="collapse-item <?php if ($menu == 'barang') {
                    echo 'active';
                } ?>" href="<?php echo site_url('barang'); ?>">Barang</a>
            </div>
        </div>
    </li>

    <li class="nav-item <?php if (isset($menu) && in_array($menu, ['estimasi', 'konsumsi', 'permintaan', 'pembelian', 'penerimaan'])) {
        echo 'active';
    } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-transaksi"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Transaksi Sundries</span>
        </a>
        <div id="collapse-transaksi" class="collapse  <?php if (isset($menu) && in_array($menu, ['estimasi', 'konsumsi', 'permintaan', 'pembelian', 'penerimaan'])) {
            echo 'show';
        } ?>" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php if ($menu == 'permintaan') {
                    echo 'active';
                } ?>" href="<?php echo site_url('permintaan'); ?>">
                    Request Sundries
                </a>
                <a class="collapse-item <?php if ($menu == 'estimasi') {
                    echo 'active';
                } ?>" href="<?php echo site_url('estimasi'); ?>">
                    Estimation Making
                </a>
                <a class="collapse-item <?php if ($menu == 'konsumsi') {
                    echo 'active';
                } ?>" href="<?php echo site_url('konsumsi'); ?>">
                    Request Consumption
                </a>
                <a class="collapse-item <?php if ($menu == 'pembelian') {
                    echo 'active';
                } ?>" href="<?php echo site_url('pembelian'); ?>">
                    Request Purchase
                </a>
                <a class="collapse-item <?php if ($menu == 'penerimaan') {
                    echo 'active';
                } ?>" href="<?php echo site_url('penerimaan'); ?>">
                    Goods Receipt
                </a>
            </div>
        </div>
    </li>

    <!-- <li class="nav-item">
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
    </li> -->

    <?php } elseif ($this->session->userdata('role') == 'sdr_Admin Bagian' || $this->session->userdata('role') == 'sdr_Kepala Bagian') { ?>

    <li class="nav-item <?php if (isset($menu) && in_array($menu, ['estimasi', 'konsumsi', 'permintaan', 'pembelian', 'penerimaan'])) {
        echo 'active';
    } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-transaksi"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Transaksi Sundries</span>
        </a>
        <div id="collapse-transaksi" class="collapse  <?php if (isset($menu) && in_array($menu, ['estimasi', 'konsumsi', 'permintaan', 'pembelian', 'penerimaan'])) {
            echo 'show';
        } ?>" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php if ($menu == 'permintaan') {
                    echo 'active';
                } ?>" href="<?php echo site_url('permintaan'); ?>">
                    Request Sundries
                </a>
                <a class="collapse-item <?php if ($menu == 'estimasi') {
                    echo 'active';
                } ?>" href="<?php echo site_url('estimasi'); ?>">
                    Estimation Making
                </a>
                <a class="collapse-item <?php if ($menu == 'konsumsi') {
                    echo 'active';
                } ?>" href="<?php echo site_url('konsumsi'); ?>">
                    Request Consumption
                </a>
            </div>
        </div>
    </li>

    <!-- </?php if ($this->session->userdata('role') == 'sdr_Kepala Bagian') { ?>
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
    </?php } ?> -->

    <?php } elseif ($this->session->userdata('role') == 'sdr_Admin Gudang' || $this->session->userdata('role') == 'sdr_Kepala Gudang') { ?>

    <li class="nav-item <?php if (isset($menu) && in_array($menu, ['estimasi', 'konsumsi', 'permintaan', 'pembelian', 'penerimaan'])) {
        echo 'active';
    } ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-transaksi"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Transaksi Sundries</span>
        </a>
        <div id="collapse-transaksi" class="collapse  <?php if (isset($menu) && in_array($menu, ['estimasi', 'konsumsi', 'permintaan', 'pembelian', 'penerimaan'])) {
            echo 'show';
        } ?>" aria-labelledby="headingPages"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item <?php if ($menu == 'permintaan') {
                    echo 'active';
                } ?>" href="<?php echo site_url('permintaan'); ?>">
                    Request Sundries
                </a>
                <a class="collapse-item <?php if ($menu == 'pembelian') {
                    echo 'active';
                } ?>" href="<?php echo site_url('pembelian'); ?>">
                    Request Purchase
                </a>
                <a class="collapse-item <?php if ($menu == 'penerimaan') {
                    echo 'active';
                } ?>" href="<?php echo site_url('penerimaan'); ?>">
                    Goods Receipt
                </a>
            </div>
        </div>
    </li>

    <?php } ?>



    <!-- End Nav Item - Sidebar -->

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
                <a class="btn btn-sm btn-danger" href="<?php echo site_url('logout'); ?>">
                    Logout
                </a>
            </div>
        </div>
    </div>
</div>
<!-- End Logout Modal -->
