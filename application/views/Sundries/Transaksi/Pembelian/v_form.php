                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <h5>Form Request Purchase</h5>
                        <a href="<?= site_url('pembelian') ?>" class="btn btn-sm btn-secondary mb-2">Kembali</a>
                        <?php
                            if ($this->session->userdata('role')=='super_user') {
                        ?>

                        <?php } ?>

                        <?php
                            if ($this->session->userdata('role')=='sdr_Admin Gudang') {
                        ?>
                        <?php if ($this->session->userdata('hapus')) { ?>
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <?php echo $this->session->userdata('hapus'); ?>
                            <?php echo $this->session->set_userdata('hapus', null); ?>
                        </div>
                        <?php }?>
                        <?php if ($this->session->userdata('sukses')) { ?>
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <?php echo $this->session->userdata('sukses'); ?>
                            <?php echo $this->session->set_userdata('sukses', null); ?>
                        </div>
                        <?php }?>
                        <?php if ($this->session->userdata('addbarang')) { ?>
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <?php echo $this->session->userdata('addbarang'); ?>
                            <?php echo $this->session->set_userdata('addbarang', null); ?>
                        </div>
                        <?php }?>
                        <?php if ($this->session->userdata('requlang')) { ?>
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <?php echo $this->session->userdata('requlang'); ?>
                            <?php echo $this->session->set_userdata('requlang', null); ?>
                        </div>
                        <?php }?>
                        <?php if ($this->session->userdata('update')) { ?>
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <?php echo $this->session->userdata('update'); ?>
                            <?php echo $this->session->set_userdata('update', null); ?>
                        </div>
                        <?php }?>
                        <form action="<?= site_url('addkeranjangpembelian') ?>" method="POST">
                            <div class="card shadow mb-3">
                                <div class="card-header">
                                    <h5>Keranjang</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label>Klik Tombol Dibawah Untuk Pilih Barang</label><br>
                                            <a href="<?php echo site_url(''); ?>" class="btn btn-sm btn-purple"
                                                data-toggle="modal" data-target="#modal-barang">Pilih Barang</a>
                                        </div>
                                        <!-- <div class="col-md-4 mb-3">
                                            <label>Pilih Barang</label><br>
                                            <select class="form-control yoi" id="id_barang">
                                                <option value="" disabled selected>Pilih Estimasi</option>
                                                <?php foreach ($barang as $tempel) { ?>
                                                <option value="<?php echo $tempel->id_barang; ?>">
                                                    <?php echo $tempel->faktur; ?>
                                                </option>
                                                <?php } ?>
                                            </select>
                                        </div> -->
                                        <div class="col-md-4 mb-3">
                                            <label>Barang</label>
                                            <input type="text" class="form-control" id="barang" readonly>
                                            <input type="text" id="id_barang" name="id_barang" readonly hidden>
                                            <input type="text" id="faktur" name="faktur" readonly hidden>
                                            <input type="text" id="stkeranjang" name="stkeranjang" value="ya"
                                                hidden>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Brand</label>
                                            <input type="text" class="form-control" id="brand" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label>Type</label>
                                            <input type="text" class="form-control" id="type" readonly>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Ukuran</label>
                                            <input type="text" class="form-control" id="ukuran" readonly>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Satuan</label>
                                            <input type="text" class="form-control" id="satuan" readonly>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-4 mb-3">
                                            <label>Jumlah</label>
                                            <input type="number" class="form-control" name="jumlah" id="jumlah"
                                                readonly>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Catatan Khusus</label>
                                            <input type="text" class="form-control" name="catatan" id="catatan"
                                                readonly>
                                            <input type="text" id="id_user" name="id_user"
                                                value=" <?php echo $this->session->userdata('id_user'); ?>" hidden>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label>Klik Untuk Masukkan Ke Keranjang</label>
                                            <br>
                                            <button type="submit" class="btn btn-sm btn-info">Tambahkan Ke
                                                Keranjang</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="form-row">
                                        <div class="col-md-12">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless small">
                                                            <thead>
                                                                <tr>
                                                                    <th>No</th>
                                                                    <th>Faktur Sundries</th>
                                                                    <th>Barang</th>
                                                                    <th>Brand</th>
                                                                    <th>Type</th>
                                                                    <th>Ukuran</th>
                                                                    <th>Satuan</th>
                                                                    <th>Jumlah</th>
                                                                    <th>Catatan</th>
                                                                    <th>Opsi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $no = 1; foreach($keranjang as $tempel) { ?>
                                                                <tr>
                                                                    <td><?php echo $no; ?></td>
                                                                    <td><?php echo $tempel->faktursundries; ?></td>
                                                                    <td><?php echo $tempel->barang; ?></td>
                                                                    <td><?php echo $tempel->brand; ?></td>
                                                                    <td><?php echo $tempel->type; ?></td>
                                                                    <td><?php echo $tempel->ukuran; ?></td>
                                                                    <td><?php echo $tempel->satuan; ?></td>
                                                                    <td><?php echo $tempel->jumlah; ?></td>
                                                                    <td><?php echo $tempel->keterangan; ?></td>
                                                                    <td>
                                                                        <a href="#" class="btn btn-sm btn-danger"
                                                                            onclick="deleteConfirm('<?php echo site_url('deletekeranjangpembelian' . $tempel->id_barang); ?>')">
                                                                            Hapus Dari Keranjang
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <?php $no++; } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form action="<?= site_url('addpembelian') ?>" method="POST">
                            <div class="card shadow mb-3">
                                <div class="card-header">
                                    <h5>Form Request Purchase</h5>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col-md-3 mb-3">
                                            <label>Faktur</label>
                                            <input type="text" class="form-control" value="<?= $fakturotomatis ?>"
                                                name="faktur" required readonly>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Tanggal</label>
                                            <input type="text" class="form-control" value="<?= date('Y-m-d') ?>"
                                                name="tanggal" required readonly>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Jam</label>
                                            <input type="text" class="form-control" value="<?php date_default_timezone_set('Asia/Jakarta');
                                            echo date('H:i'); ?>"
                                                name="jam" required readonly>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label>Direquest Oleh</label>
                                            <input type="text" class="form-control" name="nama" required
                                                value="<?php echo $this->session->userdata('nama'); ?>" readonly>

                                            <input type="text" id="id_user" name="id_user"
                                                value=" <?php echo $this->session->userdata('id_user'); ?>" hidden>

                                            <input type="text" class="form-control" value="Request"
                                                name="status" hidden>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Buat
                                    </button>
                                </div>
                            </div>
                        </form>
                        <?php } ?>
                    </div>

                    <!-- Scroll to Top Button-->
                    <a class="scroll-to-top rounded" href="#page-top">
                        <i class="fas fa-angle-up"></i>
                    </a>

                    <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        Yakin Ingin Keluar Aplikasi ?
                                    </h5>
                                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal"
                                        aria-label="Close">
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

                    <div class="modal fade" id="modal-hapus" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Yakin ?</h5>
                                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">Tutup</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Barang Akan Dihapus Dari Keranjang....
                                </div>
                                <div class="modal-footer">
                                    <button class="btn-sm btn btn-success" type="button" data-dismiss="modal">
                                        Batal
                                    </button>
                                    <a id="tombolhapus" class="btn-sm btn btn-danger" href="#">
                                        Hapus Dari Keranjang
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="modal-barang" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Data Barang Request</h5>
                                    <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">
                                        Tutup
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="col-md-12 mb-3">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless small">
                                                            <thead>
                                                                <tr>
                                                                    <th>Faktur</th>
                                                                    <th>Peminta</th>
                                                                    <th>Barang</th>
                                                                    <th>Brand</th>
                                                                    <th>Type</th>
                                                                    <th>Ukuran</th>
                                                                    <th>Satuan</th>
                                                                    <th>Jumlah</th>
                                                                    <th>Catatan</th>
                                                                    <th>Opsi</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                        foreach($permintaanbarang as $tempel){
                                                    ?>
                                                                <tr>
                                                                    <td><?php echo $tempel->faktur; ?></td>
                                                                    <td><?php echo $tempel->nama_peminta; ?></td>
                                                                    <td><?php echo $tempel->barang; ?></td>
                                                                    <td><?php echo $tempel->brand; ?></td>
                                                                    <td><?php echo $tempel->type; ?></td>
                                                                    <td><?php echo $tempel->ukuran; ?></td>
                                                                    <td><?php echo $tempel->satuan; ?></td>
                                                                    <td><?php echo $tempel->jumlah; ?></td>
                                                                    <td><?php echo $tempel->keterangan; ?></td>
                                                                    <td>
                                                                        <a href="#"
                                                                            class="btn btn-sm btn-success pilihbarang"
                                                                            dataidbarang="<?php echo $tempel->id_barang; ?>"
                                                                            datafaktur="<?php echo $tempel->faktur; ?>"
                                                                            databarang="<?php echo $tempel->barang; ?>"
                                                                            databrand="<?php echo $tempel->brand; ?>"
                                                                            datatype="<?php echo $tempel->type; ?>"
                                                                            dataukuran="<?php echo $tempel->ukuran; ?>"
                                                                            datasatuan="<?php echo $tempel->satuan; ?>"
                                                                            datajumlah="<?php echo $tempel->jumlah; ?>"
                                                                            datacatatan="<?php echo $tempel->keterangan; ?>"
                                                                            datastkeranjang="<?php echo $tempel->statuskeranjang; ?>">
                                                                            Pilih
                                                                        </a>
                                                                    </td>
                                                                </tr>
                                                                <?php }?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bootstrap core JavaScript-->
                    <script src="<?php echo base_url(); ?>bootstrap/vendor/jquery/jquery.min.js"></script>
                    <script src="<?php echo base_url(); ?>bootstrap/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <!-- Core plugin JavaScript-->
                    <script src="<?php echo base_url(); ?>bootstrap/vendor/jquery-easing/jquery.easing.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

                    <!-- Custom scripts for all pages-->
                    <script src="<?php echo base_url(); ?>bootstrap/js/sb-admin-2.min.js"></script>

                    <!-- Page level plugins -->
                    <script src="<?php echo base_url(); ?>bootstrap/vendor/datatables/jquery.dataTables.min.js"></script>
                    <script src="<?php echo base_url(); ?>bootstrap/vendor/datatables/dataTables.bootstrap4.min.js"></script>

                    <!-- Page level custom scripts -->
                    <script src="<?php echo base_url(); ?>bootstrap/js/demo/datatables-demo.js"></script>

                    <script type="text/javascript" src="<?php echo base_url(); ?>bootstrap/datepicker/js/bootstrap-datepicker.min.js"></script>

                    <script>
                        //loaddatabarang();
                        $(document).ready(function() {
                            $('.tbl').DataTable();
                        });

                        function deleteConfirm(url) {
                            $('#tombolhapus').attr('href', url);
                            $('#modal-hapus').modal();
                        }
                        // function loaddatabarang(){
                        //     $.ajax({
                        //         type:'POST',
                        //         url: "<?= site_url('Sundries/purchasecontroller/showkeranjang') ?>",
                        //         cache:false,
                        //         success:function(respond){
                        //             $('#isikeranjang').html(respond);
                        //         }
                        //     });
                        // }

                        // $("#keranjang").click(function(){
                        //      var id_barang = $('#id_barang').val();
                        //      var qty       = $('#jumlah').val();
                        //      var catatan   = $('#catatan').val();
                        //      var faktur   = $('#faktur').val();
                        //      var id_user   = $('#id_user').val();
                        //      var stkeranjang   = $('#stkeranjang').val();

                        //      if (id_barang == 0){
                        //          Swal.fire("Barang Belum Dipilih... !", "Pilih Dahulu...", "warning");
                        //      }else if (qty == "" || qty == 0){
                        //          Swal.fire("Jumlah Barang Kosong...", "Isikan Dahulu....", "warning");
                        //      }else{
                        //          $.ajax({
                        //              type:'POST',
                        //              url:"<?= site_url('Sundries/purchasecontroller/addkeranjang') ?>",
                        //              data :{
                        //                  idbarang : id_barang,
                        //                  qty : qty,
                        //                  faktur : faktur,
                        //                  catatan : catatan,
                        //                  id_user : id_user,
                        //                  stkeranjang : stkeranjang
                        //              },
                        //              cache: false,
                        //              success: function(response){
                        //                  loaddatabarang();
                        //              }
                        //          }); 
                        //      } 
                        //  });

                        $(".pilihbarang").click(function() {
                            var idbarang = $(this).attr("dataidbarang");
                            var faktur = $(this).attr("datafaktur");
                            var barang = $(this).attr("databarang");
                            var brand = $(this).attr("databrand");
                            var type = $(this).attr("datatype");
                            var ukuran = $(this).attr("dataukuran");
                            var satuan = $(this).attr("datasatuan");
                            var jumlah = $(this).attr("datajumlah");
                            var catatan = $(this).attr("datacatatan");
                            $("#id_barang").val(idbarang);
                            $("#faktur").val(faktur);
                            $("#barang").val(barang);
                            $("#brand").val(brand);
                            $("#type").val(type);
                            $("#ukuran").val(ukuran);
                            $("#satuan").val(satuan);
                            $("#jumlah").val(jumlah);
                            $("#catatan").val(catatan);
                            $("#modal-barang").modal("hide");
                        });
                    </script>
                    </body>

                    </html>
