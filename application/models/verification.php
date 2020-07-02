<?php
class verification extends CI_Model
{
	public function verify_email($email)
	{
        $q=$this->db->where(['email'=>$email])
                 ->get('user');

                 if($q->num_rows())
                 {
                 	return $q->row()->id;

                 }
                 else
                 {
                 	return false;
                 }

	}
	public function edit_pass($articleid)
    {
	  $q=$this->db->select(['password','id'])
	              ->where('id',$articleid)
	              ->from('user')
	              ->get();
	         return $q->row();
	         //print_r($q->row());
	         //exit;
    }
	//public function reset_pass($reset_id)
	//{
		//$id=$this->session->userdata('id');
		//$q=$this->db->select(['password','id'])
		             //->from('user')
		             //->where(['id'=>$reset_id])
		             //->get();
		             //return $q->result();
	//}
	public function password($resetid,$password)
	{
       return $this->db->where('id',$resetid)
                       ->update('user',$password);
	}
}
?>