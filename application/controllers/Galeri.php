<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends CI_Controller {

	public function index()
	{
		// UMUM
		$data['pengaturan'] = $this->Admin_model->pengaturan();
		$data['menulanding'] = $this->Admin_model->menulandingaktif();

		// KHUSUS
		$data['judul'] = "Galeri";
		$data['galeri_lengkap'] = $this->Admin_model->galeri_lengkap();
		$data['galeri_kegiatan'] = $this->Admin_model->galeri_kegiatan();
		$this->load->view('template/landing/header', $data);
		$this->load->view('template/landing/navbar', $data);
		$this->load->view('landing/galeri', $data);
		$this->load->view('template/landing/footer', $data);
	}

	public function detail($id=null)
	{
		// UMUM
		$data['pengaturan'] = $this->Admin_model->pengaturan();
		$data['menulanding'] = $this->Admin_model->menulandingaktif();

		// KHUSUS
		$data['galeri_detail'] = $this->Admin_model->galeri_lengkap($id);
		$hit = $data['galeri_detail']['hit'];
		$this->db->set('hit', $hit+1);
		$this->db->where('id', $id);
		$this->db->update('galeri_lengkap');
		if($id==null){
			$data['judul'] = "Detail Galeri";
			$this->load->view('template/landing/header', $data);
			$this->load->view('template/landing/navbar', $data);
			$this->load->view('kesalahan', $data);
			$this->load->view('template/landing/footer', $data);
		} else {
			$this->form_validation->set_rules('nama', 'Nama Lengkap', 'required',[
				'required' => 'Nama Lengkap Harus Diisi!'
			]);
			$this->form_validation->set_rules('email', 'Alamat Email', 'required',[
				'required' => 'Alamat Email Harus Diisi!'
			]);
			$this->form_validation->set_rules('komentar', 'Komentar', 'required',[
				'required' => 'Komentar Harus Diisi!'
			]);

			if ($this->form_validation->run() == FALSE){
				$data['judul'] = $data['galeri_detail']['judul'];
				$data['galeri_limit'] = $this->Admin_model->galeri_limit($id);
				$data['komentar_galeri'] = $this->Admin_model->komentar_galeri($id);
				$data['jlh_komentar'] = $this->Admin_model->jlh_komentar_galeri($id);
				$this->load->view('template/landing/header', $data);
				$this->load->view('template/landing/navbar', $data);
				$this->load->view('landing/galeri_detail', $data);
				$this->load->view('template/landing/footer', $data);
			} else {
				$data = [
					'id_galeri'=>$this->input->post('idgaleri'),
					'tgl_kg'=>date('Y-m-d'),
					'email'=>$this->input->post('email'),
					'nama'=>$this->input->post('nama'),
					'isi_kg'=>$this->input->post('komentar'),
				];
				$this->db->insert('komentar_galeri', $data);
				$this->session->set_flashdata('info', '<div class="alert alert-success alert-dismissible fade show" role="alert">
														  <i class="fa fa-fw fa-info-circle"></i> Komentar baru telah ditambahkan!
													  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
													    <span aria-hidden="true">&times;</span>
													  </button>
													</div>');
				redirect('galeri/detail/'.$id);
			}
		}
	}

}
