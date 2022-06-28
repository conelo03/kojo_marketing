<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != TRUE)
		{
			set_pesan('Silahkan login terlebih dahulu', false);
			redirect('administrator');
		}
		date_default_timezone_set("Asia/Jakarta");
		$this->load->library('upload');
	}

	public function index()
	{
    $data['title']		= 'Data Pelanggan';
		$data['pelanggan']	= $this->M_pelanggan->get_data()->result_array();
		$this->load->view('pelanggan/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Pelanggan';
			$data['kota'] = $this->db->get('tb_kota')->result_array();
			$this->load->view('pelanggan/tambah', $data);
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
				redirect('tambah-pelanggan');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('pelanggan');
			}
		}
	}

	public function edit($id_pelanggan)
	{
		$pelanggan = $this->M_pelanggan->get_by_id($id_pelanggan);
		$this->validation($pelanggan['username']);
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Pelanggan';
			$data['pelanggan']	= $this->M_pelanggan->get_by_id($id_pelanggan);
			$data['kota'] = $this->db->get('tb_kota')->result_array();
			$this->load->view('pelanggan/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			if(!empty($data['password'])){
				$data_akun	= [
					'id_pelanggan'		=> $id_pelanggan,
					'nama_pelanggan'		=> $data['nama_pelanggan'],
					'jenis_kelamin'		=> $data['jenis_kelamin'],
					'no_telepon'		=> $data['no_telepon'],
					'alamat'		=> $data['alamat'],
					'id_kota'		=> $data['id_kota'],
					'instansi'		=> $data['instansi'],
					'username'		=> $data['username'],
					'password'		=> password_hash($data['password'], PASSWORD_DEFAULT),
				];
			} else {
				$data_akun	= [
					'id_pelanggan'		=> $id_pelanggan,
					'nama_pelanggan'		=> $data['nama_pelanggan'],
					'jenis_kelamin'		=> $data['jenis_kelamin'],
					'no_telepon'		=> $data['no_telepon'],
					'alamat'		=> $data['alamat'],
					'id_kota'		=> $data['id_kota'],
					'instansi'		=> $data['instansi'],
					'username'		=> $data['username'],
				];
			}
			
			if ($this->M_pelanggan->update($data_akun)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-pelanggan/'.$id_pelanggan);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('pelanggan');
			}
		}
	}

	private function validation($username = null)
	{
		$username		= $username;
		$username_baru 	= $this->input->post('username');
		if($username == $username_baru){
			$this->form_validation->set_rules('username', 'Username', 'required');	
		} else {
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_pelanggan.username]', ['is_unique'	=> 'Username Sudah Ada']);
		}
		$this->form_validation->set_rules('nama_pelanggan', 'Nama Pelanggan', 'required|trim');
		$this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required|trim');
		$this->form_validation->set_rules('no_telepon', 'No Telepon', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('id_kota', 'Kota', 'required|trim');
		$this->form_validation->set_rules('instansi', 'Instansi', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'trim');
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');
		
	}

	public function hapus($id_pelanggan)
	{
		$this->M_pelanggan->delete($id_pelanggan);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('pelanggan');
	}
}
