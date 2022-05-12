<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

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
    $data['title']		= 'Data Akun';
		$data['akun']	= $this->db->select('*')->from('tb_akun')->join('tb_pegawai', 'tb_pegawai.id_pegawai=tb_akun.id_pegawai')->get()->result_array();
		$this->load->view('akun/data', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Akun';
			$data['pegawai']		= $this->db->query('SELECT * FROM tb_akun RIGHT JOIN tb_pegawai on (tb_pegawai.id_pegawai=tb_akun.id_pegawai) WHERE tb_akun.id_akun is null')->result_array();
			$this->load->view('akun/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_akun	= [
				'id_pegawai'		=> $data['id_pegawai'],
				'username'		=> $data['username'],
				'password'		=> password_hash($data['password'], PASSWORD_DEFAULT),
				'role'			=> implode(",", $data['role'])
			];
			if ($this->M_akun->insert($data_akun)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-akun');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('akun');
			}
		}
	}

	public function edit($id_akun)
	{
		$akun = $this->M_akun->get_by_id($id_akun);
		$this->validation($akun['username']);
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Akun';
			$data['pegawai']		= $this->db->query("SELECT * FROM tb_akun RIGHT JOIN tb_pegawai on (tb_pegawai.id_pegawai=tb_akun.id_pegawai) WHERE tb_akun.id_akun is null OR tb_akun.id_akun='$id_akun'")->result_array();
			$data['akun']	= $this->M_akun->get_by_id($id_akun);
			$this->load->view('akun/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			if(!empty($data['password'])){
				$data_akun	= [
					'id_akun'		=> $id_akun,
					'id_pegawai'		=> $data['id_pegawai'],
					'username'		=> $data['username'],
					'password'		=> password_hash($data['password'], PASSWORD_DEFAULT),
					'role'			=> implode(",", $data['role'])
				];
			} else {
				$data_akun	= [
					'id_akun'		=> $id_akun,
					'id_pegawai'		=> $data['id_pegawai'],
					'username'		=> $data['username'],
					'role'			=> implode(",", $data['role'])
				];
			}
			
			if ($this->M_akun->update($data_akun)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-akun/'.$id_akun);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('akun');
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
			$this->form_validation->set_rules('username', 'Username', 'required|is_unique[tb_akun.username]', ['is_unique'	=> 'Username Sudah Ada']);
		}
		
		$this->form_validation->set_rules('password', 'Password', 'trim');
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');
		
	}

	public function hapus($id_akun)
	{
		$this->M_akun->delete($id_akun);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('akun');
	}
}
