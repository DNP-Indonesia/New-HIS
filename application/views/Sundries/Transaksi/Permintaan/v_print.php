<?php
            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('Formulir Request Sundries');
            $pdf->SetHeaderMargin(30);
            $pdf->SetTopMargin(20);
            $pdf->setFooterMargin(20);
            $pdf->SetAutoPageBreak(true);
            $pdf->SetAuthor('Roihan Ghozy Islami');
            $pdf->SetDisplayMode('real', 'default');
            $pdf->AddPage();
            $no=0;
            $html='
                    <h1 align="center">Sundries Request</h1>
                    <h3>PT DNP Indonesia</h3>';
                    foreach($data as $req){
                    $html.='
                        <table cellpadding="3" border="1">
                            <tr>
                                <th align="center" width="50%"><h4>Faktur : '.$req['faktur'].'</h4></th>
                                <th align="center" width="50%"><h4>Untuk Bagian : '.$req['nama_section'].'</h4></th> 
                            </tr>
                            <tr>
                                <th align="center" width="5%"><h4>No</h4></th>
                                <th align="center" width="20%"><h4>Item</h4></th>
                                <th align="center" width="12%"><h4>Quantity</h4></th>
                                <th align="center" width="13%"><h4>Brand</h4></th>
                                <th align="center" width="11%"><h4>Type</h4></th>
                                <th align="center" width="12%"><h4>Ukuran</h4></th>
                                <th align="center" width="12%"><h4>Satuan</h4></th>
                                <th align="center" width="15%"><h4>Catatan</h4></th>
                            </tr>
                        </table>';
            foreach ($detail as $tempel) 
                {
                    $no++;
                    $html.='
                        <table cellpadding="3" border="1">
                            <tr>
                                <td align="center" width="5%">'.$no.'</td>
                                <td width="20%">'.$tempel['barang'].'</td>
                                <td width="12%" align="center">'.$tempel['jumlah'].'</td>
                                <td width="13%" align="center">'.$tempel['brand'].'</td>
                                <td width="11%" align="center">'.$tempel['type'].'</td>
                                <td width="12%" align="center">'.$tempel['ukuran'].'</td>
                                <td width="12%" align="center">'.$tempel['satuan'].'</td>
                                <td width="15%" align="center">'.$tempel['keterangan'].'</td>
                            </tr>
                        </table>';
                }
            $html.='     
                    <table cellpadding="3" border="1">
                        <tr>
                            <th width="30%" align="center"><h4>Made By</h4></th>
                            <th width="70%" align="center" colspan="2"><h4>Agreed By</h4></th>
                            
                        </tr>
                        <tr>
                            <th width="30%" align="center">'.$req['nama_peminta'].'<br><br>'.date('d F Y', strtotime($req['tanggal'])).'<br>'.$req['jamdibuat'].'</th>
                            <th width="35%" align="center">'.$req['penyetuju1'].'<br>(Depman/Divisi)<br>'.date('d F Y', strtotime($req['tanggal_setuju1'])).'<br>'.$req['jamsetuju1'].'</th>
                            <th width="35%" align="center">'.$req['penyetuju2'].'<br>(Kepala Gudang)<br>'.date('d F Y', strtotime($req['tanggal_setuju2'])).'<br>'.$req['jamsetuju2'].'</th>
                        </tr>
                    </table>';}
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output('Formulir Request Sundries.pdf', 'I');
?>