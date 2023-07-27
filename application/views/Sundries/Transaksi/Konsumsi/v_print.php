<?php
            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('Formulir Estimasi');
            $pdf->SetHeaderMargin(30);
            $pdf->SetTopMargin(20);
            $pdf->setFooterMargin(20);
            $pdf->SetAutoPageBreak(true);
            $pdf->SetAuthor('Roihan Ghozy Islami');
            $pdf->SetDisplayMode('real', 'default');
            $pdf->AddPage();
            $no=0;
            $html='<h3>Detail Estimasi</h3>';
                    foreach($data as $tempel){
                        $html.='
                            Sebagai Berikut :<br><br>
                            <label>Faktur : '.$tempel['faktur'].'</label><br>
                            <label>Direquest Oleh : '.$tempel['nama_peminta'].'</label><br>
                            <label>Untuk Bagian : '.$tempel['nama_section'].'</label><br>
                            <label>Dibuat Tanggal : '.$tempel['tanggal'].'</label><br><br>
                        ';
                    }
                    $html.='<table cellpadding="3" border="1">
                            <tr>
                                <th>No</th>
                                <th>Barang</th>
                                <th>Jumlah</th>
                            </tr>';
            foreach ($detail as $tempel) 
                {
                    $no++;
                    $html.='<tr>
                                <td>'.$no.'</td>
                                <td>'.$tempel['barang'].'</td>
                                <td>'.$tempel['jumlah'].'</td>
                            </tr>';
                }
            $html.='</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output('Formulir Estimasi.pdf', 'I');
?>