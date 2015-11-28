<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Teacher_feedback extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->helper('crud_model');
		$this->load->library('session');
	}
	
	//*This function will used to open teacher feedback form to student and parent*/
	public function index() {
		// $school_holidays = array();
		// $this->db->select("holiday_date");
		// $this->db->from("ems_holidays");
		// $holiday_data = $this->db->get();
		// foreach($holiday_data->result() as $holiday){
			// $school_holidays[] = $holiday->holiday_date;
		// }
		// if(!in_array($today,$school_holidays)){	}
		$data = array();
		$this->template->getScript(); 
		$data['staff_list'] = retrieve_records($filterColumns = NULL, $offset = NULL, $limit = NULL, $sort = NULL, "ems_staff");
        $data['classSecton'] = getClass_section();
		$data['class_section_id'] = "";
		$data['staff_id'] = "";
		if($this->session->userdata('user_type') == 'S'){
			$this->template->getStudentHeader();
			$this->template->getStudentLeftBar();
		}else if($this->session->userdata('user_type') == 'P'){
			$this->template->getParentHeader();
			$this->template->getParentLeftBar();
		}		
		
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
	
	//*This function will used to store teacher feedback given by student*/
	public function feedback_by_student() {
		$data = array();
		$feedback_data = array();
		if($this->input->post()){
			if($this->input->post('staff_id')){
				$data['staff_id'] = $this->input->post('staff_id');
			}
			if($this->input->post('ans1')){
				$feedback_data[] = $this->input->post('ans1');
			}
			if($this->input->post('ans2')){
				$feedback_data[] = $this->input->post('ans2');
			}
			if($this->input->post('ans3')){
				$feedback_data[] = $this->input->post('ans3');
			}
			if($this->input->post('ans4')){
				$feedback_data[] = $this->input->post('ans4');
			}
			if($this->input->post()){
				$feedback_data[] = $this->input->post('ans5');
			}
			if($this->input->post('ans6')){
				$feedback_data[] = $this->input->post('ans6');
			}
			if($this->input->post('ans7')){
				$feedback_data[] = $this->input->post('ans7');
			}
			if($this->input->post('ans8')){
				$feedback_data[] = $this->input->post('ans8');
			}
			if($this->input->post('ans9')){
				$feedback_data[] = $this->input->post('ans9');
			}
			if($this->input->post('ans10')){
				$feedback_data[] = $this->input->post('ans10');
			}
		}
		$student_sess_data = $this->session->userdata('student');
		$ques =0 ;
		foreach($feedback_data as $feedback){
			$data['ques_id'] 			= $ques++;
			$data['ans'] 				= $feedback;
			$data['class_section_id'] 	= $student_sess_data['class_section_id'];
			$data['user_id'] 			= $student_sess_data['student_id'];
			$data['user_type'] 			= $this->session->userdata('user_type');
			$userdata 					= $this->session->userdata('user');
			$data['user_id'] 			= $userdata['user_id'];
			$data['created_date'] 		= date('Y-m-d H:i:s');
			insert($data , "ems_teacher_feedback") ;
		}
		redirect('feedback/teacher_feedback');
	}
	
	//*This function will used to store teacher feedback given by parent*/
	public function feedback_by_parent() {
		$data = array();
		if($this->input->post()){
			if($this->input->post('ans1')){
				$data['ans1'] = $this->input->post('ans1');
			}
			if($this->input->post('ans2')){
				$data['ans2'] = $this->input->post('ans2');
			}
			if($this->input->post('ans3')){
				$data['ans3'] = $this->input->post('ans3');
			}
			if($this->input->post('ans4')){
				$data['ans4'] = $this->input->post('ans4');
			}
			if($this->input->post('ans5')){
				$data['ans5'] = $this->input->post('ans5');
			}
			if($this->input->post('ans6')){
				$data['ans6'] = $this->input->post('ans6');
			}
			if($this->input->post('ans7')){
				$data['ans7'] = $this->input->post('ans7');
			}
			if($this->input->post('ans8')){
				$data['ans8'] = $this->input->post('ans8');
			}
			if($this->input->post('ans9')){
				$data['ans9'] = $this->input->post('ans9');
			}
			if($this->input->post('ans10')){
				$data['ans10'] = $this->input->post('ans10');
			}
		}
		$data['staff_id'] = 1;
		$data['user_type'] = $this->session->userdata('user_type');
		$userdata = $this->session->userdata('user');
		$data['user_id'] = $userdata['user_id'];
		$data['created_date'] = date('Y-m-d H:i:s');
		insert($data , "ems_teacher_feedback") ;
		redirect('feedback/teacher_feedback');
	}
}
?>