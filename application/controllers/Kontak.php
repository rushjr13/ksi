<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	public function index()
	{
		// UMUM
		$data['pengaturan'] = $this->Admin_model->pengaturan();
		$data['menulanding'] = $this->Admin_model->menulandingaktif();

		// KHUSUS
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required',[
			'required' => 'Nama Lengkap Harus Diisi!'
		]);
		$this->form_validation->set_rules('email', 'Alamat Email', 'required|valid_email',[
			'required' => 'Alamat Email Harus Diisi!',
			'valid_email' => 'Alamat Email Tidak Valid!'
		]);
		$this->form_validation->set_rules('perihal', 'Perihal', 'required',[
			'required' => 'Perihal Harus Diisi!'
		]);
		$this->form_validation->set_rules('isi_pesan', 'Isi Pesan', 'required',[
			'required' => 'Masukkan Pesan Anda!'
		]);

		if ($this->form_validation->run() == FALSE){
			$data['judul'] = "Hubungi Kami";
			$this->load->view('template/landing/header', $data);
			$this->load->view('template/landing/navbar', $data);
			$this->load->view('landing/kontak', $data);
			$this->load->view('template/landing/footer', $data);
		} else {
			$data = [
				'tgl_em'=>time(),
				'nama_pengirim'=>$this->input->post('nama_lengkap'),
				'email_pengirim'=>$this->input->post('email'),
				'perihal_em'=>$this->input->post('perihal'),
				'isi_em'=>$this->input->post('isi_pesan')
			];
			$this->db->insert('email_masuk', $data);
			$this->session->set_flashdata('info', '<small class="text-primary" style="font-style:italic;">Pesan Anda Telah Terkirim!<br>Terima Kasih Atas Partisipasi Anda.</small>');
			redirect('kontak');
		}
	}
}
