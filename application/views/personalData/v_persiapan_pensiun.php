<div class="container-fluid">
    <div class="card">
        <div class="card-body">
            <h2>Persiapan Pensiun</h2>
            <?php foreach ($karyawan as $log):
                $thn_lahir       = substr($log->tgl_lahir, 0, 4);
                $bln_lahir       = substr($log->tgl_lahir, 5, 2);
                $t_lahir         = substr($log->tgl_lahir, 8, 2);
                $thn_pensiun = $thn_lahir + 55;
                $tgl_pensiun = $thn_pensiun . "-" . $bln_lahir . "-" . $t_lahir;
                ?>
                <form method="post" action="<?php echo site_url("Master/action_his/do_persiapan_pensiun/" . $log->nik) ?>"> <!-- Ganti 'kontroller_anda.php' dengan nama kontroller yang sesuai -->
                    <input type="hidden" name="nik" value="<?php echo $log->nik ?>"> <!-- Gunakan input tersembunyi untuk menyimpan NIK -->
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <th scope="row">NIK</th>
                                <td><?php echo $log->nik ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Nama Lengkap</th>
                                <td><?php echo $log->nama ?></td>
                            </tr>
                            <tr>
                                <th scope="row">List persiapan</th>
                                <td>
                                    <label><input type="checkbox" name="bunga" value="siap"> Bunga</label><br>
                                    <label><input type="checkbox" name="kue" value="siap"> Piagam Penghargaan</label><br>
                                    <label><input type="checkbox" name="piagam" value="siap"> Piagam Penghargaan</label><br>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td>
                                    <button type="submit" class="btn btn-primary btn-sm">Siapkan</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            <?php endforeach; ?>
        </div>
    </div>
</div>
