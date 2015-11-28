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

	public function index() {	}
	
	public function add_fee_type()
	{
		$data = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
		$data['fee_type'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_fee_type");
		$this->load->view('fee/fee_type_add',$data);
		$this->template->getFooter(); 	
	}
	
	public function insert_fee_type()
	{
		$data = array();
		if($this->input->post('fee_type_name')){
			$data['fee_type_name'] = addslashes($this->input->post('fee_type_name'));
		}		
		//$this->input->post('refundable') ? $data['refundable'] = true : $data['refundable'] = false;
		$this->input->post('is_active') ? $data['is_active'] = '1' : $data['is_active'] = '0';
		insert($data , "ems_fee_type") ;
		redirect('fee/fee/add_fee_type');
	}
	
	public function add_fee_setting()
	{
		$data = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
		$data['session'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_session");
		$data['month'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_month");
		$data['class_section'] = $this->classSection->getClass_section();
		$data['fee_type'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_fee_type");
		$data['fee_setting'] = $this->feeModel->getfee_settings();
		$this->load->view('fee/fee_setting_add',$data);
		$this->template->getFooter(); 	
	}
	
	public function insert_fee_setting()
	{
		$data = array();
		if($this->input->post('session_id'))
		$data['session_id'] = addslashes($this->input->post('session_id'));
		if($this->input->post('fee_type_id'))
		$data['fee_type_id'] = addslashes($this->input->post('fee_type_id'));
		if($this->input->post('amount'))
		$data['amount'] = addslashes($this->input->post('amount'));
		if($this->input->post('class_section'))
		{
			$class_section = implode(',',$this->input->post('class_section'));
			$data['class_section_id'] = $class_section;
		}
		if($this->input->post('month'))
		{
			$month = implode(',',$this->input->post('month'));
			$data['month_id'] = $month;
		}
		insert($data , "ems_fee_amount") ;
		redirect('fee/fee/add_fee_setting');
	}
	
	public function add_fee_submisssion()
	{
		$data = array(); 
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 
		$this->template->getAdminLeftBar();	
		$data['session'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_session");
		$data['month'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_month");
		$data['class_section'] = $this->classSection->getClass_section();
		$data['fee_setting'] = $this->feeModel->getfee_settings();
		$this->load->view('fee/fee_submission_add',$data);
		$this->template->getFooter(); 	
	}
	
	public function retrive_student_name($class_section_id)
	{
		$this->studentModel->get_student_name($class_section_id);
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
	
	public function get_fee_report($student_id){
		$data = array();
		$data['student_fee_data'] = $this->feeModel->get_fee_report($student_id);
		$data['class_section'] = $this->classSection->getClass_section();
		$data['month'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_month");
		$this->template->getScript();
		$this->load->view('fee/fee_report',$data);
	}
	
}
?>