<!-- Begin Page Content -->
<div class="container-fluid">
    <h4>Request Purchase</h4>
    <?php
    if ($this->session->userdata('role') == 'sdr_Kepala Gudang') {
        ?>
    <?php if ($this->session->userdata('tolak')) { ?>
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <?php echo $this->session->userdata('tolak'); ?>
        <?php echo $this->session->set_userdata('tolak', null); ?>
    </div>
    <?php } ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-success">
                Buat Baru
            </h6>
        </div>
        <div class="table-responsive-xl">
            <table class="table table-borderless small tbl">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Faktur</th>
                        <th class="text-center">Dibuat Tanggal</th>
                        <th class="text-center">Dibuat Jam</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($pembelian as $tempel) {
                            ?>
                    <tr>
                        <td class="text-center">
                            <?php echo $no; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $tempel->faktur; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $tempel->tanggal; ?>
                        </td>
                        <td class="text-center">
                            <?php echo $tempel->jamdibuat; ?>
                        </td>
                        <td class="text-center">
                            <?php if ($tempel->status == 'Request') { ?>
                            <h6>
                                <span class="badge badge-warning">
                                    <?php echo $tempel->status; ?>
                                </span>
                            </h6>
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <a href="<?php echo site_url('detailpembelian/' . $tempel->faktur); ?>" class="btn btn-sm btn-purple">
                                Detail
                            </a>
                        </td>
                    </tr>
                    <?php
                            $no++;
                        }
                        ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php } ?>

    <?php if ($this->session->userdata('role') == 'sdr_Admin Gudang') { ?>
    <?php if ($this->session->userdata('hapus')) { ?>
        <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <?php echo $this->session->userdata('hapus'); ?>
            <?php echo $this->session->set_userdata('hapus', null); ?>
        </div>
    <?php } ?>
    <?php if ($this->session->userdata('sukses')) { ?>
        <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <?php echo $this->session->userdata('sukses'); ?>
            <?php echo $this->session->set_userdata('sukses', null); ?>
        </div>
    <?php } ?>
    <a href="<?php echo site_url('formpembelian') ?>" class="btn btn-sm btn-success mb-3">
        Buat Baru
    </a>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="font-weight-bold text-success">
                Data Request Purchase Anda
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive-xl">
                <table class="table table-borderless small tbl">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Faktur</th>
                            <th class="text-center">Dibuat Tanggal</th>
                            <th class="text-center">Dibuat Jam</th>
                            <th class="text-center">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            foreach ($pembelian as $tempel) {
                                ?>
                        <tr>
                            <td class="text-center">
                                <?php echo $no; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tempel->faktur; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tempel->tanggal; ?>
                            </td>
                            <td class="text-center">
                                <?php echo $tempel->jamdibuat; ?>
                            </td>
                            <td class="text-center">
                                <a href="<?php echo site_url('printpembelian'); ?><?php echo $tempel->faktur; ?>" target="_blank"
                                    class="btn btn-sm btn-success">
                                    Cetak PDF
                                </a>
                                <a href="<?php echo site_url('detailpembelian/'); ?><?php echo $tempel->faktur; ?>" class="btn btn-sm btn-purple">
                                    Detail
                                </a>
                            </td>
                        </tr>
                        <?php
                                $no++;
                            }
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php } ?>


<script>
    $(document).ready(function() {
        $('.table').DataTable();
    });


    function deleteConfirm(url) {
        $('#tombolhapus').attr('href', url);
        $('#modal-hapus').modal();
    }

    $(document).ready(function() {
        $('.yoi').select2({
            theme: 'bootstrap4',
        });
    });
</script>
