<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->Admin_model->cek_masuk();
    }

	public function index()
	{
		// Umum
		$id_pengguna = $this->session->userdata('id_user_masuk');
		$data['pengguna_masuk'] = $this->Admin_model->pengguna($id_pengguna);
		$data['pengaturan'] = $this->Admin_model->pengaturan();
		$data['pemberitahuan'] = $this->Admin_model->pemberitahuan();
		$data['email_masuk'] = $this->Admin_model->email_masuk();
		$data['tgl_sekarang'] = $this->Admin_model->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->Admin_model->hari(date('l'));
		$data['menu'] = $this->Admin_model->menu();
		$data['submenu'] = $this->Admin_model->submenu();

		// KHUSUS
		$data['judul'] = "Beranda";
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/sidebar', $data);
		$this->load->view('template/admin/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('template/admin/footer', $data);
	}
}
