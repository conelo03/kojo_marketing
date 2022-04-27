<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_login', 'login');
	}

	public function index()
	{
		$data['title']	= 'Login';
		$this->load->view('login', $data);
	}

	public function proses()
	{
		$username = htmlspecialchars($this->input->post('username', true));
		$password = htmlspecialchars($this->input->post('password', true));
		
		$user = $this->login->get_user($username);
		if($user->num_rows() > 0)
		{
			$get_user = $user->row_array();
			if(password_verify($password, $get_user['password']))
			{
				$this->session->set_userdata('login', TRUE);
				$this->session->set_userdata('id_pegawai', $get_user['id_pegawai']);
				$this->session->set_userdata('nama', $get_user['nama']);
				$this->session->set_userdata('username', $get_user['username']);
				$this->session->set_userdata('role', $get_user['role']);
				redirect('dashboard');
			}
			else 
			{
				set_pesan('Username atau password salah', false);
				redirect('');
			}
		} 
		else 
		{
			set_pesan('Username tidak terdaftar', false);
			redirect('');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('login');
		$this->session->unset_userdata('id_pegawai');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('akses');
		set_pesan('Anda telah keluar', true);
		redirect('');
	}
}
