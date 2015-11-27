	<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Staff_attendance_model extends CI_Model  {
	    
	    public function __construct()
	    {
		parent::__construct();
			$this->load->database();
	    }
		
		
		public function get_attendanceForAbsentAndLeave($cond = NULL, $offset = 0, $limit = NULL, $sort = NULL){
		    
		     
			    if ($cond != NULL) 
						{
			      foreach ($cond as $param => $item)
			      $this->db->where($param, $item);
			   }
			   $this->db->where("(attendance_status = 'A' OR attendance_status='L')");
					   if ($sort != NULL) 
					   {
			     for ($i = 0; $i < count($sort); $i++)
			     $this->db->order_by($sort['column'], $sort['order']);
			   }
			   if ($limit != NULL)
					   $this->db->limit($limit, $offset);
						
			    $this->db->select('emsstudent.*,emsparent.*,ems_student_teacher_class.roll_number, ems_attendance.attendance_id,ems_attendance.attendance_status');
			    $this->db->from('emsstudent');
			$this->db->join('emsparent', 'emsparent.student_id = emsstudent.student_id');
			    $this->db->join('ems_student_teacher_class', 'ems_student_teacher_class.student_id = emsstudent.student_id');
			    $this->db->join('ems_attendance', 'ems_attendance.student_teacher_class_id = ems_student_teacher_class.student_teacher_class_id');
			    $query = $this->db->get();
				   if ($query->num_rows() > 0) 
				   {
					  return $query->result();
				   }
				      else
				   {
					   $errordata = array('status' => 'No record found', 'result' => $query->num_rows());
				   }
				    $query->free_result();
				    return $errordata ;
			    
		}
		
		public function checkStudentAttendanceStatus($student_teacher_class_id, $attendance_date){	       
		    $this->db->where('ems_attendance.student_teacher_class_id', $student_teacher_class_id);
		    $this->db->where('DATE(ems_attendance.attendance_date)', $attendance_date);
		    $this->db->where('ems_attendance.is_send', "1");
		    $this->db->select('*');
		    $this->db->from('ems_attendance');
		    $totalRecord = $this->db->count_all_results();     
		    return $totalRecord;
		}
		
		
		public function checkStudentAttendance($student_teacher_class_id, $attendance_date){	       
		    $this->db->where('ems_attendance.student_teacher_class_id', $student_teacher_class_id);
		    $this->db->where('DATE(ems_attendance.attendance_date)', $attendance_date);
		    $this->db->select('*');
		    $this->db->from('ems_attendance');
		    $totalRecord = $this->db->count_all_results();     
		    return $totalRecord;
		}
		
		  public function deleteStudentAttendance($student_teacher_class_id, $attendance_date){
		  
		     $attendance_date = $attendance_date." 00:00:00";
		    $this->db->delete('ems_attendance', array('ems_attendance.student_teacher_class_id'=> $student_teacher_class_id,'ems_attendance.attendance_date'=> $attendance_date));
		}
		
		
		public function updateStudentAttendance($student_teacher_class_id, $attendance_date,$data){
		    $this->db->where('ems_attendance.student_teacher_class_id', $student_teacher_class_id);
		    $this->db->where('DATE(ems_attendance.attendance_date)', $attendance_date);
		    $this->db->update('ems_attendance', $data); 
		}
		
		 public function checkStudentAttendanceApprove($student_teacher_class_id, $attendance_date){
		    
		     $this->db->where_in('student_teacher_class_id', $student_teacher_class_id);
		     $this->db->where('DATE(attendance_date)', $attendance_date);
		     $this->db->where('is_send',1);
		       $this->db->select('*');
		     $this->db->from('ems_attendance');
		    $totalRecord = $this->db->count_all_results();     
		   return $totalRecord;
		}
		
		 public function getStudentAttendance($student_teacher_class_id, $attendance_date){
		   $studentAttendance = array();
		     $this->db->where_in('student_teacher_class_id', $student_teacher_class_id);
		     //$this->db->where('ems_attendance.attendance_date>=', $attendance_date." 00:00:00");
		     $this->db->where('attendance_date', $attendance_date." 00:00:00");
		     $this->db->select('student_teacher_class_id,attendance_status,is_send');
		     $this->db->from('ems_attendance');
		       $query = $this->db->get();
				   if ($query->num_rows() > 0) 
				   {
					  $result= $query->result();
				       
					  foreach($result as $row){
					      $studentAttendance[$row->student_teacher_class_id] = $row->attendance_status.'_'.$row->is_send;
					  }
				   }
		   return $studentAttendance;
		}
		
		//Class section wise class
		function get_class_attendance_strength($session_id="") {
		$classArray = array();
		$strengthArray = array();
		$classStrength = array();
		$this->db->select('ems_class_section.class_id,ems_class.class_name');
		$this->db->from('ems_class_section');
		$this->db->join('ems_class', 'ems_class.class_id = ems_class_section.class_id');
		    $this->db->order_by('ems_class.class_name');
		    $this->db->group_by("ems_class_section.class_id,ems_class.class_name");
		
		$class_query = $this->db->get();
		if ($class_query->num_rows >= 1) {
		    $classResult = $class_query->result();
		    $countClass = 0;
		     $className = "";
		      $absentStudent = "";
			$presentStudent = "";
			$leaveStudent = "";
			
		    foreach ($classResult as $classRow) {
			//print_r($classRow);
		       // $classArray[] = $classRow->class_name;
			
			 if($countClass == 0){
			     $className = "'$classRow->class_name'"; 
			    }else{
				 $className = $className . " ,'$classRow->class_name'";
			    }
			    
		    
		       // $strengthsql = "select count(*) as total from  ems_student_teacher_class stc , emsstudent  st where stc.student_id = st.student_id and stc.class_section_id in (select class_section_id from ems_class_section where class_id = $classRow->class_id) and stc.session_id = $session_id";
			$absentSql = "select count(*) as total from  ems_student_teacher_class stc , emsstudent st,ems_attendance atd  where stc.student_Id = st.student_Id and atd.student_teacher_class_id = stc.student_teacher_class_id and stc.class_section_id in (select class_section_id from ems_class_section where class_id = $classRow->class_id) and stc.session_id = $session_id and atd.attendance_status = 'A' and attendance_date ='".date('Y-m-d')."' and is_send ='1'";
			$presentSql = "select count(*) as total from  ems_student_teacher_class stc , emsstudent st,ems_attendance atd  where stc.student_Id = st.student_Id and atd.student_teacher_class_id = stc.student_teacher_class_id and stc.class_section_id in (select class_section_id from ems_class_section where class_id = $classRow->class_id) and stc.session_id = $session_id and atd.attendance_status = 'P' and attendance_date ='".date('Y-m-d')."' and is_send ='1'";
			$leaveSql = "select count(*) as total from  ems_student_teacher_class stc , emsstudent st,ems_attendance atd  where stc.student_Id = st.student_Id and atd.student_teacher_class_id = stc.student_teacher_class_id and stc.class_section_id in (select class_section_id from ems_class_section where class_id = $classRow->class_id) and stc.session_id = $session_id and atd.attendance_status = 'L' and attendance_date ='".date('Y-m-d')."' and is_send ='1'";
			$absent_query = $this->db->query($absentSql);
		       
			//absent code
			$absentResult = $absent_query->result(); 
			foreach ($absentResult as $absentRow) {
			    if($countClass == 0){
			     $absentStudent = $absentRow->total;
			    }else{
				 $absentStudent = $absentStudent . ','.$absentRow->total;
			    }
			}
			 //present code
			$present_query = $this->db->query($presentSql);
			$presentResult = $present_query->result(); 
			foreach ($presentResult as $presentRow) {
			    if($countClass == 0){
			     $presentStudent = $presentRow->total;
			    }else{
				 $presentStudent = $presentStudent . ','.$presentRow->total;
			    }
			}
			
			 //leave code
			$leave_query = $this->db->query($leaveSql);
			$leaveResult = $leave_query->result(); 
			foreach ($leaveResult as $leaveRow) {
			    if($countClass == 0){
			     $leaveStudent = $leaveRow->total;
			    }else{
				 $leaveStudent = $leaveStudent . ','.$leaveRow->total;
			    }
			}
	
			    $countClass ++;
	
		    }
		    
		    $classAttendanceArray[$className]= array(
			'absentStudent'=>$absentStudent,
			'presentStudent'=> $presentStudent,
			'leaveStudent'=> $leaveStudent
		    );
		}
	      
		return $classAttendanceArray;
	    }
	    
	    /// code for pie chart
	      function get_class_total_attendance_strength($session_id="") {
	       
		$classAttendanceArray = array();
		$this->db->select('ems_class_section.class_id,ems_class.class_name');
		$this->db->from('ems_class_section');
		$this->db->join('ems_class', 'ems_class.class_id = ems_class_section.class_id');
		$this->db->order_by('ems_class.class_name');
		$this->db->group_by("ems_class_section.class_id");
		$class_query = $this->db->get();
		if ($class_query->num_rows >= 1) {
		    $classResult = $class_query->result();
				
		    foreach ($classResult as $classRow) {
		       $studentStrength = array();
								
		       // $strengthsql = "select count(*) as total from  ems_student_teacher_class stc , emsstudent  st where stc.student_id = st.student_id and stc.class_section_id in (select class_section_id from ems_class_section where class_id = $classRow->class_id) and stc.session_id = $session_id";
		       $absentSql = "select count(*) as total from  ems_student_teacher_class stc , emsstudent st,ems_attendance atd  where stc.student_id = st.student_id and atd.student_teacher_class_id = stc.student_teacher_class_id and stc.class_section_id in (select class_section_id from ems_class_section where class_id = $classRow->class_id) and stc.session_id = $session_id and atd.attendance_status = 'A' and attendance_date ='".date('Y-m-d')."'";
		       $presentSql = "select count(*) as total from  ems_student_teacher_class stc , emsstudent st,ems_attendance atd  where stc.student_id = st.student_id and atd.student_teacher_class_id = stc.student_teacher_class_id and stc.class_section_id in (select class_section_id from ems_class_section where class_id = $classRow->class_id) and stc.session_id = $session_id and atd.attendance_status = 'P' and attendance_date ='".date('Y-m-d')."'";
		       $leaveSql = "select count(*) as total from  ems_student_teacher_class stc , emsstudent st,ems_attendance atd  where stc.student_id = st.student_id and atd.student_teacher_class_id = stc.student_teacher_class_id and stc.class_section_id in (select class_section_id from ems_class_section where class_id = $classRow->class_id) and stc.session_id = $session_id and atd.attendance_status = 'L' and attendance_date ='".date('Y-m-d')."'";
			$absent_query = $this->db->query($absentSql);
		       
			//absent code
			$absentResult = $absent_query->result(); 
			foreach ($absentResult as $absentRow) {
			    $studentStrength['absent'] = $absentRow->total;
			  
			}
			 //present code
			$present_query = $this->db->query($presentSql);
			$presentResult = $present_query->result(); 
			foreach ($presentResult as $presentRow) {
			     $studentStrength['present'] = $presentRow->total;
			      }
			
			 //leave code
			$leave_query = $this->db->query($leaveSql);
			$leaveResult = $leave_query->result(); 
			foreach ($leaveResult as $leaveRow) {
			       $studentStrength['leave'] = $leaveRow->total;
			   
			}
	$classAttendanceArray[$classRow->class_id] = $studentStrength;
				    }
		    
		       }
	      
		return $classAttendanceArray;
	    }
	    //end of pie chart
		
	    //attendance for selected class
	     function get_classSection_attendance_strength($class_id = "" , $session_id="") {
		$classArray = array();
		$strengthArray = array();
		$classStrength = array();
		$this->db->select('ems_class_section.section_id,ems_section.section_name,ems_class_section.class_id');
		$this->db->from('ems_class_section');
		$this->db->join('ems_section', 'ems_section.section_id = ems_class_section.section_id');
		$this->db->order_by('ems_section.section_name');
		$this->db->where("ems_class_section.class_id",$class_id);
		$class_query = $this->db->get();
		if ($class_query->num_rows >= 1) {
		    $classResult = $class_query->result();
		    $countClass = 0;
		     $className = "";
		      $absentStudent = "";
			$presentStudent = "";
			$leaveStudent = "";
			
		    foreach ($classResult as $classRow) {
			//print_r($classRow);
		       // $classArray[] = $classRow->class_name;
			
			 if($countClass == 0){
			     $className = "'$classRow->section_name'";
			    }else{
				 $className = $className . ','."'$classRow->section_name'";
			    }
			    
		    
		       // $strengthsql = "select count(*) as total from  ems_student_teacher_class stc , emsstudent  st where stc.student_id = st.student_id and stc.class_section_id in (select class_section_id from ems_class_section where class_id = $classRow->class_id) and stc.session_id = $session_id";
		       $absentSql = "select count(*) as total from  ems_student_teacher_class stc , emsstudent st,ems_attendance atd  where stc.student_id = st.student_id and atd.student_teacher_class_id = stc.student_teacher_class_id and stc.class_section_id in (select class_section_id from ems_class_section where section_id = $classRow->section_id and class_id = $classRow->class_id) and stc.session_id = $session_id and atd.attendance_status = 'A' and attendance_date ='".date('Y-m-d')."'";
		       $presentSql = "select count(*) as total from  ems_student_teacher_class stc , emsstudent st,ems_attendance atd  where stc.student_id = st.student_id and atd.student_teacher_class_id = stc.student_teacher_class_id and stc.class_section_id in (select class_section_id from ems_class_section where section_id = $classRow->section_id and class_id = $classRow->class_id) and stc.session_id = $session_id and atd.attendance_status = 'P' and attendance_date ='".date('Y-m-d')."'";
		       $leaveSql = "select count(*) as total from  ems_student_teacher_class stc , emsstudent st,ems_attendance atd  where stc.student_id = st.student_id and atd.student_teacher_class_id = stc.student_teacher_class_id and stc.class_section_id in (select class_section_id from ems_class_section where section_id = $classRow->section_id and class_id = $classRow->class_id) and stc.session_id = $session_id and atd.attendance_status = 'L' and attendance_date ='".date('Y-m-d')."'";
			$absent_query = $this->db->query($absentSql);
		       
			//absent code
			$absentResult = $absent_query->result(); 
			foreach ($absentResult as $absentRow) {
			    if($countClass == 0){
			     $absentStudent = $absentRow->total;
			    }else{
				 $absentStudent = $absentStudent . ','.$absentRow->total;
			    }
			}
			 //present code
			$present_query = $this->db->query($presentSql);
			$presentResult = $present_query->result(); 
			foreach ($presentResult as $presentRow) {
			    if($countClass == 0){
			     $presentStudent = $presentRow->total;
			    }else{
				 $presentStudent = $presentStudent . ','.$presentRow->total;
			    }
			}
					 //leave code
			$leave_query = $this->db->query($leaveSql);
			$leaveResult = $leave_query->result(); 
			foreach ($leaveResult as $leaveRow) {
			    if($countClass == 0){
			     $leaveStudent = $leaveRow->total;
			    }else{
				 $leaveStudent = $leaveStudent . ','.$leaveRow->total;
			    }
			}
	
			    $countClass ++;
	
		    }
		    
		    $classAttendanceArray[$className]= array(
			'absentStudent'=>$absentStudent,
			'presentStudent'=> $presentStudent,
			'leaveStudent'=> $leaveStudent
		    );
		}
	      
		
		
		return $classAttendanceArray;
	    }
		
		
	//select student_teacher_class_id from ems_student_teacher_class where session_id =1 and class_section_id=
	
	public function get_today_staff_attendance(){
		$data =  array();
		$today = date("Y-m-d");
		
		// Get Total Student
		$this->db->select("count(attendance_id) as total_staff_attendance");
		$this->db->from("ems_staff_attendance");
		$this->db->where("date(approve_date)",$today);
		$total_staff = $this->db->get();
		$total_staff_attendance = $total_staff->result()[0]->total_staff_attendance; 
		
		//Get Total Absent Student	    
		$this->db->select("count(attendance_id) as total_absent_staff");
		$this->db->from("ems_staff_attendance");
		$this->db->where("date(approve_date)",$today);
		$this->db->where("attendance_status","A");
		$absent_staff = $this->db->get();
		$total_absent_staff = $absent_staff->result()[0]->total_absent_staff;
		
		//Get Total Present Student	    
		$this->db->select("count(attendance_id) as total_present_staff");
		$this->db->from("ems_staff_attendance");
		$this->db->where("date(approve_date)",$today);
		$this->db->where("attendance_status","P");
		$present_staff = $this->db->get();
		$total_present_staff = $present_staff->result()[0]->total_present_staff;
		
		//Get Total Leave Student	    
		$this->db->select("count(attendance_id) as total_leave_staff");
		$this->db->from("ems_staff_attendance");
		$this->db->where("date(approve_date)",$today);
		$this->db->where("attendance_status","L");
		$leave_staff = $this->db->get();
		$total_leave_staff = $leave_staff->result()[0]->total_leave_staff;
		
		// Make percentange for present, absent, leave
		
		$leave_percentage = $total_leave_staff * @(100/$total_staff_attendance);
		$present_percentage = $total_present_staff * @(100/$total_staff_attendance);
		$absent_percentage = $total_absent_staff * @(100/$total_staff_attendance);
		
		$data['leave_percentage'] 		= number_format($leave_percentage,2);
		$data['present_percentage'] 	= number_format($present_percentage,2);
		$data['absent_percentage'] 		= number_format($absent_percentage,2);
		
		$data['total_leave_staff'] 		= $total_leave_staff;
		$data['total_present_staff'] 	= $total_present_staff;
		$data['total_absent_staff'] 	= $total_absent_staff;
		return $data;
	}

	public function staff_attendance($search_date){
		$data =  array();
		
		// Get Total Staff Attendance  for given date 
		$this->db->select("s.staff_id,s.first_name,s.middle_name,s.last_name,st.attendance_status,s.card_no");
		$this->db->from("ems_staff s");
		$this->db->join("ems_staff_attendance st","s.staff_id=st.staff_id");
		$this->db->where("date(approve_date)=",$search_date);
		$total_staff = $this->db->get();
		return $total_staff->result();
	}
}	   