<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

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
		$data['judul'] = "Landing";
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/sidebar', $data);
		$this->load->view('template/admin/topbar', $data);
		$this->load->view('admin/landing/index', $data);
		$this->load->view('template/admin/footer', $data);
	}

	public function menu($opsi=null, $aksi=null)
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
		if($opsi==null){
			$data['judul'] = "Menu";
			$data['menulanding'] = $this->Admin_model->menulanding();
			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/sidebar', $data);
			$this->load->view('template/admin/topbar', $data);
			$this->load->view('admin/landing/menu', $data);
			$this->load->view('template/admin/footer', $data);
		} else if($opsi=='tambah'){
			$this->form_validation->set_rules('nama_ml', 'Nama Menu Landing', 'required|is_unique[menu_landing.nama_ml]',[
				'required' => 'Nama Menu Landing Harus Diisi!',
				'is_unique' => 'Menu Landing Sudah Ada!'
			]);
			$this->form_validation->set_rules('url_ml', 'Link / URL Menu Landing', 'required|is_unique[menu_landing.url_ml]',[
				'required' => 'Link / URL Menu Landing Harus Diisi!',
				'is_unique' => 'Link / URL Menu Landing Sudah Ada!'
			]);

			if ($this->form_validation->run() == FALSE){
				$this->menu();
			} else {
				$data = [
					'nama_ml'=>$this->input->post('nama_ml'),
					'url_ml'=>$this->input->post('url_ml'),
					'status_ml'=>1,
				];

				$this->db->insert('menu_landing', $data);

				$data_pemberitahuan = [
					'tgl_pemberitahuan'=>time(),
					'isi_pemberitahuan'=>'Menu Landing ('.$this->input->post('nama_ml').')telah ditambahkan',
					'id_pengguna'=>$id_pengguna,
					'baca'=>0
				];
				$this->db->insert('pemberitahuan', $data_pemberitahuan);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Menu Landing <strong>'.$this->input->post('nama_ml').'</strong> Telah Ditambahkan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('landing/menu');
			}
		} else if($opsi=='ubah'){
			$this->form_validation->set_rules('nama_ml', 'Nama Menu Landing', 'required|is_unique[menu_landing.nama_ml]',[
				'required' => 'Nama Menu Landing Harus Diisi!',
				'is_unique' => 'Menu Landing Sudah Ada!'
			]);
			$this->form_validation->set_rules('url_ml', 'Link / URL Menu Landing', 'required|is_unique[menu_landing.url_ml]',[
				'required' => 'Link / URL Menu Landing Harus Diisi!',
				'is_unique' => 'Link / URL Menu Landing Sudah Ada!'
			]);

			if ($this->form_validation->run() == FALSE){
				$this->menu();
			} else {
				$data = [
					'nama_ml'=>$this->input->post('nama_ml'),
					'url_ml'=>$this->input->post('url_ml')
				];

				$this->db->set($data);
				$this->db->where('id_ml', $this->input->post('id'));
				$this->db->update('menu_landing');

				$data_pemberitahuan = [
					'tgl_pemberitahuan'=>time(),
					'isi_pemberitahuan'=>'Menu Landing ('.$this->input->post('nama_ml').')telah diperbarui',
					'id_pengguna'=>$id_pengguna,
					'baca'=>0
				];
				$this->db->insert('pemberitahuan', $data_pemberitahuan);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Menu Landing <strong>'.$this->input->post('nama_ml').'</strong> Telah Diperbarui!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('landing/menu');
			}
		} else if($opsi=='status'){
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$ket = $this->input->post('ket');
			$status = $this->input->post('status');
			
			$this->db->set('status_ml', $status);
			$this->db->where('id_ml', $id);
			$this->db->update('menu_landing');
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> Menu Landing <strong>'.$nama.'</strong> Telah Di <strong>'.$ket.'</strong> !
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('landing/menu');
		} else if($opsi=='galeri'){
			$data['judul'] = "Menu";
			$data['subjudul'] = "Galeri";
			$data['galeri_lengkap'] = $this->Admin_model->galeri_lengkap();
			$data['galeri_kegiatan'] = $this->Admin_model->galeri_kegiatan();
			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/sidebar', $data);
			$this->load->view('template/admin/topbar', $data);
			$this->load->view('admin/landing/menu/galeri', $data);
			$this->load->view('template/admin/footer', $data);
		} else if($opsi=='tentang'){
			if($aksi==null){
				$data['judul'] = "Menu";
				$data['subjudul'] = "Tentang Kami";
				$data['monev'] = $this->Admin_model->monev();
				$data['siapa_kami'] = $this->Admin_model->siapa_kami();
				$data['visi'] = $this->Admin_model->visi();
				$data['misi'] = $this->Admin_model->misi();
				$data['pegawai'] = $this->Admin_model->pegawai();
				$this->load->view('template/admin/header', $data);
				$this->load->view('template/admin/sidebar', $data);
				$this->load->view('template/admin/topbar', $data);
				$this->load->view('admin/landing/menu/tentang/pilihan', $data);
				$this->load->view('admin/landing/menu/tentang/siapa_kami', $data);
				$this->load->view('admin/landing/menu/tentang/monev', $data);
				$this->load->view('admin/landing/menu/tentang/visi', $data);
				$this->load->view('admin/landing/menu/tentang/tim', $data);
				$this->load->view('admin/landing/menu/tentang/misi', $data);
				$this->load->view('template/admin/footer', $data);
			} else if($aksi=='siapa_kami'){
				$id = $this->input->post('idsiapakami');
				$ket = $this->input->post('ketsiapakami');
				$this->db->set('ket', $ket);
				$this->db->where('id', $id);
				$this->db->update('siapa_kami');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Penjelasan Tentang Siapa Kami Telah Diperbarui!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('landing/menu/tentang');
			} else if($aksi=='ubah_pagu'){
				$id = $this->input->post('id_monev');
				$pagu = $this->input->post('pagu_monev');
				$this->db->set('pagu', $pagu);
				$this->db->where('id', $id);
				$this->db->update('monev');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Pagu Anggaran Telah Diperbarui Menjadi <strong>Rp. '.number_format($pagu,0,',','.').'</strong> !
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('landing/menu/tentang');
			} else if($aksi=='ubah_realisasipagu'){
				$id = $this->input->post('id_monev');
				$realisasi = $this->input->post('realisasipagu_monev');
				$this->db->set('realisasi_pagu', $realisasi);
				$this->db->where('id', $id);
				$this->db->update('monev');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Realisasi Anggaran Telah Diperbarui Menjadi <strong>Rp. '.number_format($realisasi,0,',','.').'</strong> !
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('landing/menu/tentang');
			} else if($aksi=='ubah_tf'){
				$id = $this->input->post('id_monev');
				$tf = $this->input->post('tf_monev');
				$this->db->set('tf', $tf);
				$this->db->where('id', $id);
				$this->db->update('monev');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Target Fisik Telah Diperbarui Menjadi <strong>'.$tf.'%</strong> !
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('landing/menu/tentang');
			} else if($aksi=='ubah_rf'){
				$id = $this->input->post('id_monev');
				$rf = $this->input->post('rf_monev');
				$this->db->set('rf', $rf);
				$this->db->where('id', $id);
				$this->db->update('monev');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Realisasi Fisik Telah Diperbarui Menjadi <strong>'.$rf.'%</strong> !
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('landing/menu/tentang');
			} else if($aksi=='ubah_tk'){
				$id = $this->input->post('id_monev');
				$tk = $this->input->post('tk_monev');
				$this->db->set('tk', $tk);
				$this->db->where('id', $id);
				$this->db->update('monev');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Target Keuangan Telah Diperbarui Menjadi <strong>'.$tk.'%</strong> !
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('landing/menu/tentang');
			} else if($aksi=='ubah_rk'){
				$id = $this->input->post('id_monev');
				$rk = $this->input->post('rk_monev');
				$this->db->set('rk', $rk);
				$this->db->where('id', $id);
				$this->db->update('monev');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Realisasi Keuangan Telah DiperbaruiMenjadi <strong>'.$rk.'%</strong> !
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('landing/menu/tentang');
			} else if($aksi=='visi'){
				$id = $this->input->post('idvisi');
				$ket = $this->input->post('ketvisi');
				$this->db->set('ket', $ket);
				$this->db->where('id', $id);
				$this->db->update('visi');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Visi KSI Telah Diperbarui!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('landing/menu/tentang');
			} else if($aksi=='tambah_misi'){
				$judul_misi = $this->input->post('judul_misi');
				$ket_misi = $this->input->post('ket_misi');
				$data = [
					'judul_misi'=>$judul_misi,
					'ket_misi'=>$ket_misi,
				];
				$this->db->insert('misi', $data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Misi Telah Ditambahkan!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('landing/menu/tentang');
			} else if($aksi=='ubah_misi'){
				$id_misi = $this->input->post('id_misi');
				$judul_misi = $this->input->post('judul_misi');
				$ket_misi = $this->input->post('ket_misi');
				$data = [
					'judul_misi'=>$judul_misi,
					'ket_misi'=>$ket_misi,
				];
				$this->db->set($data);
				$this->db->where('id_misi', $id_misi);
				$this->db->update('misi');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Misi Telah Diperbarui!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('landing/menu/tentang');
			} else if($aksi=='hapus_misi'){
				$id_misi = $this->input->post('id_misi');
				$judul_misi = $this->input->post('judul_misi');
				$this->db->where('id_misi', $id_misi);
				$this->db->delete('misi');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Misi <strong>'.$judul_misi.'</strong> Telah Dihapus!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('landing/menu/tentang');
			}
		}
	}
}
