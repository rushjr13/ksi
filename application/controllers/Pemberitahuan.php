<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemberitahuan extends CI_Controller {

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
		$data['tgl_sekarang'] = $this->Admin_model->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->Admin_model->hari(date('l'));
		$data['menu'] = $this->Admin_model->menu();
		$data['submenu'] = $this->Admin_model->submenu();

		// KHUSUS
		$this->form_validation->set_rules('isi_pemberitahuan', 'Pemberitahuan', 'required',[
			'required' => 'Pemberitahuan Harus Diisi!'
		]);

		if ($this->form_validation->run() == FALSE){
			$data['judul'] = "Pemberitahuan";
			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/sidebar', $data);
			$this->load->view('template/admin/topbar', $data);
			$this->load->view('admin/pemberitahuan/index', $data);
			$this->load->view('template/admin/footer', $data);
		} else {
			$data = [
				'tgl_pemberitahuan'=>$this->input->post('tgl_pemberitahuan'),
				'isi_pemberitahuan'=>$this->input->post('isi_pemberitahuan'),
				'id_pengguna'=>$this->input->post('id_pengguna'),
				'baca'=>0
			];
			$this->db->insert('pemberitahuan', $data);
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> Pemberitahuan telah ditambah!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('pemberitahuan');
		}
	}

	public function lihat($id=null)
	{
		// Umum
		$id_pengguna = $this->session->userdata('id_user_masuk');
		$data['pengguna_masuk'] = $this->Admin_model->pengguna($id_pengguna);
		$data['pengaturan'] = $this->Admin_model->pengaturan();
		$data['pemberitahuan'] = $this->Admin_model->pemberitahuan();
		$data['tgl_sekarang'] = $this->Admin_model->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->Admin_model->hari(date('l'));
		$data['menu'] = $this->Admin_model->menu();
		$data['submenu'] = $this->Admin_model->submenu();

		if($id==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> Tidak ada pemberitahuan untuk ditampilkan!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('pemberitahuan');
		} else{
			// Ubah status berita menjadi sudah dibaca
			$this->db->set('baca', 1);
			$this->db->where('id_pemberitahuan', $id);
			$this->db->update('pemberitahuan');

			// KHUSUS
			$data['judul'] = "Pemberitahuan";
			$data['pemberitahuan_id'] = $this->Admin_model->pemberitahuan($id);
			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/sidebar', $data);
			$this->load->view('template/admin/topbar', $data);
			$this->load->view('admin/pemberitahuan/lihat', $data);
			$this->load->view('template/admin/footer', $data);
		}
	}

	public function hapus($opsi, $id=null)
	{
		// Umum
		$id_pengguna = $this->session->userdata('id_user_masuk');
		$data['pengguna_masuk'] = $this->Admin_model->pengguna($id_pengguna);
		$data['pengaturan'] = $this->Admin_model->pengaturan();
		$data['pemberitahuan'] = $this->Admin_model->pemberitahuan();
		$data['tgl_sekarang'] = $this->Admin_model->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->Admin_model->hari(date('l'));
		$data['menu'] = $this->Admin_model->menu();
		$data['submenu'] = $this->Admin_model->submenu();

		// KHUSUS
		if($opsi=='id'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Tidak ada pemberitahuan yang dihapus!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('pemberitahuan');
			} else {
				$this->db->where('id_pemberitahuan', $id);
				$this->db->delete('pemberitahuan');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Pemberitahuan telah dihapus!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('pemberitahuan');
			}
		} else if($opsi=='sudah_dibaca'){
			$this->db->where('baca', 1);
			$this->db->delete('pemberitahuan');
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Pemberitahuan yang telah dibaca terhapus!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('pemberitahuan');
		} else if($opsi=='semua'){
			$this->db->empty_table('pemberitahuan');
			$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Semua pemberitahuan telah dihapus!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('pemberitahuan');
		}
	}
}
