<?php
if (!defined('BASEPATH'))
exit('No direct script access allowed');

class Sms extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('class_section/class_section_model','classSection');
		$this->load->model('student/student_model', 'studentModel');
		$this->load->model('staff/staff_model', 'staffModel');
                $this->load->model('sms/sms_model', 'smsModel');
		$this->load->helper('crud_model');
		$this->load->helper('student_model');
		require_once APPPATH.'third_party/sms/sms.php';
	}

	public function index() {}

	public function general_sms(){
		$data = array();
		$this->template->getScript(); 
		$this->template->getAdminHeader(); 	
		$data['class_section'] = $this->classSection->getClass_section();
		$data['sms_template'] = $this->smsModel->getSmsTemplate();
		$this->load->view('sms/general_sms' ,$data);
		$this->template->getFooter(); 
	}
	
	public function retrive_student_list() {
		$data =  array();
		if($this->input->post('class_section_id')) {
			$filterColumns['class_section_id'] = $this->input->post('class_section_id');
			$filterColumns['session_id'] = 1;
			$data = getStudentBySessionId_ClassSectionId($filterColumns, $offset=NULL, $limit=NULL, $sort=NULL);
			// echo $this->db->last_query();echo '<pre>'; print_r($data); die;
			if(isset($data['result']) && $data['result']==0){
				$studentlist_body = "<div class='alert-box warning'>
							Records Not Found !
							<a href='javascript:void(0)' class='close'>×</a>
						</div>";			
			} else	{
				$student_list = array();
				$count = 0;
				foreach($data as $studentlist)
				{			
					$student_data = array();
					$student_data['student_id'] = $studentlist->student_id;
					$student_data['student_name'] = ucfirst($studentlist->first_name).' '.ucfirst($studentlist->middle_name).' '.ucfirst($studentlist->last_name);  
					$student_data['father_name'] = ucfirst($studentlist->father_first_name).' '.ucfirst($studentlist->father_middle_name).' '.ucfirst($studentlist->father_last_name);
					$student_data['class_section_id'] = $studentlist->class_section_id;
					$student_data['mobile'] = $studentlist->parent_mobile;
					$student_list[$count] = $student_data;
					$count++;
				}
				$studentlist_body = "<table class='display' id='content_table'>
											<thead>
												<tr>
													<th><input type='checkbox' onclick='checkedAllStudent()'></th>
													<th>Student Name</th>
													<th>Father Name</th>
													<th>Mobile No.</th>
												</tr>
											</thead>
											<tbody>";									
										foreach($student_list as $studentlistData) 
										{
				$studentlist_body .= "<tr>
											<td class='essential'><input type='checkbox' id='chk_".$studentlistData['student_id']."' name='sms_student_list[".$studentlistData['student_id']."]'></td>
											<td>". $studentlistData['student_name']."</td>
											<td>". $studentlistData['father_name']."</td>
											<td>". $studentlistData['mobile']."</td>
										</tr>";
										}
				$studentlist_body .="</tbody></table>";
			}
			echo $studentlist_body;
		}
	}
	
	public function student_send_sms(){	
		$data = array();
		$sendSMSArray = array();
		if($this->input->post('class_section_id'))
		{
			$sendSMSArray['class_section_id']  = $this->input->post('class_section_id');
		}
		if($this->input->post('regards_id'))
		{
			$sendSMSArray['regards_id']  = $this->input->post('regards_id');
		}
		if($this->input->post('sender_id'))
		{
			$sendSMSArray['sender_id']  = $this->input->post('sender_id');
		}
		$content_message = "";
		if($this->input->post('txt_message'))
		{
			$content_message  = "Dear Parent, ". $this->input->post('txt_message')." ". $sendSMSArray['regards_id']. " ". $sendSMSArray['sender_id'];
			$data['message_content']  = $content_message;
		}
		$data['sender_id'] = 5;
		foreach($this->input->post('sms_student_list')  as $key=>$value)
		{	
			$data['receiver_id'] = $key;			
			$student_id = $key;
			$mobile_no = $this->studentModel->get_mobile_no($student_id);
			if(strlen($mobile_no)==10){	
				$data['mobile_no'] = $mobile_no;
				delevire_meesage($mobile_no,$content_message);
				insert($data , "ems_sent_messages") ;
			}			
		} 
		redirect(base_url().'index.php/sms/sms/general_sms');
	}
	
	
	public function teacher_send_sms(){	
		$data = array();
		$sendSMSArray = array();
		if($this->input->post('regards_id'))
		{
			$sendSMSArray['regards_id']  = $this->input->post('regards_id');
		}
		if($this->input->post('sender_id'))
		{
			$sendSMSArray['sender_id']  = $this->input->post('sender_id');
		}
		$content_message = "";
		if($this->input->post('txt_message'))
		{
			$content_message  = "Dear Staff, ". $this->input->post('txt_message')." ". $sendSMSArray['regards_id']. " ". $sendSMSArray['sender_id'];
			$data['message_content']  = $content_message;
		}
		$data['sender_id'] = 5;
		foreach($this->input->post('sms_teacher_list')  as $key=>$value)
		{	
			$data['receiver_id'] = $key;			
			$staff_id = $key;
			$mobile_no = $this->staffModel->get_mobile_no($staff_id);
			if(strlen($mobile_no)==10){	
				$data['mobile_no'] = $mobile_no;
				delevire_meesage($mobile_no,$content_message);
				insert($data , "ems_sent_messages") ;
			}			
		} 
		redirect(base_url().'index.php/sms/sms/general_sms');
	}
	
	public function retrive_teacher_list()
	{
		$data =  array();
		$data = retrieve_records($filterColumns=NULL, $offset=NULL, $limit=NULL, $sort=NULL, "ems_staff");
		if(isset($data['result']) && $data['result']==0)
		{
			$teacherlist_body = "<div class='alert-box warning'>
									Records Not Found !
									<a href='javascript:void(0)' class='close'>×</a>
								</div>";			
		}
		else
		{
			$teacher_list = array();
			$count = 0;
			foreach($data as $teacherlist)
			{			
				$teacher_data = array();
				$teacher_data['staff_id'] = $teacherlist->staff_id;
				$teacher_data['staff_name'] = ucfirst($teacherlist->first_name).' '.ucfirst($teacherlist->middle_name).' '.ucfirst($teacherlist->last_name);  
				$teacher_data['mobile'] = $teacherlist->mobile;
				$teacher_list[$count] = $teacher_data;
				$count++;
			}

			$teacherlist_body = "<table class='display' id='content_table'>
										<thead>
											<tr>
												<th><input type='checkbox' onclick='checkedAllTeacher()'></th>
												<th>Teacher Name</th>
												<th>Mobile No.</th>
											</tr>
										</thead>
										<tbody>";									
									foreach($teacher_list as $teacherlistData) 
									{
			$teacherlist_body .= "<tr>
										<td class='essential'><input type='checkbox' id='chk_".$teacherlistData['staff_id']."' name='sms_teacher_list[".$teacherlistData['staff_id']."]'></td>
										<td>". $teacherlistData['staff_name']."</td>
										<td>". $teacherlistData['mobile']."</td>
									</tr>";
									}
			$teacherlist_body .="</tbody></table>";

		}
		echo $teacherlist_body;
	}
	
}
?>