<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');

	class UsersManage extends MY_Controller {

		function __construct()
		{
			parent::__construct();
			$this->redirect();
			$this->load->model('usersmodel');

		}

		public function userlisting()
		{
			$limit = 5;
			$page = !empty($_GET['page'])?$_GET['page']:1;
			$this->pageLimit = ($page * $limit) - $limit;
			$counts = $this->usersmodel->countWhere('users', array('type'=>'user'));
			$totalpages = ceil($counts / $limit);			
			$this->data = $this->usersmodel->arrayPaginationON('users', $limit,  $this->pageLimit);			
			$this->pagination = $this->pagination($page, $totalpages);

			$this->data = array(				
				'rowData' => $this->data,
				'pageLimit' => $this->pageLimit,
				'pagination' => $this->pagination
			);			

            $this->load->view('common/header');
            $this->load->view('admin/users/user_listing', $this->data);
            $this->load->view('common/footer');            
		}
		public function userEdit($id)
		{
			$data['userData'] = $this->usersmodel->getWhere('users', array('id' => $id));
			if(isset($_POST['update'])){
				$image = $this->usersmodel->imageUpload('image', 'img-'.$this->rand(10), 'profile');				
				$array = array(
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
				'dob' => date('Y-m-d h:i:s', strtotime(str_replace('/', '-', $this->input->post('dob')))),
				'updated' => date('Y-m-d H:m:s')
				);
				$this->usersmodel->update('users', $array, $id);
				if($image[0]){
					$array = array(
					'image' => $image[0]
					);
					$this->usersmodel->update('users', $array, $id);
				}
				$this->notification('Profile Updated Successfully!', 'success');
				$data['userData'] = $this->usersmodel->getWhere('users', array('id'=>$id));
			}
			$this->load->view('common/header');
            $this->load->view('admin/users/user_edit', $data);
            $this->load->view('common/footer');
		}
		public function changePassword($userid)
		{
			if(isset($_POST['update'])){
				//echo"<pre>"; print_r($_POST); echo"</pre>"; die; 
				$check = $this->usersmodel->getWhere('users', array('id'=>$this->input->post('user_id'), 'password'=>md5($this->input->post('opassword'))));
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
					$this->usersmodel->update('users', $array, $this->input->post('user_id'));
					$this->notification('Password Updated Successfully!', 'success');
				}
			}
			$this->load->view('common/header');
            $this->load->view('admin/users/changepassword');
            $this->load->view('common/footer');
		}
		public function updateStatus()
		{
			$stat = $this->input->post('status');
			$userID = $this->input->post('id');			
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
				$this->usersmodel->update('users', $array, $userID);
				echo $status;
			}
			die;
		}
		public function manage_subscription()
		{
			$limit = 5;
			$page = !empty($_GET['page'])?$_GET['page']:1;
			$this->pageLimit = ($page * $limit) - $limit;
			$counts = $this->usersmodel->countlistusers(array('users.status'=>1));
			$totalpages = ceil($counts / $limit);			
			$this->data = $this->usersmodel->manageUsersPaginationON($limit,  $this->pageLimit);			
			$this->pagination = $this->pagination($page, $totalpages);

			if(isset($_POST['search'])){
				echo $planid = $this->input->post('planid');
				echo $email = $this->input->post('email');
				$this->data = $this->usersmodel->getSearchData($planid, $email);
				//print_r($searchdata); die;
			}
			$this->data = array(				
				'rowData' => $this->data,
				'pageLimit' => $this->pageLimit,
				'pagination' => $this->pagination
			);
			$this->load->view('common/header');
            $this->load->view('admin/users/manage_subscription', $this->data);
            $this->load->view('common/footer');
		}
		public function profile()
		{
			$data['row'] = $this->usersmodel->getWhere('users', array('id'=>$this->sess));
			if(isset($_POST['update'])){
				$image = $this->usersmodel->imageUpload('image', 'img-'.$this->rand(10), 'profile');				
				$array = array(
				'fname' => $this->input->post('fname'),
				'lname' => $this->input->post('lname'),
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
				$data['row'] = $this->usersmodel->getWhere('users', array('id'=>$this->sess));
			}
			$this->load->view('common/header');
            $this->load->view('admin/profile', $data);
            $this->load->view('common/footer');
		}
	}