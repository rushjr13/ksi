<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('id_user_masuk')){
			redirect(base_url('admin'));
		}
		// UMUM
		$data['pengaturan'] = $this->Admin_model->pengaturan();

		// KHUSUS
		$this->form_validation->set_rules('username', 'Nama Pengguna', 'required',[
			'required' => 'Nama Pengguna Harus Diisi!'
		]);
		$this->form_validation->set_rules('password', 'Kata Sandi', 'required',[
			'required' => 'Kata Sandi Harus Diisi!'
		]);

		if ($this->form_validation->run() == FALSE){
			$data['judul'] = "Masuk";
			$this->load->view('template/admin/auth/header', $data);
			$this->load->view('admin/auth/index', $data);
			$this->load->view('template/admin/auth/footer', $data);
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$cek_pengguna = $this->Admin_model->cek_pengguna($username);
			$pengguna = $cek_pengguna->row_array();
			if($cek_pengguna->num_rows()>0){
				if($password == $pengguna['password']){
					if($pengguna['status']==1){
						$this->session->set_userdata('id_user_masuk', $pengguna['id_pengguna']);
						$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
																  <i class="fa fa-fw fa-info-circle"></i> Selamat Datang <strong>'.$pengguna['nama_lengkap'].'</strong> ! Kami Senang Melihat Anda Kembali.
																  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																    <span aria-hidden="true">&times;</span>
																  </button>
																</div>');
						if($pengguna['id_level']==1){
							redirect('admin');
						} else {
							redirect('user');
						}
					} else {
						$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
																  <i class="fa fa-fw fa-ban"></i> Pengguna <strong>'.$pengguna['nama_lengkap'].'</strong> belum aktif! Silahkan hubungi <strong>Administrator</strong> untuk aktivasi Akun Anda!
																  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																    <span aria-hidden="true">&times;</span>
																  </button>
																</div>');
						redirect('auth');
					}
				} else {
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-ban"></i> Kata Sandi Salah!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-ban"></i> Nama Pengguna Salah!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('auth');
			}
		}
	}

	// DAFTAR PENGUNA
	public function daftar()
	{
		if($this->session->userdata('id_user_masuk')){
			redirect(base_url('admin'));
		}
		// UMUM
		$data['pengaturan'] = $this->Admin_model->pengaturan();

		// KHUSUS
		$data['judul'] = "Daftar Akun Baru";
		$this->load->view('template/admin/auth/header', $data);
		$this->load->view('admin/auth/daftar', $data);
		$this->load->view('template/admin/auth/footer', $data);
	}

	// LUPA KATA SANDI
	public function lupasandi()
	{
		if($this->session->userdata('id_user_masuk')){
			redirect(base_url('admin'));
		}
		// UMUM
		$data['pengaturan'] = $this->Admin_model->pengaturan();

		// KHUSUS
		$data['judul'] = "Lupa Kata Sandi";
		$this->load->view('template/admin/auth/header', $data);
		$this->load->view('admin/auth/lupasandi', $data);
		$this->load->view('template/admin/auth/footer', $data);
	}

	// KELUAR
	public function keluar()
	{
		$this->session->unset_userdata('id_user_masuk');
		$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
												  <i class="fa fa-fw fa-info-circle"></i> Anda Telah Keluar!
												  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
												    <span aria-hidden="true">&times;</span>
												  </button>
												</div>');
		redirect('auth');
	}
}
