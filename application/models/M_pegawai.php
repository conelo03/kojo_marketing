<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pegawai extends CI_Model {

	public $table	= 'tb_pegawai';

	public function get_data()
	{
		$this->db->select('*');
		$this->db->from($this->table);
        return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_pegawai)
	{
		return $this->db->get_where($this->table, ['id_pegawai' => $id_pegawai])->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_pegawai', $data['id_pegawai']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_pegawai)
	{
		$this->db->delete($this->table, ['id_pegawai' => $id_pegawai]);
	}
}
