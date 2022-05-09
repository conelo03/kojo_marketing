<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_order extends CI_Model {

	public $table	= 'tb_order';

	public function get_data($id_pegawai = null, $id_pelanggan = null, $confirm = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tb_produk', 'tb_produk.id_produk=tb_order.id_produk');
		$this->db->join('tb_pegawai', 'tb_pegawai.id_pegawai=tb_order.id_pegawai');
		$this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan=tb_order.id_pelanggan');
		if($id_pegawai != null){
			$this->db->where('tb_order.id_pegawai', $id_pegawai);
		}
		if($id_pelanggan != null){
			$this->db->where('tb_order.id_pelanggan', $id_pelanggan);
		}
		if($confirm == true){
			$this->db->where('tb_order.id_pegawai !=', null);
		}elseif($confirm == false){
			$this->db->where('tb_order.id_pegawai =', null);
		}
    return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_order)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tb_produk', 'tb_produk.id_produk=tb_order.id_produk');
		$this->db->join('tb_pegawai', 'tb_pegawai.id_pegawai=tb_order.id_pegawai', 'left');
		$this->db->join('tb_pelanggan', 'tb_pelanggan.id_pelanggan=tb_order.id_pelanggan');
		$this->db->where('tb_order.id_order', $id_order);
		return $this->db->get()->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_order', $data['id_order']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_order)
	{
		$this->db->delete($this->table, ['id_order' => $id_order]);
	}
}
