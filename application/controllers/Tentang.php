<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {

	public function index()
	{
		// UMUM
		$data['pengguna_masuk'] = $this->session->userdata('id_user_masuk');
		$data['pengaturan'] = $this->Admin_model->pengaturan();
		$data['menulanding'] = $this->Admin_model->menulandingaktif();

		// KHUSUS
		$data['judul'] = "Tentang Kami";
		$data['monev'] = $this->Admin_model->monev();
		$data['siapa_kami'] = $this->Admin_model->siapa_kami();
		$data['visi'] = $this->Admin_model->visi();
		$data['misi'] = $this->Admin_model->misi();
		$data['pegawai'] = $this->Admin_model->pegawai();
		$this->load->view('template/landing/header', $data);
		$this->load->view('template/landing/navbar', $data);
		$this->load->view('landing/tentang', $data);
		$this->load->view('template/landing/footer', $data);
	}
}
