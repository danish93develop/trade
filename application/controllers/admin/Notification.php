<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Notification extends MY_Controller {
	
		function __construct()
		{
			parent::__construct();
			$this->redirect();
			$this->load->model('planmodel');
		}

		public function addNotification()
		{
			$data['rowData'] = $this->planmodel->getWhere('users',array('type'=>'user', 'status'=>'1'));
			if(isset($_POST['submit'])){			
			$data = array(
				'title' => $this->input->post('title'),
				'created' => date('Y-m-d h:i:s'),
			);
			//echo"<pre>"; print_r($_POST); echo"</pre>";  die;	
			$result = $this->planmodel->insert('prediction', $data);
			$last_id = $this->db->insert_id();
			
			foreach($_POST['userid'] as $rowid){
				$arrayData = array(
					'notificationid' => $last_id,
					'userid' => $rowid,
					'created' => date('Y-m-d h:i:s'),
				);
				$data['rowData'] = $this->planmodel->insert('notification_user',$arrayData);	
			}
			
			if($result){
					$this->session->set_flashdata('message', 'Notification Added Successfully!');
					$this->session->set_flashdata('type', 'success');					
				} else {
					$this->notification('Server Error!', 'danger');
				}			
			}
			$this->load->view('common/header');
            $this->load->view('admin/predictions/add_notification', $data);
            $this->load->view('common/footer');
		}

		public function viewNotification () 
		{
			$data['rowData'] = $this->planmodel->get('prediction');
			//echo"<pre>"; print_r($data); die;
			$this->load->view('common/header');
            $this->load->view('admin/predictions/view_notification', $data);
            $this->load->view('common/footer');
		}

		public function updateStatus()
		{
			$stat = $this->input->post('status');
			$notiID = $this->input->post('id');			
			if($stat == '0'){
				$status = 1;
			}else{
				$status = 0;
			}
			if($stat != ''){				
				$array = array(
					'status'=>$status,
					'updated' => date('Y-m-d H:m:s')
				);
				//print_r($array);
				$this->planmodel->update('prediction', $array, $notiID);
				echo $status;
			}
			die;
		}

		public function editNotification ($id)
		{
			$data['notifiRow'] = $this->planmodel->editprediction($id);

			if(isset($_POST['update'])){			
				$updatedata = array(									
					'title' => $this->input->post('title'),					
					);					
					$result = $this->planmodel->update('prediction', $updatedata, $id);
					$id = $this->db->insert_id();					
					if($this->db->affected_rows() > 0){
						$this->session->set_flashdata('message', 'Notification Updated Successfully!');
						$this->session->set_flashdata('type', 'success');
						//redirect('plan/view');						
					} else {
						$this->notification('Server Error!', 'danger');
					}	
					
					$data['notifiRow'] = $this->planmodel->editprediction($id);					

			}

			$this->load->view('common/header');
            $this->load->view('admin/predictions/edit_notification', $data);
            $this->load->view('common/footer');
		}


	}