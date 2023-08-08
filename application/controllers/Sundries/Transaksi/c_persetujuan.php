<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class c_persetujuan extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("Sundries/Barang/m_jenis");
        $this->load->model("Sundries/Barang/m_barang");
        $this->load->model("Sundries/Barang/m_kategori");
        $this->load->model("Sundries/Transaksi/m_persetujuan");
        $this->load->model("Sundries/Transaksi/m_detail");
        $this->load->model("Sundries/Transaksi/m_detail_sementara");
        $this->load->model("Sundries/Transaksi/m_estimasi");
        $this->load->model("Sundries/Transaksi/m_konsumsi");
        $this->load->library('Pdf');
    }

    public function dashboard(){
        $data['diproses'] = $this->m_persetujuan->finddiproses();
        $data['foraprove'] = $this->m_persetujuan->findforaprove();
        $data['estimasi'] = $this->m_estimasi->findforaprove();
        $data['consum'] = $this->m_konsumsi->findforaprove();
        $data['foradmingudang'] = $this->m_persetujuan->findforadmingudang();
        $data['forkplgudang'] = $this->m_persetujuan->findforkplgudang();
        $this->load->view('Sundries/Template/dashboard',$data);
    }

    public function requestsundriespage(){
        $data['byrequest'] = $this->m_persetujuan->byrequest();
        $data['bydisetujui2'] = $this->m_persetujuan->bydisetujui2();
        $data['byditolak'] = $this->m_persetujuan->byditolak();
        $data['bydiproses'] = $this->m_persetujuan->bydiproses();
        $data['byselesai'] = $this->m_persetujuan->byselesai();
        $data['request'] = $this->m_persetujuan->findrequest();
        $data['disetujui1'] = $this->m_persetujuan->finddisetujui1();
        $data['disetujui2'] = $this->m_persetujuan->finddisetujui2();
        $data['ditolak'] = $this->m_persetujuan->findditolak();
        $data['diproses'] = $this->m_persetujuan->finddiproses();
        $data['selesai'] = $this->m_persetujuan->findselesai();
        $data['forkepalabagianbyrequest'] = $this->m_persetujuan->findforkepalabagianbyrequest();
        $data['forkepalabagianbydisetujui'] = $this->m_persetujuan->findforkepalabagianbydisetujui();
        $data['forkepalabagianbyditolak'] = $this->m_persetujuan->findforkepalabagianbyditolak();
        $data['forkepalabagianbydiproses'] = $this->m_persetujuan->findforkepalabagianbydiproses();
        $data['forkepalabagianbyselesai'] = $this->m_persetujuan->findforkepalabagianbyselesai();
        $data['barsund'] = $this->m_persetujuan->barangsundries();
        $data['jesund'] = $this->m_jenis->getJenisAll();
        $data['fakturotomatis']  = $this->m_persetujuan->generatefaktur();
        $this->load->view('Sundries/Transaksi/v_permintaan_persetujuan',$data);
    }

    public function detail(){
        $id     = $this->uri->segment(4);
        $data['data'] = $this->m_persetujuan->findbyid($id);
        $data['detail']   = $this->m_detail->finddetail($id);
        $data['penolakan']   = $this->m_persetujuan->findpenolakan($id);
        $data['barsund'] = $this->m_persetujuan->barangsundries();
        $this->load->view('Sundries/Transaksi/v_detail_persetujuan', $data);
    }

    public function jumlahupdate(){
        $barang = $this->input->post('barang');
        $jumlah = $this->input->post('jumlah');
        $faktur = $this->input->post('faktur');
        $catatan = $this->input->post('catatan');
 
        $data = array(
            'jumlah' => $jumlah,
            'keterangan' => $catatan
        );
     
        $where = array(
            'id_barang' => $barang,
            'faktur'=>$faktur
        );

        //var_dump($data, $where);
        //die();
     
        $this->m_detail->updatejumlah($where,$data);
        $this->session->set_userdata('update', 'Yeay, Jumlah Atau Catatan Berhasil Diubah, Yuk Lihat Di Detail Request...');
        return redirect('Sundries/Transaksi/c_persetujuan/requestsundriespage');
    }

    public function cekkeranjang(){
        $id_barang = $this->input->post('id_barang');
        $qty = $this->input->post('qty');
        $id_user = $this->input->post('id_user');
        $catatan = $this->input->post('catatan');

        $cekbarang = $this->m_persetujuan->cekbarangkeranjang($id_barang, $id_user)->num_rows();
        if ($cekbarang > 0){
            echo "1";
        }else{
            $data = array(
                'id_barang'=>$id_barang,
                'jumlah'=>$qty,
                'id_user'=>$id_user,
                'keterangan'=>$catatan
               
            );
            
            $this->m_detail_sementara->savekeranjang($data);
        }
    }

    public function showbarangkeranjang(){
        $id_user = $this->input->post('id_user');
        $data['barangkeranjang'] = $this->m_persetujuan->selectkeranjang($id_user);
        $this->load->view('Sundries/Transaksi/v_keranjang_persetujuan',$data);
    }

    public function hapuskeranjang(){
        $id_user = $this->input->post('iduser');
        $id_barang = $this->input->post('idbarang');
        $hapus = $this->m_persetujuan->deletekeranjang($id_barang, $id_user);
        echo $hapus;
    }

    public function requestsundriesadd(){
        $faktur = $this->input->post('faktur');
        $tanggal = $this->input->post('tanggal');
        $iduser = $this->input->post('id_user');
        $status = $this->input->post('status');
        $jamdibuat = $this->input->post('jamdibuat');
        $nama = $this->input->post('nama');
        
        $stkeranjang = $this->input->post('statuskeranjang');
        $barangready = "tidak";

        $cekbarang2 = $this->m_persetujuan->cekbarangkeranjang2($iduser)->num_rows();
            if ($cekbarang2 == 0){
                $this->session->set_userdata('keranjangkosong', 'Hey, Keranjang Masih Kosong, Main Pencet Tombol Request Aja Nich....');
                return redirect('Sundries/Transaksi/c_persetujuan/requestsundriespage');
            }else{
            $data = array(
                'faktur'=>$faktur,
                'nama_peminta'=>$nama,
                'id_user'=>$iduser,
                'tanggal'=>$tanggal,
                'status'=>$status,
                'jamdibuat'=>$jamdibuat
            );

            $simpan = $this->m_persetujuan->save($data, $iduser, $faktur, $stkeranjang, $barangready);
            $this->session->set_userdata('sukses', 'Sukses, Request Berhasil Dibuat, Masih Menunggu Persetujuan Kepala Bagian dan Kepala Gudang....');
            return redirect('Sundries/Transaksi/c_persetujuan/requestsundriespage');
        }
    }

    public function requestsundriesdelete($faktur){
        $faktur = $this->uri->segment(4);
        $hapus = $this->m_persetujuan->deleterequest($faktur);
        $this->session->set_userdata('hapus', 'Berhasil, Request Telah Dihapus ....');
        return redirect('Sundries/Transaksi/c_persetujuan/requestsundriespage');
    }

    public function printpdf(){
        $id     = $this->uri->segment(4);
        $data['data'] = $this->m_persetujuan->findbyidforpdf($id);
        $data['detail'] = $this->m_detail->finddetailforpdf($id);
        $this->load->view('sundries/printrequest',$data);
        
    }

    public function requestaprove(){
        $faktur = $this->input->post('faktur');
        $status = $this->input->post('status');
        $status2 = $this->input->post('status2');
        $jamsetuju = $this->input->post('jamsetuju');
        $penyetuju = $this->input->post('penyetuju');
        $tanggalsetuju = $this->input->post('tgl_setuju');
    

        $where = array(
            'faktur' => $faktur
        );

        $data = array(
            'status' => $status,
            'jamsetuju1' => $jamsetuju,
            'penyetuju1' => $penyetuju,
            'tanggal_setuju1' => $tanggalsetuju
        );

        $data2 = array(
            'status' => $status2,
            'jamsetuju2' => $jamsetuju,
            'penyetuju2' => $penyetuju,
            'tanggal_setuju2' => $tanggalsetuju
        );
        if ($this->session->userdata('role')=='sdr_Kepala Bagian') {
            $this->m_persetujuan->update($where,$data);
            $this->session->set_userdata('setuju', 'Berhasil, Request Telah Disetujui, Menunggu Persetujuan Kepala Gudang....');
        }elseif ($this->session->userdata('role')=='sdr_Kepala Gudang') {
            $this->m_persetujuan->update($where,$data2);
            $this->session->set_userdata('setuju', 'Berhasil, Request Telah Disetujui....');
        }
        
        return redirect('Sundries/Transaksi/c_persetujuan/dashboard');
    }

    public function requestreject(){
        $faktur = $this->input->post('faktur');
        $status = $this->input->post('status');
        $alasan = $this->input->post('alasan');
        $tanggaltolak = $this->input->post('tanggaltolak');
        $jamtolak = $this->input->post('jam');
        $iduser = $this->input->post('id_user');
 
        $data = array(
            'status' => $status
        );

        $data2 = array(
            'faktur' => $faktur,
            'alasan_tolak' => $alasan,
            'tanggal_tolak' => $tanggaltolak,
            'jamtolak' => $jamtolak,
            'id_user'=>$iduser
        );
     
        $where = array(
            'faktur' => $faktur
        );
     
        $this->m_persetujuan->update($where,$data);
        $this->m_persetujuan->savetolak($data2);
        $this->session->set_userdata('tolak', 'Sukses, Berhasil Menolak Request. Menunggu Perbaikan Dari Admin Bagian....');
        return redirect()->back();
    }

    public function barangdelete($id){
        if (!isset($id)) show_404();
        
        if ($this->m_detail->deletebarang($id)) {
            $this->session->set_flashdata('hapus', 'Barang Berhasil Dihapus......');
            return redirect('Sundries/Transaksi/c_persetujuan/requestsundriespage');
        }
    }

    public function barangnew(){
        $faktur = $this->input->post('faktur');
        $barang = $this->input->post('barang');
        $jumlah = $this->input->post('jumlah');
        $catatan = $this->input->post('keterangan');
 
        $data = array(
            'faktur' => $faktur,
            'id_barang' => $barang,
            'jumlah' => $jumlah,
            'keterangan'=>$catatan
        );
        
        $this->m_detail->addbarang($data);
        $this->session->set_userdata('addbarang', 'Yeay, Berhasil Nambah Barang....');
        return redirect('Sundries/Transaksi/c_persetujuan/requestsundriespage');
    }

    public function requestulang(){
        $faktur = $this->input->post('faktur');
        $status = $this->input->post('status');
        $tanggal = $this->input->post('tanggal');
        $stkeranjang = $this->input->post('stkeranjang');
 
        $data = array(
            'status'=>$status,
            'tanggal'=>$tanggal
        );
        
        $where = array(
            'faktur' => $faktur
        );

        $data2 = array(
            'statuskeranjang'=>$stkeranjang
        );

        $this->m_persetujuan->ulangrequest($data, $where);
        $this->m_persetujuan->ubahstkeranjang($where, $data2);
        $this->session->set_userdata('requlang', 'Yeay Berhasil, Ngajuin Ulang Requestnya, Nunggu Persetujuan Lagi Nich....');
        return redirect('Sundries/Transaksi/c_persetujuan/requestsundriespage');
    }

    public function requestproses(){
        $faktur = $this->input->post('faktur');
        $status = $this->input->post('status');
 
        $data = array(
            'status'=>$status
        );
        
        $where = array(
            'faktur' => $faktur
        );

        $this->m_persetujuan->prosesrequest($data, $where);
        $this->session->set_userdata('reqproses', 'Berhasil, Request Akan Diproses ....');
        return redirect('Sundries/Transaksi/c_persetujuan/dashboard');
    }

    public function requestfinish(){
        $faktur = $this->input->post('faktur');
        $status = $this->input->post('status');
        $jam = $this->input->post('jam');

        $data = array(
            'status'=>$status,
            'waktu'=>$jam
        );
        
        $where = array(
            'faktur' => $faktur
        );

        $this->m_persetujuan->finishrequest($data, $where);
        $this->session->set_userdata('reqfinish', 'Yeay, Transaksi Udah Selesai....');
        return redirect('Sundries/Transaksi/c_persetujuan/requestsundriespage');
    }

    public function requestready(){
        $faktur = $this->input->post('faktur');
        $status = $this->input->post('status');
        $po = $this->input->post('po');
        $jam = $this->input->post('jam');
        $surjal = $this->input->post('surjal');
 
        $data = array(
            'status'=>$status,
            'waktu'=>$jam,
            'nomorpo'=>$po,
            'suratjalan'=>$surjal

        );
        
        $where = array(
            'faktur' => $faktur
        );

        $this->m_persetujuan->readyrequest($data, $where);
        $this->session->set_userdata('reqready', 'Yeay, Barang Sudah Tiba....');
        return redirect('Sundries/Transaksi/c_persetujuan/requestsundriespage');
    }

    public function tampildetailbarang(){
        $id_barang = $this->input->post('id_barang');
        $detail = "SELECT brand as brand, type as type, ukuran as ukuran, satuan as satuan FROM sdr_barang WHERE id_barang='$id_barang'";
        //$detail = $this->m_persetujuan->findbarangbyid($id_barang);
        $ambil = $this->db->query($detail)->row_array();
        
        //$ambil = $this->db->query($detail)->num_rows();
        $this->output->set_content_type('application/json')->set_output(json_encode($ambil));
        //echo json_encode($ambil);
    }

}