<?php

class Student_model extends CI_Model{

private $primary_key='id';

private $table_name='student';

function __consturct(){

parent::__construct();

}

function get_paged_list($limit=10, $offset=0, $order_column='', $order_type='asc'){

if(empty($order_column)||empty($order_type)){

$this->db->order_by($this->primary_key,'asc');

}

else{

$this->db->order_by($order_column,$order_type);

return $this->db->get($this->table_name, $limit, $offset);

}

}

function count_all(){

return $this->db->count_all($this->table_name);

}






}

?>