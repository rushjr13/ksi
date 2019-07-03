<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

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

	public function profil()
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
		$data['judul'] = "Profil Saya";
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/sidebar', $data);
		$this->load->view('template/admin/topbar', $data);
		$this->load->view('admin/pengguna/index', $data);
		$this->load->view('template/admin/footer', $data);
	}

	public function ubahprofil()
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
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required',[
			'required' => 'Nama Lengkap Harus Diisi!'
		]);
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required',[
			'required' => 'Jenis Kelamin Harus Dipilih!'
		]);

		if ($this->form_validation->run() == FALSE){
			$data['judul'] = "Ubah Profil";
			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/sidebar', $data);
			$this->load->view('template/admin/topbar', $data);
			$this->load->view('admin/pengguna/ubah', $data);
			$this->load->view('template/admin/footer', $data);
		} else {
			// UPDATE PENGGUNA
			$data = [
				'nama_lengkap'=>$this->input->post('nama_lengkap'),
				'jk'=>$this->input->post('jk')
			];

			// Cek foto yang diupload
			$foto_upload = $_FILES['foto']['name'];

			if($foto_upload){
				$config['allowed_types']	= 'png|jpg|jpeg|bmp|gif';
				$config['max_size']			= '1024';
				$config['upload_path']		= './assets/admin/img/pengguna/';
				$this->load->library('upload', $config);
				if($this->upload->do_upload('foto')){
					$foto_lama = $this->input->post('fotolama');
					if($foto_lama!='user.png'){
						unlink(FCPATH.'assets/admin/img/pengguna/'.$foto_lama);
					}
					$foto_baru = $this->upload->data('file_name');
					$this->db->set('foto', $foto_baru);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set($data);
			$this->db->where('id_pengguna', $this->input->post('id_pengguna'));
			$this->db->update('pengguna');

			// PEMBERITAHUAN
			$data_pemberitahuan = [
				'tgl_pemberitahuan'=>time(),
				'isi_pemberitahuan'=>$this->input->post('nama_lengkap').' telah memperbarui profil.',
				'id_pengguna'=>$this->input->post('id_pengguna'),
				'baca'=>0
			];
			$this->db->insert('pemberitahuan', $data_pemberitahuan);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> Profil anda telah diperbarui!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('pengguna/profil');
		}
	}

	public function gantikatasandi()
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
		$this->form_validation->set_rules('passlama', 'Kata Sandi Lama', 'required',[
			'required' => 'Kata Sandi Lama Harus Diisi!'
		]);
		$this->form_validation->set_rules('password', 'Kata Sandi Lama', 'required|matches[passlama]',[
			'required' => 'Kata Sandi Lama Harus Diisi!',
			'matches' => 'Kata Sandi Lama Salah!'
		]);
		$this->form_validation->set_rules('passbaru1', 'Kata Sandi Baru', 'required|min_length[6]',[
			'required' => 'Kata Sandi Baru Harus Diisi!',
			'min_length' => 'Kata Sandi Baru Terlalu Pendek (Minimal 6 Karakter)!'
		]);
		$this->form_validation->set_rules('passbaru2', 'Kata Sandi Baru', 'required|matches[passbaru1]',[
			'required' => 'Kata Sandi Baru Harus Diisi!',
			'matches' => 'Kata Sandi Baru Tidak Cocok!'
		]);

		if ($this->form_validation->run() == FALSE){
			$data['judul'] = "Ganti Kata Sandi";
			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/sidebar', $data);
			$this->load->view('template/admin/topbar', $data);
			$this->load->view('admin/pengguna/katasandi', $data);
			$this->load->view('template/admin/footer', $data);
		} else {
			// UPDATE KATA SANDI

			$this->db->set('password', $this->input->post('passbaru2'));
			$this->db->where('id_pengguna', $this->input->post('id_pengguna'));
			$this->db->update('pengguna');

			// PEMBERITAHUAN
			$data_pemberitahuan = [
				'tgl_pemberitahuan'=>time(),
				'isi_pemberitahuan'=>$this->input->post('nama_lengkap').' telah memperbarui kata sandi.',
				'id_pengguna'=>$this->input->post('id_pengguna'),
				'baca'=>0
			];
			$this->db->insert('pemberitahuan', $data_pemberitahuan);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> Kata sandi anda telah diperbarui!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('pengguna/profil');
		}
	}
}
