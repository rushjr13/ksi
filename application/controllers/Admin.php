<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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

	public function pengaturan()
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
		$this->form_validation->set_rules('nama_web', 'Nama Website / Aplikasi', 'required',[
			'required' => 'Nama Website / Aplikasi Harus Diisi!'
		]);
		$this->form_validation->set_rules('alias', 'Alias (Singkatan)', 'required',[
			'required' => 'Alias (Singkatan) Harus Diisi!'
		]);
		$this->form_validation->set_rules('url', 'Alamat Website / URL', 'required',[
			'required' => 'Alamat Website / URL Harus Diisi!'
		]);
		$this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required',[
			'required' => 'Alamat Lengkap Harus Diisi!'
		]);
		$this->form_validation->set_rules('telpon', 'Nomor Telepon', 'required',[
			'required' => 'Nomor Telepon Harus Diisi!'
		]);
		$this->form_validation->set_rules('email', 'Alamat Email', 'required',[
			'required' => 'Alamat Email Harus Diisi!'
		]);
		$this->form_validation->set_rules('jam_kerja', 'Jam Kerja', 'required',[
			'required' => 'Jam Kerja Harus Diisi!'
		]);

		if ($this->form_validation->run() == FALSE){
			$data['judul'] = "Pengaturan";
			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/sidebar', $data);
			$this->load->view('template/admin/topbar', $data);
			$this->load->view('admin/pengaturan', $data);
			$this->load->view('template/admin/footer', $data);
		} else {
			$data = [
				'nama_web'=>$this->input->post('nama_web'),
				'alias'=>$this->input->post('alias'),
				'url'=>$this->input->post('url'),
				'alamat'=>$this->input->post('alamat'),
				'telpon'=>$this->input->post('telpon'),
				'email'=>$this->input->post('email'),
				'jam_kerja'=>$this->input->post('jam_kerja'),
				'facebook'=>$this->input->post('facebook'),
				'instagram'=>$this->input->post('instagram'),
				'twitter'=>$this->input->post('twitter')
			];

			// Cek logo yang diupload
			$logo_upload = $_FILES['logo']['name'];

			if($logo_upload){
				$config['allowed_types']	= 'png';
				$config['max_size']			= '1024';
				$config['upload_path']		= './assets/admin/img/';
				$this->load->library('upload', $config);
				if($this->upload->do_upload('logo')){
					$logo_lama = $this->input->post('logolama');
					if($logo_lama!='logo.png'){
						unlink(FCPATH.'assets/admin/img/'.$logo_lama);
					}
					$logo_baru = $this->upload->data('file_name');
					$this->db->set('logo', $logo_baru);
				} else {
					echo $this->upload->display_errors();
				}
			}

			// Cek icon yang diupload
			$icon_upload = $_FILES['icon']['name'];

			if($icon_upload){
				$config['allowed_types']	= 'png';
				$config['max_size']			= '1024';
				$config['upload_path']		= './assets/admin/img/';
				$this->load->library('upload', $config);
				if($this->upload->do_upload('icon')){
					$icon_lama = $this->input->post('iconlama');
					if($icon_lama!='icon.png'){
						unlink(FCPATH.'assets/admin/img/'.$icon_lama);
					}
					$icon_baru = $this->upload->data('file_name');
					$this->db->set('icon', $icon_baru);
				} else {
					echo $this->upload->display_errors();
				}
			}

			$this->db->set($data);
			$this->db->where('id', 'atur');
			$this->db->update('pengaturan');

			$data_pemberitahuan = [
				'tgl_pemberitahuan'=>time(),
				'isi_pemberitahuan'=>'Pengaturan website telah diperbarui',
				'id_pengguna'=>$id_pengguna,
				'baca'=>0
			];
			$this->db->insert('pemberitahuan', $data_pemberitahuan);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> Pengaturan Website telah diperbarui!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('admin/pengaturan');
		}
	}

	public function menu($opsi=null, $aksi=null, $id=null)
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

		// Khusus
		if($opsi==null){
			$data['judul'] = 'Menu Manajemen';
			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/sidebar', $data);
			$this->load->view('template/admin/topbar', $data);
			$this->load->view('admin/menu/index', $data);
			$this->load->view('template/admin/footer', $data);
		} else if($opsi=='tambah'){
			$this->form_validation->set_rules('namamenu', 'Nama Menu', 'required',[
				'required' => 'Nama Menu Harus Diisi!'
			]);

			if ($this->form_validation->run() == FALSE){
				$this->menu();
			} else {
				$namamenu = $this->input->post('namamenu');

				// Cek Nama Menu Apabila Sudah Ada
				$cekmenu = $this->db->get_where('menu', ['nama_menu'=>$namamenu]);
				if($cekmenu->num_rows()<1){
					$this->db->insert('menu', ['nama_menu'=>$namamenu]);
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Menu <strong>'.$namamenu.'</strong> Telah Ditambahkan!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('menu');
				} else {
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-exclamation"></i> Menu <strong>'.$namamenu.'</strong> Sudah Ada!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('admin/menu');
				}
			}
		} else if($opsi=='ubah'){
			$this->form_validation->set_rules('namamenu', 'Nama Menu', 'required',[
				'required' => 'Nama Menu Harus Diisi!'
			]);

			if ($this->form_validation->run() == FALSE){
				$this->menu();
			} else {
				$idmenu = $this->input->post('id');
				$namamenu = $this->input->post('namamenu');

				// Cek Nama Menu Apabila Sudah Ada
				$cekmenu = $this->db->get_where('menu', ['nama_menu'=>$namamenu]);
				if($cekmenu->num_rows()<1){
					$this->db->set('nama_menu', $namamenu);
					$this->db->where('id_menu', $idmenu);
					$this->db->update('menu');
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Menu <strong>'.$namamenu.'</strong> Telah Diperbarui!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('admin/menu');
				} else {
					$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-exclamation"></i> Menu <strong>'.$namamenu.'</strong> Sudah Ada!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('admin/menu');
				}
			}
		} else if($opsi=='hapus'){
			$idmenu = $this->input->post('id');
			$namamenu = $this->input->post('namamenu');
			$this->db->where('id_menu', $idmenu);
			$this->db->delete('menu');
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> Menu <strong>'.$namamenu.'</strong> Telah Dihapus!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('admin/menu');
		} else if($opsi=='submenu'){
			if($aksi==null){
				$data['judul'] = 'Menu Manajemen';
				$data['subjudul'] = 'Sub Menu';
				$this->load->view('template/admin/header', $data);
				$this->load->view('template/admin/sidebar', $data);
				$this->load->view('template/admin/topbar', $data);
				$this->load->view('admin/menu/submenu', $data);
				$this->load->view('template/admin/footer', $data);
			} else if($aksi=='tambah'){
				$this->form_validation->set_rules('namasubmenu', 'Nama Sub Menu', 'required',[
					'required' => 'Nama Sub Menu Harus Diisi!'
				]);
				$this->form_validation->set_rules('menu', 'Menu', 'required',[
					'required' => 'Menu Harus Dipilih!'
				]);
				$this->form_validation->set_rules('url', 'Link/URL Sub Menu', 'required',[
					'required' => 'Link/URL Sub Menu Harus Diisi!'
				]);
				$this->form_validation->set_rules('icon', 'Icon Sub Menu', 'required',[
					'required' => 'Icon Sub Menu Harus Diisi!'
				]);

				if ($this->form_validation->run() == FALSE){
					$this->submenu();
				} else {
					$namasubmenu = $this->input->post('namasubmenu');

					// Cek Nama Sub Menu Apabila Sudah Ada
					$ceksubmenu = $this->db->get_where('submenu', ['nama_submenu'=>$namasubmenu]);
					if($ceksubmenu->num_rows()<1){
						$data = [
							'id_menu' => $this->input->post('menu'),
							'nama_submenu' => $namasubmenu,
							'url' => $this->input->post('url'),
							'icon' => $this->input->post('icon'),
							'status' => 1
						];
						$this->db->insert('submenu', $data);
						$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
																  <i class="fa fa-fw fa-info-circle"></i> Sub Menu <strong>'.$namasubmenu.'</strong> Telah Ditambahkan!
																  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																    <span aria-hidden="true">&times;</span>
																  </button>
																</div>');
						redirect('admin/menu/submenu');
					} else {
						$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
																  <i class="fa fa-fw fa-exclamation"></i> Sub Menu <strong>'.$namasubmenu.'</strong> Sudah Ada!
																  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
																    <span aria-hidden="true">&times;</span>
																  </button>
																</div>');
						redirect('admin/menu/submenu');
					}
				}
			} else if($aksi=='ubah'){
				$this->form_validation->set_rules('namasubmenu', 'Nama Sub Menu', 'required',[
					'required' => 'Nama Sub Menu Harus Diisi!'
				]);
				$this->form_validation->set_rules('menu', 'Menu', 'required',[
					'required' => 'Menu Harus Dipilih!'
				]);
				$this->form_validation->set_rules('url', 'Link/URL Sub Menu', 'required',[
					'required' => 'Link/URL Sub Menu Harus Diisi!'
				]);
				$this->form_validation->set_rules('icon', 'Icon Sub Menu', 'required',[
					'required' => 'Icon Sub Menu Harus Diisi!'
				]);

				if ($this->form_validation->run() == FALSE){
					$data['submenu_id'] = $this->Admin_model->submenu($id);
					$data['judul'] = 'Sub Menu';
					$this->load->view('template/admin/header', $data);
					$this->load->view('template/admin/sidebar', $data);
					$this->load->view('template/admin/topbar', $data);
					$this->load->view('admin/menu/ubah_submenu', $data);
					$this->load->view('template/admin/footer', $data);
				} else {
					$id_submenu = $this->input->post('id_submenu');
					$namasubmenu = $this->input->post('namasubmenu');

					$data = [
						'id_menu'=>$this->input->post('menu'),
						'nama_submenu'=>$namasubmenu,
						'url'=>$this->input->post('url'),
						'icon'=>$this->input->post('icon')
					];
					
					$this->db->set($data);
					$this->db->where('id_submenu', $id_submenu);
					$this->db->update('submenu');
					$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
															  <i class="fa fa-fw fa-info-circle"></i> Sub Menu <strong>'.$namasubmenu.'</strong> Telah Diperbarui!
															  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
															    <span aria-hidden="true">&times;</span>
															  </button>
															</div>');
					redirect('admin/menu/submenu');
				}
			} else if($aksi=='status'){
				$id = $this->input->post('id');
				$nama = $this->input->post('nama');
				$ket = $this->input->post('ket');
				$status = $this->input->post('status');
				
				$this->db->set('status', $status);
				$this->db->where('id_submenu', $id);
				$this->db->update('submenu');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Sub Menu <strong>'.$nama.'</strong> Telah Di <strong>'.$ket.'</strong> !
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('admin/menu/submenu');
			} else if($aksi=='hapus'){
				$idmenu = $this->input->post('id');
				$namamenu = $this->input->post('namamenu');
				$this->db->where('id_submenu', $idmenu);
				$this->db->delete('submenu');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Menu <strong>'.$namamenu.'</strong> Telah Dihapus!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('admin/menu/submenu');
			}
		}
	}

	// PENGGUNA
	public function pengguna($opsi=null, $id=null)
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

		// Khusus
		if($opsi==null){
			$data['pengguna'] = $this->Admin_model->daftarpengguna($id_pengguna);
			$data['judul'] = 'Pengguna';
			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/sidebar', $data);
			$this->load->view('template/admin/topbar', $data);
			$this->load->view('admin/user/index', $data);
			$this->load->view('template/admin/footer', $data);
		} else if($opsi=='tambah'){
			$this->form_validation->set_rules('username', 'Nama Pengguna', 'required|is_unique[pengguna.username]',[
				'required' => 'Nama Pengguna Harus Diisi!',
				'is_unique' => 'Nama Pengguna Sudah Ada!'
			]);
			$this->form_validation->set_rules('password', 'Kata Sandi', 'required',[
				'required' => 'Kata Sandi Harus Diisi!'
			]);
			$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required',[
				'required' => 'Nama Lengkap Harus Diisi!'
			]);
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[pengguna.email]',[
				'required' => 'Email Harus Diisi!',
				'valid_email' => 'Email tidak valid',
				'is_unique' => 'Email Sudah Terdaftar!'
			]);
			$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required',[
				'required' => 'Pilih Jenis Kelamin!'
			]);
			$this->form_validation->set_rules('id_level', 'Level', 'required',[
				'required' => 'Level Harus Dipilih!'
			]);

			if ($this->form_validation->run() == FALSE){
				$data['level'] = $this->Admin_model->level();
				$data['judul'] = 'Pengguna';
				$this->load->view('template/admin/header', $data);
				$this->load->view('template/admin/sidebar', $data);
				$this->load->view('template/admin/topbar', $data);
				$this->load->view('admin/user/tambah', $data);
				$this->load->view('template/admin/footer', $data);
			} else {
				$data = [
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'nama_lengkap' => $this->input->post('nama_lengkap'),
					'email' => $this->input->post('email'),
					'jk' => $this->input->post('jk'),
					'id_level' => $this->input->post('id_level'),
					'status' => 0,
					'tgl_daftar' => time()
				];
				$this->db->insert('pengguna', $data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> <strong>'.$this->input->post('nama_lengkap').'</strong> telah ditambahkan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('admin/pengguna');
			}
		} else if($opsi=='detail'){
			$this->form_validation->set_rules('username', 'Nama Pengguna', 'required',[
				'required' => 'Nama Pengguna Harus Diisi!'
			]);
			$this->form_validation->set_rules('password', 'Kata Sandi', 'required',[
				'required' => 'Kata Sandi Harus Diisi!'
			]);
			$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required',[
				'required' => 'Nama Lengkap Harus Diisi!'
			]);
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email',[
				'required' => 'Email Harus Diisi!',
				'valid_email' => 'Email tidak valid'
			]);
			$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required',[
				'required' => 'Pilih Jenis Kelamin!'
			]);
			$this->form_validation->set_rules('id_level', 'Level', 'required',[
				'required' => 'Level Harus Dipilih!'
			]);

			if ($this->form_validation->run() == FALSE){
				$data['pengguna'] = $this->Admin_model->pengguna($id);
				$data['level'] = $this->Admin_model->level();
				$data['judul'] = 'Pengguna';
				$this->load->view('template/admin/header', $data);
				$this->load->view('template/admin/sidebar', $data);
				$this->load->view('template/admin/topbar', $data);
				$this->load->view('admin/user/detail', $data);
				$this->load->view('template/admin/footer', $data);
			} else {
				$pengguna = $this->Admin_model->pengguna($id);
				$nama_lengkap = $pengguna['nama_lengkap'];
				$email = $pengguna['email'];

				if($email != $this->input->post('email')){
					$this->db->set('email', $this->input->post('email'));
				}
				$data = [
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'nama_lengkap' => $this->input->post('nama_lengkap'),
					'jk' => $this->input->post('jk'),
					'id_level' => $this->input->post('id_level')
				];
				$this->db->set($data);
				$this->db->where('id_pengguna', $id);
				$this->db->update('pengguna');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Data <strong>'.$nama_lengkap.'</strong> telah diperbarui!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('admin/pengguna');
			}
		} else if($opsi=='status'){
			$pengguna = $this->Admin_model->pengguna($id);
			$status = $pengguna['status'];
			$nama_lengkap = $pengguna['nama_lengkap'];
			if($status==1){
				$this->db->set('status', 0);
				$this->db->where('id_pengguna', $id);
				$this->db->update('pengguna');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> <strong>'.$nama_lengkap.'</strong> telah di-<strong>Non Aktifkan</strong>!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('admin/pengguna');
			} else {
				$this->db->set('status', 1);
				$this->db->where('id_pengguna', $id);
				$this->db->update('pengguna');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> <strong>'.$nama_lengkap.'</strong> telah di-<strong>Aktifkan</strong>!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('admin/pengguna');
			}
		} else if($opsi=='hapus'){
			$pengguna = $this->Admin_model->pengguna($id);
			$nama_lengkap = $pengguna['nama_lengkap'];
			$this->db->where('id_pengguna', $id);
			$this->db->delete('pengguna');
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> <strong>'.$nama_lengkap.'</strong> telah dihapus!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('admin/pengguna');
		}
	}

	// OBROLAN
	public function obrolan($opsi=null, $id=null)
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

		// Khusus
		if($opsi==null){
			$data['obrolan_pengguna'] = $this->Admin_model->obrolan_pengguna($id_pengguna);
			$data['judul'] = 'Obrolan';
			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/sidebar', $data);
			$this->load->view('template/admin/topbar', $data);
			$this->load->view('admin/obrolan/index', $data);
			$this->load->view('template/admin/footer', $data);
		} else if($opsi=='kirim'){
			$datapesan = [
				'id_obrolan' => $this->input->post('id_obrolan'),
				'tgl_pesan' => time(),
				'isi_pesan' => $this->input->post('isi_pesan'),
				'id_pengirim' => $this->input->post('id_pengirim'),
				'id_penerima' => $this->input->post('id_penerima'),
				'status_pesan' => 0
			];
			$this->db->insert('pesan', $datapesan);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> Pesan telah terkirim kepada <strong>'.$this->input->post('nama_penerima').'</strong> !
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('admin/obrolan');
		} else if($opsi=='detail'){
			$this->form_validation->set_rules('username', 'Nama Pengguna', 'required',[
				'required' => 'Nama Pengguna Harus Diisi!'
			]);
			$this->form_validation->set_rules('password', 'Kata Sandi', 'required',[
				'required' => 'Kata Sandi Harus Diisi!'
			]);
			$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required',[
				'required' => 'Nama Lengkap Harus Diisi!'
			]);
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email',[
				'required' => 'Email Harus Diisi!',
				'valid_email' => 'Email tidak valid'
			]);
			$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required',[
				'required' => 'Pilih Jenis Kelamin!'
			]);
			$this->form_validation->set_rules('id_level', 'Level', 'required',[
				'required' => 'Level Harus Dipilih!'
			]);

			if ($this->form_validation->run() == FALSE){
				$data['pengguna'] = $this->Admin_model->pengguna($id);
				$data['level'] = $this->Admin_model->level();
				$data['judul'] = 'Pengguna';
				$this->load->view('template/admin/header', $data);
				$this->load->view('template/admin/sidebar', $data);
				$this->load->view('template/admin/topbar', $data);
				$this->load->view('admin/user/detail', $data);
				$this->load->view('template/admin/footer', $data);
			} else {
				$pengguna = $this->Admin_model->pengguna($id);
				$nama_lengkap = $pengguna['nama_lengkap'];
				$email = $pengguna['email'];

				if($email != $this->input->post('email')){
					$this->db->set('email', $this->input->post('email'));
				}
				$data = [
					'username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'nama_lengkap' => $this->input->post('nama_lengkap'),
					'jk' => $this->input->post('jk'),
					'id_level' => $this->input->post('id_level')
				];
				$this->db->set($data);
				$this->db->where('id_pengguna', $id);
				$this->db->update('pengguna');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Data <strong>'.$nama_lengkap.'</strong> telah diperbarui!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('admin/pengguna');
			}
		} else if($opsi=='status'){
			$pengguna = $this->Admin_model->pengguna($id);
			$status = $pengguna['status'];
			$nama_lengkap = $pengguna['nama_lengkap'];
			if($status==1){
				$this->db->set('status', 0);
				$this->db->where('id_pengguna', $id);
				$this->db->update('pengguna');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> <strong>'.$nama_lengkap.'</strong> telah di-<strong>Non Aktifkan</strong>!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('admin/pengguna');
			} else {
				$this->db->set('status', 1);
				$this->db->where('id_pengguna', $id);
				$this->db->update('pengguna');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> <strong>'.$nama_lengkap.'</strong> telah di-<strong>Aktifkan</strong>!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('admin/pengguna');
			}
		} else if($opsi=='hapus'){
			$pengguna = $this->Admin_model->pengguna($id);
			$nama_lengkap = $pengguna['nama_lengkap'];
			$this->db->where('id_pengguna', $id);
			$this->db->delete('pengguna');
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> <strong>'.$nama_lengkap.'</strong> telah dihapus!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('admin/pengguna');
		}
	}
}
