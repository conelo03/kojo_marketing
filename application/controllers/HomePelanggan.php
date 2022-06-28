<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomePelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$data['title']	= 'Home';
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->order_by('id_produk', 'DESC');
		$data['produk']		= $this->db->get()->result_array();
		$this->load->view('pelanggan-page/home', $data);
	}

	public function registrasi()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Pelanggan';
			$data['kota'] = $this->db->get('tb_kota')->result_array();
			$this->load->view('pelanggan-page/registrasi', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_akun	= [
				'nama_pelanggan'		=> $data['nama_pelanggan'],
				'jenis_kelamin'		=> $data['jenis_kelamin'],
				'no_telepon'		=> $data['no_telepon'],
				'alamat'		=> $data['alamat'],
				'id_kota'		=> $data['id_kota'],
				'instansi'		=> $data['instansi'],
				'username'		=> $data['username'],
				'password'		=> password_hash($data['password'], PASSWORD_DEFAULT),
			];
			if ($this->M_pelanggan->insert($data_akun)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('registrasi-pelanggan');
			} else {
				set_pesan('Pendaftaran Berhasil! Silahkan Login!', true);
				redirect('LoginPelanggan');
			}
		}
	}

	private function validation()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_pelanggan.username]', ['is_unique'	=> 'Username Sudah Ada']);
		$this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('no_telepon', 'No Telepon', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('id_kota', 'Kota', 'required|trim');
		$this->form_validation->set_rules('instansi', 'Instansi', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'trim');
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');
		
	}
}
