<?php
class model extends CI_Model
{
	
	public function select($tbl)
	{
		$qq=$this->db->get($tbl);
		return $ff=$qq->result();
	}

	public function select_where($tbl,$data)
	{
		$qq=$this->db->get_where($tbl,$data);
		return $ff=$qq->result();
	}

	public function select_join($tbl,$tdata)
	{
		$this->db->select('*');
		$this->db->from($tbl);
		foreach($tdata as $tk=>$tv)
		{
			$this->db->join($tk,$tv);	
		}

		$qq=$this->db->get();
		return $qq->result();
	}

	public function insert_data($tbl,$data)
	{
		$qq=$this->db->insert($tbl,$data);
		return $qq;
	}

	public function delete_data($tbl,$data)
	{
		$qq=$this->db->delete($tbl,$data);
		return $qq;
	}

	public function upd($tbl,$data,$idd)
	{
		$this->db->update($tbl,$data,$idd);
	}

}


?>