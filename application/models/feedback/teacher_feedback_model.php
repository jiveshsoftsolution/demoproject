<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher_feedback_model extends CI_Model
{  
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function get_staff_list(){
		$this->db->select("s.staff_id,CONCAT(s.first_name,' ',s.last_name) as staff_name",FALSE);
		$this->db->from("ems_staff s");
		$this->db->join("ems_teacher_feedback tf","s.staff_id=tf.staff_id");
		$this->db->group_by("s.staff_id");
		$this->db->order_by("s.staff_id","ASC");
		$res = $this->db->get();
		return $res->result();
	}
    
	public function get_average_feedback($staff_id){
		$this->db->select("count(ans) as average",FALSE);
		$this->db->from("ems_teacher_feedback tf");
		$this->db->where("tf.staff_id",$staff_id);
		$this->db->where("tf.ans","1");
		$res = $this->db->get();
		return $res->result();
	}
	
	public function get_good_feedback($staff_id){
		$this->db->select("count(ans) as good",FALSE);
		$this->db->from("ems_teacher_feedback tf");
		$this->db->where("tf.staff_id",$staff_id);
		$this->db->where("tf.ans","2");
		$res = $this->db->get();
		return $res->result();
	}
	
	public function get_very_good_feedback($staff_id){
		$this->db->select("count(ans) as very_good",FALSE);
		$this->db->from("ems_teacher_feedback tf");
		$this->db->where("tf.staff_id",$staff_id);
		$this->db->where("tf.ans","3");
		$res = $this->db->get();
		return $res->result();
	}
	
	public function get_excellent_feedback($staff_id){
		$this->db->select("count(ans) as excellent",FALSE);
		$this->db->from("ems_teacher_feedback tf");
		$this->db->where("tf.staff_id",$staff_id);
		$this->db->where("tf.ans","4");
		$res = $this->db->get();
		return $res->result();
	}
	
	public function get_staff_feedback($staff_data=array()){
		$feedback_data = array();
		$average_data = array();
		foreach($staff_data as $staff){
			$average_data = $this->get_average_feedback($staff->staff_id);
			$good_data = $this->get_good_feedback($staff->staff_id);
			$very_good_data = $this->get_very_good_feedback($staff->staff_id);
			$excellent_data = $this->get_excellent_feedback($staff->staff_id);
			foreach($average_data as $average){
				$feedback_data['average'][] = $average->average;
			}
			foreach($good_data as $good_data){
				$feedback_data['good'][] = $good_data->good;
			}
			foreach($very_good_data as $very_good){
				$feedback_data['very_good'][] = $very_good->very_good;
			}
			foreach($excellent_data as $excellent){
				$feedback_data['excellent'][] = $excellent->excellent;
			}
		}
		return $feedback_data;
	}
	
	
}