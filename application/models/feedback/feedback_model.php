<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feedback_model extends CI_Model
{  
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get_feedback_list(){
		$this->db->select("*");
		$this->db->from("ems_feedback");
		$this->db->where("as_read","1");
		$ret = $this->db->get(); 
		$data = array();
		$count = 0 ;
		foreach($ret->result() as $row){
			$data[$count]['feedback_id'] 			=  $row->feedback_id;
			$data[$count]['feedback_subject'] 		=  $row->feedback_subject;
			$data[$count]['feedback_description'] 		=  $row->feedback_description;
			$data[$count]['user_type'] 			=  $row->user_type;
			$data[$count]['created_date'] 			=  $row->created_date;
			$user_id = $row->user_id;
			$user_type = $row->user_type;
			if($user_type="S"){
				$this->db->select("CONCAT(s.first_name,' ',s.last_name) AS student_name",FALSE);
				$this->db->from("emsstudent s");
				$this->db->where("student_id",$user_id);
				$ret_data = $this->db->get();
				if($ret_data->num_rows()>=1)
				$data[$count]['created_by'] 		=   $ret_data->result()[0]->student_name;
			} else if($user_type="P"){
				$this->db->select("CONCAT(p.first_name,' ',sp.last_name) AS parent_name",FALSE);
				$this->db->from("emsparent p");
				$this->db->where("parent_id",$user_id);
				$ret_data = $this->db->get();
				if($ret_data->num_rows()>=1)
				$data[$count]['created_by'] 		=   $ret_data->result()[0]->parent_name;
			} else if($user_type="T"){
				$this->db->select("CONCAT(s.first_name,' ',s.last_name) AS staff_name",FALSE);
				$this->db->from("ems_staff s");
				$this->db->where("student_id",$user_id);
				$ret_data = $this->db->get();
				if($ret_data->num_rows()>=1)
				$data[$count]['created_by'] 		=   $ret_data->result()[0]->staff_name;
			}
		}
		$count++;
		return $data;
	}
    
}