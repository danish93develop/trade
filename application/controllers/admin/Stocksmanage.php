<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

	class Stocksmanage extends MY_Controller {

		function __construct()
		{
			parent::__construct();
			$this->redirect();
			$this->load->model('Stockmodel');
		}
		public function tickerData()
		{
			$key = 'DLPW5CUWSO77KC9U';			
			$tick = $_POST['ticker'];				
			$curl_handle = curl_init();
			curl_setopt($curl_handle, CURLOPT_URL, 'https://www.alphavantage.co/query?function=SYMBOL_SEARCH&keywords='.$tick.'&apikey='.$key);
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);

			$response = curl_exec($curl_handle);
			curl_close($curl_handle);
			$data['result'] = json_decode($response);
			echo $output = $this->load->view('admin/stocks/tickersuggestions',$data, true);	
		}

		public function symbolData()
		{
			$key = 'DLPW5CUWSO77KC9U';
			$sym = $_POST['symbol'];			
			$curl_handle = curl_init();
			curl_setopt($curl_handle, CURLOPT_URL, 'https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol='.$sym.'&apikey='.$key);
			curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);

			$response = curl_exec($curl_handle);
			curl_close($curl_handle);
			$data['resultData'] = json_decode($response);
			if(isset($data) and !empty($data)){
				foreach($data as $key=>$value){
					foreach($value as $symkey=>$symval){
						$current_price = '';
					if(!empty($symval)){
							foreach($symval as $skey=>$sval){
								list($order, $keyname) = explode(". ",$skey);
								if($keyname == "price"){
									echo $current_price = $sval;
								}
							}
						}					
					}        
				}
			}else{
				echo "";
			}

		}

		public function addstock()
		{				
			if(isset($_POST['submit'])){
				$createdDate = $this->input->post('created');
				$data = array(				
					'ticker_name' => $this->input->post('ticker_name'),
					'company_name' => $this->input->post('company_name'),
					'industry' => $this->input->post('industry'),
					'ticker_current_rate' => $this->input->post('ticker_current_rate'),
					'ticker_publish_rate' => $this->input->post('ticker_publish_rate'),					
					'status' => $this->input->post('status'),
					'created' => date('Y-m-d h:i:s', strtotime(str_replace('/', '-', $createdDate))),
					);

					$data = $this->Stockmodel->insert('trade_stocks', $data);					
					$ticker_id = $this->db->insert_id();
				$calculatedData = array(
					'ticker_id' => $ticker_id,
					'current_rate' => $this->input->post('ticker_current_rate'),
					'ticker_publish_rate' => $this->input->post('ticker_publish_rate'),
					//'diff_count' => $this->input->post('diff_count'),
					//'diff_percentage' => $this->input->post('diff_percentage'),
				);						
					$data = $this->Stockmodel->insert('stock_history', $calculatedData);
					if($data){
						$this->session->set_flashdata('message', 'Stock Added Successfully!');
						$this->session->set_flashdata('type', 'success');
						//$this->notification('Added Successfully!', 'success');
					} else {
						$this->notification('Server Error!', 'danger');
					}			
				}
			$this->load->view('common/header');
			$this->load->view('admin/stocks/add_stock');
			$this->load->view('common/footer');                        
		}
		public function viewstock()
		{
			$data['rowData'] = $this->Stockmodel->getWhere('trade_stocks', array('status'=>1));

			$this->load->view('common/header');
            $this->load->view('admin/stocks/view_stock', $data);
            $this->load->view('common/footer');
		}
		public function editstock($stockid)
		{
			$data['stockRow'] = $this->Stockmodel->editStock($stockid);

			if (isset($_POST['update'])) {
				$updatedata = array(
					'ticker_id' => $stockid,
					'current_rate' => $this->input->post('ticker_current_rate'),
					'ticker_publish_rate' => $this->input->post('ticker_publish_rate'),
				);
				$result = $this->Stockmodel->insert('stock_history', $updatedata);

				$array = array(
					'ticker_publish_rate' => $this->input->post('ticker_publish_rate'),
				);
				$resultupdate = $this->Stockmodel->update('trade_stocks', $array, $stockid);
				if ($result) {
					$this->session->set_flashdata('message', 'Stock Updated Successfully!');
					$this->session->set_flashdata('type', 'success');
				} else {
					$this->notification('Server Error!', 'danger');
				}
				$data['stockRow'] = $this->Stockmodel->editStock($stockid);
			}
			$this->load->view('common/header');
			$this->load->view('admin/stocks/edit_stock', $data);
			$this->load->view('common/footer');
		}
		public function viewstockhistory($id) {
			$data['rowData'] = $this->Stockmodel->getWhere('stock_history', array('ticker_id'=>$id));
			$this->load->view('common/header');
            $this->load->view('admin/stocks/single_stock_history', $data);
            $this->load->view('common/footer');
		}
		public function stockhistory()
		{
			$limit = 5;
			$page = !empty($_GET['page'])?$_GET['page']:1;
			$this->pageLimit = ($page * $limit) - $limit;
			$counts = $this->Stockmodel->countgetStockHistory();
			$totalpages = ceil($counts / $limit);			
			$this->data = $this->Stockmodel->stockHistoryArrayPaginationON($limit,  $this->pageLimit);			
			$this->pagination = $this->pagination($page, $totalpages);

			$this->data = array(				
				'stockData' => $this->data,
				'pageLimit' => $this->pageLimit,
				'pagination' => $this->pagination
			);
			//$data['stockData'] = $this->Stockmodel->getStockHistory();

			$this->load->view('common/header');
            $this->load->view('admin/stocks/stock_history', $this->data);
            $this->load->view('common/footer');
		}
	}