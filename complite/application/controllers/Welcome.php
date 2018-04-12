<?php

class Welcome extends CI_Controller
{

	private $limit = 5;
	public function index()
	{
$this->form_validation->set_rules('ename', 'Username', 'trim|required|min_length[5]|max_length[12]');
$this->form_validation->set_rules('eemail', 'Email', 'trim|required|valid_email');
	$this->form_validation->set_rules('gender', 'Gender', 'required');
	$this->form_validation->set_rules('ch[]', 'hobby', 'required');
	// $this->form_validation->set_rules('statet', 'State', 'required');
	$this->form_validation->set_rules('marsta', 'Marreig status', 'required');
	$this->form_validation->set_rules('salary', 'salary', 'required');
	$this->form_validation->set_rules('country', 'country', 'required');
	$this->form_validation->set_rules('satauts', 'satauts', 'required');
	$this->form_validation->set_rules('about', 'about', 'required');



		 if($this->form_validation->run() == FALSE)
		 {
			$vv['cou']=$this->Model->select('country');
			$vv['stt']=$this->Model->select('state');
			$vv['hob']=$this->Model->select('hobbies');
			$this->load->view("reg",$vv); 	
		 }
		 else
		 {

		if($this->input->post('sub'))
		{

			$n=$this->input->post('ename');
			$e=$this->input->post('eemail');
			$g=$this->input->post('gender');
			$ms=$this->input->post('marsta');
			$md=$this->input->post('marridate');
			$ss=$this->input->post('salary');
			$c=$this->input->post('country');
			$s=$this->input->post('state');
			$ab=$this->input->post('about');
			$h=$this->input->post('ch');
			$hh=implode(",",$h);
			$st=$this->input->post('satauts');
			
			$edata=array("eemail"=>$e);
			$inss=$this->Model->select_where("employee",$edata);
			$abc = count($inss);
			if($abc==1)
			{
				$this->session->set_flashdata('allredy', 'Sorry this email id is already registered.');	
				redirect('Welcome/index'); 
			}
			else
			{
				$data=array("ename"=>$n,"eemail"=>$e,"gender"=>$g,"marsta"=>$ms,"marridate"=>$md,"salary"=>$ss,"country"=>$c,"state"=>$s,"about"=>$ab,"hobbies"=>$hh,"satauts"=>$st);

			$qq=$this->Model->insert_data('employee',$data);

			if($qq==true)
			{
			$this->session->set_flashdata('success','data inserted successfuly');
				redirect("Welcome/home");
			}
		}
		}



		}

	}

	

	public function home($offset = 0, $order_column = 'eid', $order_type = 'asc')
	{
		$data['cou']=$this->Model->select('country');
		$data['stt']=$this->Model->select('state');
		  if (empty($offset)) $offset = 0;

  if (empty($order_column)) $order_column = 'id';

  if (empty($order_type)) $order_type = 'asc';

  $Students = $this->Model->get_paged_list($this->limit, $offset, $order_column, $order_type)->result();
  $this->load->library('pagination');

$config['base_url'] = site_url('Welcome/home/');

$config['total_rows'] = $this->Model->count_all('employee');

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

anchor('Welcome/home/'.$offset.'/ename/'.$new_order, 'Name'),
anchor('Welcome/home/'.$offset.'/eemail/'.$new_order, 'Email'),
anchor('Welcome/home/'.$offset.'/gender/'.$new_order, 'Gender'),
anchor('Welcome/home/'.$offset.'/country/'.$new_order, 'Country'),
anchor('Welcome/home/'.$offset.'/state/'.$new_order, 'State'),
anchor('Welcome/home/'.$offset.'/satauts/'.$new_order, 'satauts'),

'Actions'

);

$i = 0 + $offset;

foreach ($Students as $Student){

$this->table->add_row(++$i,

$Student->ename,
$Student->eemail,
$Student->gender,
$Student->cname,
$Student->sname,
$Student->satauts,



anchor('Welcome/edt/'.$Student->eid,'update',array('class'=>'update')).' '.

anchor('Welcome/del/'.$Student->eid,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure you want to remove this Student?')"))

);

}

$data['table'] = $this->table->generate();

if ($this->uri->segment(3)=='delete_success')

$data['message'] = 'The Data was successfully deleted';

else if ($this->uri->segment(3)=='add_success')

$data['message'] = 'The Data has been successfully added';

else

$data['message'] = '';



		
		// $tdata=array("state"=>"employee.state=state.sid","country"=>"country.cid=state.scid","hobbies"=>"employee.hobbies=hobbies.hid");
		// $vv['hom']=$this->Model->select_join('employee',$tdata);
		 $this->load->view('home',$data);
	}

