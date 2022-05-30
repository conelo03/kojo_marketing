<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_detail_agenda extends CI_Model {

	public $table	= 'tb_detail_agenda';

	public function get_data($id_agenda = null)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		if(!is_null($id_agenda)){
			$this->db->where('id_agenda', $id_agenda);
		}
    return $this->db->get();
	}

	public function insert($data)
	{
		$this->db->insert($this->table, $data);
	}

	public function get_by_id($id_detail_agenda)
	{
		return $this->db->get_where($this->table, ['id_detail_agenda' => $id_detail_agenda])->row_array();
	}

	public function get_by_role($role)
	{
		return $this->db->get_where($this->table, ['role' => $role])->result_array();
	}

	public function update($data)
	{
		$this->db->where('id_detail_agenda', $data['id_detail_agenda']);
		$this->db->update($this->table, $data);
	}

	public function delete($id_detail_agenda)
	{
		$this->db->delete($this->table, ['id_detail_agenda' => $id_detail_agenda]);
	}
}
