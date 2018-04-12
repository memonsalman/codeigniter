<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class model extends CI_Model
{
	private $primary_key='eid';

private $table_name='employee';
 
    public function __construct()
    {
        parent::__construct();
    }
    
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
	public function num_row()
	{
				$qq=$this->db->get($tbl);
		return $ff=$qq->num_row();
	}

	function get_paged_list($limit=10, $offset=0, $order_column='', $order_type='asc'){

if(empty($order_column)||empty($order_type)){

$this->db->order_by($this->primary_key,'asc');

}

else{

		// $this->db->select('*');
		// $this->db->from($table_name);
	$tdata=array("state"=>"employee.state=state.sid","country"=>"country.cid=state.scid");
		foreach($tdata as $tk=>$tv)
		{
			$this->db->join($tk,$tv);	
		}
		
		$this->db->order_by($order_column,$order_type);
		return $this->db->get($this->table_name, $limit, $offset);


// $this->db->order_by($order_column,$order_type);

// return $this->db->get($this->table_name, $limit, $offset);


}

}

	function count_all($tbl){

		$this->db->from($tbl);
		$query = $this->db->get();
		return $rowcount = $query->num_rows();

}


public function get_autocomplete($tname,$cname,$search_data)
	{
				$this->db->select('*');
			   	$this->db->from($tname);
                $this->db->like($cname,$search_data);
                $qq=$this->db->get();
			  	return $qq->result();
	}

	public function allrecord($title){
        if(!empty($title)){
            $this->db->like('ename',$title);
        }
        $this->db->select('*');
        $this->db->from('employee');
        $rs = $this->db->get();
        return $rs->num_rows();
    }
		
//    function get_paged_list2($limit=10, $offset=0, $order_column='', $order_type='asc',$title){

// if(empty($order_column)||empty($order_type)){

// $this->db->order_by($this->primary_key,'asc');

// }

// else{

// 		// $this->db->select('*');
// 		// $this->db->from($table_name);
// 	$tdata=array("state"=>"employee.state=state.sid","country"=>"country.cid=state.scid");
// 		foreach($tdata as $tk=>$tv)
// 		{
// 			$this->db->join($tk,$tv);	
// 		}
// 		$this->db->like('ename',$title);
// 		$this->db->or_like('eemail',$title);
// 		$this->db->or_like('gender',$title);
// 		$this->db->or_like('marsta',$title);
// 		$this->db->or_like('cname',$title);
// 		$this->db->or_like('sname',$title);
// 		$this->db->or_like('satauts',$title);	
// 		$this->db->order_by($order_column,$order_type);
// 		return $this->db->get($this->table_name, $limit, $offset);


// // $this->db->order_by($order_column,$order_type);

// // return $this->db->get($this->table_name, $limit, $offset);


// }

// }

function get_paged_list2($limit=10, $offset=0, $order_column='', $order_type='asc',$seresult){

if(empty($order_column)||empty($order_type)){

$this->db->order_by($this->primary_key,'asc');

}

else{

		// $this->db->select('*');
		// $this->db->from($table_name);
	$tdata=array("state"=>"employee.state=state.sid","country"=>"country.cid=state.scid");
		foreach($tdata as $tk=>$tv)
		{
			$this->db->join($tk,$tv);	
		}
		$this->db->where($seresult);
		// $this->db->where('ename',$title);
		// $this->db->where('eemail',$title2);
		// $this->db->where('gender',$title3);
		// $this->db->where('country',$title4);
		// $this->db->where('state',$title5);
		// $this->db->where('satauts',$title6);
		$this->db->order_by($order_column,$order_type);
		return $this->db->get($this->table_name, $limit, $offset);


// $this->db->order_by($order_column,$order_type);

// return $this->db->get($this->table_name, $limit, $offset);


}

}




    }
