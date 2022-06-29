<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardPelanggan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('login') != TRUE)
		{
			set_pesan('Silahkan login terlebih dahulu', false);
			redirect('LoginPelanggan');
		}
		date_default_timezone_set("Asia/Jakarta");
		$this->load->library('upload');
	}

	public function index()
	{
		$data['title']	= 'Home';
		$this->db->select('*');
		$this->db->from('tb_produk');
		$this->db->order_by('id_produk', 'DESC');
		$data['produk']		= $this->db->get()->result_array();
		$this->load->view('pelanggan-page/produk', $data);
	}

	public function order()
	{
		$data['title']	= 'My Order';
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

	public function ulasan_order($id_order)
	{
		$this->validation_ulasan();
		if (!$this->form_validation->run()) {
			$data['title']	= 'Riwayat Order';
			$data['order']	= $this->M_order->get_by_id($id_order);
			$this->load->view('pelanggan-page/ulasan_order', $data);
		}else{
			$data		= $this->input->post(null, true);
			$data_akun	= [
				'id_order' => $id_order,
				'rate'		=> $data['rate'],
				'ulasan'		=> $data['ulasan']
			];
			if ($this->M_order->update($data_akun)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('ulasan-order/'.$id_order);
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('riwayat-order');
			}
		}
		
	}

	private function validation_ulasan()
	{
		$this->form_validation->set_rules('rate', 'Rate', 'required|trim');
		$this->form_validation->set_rules('ulasan', 'Ulasan', 'required|trim');
		
	} 

	public function tambah_order($id_produk = null)
	{
		$this->validation_order();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Order';
			$data['id_produk'] = $id_produk;
			$data['produk']		= $this->M_produk->get_data()->result_array();
			$data['nama_pelanggan'] = $this->session->userdata('nama_pelanggan');
			$this->load->view('pelanggan-page/order/tambah', $data);
		} else {
			$data		= $this->input->post(null, true);
			$file = $this->upload_file('design_order');
			$data_user	= [
				'tgl_order'			=> $data['tgl_order'],
				'id_pelanggan'			=> $this->session->userdata('id_pelanggan'),
				'id_produk'			=> $data['id_produk'],
				'jumlah_ukuran_s'			=> $data['jumlah_ukuran_s'],
				'jumlah_ukuran_m'			=> $data['jumlah_ukuran_m'],
				'jumlah_ukuran_l'			=> $data['jumlah_ukuran_l'],
				'jumlah_ukuran_xl'			=> $data['jumlah_ukuran_xl'],
				'jumlah_ukuran_xxl'			=> $data['jumlah_ukuran_xxl'],
				'design_order'		=> $file,
				'catatan'			=> $data['catatan'],
				'id_pegawai' => 0,
				'status_order'			=> 0,
				'created_at' => date('Y-m-d H:i:s')
			];
			if ($this->M_order->insert($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('tambah-order-pelanggan');
			} else {
				$this->session->set_flashdata('msg', 'success');
				redirect('dashboard-pelanggan');
			}
		}
	}

	public function edit_order($id_order)
	{
		$this->validation_order();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Order';
			$data['order']	= $this->M_order->get_by_id($id_order);
			$data['produk']		= $this->M_produk->get_data()->result_array();
			$data['nama_pelanggan'] = $this->session->userdata('nama_pelanggan');
			$this->load->view('pelanggan-page/order/edit', $data);
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
				'id_produk'			=> $data['id_produk'],
				'jumlah_ukuran_s'			=> $data['jumlah_ukuran_s'],
				'jumlah_ukuran_m'			=> $data['jumlah_ukuran_m'],
				'jumlah_ukuran_l'			=> $data['jumlah_ukuran_l'],
				'jumlah_ukuran_xl'			=> $data['jumlah_ukuran_xl'],
				'jumlah_ukuran_xxl'			=> $data['jumlah_ukuran_xxl'],
				'design_order'		=> $file,
				'catatan'			=> $data['catatan']
			];
			
			if ($this->M_order->update($data_user)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('edit-order-pelanggan/'.$id_order);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('dashboard-pelanggan');
			}
		}
	}

	public function hapus_order($id_order)
	{
		$this->M_order->delete($id_order);
		$this->session->set_flashdata('msg', 'hapus');
		redirect('dashboard-pelanggan');
	}

	private function validation_order()
	{
		$this->form_validation->set_rules('tgl_order', 'Tgl Order', 'required|trim');
		$this->form_validation->set_rules('id_produk', 'Produk', 'required|trim');
		$this->form_validation->set_rules('jumlah_ukuran_s', 'Jumlah', 'required|trim');
		$this->form_validation->set_rules('jumlah_ukuran_m', 'Jumlah', 'required|trim');
		$this->form_validation->set_rules('jumlah_ukuran_l', 'Jumlah', 'required|trim');
		$this->form_validation->set_rules('jumlah_ukuran_xl', 'Jumlah', 'required|trim');
		$this->form_validation->set_rules('jumlah_ukuran_xxl', 'Jumlah', 'required|trim');
		$this->form_validation->set_rules('catatan', 'Catatan', 'required|trim');
		
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

	public function profile($id_pelanggan)
	{
		$p = $this->M_pelanggan->get_by_id($id_pelanggan);
		$this->validation_profile($p['username']);
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Pelanggan';
			$data['p'] = $p;
			$data['kota'] = $this->db->get('tb_kota')->result_array();
			$this->load->view('pelanggan-page/profile', $data);
		} else {
			$data		= $this->input->post(null, true);
			$data_akun	= [
				'id_pelanggan' => $id_pelanggan,
				'nama_pelanggan'		=> $data['nama_pelanggan'],
				'jenis_kelamin'		=> $data['jenis_kelamin'],
				'no_telepon'		=> $data['no_telepon'],
				'alamat'		=> $data['alamat'],
				'id_kota'		=> $data['id_kota'],
				'instansi'		=> $data['instansi'],
				'username'		=> $data['username'],
			];
			if ($this->M_pelanggan->update($data_akun)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('profile-pelanggan/'.$id_pelanggan);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('DashboardPelanggan');
			}
		}
	}

	private function validation_profile($username = null)
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
		
	}

	public function password($id_pelanggan)
	{
		$this->validation_password();
		if (!$this->form_validation->run()) {
			$data['title']		= 'Data Pelanggan';
			$data['p'] = $this->M_pelanggan->get_by_id($id_pelanggan);
			$this->load->view('pelanggan-page/password', $data);
		} else {
			$data		= $this->input->post(null, true);
			$p = $this->M_pelanggan->get_by_id($id_pelanggan);
			if(password_verify($data['password_old'], $p['password'])){
				$data_akun	= [
					'id_pelanggan' => $id_pelanggan,
					'password'		=> password_hash($data['password'], PASSWORD_DEFAULT),
				];
			}else{
				$this->session->set_flashdata('msg', 'password-salah');
				redirect('password-pelanggan/'.$id_pelanggan);
			}
			
			if ($this->M_pelanggan->update($data_akun)) {
				$this->session->set_flashdata('msg', 'error');
				redirect('password-pelanggan/'.$id_pelanggan);
			} else {
				$this->session->set_flashdata('msg', 'edit');
				redirect('DashboardPelanggan');
			}
		}
	}

	private function validation_password()
	{
		$this->form_validation->set_rules('password', 'Password', 'trim');
		$this->form_validation->set_rules('password2', 'Konfirmasi Password', 'matches[password]');
		
	}
}
