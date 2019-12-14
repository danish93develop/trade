<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Userdashboard extends MY_Controller {
	
		function __construct()
		{
			parent::__construct();
			$this->redirect();
			$this->load->model('homemodel');
		}
		
		public function index()
		{	
			$this->data = $this->homemodel->getUserDetail();
			$this->stockData = $this->homemodel->getStockPrediction();			
			$this->activeStock = $this->homemodel->activeWatchList();			
			if(!empty($this->activeStock)):
				foreach($this->activeStock as $stockrow){
					$stockrow->graphData = $this->homemodel->getTickerStockHistoryData($stockrow->id);
				}
			endif;
			$this->notification = $this->homemodel->getUserNotification($this->sess);
			//echo"<pre>"; print_r($this->notification); die;
			$this->data = array(				
				'rowData' => $this->data,				
				'stockData' => $this->stockData,				
				'activeStock' => $this->activeStock,				
				'notification' => $this->notification,				
			);
			
            $this->load->view('common/front/header');
            $this->load->view('front/userdashboard/index', $this->data);
            $this->load->view('common/front/footer');            
		}

		public function stockGraph($id)
		{
			$this->stock = $this->homemodel->getGrphpData($id);	
			$this->stockData = $this->homemodel->getTickerData($id);	

			$this->data = array(
				'stockData' => $this->stock,
				'tickerData' => $this->stockData,
			);
			$this->load->view('common/front/header');
            $this->load->view('front/userdashboard/graph', $this->data);
            $this->load->view('common/front/footer');
		}

		public function updateNotification()
		{
			$userid = $this->input->post('userid');
			$notiid = $this->input->post('notiid');						
			if($userid != '' && $notiid != ''){				
				$array = array(
					'status'=>'1',					
				);
				//print_r($array); die;
				$result = $this->homemodel->updateUserNotification('notification_user', $array, $notiid);
				if($result){
					echo '1';
				}
			}			
			die();
		}
	}