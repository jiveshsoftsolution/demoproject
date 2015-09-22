<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
    
    public function __construct()
    {
        parent::__construct();
	$this->load->database();
    }
	
    function user_login($admin_id = NULL) {	
	$userData = array();	
	if ($admin_id != NULL) {
	    $this->db->where('user_id', $admin_id);
	    $query = $this->db->get('ems_user');
	    if ($query->num_rows >= 1) {	  
		foreach($query->result() as $user){
		    $userName = $user->first_name;
		    if($user->middle_name){
		       $userName = $userName." ".$user->middle_name;
		    }
		    if($user->last_name){
		       $userName = $userName." ".$user->last_name;
		    }
		    $userData = array('user_id' => $user->user_id,'userName' => $userName,'photo_url'=>$user->photo_url);	  
		    break;
		}
		return $userData;
	    }else{
		return 0;
	    }
	}
    }
	
    function teacher_login($teacher_id = NULL) {
	$teacherData = array();
	$this->db->where('staff_id', $teacher_id);
	$query = $this->db->get('ems_staff');
	if ($query->num_rows >= 1) {
	    foreach($query->result() as $teacher){
		$teacherName = $teacher->first_name;
		if($teacher->middle_name){
		   $teacherName = $teacherName." ".$teacher->middle_name;
		}
		if($teacher->last_name){
		   $teacherName = $teacherName." ".$teacher->last_name;
		}
		$teacherData = array('staff_id' => $teacher->staff_id,'userName' => $teacherName,'email' => $teacher->email,'photo_url'=>$teacher->photo_url);
		return $teacherData;
	    }
	}else{
	    return 0;
	}
    }
    
    function student_login($student_id = NULL,$session_id = null) 
    {
	$studentData = array();
	if ($student_id != NULL && $session_id != NULL){
	    $this->db->select('emsstudent.photo_url,ems_student_teacher_class.roll_number,emsparent.father_first_name,emsparent.father_middle_name,emsparent.father_last_name,emsstudent.first_name,emsstudent.middle_name,emsstudent.last_name,emsstudent.student_id,emsstudent.email,ems_student_teacher_class.class_section_id,ems_student_teacher_class.student_teacher_class_id');
	    $this->db->from('ems_student_teacher_class');
	    $this->db->join('emsstudent', 'emsstudent.student_id = ems_student_teacher_class.student_id');
	    $this->db->join('emsparent', 'emsparent.student_id = ems_student_teacher_class.student_id');
	    $this->db->where('ems_student_teacher_class.session_id', $session_id);                    
	    $this->db->where('emsstudent.student_id', $student_id);
	    $query = $this->db->get();
	    if ($query->num_rows >= 1){   
		$studentResult = $query->result();
		foreach($studentResult as $studentRow){
		    $fatherName = "";
		    $fatherName = $studentRow->father_first_name;
		    if($studentRow->father_middle_name)
		    {
			$fatherName = $fatherName." ".$studentRow->father_middle_name;
		    }
		    if($studentRow->father_last_name)
		    {
			$fatherName = $fatherName." ".$studentRow->father_last_name;
		    }			
		    $studentName = "";
		    $studentName = $studentRow->first_name;
		    if($studentRow->middle_name)
		    {
			$studentName = $studentName." ".$studentRow->middle_name;
		    }
		    if($studentRow->last_name)
		    {
			$studentName = $studentName." ".$studentRow->last_name;
		    }
			
		    $studentData = array('studentName'=> $studentName,'email'=> $studentRow->email,'fatherName'=> $fatherName,'student_id'=> $studentRow->student_id,'class_section_id'=> $studentRow->class_section_id,'student_teacher_class_id'=>$studentRow->student_teacher_class_id,'photo_url'=>$studentRow->photo_url,'roll_number'=>$studentRow->roll_number);
		}
		return $studentData;
	    }else{
		return 0;
            }
        }
    }
        
    function parent_login($parent_id = NULL) 
    {
	$parentData = array();
	if ($parent_id != NULL) {
	    $this->db->select('p.*,CONCAT(IF (ISNULL(s.first_name), "", s.first_name), " ",  IF (ISNULL(s.middle_name), "", s.middle_name), " ", IF (ISNULL(s.last_name), "", s.last_name), " ") as child_name, stc.student_teacher_class_id,p.parent_mobile,stc.class_section_id,s.photo_url as student_photo_url',FALSE);
	    $this->db->from("emsparent p");
	    $this->db->join("emsstudent s","s.student_id=p.student_id");
	    $this->db->join("ems_student_teacher_class stc ","s.student_id=stc.student_id");
	    $this->db->where('parent_id',$parent_id);
	    $query = $this->db->get();
	    if ($query->num_rows >= 1){
		foreach($query->result() as $user){
		    $father_salutation = "";
		    if($user->father_salutation_id==1){
			$father_salutation = "Mr.";
		    }elseif($user->father_salutation_id==2){
			$father_salutation = "Mr.";
		    }elseif($user->father_salutation_id==3){
			$father_salutation = "Prof.";
		    }elseif($user->father_salutation_id==4){
			$father_salutation = "Dr.";
		    }
		    $userName = $father_salutation." ".$user->father_first_name;
		    if($user->father_middle_name){
			$userName = $userName." ".$user->father_middle_name;
		    }
		    if($user->father_last_name){
			$userName = $userName." ".$user->father_last_name;
		    }
		    $parentData = array('user_id' => $user->parent_id,'userName' => $userName,'email' => $user->mail_to,'photo_url'=>$user->father_photo_url,'student_teacher_class_id'=>$user->student_teacher_class_id,'child_name'=>$user->child_name,'mobile'=>$user->parent_mobile,'student_photo_url'=>$user->student_photo_url,'class_section_id'=>$user->class_section_id);
		    break;
		}
		return $parentData;
	    }else{
		return 0;
	    }
	}
    }

    // To check login details for ems_login table.
    function main_login($login_user = NULL) {
	$userData = array();
	$user_login_data = array();
	if ($login_user != NULL) {
	    $this->db->select("*");
	    $this->db->from("ems_login l ");
	    $this->db->where('l.login_id', $login_user['login_id']);
	    $this->db->where('l.password', $login_user['password']);		
	    $query = $this->db->get();
	    if ($query->num_rows >= 1) {
		foreach($query->result() as $user_login){
		    $user_login_data = array('login_type' => $user_login->user_login_type, 'user_id' => $user_login->user_id);
		    return  $user_login_data;
		}
	    }else{
		$user_login_data = array('login_type' => 0);
		return $user_login_data;
	    }
	}
    }
    
    function forgot_pasword($forgot_input=""){
	$this->db->select("*");
	$this->db->from("emsparent");
	$this->db->where("mail_to",$forgot_input);
	$this->db->or_where("parent_mobile",$forgot_input);
	$this->db->limit(1);
	$res = $this->db->get();
	return $res->result();
    }
    
    function get_username_password($user_id="",$user_type=""){
	$this->db->select("*");
	$this->db->from("ems_login");
	$this->db->where("user_id",$user_id);
	$this->db->or_where("user_login_type",$user_type);
	$this->db->limit(1);
	$res = $this->db->get();
	return $res->result();
    }
}