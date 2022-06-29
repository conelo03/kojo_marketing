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
		$data['order']		= $this->M_order->get_data(is_admin() ? null : $this->session->userdata('id_pegawai'), null, true)->result_array();
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

	public function riwayat()
	{
    $data['title']		= 'Riwayat Order';
		$data['order']		= $this->M_order->get_data_riwayat()->result_array();
		$this->load->view('order/data_riwayat', $data);
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
		$this->add_detail_order($id_order);
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
		$config['upload_path'] = '../produksi-kojo/assets/upload/'.$file;
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

	public function rekapitulasi()
	{
		$this->db->truncate('tb_rekapitulasi');
    $data['title']		= 'Rangkum Order';
		$post_m = $this->input->post('month');
		if(empty($post_m)){
			$month = date('Y-m');
		} else {
			$month = $post_m;
		}

		$pelanggan = $this->db->query("SELECT * FROM tb_pelanggan join tb_order ON(tb_pelanggan.id_pelanggan=tb_order.id_pelanggan) WHERE tb_order.tgl_order LIKE '2022-04%' GROUP BY tb_pelanggan.id_pelanggan")->result_array();

		$order = [];
		foreach ($pelanggan as $p) {
			$id_pelanggan = $p['id_pelanggan'];
			$jaket = $this->db->query("SELECT tb_order.id_produk, tb_pelanggan.id_pelanggan, SUM(tb_order.jumlah_ukuran_s + tb_order.jumlah_ukuran_m + tb_order.jumlah_ukuran_l + tb_order.jumlah_ukuran_xl + tb_order.jumlah_ukuran_xxl) as jumlah FROM tb_order JOIN tb_pelanggan join tb_produk ON(tb_pelanggan.id_pelanggan=tb_order.id_pelanggan) and (tb_produk.id_produk=tb_order.id_produk) WHERE tb_produk.jenis_produk = 'Jaket' AND tb_order.tgl_order LIKE '$month%' AND tb_pelanggan.id_pelanggan = '".$p['id_pelanggan']."'")->row_array();
			$kaos = $this->db->query("SELECT tb_order.id_produk, tb_pelanggan.id_pelanggan, SUM(tb_order.jumlah_ukuran_s + tb_order.jumlah_ukuran_m + tb_order.jumlah_ukuran_l + tb_order.jumlah_ukuran_xl + tb_order.jumlah_ukuran_xxl) as jumlah FROM tb_order JOIN tb_pelanggan join tb_produk ON(tb_pelanggan.id_pelanggan=tb_order.id_pelanggan) and (tb_produk.id_produk=tb_order.id_produk) WHERE tb_produk.jenis_produk = 'Kaos' AND tb_order.tgl_order LIKE '$month%' AND tb_pelanggan.id_pelanggan = '".$p['id_pelanggan']."'")->row_array();
			$jas = $this->db->query("SELECT tb_order.id_produk, tb_pelanggan.id_pelanggan, SUM(tb_order.jumlah_ukuran_s + tb_order.jumlah_ukuran_m + tb_order.jumlah_ukuran_l + tb_order.jumlah_ukuran_xl + tb_order.jumlah_ukuran_xxl) as jumlah FROM tb_order JOIN tb_pelanggan join tb_produk ON(tb_pelanggan.id_pelanggan=tb_order.id_pelanggan) and (tb_produk.id_produk=tb_order.id_produk) WHERE tb_produk.jenis_produk = 'Jas' AND tb_order.tgl_order LIKE '$month%' AND tb_pelanggan.id_pelanggan = '".$p['id_pelanggan']."'")->row_array();
			$kemeja = $this->db->query("SELECT tb_order.id_produk, tb_pelanggan.id_pelanggan, SUM(tb_order.jumlah_ukuran_s + tb_order.jumlah_ukuran_m + tb_order.jumlah_ukuran_l + tb_order.jumlah_ukuran_xl + tb_order.jumlah_ukuran_xxl) as jumlah FROM tb_order JOIN tb_pelanggan join tb_produk ON(tb_pelanggan.id_pelanggan=tb_order.id_pelanggan) and (tb_produk.id_produk=tb_order.id_produk) WHERE tb_produk.jenis_produk = 'Kemeja' AND tb_order.tgl_order LIKE '$month%' AND tb_pelanggan.id_pelanggan = '".$p['id_pelanggan']."'")->row_array();
			$sweater = $this->db->query("SELECT tb_order.id_produk, tb_pelanggan.id_pelanggan, SUM(tb_order.jumlah_ukuran_s + tb_order.jumlah_ukuran_m + tb_order.jumlah_ukuran_l + tb_order.jumlah_ukuran_xl + tb_order.jumlah_ukuran_xxl) as jumlah FROM tb_order JOIN tb_pelanggan join tb_produk ON(tb_pelanggan.id_pelanggan=tb_order.id_pelanggan) and (tb_produk.id_produk=tb_order.id_produk) WHERE tb_produk.jenis_produk = 'Sweater' AND tb_order.tgl_order LIKE '$month%' AND tb_pelanggan.id_pelanggan = '".$p['id_pelanggan']."'")->row_array();
			$data = [
				'id_pelanggan' => $id_pelanggan,
				'jaket' => is_null($jaket['jumlah']) ? 0 : (int)$jaket['jumlah'],
				'kaos' => is_null($kaos['jumlah']) ? 0 : (int)$kaos['jumlah'],
				'jas' => is_null($jas['jumlah']) ? 0 : (int)$jas['jumlah'],
				'kemeja' => is_null($kemeja['jumlah']) ? 0 : (int)$kemeja['jumlah'],
				'sweater' => is_null($sweater['jumlah']) ? 0 : (int)$sweater['jumlah'],
			];

			$this->db->insert('tb_rekapitulasi', $data);

			//array_push($order, $data);
		}

		$data['title']		= 'Rekapitulasi Order';
		$data['month_c'] = $month;
		$data['month']		= $this->db->query("SELECT DATE_FORMAT(tgl_order, '%Y-%m') as tgl1, DATE_FORMAT(tgl_order, '%M %Y') as tgl FROM tb_order GROUP BY DATE_FORMAT(tgl_order, '%M %Y') order by tgl_order ASC")->result_array();
		$data['order'] = $this->db->query("SELECT * FROM tb_rekapitulasi JOIN tb_pelanggan ON(tb_rekapitulasi.id_pelanggan=tb_pelanggan.id_pelanggan)")->result_array();

		$this->load->view('order/data_rekapitulasi', $data);
	}

	public function xx()
	{
		$post_m = $this->input->post('month');
    $data['title']		= 'Cash Flow';
		if(empty($post_m)){
			$month = date('Y-m');
		} else {
			$month = $post_m;
		}
		$data['month_c'] = $month;
		$data['month']		= $this->db->query("SELECT DATE_FORMAT(tanggal, '%Y-%m') as tgl1, DATE_FORMAT(tanggal, '%M %Y') as tgl FROM tb_pemasukan UNION SELECT DATE_FORMAT(tanggal, '%Y-%m') as tgl1, DATE_FORMAT(tanggal, '%M %Y') as tgl FROM tb_pengeluaran GROUP BY DATE_FORMAT(tgl1, '%M %Y') order by tgl1 ASC")->result_array();
		$data['cash']		= $this->db->query("SELECT tanggal as tgl, keterangan as ket, referensi as ref, jumlah as pemasukan, '' as pengeluaran 
		FROM tb_pemasukan 
		WHERE tanggal like '$month%'
		UNION 
		SELECT tanggal as tgl, keterangan as ket, referensi as ref, '' as pemasukan, jumlah as pengeluaran 
		FROM tb_pengeluaran 
		WHERE tanggal like '$month%'
		order by tgl ASC")->result_array();
		$this->load->view('cashflow/data', $data);
	}
}
