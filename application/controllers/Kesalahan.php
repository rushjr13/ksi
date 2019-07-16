<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kesalahan extends CI_Controller {

	public function index()
	{
		// UMUM
		$data['pengguna_masuk'] = $this->session->userdata('id_user_masuk');
		$data['pengaturan'] = $this->Admin_model->pengaturan();
		$data['menulanding'] = $this->Admin_model->menulandingaktif();

		// KHUSUS
		$this->load->view('template/landing/header', $data);
		$this->load->view('template/landing/navbar', $data);
		$this->load->view('kesalahan', $data);
		$this->load->view('template/landing/footer', $data);
	}
}
