<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != TRUE)
		{
			set_pesan('Silahkan login terlebih dahulu', false);
			redirect('');
		}
		date_default_timezone_set("Asia/Jakarta");
		$this->load->library('upload');
	}

	public function index()
	{
    $data['title']		= 'Data Produk';
		$data['produk']		= $this->M_produk->get_data()->result_array();
		$this->load->view('produk/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Produk';
			$this->load->view('produk/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'jenis_produk'			=> $data['jenis_produk'],
				'nama_produk'			=> $data['nama_produk'],
				'bahan'			=> $data['bahan'],
			];
			if ($this->M_produk->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-produk');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('produk');
			}
		}
	}

	public function edit($id_produk)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Produk';
			$data['produk']	= $this->M_produk->get_by_id($id_produk);
			$this->load->view('produk/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_user	= [
				'id_produk'		=> $id_produk,
				'jenis_produk'			=> $data['jenis_produk'],
				'nama_produk'			=> $data['nama_produk'],
				'bahan'			=> $data['bahan'],
			];
			
			if ($this->M_produk->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-produk/'.$id_produk);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('produk');
			}
		}
	}

	private function validation()
	{
		$this->form_validation->set_rules('nama_produk', 'Nama Produk', 'required|trim');
		$this->form_validation->set_rules('jenis_produk', 'Jenis Produk', 'required|trim');
		$this->form_validation->set_rules('bahan', 'Bahan', 'required|trim');
		
	}

	public function hapus($id_produk)
	{
		$this->M_produk->delete($id_produk);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('produk');
	}
}
