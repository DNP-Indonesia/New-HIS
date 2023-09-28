<?php
defined('BASEPATH') or exit('No direct script access allowed');

class c_konsumsistok extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Sundries/Barang/m_jenis');
        $this->load->model('Sundries/Barang/m_barang');
        $this->load->model('Sundries/Barang/m_kategori');
        $this->load->model('Sundries/Transaksi/m_konsumsistok');
        $this->load->model('Sundries/Transaksi/m_estimasi');
        $this->load->library('Pdf');
    }

    public function index()
    {
        $data['konsumsistok'] = $this->m_konsumsistok->getKonsumsistok();
        $data['estimasi'] = $this->m_konsumsistok->getEstimasi();
        $data['kepalabagian'] = $this->m_konsumsistok->forKepalaBagian();
        $data['allkonsumsistok'] = $this->m_konsumsistok->getKonsumsistokAll();

        // var_dump($data['estimasi']);

        $menu = 'konsumsistok';
        $this->render_backend('Sundries/Transaksi/Konsumsistok/v_konsumsistok', $menu, $data);
    }

    public function adminBagian()
    {
        $data['konsumsistok'] = $this->m_konsumsistok->getKonsumsistok();
        $data['estimasi'] = $this->m_konsumsistok->getEstimasi();
        $data['kepalabagian'] = $this->m_konsumsistok->forKepalaBagian();
        $data['allkonsumsistok'] = $this->m_konsumsistok->getKonsumsistokAll();

        // var_dump($data['estimasi']);

        $menu = 'konsumsistok';
        $this->render_backend('Sundries/Transaksi/Dashboard/Konsumsi/v_konsumsi_admin_bagian', $menu, $data);
    }

    public function kepalaBagian()
    {
        $data['konsumsistok'] = $this->m_konsumsistok->getKonsumsistok();
        $data['estimasi'] = $this->m_konsumsistok->getEstimasi();
        $data['kepalabagian'] = $this->m_konsumsistok->forKepalaBagian();
        $data['allkonsumsistok'] = $this->m_konsumsistok->getKonsumsistokAll();

        // var_dump($data['estimasi']);

        $menu = 'konsumsistok';
        $this->render_backend('Sundries/Transaksi/Dashboard/Konsumsistok/v_konsumsistok_kepala_bagian', $menu, $data);
    }

    public function barangDetailEstimasi()
    {
        $id_detail_estimasi = $this->input->post('id_detail_estimasi'); // Mengambil id_detail_estimasi dari permintaan POST
        $data = $this->m_konsumsistok->getBarangById($id_detail_estimasi); // Memanggil model untuk mencari barang berdasarkan id_detail_estimasi

        $output = []; // Buat array kosong untuk menyimpan data barang

        foreach ($data as $row) {
            $output[] = [
                'id_barang' => $row->id_barang,
                'barang' => $row->barang,
                'jumlah' => $row->jumlah,
            ];
        }

        // Set Content-Type sebagai application/json
        $this->output->set_content_type('application/json');

        // Mengirimkan data dalam format JSON
        $this->output->set_output(json_encode($output));
    }

    public function cekKeranjang()
    {
        $id_barang = $this->input->post('id_barang');
        $qty = $this->input->post('qty');
        $id_user = $this->input->post('id_user');
        $fakest = $this->input->post('fakest');

        $cek = $this->m_konsumsistok->cekKeranjang($id_barang, $id_user)->num_rows();
        if ($cek > 0) {
            echo '1';
        } else {
            $data = [
                'id_barang' => $id_barang,
                'jumlah' => $qty,
                'id_user' => $id_user,
                'fakest' => $fakest,
            ];

            $this->m_konsumsistok->saveKeranjang($data);
        }
    }

    public function showKeranjang()
    {
        $id_user = $this->input->post('id_user');
        $data['keranjang'] = $this->m_konsumsistok->getKeranjang($id_user)->result();
        $this->load->view('Sundries/Transaksi/Konsumsistok/v_keranjang', $data);
    }

    public function deleteKeranjang()
    {
        $id_user = $this->input->post('iduser');
        $id_barang = $this->input->post('idbarang');
        $hapus = $this->m_konsumsistok->deleteKeranjang($id_user, $id_barang);
        echo $hapus;
    }

    public function addKonsumsistok()
    {
        $faktur = $this->input->post('faktur');
        $tanggal = $this->input->post('tanggal');
        $iduser = $this->input->post('id_user');
        $status = $this->input->post('status');
        $nama = $this->input->post('nama');
        $fakest = $this->input->post('fakest');

        $data = [
            'faktur' => $faktur,
            'nama_peminta' => $nama,
            'id_user' => $iduser,
            'tanggal' => $tanggal,
            'status' => $status,
        ];

        $this->m_konsumsistok->save($data, $iduser, $faktur, $fakest);
        $this->session->set_userdata('sukses', 'Yeay, Data Berhasil Disimpan');
        return redirect('Sundries/Transaksi/c_konsumsistok/index');
    }

    public function detailKonsumsistok()
    {
        $id = $this->uri->segment(4);
        $data['data'] = $this->m_konsumsistok->getKonsumsistokById($id);
        $data['detail'] = $this->m_konsumsistok->getKonsumsistokDetail($id);
        
        $this->load->view('Sundries/Transaksi/Konsumsistok/v_detail', $data);
    }

    public function printKonsumsistok()
    {
        $id = $this->uri->segment(4);
        $data['data'] = $this->m_konsumsistok->getIdPdf($id);
        $data['detail'] = $this->m_konsumsistok->getDetailIdPdf($id);
        $this->load->view('Sundries/Transaksi/Konsumsistok/v_print', $data);
    }

    public function deleteKonsumsistok($faktur)
    {
        $this->m_konsumsistok->deleteKonsumsistok($faktur);
    }

    public function approveKonsumsistok()
    {
        $faktur = $this->input->post('faktur');
        $status = $this->input->post('status');

        $data = [
            'status' => $status,
        ];

        $where = [
            'faktur' => $faktur,
        ];

        $this->m_konsumsistok->update($where, $data);
        $this->session->set_userdata('sukses', 'Yeay, Data Berhasil Disetujui');
        return redirect('Sundries/Transaksi/c_permintaan/dashboard');
    }

    public function rejectKonsumsistok()
    {
        $faktur = $this->input->post('faktur');
        $status = $this->input->post('status');

        $data = [
            'status' => $status,
        ];

        $where = [
            'faktur' => $faktur,
        ];

        $this->m_konsumsistok->update($where, $data);
        $this->session->set_userdata('tolak', 'Yeay, Data Berhasil Ditolak');
        return redirect('Sundries/Transaksi/c_permintaan/dashboard');
    }
}
?>
