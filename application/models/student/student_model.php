<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model {
    
    public function __construct()
    {
		parent::__construct();
		$this->load->database();
    }
	
	public function insert_student($student_data)
	{
		$student_id = 0;
                $parents_id =0;
		if ($student_data['student_record'] != null) 
		{
			$this->db->insert('emsstudent', $student_data['student_record']);
			$student_id = $this->db->insert_id();
                      $this->generate_insert_login_id($student_data['student_record']['first_name'],3,$student_id,'S');
		}
		if($student_id > 0)
		{
			
                                           
                        if ($student_data['parents_record'] != null) 
			{
				$student_data['parents_record']['student_id'] = $student_id;
				$this->db->insert('emsparent', $student_data['parents_record']);
                                $parents_id = $this->db->insert_id();
                                 $this->generate_insert_login_id($student_data['parents_record']['father_first_name'],3,$parents_id,'P');
			}
                      
                        
			if ($student_data['address_record'] != null) 
			{
				$student_data['address_record']['student_id'] = $student_id;
				$this->db->insert('ems_student_address', $student_data['address_record']);
			}
			if ($student_data['student_teacher_class'] != null) 
			{
				$student_data['student_teacher_class']['student_id'] = $student_id;
				$this->db->insert('ems_student_teacher_class ', $student_data['student_teacher_class']);
			}
			return  TRUE ;
		}
		else
		{
			return FALSE;
		}
	}
        
        
        public function generate_insert_login_id($user_name,$length,$user_id,$user_login_type){
            $user_name_subStr = substr($user_name, 0, $length);
            $randomNuber = rand(10, 5000);
            $user_data['login_id'] = $user_login_type.$user_name_subStr.$user_id.$randomNuber;
			$user_data['password'] = $this->generate_password(8) ;
                        $user_data['user_id'] = $user_id;
                        $user_data['user_login_type'] = $user_login_type;
                        $data['user'] = $user_data;
                        
                        $this->insert_id_pass($data);
        }
         
          public function generate_update_login_id($user_name,$length,$user_id){
            $user_name_subStr = substr($user_name, 0, $length);
            $randomNuber = rand(10, 5000);
            $user_data['login_id'] = $user_login_type.$user_name_subStr.$user_id.$randomNuber;
			$user_data['password'] = generate_password(8) ;
                        $condition['student_id'] = $student_id;
                        $condition['user_login_type'] = 'S';
                        $data['user'] = $user_data;
                        $data['condition'] = $condition;
                        $this->update_id_pass($data);
        }
        
        function generate_password( $length = 8 ) {
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$";
$password = substr(str_shuffle( $chars ), 0, $length );
return $password;
}




	public function get_class_section_strength($class_id="") 
	{
		$classSectionStrength = array();
		if ($class_id != null) 
		{
			$this->db->select('ems_class_section.section_id,ems_class_section.class_section_id,ems_section.section_name');
			$this->db->from('ems_class_section');
			$this->db->join('ems_section', 'ems_section.section_id = ems_class_section.section_id ');
			$this->db->where('ems_class_section.class_id', $class_id);
			$this->db->order_by('ems_section.section_name');
			$section_query = $this->db->get();

			if ($section_query->num_rows >= 1) 
			{
				$section_result = $section_query->result();
				foreach ($section_result as $sectionRow) 
				{
					$this->db->select('count(ems_student_teacher_class.student_id) as total');
					$this->db->from('ems_student_teacher_class');
					$this->db->join('emsstudent', 'emsstudent.student_id = ems_student_teacher_class.student_id');
					$this->db->where('ems_student_teacher_class.class_section_id', $sectionRow->class_section_id);
					$section_strength_query = $this->db->get();
					if ($section_strength_query->num_rows >= 1) 
					{
						$section_strength_result = $section_strength_query->result();
						foreach ($section_strength_result as $sectionStrengthRow) 
						{
							$classSectionStrength[$sectionRow->section_name] = $sectionStrengthRow->total;
						}
					}
				}
			}
		} 
		return $classSectionStrength;
	}

	public function get_class_strength($session_id="") 
	{
		$classArray = array();
		$strengthArray = array();
		$classStrength = array();
		$this->db->select('ems_class_section.class_id,ems_class.class_name');
		$this->db->from('ems_class_section');
		$this->db->join('ems_class', 'ems_class.class_id = ems_class_section.class_id');
		$this->db->order_by('ems_class.class_name');
		$this->db->group_by("ems_class_section.class_id,ems_class.class_name");
		$class_query = $this->db->get();
		if ($class_query->num_rows >= 1) 
		{
			$classResult = $class_query->result();
			foreach ($classResult as $classRow) 
			{
				$classArray[] = $classRow->class_name;
				$Classstrength = 0;
				$strengthsql = "select count(*) as total from  ems_student_teacher_class stc , emsstudent  st where stc.student_id = st.student_id and stc.class_section_id in (select class_section_id from ems_class_section where class_id = $classRow->class_id) and stc.session_id = $session_id";
				$strength_query = $this->db->query($strengthsql);
				if ($strength_query->num_rows >= 1)
				{
					$strenghResult = $strength_query->result(); 
					foreach ($strenghResult as $strengthRow) 
					{
						$classStrength[$classRow->class_name] = $strengthRow->total;
					}
				}
			}
		}
		
		return $classStrength;
	}

	public function get_student_name($class_section_id)
	{
		$this->db->select("emsstudent.first_name,emsstudent.middle_name,emsstudent.last_name");
		$this->db->from('emsstudent');
		$this->db->join('ems_student_teacher_class', 'ems_student_teacher_class.student_id = emsstudent.student_id');
		$this->db->join('ems_class_section', 'ems_class_section.class_section_id = ems_student_teacher_class.class_section_id');
		$this->db->where('ems_class_section.class_section_id',$class_section_id);
		$fee_query = $this->db->get();
		echo '<pre>';print_r($fee_query->result());
	}

	public function fetch_single_student($student_id) 
	{
		//$sql = "SELECT * FROM `emsstudent` , `emsparent` , `ems_student_address`,`ems_student_teacher_class` WHERE emsstudent.student_id = emsparent.student_id AND emsstudent.student_id = ems_student_address.student_id and emsstudent.student_id =  ems_student_teacher_class .student_id and emsstudent.student_id = $student_id";
		//$query = $this->db->query($sql);
		$this->db->select("*");
		$this->db->from('emsstudent');
		$this->db->join('ems_student_address', 'ems_student_address.student_id = emsstudent.student_id');
		$this->db->join('emsparent', 'emsparent.student_id = emsstudent.student_id');
		$this->db->join('ems_student_teacher_class', 'ems_student_teacher_class.student_id = emsstudent.student_id');
		$this->db->join('ems_class_section', 'ems_class_section.class_section_id = ems_student_teacher_class.class_section_id');
		$this->db->where('emsstudent.student_id',$student_id);
		$query = $this->db->get();
		if ($query->num_rows()) 
		{
			return $query->row();
		}
		return false;
	}
	
	function updat_emsstudent($data = NULL) 
	{
		if ($data != NULL) 
		{
			if ($data['student'] != null) 
			{
				$this->db->where('student_id', $data['student']['student_id']);
				$this->db->update('emsstudent', $data['student']);
			}
			if ($data['parent'] != null) 
			{
				$this->db->where('student_id', $data['student']['student_id']);
				$this->db->update('emsparent', $data['parent']);
			}
			if ($data['address'] != null) 
			{
				$this->db->where('student_id', $data['student']['student_id']);
				$this->db->update('ems_student_address', $data['address']);
			}
			if ($data['student_teacher_class'] != null) 
			{
				$this->db->where('student_id', $data['student']['student_id']);
				$this->db->update('ems_student_teacher_class ', $data['student_teacher_class']);
			}
		}

    }
	
	public function get_mobile_no($student_id="")
	{
		$this->db->select('emsparent.parent_mobile');
		$this->db->from('emsparent');
		$this->db->join('emsstudent','emsstudent.student_id=emsparent.student_id');
		$this->db->where('emsstudent.student_id',$student_id);
		$query = $this->db->get();
		$student_mobile = $query->result(); 
		return $student_mobile[0]->parent_mobile;
	}
	
	public function get_student_id_by_st_id($st_class_id="")
	{
		$this->db->select('ems_student_teacher_class.student_id');
		$this->db->from('ems_student_teacher_class');
		$this->db->where('ems_student_teacher_class.student_teacher_class_id',$st_class_id);
		$query = $this->db->get();
		$student_id = $query->result(); 
		return $student_id[0]->student_id;
	}
        
        function update_id_pass($condition = null,$data = NULL) 
	{
			if ($data['user'] != null && $condition['condition'] != null ) 
			{
				$this->db->where('user_login_id', $condition['condition']['user_login_id']);
                                $this->db->where('user_login_type', $condition['condition']['user_login_type']);
				$this->db->update('ems_login', $data['user']);
			}
		
	
        }           
        function insert_id_pass($data = NULL) 
	{
			if ($data['user'] != null ) 
			{
				$this->db->insert('ems_login', $data['user']);
			}
		
	}
    
    public function get_student_list_by_class_section($class_section_id=""){
	$this->db->select("s.student_id,CONCAT(s.first_name,' ',s.last_name) AS student_name",FALSE);
	$this->db->from("emsstudent s");
	$this->db->join("ems_student_teacher_class stc","stc.student_id=s.student_id");
	$this->db->where("stc.class_section_id",$class_section_id);
	$result_data = $this->db->get();
	return $result_data->result();
    }
    
    public function get_birtday_students(){
		$today = date('m-d');
		$this->db->select("s.*,c.class_name,se.section_name");
		$this->db->from("emsstudent s");
		$this->db->join("ems_student_teacher_class stc","stc.student_id=s.student_id");
		$this->db->join("ems_class_section cs","cs.class_section_id=stc.class_section_id");
		$this->db->join("ems_class c","c.class_id= cs.class_id");
		$this->db->join("ems_section se","se.section_id=cs.section_id");
		$this->db->where("DATE_FORMAT(dob, '%m-%d')='".$today."'");
		$result_data = $this->db->get();
		return $result_data->result();
    }
    
    public function get_student_present_status_by_month($student_teacher_class_id=""){
		$sql = "SELECT COUNT(attendance_id) as present_count
			FROM ems_attendance
			WHERE student_teacher_class_id='".$student_teacher_class_id."' AND attendance_status='P' AND MONTH(attendance_date)= MONTH(CURRENT_DATE())";
		$result_data = $this->db->query($sql);
		return $result_data->result()[0];
    }
    
    public function get_student_absent_status_by_month($student_teacher_class_id=""){
		$sql = "SELECT COUNT(attendance_id) as absent_count
			FROM ems_attendance
			WHERE student_teacher_class_id='".$student_teacher_class_id."' AND attendance_status='A' AND MONTH(attendance_date)= MONTH(CURRENT_DATE())";
		$result_data = $this->db->query($sql);
		return $result_data->result()[0];
    }
    
    public function get_student_leave_status_by_month($student_teacher_class_id=""){
		$sql = "SELECT COUNT(attendance_id) as leave_count
			FROM ems_attendance
			WHERE student_teacher_class_id='".$student_teacher_class_id."' AND attendance_status='L' AND MONTH(attendance_date)= MONTH(CURRENT_DATE())";
		$result_data = $this->db->query($sql);
		return $result_data->result()[0];
    }
	public function get_student_cardno($student_id=""){
		$this->db->select("stc.card_no");
		$this->db->from("emsstudent s");
		$this->db->join("ems_student_teacher_class stc","stc.student_id=s.student_id");
		$this->db->where("s.student_id",$student_id);
		$result_data = $this->db->get();
		return $result_data->result();
	}
}