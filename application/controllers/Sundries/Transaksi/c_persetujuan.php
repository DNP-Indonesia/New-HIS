<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class requestsundriescontroller extends MY_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("Sundries/modeljenis");
        $this->load->model("Sundries/modelbarang");
        $this->load->model("Sundries/modelkategori");
        $this->load->model("Sundries/modelrequestsundries");
        $this->load->model("Sundries/modeldetailsundries");
        $this->load->model("Sundries/modeldetailsundriessementara");
        $this->load->model("Sundries/modelestimasi");
        $this->load->model("Sundries/modelconsumption");
        $this->load->library('Pdf');
    }

    public function dashboard(){
        $data['diproses'] = $this->modelrequestsundries->finddiproses();
        $data['foraprove'] = $this->modelrequestsundries->findforaprove();
        $data['estimasi'] = $this->modelestimasi->findforaprove();
        $data['consum'] = $this->modelconsumption->findforaprove();
        $data['foradmingudang'] = $this->modelrequestsundries->findforadmingudang();
        $data['forkplgudang'] = $this->modelrequestsundries->findforkplgudang();
        $this->load->view('sundries/Dashboard',$data);
    }

    public function requestsundriespage(){
        $data['byrequest'] = $this->modelrequestsundries->byrequest();
        $data['bydisetujui2'] = $this->modelrequestsundries->bydisetujui2();
        $data['byditolak'] = $this->modelrequestsundries->byditolak();
        $data['bydiproses'] = $this->modelrequestsundries->bydiproses();
        $data['byselesai'] = $this->modelrequestsundries->byselesai();
        $data['request'] = $this->modelrequestsundries->findrequest();
        $data['disetujui1'] = $this->modelrequestsundries->finddisetujui1();
        $data['disetujui2'] = $this->modelrequestsundries->finddisetujui2();
        $data['ditolak'] = $this->modelrequestsundries->findditolak();
        $data['diproses'] = $this->modelrequestsundries->finddiproses();
        $data['selesai'] = $this->modelrequestsundries->findselesai();
        $data['forkepalabagianbyrequest'] = $this->modelrequestsundries->findforkepalabagianbyrequest();
        $data['forkepalabagianbydisetujui'] = $this->modelrequestsundries->findforkepalabagianbydisetujui();
        $data['forkepalabagianbyditolak'] = $this->modelrequestsundries->findforkepalabagianbyditolak();
        $data['forkepalabagianbydiproses'] = $this->modelrequestsundries->findforkepalabagianbydiproses();
        $data['forkepalabagianbyselesai'] = $this->modelrequestsundries->findforkepalabagianbyselesai();
        $data['barsund'] = $this->modelrequestsundries->barangsundries();
        $data['jesun'] = $this->modeljenis->findbyidsundries();
        $data['fakturotomatis']  = $this->modelrequestsundries->generatefaktur();
        $this->load->view('sundries/Request Sundries',$data);
    }

    public function detail(){
        $id     = $this->uri->segment(4);
        $data['data'] = $this->modelrequestsundries->findbyid($id);
        $data['detail']   = $this->modeldetailsundries->finddetail($id);
        $data['penolakan']   = $this->modelrequestsundries->findpenolakan($id);
        $data['barsund'] = $this->modelrequestsundries->barangsundries();
        $this->load->view('sundries/detail-sundries', $data);
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
     
        $this->modeldetailsundries->updatejumlah($where,$data);
        $this->session->set_userdata('update', 'Yeay, Jumlah Atau Catatan Berhasil Diubah, Yuk Lihat Di Detail Request...');
        return redirect('Sundries/requestsundriescontroller/requestsundriespage');
    }

    public function cekkeranjang(){
        $id_barang = $this->input->post('id_barang');
        $qty = $this->input->post('qty');
        $id_user = $this->input->post('id_user');
        $catatan = $this->input->post('catatan');

        $cekbarang = $this->modelrequestsundries->cekbarangkeranjang($id_barang, $id_user)->num_rows();
        if ($cekbarang > 0){
            echo "1";
        }else{
            $data = array(
                'id_barang'=>$id_barang,
                'jumlah'=>$qty,
                'id_user'=>$id_user,
                'keterangan'=>$catatan
               
            );
            
            $this->modeldetailsundriessementara->savekeranjang($data);
        }
    }

    public function showbarangkeranjang(){
        $id_user = $this->input->post('id_user');
        $data['barangkeranjang'] = $this->modelrequestsundries->selectkeranjang($id_user);
        $this->load->view('sundries/keranjangsundries',$data);
    }

    public function hapuskeranjang(){
        $id_user = $this->input->post('iduser');
        $id_barang = $this->input->post('idbarang');
        $hapus = $this->modelrequestsundries->deletekeranjang($id_barang, $id_user);
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

        $cekbarang2 = $this->modelrequestsundries->cekbarangkeranjang2($iduser)->num_rows();
            if ($cekbarang2 == 0){
                $this->session->set_userdata('keranjangkosong', 'Hey, Keranjang Masih Kosong, Main Pencet Tombol Request Aja Nich....');
                return redirect('Sundries/requestsundriescontroller/requestsundriespage');
            }else{
            $data = array(
                'faktur'=>$faktur,
                'nama_peminta'=>$nama,
                'id_user'=>$iduser,
                'tanggal'=>$tanggal,
                'status'=>$status,
                'jamdibuat'=>$jamdibuat
            );

            $simpan = $this->modelrequestsundries->save($data, $iduser, $faktur, $stkeranjang, $barangready);
            $this->session->set_userdata('sukses', 'Sukses, Request Berhasil Dibuat, Masih Menunggu Persetujuan Kepala Bagian dan Kepala Gudang....');
            return redirect('Sundries/requestsundriescontroller/requestsundriespage');
        }
    }

    public function requestsundriesdelete($faktur){
        $faktur = $this->uri->segment(4);
        $hapus = $this->modelrequestsundries->deleterequest($faktur);
        $this->session->set_userdata('hapus', 'Berhasil, Request Telah Dihapus ....');
        return redirect('Sundries/requestsundriescontroller/requestsundriespage');
    }

    public function printpdf(){
        $id     = $this->uri->segment(4);
        $data['data'] = $this->modelrequestsundries->findbyidforpdf($id);
        $data['detail'] = $this->modeldetailsundries->finddetailforpdf($id);
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
            $this->modelrequestsundries->update($where,$data);
            $this->session->set_userdata('setuju', 'Berhasil, Request Telah Disetujui, Menunggu Persetujuan Kepala Gudang....');
        }elseif ($this->session->userdata('role')=='sdr_Kepala Gudang') {
            $this->modelrequestsundries->update($where,$data2);
            $this->session->set_userdata('setuju', 'Berhasil, Request Telah Disetujui....');
        }
        
        return redirect('Sundries/requestsundriescontroller/dashboard');
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
     
        $this->modelrequestsundries->update($where,$data);
        $this->modelrequestsundries->savetolak($data2);
        $this->session->set_userdata('tolak', 'Sukses, Berhasil Menolak Request. Menunggu Perbaikan Dari Admin Bagian....');
        return redirect()->back();
    }

    public function barangdelete($id){
        if (!isset($id)) show_404();
        
        if ($this->modeldetailsundries->deletebarang($id)) {
            $this->session->set_flashdata('hapus', 'Barang Berhasil Dihapus......');
            return redirect('Sundries/requestsundriescontroller/requestsundriespage');
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
        
        $this->modeldetailsundries->addbarang($data);
        $this->session->set_userdata('addbarang', 'Yeay, Berhasil Nambah Barang....');
        return redirect('Sundries/requestsundriescontroller/requestsundriespage');
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

        $this->modelrequestsundries->ulangrequest($data, $where);
        $this->modelrequestsundries->ubahstkeranjang($where, $data2);
        $this->session->set_userdata('requlang', 'Yeay Berhasil, Ngajuin Ulang Requestnya, Nunggu Persetujuan Lagi Nich....');
        return redirect('Sundries/requestsundriescontroller/requestsundriespage');
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

        $this->modelrequestsundries->prosesrequest($data, $where);
        $this->session->set_userdata('reqproses', 'Berhasil, Request Akan Diproses ....');
        return redirect('Sundries/requestsundriescontroller/dashboard');
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

        $this->modelrequestsundries->finishrequest($data, $where);
        $this->session->set_userdata('reqfinish', 'Yeay, Transaksi Udah Selesai....');
        return redirect('Sundries/requestsundriescontroller/requestsundriespage');
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

        $this->modelrequestsundries->readyrequest($data, $where);
        $this->session->set_userdata('reqready', 'Yeay, Barang Sudah Tiba....');
        return redirect('Sundries/requestsundriescontroller/requestsundriespage');
    }

    public function tampildetailbarang(){
        $id_barang = $this->input->post('id_barang');
        $detail = "SELECT brand as brand, type as type, ukuran as ukuran, satuan as satuan FROM sdr_barang WHERE id_barang='$id_barang'";
        //$detail = $this->modelrequestsundries->findbarangbyid($id_barang);
        $ambil = $this->db->query($detail)->row_array();
        
        //$ambil = $this->db->query($detail)->num_rows();
        $this->output->set_content_type('application/json')->set_output(json_encode($ambil));
        //echo json_encode($ambil);
    }

}