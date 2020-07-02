<?php
class Dynamic_dependent_controller extends CI_Controller
{
	public function __construct()
	{
		parent:: __construct();
		$this->load->model('Dynamic_dependent_model');
	}
	public function index()
	{
		//$this->load->model('Dynamic_dependent_model');
		$data['country']=$this->Dynamic_dependent_model->fetch_country();
		$this->load->view('Users/Dynamic_dependent_view',$data);
	}
	public function fetch_state()
		{
			
			//$this->load->model('Dynamic_dependent_model');
			if($this->input->post('country_id'))
			{
			//$this->load->model('Dynamic_dependent_model');
		     echo $this->Dynamic_dependent_model->fetch_state($this->input->post('country_id'));
		//$this->load->view('Users/Dynamic_dependent_view',$data);
		    }
		}
	public function fetch_city()
		{
			
			//$this->load->model('Dynamic_dependent_model');
			if($this->input->post('state_id'))
			{
			//$this->load->model('Dynamic_dependent_model');
		     echo $this->Dynamic_dependent_model->fetch_city($this->input->post('state_id'));
		//$this->load->view('Users/Dynamic_dependent_view',$data);
		    }
		}	
		
}
?>