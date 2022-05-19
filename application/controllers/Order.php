<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

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
    $data['title']		= 'Data Order';
		$data['order']		= $this->M_order->get_data($this->session->userdata('id_pegawai'), null, true)->result_array();
		$this->load->view('order/data', $data);
	}

	public function all()
	{
    $data['title']		= 'All Order';
		$this->db->select('*');
		$this->db->from('tb_order');
		$this->db->join('tb_produk', 'tb_produk.id_produk=tb_order.id_produk');
		$this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan=tb_order.id_pelanggan');
		$this->db->where('tb_order.id_pegawai =', 0);
		$data['order']		= $this->db->get()->result_array();
		$this->load->view('order/data_all', $data);
	}

	public function tambah()
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Order';
			$data['produk']		= $this->M_produk->get_data()->result_array();
			$data['pelanggan']		= $this->M_pelanggan->get_data()->result_array();
			$this->load->view('order/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$file = $this->upload_file('design_order');
			$data_user	= [
				'tgl_order'			=> $data['tgl_order'],
				'id_pelanggan'			=> $data['id_pelanggan'],
				'id_produk'			=> $data['id_produk'],
				'jumlah_ukuran_s'			=> $data['jumlah_ukuran_s'],
				'jumlah_ukuran_m'			=> $data['jumlah_ukuran_m'],
				'jumlah_ukuran_l'			=> $data['jumlah_ukuran_l'],
				'jumlah_ukuran_xl'			=> $data['jumlah_ukuran_xl'],
				'jumlah_ukuran_xxl'			=> $data['jumlah_ukuran_xxl'],
				'design_order'		=> $file,
				'catatan'			=> $data['catatan'],
				'id_pegawai' => $this->session->userdata('id_pegawai'),
				'status_order'			=> 0,
				'created_at' => date('Y-m-d H:i:s')
			];
			if ($this->M_order->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-order');
			} else {
				$order = $this->db->select('id_order')->from('tb_order')->order_by('id_order', 'DESC')->get()->row_array();
				$this->add_detail_order($order['id_order']);
				$this->session->set_flashdata('msg', 'success');
				redirect('order');
			}
		}
	}

	public function edit($id_order)
	{
		$this->validation();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Order';
			$data['order']	= $this->M_order->get_by_id($id_order);
			$data['produk']		= $this->M_produk->get_data()->result_array();
			$data['pelanggan']		= $this->M_pelanggan->get_data()->result_array();
			$this->load->view('order/edit', $data);
		} else {
			$data		= $this->input->post(null, true);
			if (empty($_FILES['design_order']['name'])) {
				$file = $data['design_order_old'];
			}else{
				$file = $this->upload_file('design_order');
			}
			$data_user	= [
				'id_order'		=> $id_order,
				'tgl_order'			=> $data['tgl_order'],
				'id_pelanggan'			=> $data['id_pelanggan'],
				'id_produk'			=> $data['id_produk'],
				'jumlah_ukuran_s'			=> $data['jumlah_ukuran_s'],
				'jumlah_ukuran_m'			=> $data['jumlah_ukuran_m'],
				'jumlah_ukuran_l'			=> $data['jumlah_ukuran_l'],
				'jumlah_ukuran_xl'			=> $data['jumlah_ukuran_xl'],
				'jumlah_ukuran_xxl'			=> $data['jumlah_ukuran_xxl'],
				'design_order'		=> $file,
				'catatan'			=> $data['catatan'],
				'status_order'			=> $data['status_order']
			];
			
			if ($this->M_order->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-order/'.$id_order);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('order');
			}
		}
	}

	private function validation()
	{
		$this->form_validation->set_rules('tgl_order', 'Tgl Order', 'required|trim');
		$this->form_validation->set_rules('id_produk', 'Produk', 'required|trim');
		$this->form_validation->set_rules('id_pelanggan', 'Pelanggan', 'required|trim');
		$this->form_validation->set_rules('jumlah_ukuran_s', 'Jumlah', 'required|trim');
		$this->form_validation->set_rules('jumlah_ukuran_m', 'Jumlah', 'required|trim');
		$this->form_validation->set_rules('jumlah_ukuran_l', 'Jumlah', 'required|trim');
		$this->form_validation->set_rules('jumlah_ukuran_xl', 'Jumlah', 'required|trim');
		$this->form_validation->set_rules('jumlah_ukuran_xxl', 'Jumlah', 'required|trim');
		$this->form_validation->set_rules('catatan', 'Catatan', 'required|trim');
		
	} 

	private function add_detail_order($id_order)
	{
		$this->db->insert('tb_keuangan', ['id_order' => $id_order]);
		$this->db->insert('tb_purchase', ['id_order' => $id_order]);
		$this->db->insert('tb_cutting', ['id_order' => $id_order]);
		$this->db->insert('tb_bordir', ['id_order' => $id_order]);
		$this->db->insert('tb_jahit', ['id_order' => $id_order]);
		$this->db->insert('tb_qc', ['id_order' => $id_order]);
		$this->db->insert('tb_pengiriman', ['id_order' => $id_order]);

		return true;
	}

	public function hapus($id_order)
	{
		$this->M_order->delete($id_order);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('order');
	}

	public function confirm($id_order)
	{
		$data = [
			'id_pegawai' => $this->session->userdata('id_pegawai'),
			'status_order'			=> 0,
		];
		$this->db->where('id_order', $id_order);
		$this->db->update('tb_order', $data);
		$this->session->set_flashdata('msg', 'confirm');
		redirect('order');
	}

	public function detail($id_order)
	{
    $data['title']		= 'Data Order';
		$data['order']		= $this->M_order->get_by_id($id_order);
		$this->load->view('order/detail', $data);
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

	public function download_file($file)
	{
		$file = explode("7C", $file);
		force_download('/assets/upload/file_keuangan/5533-15688-1-PB.pdf', NULL);
	}

	// public function update_keuangan($id_order, $id_keuangan)
	// {
	// 	$data		= $this->input->post(null, true);
	// 	if (empty($_FILES['file_keuangan']['name'])) {
	// 		$file = $data['file_keuangan_old'];
	// 	}else{
	// 		$file = $this->upload_file('file_keuangan');
	// 	}

	// 	$data_ = [
	// 		'id_pegawai' => $this->session->userdata('id_pegawai'),
	// 		'file_keuangan' => $file,
	// 		'catatan_keuangan' => $data['catatan_keuangan'],
	// 		'status_keuangan' => $data['status_keuangan']
	// 	];

	// 	$this->db->where('id_keuangan', $id_keuangan);
	// 	$this->db->update('tb_keuangan', $data_);

	// 	$this->session->set_flashdata('msg', 'update-status');
	// 	redirect('detail-order/'.$id_order);
	// }

	// public function update_purchase($id_order, $id_purchase)
	// {
	// 	$data		= $this->input->post(null, true);
	// 	if (empty($_FILES['file_purchase']['name'])) {
	// 		$file = $data['file_purchase_old'];
	// 	}else{
	// 		$file = $this->upload_file('file_purchase');
	// 	}

	// 	$data_ = [
	// 		'id_pegawai' => $this->session->userdata('id_pegawai'),
	// 		'file_purchase' => $file,
	// 		'catatan_purchase' => $data['catatan_purchase'],
	// 		'status_purchase' => $data['status_purchase']
	// 	];

	// 	$this->db->where('id_purchase', $id_purchase);
	// 	$this->db->update('tb_purchase', $data_);

	// 	$this->session->set_flashdata('msg', 'update-status');
	// 	redirect('detail-order/'.$id_order);
	// }

	// public function update_cutting($id_order, $id_cutting)
	// {
	// 	$data		= $this->input->post(null, true);
	// 	if (empty($_FILES['file_cutting']['name'])) {
	// 		$file = $data['file_cutting_old'];
	// 	}else{
	// 		$file = $this->upload_file('file_cutting');
	// 	}

	// 	$data_ = [
	// 		'id_pegawai' => $this->session->userdata('id_pegawai'),
	// 		'file_cutting' => $file,
	// 		'catatan_cutting' => $data['catatan_cutting'],
	// 		'status_cutting' => $data['status_cutting']
	// 	];

	// 	$this->db->where('id_cutting', $id_cutting);
	// 	$this->db->update('tb_cutting', $data_);

	// 	$this->session->set_flashdata('msg', 'update-status');
	// 	redirect('detail-order/'.$id_order);
	// }

	// public function update_bordir($id_order, $id_bordir)
	// {
	// 	$data		= $this->input->post(null, true);
	// 	if (empty($_FILES['file_bordir']['name'])) {
	// 		$file = $data['file_bordir_old'];
	// 	}else{
	// 		$file = $this->upload_file('file_bordir');
	// 	}

	// 	$data_ = [
	// 		'id_pegawai' => $this->session->userdata('id_pegawai'),
	// 		'file_bordir' => $file,
	// 		'catatan_bordir' => $data['catatan_bordir'],
	// 		'status_bordir' => $data['status_bordir']
	// 	];

	// 	$this->db->where('id_bordir', $id_bordir);
	// 	$this->db->update('tb_bordir', $data_);

	// 	$this->session->set_flashdata('msg', 'update-status');
	// 	redirect('detail-order/'.$id_order);
	// }

	// public function update_jahit($id_order, $id_jahit)
	// {
	// 	$data		= $this->input->post(null, true);
	// 	if (empty($_FILES['file_jahit']['name'])) {
	// 		$file = $data['file_jahit_old'];
	// 	}else{
	// 		$file = $this->upload_file('file_jahit');
	// 	}

	// 	$data_ = [
	// 		'id_pegawai' => $this->session->userdata('id_pegawai'),
	// 		'file_jahit' => $file,
	// 		'catatan_jahit' => $data['catatan_jahit'],
	// 		'status_jahit' => $data['status_jahit']
	// 	];

	// 	$this->db->where('id_jahit', $id_jahit);
	// 	$this->db->update('tb_jahit', $data_);

	// 	$this->session->set_flashdata('msg', 'update-status');
	// 	redirect('detail-order/'.$id_order);
	// }

	// public function update_qc($id_order, $id_qc)
	// {
	// 	$data		= $this->input->post(null, true);
	// 	if (empty($_FILES['file_qc']['name'])) {
	// 		$file = $data['file_qc_old'];
	// 	}else{
	// 		$file = $this->upload_file('file_qc');
	// 	}

	// 	$data_ = [
	// 		'id_pegawai' => $this->session->userdata('id_pegawai'),
	// 		'file_qc' => $file,
	// 		'catatan_qc' => $data['catatan_qc'],
	// 		'status_qc' => $data['status_qc']
	// 	];

	// 	$this->db->where('id_qc', $id_qc);
	// 	$this->db->update('tb_qc', $data_);

	// 	$this->session->set_flashdata('msg', 'update-status');
	// 	redirect('detail-order/'.$id_order);
	// }

	// public function update_pengiriman($id_order, $id_pengiriman)
	// {
	// 	$data		= $this->input->post(null, true);
	// 	if (empty($_FILES['file_pengiriman']['name'])) {
	// 		$file = $data['file_pengiriman_old'];
	// 	}else{
	// 		$file = $this->upload_file('file_pengiriman');
	// 	}

	// 	$data_ = [
	// 		'id_pegawai' => $this->session->userdata('id_pegawai'),
	// 		'file_pengiriman' => $file,
	// 		'catatan_pengiriman' => $data['catatan_pengiriman'],
	// 		'status_pengiriman' => $data['status_pengiriman']
	// 	];

	// 	$this->db->where('id_pengiriman', $id_pengiriman);
	// 	$this->db->update('tb_pengiriman', $data_);

	// 	$this->session->set_flashdata('msg', 'update-status');
	// 	redirect('detail-order/'.$id_order);
	// }

	// public function tambah_pegawai_cutting($id_order)
	// {
	// 	$data		= $this->input->post(null, true);
	// 	$data_ = [
	// 		'id_order'	=> $id_order,
	// 		'id_pegawai' => $data['id_pegawai'],
	// 		'jumlah' => $data['jumlah'],
	// 		'harga' => $data['harga'],
	// 		'kasbon' => $data['kasbon'],
	// 		'tgl_cair' => $data['tgl_cair'],
	// 		'pola_potongan' => $data['pola_potongan'],
	// 		'detail_ukuran' => $data['detail_ukuran'],
	// 		'catatan_potongan' => $data['catatan_potongan'],
	// 		'created_at' => date('Y-m-d H:i:s')
	// 	];

	// 	$this->db->insert('tb_pegawai_cutting', $data_);

	// 	$this->session->set_flashdata('msg', 'success');
	// 	redirect('detail-order/'.$id_order);
	// }

	// public function edit_pegawai_cutting($id_order, $id_pegawai_cutting)
	// {
	// 	$data		= $this->input->post(null, true);
	// 	$data_ = [
	// 		'id_order'	=> $id_order,
	// 		'id_pegawai' => $data['id_pegawai'],
	// 		'jumlah' => $data['jumlah'],
	// 		'harga' => $data['harga'],
	// 		'kasbon' => $data['kasbon'],
	// 		'tgl_cair' => $data['tgl_cair'],
	// 		'pola_potongan' => $data['pola_potongan'],
	// 		'detail_ukuran' => $data['detail_ukuran'],
	// 		'catatan_potongan' => $data['catatan_potongan'],
	// 	];

	// 	$this->db->where('id_pegawai_cutting', $id_pegawai_cutting);
	// 	$this->db->update('tb_pegawai_cutting', $data_);

	// 	$this->session->set_flashdata('msg', 'edit');
	// 	redirect('detail-order/'.$id_order);
	// }

	// public function hapus_pegawai_cutting($id_order, $id_pegawai_cutting)
	// {
	// 	$this->db->where('id_pegawai_cutting', $id_pegawai_cutting);
	// 	$this->db->delete('tb_pegawai_cutting');

	// 	$this->session->set_flashdata('msg', 'hapus');
	// 	redirect('detail-order/'.$id_order);
	// }

	// public function tambah_pegawai_jahit($id_order)
	// {
	// 	$data		= $this->input->post(null, true);
	// 	$data_ = [
	// 		'id_order'	=> $id_order,
	// 		'id_pegawai' => $data['id_pegawai'],
	// 		'jumlah' => $data['jumlah'],
	// 		'harga' => $data['harga'],
	// 		'kasbon' => $data['kasbon'],
	// 		'tgl_cair' => $data['tgl_cair'],
	// 		'ukuran_pendek' => $data['ukuran_pendek'],
	// 		'ukuran_panjang' => $data['ukuran_panjang'],
	// 		'created_at' => date('Y-m-d H:i:s')
	// 	];

	// 	$this->db->insert('tb_pegawai_jahit', $data_);

	// 	$this->session->set_flashdata('msg', 'success');
	// 	redirect('detail-order/'.$id_order);
	// }

	// public function edit_pegawai_jahit($id_order, $id_pegawai_jahit)
	// {
	// 	$data		= $this->input->post(null, true);
	// 	$data_ = [
	// 		'id_order'	=> $id_order,
	// 		'id_pegawai' => $data['id_pegawai'],
	// 		'jumlah' => $data['jumlah'],
	// 		'harga' => $data['harga'],
	// 		'kasbon' => $data['kasbon'],
	// 		'tgl_cair' => $data['tgl_cair'],
	// 		'ukuran_pendek' => $data['ukuran_pendek'],
	// 		'ukuran_panjang' => $data['ukuran_panjang'],
	// 	];

	// 	$this->db->where('id_pegawai_jahit', $id_pegawai_jahit);
	// 	$this->db->update('tb_pegawai_jahit', $data_);

	// 	$this->session->set_flashdata('msg', 'edit');
	// 	redirect('detail-order/'.$id_order);
	// }

	// public function hapus_pegawai_jahit($id_order, $id_pegawai_jahit)
	// {
	// 	$this->db->where('id_pegawai_jahit', $id_pegawai_jahit);
	// 	$this->db->delete('tb_pegawai_jahit');

	// 	$this->session->set_flashdata('msg', 'hapus');
	// 	redirect('detail-order/'.$id_order);
	// }

	// public function tambah_pegawai_qc($id_order)
	// {
	// 	$data		= $this->input->post(null, true);
	// 	$data_ = [
	// 		'id_order'	=> $id_order,
	// 		'id_pegawai' => $data['id_pegawai'],
	// 		'jumlah' => $data['jumlah'],
	// 		'harga' => $data['harga'],
	// 		'kasbon' => $data['kasbon'],
	// 		'tgl_cair' => $data['tgl_cair'],
	// 		'ukuran_pendek' => $data['ukuran_pendek'],
	// 		'ukuran_panjang' => $data['ukuran_panjang'],
	// 		'created_at' => date('Y-m-d H:i:s')
	// 	];

	// 	$this->db->insert('tb_pegawai_qc', $data_);

	// 	$this->session->set_flashdata('msg', 'success');
	// 	redirect('detail-order/'.$id_order);
	// }

	// public function edit_pegawai_qc($id_order, $id_pegawai_qc)
	// {
	// 	$data		= $this->input->post(null, true);
	// 	$data_ = [
	// 		'id_order'	=> $id_order,
	// 		'id_pegawai' => $data['id_pegawai'],
	// 		'jumlah' => $data['jumlah'],
	// 		'harga' => $data['harga'],
	// 		'kasbon' => $data['kasbon'],
	// 		'tgl_cair' => $data['tgl_cair'],
	// 		'ukuran_pendek' => $data['ukuran_pendek'],
	// 		'ukuran_panjang' => $data['ukuran_panjang'],
	// 	];

	// 	$this->db->where('id_pegawai_qc', $id_pegawai_qc);
	// 	$this->db->update('tb_pegawai_qc', $data_);

	// 	$this->session->set_flashdata('msg', 'edit');
	// 	redirect('detail-order/'.$id_order);
	// }

	// public function hapus_pegawai_qc($id_order, $id_pegawai_qc)
	// {
	// 	$this->db->where('id_pegawai_qc', $id_pegawai_qc);
	// 	$this->db->delete('tb_pegawai_qc');

	// 	$this->session->set_flashdata('msg', 'hapus');
	// 	redirect('detail-order/'.$id_order);
	// }
}
