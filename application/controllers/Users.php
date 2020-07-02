<?php
class Users extends MY_Controller
{
	public function index()
	{
		log_message('error','error message in this line');
		log_message('debug','debug message in this line');
		log_message('info','info message in this line');
		//$this->load->helper('form')
		//$this->load->helper('html');
		//$this->load->helper('url');
		//$this->load->view('Users/articlelist');
		$this->load->model('loginmodel','ar');
		$this->load->library('pagination');
		$config=[
			'base_url'=>base_url('users/index'),
			'per_page'=>2,
			'total_rows'=>$this->ar->all_num_rows(),
			'full_tag_open'=>"<ul class='pagination'>",
			'full_tag_close'=>"</ul>",
			'prev_tag_open'=>"<li>",
			'prev_tag_close'=>"</li>",
			'next_tag_open'=>"<li>",
			'next_tag_close'=>"</li>",
			'num_tag_open'=>"<li>",
			'num_tag_close'=>"</li>",
			'cur_tag_open'=>"<li><a href='' class='active'>",
			'cur_tag_close'=>"</a></li>"
             ];
        $this->pagination->initialize($config);
		$articles=$this->loginmodel->all_articlelist($config['per_page'],$this->uri->segment(3));
		$this->load->view('Users/homepage',['articles'=>$articles]);
		
	}

        public function forget_password()
        {
            $this->load->view('Users/forget_password');    
	    }
	    public function validate_email()
	    {
	    	$this->load->library('form_validation');
	    	$this->form_validation->set_rules('email','email','required|valid_email');
	    	if($this->form_validation->run())
	    	{
	    		$email=$this->input->post('email');
	    		$this->load->model('verification','verify');
	    		$reset_id=$this->verify->verify_email($email);
	    		
	    		if($reset_id)
	    		{
	    			//$this->load->library('email');
			        //$this->email->to(set_value('email'),set_value('firstame'));
			        //$this->email->from("anushka10saxena@gmail.com");
			        //$this->email->subject("password reset verification");
			        //$this->email->message("Your password reset link is here</br>echo'link_tag("Users.php/edit_pass($reset_id)")');
			        //$this->email->set_newline("\r\n");
			        //$this->email->send();
				    //if(!$this->email->send())
				    //{
					    //show_error($this->email->print_debugger());
				    //}
			        //else
			        //{
				        //echo "your email has been sent";
			        //}
			        $this->edit_pass($reset_id);
        	        
                }
                else
                {
                	
        	        $this->session->set_flashdata('not_verified','email not verified');
	    			return redirect('Users/forget_password');
                }
	    	}
	    }
	    public function edit_pass($resetid)
	    {
	    	$this->load->model('verification','verify');
        	$reset=$this->verify->edit_pass($resetid);
        	        //print_r($reset);
        	        //exit;
        	$this->load->view('Users/password',['reset'=>$reset]);
	    }
	    
	    public function update_pass($id)
	    {
	    	$this->load->library('form_validation');
	    	$this->form_validation->set_rules('password','Password','required|max_length[12]');
	    	$this->form_validation->set_rules('confpassword','Password confirmation','required|matches[password]');
	    	if($this->form_validation->run())
	    	{
	    		$pass=$this->input->post('password');
	    		$password=password_hash($pass, PASSWORD_BCRYPT);
	    		$post['password']=$password;
	    		//print_r($post);
	    		//exit;
                $this->load->model('verification');
		        if($this->verification->password($id,$post))
		        {
				$this->session->set_flashdata('article_added','articles updated successfully');
				$this->session->set_flashdata('article_added_class','alert-success');
			    }
			    else
			    {
				$this->session->set_flashdata('article_added','articles not updated');
				$this->session->set_flashdata('article_added_class','alert-danger');
			    }
			    return redirect('login');
		    }
		    else
		    {

		    	$this->edit_pass($id);
		    }
		}
		public function login()
		{
			$this->load->view('Users/another_form');
		}
}
?>