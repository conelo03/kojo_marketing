<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_akun extends CI_Model {

	public $table	= 'tb_akun';

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

	public function get_by_id($id_akun)
	{
		return $this->db->get_where($this->table, ['id_akun' => $id_akun])->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_akun', $data['id_akun']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_akun)
	{
		$this->db->delete($this->table, ['id_akun' => $id_akun]);
	}
}
