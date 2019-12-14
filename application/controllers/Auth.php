<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('authmodel');
	}	
	
	public function login()
	{		
		$this->load->view('auth/login');		
	}

	public function verify() 
	{
		if(isset($_POST['submit'])){
			$email=$this->input->post('email');
			$password=$this->input->post('password');
			$type=$this->input->post('type');
			$check=$this->authmodel->verify($email, $type);
			if($check){
				if($check->status==0){
					$this->notification('Your account is not activated!', 'danger');
				}
				$auth=$this->authmodel->login($email, $password);
				//echo"<pre>"; print_r($auth); die;				
				if($auth){
					if($auth->verify){
					$this->authmodel->update('users', $email, array('verify'=>''));
					}
					$session=array(
					'id'=>$auth->id
					);
					$this->session->set_userdata('trade_session', $session);
					$this->session->set_flashdata('message', 'Your are logged in successfully!');
					$this->session->set_flashdata('type', 'info');
					redirect('admin/dashboard');
				}else{	
					$this->notification('Your entered wrong password!', 'danger');				
				}
			} else
			{
				$this->notification('Your entered wrong email!', 'danger');
			}
		}		
	}

	public function logout(){
		$this->session->unset_userdata('trade_session');
		$this->session->set_flashdata('message', 'Your are logged out successfully!');
		$this->session->set_flashdata('type', 'info');
		redirect('login');
	}

	public function forgot(){
		
		if(isset($_POST['submit'])){
			$email=$this->input->post('email');
			$check=$this->authmodel->verifyEmail($email);			
			if($check){
				$rand = $this->rand(20);
				$mail = $this->sendEmail($email, $rand);
				if($mail==1){
					$array = array(
					'verify' => $rand
					);
					$this->authmodel->update('users', $email, $array);
					$this->session->set_flashdata('message', 'Please check your email to Change Password!');
					$this->session->set_flashdata('type', 'success');
					redirect('/');
				} else {
				$this->notification('Email not send. Please try again!', 'danger');
				}
			}
			else {
			$this->notification('Your entered wrong email!', 'danger');
			}
		}
		$this->load->view('auth/forgot');
		
	}

	public function password($email, $code){
		//echo $email;	echo $code;
		//die;
		$checkemail = $this->authmodel->verifyEmail($email);
		$checkcode = $this->authmodel->getWhere('users', array('email'=>$email, 'verify'=>base64_decode($code)));
		if($checkemail && $checkcode){		
			
			if(isset($_POST['submit'])){	
			//print_r($_POST); die;			
				$this->form_validation->set_rules('password', 'New Password', 'trim|required|min_length[6]|max_length[12]|matches[cpassword]');
				$this->form_validation->set_rules('cpassword', 'Confirm New Password', 'trim|required');
			
				if($this->form_validation->run() == TRUE){
					$array = array(
					'password' => md5($this->input->post('password')),
					'verify' => '',
					'updated' => date('Y-m-d H:m:s')
					);
					$this->authmodel->update('users', $email, $array);
					$this->session->set_flashdata('message', 'Password Changed Successfully!');
					$this->session->set_flashdata('type', 'success');
					redirect('login');
				}
			}
			
			$this->load->view('auth/password');
			
		} else {
		$this->session->set_flashdata('message', 'Token has been expired!');
		$this->session->set_flashdata('type', 'danger');
		redirect('login');
		}		
	}

	


}
