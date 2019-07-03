<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesan extends CI_Controller {

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
		$data['judul'] = "Email / Pesan Masuk";
		$this->load->view('template/admin/header', $data);
		$this->load->view('template/admin/sidebar', $data);
		$this->load->view('template/admin/topbar', $data);
		$this->load->view('admin/pesan/index', $data);
		$this->load->view('template/admin/footer', $data);
	}

	public function lihat($id=null)
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

		if($id==null){
			$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
													  <i class="fa fa-fw fa-info-circle"></i> Tidak ada email / pesan untuk ditampilkan!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
			redirect('pesan');
		} else{
			// Ubah status berita menjadi sudah dibaca
			$this->db->set('status_em', 1);
			$this->db->where('id_em', $id);
			$this->db->update('email_masuk');

			// KHUSUS
			$data['judul'] = "Email / Pesan Masuk";
			$data['pesan_id'] = $this->Admin_model->email_masuk($id);
			$this->load->view('template/admin/header', $data);
			$this->load->view('template/admin/sidebar', $data);
			$this->load->view('template/admin/topbar', $data);
			$this->load->view('admin/pesan/lihat', $data);
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
		$data['email_masuk'] = $this->Admin_model->email_masuk();
		$data['tgl_sekarang'] = $this->Admin_model->tgl_indo(date('Y-m-d'));
		$data['hari_sekarang'] = $this->Admin_model->hari(date('l'));
		$data['menu'] = $this->Admin_model->menu();
		$data['submenu'] = $this->Admin_model->submenu();

		// KHUSUS
		if($opsi=='id'){
			if($id==null){
				$this->session->set_flashdata('info', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Tidak ada email / pesan untuk dihapus!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('pesan');
			} else {
				$this->db->where('id_em', $id);
				$this->db->delete('email_masuk');
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Email / Pesan : <strong>'.$this->input->post('perihal_em').'</strong> telah dihapus!
														  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
														    <span aria-hidden="true">&times;</span>
														  </button>
														</div>');
				redirect('pesan');
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
