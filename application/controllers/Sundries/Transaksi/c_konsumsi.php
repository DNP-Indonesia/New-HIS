<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
        $data['permintaan'] = $this->m_konsumsi->getPermintaan();
        $data['kepalabagian'] = $this->m_konsumsi->forKepalaBagian();
        $data['allkonsumsi'] = $this->m_konsumsi->getKonsumsiAll();

        $menu = 'konsumsi';
        $this->render_backend('Sundries/Transaksi/Konsumsi/v_konsumsi', $menu, $data);
    }

    public function barangDetailSundries()
    {
        $id_detail_sundries = $this->input->post('id_detail_sundries'); // Mengambil id_detail_sundries dari permintaan POST
        $data = $this->m_konsumsi->getBarangById($id_detail_sundries); // Memanggil model untuk mencari barang berdasarkan id_detail_sundries

        $output = []; // Buat array kosong untuk menyimpan data barang

        foreach ($data as $row) {
            $output[] = [
                'faris' => $row->faktur,
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

    public function addKonsumsi()
    {
        $faktur = $this->input->post('faktur');
        $tanggal = $this->input->post('tanggal');
        $iduser = $this->input->post('id_user');
        $status = $this->input->post('status');
        $nama = $this->input->post('nama');
        $faris = $this->input->post('faris');
        $id_barang = $this->input->post('id_barang');
        $qty = $this->input->post('qty');

        $data = [
            'faktur' => $faktur,
            'nama_peminta' => $nama,
            'id_user' => $iduser,
            'tanggal' => $tanggal,
            'status' => $status,
            'faris' => $faris,
            'id_barang' => $id_barang,
            'jumlah' => $qty
        ];

        $this->m_konsumsi->save($data, $iduser, $faktur, $faris);
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

        $data = [
            'status' => $status,
        ];

        $where = [
            'faktur' => $faktur,
        ];

        $this->m_konsumsi->update($where, $data);
        $this->session->set_userdata('sukses', 'Yeay, Data Berhasil Disetujui');
        return redirect('Sundries/Transaksi/c_permintaan/dashboard');
    }

    public function rejectKonsumsi()
    {
        $faktur = $this->input->post('faktur');
        $status = $this->input->post('status');

        $data = [
            'status' => $status,
        ];

        $where = [
            'faktur' => $faktur,
        ];

        $this->m_konsumsi->update($where, $data);
        $this->session->set_userdata('tolak', 'Yeay, Data Berhasil Ditolak');
        return redirect('Sundries/Transaksi/c_permintaan/dashboard');
    }
}
?>
