<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard extends MY_Controller {
	
		function __construct()
		{
			parent::__construct();
			$this->redirect();
		}
		
		public function index(){
				
            $this->load->view('common/header');
            $this->load->view('admin/dashboard/index');
            $this->load->view('common/footer');
            
		}
	}