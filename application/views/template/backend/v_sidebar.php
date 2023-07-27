        <ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url() ?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> DNP - HIS <!--<sup>2</sup> --></div>
            </a>

            
        <!-- ============================== SUPERUSER ============================== -->
            <!-- Divider -->
            <?php if($this->session->userdata('role') == 'super_user'){?>
                <hr class="sidebar-divider my-0">
                <!-- Nav Item - Dashboard -->
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo site_url() ?>">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Super User</span>
                    </a>
                </li>
                <hr class="sidebar-divider">

                <!-- Nav Item - Tables -->
                <li class="nav-item <?php if ($menu == 'user'){echo 'active';}?>">
                    <a class="nav-link" href="<?php echo site_url("page_his/user") ?>">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Data User Account</span></a>
                </li>

                <li class="nav-item <?php if ($menu == 'karyawan' OR $menu == 'divisi' OR $menu == 'departemen' OR $menu == 'section' OR $menu == 'shift' OR $menu == 'golongan' OR $menu == 'jabatan' OR $menu == 'karyawan_out' OR $menu == 'karyawan_temp' OR $menu == 'karyawan_out_temp'){echo 'active';}?>">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages_personal"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Personal Data</span>
                    </a>
                    <div id="collapsePages_personal" class="collapse <?php if ($menu == 'karyawan' OR $menu == 'departemen' OR $menu == 'divisi' OR $menu == 'section' OR $menu == 'shift' OR $menu == 'golongan' OR $menu == 'jabatan' OR $menu == 'karyawan_out' OR $menu == 'karyawan_temp' OR $menu == 'karyawan_out_temp'){echo 'show';}?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            
                            <a class="collapse-item <?php if ($menu == 'karyawan'){echo 'active';}?>" href="<?php echo site_url("page_his/karyawan") ?>">Daftar Karyawan</a>
                            <a class="collapse-item <?php if ($menu == 'karyawan_out'){echo 'active';}?>" href="<?php echo site_url("page_his/karyawan_out") ?>">Daftar Karyawan Keluar</a>
                            <a class="collapse-item <?php if ($menu == 'karyawan_temp'){echo 'active';}?>" href="<?php echo site_url("page_his/karyawan_temp") ?>">Karyawan Training & <br>Percobaan</a>
                            <a class="collapse-item <?php if ($menu == 'karyawan_out_temp'){echo 'active';}?>" href="<?php echo site_url("page_his/karyawan_out_temp") ?>">Karyawan Training & <br>Percobaan Keluar</a>
                            <a class="collapse-item <?php if ($menu == 'divisi'){echo 'active';}?>" href="<?php echo site_url("page_his/divisi") ?>">Daftar Divisi</a>
                            <a class="collapse-item <?php if ($menu == 'departemen'){echo 'active';}?>" href="<?php echo site_url("page_his/departemen") ?>">Daftar Departemen</a>
                            <a class="collapse-item <?php if ($menu == 'section'){echo 'active';}?>" href="<?php echo site_url("page_his/section") ?>">Daftar Section</a>
                            <a class="collapse-item <?php if ($menu == 'shift'){echo 'active';}?>" href="<?php echo site_url("page_his/shift") ?>">Daftar Shift</a>
                            <a class="collapse-item <?php if ($menu == 'jabatan'){echo 'active';}?>" href="<?php echo site_url("page_his/jabatan") ?>">Daftar Jabatan</a>
                            <a class="collapse-item <?php if ($menu == 'golongan'){echo 'active';}?>" href="<?php echo site_url("page_his/golongan") ?>">Daftar Golongan</a>
                            
                        </div>
                    </div>
                </li>
                


                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#mastersundriesmenu"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Sundries Master</span>
                    </a>
                    <div id="mastersundriesmenu" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?php echo site_url("Sundries/kategoricontroller/kategoripage") ?>">Kategori</a>
                            <a class="collapse-item" href="<?php echo site_url("Sundries/jeniscontroller/jenispage") ?>">Jenis</a>
                            <a class="collapse-item" href="<?php echo site_url("Sundries/barangcontroller/barangpage") ?>">Barang</a>
                            
                        </div>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-transaksi"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="fas fa-fw fa-folder"></i>
                        <span>Transaksi Sundries</span>
                    </a>
                    <div id="collapse-transaksi" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="<?php echo site_url("Sundries/estimasicontroller/estimasipage") ?>">Pembuata Estimasi</a>
                            <a class="collapse-item" href="<?php echo site_url("Sundries/requestsundriescontroller/requestsundriespage") ?>">Request Sundries</a>
                            <a class="collapse-item" href="<?php echo site_url("Sundries/consumptioncontroller/consumptionpage") ?>">Request Consumption</a>
                            <a class="collapse-item" href="#">Request Purchase</a>
                        </div>
                    </div>
                </li>

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
        <!-- ============================== \SUPERUSER ============================== -->

        <?php if($this->session->userdata('role') == 'admin_medical' OR substr($this->session->userdata('role'),0,-2) == 'medical'){?>
        <!-- ============================== ADMIN MEDICAL & USER MEDICAL ============================== -->
        <?php $this->load->view('medical/side_medical/admin_medical');  ?>
        <!-- ============================== \ADMIN MEDICAL & USER MEDICAL ============================== -->
        <?php } ?>

        <?php if(substr($this->session->userdata('role'),0,-2) == 'tk'){?>
        <!-- ============================== TRAINING KAIZEN ============================== -->
        <?php $this->load->view('tk/side_tk/tk');  ?>
        <!-- ============================== \TRAINING KAIZEN ============================== -->
        <?php } ?>

        <!-- ============================== sdr admin bagian ============================== -->
        <?php if ($this->session->userdata('role')=='sdr_Admin Bagian'){?>
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
                            <?php if ($this->session->userdata('role') != 'sdr_Admin Gudang' AND $this->session->userdata('role') != 'sdr_Kepala Gudang') {?>
                                <a class="collapse-item" href="<?= base_url('Sundries/estimasicontroller/estimasipage') ?>">
                                    Pembuatan Estimasi
                                </a>
                                <a class="collapse-item" href="<?= base_url('Sundries/consumptioncontroller/consumptionpage') ?>">
                                    Request Consumption
                                </a>
                            <?php } ?>
                            <a class="collapse-item" href="<?= base_url('Sundries/requestsundriescontroller/requestsundriespage') ?>">
                                Request Sundries
                            </a>
                            <?php if ($this->session->userdata('role') != 'sdr_Admin Bagian' AND $this->session->userdata('role') != 'sdr_Kepala Bagian') {?>
                                <a class="collapse-item" href="<?= base_url('Sundries/purchasecontroller/purchasepage') ?>">
                                    Request Purchase
                                </a>
                                <a href="<?= base_url('Sundries/penerimaancontroller/penerimaanpage') ?>" class="collapse-item">
                                    Penerimaan Barang
                                </a>
                            <?php } ?> 
                        </div>
                    </div>
                </li> 
        <?php } ?>    
        <!-- ============================== /sdr admin bagian ============================== -->




            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Log Out</span></a>
            </li>


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->

        </ul>