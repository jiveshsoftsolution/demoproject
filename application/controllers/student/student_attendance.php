<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Student_attendance extends CI_Controller 
{
    public function __construct() {
        parent::__construct();
		$this->load->model('attendance/attendance_model', 'attendanceModel');
		$this->load->model('attendance/staff_attendance_model', 'staffAttendanceModel');
		$this->load->model('student/student_model','studentModel');
        $this->load->helper('crud_model');
        $this->load->helper('student_model');
		require_once APPPATH.'third_party/sms/sms.php';
		$this->load->helper('student_model');
    }

    public function index() {}
    
    public function get_attendance($class_section_id = "" ,$session_id = "") {
        $data = array();
        $filterColumns = array();
        $offset = NULL;
        $limit = NULL;
        $sort = array();
        $session_Id = NULL;
        $class_section_Id = NULL;
        $this->template->getScript(); 
	
		$this->template->getAdminHeader(); 
		
		$birthday_teacher_data = get_birtday_teachers();
		$data['birthday_teacher_data']	= $birthday_teacher_data;			
		$data['today_student_attendance'] 	= $this->attendanceModel->get_today_student_attendance();		
		$data['today_staff_attendance'] 	= $this->staffAttendanceModel->get_today_staff_attendance();		
		$this->load->view('admin_include/left_sidebar',$data);
		
        $data['session'] = retrieve_records($filterColumns = NULL, $offset = NULL, $limit = NULL, $sort = NULL, "ems_session");
        $data['classSecton'] = getClass_section();

        $data['session_id'] = 0;
        $data['class_section_id'] = 0;
        $data['approvemsg'] = "";
        $data['apprrove'] = 0;
        $data['StudentAttendance'] = array();
        $data['studentListForSendSms'] = array();
        if ($this->input->post('session_id') > 0) 
		{
            $session_Id = (int) $this->input->post('session_id');
            $filterColumns['session_id'] = $session_Id;
            $data['session_id'] = $session_Id;
        }
        if ($this->input->post('class_section_id') > 0) 
		{
            $class_section_id = (int) $this->input->post('class_section_id');
            $filterColumns['class_section_id'] = $class_section_id;
            $data['class_section_id'] = $class_section_id;
        }
        if ($session_Id > 0 and $class_section_id > 0) 
        {
            $recordsFound = getStudentBySessionId_ClassSectionId($filterColumns, $offset, $limit, $sort);
            $data['studentListForSendSms'] = $recordsFound;
            if (isset($recordsFound['result']))
            {
            }
			else
			{
				$studentListForSendSms = $data['studentListForSendSms'];
				$student_teacher_class_id = array();
				for ($i = 0; $i < count($studentListForSendSms); $i++) 
				{
					$student_teacher_class_id[] = $studentListForSendSms[$i]->student_teacher_class_id;
				}
				$totalApprove = $this->attendanceModel->checkStudentAttendanceApprove($student_teacher_class_id, date('Y-m-d'));
				if ($totalApprove > 0) 
				{
					$data['approvemsg'] = "Attendance already taken";
					$data['apprrove'] = 1;
				}
				$data['StudentAttendance'] = $this->attendanceModel->getStudentAttendance($student_teacher_class_id, date('Y-m-d'));
            }
        }
        

        $this->load->view('attendance/student_attendance', $data);
        $this->template->getFooter();
    }

    public function add_attendance_information() 
    {
	$logInUser = loggedUser();
        $userDetail = $this->session->userdata('user');
       
        $attendance_data = array();

        if ($this->input->post('attendance')) 
		{
            $temp_data = $this->input->post('attendance');
            $count = 0;
            $student_teacher_class_id = array();

            foreach ($temp_data as $key => $value) 
			{
				$aproveStatus = $this->attendanceModel->checkStudentAttendanceStatus($key, date('Y-m-d'));
                if ($aproveStatus > 0) 
				{
                   
                    continue;
                }
				$studentFound = $this->attendanceModel->checkStudentAttendance($key, date('Y-m-d'));
				

				if ($studentFound > 0) 
				{
					$attendance_data['student_teacher_class_id'] = $key;
					$attendance_data['attendance_status'] = $value;
					$attendance_data['type'] = "morning";
					$attendance_data['attendance_updated_by'] = $logInUser['user_id'];
					$attendance_data['attendance_updated_by_type'] = $logInUser['user_type'];
					$attendance_data['attendance_update_date'] = date('Y-m-d');
					$attendance_data['attendance_update_time'] = date('H:i:s');
					$this->attendanceModel->updateStudentAttendance($key, date('Y-m-d'), $attendance_data);
				} 
				else 
				{
					$attendance_data['student_teacher_class_id'] = $key;
					$attendance_data['attendance_status'] = $value;
					$attendance_data['type'] = "morning";					
					$attendance_data['attendance_taken_by'] = $logInUser['user_id'];
					$attendance_data['attendance_taken_by_type'] = $logInUser['user_type'];
					$attendance_data['attendance_date'] = date('Y-m-d');
					$attendance_data['attendance_time'] = date('H:i:s');
					insert($attendance_data, "ems_attendance");
				}
            }
        redirect('student/student_attendance/get_attendance');                     
        }
    }

    public function approve_attendance() 
	{
        $data = array();
        $filterColumns = array();
        $offset = NULL;
        $limit = NULL;
        $sort = array();
        $session_Id = NULL;
        $class_section_Id = NULL;
        $this->template->getScript(); 
		$this->template->getAdminHeader(); 
		
		
		$birthday_teacher_data = get_birtday_teachers();
		$data['birthday_teacher_data']	= $birthday_teacher_data;			
		$data['today_student_attendance'] 	= $this->attendanceModel->get_today_student_attendance();		
		$data['today_staff_attendance'] 	= $this->staffAttendanceModel->get_today_staff_attendance();		
		$this->load->view('admin_include/left_sidebar',$data);
	
        $data['session'] = retrieve_records($filterColumns = NULL, $offset = NULL, $limit = NULL, $sort = NULL, "ems_session");
        $data['classSecton'] = getClass_section();

        $data['session_id'] = 0;
        $data['class_section_id'] = 0;
        $data['approvemsg'] = "";
        $data['apprrove'] = 0;
        $data['StudentAttendance'] = array();
        $data['studentListForSendSms'] = array();
        if ($this->input->post('session_id')) 
		{
            $session_Id = (int) $this->input->post('session_id');
            $filterColumns['session_id'] = $session_Id;
            $data['session_id'] = $session_Id;
        }
        if ($this->input->post('class_section_id')) 
		{
            $class_section_Id = (int) $this->input->post('class_section_id');
            $filterColumns['class_section_id'] = $class_section_Id;
            $data['class_section_id'] = $class_section_Id;
        }

        if ($this->input->post('session_id') > 0 and $this->input->post('class_section_id') > 0) 
        {
            $recordsFound = getStudentBySessionId_ClassSectionId($filterColumns, $offset, $limit, $sort);
            $data['studentListForSendSms'] = $recordsFound;
            if (isset($recordsFound['result'])) {
            } else {             
		$studentListForSendSms = $data['studentListForSendSms'];
		$student_teacher_class_id = array();
		for ($i = 0; $i < count($studentListForSendSms); $i++) 
		{
		    $student_teacher_class_id[] = $studentListForSendSms[$i]->student_teacher_class_id;
		}
		$totalApprove = $this->attendanceModel->checkStudentAttendanceApprove($student_teacher_class_id, date('Y-m-d'));
		if ($totalApprove > 0) {
		    $data['approvemsg'] = "Attendance already approved";
		    $data['apprrove'] = 1;
		}
		$data['StudentAttendance'] = $this->attendanceModel->getStudentAttendance($student_teacher_class_id, date('Y-m-d'));
            }
        }
      
        $this->load->view('attendance/student_attendance_approve', $data);
        $this->template->getFooter();
    }

    public function add_attendance_approve_information() {
	$logInUser = loggedUser();
        $attendance_data = array();
	$sendSMSArray = array();
	$student_record = array();
        $userDetail = $this->session->userdata('user');
        if ($this->input->post('attendance')) {
            $temp_data = $this->input->post('attendance');
            $count = 0;
            $student_teacher_class_id = array();
            foreach ($temp_data as $key => $value) 
	    {
                if ($value == "A" || $value == "L" || $value == "P") 
		{                    
                    $aproveStatus = $this->attendanceModel->checkStudentAttendanceStatus($key, date('Y-m-d'));
                    if ($aproveStatus > 0) 
		    {                      
                        continue;
                    }
                    $attendance_data['is_send'] = 1;
                    $attendance_data['attendance_approve_by'] = $logInUser['user_id'];
		    $attendance_data['attendance_approve_by_type'] = $logInUser['user_type'];
                    $attendance_data['approve_date'] = date('Y-m-d');
                    $attendance_data['approve_time'] = date('H:i:s');
                    $this->attendanceModel->updateStudentAttendance($key, date('Y-m-d'), $attendance_data);
		    
		    $student_id = $this->studentModel->get_student_id_by_st_id($key);
		    $filterColumns =  array();
		    $filterColumns['student_id'] = $student_id;
		    $student_record = retrieve_records($filterColumns, $offset = NULL, $limit = NULL, $sort = NULL, "emsstudent");
		    
		    $data['sender_id'] = $logInUser['user_id'];
		    $data['receiver_id'] = $student_record[0]->student_id;
		    $msg_student_id = $key;
		    if($value == "P"){
			$content_message = "Dear Parent, Your child ".$student_record[0]->first_name." is present today. Regards eSchool";
		    }else if($value == "A"){
			$content_message = "Dear Parent, Your child ".$student_record[0]->first_name." is absent today. Regards eSchool";
		    }else if($value == "L"){
			$content_message = "Dear Parent, Your child ".$student_record[0]->first_name." is leave today. Regards eSchool";
		    }
		    
		    $data['message_content']  = $content_message;
		    $mobile_no = $this->studentModel->get_mobile_no($student_id);
		    if(strlen($mobile_no)==10){	
			$data['mobile_no'] = $mobile_no;
			delevire_meesage($mobile_no,$content_message);
			insert($data , "ems_sent_messages") ;
		    }					
                }
            }
        }		
        redirect('student/student_attendance/approve_attendance'); 
    }

    public function get_absentLeave_student() 
	{
        $leave_absent_data = array();
        $filterColumns = array();
        $offset = NULL;
        $limit = NULL;
        $sort = array();
        $filterColumns['is_send'] = 0;
        $leave_absent_data['studentListForSendSms'] = $this->attendanceModel->get_attendanceForAbsentAndLeave($filterColumns, $offset, $limit, $sort);
        $this->template->getHeader();
        $this->template->getLeftbar();
        $this->load->view('student/attendance/absent_leave_student', $leave_absent_data);
        $this->template->getFooter();
    }

    public function send_attendancemessage() 
	{
        $send_attendance = array();
        $conditions = array();
        if ($this->input->post('attendance_id')) 
		{
            $temp_data = $this->input->post('attendance_id');
            foreach ($temp_data as $key => $value) 
			{
                $send_attendance['is_send'] = 1;
                $conditions['attendance_id'] = $value;
                update($send_attendance, $conditions, $tablename = "ems_attendance");
            }
        }
    }

	public function send_sms_old($mobile_no,$message_body)
	{
		//http://practicsoft.com/sms/SendSMSAPI.aspx?mo=8750953636&ms=Jivesh%20tiwari&r=2&s=RECHRG&u=10019&p=mani332211
		//$url = "http://practicsoft.com/sms/SendSMSAPI.aspx?mo=\"$mobile_no\"&ms=\"$message_body\"&r=2&s=RECHRG&u=10019&p=mani332211";
		
		/* Script URL */
		$url = 'http://practicsoft.com/sms/SendSMSAPI.aspx';

		/* $_GET Parameters to Send */
		$params = array('mo' => $mobile_no, 'ms' => $message_body,'r' => '2','s' => 'RECHRG','u' => '10019','p' => 'mani332211');

		/* Update URL to container Query String of Paramaters */
		$url .= '?' . http_build_query($params);

		/* cURL Resource */
		$ch = curl_init();

		/* Set URL */
		curl_setopt($ch, CURLOPT_URL, $url);

		/* Tell cURL to return the output */
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		/* Tell cURL NOT to return the headers */
		curl_setopt($ch, CURLOPT_HEADER, false);

		/* Execute cURL, Return Data */
		$data = curl_exec($ch) or die(curl_error($ch));

		/* Check HTTP Code */
		$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		/* Close cURL Resource */
		curl_close($ch);
	}
	
	public function send_sms($mobile_no,$message_body)
	{
		//http://173.45.76.226:81/send.aspx?username=&pass=&route=&senderid=&numbers=&message=
		
		/* Script URL */
		//$url = 'https://173.45.76.226:81/send.aspx?username=transdemo&pass=transdemoishu&route=trans1&senderid=INVITE&numbers=8750953636&message=Hijiveshhowru';
		$url = 'http://api.chandnas.com/SendSMS.aspx';

		/* $_GET Parameters to Send */
		$params = array('UserName' => 'cicapi','password' => 'Try2Pass','MobileNo' => $mobile_no,'SenderID' => 'DMOAPI','CDMAHeader' => '911234000000', 'Message' => "This is Attendance Test SMS");

		/* Update URL to container Query String of Paramaters */
		$url .= '?' . http_build_query($params);

		/* cURL Resource */
		$ch = curl_init();

		/* Set URL */
		curl_setopt($ch, CURLOPT_URL, $url);

		/* Tell cURL to return the output */
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		/* Tell cURL NOT to return the headers */
		curl_setopt($ch, CURLOPT_HEADER, false);

		/* Execute cURL, Return Data */
		$data = curl_exec($ch) or die(curl_error($ch));

		/* Check HTTP Code */
		$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		/* Close cURL Resource */
		curl_close($ch);
	}
	
	public function attendance_history() 
	{
        $data = array();
        $filterColumns = array();
        $offset = NULL;
        $limit = NULL;
        $sort = array();
        $session_id = NULL;
        $class_section_id = NULL;
        $this->template->getScript(); 
		$this->template->getAdminHeader(); 
		
		
		$birthday_teacher_data = get_birtday_teachers();
		$data['birthday_teacher_data']	= $birthday_teacher_data;
		$data['today_student_attendance'] 	= $this->attendanceModel->get_today_student_attendance();		
		$data['today_staff_attendance'] 	= $this->staffAttendanceModel->get_today_staff_attendance();		
		$this->load->view('admin_include/left_sidebar',$data);
	
        $data['session'] = retrieve_records($filterColumns = NULL, $offset = NULL, $limit = NULL, $sort = NULL, "ems_session");
        $data['classSecton'] = getClass_section();

        $data['session_id'] = 0;
        $data['class_section_id'] = 0;
        $data['StudentAttendance'] = array();
        $data['studentListForSendSms'] = array();
        if ($this->input->post()) 
		{
            $session_id = (int) $this->input->post('session_id');
            $filterColumns['session_id'] = $session_id;
            $data['session_id'] = $session_id;

			$class_section_id = (int) $this->input->post('class_section_id');
			$filterColumns['class_section_id'] = $class_section_id;
			$data['class_section_id'] = $class_section_id;
			$data['attendance_date'] = $this->input->post('attendance_date');
			
			if($this->input->post('attendance_for')=='Student'){
				$data['attendance_date'] = $this->input->post('attendance_date');
				$student_data = getStudentBySessionId_ClassSectionId($filterColumns, $offset, $limit, $sort);
				$student_attendance_data = array();
				if (count($student_data)>0) {
					$i=0;				
					foreach($student_data as $student){
						$attendance_date = $this->input->post('attendance_date'); 
						$attendance_data = $this->attendanceModel->getStudentAttendance($student->student_teacher_class_id, $attendance_date);
						if(count($attendance_data)>0){
							$attendance_status = explode("_",$attendance_data[$student->student_teacher_class_id]);
							$student_data[$i]->attendance_status = $attendance_status[0];
							$student_attendance_data[$i] = $student_data[$i];
						}							
						$i++;
					}				
					$data['StudentAttendance'] = $student_attendance_data;
				}
			}else{				
				$attendance_date = $this->input->post('attendance_date'); 
				$attendance_data = $this->staffAttendanceModel->staff_attendance($attendance_date);	
				$data['StaffAttendance'] = $attendance_data;
			}			
		}      
		$this->load->view('attendance/attendance_history', $data);
		$this->template->getFooter();
    }
}
?>