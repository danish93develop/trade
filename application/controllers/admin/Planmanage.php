<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Planmanage extends MY_Controller {
	
		function __construct()
		{
			parent::__construct();
			$this->redirect();
			$this->load->model('planmodel');
		}

		public function addPlan()
		{
			if(isset($_POST['submit'])){			
			$data = array(
				'plan_title' => $this->input->post('plan_title'),
				'price' => $this->input->post('price'),
				'plan_id' => $this->input->post('plan_id'),
				'description' => $this->input->post('description'),
				'created' => date('Y-m-d h:i:s'),
			);
			//echo"<pre>"; print_r($data); echo"</pre>";  die;	
			$result = $this->planmodel->insert('plans', $data);
				if($result){
					$this->session->set_flashdata('message', 'Plan Added Successfully!');
					$this->session->set_flashdata('type', 'success');					
				} else {
					$this->notification('Server Error!', 'danger');
				}			
			}
			$this->load->view('common/header');
            $this->load->view('admin/plans/add_plan');
            $this->load->view('common/footer');
		}

		public function viewPlan () 
		{
			$data['rowData'] = $this->planmodel->getWhere('plans', array('status'=>1));
			//echo"<pre>"; print_r($data); die;
			$this->load->view('common/header');
            $this->load->view('admin/plans/view_plans', $data);
            $this->load->view('common/footer');
		}

		public function editplan ($id)
		{
			$data['planRow'] = $this->planmodel->editPlan($id);

			if(isset($_POST['update'])){			
				$updatedata = array(				
					'plan_title' => $id,
					'plan_title' => $this->input->post('plan_title'),
					'price' => $this->input->post('price'),
					'plan_id' => $this->input->post('plan_id'),
					'description' => $this->input->post('description'),
					);					
					$result = $this->planmodel->update('plans', $updatedata, $id);
					$id = $this->db->insert_id();					
					if($this->db->affected_rows() > 0){
						$this->session->set_flashdata('message', 'Plan Updated Successfully!');
						$this->session->set_flashdata('type', 'success');
						//redirect('plan/view');						
					} else {
						$this->notification('Server Error!', 'danger');
					}	
					//if(!empty($id)){
						$data['planRow'] = $this->planmodel->editPlan($id);
					//}					

			}

			$this->load->view('common/header');
            $this->load->view('admin/plans/edit_plan', $data);
            $this->load->view('common/footer');
		}


	}