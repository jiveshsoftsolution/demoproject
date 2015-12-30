<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fee_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
		$this->load->database();
    }
	
	public function get_selected_monthname($month_id)
	{
		$this->db->select('month');
		$this->db->from('ems_month');
		$this->db->where('`month_id` in ', ('('.$month_id.')'), false);
		$month_name  =	$this->db->get();		
		$monthData = array();
		foreach($month_name->result() as $month)
		{
			$monthData[] = $month->month;
		}
		return $monthData;
	}
	
	public function get_selected_class_section_name($class_section_id)
	{
		$this->db->select('ems_class.class_name,ems_section.section_name');
		$this->db->from('ems_class_section');
		$this->db->join('ems_class','ems_class.class_id=ems_class_section.class_id');
		$this->db->join('ems_section','ems_section.section_id=ems_class_section.section_id');
		$this->db->where('`class_section_id` in ', ('('.$class_section_id.')'), false);
		$class_section_name  =	$this->db->get();		
		$class_section_Data = array();
		foreach($class_section_name->result() as $class_section)
		{
			$class_section_Data[]['class_section_name'] = $class_section->class_name.' - '.$class_section->section_name;
		}
		return $class_section_Data;
	}
	
	public function get_fee_receipt($student_id=NULL){
	    $this->db->select("fs.*,s.first_name,s.middle_name,s.last_name,p.father_first_name,p.father_middle_name,p.father_last_name,GROUP_CONCAT(fm.month) as fee_month",FALSE);
	    $this->db->from('ems_fee_submission fs');
	    $this->db->join('emsstudent s','s.student_id=fs.student_id');
		$this->db->join('emsparent p','p.student_id=fs.student_id');
		$this->db->join('ems_fee_month fm','fm.submission_id=fs.submission_id');
	    $this->db->where('DATE(fs.created_date)',date('Y-m-d'));
		$this->db->where('fs.submission_id',$student_id);
	    $this->db->order_by('fs.created_date DESC');
	    $student_fee_data  =	$this->db->get();
	    return $student_fee_data->result();
	}
		
	public function get_fee_report($student_id=NULL){
	    $this->db->select("fs.*,s.first_name,s.middle_name,s.last_name,p.father_first_name,p.father_middle_name,p.father_last_name",FALSE);
	    $this->db->from('ems_fee_submission fs');
	    $this->db->join('emsstudent s','s.student_id=fs.student_id');
		$this->db->join('emsparent p','p.student_id=fs.student_id');
		$this->db->join('ems_fee_month fm','fm.submission_id=fs.submission_id');
		$this->db->group_by('fs.submission_id');
	    $this->db->having('Year(fs.submission_date)',date('Y'));
		$this->db->where('fs.student_id',$student_id);
	    $this->db->order_by('fs.submission_date DESC');
	    $student_fee_data  =	$this->db->get();
	    return $student_fee_data->result();
	}
	
	public function get_today_fee_list($fee_date = ""){
	    $this->db->select("fs.card_number,fs.total_fee,fs.submission_id,s.student_id,CONCAT(s.first_name,' ',s.last_name) AS student_name",FALSE);
	    $this->db->from('ems_fee_submission fs');
	    $this->db->join('ems_fee_month fm','fm.submission_id=fs.submission_id');
		$this->db->join('emsstudent s','s.student_id=fs.student_id');
		$this->db->where('DATE(fs.created_date)',$fee_date);
		$this->db->group_by('s.student_id');
		$this->db->order_by('fs.created_date','ASC');
	    $student_fee_data  =	$this->db->get();	
	    return $student_fee_data->result();
	}
	
	public function get_student_fee_record($student_id = ""){
	    $this->db->select("*");
	    $this->db->from('ems_fee_submission fs');
		$this->db->where('fs.student_id',$student_id);
	    $student_data  =	$this->db->get();	
	    return $student_data->num_rows();
	}
}