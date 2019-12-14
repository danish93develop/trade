<?php
class MY_Controller extends CI_Controller
{
	protected $data = array();
	function __construct()
	{
		parent::__construct();
		$this->sess = self::session();
	}
	public function session()
	{
		$session = $this->session->userdata('trade_session');
		return $session['id'];
	}
	public function redirect()
	{
		if (!$this->sess) {
			return redirect('login');
		}
	}
	public function notification($message, $type)
	{
		$this->session->set_flashdata('message', $message);
		$this->session->set_flashdata('type', $type);
		redirect($this->agent->referrer());
	}
	public function rand($length)
	{
		$chars = time() . "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$size = strlen($chars);
		$str = '';
		for ($i = 0; $i < $length; $i++) {
			$str .= $chars[rand(0, $size - 1)];
		}
		return $str;
	}
	public function sendEmail($email, $rand)
	{
		//$this->load->library('email');
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
		$this->email->subject('Forgot Password Request');
		$message = '';
		$message .= '<div class="header" style="padding:10px 0px;">';
		$message .= '<h2 class="click-btn" style="text-align:center;">';
		$message .= '<h4 class="click" style="text-align:center;color:#007fab; padding:10px 0px;"> You have requested a new password. Here are the details </h4>';
		$message .= '<h5 style="text-align:center;color:#007fab; padding:10px 0px;">Email :' . $email . '</h5>';
		$message .= 'For change Password <b><a href="' . base_url() . 'auth/password/' . $email . '/' . base64_encode($rand) . '">Click Here</a></b>';
		$this->email->message($message);
		$this->email->set_mailtype("html");
		if ($this->email->send() == true) {
			return '1';
		} else {
			return '0';
		}
		$this->email->print_debugger();
	}
	function pagination($page, $totalpages)
	{
		$html = '';
		if ($totalpages > 0 && $totalpages != 1 && $page <= $totalpages) {
			$html .= '<ul class="pagination">';
			$right_links    = $page + 3;
			$previous       = $page - 1; //previous link 
			$next           = $page + 1; //next link
			$first_link     = true; //boolean var to decide our first link			
			if ($page > 1) {
				$previous_link = ($previous == 0) ? 1 : $previous;
				$html .= '<li class="first"><a href="?page=1" title="First">&laquo;</a></li>'; //first link
				$html .= '<li><a href="?page=' . $previous_link . '" title="Previous">&lt;</a></li>'; //previous link
				for ($i = ($page - 2); $i < $page; $i++) { //Create left-hand side links
					if ($i > 0) {
						$html .= '<li><a href="?page=' . $i . '" title="Page ' . $i . '">' . $i . '</a></li>';
					}
				}
				$first_link = false; //set first link to false
			}
			if ($first_link) { //if current active page is first link
				$html .= '<li class="first active">' . $page . '</li>';
			} elseif ($page == $totalpages) { //if it's the last active link
				$html .= '<li class="last active">' . $page . '</li>';
			} else { //regular current link
				$html .= '<li class="active">' . $page . '</li>';
			}
			for ($i = $page + 1; $i < $right_links; $i++) { //create right-hand side links
				if ($i <= $totalpages) {
					$html .= '<li><a href="?page=' . $i . '" title="Page ' . $i . '">' . $i . '</a></li>';
				}
			}
			if ($page < $totalpages) {
				$next_link = ($i > $totalpages) ? $totalpages : $i;
				$html .= '<li><a href="?page=' . $next_link . '" title="Next">&gt;</a></li>'; //next link
				$html .= '<li class="last"><a href="?page=' . $totalpages . '" title="Last">&raquo;</a></li>'; //last link
			}
			$html .= '</ul>';
		}
		return $html;
	}
}
