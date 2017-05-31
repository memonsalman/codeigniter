<?php

class control extends CI_Controller
{
	public function index()
	{

		 $this->form_validation->set_rules('unm', 'Username', 'trim|required|min_length[5]|max_length[12]');
		 $this->form_validation->set_rules('pass', 'password', 'required|alpha_numeric');
		 $this->form_validation->set_rules('gen', 'Gender', 'required');
		 $this->form_validation->set_rules('ch[]', 'hobby', 'required');
		 $this->form_validation->set_rules('st', 'State', 'required');

		 if($this->form_validation->run() == FALSE)
		 {
			$vv['cou']=$this->model->select('country');
			$vv['stt']=$this->model->select('state');
			$this->load->view("reg",$vv); 	
		 }
		 else
		 {

		if($this->input->post('sub'))
		{
			$u=$this->input->post('unm');
			$p=$this->input->post('pass');
			$g=$this->input->post('gen');
			$h=$this->input->post('ch');
			$hh=implode(",",$h);
			$s=$this->input->post('st');
			$data=array("unm"=>$u,"pass"=>$p,"gender"=>$g,"hobby"=>$hh,"state"=>$s);
			$qq=$this->model->insert_data('reg',$data);
			if($qq==true)
			{
				$this->session->set_flashdata('msg', 'insert successfully');
				redirect("control/index");
			}
		}

		}

	}

	public function logged()
	{
		$this->load->view('login');
		if($this->input->post('log_sub'))
		{
			$u=$this->input->post('unm');
			$p=$this->input->post('pass');
			$data=array("unm"=>$u,"pass"=>$p);
			$vv=$this->model->select_where('reg',$data);
			if(count($vv)>0)
			{
				$sr=array("user"=>$u,"userid"=>$vv[0]->rid);
				$this->session->set_userdata($sr); 
				redirect("control/home");
			}
			else
			{
				$this->session->set_flashdata('logmsg', 'Your username and password wrong..!!');
				redirect("control/logged");
			}
		}
	}

	public function logt()
	{
		$this->session->unset_userdata('user');
		$this->session->unset_userdata('userid');
		$this->session->sess_destroy();
		redirect("control/logged");
	}

	public function home()
	{
		$tdata=array("state"=>"reg.state=state.sid");
		$vv['hom']=$this->model->select_join('reg',$tdata);
		$this->load->view('home',$vv);
	}

	public function edt()
	{
		$vv['cou']=$this->model->select('country');
		$vv['stt']=$this->model->select('state');
		$id=$this->uri->segment(3);
		$idd=array("rid"=>$id);
		$vv['ed']=$this->model->select_where('reg',$idd);
		$this->load->view('update',$vv);
		if($this->input->post('updsub'))
		{
			$u=$this->input->post('unm');
			$p=$this->input->post('pass');
			$g=$this->input->post('gen');
			$h=$this->input->post('ch');
			$hh=implode(",",$h);
			$s=$this->input->post('st');
			$data=array("unm"=>$u,"pass"=>$p,"gender"=>$g,"hobby"=>$hh,"state"=>$s);
			$this->model->upd("reg",$data,$idd);
			redirect("control/home");
		}
	}


	public function del()
	{
		$id=$this->uri->segment(3);
		$data=array("rid"=>$id);
		$qq=$this->model->delete_data('reg',$data);
		if($qq==true)
		{
			$this->session->set_flashdata('msg', 'Success deleted..!!');
			redirect("control/home");
		}
		else
		{
			$this->session->set_flashdata('msg', 'not deleted..!!');
			redirect("control/home");
		}

		
	}
	
}

?>