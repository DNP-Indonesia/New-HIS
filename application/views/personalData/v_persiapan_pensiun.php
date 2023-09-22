<div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h2>Persiapan Pensiun</h2>
                <table class="table">
                    <tbody>
                        
                    <?php foreach ($karyawan as $log):
                            $thn_lahir       = substr($log->tgl_lahir, 0, 4);
                            $bln_lahir       = substr($log->tgl_lahir, 5, 2);
                            $t_lahir         = substr($log->tgl_lahir, 8, 2);
                            $thn_pensiun = $thn_lahir + 55;
                            $tgl_pensiun = $thn_pensiun . "-" . $bln_lahir . "-" . $t_lahir;
                            ?>
                             <tr>
                                <th scope="row">NIK</th>
                                <td><?php echo $log->nik ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Nama Lengkap</th>
                                <td><?php echo $log->nama ?></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">List persiapan</th>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td></td>
                            </tr>

                            <tr>
                                <th scope="row">Bunga</th>
                                <td><label><input type="checkbox" name="item[]" value="bunga"></label></td>
                            </tr>
                            <tr>
                                <th scope="row">Piagam Penghargaan</th>
                                <td><label><input type="checkbox" name="item[]" value="piagam"></label></td>
                            </tr>
                            <tr>
                                <th scope="row">Kendaraan</th>
                                <td><label><input type="checkbox" name="item[]" value="kendaraan"></label></td>
                            </tr>

                            <tr>
                                <br>
                                <th scope="row">
                                <a href="" class="btn btn-primary btn-icon-split btn-sm">
                					<span class="icon text-white-50">
                						<i class="fas fa-edit"></i>
                					</span>
                					<span class="text">Submit</span>
                				</a>
                                </th>
                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
