<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Teacher_feedback extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('feedback/feedback_model', 'feedbackModel');
		$this->load->model('class_section/class_section_model','classSection');
		$this->load->helper('crud_model');
	}

	public function index() {
		$data = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader();
		
		$birthday_teacher_data = get_birtday_teachers();
		$data['birthday_teacher_data']	= $birthday_teacher_data;	
		$this->load->view('admin_include/left_sidebar',$data);
		
		$filterColumns = array();
		$filterColumns['user_type'] = $this->session->userdata('user_type');
		$userdata = $this->session->userdata('user');
		$filterColumns['user_id'] = $userdata['user_id'];
		
		$sort = array();
		$sort['column'] = "updated_date";
		$sort['order'] = "DESC";
		$data['feedback'] = retrieve_records($filterColumns, $offset=NULL, $limit=NULL, $sort, "ems_feedback");		
		$this->load->view('feedback/teacher_feedback',$data);
		$this->template->getFooter(); 	
	}
	
	public function feedback_by_student() {
		echo '<pre>'; print_r($this->input->post()); die;
	}
}
?>