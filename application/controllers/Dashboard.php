<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != TRUE)
		{
			set_pesan('Silahkan login terlebih dahulu', false);
			redirect('');
		}
		date_default_timezone_set("Asia/Jakarta");
	}

	public function index()
	{
		$data['title']	= 'Dashboard';
		$this->db->select('*');
		$this->db->from('tb_order');
		$this->db->join('tb_produk', 'tb_produk.id_produk=tb_order.id_produk');
		$this->db->join('tb_pegawai', 'tb_pegawai.id_pegawai=tb_order.id_pegawai');
		$this->db->where_not_in('tb_order.status_order', 4);
		$data['order']		= $this->db->get()->result_array();
		$this->load->view('dashboard', $data);
	}
}
