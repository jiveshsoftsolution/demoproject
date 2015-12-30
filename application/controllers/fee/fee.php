<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Fee extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('class_section/class_section_model','classSection');
		$this->load->model('student/student_model','studentModel');
		$this->load->model('fee/fee_model','feeModel');
		$this->load->helper('crud_model');
		$this->load->model('attendance/attendance_model', 'attendanceModel');
		$this->load->model('attendance/staff_attendance_model', 'staffAttendanceModel');
	}
	
	public function retrive_student_name($class_section_id)
	{
		$this->studentModel->get_student_name($class_section_id);
	}
	
	public function search_fee_report()
	{
		$data = array();
		$filterColumns = array();
		$data['student_data'] = array();
		if($this->input->post()){
			$student_data = array();
			if($this->input->post('session_id'))
			{
			  $session_id= (int)$this->input->post('session_id');
			  $filterColumns['session_id'] = $session_id;
			}
			if($this->input->post('class_section_id'))
			{
			  $class_section_id= (int)$this->input->post('class_section_id');
			  $filterColumns['class_section_id'] = $class_section_id;
			}
			if($session_id==0 && $class_section_id==0)
			{
				$student_data = getStudentBySessionId_ClassSectionId($filterColumns, $offset=NULL, $limit=NULL, $sort=NULL);
			}
			else
			{
			  $student_data = getStudentBySessionId_ClassSectionId($filterColumns, $offset=NULL, $limit=NULL, $sort=NULL);
			}
			if(count($student_data)>0){
				$i = 0;
				foreach($student_data as $student){
					$student_fee_data = $this->feeModel->get_student_fee_record($student->student_id);
					if($student_fee_data){
						$student_data[$i]->student_fee_data = $student_fee_data;
					}
					$i++;
				}
			}
			$data['student_data']  = $student_data;
		}	
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$birthday_teacher_data = get_birtday_teachers();
		$data['birthday_teacher_data']	= $birthday_teacher_data;			
		$data['today_student_attendance'] 	= $this->attendanceModel->get_today_student_attendance();		
		$data['today_staff_attendance'] 	= $this->staffAttendanceModel->get_today_staff_attendance();
		$data['session'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_session");
		$data['class_section'] = $this->classSection->getClass_section();
		$this->load->view('admin_include/left_sidebar',$data);
		$this->load->view('fee/fee_report_search',$data);
		$this->template->getFooter(); 	
	}
	
	public function fee_submission($session_id=NULL,$class_section_id=NULL)
	{
		$today = date("Y-m-d");
		$data = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$birthday_teacher_data = get_birtday_teachers();
		$data['birthday_teacher_data']	= $birthday_teacher_data;			
		$data['today_student_attendance'] 	= $this->attendanceModel->get_today_student_attendance();		
		$data['today_staff_attendance'] 	= $this->staffAttendanceModel->get_today_staff_attendance();
		$data['session'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_session");
		$data['month'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_month");
		$data['class_section'] = $this->classSection->getClass_section();
		$data['student_data'] = $this->feeModel->get_today_fee_list($today);
		$this->load->view('admin_include/left_sidebar',$data);
		$this->load->view('fee/fee_submission',$data);
		$this->template->getFooter(); 	
	}
	
	public function fee_submission_add(){
		if($this->input->post()){
			$data 				= array();
			$now				= date('Y-m-d H:i:s');
			$data['session_id'] 		= $this->input->post("session_id");			
			$data['student_id'] 		= $this->input->post("student_id");
			$data['class_section_id'] 	= $this->input->post("class_section_id");
			$session_id 				= $data['session_id'];
			$class_section_id 			= $data['class_section_id'];
			$data['card_number'] 		= $this->input->post("card_number");
			$data['tuition_fee'] 		= $this->input->post("tuition_fee");
			$data['transport_fee'] 		= $this->input->post("transport_fee");
			$data['miscellaneous_fee'] 	= $this->input->post("miscellaneous_fee");
			$data['total_fee'] 			= $this->input->post("total_fee");
			$fee_months					= $this->input->post("month");
			$data['submission_date'] 	= $now;
			$data['created_date'] 		= $now;
			insert($data , "ems_fee_submission"); 
			$submission_id = $this->db->insert_id();
			$fee_month_data = array();
			foreach($fee_months as $months){
				$fee_month_data['month'] 	= $months;
				$fee_month_data['submission_id'] 	= $submission_id;
				insert($fee_month_data , "ems_fee_month");				
			}
		}
		redirect("fee/fee/fee_submission/$session_id/$class_section_id");
	}
	
	
	public function get_fee_receipt($submission_id){
		$data = array();
		$data['school_data']  = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_school_profile");
		$data['student_fee_data'] = $this->feeModel->get_fee_receipt($submission_id);
		$data['class_section'] = $this->classSection->getClass_section();
		$data['month'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_month");
		$this->template->getScript();
		$this->load->view('fee/fee_receipt',$data);
	}
	
	public function get_fee_report($student_id=NULL,$session_id=NULL){
		$data = array();
		$filterColumns = array("session_id"=>$session_id);
		$data['school_session']  = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_session");
		$data['school_data']  = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_school_profile");
		$data['student_fee_data'] = $this->feeModel->get_fee_report($student_id);
		$data['class_section'] = $this->classSection->getClass_section();
		$data['month'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_month");
		$this->template->getScript();
		$this->load->view('fee/fee_report',$data);
	}
	
}
?>