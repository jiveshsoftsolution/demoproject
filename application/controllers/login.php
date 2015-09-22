<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		require_once APPPATH.'third_party/sms/sms.php';
		$this->load->model('login/login_model','loginModel');
		$this->load->model('student/student_model','studentModel');
		$this->load->library('email');
	}
	public function index()
	{
		$this->load->view('login');
	}

	public function validatelogin()	
	{
		redirect(base_url().'index.php/admin/admin');	
	}
	
	public function forgot_password(){
		$data = array();
		if($this->input->post()){
			$forgot_input = $this->input->post("email");
			$res = $this->loginModel->forgot_pasword($forgot_input);
			if(is_array($res)){
				$student_data = $this->loginModel->get_username_password($res[0]->student_id,"S");
				$parent_data = $this->loginModel->get_username_password($res[0]->parent_id,"P");
				$content_message = "Dear Parent,  Child Username: ".$student_data[0]->login_id.", Child Password: ".$student_data[0]->password ." Parent Username: ".$parent_data[0]->login_id.", Child Password:". $parent_data[0]->password." Thanks";
				if(strlen($res[0]->parent_mobile)==10){	
					delevire_meesage($res[0]->parent_mobile,$content_message);
				}
				$email_content_message = "Dear Parent,<br> Your login credentials mentioned below.<br> Child Username: ".$student_data[0]->login_id."<br> Child Password: ".$student_data[0]->password."<br><br> Parent Username:". $parent_data[0]->login_id."<br> Child Password: ".$parent_data[0]->password." <br> <br>Thanks UDT-eSchool HelpDesk ";
				if(!empty($res[0]->mail_to)){
					$this->email->from('jiveshp12@gmail.com', 'UDT-eSchool');
					$this->email->to($res[0]->mail_to); 					
					$this->email->subject('UDT Forgot Password');
					$this->email->message($email_content_message);						
					$this->email->send();
					redirect(base_url());
				}
			}else{
				$data['errorInfo'] = "Invalid Email / Mobile No";
				$this->load->view('forgot_password',$data);
			}
		}else{
			$this->load->view("forgot_password");	
		}		
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
/* End of file welcome.php */
/* Location: ./application/controllers/login.php */