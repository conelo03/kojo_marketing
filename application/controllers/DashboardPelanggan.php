<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardPelanggan extends CI_Controller {

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
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$this->db->select('*');
		$this->db->from('tb_order');
		$this->db->join('tb_produk', 'tb_produk.id_produk=tb_order.id_produk');
		$this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan=tb_order.id_pelanggan');
		$this->db->where('tb_order.id_pelanggan', $id_pelanggan);
		$this->db->where_not_in('tb_order.status_order', 4);
		$data['order']		= $this->db->get()->result_array();
		$this->load->view('pelanggan-page/dashboard', $data);
	}

	public function riwayat_order()
	{
		$data['title']	= 'Riwayat Order';
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$this->db->select('*');
		$this->db->from('tb_order');
		$this->db->join('tb_produk', 'tb_produk.id_produk=tb_order.id_produk');
		$this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan=tb_order.id_pelanggan');
		$this->db->where('tb_order.id_pelanggan', $id_pelanggan);
		$this->db->where('tb_order.status_order', 4);
		$data['order']		= $this->db->get()->result_array();
		$this->load->view('pelanggan-page/riwayat_order', $data);
	}
}
