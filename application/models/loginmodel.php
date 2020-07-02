<?php
class loginmodel extends CI_Model
{
	public function isvalidate($username)
	{
		//$this->load->database;
		//$this->load->library('encryption');
		//$pwd=$this->encryption->decrypt('$password');
        //print_r($pwd);
        //exit;
		$q=$this->db->where(['username'=>$username])
		            ->get('user');
		         //echo "<pre>";
		         //print_r($q->result());
		         //exit;

		         if($q->num_rows())
		         {
		         	return $q->row()->id;
		         }
		         else
		         {
		         	return false;
		         }

	}
	public function decrypt($uname)
	{
		$q=$this->db->select(['password'])
		            ->where(['username'=>$uname])
		            ->get('user');
		            return $q->row()->password;
		            //exit;
    }
	public function articlelist($limit,$offset)
	{
		$id=$this->session->userdata('id');
		$q=$this->db->select('')
		             ->from('articles')
		             ->where(['user_id'=>$id])
		             ->limit($limit,$offset)
		             ->get();
		             return $q->result();
		             //print_r($q);
		             //exit;
    }

public function edit_article($articleid)
{
	$q=$this->db->select(['article_title','article_body','id'])
	            ->where('id',$articleid)
	            ->from('articles')
	            ->get();
	         return $q->row();
	         
}
public function update_article($articleid,$article)
{
	return $this->db->where('id',$articleid)
	                ->update('articles',$article);
}
	
	public function num_rows()
	{
		$id=$this->session->userdata('id');
		$q=$this->db->select('')
		             ->from('articles')
		             ->where(['user_id'=>$id])
		             ->get();
		             return $q->num_rows();
	}
	public function add_article($array)
	{
		return $this->db->insert('articles',$array);
	}
	public function add_user($array)
	{
		return $this->db->insert('user',$array);
	}
	public function del($id)
	{
		return $this->db->delete('articles',['id'=>$id]);
	}
	public function all_articlelist($limit,$offset)
	{
		$q=$this->db->select()
		             ->from('articles')
		             ->limit($limit,$offset)
		             ->get();
		             return $q->result();
		             //print_r($q);
		             //exit;
    }

	public function all_num_rows()
	{
		//$id=$this->session->userdata('id');
		$q=$this->db->select()
		             ->from('articles')
		             ->get();
		             return $q->num_rows();
	}
	public function get_countryname($countryid)
	{
		$q=$this->db->select(['country_name'])
		            ->from('country')
		            ->where(['country_id'=>$countryid])
		            ->get();
		            return $q->row()->country_name;
		            //print_r($q->row()->country_name);
		            //exit;
	}
	public function get_statename($stateid)
	{
		$q=$this->db->select(['state_name'])
		            ->from('state')
		            ->where(['state_id'=>$stateid])
		            ->get();
		            return $q->row()->state_name;
		            //print_r($q->row()->country_name);
		            //exit;
	}
	public function get_cityname($cityid)
	{
		$q=$this->db->select(['city_name'])
		            ->from('city')
		            ->where(['city_id'=>$cityid])
		            ->get();
		            return $q->row()->city_name;
		            //print_r($q->row()->country_name);
		            //exit;
	}
}
?>