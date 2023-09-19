<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_konsumsi extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sundries/Barang/m_jenis');
        $this->load->model('Sundries/Barang/m_barang');
        $this->load->model('Sundries/Barang/m_kategori');
        $this->load->model('Sundries/Transaksi/m_konsumsi');
        $this->load->model('Sundries/Transaksi/m_estimasi');
        $this->load->library('Pdf');
    }

    public function index()
    {
        $data['konsumsi'] = $this->m_konsumsi->getKonsumsi();
        $data['estimasi'] = $this->m_konsumsi->getEstimasi();
        $data['kepalabagian'] = $this->m_konsumsi->forKepalaBagian();
        $data['allkonsumsi'] = $this->m_konsumsi->getKonsumsiAll();

        $menu = 'konsumsi';
        $this->render_backend('Sundries/Transaksi/Konsumsi/v_konsumsi', $menu, $data);
    }

    public function barangFaktur()
    {
        $faktur_estimasi = $this->input->post('faktur');
        $data = $this->m_konsumsi->getBarangByFaktur($faktur_estimasi);
        
        $output = array(); // Buat array kosong untuk menyimpan opsi dropdown
        
        foreach ($data as $row) {
            $output[] = array(
                'id_barang' => $row->id_barang,
                'barang' => $row->barang,
                'jumlah' => $row->jumlah
            );
        }
        
        // Set Content-Type sebagai application/json
        $this->output->set_content_type('application/json');
        
        // Mengirimkan data dalam format JSON
        $this->output->set_output(json_encode($output));
    }

    public function addKeranjang()
    {
        $id_barang = $this->input->post('id_barang');
        $qty = $this->input->post('qty');
        $id_user = $this->input->post('id_user');
        $fakest = $this->input->post('fakest');

        $cekbarang = $this->m_konsumsi->cekKeranjang($id_barang, $id_user)->num_rows();
        if ($cekbarang > 0){
            
        }else{
            $data = array(
                'id_barang'=>$id_barang,
                'jumlah'=>$qty,
                'id_user'=>$id_user,
                'fakest'=>$fakest
            );
            
            $this->m_konsumsi->saveKeranjang($data);
        }
    }

    public function showKeranjang()
    {
        $id_user = $this->input->post('id_user');
        $data['keranjang'] = $this->m_konsumsi->getKeranjang($id_user)->result();
        $this->load->view('Sundries/Transaksi/Konsumsi/v_keranjang', $data);
    }

    public function deleteKeranjang()
    {
        $id_user = $this->input->post('iduser');
        $id_barang = $this->input->post('idbarang');
        $hapus = $this->m_konsumsi->deleteKeranjang($id_user, $id_barang);
        echo $hapus;
    }

    public function addKonsumsi()
    {
        $faktur = $this->input->post('faktur');
        $tanggal = $this->input->post('tanggal');
        $iduser = $this->input->post('id_user');
        $status = $this->input->post('status');
        $nama = $this->input->post('nama');
        $fakest = $this->input->post('fakest');

        $data = array(
            'faktur'=>$faktur,
            'nama_peminta'=>$nama,
            'id_user'=>$iduser,
            'tanggal'=>$tanggal,
            'status'=>$status
        );

        $this->m_konsumsi->save($data, $iduser, $faktur, $fakest);
        $this->session->set_userdata('sukses', 'Yeay, Data Berhasil Disimpan');
        return redirect('Sundries/Transaksi/c_konsumsi/index');
    }

    public function detailKonsumsi()
    {   
        $id = $this->uri->segment(4);
        $data['data'] = $this->m_konsumsi->getKonsumsiById($id);
        $data['detail'] = $this->m_konsumsi->getKonsumsiDetail($id);
        $this->load->view('Sundries/Transaksi/Konsumsi/v_detail', $data);
    }

    public function printKonsumsi()
    {
        $id = $this->uri->segment(4);
        $data['data'] = $this->m_konsumsi->getIdPdf($id);
        $data['detail'] = $this->m_konsumsi->getDetailIdPdf($id);
        $this->load->view('Sundries/Transaksi/Konsumsi/v_print', $data);
    }

    public function deleteKonsumsi($faktur)
    {
        $this->m_konsumsi->deleteKonsumsi($faktur);
    }

    public function approveKonsumsi()
    {
        $faktur = $this->input->post('faktur');
        $status = $this->input->post('status');
 
        $data = array(
            'status' => $status
        );
     
        $where = array(
            'faktur' => $faktur
        );
        
        $this->m_konsumsi->update($where, $data);
        $this->session->set_userdata('sukses', 'Yeay, Data Berhasil Disetujui');
        return redirect('Sundries/Transaksi/c_permintaan/dashboard');
    }

    public function rejectKonsumsi()
    {
        $faktur = $this->input->post('faktur');
        $status = $this->input->post('status');
 
        $data = array(
            'status' => $status
        );
     
        $where = array(
            'faktur' => $faktur
        );
        
        $this->m_konsumsi->update($where, $data);
        $this->session->set_userdata('tolak', 'Yeay, Data Berhasil Ditolak');
        return redirect('Sundries/Transaksi/c_permintaan/dashboard');
    }
}
?>