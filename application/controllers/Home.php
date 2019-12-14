<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
		//$this->redirect();
		
		require_once('vendor/stripe/stripe-php/init.php');
		$this->load->model('homemodel');
		$this->load->model('authmodel');
		$this->load->model('usersmodel');
	}
	public function index()
	{
		$data['rowData'] = $this->homemodel->getWhere('plans', array('status' => 1));
		$this->load->view('common/front/header');
		$this->load->view('front/index', $data);
		$this->load->view('common/front/footer');
	}
	public function userlogin()
	{
		//$this->load->view('front/auth/userlogin');
		$this->load->view('front/index');
	}
	public function userVerify()
	{
		if (isset($_POST['submit'])) {
			//print_r($_POST); die;
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$type = $this->input->post('type');
			$check = $this->homemodel->verify($email, $type);
			if ($check) {
				if ($check->status == 0) {
					$this->notification('Your account is not activated!', 'danger');
				}
				$auth = $this->homemodel->login($email, $password);
				// print_r($auth);
				// die('call');
				if ($auth) {
					if ($auth->verify) {
						$this->homemodel->update('users', $email);
					}
					$session = array(
						'id' => $auth->id
					);
					$this->session->set_userdata('trade_session', $session);
					$this->session->set_flashdata('message', 'Your are logged in successfully!');
					$this->session->set_flashdata('type', 'info');
					redirect('userdashboard');
				} else {
					$this->notification('Your entered wrong password!', 'danger');
				}
			} else {
				$this->notification('Your entered wrong email!', 'danger');
			}
		}
	}
	public function logout(){
		$this->session->unset_userdata('trade_session');
		$this->session->set_flashdata('message', 'Your are logged out successfully!');
		$this->session->set_flashdata('type', 'info');
		redirect('/');
	}
	public function register()
	{
		$subs_id = $this->input->post('subs_id');
		$data['subsdata'] = $this->homemodel->get('plans', array('id' => $subs_id));
		//echo"<pre>"; print_r($data); echo"</pre>";
		$this->load->view('common/front/header');
		$this->load->view('front/auth/register', $data);
		$this->load->view('common/front/footer');
	}
	public function buySubscription()
	{
		//echo"<pre>"; print_r($_POST);
		$token = $this->input->post('stripeToken');
		$email = $this->input->post('email');
		$planid = $this->input->post('planid');
		$subs_id = $this->input->post('subs_id');
		$name = $this->input->post('fname');
		$password = $this->input->post('password');

		require_once('vendor/stripe/stripe-php/init.php');
		try {
			\Stripe\Stripe::setApiKey('sk_test_c233P4xwyhM9M5zE7WIBHcAa001dmUaRqX');
			$customer = \Stripe\Customer::create([
				'email' => $email,
				'source' => $token,
			]);
			$subscription = \Stripe\Subscription::create([
				"customer" => $customer->id,
				"items" => [
					[
						"plan" => $subs_id,
					],
				]
			]);
			//echo"<pre>"; print_r($subscription); 
			$subs_id = $subscription['id'];
			// $created = $subscription['created'];				
			// $start_date = $subscription['current_period_start'];				
			// $end_date = $subscription['current_period_end'];
		} catch (\Stripe\Error\ApiConnection $e) {
			echo $erro = $e->getMessage();
		} catch (\Stripe\Error\InvalidRequest $e) {
			echo $erro = $e->getMessage();
		} catch (\Stripe\Error\Api $e) {
			echo $erro = $e->getMessage();
		} catch (\Stripe\Error\Card $e) {
			echo $erro = $e->getMessage();
		}
		if (!empty($erro)) {
			$this->notification('Server Error!', 'danger');
		} else {
			$formData = array(
				'type' => $this->input->post('type'),
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'email' => $email,
				'dob' => date('Y-m-d h:i:s', strtotime(str_replace('/', '-', $this->input->post('dob')))),
				'password' => md5($this->input->post('password')),
				'status' => 1,
				'created' => date('Y-m-d h:i:s'),
			);
			$result = $this->homemodel->insert('users', $formData);
			$last_userid = $this->db->insert_id();
			if ($this->db->affected_rows() > 0) {
				$subsData = array(
					'user_id' => $last_userid,
					'plan_id' => $planid,
					'subscription_id' => $subs_id,
					'subs_start_date' => date('Y-m-d h:i:s'),
					'subs_end_date' => date('Y-m-d h:i:s', strtotime("+30 days")),
					'created' => date('Y-m-d h:i:s'),
				);
				$subscriptionData = $this->homemodel->insert('subscription', $subsData);
				if ($this->db->affected_rows() > 0) {

					$config = array(
						'protocol' => 'smtp',
						'smtp_host' => 'ssl://smtp.example.com',
						'smtp_port' => 465,
						'smtp_user' => 'danish60degree@gmail.com',
						'smtp_pass' => '60degree@123',
						'charset'=>'iso-8859-1',
						'wordwrap'=> TRUE,
						'mailtype' => 'html'
					);					
					$this->load->library('email', $config);
					$this->email->from('no-reply@trading.com', 'Trading');
					$this->email->to($email);
					$this->email->subject('Aegis Subscription Confirmation');
					$data=array('email'=>$email, 'name'=>$name ,'password'=>$password);
					$msg = $this->load->view('front/email-templates/subscriptionMail',$data,true);
					$this->email->message($msg);
					$this->email->set_mailtype("html");					

					if($this->email->send() == true) {					
						$this->session->set_flashdata('message', 'Mail Sent! Subscription Created Successfully...');
						$this->session->set_flashdata('type', 'success');
						redirect('thankyou');						
					}else{
						$this->session->set_flashdata("message","Error in sending Email."); 
					}

				} else {
					$this->notification('Error while creating subscription', 'danger');
				}
			}
		}
		// $this->load->view('common/front/header');
		//$this->load->view('front/auth/register');
		// $this->load->view('userdashboard');
		// $this->load->view('common/front/footer');
		//echo"<pre>"; print_r($_POST); echo"</pre>"; die('called');
	}

	public function thankyou()
	{
		$this->load->view('common/front/header');
		$this->load->view('front/auth/thankyou');
		$this->load->view('common/front/footer');
	}

	public function userChangePassword()
	{
		if(isset($_POST['submit'])){
			//print_r($_POST); die;
			$check = $this->homemodel->getWhere('users', array('id'=>$this->sess, 'password'=>md5($this->input->post('opassword'))));
				if(!$check){
				$this->notification('You Entered Wrong Password!', 'danger');
				}
				
				$this->form_validation->set_rules('password', 'New Password', 'trim|required|min_length[6]|max_length[12]|matches[cpassword]');
				$this->form_validation->set_rules('cpassword', 'Confirm New Password', 'trim|required');
			
				if($this->form_validation->run() == TRUE){
					$array = array(
					'password' => md5($this->input->post('password')),
					'updated' => date('Y-m-d H:m:s')
					);
					$this->homemodel->updatePassword('users', $array, $this->sess);
					$this->notification('Password Updated Successfully!', 'success');
				}
		}
		$this->load->view('common/front/header');
		$this->load->view('front/auth/userchangepassword');
		$this->load->view('common/front/footer');
	}

	public function userForgotPassword()
	{
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
		$this->load->view('common/front/header');
		$this->load->view('front/auth/userforgotpassword');
		$this->load->view('common/front/footer');
	}

	public function editUserProfile()
	{
		$data['rowData'] = $this->homemodel->get('users', array('id' => $this->sess));
		if(isset($_POST['update'])){				
				$image = $this->usersmodel->imageUpload('image', 'img-'.$this->rand(10), 'profile');				
				$array = array(
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'dob' => date('Y-m-d h:i:s', strtotime(str_replace('/', '-', $this->input->post('dob')))),
				'updated' => date('Y-m-d H:m:s')
				);
				$this->usersmodel->update('users', $array, $this->sess);
				if($image[0]){
					$array = array(
					'image' => $image[0]
					);
					$this->usersmodel->update('users', $array, $this->sess);
				}
				$this->notification('Profile Updated Successfully!', 'success');
				$data['rowData'] = $this->homemodel->get('users', array('id' => $this->sess));
			}

		$this->load->view('common/front/header');
		$this->load->view('front/auth/edituserprofile', $data);
		$this->load->view('common/front/footer');
	}
}
