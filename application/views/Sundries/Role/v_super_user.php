<ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Start Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url() ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> DNP - HIS <!--<sup>2</sup> --></div>
    </a>
    <!-- End Sidebar - Brand -->

    <!-- Start SUPERUSER -->
    <?php if ($this->session->userdata('role') == 'super_user') { ?>
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Start Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="<?php echo site_url() ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Super User</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        <!-- End Nav Item - Dashboard -->

        <!-- Start Nav Item - Tables -->
        <li class="nav-item <?php if ($menu == 'user') {
                                echo 'active';
                            } ?>">
            <a class="nav-link" href="<?php echo site_url("data-user") ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Data User Account</span></a>
        </li>

        <li class="nav-item <?php if ($menu == 'karyawan' or $menu == 'divisi' or $menu == 'departemen' or $menu == 'section' or $menu == 'shift' or $menu == 'golongan' or $menu == 'jabatan' or $menu == 'karyawan_out' or $menu == 'karyawan_temp' or $menu == 'karyawan_out_temp') {
                                echo 'active';
                            } ?>">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages_personal" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Personal Data</span>
            </a>
            <div id="collapsePages_personal" class="collapse <?php if ($menu == 'karyawan' or $menu == 'departemen' or $menu == 'divisi' or $menu == 'section' or $menu == 'shift' or $menu == 'golongan' or $menu == 'jabatan' or $menu == 'karyawan_out' or $menu == 'karyawan_temp' or $menu == 'karyawan_out_temp') {
                                                                    echo 'show';
                                                                } ?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">

                    <a class="collapse-item <?php if ($menu == 'karyawan') {
                                                echo 'active';
                                            } ?>" href="<?php echo site_url("data-karyawan") ?>">Daftar Karyawan</a>
                    <a class="collapse-item <?php if ($menu == 'karyawan_out') {
                                                echo 'active';
                                            } ?>" href="<?php echo site_url("data-karyawan-keluar") ?>">Daftar Karyawan Keluar</a>
                    <a class="collapse-item <?php if ($menu == 'karyawan_temp') {
                                                echo 'active';
                                            } ?>" href="<?php echo site_url("data-karyawan-training-dan-percobaan") ?>">Karyawan Training & <br>Percobaan</a>
                    <a class="collapse-item <?php if ($menu == 'karyawan_out_temp') {
                                                echo 'active';
                                            } ?>" href="<?php echo site_url("data-karyawan-training-dan-percobaan-keluar") ?>">Karyawan Training & <br>Percobaan Keluar</a>
                    <a class="collapse-item <?php if ($menu == 'divisi') {
                                                echo 'active';
                                            } ?>" href="<?php echo site_url("daftar-divisi") ?>">Daftar Divisi</a>
                    <a class="collapse-item <?php if ($menu == 'departemen') {
                                                echo 'active';
                                            } ?>" href="<?php echo site_url("daftar-departemen") ?>">Daftar Departemen</a>
                    <a class="collapse-item <?php if ($menu == 'section') {
                                                echo 'active';
                                            } ?>" href="<?php echo site_url("daftar-section") ?>">Daftar Section</a>
                    <a class="collapse-item <?php if ($menu == 'shift') {
                                                echo 'active';
                                            } ?>" href="<?php echo site_url("daftar-shift") ?>">Daftar Shift</a>
                    <a class="collapse-item <?php if ($menu == 'jabatan') {
                                                echo 'active';
                                            } ?>" href="<?php echo site_url("daftar-jabatan") ?>">Daftar Jabatan</a>
                    <a class="collapse-item <?php if ($menu == 'golongan') {
                                                echo 'active';
                                            } ?>" href="<?php echo site_url("daftar-golongan") ?>">Daftar Golongan</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#mastersundriesmenu" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Sundries Master</span>
            </a>
            <div id="mastersundriesmenu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="<?php echo site_url("Master-Sundries/Barang") ?>">Barang</a>
                        <a class="collapse-item" href="<?php echo site_url("Master-Sundries/Jenis") ?>">Jenis</a>
                        <a class="collapse-item" href="<?php echo site_url("Master-Sundries/Kategori") ?>">Kategori</a>
                    </div>
                </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-transaksi" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Transaksi Sundries</span>
            </a>
            <div id="collapse-transaksi" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?php echo site_url("transaksi-sundries/pembuatan-estimasi") ?>">Pembuatan Estimasi</a>
                    <a class="collapse-item" href="<?php echo site_url("transaksi-sundries/request-consumption") ?>">Request Consumption</a>
                    <a class="collapse-item" href="<?php echo site_url("transaksi-sundries/request-sundries") ?>">Request Sundries</a>
                    <a class="collapse-item" href="#">Request Purchase</a>
                    <a class="collapse-item" href="#">Penerimaan Barang</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-laporan" aria-expanded="true" aria-controls="collapsePages">
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
        <!-- End Nav Item - Tables -->

    <?php } ?>
    <!-- End SUPERUSER -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Start Nav Item - Tables -->
    <!-- <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('logout') ?>" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-fw fa-table"></i>
            <span>Log Out</span></a>
    </li> -->
    <!-- End Nav Item - Tables -->

    <!-- Start Sidebar Toogle -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
    <!-- End Sidebar Toogle -->

</ul>