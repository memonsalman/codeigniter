<?php

class Student extends CI_Controller {

private $limit = 5;

function __construct()

{

parent::__construct();

#load library dan helper yang dibutuhkan
$this->load->model('Student_model','',TRUE);

}

function index($offset = 0, $order_column = 'id', $order_type = 'asc')

{

if (empty($offset)) $offset = 0;

if (empty($order_column)) $order_column = 'id';

if (empty($order_type)) $order_type = 'asc';

//TODO: check for valid column

// load data

$Students = $this->Student_model->get_paged_list($this->limit, $offset, $order_column, $order_type)->result();

// generate pagination

$this->load->library('pagination');

$config['base_url'] = site_url('Student/index/');

$config['total_rows'] = $this->Student_model->count_all();

$config['per_page'] = $this->limit;

$config['uri_segment'] = 3;

$this->pagination->initialize($config);

$data['pagination'] = $this->pagination->create_links();

// generate table data

$this->load->library('table');

$this->table->set_empty("");

$new_order = ($order_type == 'asc' ? 'desc' : 'asc');

$this->table->set_heading(

'No',

anchor('Student/index/'.$offset.'/name/'.$new_order, 'Name'),

anchor('Student/index/'.$offset.'/address/'.$new_order, 'Address'),

anchor('Student/index/'.$offset.'/gender/'.$new_order, 'Gender'),

'Actions'

);

$i = 0 + $offset;

foreach ($Students as $Student){

$this->table->add_row(++$i,

$Student->name,

$Student->address,

strtoupper($Student->gender)=='M'? '

Male':'Women',



anchor('Student/update/'.$Student->id,'update',array('class'=>'update')).' '.

anchor('Student/delete/'.$Student->id,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure you want to remove this Student?')"))

);

}

$data['table'] = $this->table->generate();

if ($this->uri->segment(3)=='delete_success')

$data['message'] = 'The Data was successfully deleted';

else if ($this->uri->segment(3)=='add_success')

$data['message'] = 'The Data has been successfully added';

else

$data['message'] = '';

// load view

$this->load->view('StudentList', $data);

}

// =================================country sate===========================

	public function ajaxa()
{
	$id=$this->input->post('country_details');
 	$data=array("scid"=>$id);
     $vv=$this->Model->select_where('satet',$data);
     
     if(count($vv)>0)
     {
      $vv_select_box='';
      $vv_select_box .='<option value="">select sate</opation>';
     	
     	foreach($vv as $v)
     	{
     
      @$vv_select_box.='<option value="'.$v->sid.'">'.$v->sname.'</opation>';
     	}
     	echo json_encode($vv_select_box);
     	     }
     // $this->load->view('welcome_message',$data);
}




}

?>