	public function edt()
	{
		$vv['cou']=$this->Model->select('country');
		$vv['stt']=$this->Model->select('state');
		$vv['hob']=$this->Model->select('hobbies');

		$id=$this->uri->segment(3);
		$idd=array("eid"=>$id);
		$vv['ed']=$this->Model->select_where('employee',$idd);
		$this->load->view('update',$vv);
		if($this->input->post('updsub'))
		{
			$n=$this->input->post('ename');
			$e=$this->input->post('eemail');
			$g=$this->input->post('gender');
			$ms=$this->input->post('marsta');
			$md=$this->input->post('marridate');
			$ss=$this->input->post('salary');
			$c=$this->input->post('country');
			$s=$this->input->post('state');
			$ab=$this->input->post('about');
			$h=$this->input->post('ch');
			$hh=implode(",",$h);
			$st=$this->input->post('satauts');
			$data=array("ename"=>$n,"eemail"=>$e,"gender"=>$g,"marsta"=>$ms,"marridate"=>$md,"salary"=>$ss,"country"=>$c,"state"=>$s,"about"=>$ab,"hobbies"=>$hh,"satauts"=>$st);
			$this->Model->upd("employee",$data,$idd);
		$this->session->set_flashdata('Update','data Update successfuly');
			redirect("Welcome/home");
		}
	}


	public function del()
	{
		$id=$this->uri->segment(3);
		$data=array("eid"=>$id);
		$qq=$this->Model->delete_data('employee',$data);
		if($qq==true)
		{
			$this->session->set_flashdata('delete', 'Success deleted..!!');
			redirect("Welcome/home");
		}
		else
		{
			$this->session->set_flashdata('msg', 'not deleted..!!');
			redirect("Welcome/home");
		}

		
	}

	public function ajaxa()
{
	$id=$this->input->post('country_details');
 	$data=array("scid"=>$id);
     $vv=$this->Model->select_where('state',$data);
     
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


public function serch($offset = 0, $order_column = 'eid', $order_type = 'asc')
 {
 	 $title = trim($this->input->post('title'));
 	 $title2= trim($this->input->post('title2'));
 	 $title3= trim($this->input->post('title3'));
	 $title4= trim($this->input->post('title4'));
	 $title5= trim($this->input->post('title5'));
	 $title6= trim($this->input->post('title6'));

	 $serdata=array('ename'=>$title,'eemail'=>$title2,'gender'=>$title3,'country'=>$title4,'state'=>$title5,'satauts'=>$title6);
	 $seresult = array_filter($serdata);
	 

	  // print_r($serdata);
	  // die();
 	 if($this->input->post('title') !="")
	{
		if (empty($offset)) $offset = 0;

  if (empty($order_column)) $order_column = 'id';

  if (empty($order_type)) $order_type = 'asc';

  $Students = $this->Model->get_paged_list2($this->limit, $offset, $order_column, $order_type,$seresult)->result();
  $this->load->library('pagination');

$config['base_url'] = site_url('Welcome/home/');

$config['total_rows'] = $this->Model->count_all('employee');

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

anchor('Welcome/home/'.$offset.'/ename/'.$new_order, 'Name'),
anchor('Welcome/home/'.$offset.'/eemail/'.$new_order, 'Email'),
anchor('Welcome/home/'.$offset.'/gender/'.$new_order, 'Gender'),
anchor('Welcome/home/'.$offset.'/country/'.$new_order, 'Country'),
anchor('Welcome/home/'.$offset.'/state/'.$new_order, 'State'),
anchor('Welcome/home/'.$offset.'/satauts/'.$new_order, 'satauts'),

'Actions'

);

$i = 0 + $offset;

foreach ($Students as $Student){

$this->table->add_row(++$i,

$Student->ename,
$Student->eemail,
$Student->gender,
$Student->cname,
$Student->sname,
$Student->satauts,



anchor('Welcome/edt/'.$Student->eid,'update',array('class'=>'update')).' '.

anchor('Welcome/del/'.$Student->eid,'delete',array('class'=>'delete','onclick'=>"return confirm('Are you sure you want to remove this Student?')"))

);



}
if(empty($Students))
{
	echo "No data found";
}

$data['table'] = $this->table->generate();

if ($this->uri->segment(3)=='delete_success')

$data['message'] = 'The Data was successfully deleted';

else if ($this->uri->segment(3)=='add_success')

$data['message'] = 'The Data has been successfully added';

else

$data['message'] = '';


 $this->load->view('home',$data);
	
	}
	
	else
	{
	
	redirect("Welcome/home");
	}
        
}
}

?>
