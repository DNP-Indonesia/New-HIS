<?php
date_default_timezone_set('Asia/Jakarta'); // Mengatur zona waktu menjadi Asia/Jakarta
?>
<div class="container-fluid">
    <?php if ($this->session->userdata('role') == 'super_user') { ?><h6>Kepala Gudang</h6> <?php } ?>
    <?php
    if ($this->session->userdata('role') == 'sdr_Kepala Gudang' || $this->session->userdata('role') == 'super_user') {
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
                <h6 class="font-weight-bold text-success">Buat Baru</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive-xl">
                    <table class="table table-borderless small table-hover">
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
                                    <td class="text-center"><?php echo $no; ?></td>
                                    <td class="text-center"><?php echo $tempel->faktur; ?></td>
                                    <td class="text-center"><?php echo $tempel->tanggal; ?></td>
                                    <td class="text-center"><?php echo $tempel->jamdibuat; ?></td>
                                    <td class="text-center">
                                        <?php if (isset($tempel->status) && $tempel->status == 'Request') { ?>
                                            <span class="badge badge-warning"><?php echo $tempel->status; ?></span>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="<?php echo site_url('detailpembelian/' . $tempel->faktur); ?>" class="btn btn-sm btn-purple">Detail</a>
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
</div>
<br>

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