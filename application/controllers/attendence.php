<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Attendence extends CI_Controller 
{
	public function index()
	{
		$this->db->select("*");
		$this->db->from("emsstudent");
		$res = $this->db->get();
		$studnet_data = $res->result();
		
		$schooldb = $this->load->database('schooldb', TRUE); 
		
		$st_data = array();
		foreach($studnet_data as $data){
			$st_data['first_name'] = $data->first_name;
			$st_data['last_name'] = $data->last_name;
			$schooldb->insert("emsstudent",$st_data);
		}		
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/login.php */