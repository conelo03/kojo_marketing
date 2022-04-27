<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_order extends CI_Model {

	public $table	= 'tb_order';

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join('tb_produk', 'tb_produk.id_produk=tb_order.id_produk');
		$this->db->join('tb_pegawai', 'tb_pegawai.id_pegawai=tb_order.id_pegawai');
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
		$this->db->join('tb_pegawai', 'tb_pegawai.id_pegawai=tb_order.id_pegawai');
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
