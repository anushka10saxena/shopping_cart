<?php
class admin extends MY_Controller
{
	public function __construct()
	{
		parent:: __construct();
		if(!$this->session->userdata('id'))
		return redirect('login');
	}
	public function welcome()
	{
		//if(!$this->session->userdata('id'))
			//return redirect('login');
		$this->load->model('loginmodel','ar');
		$this->load->library('pagination');
		$config=[
			'base_url'=>base_url('admin/welcome'),
			'per_page'=>3,
			'total_rows'=>$this->ar->num_rows(),
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
		$articles=$this->loginmodel->articlelist($config['per_page'],$this->uri->segment(3));
		$this->load->view('Admin/dashboard',['articles'=>$articles]);
	}
	
	public function logout()
	{
		$this->session->unset_userdata('id');
		return redirect('login');
	}
	public function editarticle($id)
	{
		$this->load->model('loginmodel');
		$article=$this->loginmodel->edit_article($id);
		//print_r($article);
		$this->load->view('Admin/edit_article',['article'=>$article]);
	}
	public function updatearticle($article_id)
	{
		if($this->form_validation->run('add_article_rules'))
		{
			$post=$this->input->post();
			//print_r($post);
			//exit;
			$this->load->model('loginmodel');
			if($this->loginmodel->update_article($article_id,$post))
			{
				$this->session->set_flashdata('article_added','articles updated successfully');
				$this->session->set_flashdata('article_added_class','alert-success');
			}
			else
			{
				$this->session->set_flashdata('article_added','articles not updated');
				$this->session->set_flashdata('article_added_class','alert-danger');
			}
			return redirect('admin/welcome');


		}
		else
		{
			$this->editarticle($article_id);
		}
	}
	public function delarticle()
		{
		    $id=$this->input->post('id');
			$this->load->model('loginmodel');
			if($this->loginmodel->del($id))
			{
				$this->session->set_flashdata('article_added','articles deleted successfully');
				$this->session->set_flashdata('article_added_class','alert-success');
			}
			else
			{
				$this->session->set_flashdata('article_added','articles not deleted');
				$this->session->set_flashdata('article_added_class','alert-danger');
			}
			return redirect('admin/welcome'); 

		}
	public function addarticle()
	{
		//user_id=$this->session->userdata('id');
		$this->load->view('Admin/add_article');
	}
	public function uservalidation()
	{
		//$this->load->library('form_validation');
		//$this->form_validation->set_rules('title','Article title','required|alpha');
		//$this->form_validation->set_rules('body','Article body','required|alpha');
		//if($this->form_validation->run())
		$config=[
			    'upload_path' => './upload/',
                'allowed_types' => 'gif|jpg|png',
		        ];
		$this->load->library('upload',$config);
		if($this->form_validation->run('add_article_rules')&& $this->upload->do_upload())
		{
			$post=$this->input->post();
			//print_r($post);
			//exit;
			$data=$this->upload->data();
			//echo"<pre>";
			//print_r($data);
			//exit;
			$image_path=base_url("upload/".$data['raw_name'].$data['file_ext']);
			$post['image_path']=$image_path;
			$this->load->model('loginmodel');
			if($this->loginmodel->add_article($post))
			{
				$this->session->set_flashdata('article_added','articles added successfully');
				$this->session->set_flashdata('article_added_class','alert-success');
			}
			else
			{
				$this->session->set_flashdata('article_added','articles not added');
				$this->session->set_flashdata('article_added_class','alert-danger');
			}
			return redirect('admin/welcome');


		}
		else
		{
			$upload_error=$this->upload->display_errors();
			//print_r(compact('upload_error'));
			$this->load->view('Admin/add_article',compact('upload_error'));
		}

	}	
	
	
	

}
?>