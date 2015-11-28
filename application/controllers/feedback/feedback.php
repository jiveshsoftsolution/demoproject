<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Feedback extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('feedback/feedback_model', 'feedbackModel');
		$this->load->model('class_section/class_section_model','classSection');
		$this->load->model('attendance/attendance_model', 'attendanceModel');
		$this->load->model('attendance/staff_attendance_model', 'staffAttendanceModel');
		$this->load->helper('crud_model');
		$this->load->helper('student_model');
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
		$this->load->view('feedback/feedback_add',$data);
		$this->template->getFooter(); 	
	}

	public function insert_feedback()
	{
		$data = array();
		if($this->input->post('feedback_subject'))
			$data['feedback_subject'] = $this->input->post('feedback_subject');
		if($this->input->post('feedback_description'))
			$data['feedback_description'] = $this->input->post('feedback_description');
		
		$data['user_type'] = $this->session->userdata('user_type');
		$userdata = $this->session->userdata('user');
		$data['user_id'] = $userdata['user_id'];
		$data['created_date'] = date('Y-m-d H:i:s');
		insert($data , "ems_feedback") ;
		redirect('feedback/feedback');
	}
	
	public function delete_feedback($feedback_id="")
	{
		$conditions = array();
		$conditions['feedback_id'] = $feedback_id; 
		$ret = delete($conditions,"ems_feedback");
		redirect('feedback/feedback');	
	}
	
	public function edit_feedback($feedback_id=""){
		if(!empty($feedback_id)){
			$data = array();
			$this->template->getScript(); 
			$this->template->getAdminHeader();
			
			$birthday_teacher_data 		= get_birtday_teachers();
			$data['birthday_teacher_data']	= $birthday_teacher_data;	
			$this->load->view('admin_include/left_sidebar',$data);
			
			$userFilterColumns 		= array('feedback_id' =>$feedback_id);
			$feedback_data 			= retrieve_records($userFilterColumns, $offset=NULL, $limit=NULL, $sort=NULL, "ems_feedback");
			$data['edit_feedback'] 		= $feedback_data[0];
			
			$filterColumns 			= array();
			$filterColumns['user_type'] 	= $this->session->userdata('user_type');
			$userdata 			= $this->session->userdata('user');
			$filterColumns['user_id'] 	= $userdata['user_id'];
			
			$sort 				= array();
			$sort['column'] 		= "updated_date";
			$sort['order'] 			= "DESC";
			$data['feedback'] 		= retrieve_records($filterColumns, $offset=NULL, $limit=NULL, $sort, "ems_feedback");	
			
			$this->load->view('feedback/feedback_edit',$data);
			$this->template->getFooter(); 
		}else{
			$data = array();
			if($this->input->post('feedback_subject'))
				$data['feedback_subject'] = $this->input->post('feedback_subject');
			if($this->input->post('feedback_description'))
				$data['feedback_description'] = $this->input->post('feedback_description');
			$conditions  			= array();
			$conditions['feedback_id']  	= $this->input->post('feedback_id');
			update($data,$conditions,"ems_feedback");
			redirect('feedback/feedback');
		}		
	}
	
	public function feedback_list(){
		$start_date = date('Y-m-d');
		$end_date = date('Y-m-d');
		if($this->input->post()){
			$data = array();
			$start_date = $this->input->post('start_date');
			$end_date = $this->input->post('end_date');
			$this->template->getScript(); 
			$this->template->getAdminHeader();
			
			$birthday_teacher_data = get_birtday_teachers();
			$data['birthday_teacher_data']	= $birthday_teacher_data;			
			$data['today_student_attendance'] 	= $this->attendanceModel->get_today_student_attendance();		
			$data['today_staff_attendance'] 	= $this->staffAttendanceModel->get_today_staff_attendance();		
			$this->load->view('admin_include/left_sidebar',$data);
			
			$data['feedback'] = $this->feedbackModel->get_feedback_list($start_date,$end_date);
			$this->load->view('feedback/feedback_list',$data);
			$this->template->getFooter(); 	
		}else{
			$data = array();
			$this->template->getScript(); 
			$this->template->getAdminHeader();
			
			$birthday_teacher_data = get_birtday_teachers();
			$data['birthday_teacher_data']	= $birthday_teacher_data;			
			$data['today_student_attendance'] 	= $this->attendanceModel->get_today_student_attendance();		
			$data['today_staff_attendance'] 	= $this->staffAttendanceModel->get_today_staff_attendance();		
			$this->load->view('admin_include/left_sidebar',$data);
			
			$data['feedback'] = $this->feedbackModel->get_feedback_list($start_date,$end_date);
			$this->load->view('feedback/feedback_list',$data);
			$this->template->getFooter(); 	
		}		
	}
	
	public function mark_read_feedback(){
		$feedback_id 			= $this->input->post("feedback_id");
		$data 				= array();
		$data['as_read'] 		= '1';
		$conditions  			= array();
		$conditions['feedback_id']  	= $this->input->post('feedback_id');
		update($data,$conditions,"ems_feedback");
		echo $feedback_id; die;
	}
}
?>