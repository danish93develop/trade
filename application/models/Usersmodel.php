<?php
    Class Usersmodel extends CI_Model {
        function insert($table, $data) {
			$this->db->insert($table, $data);
			return $this->db->insert_id();
		}
		
		function get($table) {
			$this->db->order_by('id', 'desc');
			$query = $this->db->get($table);
			return $query->result();
		}
		function getWhere($table, $array) {
			$query = $this->db->get_where($table, $array);
			return $query->row();
		}
		function countWhere($table, $array) {
			$query = $this->db->get_where($table, $array);
			return $query->num_rows();
		}
		function arrayPaginationON($table, $limit, $pageLimit) {
			$this->db->order_by("id", "DESC");
			$this->db->where('type', 'user');
			$query = $this->db->limit($limit, $pageLimit)->get($table);
			return $query->result();
		}
		function getSearchData($planid, $email){
			$this->db->select('users.fname, users.lname, users.email, subscription.subs_start_date, subscription.subs_end_date, plans.plan_title, plans.price ');
			$this->db->from('users');
			$this->db->join('subscription', 'subscription.user_id = users.id');
			$this->db->join('plans', 'plans.id = subscription.plan_id');
			//$this->db->where('users.email LIKE', '%'.$email.'%');
			if(!empty($email)){
				$this->db->like('users.email', $email);
			}			
			$this->db->or_where('plans.id = ', $planid );			
			$this->db->order_by("users.id",'DESC');			
			$query = $this->db->get();
			// $str = $this->db->last_query();	   
			// echo "<pre>";
			// print_r($str);
			// exit;
			return $query->result();
		}
		function countlistusers($array) {
			$this->db->select('*');
			$this->db->from('users');
			$this->db->join('subscription', 'subscription.user_id = users.id');
			$this->db->join('plans', 'plans.id = subscription.plan_id');
			$this->db->where($array);
			$this->db->order_by("users.id",'DESC');			
			$query = $this->db->get();
			return $query->num_rows();			
		}
		function manageUsersPaginationON($limit, $pageLimit) {
			$this->db->select('*');
			$this->db->from('users');
			$this->db->join('subscription', 'subscription.user_id = users.id');
			$this->db->join('plans', 'plans.id = subscription.plan_id');
			//$this->db->where($condition);
			$this->db->limit($limit, $pageLimit);
			$this->db->order_by("users.id",'DESC');			
			$query = $this->db->get();			
			return $query->result();
			
			// $this->db->order_by("id", "DESC");
			// $query = $this->db->limit($limit, $pageLimit)->get($table);
			// return $query->result();
		}
		function listusers($condition) {
			$this->db->select('*');
			$this->db->from('users');
			$this->db->join('subscription', 'subscription.user_id = users.id');
			$this->db->join('plans', 'plans.id = subscription.plan_id');
			$this->db->where($condition);
			$this->db->order_by("users.id",'DESC');			
			$query = $this->db->get();
			return $query->result();			
		}
		function update($table, $update, $id) {
			$this->db->where('id', $id);
			$this->db->update($table, $update);
		}
		function imageUpload($img, $name, $path){
			$this->load->library('image_lib');
			$config['upload_path'] = './assets/images/'.$path;
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']	= '10000';
			$config['max_width']  = '10000';
			$config['max_height']  = '10000';
			$config['file_name'] = $name;
			
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload($img)){
				$error = array('error' => $this->upload->display_errors());
				} else {
				$file = $this->upload->data();
				$files = glob($config['upload_path'].'/*');
				
				$config = array(
				'source_image'      => $file['full_path'],
				'new_image'         => './assets/images/'.$path,
				'maintain_ratio'    => false,
				);
				$this->image_lib->initialize($config);
				
				$data = array('upload_data' => $this->upload->data());
				return array($file['file_name'],'');
			}
		}
    }