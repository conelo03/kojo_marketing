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
			$file = $this->upload_file('foto_produk');
			$data_user	= [
				'jenis_produk'			=> $data['jenis_produk'],
				'nama_produk'			=> $data['nama_produk'],
				'bahan'			=> $data['bahan'],
				'foto_produk'			=> $file,

				'pnj_kain_s'			=> $data['pnj_kain_s'],
				'pnj_kain_m'			=> $data['pnj_kain_m'],
				'pnj_kain_l'			=> $data['pnj_kain_l'],
				'pnj_kain_xl'			=> $data['pnj_kain_xl'],
				'pnj_kain_xxl'			=> $data['pnj_kain_xxl'],
				'harga_kain'			=> $data['harga_kain'],

				'jml_kancing_s'			=> $data['jml_kancing_s'],
				'jml_kancing_m'			=> $data['jml_kancing_m'],
				'jml_kancing_l'			=> $data['jml_kancing_l'],
				'jml_kancing_xl'			=> $data['jml_kancing_xl'],
				'jml_kancing_xxl'			=> $data['jml_kancing_xxl'],
				'harga_kancing'			=> $data['harga_kancing'],

				'pnj_resleting_s'			=> $data['pnj_resleting_s'],
				'pnj_resleting_m'			=> $data['pnj_resleting_m'],
				'pnj_resleting_l'			=> $data['pnj_resleting_l'],
				'pnj_resleting_xl'			=> $data['pnj_resleting_xl'],
				'pnj_resleting_xxl'			=> $data['pnj_resleting_xxl'],
				'harga_resleting'			=> $data['harga_resleting'],

				'jml_prepet_s'			=> $data['jml_prepet_s'],
				'jml_prepet_m'			=> $data['jml_prepet_m'],
				'jml_prepet_l'			=> $data['jml_prepet_l'],
				'jml_prepet_xl'			=> $data['jml_prepet_xl'],
				'jml_prepet_xxl'			=> $data['jml_prepet_xxl'],
				'harga_prepet'			=> $data['harga_prepet'],

				'pnj_rib_s'			=> $data['pnj_rib_s'],
				'pnj_rib_m'			=> $data['pnj_rib_m'],
				'pnj_rib_l'			=> $data['pnj_rib_l'],
				'pnj_rib_xl'			=> $data['pnj_rib_xl'],
				'pnj_rib_xxl'			=> $data['pnj_rib_xxl'],
				'harga_rib'			=> $data['harga_rib'],
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
			if (empty($_FILES['foto_produk']['name'])) {
				$file = $data['foto_produk_old'];
			}else{
				$file = $this->upload_file('foto_produk');
			}
			$data_user	= [
				'id_produk'		=> $id_produk,
				'jenis_produk'			=> $data['jenis_produk'],
				'nama_produk'			=> $data['nama_produk'],
				'bahan'			=> $data['bahan'],
				'foto_produk'			=> $file,
				
				'pnj_kain_s'			=> $data['pnj_kain_s'],
				'pnj_kain_m'			=> $data['pnj_kain_m'],
				'pnj_kain_l'			=> $data['pnj_kain_l'],
				'pnj_kain_xl'			=> $data['pnj_kain_xl'],
				'pnj_kain_xxl'			=> $data['pnj_kain_xxl'],
				'harga_kain'			=> $data['harga_kain'],

				'jml_kancing_s'			=> $data['jml_kancing_s'],
				'jml_kancing_m'			=> $data['jml_kancing_m'],
				'jml_kancing_l'			=> $data['jml_kancing_l'],
				'jml_kancing_xl'			=> $data['jml_kancing_xl'],
				'jml_kancing_xxl'			=> $data['jml_kancing_xxl'],
				'harga_kancing'			=> $data['harga_kancing'],

				'pnj_resleting_s'			=> $data['pnj_resleting_s'],
				'pnj_resleting_m'			=> $data['pnj_resleting_m'],
				'pnj_resleting_l'			=> $data['pnj_resleting_l'],
				'pnj_resleting_xl'			=> $data['pnj_resleting_xl'],
				'pnj_resleting_xxl'			=> $data['pnj_resleting_xxl'],
				'harga_resleting'			=> $data['harga_resleting'],

				'jml_prepet_s'			=> $data['jml_prepet_s'],
				'jml_prepet_m'			=> $data['jml_prepet_m'],
				'jml_prepet_l'			=> $data['jml_prepet_l'],
				'jml_prepet_xl'			=> $data['jml_prepet_xl'],
				'jml_prepet_xxl'			=> $data['jml_prepet_xxl'],
				'harga_prepet'			=> $data['harga_prepet'],

				'pnj_rib_s'			=> $data['pnj_rib_s'],
				'pnj_rib_m'			=> $data['pnj_rib_m'],
				'pnj_rib_l'			=> $data['pnj_rib_l'],
				'pnj_rib_xl'			=> $data['pnj_rib_xl'],
				'pnj_rib_xxl'			=> $data['pnj_rib_xxl'],
				'harga_rib'			=> $data['harga_rib'],
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

	private function upload_file($file)
	{
		$config['upload_path'] = './assets/upload/'.$file;
		$config['allowed_types'] = 'jpg|png|jpeg|pdf|docx|xlsx|doc|xls';
		$config['max_size'] = 10000;
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if(! $this->upload->do_upload($file))
		{
			return '';
		}

		return $this->upload->data('file_name');
	}
}
