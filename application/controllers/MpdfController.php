<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class MpdfController extends MY_Controller {
	public function __construct(){
    		parent::__construct();
    		$this->load->model('M_user');
  	}
 
	public function index()
	{
		$data = $this->load->view('v_mpdf');
	}

	public function preview($no, $tahun, $jenis, $status)
	{
		if ($jenis == 'Spesialis'){ $jenis = 'S';} else { $jenis = 'P';}

		 	$data['tahun']  = $tahun;
    		$data['no_rem']  = $no;
    		$data['jenis']  = $jenis;
    		$data['status']  = $status;

    	if (isset($tahun)) {
	      if ($jenis == 'P' AND $status == 'INPUT') {
	        $data['rinc'] = $this->M_user->data_rinc_reimburse_S($no, $tahun);
	      } elseif ($jenis == 'S') {
	        $data['rinc'] = $this->M_user->data_rinc_reimburse_S($no, $tahun);
	      } elseif ($jenis == 'P') {
	        $data['rinc'] = $this->M_user->data_rinc_reimburse($no, $tahun);
	      }

	    }

		$data = $this->load->view('v_mpdf', $data);
		// echo $tahun.'-'.$no.'-'.$jenis.'-'.$status;

		// echo "<pre>";
		// print_r($data);
		// echo "<pre>";
	}
 
	public function printPDF($no, $tahun, $jenis, $status)
	{
		if ($jenis == 'Spesialis'){ $jenis = 'S';} else { $jenis = 'P';}

		 	$dato['tahun']  = $tahun;
    		$dato['no_rem']  = $no;
    		$dato['jenis']  = $jenis;
    		$dato['status']  = $status;

    	if (isset($tahun)) {
	      if ($jenis == 'P' AND $status == 'INPUT') {
	        $dato['rinc'] = $this->M_user->data_rinc_reimburse_S($no, $tahun);
	      } elseif ($jenis == 'S') {
	        $dato['rinc'] = $this->M_user->data_rinc_reimburse_S($no, $tahun);
	      } elseif ($jenis == 'P') {
	        $dato['rinc'] = $this->M_user->data_rinc_reimburse($no, $tahun);
	      }

	    }

		$mpdf = new \Mpdf\Mpdf();
		$data = $this->load->view('v_mpdf', [], TRUE);
		$mpdf->WriteHTML($data);
		$mpdf->Output();
	}
 
}