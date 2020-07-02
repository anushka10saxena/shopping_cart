<?php
class login extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('id'))
			return redirect('admin/welcome/');
	}
	
	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('uname','User Name','required|alpha');
		$this->form_validation->set_rules('pass','Password','required|max_length[12]');

		if ($this->form_validation->run())
		 {
		 	//$this->load->library('encryption');
			$uname=$this->input->post('uname');
			$pass=$this->input->post('pass');
			$this->load->model('loginmodel');
			$password=$this->loginmodel->decrypt($uname);
			//$post=$this->encryption->decrypt($password);
			//print_r($post);
			//exit;
			$login_id=$this->loginmodel->isvalidate($uname);
			if($login_id && password_verify($pass,$password))
			{
				//echo "details matched";
				$this->load->library('session');
				$this->session->set_userdata('id',$login_id);
				return redirect('admin/welcome');

			}
		else
		{

			$this->session->set_flashdata('login_failed','invalid username/password');
			return redirect('login');
		}
	}
	else
	{
		$this->load->view('Admin/Login');
	}
}
public function register()
	{
		$this->load->model('Dynamic_dependent_model');
		$data['country']=$this->Dynamic_dependent_model->fetch_country();
		//$this->load->view('Users/Dynamic_dependent_view',$data);
		$this->load->view('Admin/register',$data);
	}
public function fetch_state()
		{
			
			$this->load->model('Dynamic_dependent_model');
			if($this->input->post('country_id'))
			{
			//$this->load->model('Dynamic_dependent_model');
		     echo $this->Dynamic_dependent_model->fetch_state($this->input->post('country_id'));
		//$this->load->view('Users/Dynamic_dependent_view',$data);
		    }
		}
	public function fetch_city()
		{
			
			$this->load->model('Dynamic_dependent_model');
			if($this->input->post('state_id'))
			{
			//$this->load->model('Dynamic_dependent_model');
		     echo $this->Dynamic_dependent_model->fetch_city($this->input->post('state_id'));
		//$this->load->view('Users/Dynamic_dependent_view',$data);
		    }
		}	
public function sendemail()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','User Name','required|alpha|is_unique[user.username]');
		$this->form_validation->set_rules('password','Password','required|max_length[12]');
		$this->form_validation->set_rules('firstname','First Name','required|alpha');
		$this->form_validation->set_rules('lastname','Last Name','required|alpha');
		$this->form_validation->set_rules('email','Email address','required|valid_email|is_unique[user.email]');

		if ($this->form_validation->run())
		{
		 	//$this->load->library('encryption');
		 	//$pass=$this->input->post('password');
		 	//$password=$this->encryption->encrypt($pass);
		 	//$post=$this->encryption->decrypt($password);
		 	$pass=$this->input->post('password');
		 	$password=password_hash($pass, PASSWORD_BCRYPT);
		 	$country_id=$this->input->post('country');
		 	$state_id=$this->input->post('state');
		 	$city_id=$this->input->post('city');
		 	//print_r($country_id);
		 	//exit;
		    $country=$this->loginmodel->get_countryname($country_id);
		    $state=$this->loginmodel->get_statename($state_id);
		    $city=$this->loginmodel->get_cityname($city_id);
		 	$post=$this->input->post();
		 	$post['country']=$country;
		 	$post['state']=$state;
		 	$post['city']=$city;
		 	$post['password']=$password;
		 	$this->load->model('loginmodel');
			if($this->loginmodel->add_user($post))
			{
				$this->session->set_flashdata('user_added','user added successfully');
				$this->session->set_flashdata('user_added_class','alert-success');
			}
			else
			{
				$this->session->set_flashdata('user_added','user not added');
				$this->session->set_flashdata('user_added_class','alert-danger');
			}
			return redirect('login');

			$this->load->library('email');
			$this->email->from("anushka10saxena@gmail.com");
			$this->email->to(set_value('email'),set_value('firstame'));
			$this->email->subject("registrations greeting");
			$this->email->message("thank you for registration");
			$this->email->set_newline("\r\n");
			$this->email->send();
				if(!$this->email->send())
				{
					show_error($this->email->print_debugger());
				}
			else
			{
				echo "your email has been sent";
			}
	    }
	    else
	    {
	    	$this->load->view('Admin/register');
	    }
    }
}
?>