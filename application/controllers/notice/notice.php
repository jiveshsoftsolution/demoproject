<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Notice extends CI_Controller {

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('notice/notice_model', 'noticeModel');
		$this->load->model('class_section/class_section_model','classSection');
		$this->load->helper('crud_model');
		$this->load->helper('student_model');
		$this->load->model('attendance/attendance_model', 'attendanceModel');
		$this->load->model('attendance/staff_attendance_model', 'staffAttendanceModel');
	}

	public function index() {	}

	public function add_notice()
	{
		$classSectionData = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader();
		
		$birthday_teacher_data = get_birtday_teachers();
		$data['birthday_teacher_data']	= $birthday_teacher_data;			
		$data['today_student_attendance'] 	= $this->attendanceModel->get_today_student_attendance();		
		$data['today_staff_attendance'] 	= $this->staffAttendanceModel->get_today_staff_attendance();		
		$this->load->view('admin_include/left_sidebar',$data);
		
		$classSectionData['class'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_class");		
		$classSectionData['notice'] = $this->noticeModel->getClass_section_class_notice();
		$classSectionData['class_section'] = $this->classSection->getClass_section();
		$this->load->view('notice/notice_add',$classSectionData);
		$this->template->getFooter(); 
	}

	public function insert_notice()
	{
		$data = array();
		if($this->input->post('notice'))
			$data['notice'] = $this->input->post('notice');
		if($this->input->post('notice_for'))
			$data['notice_for'] = $this->input->post('notice_for');
		if($this->input->post('notice_for')==2){
			if($this->input->post('class_section_id'))
			$data['class_section_id'] = $this->input->post('class_section_id');
		}else{
			$data['class_section_id'] = "";
		}
		if($this->input->post('notice_subject'))
			$data['notice_subject'] = $this->input->post('notice_subject');
		if($this->input->post('post_to_web')=='on')
			$data['post_to_web'] = "1";
		else
			$data['post_to_web'] = "0";
		$data['created_date'] = date('Y-m-d H:i:s');
		insert($data , "ems_notice") ;
		redirect('notice/notice/add_notice');
	}
	
	public function delete_notice($notice_id="")
	{
		$ret = $this->noticeModel->delete_notice($notice_id);
		redirect('notice/notice/add_notice');	
	}
	
	public function notice_class_section($notice_for_id)
	{
		$classSectionData = array();
		if($notice_for_id=="2")
		{
			$classSectionData['class_section'] = $this->classSection->getClass_section();
			$this->load->view('common/ajax/class_section_dropdown',$classSectionData);
		}
	}
	
	public function edit_notice($notice_id=""){
		if(!empty($notice_id)){
			$classSectionData = array();
			$this->template->getScript(); 
			$this->template->getAdminHeader();
			
			$birthday_teacher_data = get_birtday_teachers();
			$data['birthday_teacher_data']	= $birthday_teacher_data;			
			$data['today_student_attendance'] 	= $this->attendanceModel->get_today_student_attendance();		
			$data['today_staff_attendance'] 	= $this->staffAttendanceModel->get_today_staff_attendance();		
			$this->load->view('admin_include/left_sidebar',$data);
			$filterColumns = array('notice_id' =>$notice_id);
			$notice_data = retrieve_records($filterColumns, $offset=NULL, $limit=NULL, $sort=NULL, "ems_notice");
			$classSectionData['edit_notice'] = $notice_data[0];
			$classSectionData['class'] = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_class");		
			$classSectionData['class_section'] = $this->classSection->getClass_section();
			$classSectionData['notice'] = $this->noticeModel->getClass_section_class_notice();
			$this->load->view('notice/notice_edit',$classSectionData);
			$this->template->getFooter(); 
		}else{
			$data = array();
			if($this->input->post('notice'))
				$data['notice'] = $this->input->post('notice');
			if($this->input->post('notice_for'))
				$data['notice_for'] = $this->input->post('notice_for');
			if($this->input->post('notice_for')==2){
				if($this->input->post('class_section_id'))
				$data['class_section_id'] = $this->input->post('class_section_id');
			}else{
				$data['class_section_id'] = "";
			}			
			if($this->input->post('notice_subject'))
				$data['notice_subject'] = $this->input->post('notice_subject');
			if($this->input->post('post_to_web')=='on')
				$data['post_to_web'] = "1";
			else
				$data['post_to_web'] = "0";
				$data['updated_date'] = date('Y-m-d H:i:s');
			$conditions  = array();
			$conditions['notice_id']  = $this->input->post('notice_id');
			update($data,$conditions,"ems_notice");
			redirect('notice/notice/add_notice');
		}		
	}
	public function update_notice_status()
	{
		$notice_id = $this->input->post('notice_id');
		if($this->input->post('notice_status')=="true")
			$updatedata['post_to_web'] = "1";
		else
			$updatedata['post_to_web'] = "0";
		$conditions  = array();
		$conditions['notice_id']  = $notice_id;
		update($updatedata,$conditions,"ems_notice");		
	}
}
?>